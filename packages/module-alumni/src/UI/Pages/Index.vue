<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@znu/core/layouts/AppLayout.vue';
import { Card, CardContent, CardHeader, CardTitle, CardDescription } from '@znu/core/components/ui/card';
</script>

<template>
    <Head title="Alumni Module" />

    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-foreground leading-tight">
                Alumni Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Card>
                    <CardHeader>
                        <CardTitle>Welcome</CardTitle>
                        <CardDescription>Managed by the Alumni module.</CardDescription>
                    </CardHeader>
                    <CardContent>
                        <p class="text-muted-foreground">
                            Start building your module features here. You have access to the core Shadcn-vue components and Wayfinder routing.
                        </p>
                    </CardContent>
                </Card>
            </div>
        </div>
    </AppLayout>
</template>
