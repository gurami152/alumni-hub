import { createInertiaApp } from '@inertiajs/vue3';
import { initializeTheme } from '@/composables/useAppearance';
import { createApp, h } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { initializeFlashToast } from '@/lib/flashToast';
import * as Sentry from '@sentry/vue';
import axios, { type AxiosResponse, type AxiosError } from 'axios';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    layout: (name) => {
        switch (true) {
            case name === 'Welcome':
                return null;
            case name.startsWith('auth/'):
                return AuthLayout;
            case name.startsWith('settings/'):
                return [AppLayout, SettingsLayout];
            default:
                return AppLayout;
        }
    },
    progress: {
        color: '#4B5563',
    },
    setup({ el, App, props, plugin }) {
        // We override the default behavior to inject Sentry
        const vueApp = createApp({ render: () => h(App, props) })
            .use(plugin);

        Sentry.init({
            app: vueApp,
            dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
            tracesSampleRate: 1.0,
        });

        if (el) {
            vueApp.mount(el);
        }
    },
});

axios.interceptors.response.use(
    (response: AxiosResponse) => response,
    (error: AxiosError) => {
        const status = error.response ? error.response.status : null;

        // Treat 401 or 405 + network error as session-expired
        if (status === 405 || error.code === 'ERR_NETWORK') {
            window.location.href = '/login'; // top-level redirect to Laravel login -> Keycloak
        }

        return Promise.reject(error);
    },
);

// This will set light / dark mode on page load...
initializeTheme();

// This will listen for flash toast data from the server...
initializeFlashToast();

