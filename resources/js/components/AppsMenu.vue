<script setup lang="ts">
import {
    Calendar,
    Database,
    GraduationCap,
    Grip,
    LifeBuoy,
    User,
} from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';

const apps = [
    { name: 'Helpdesk', url: 'https://help.znu.edu.ua', icon: LifeBuoy },
    { name: 'ZNU Cabinet', url: 'https://cabinet.znu.edu.ua', icon: User },
    { name: 'Admission', url: 'https://pk.znu.edu.ua', icon: GraduationCap },
    { name: 'Розклад', url: 'https://rozklad.znu.edu.ua', icon: Calendar },
    { name: 'CMS', url: 'https://cms.znu.edu.ua', icon: Database },
];
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger :as-child="true">
            <Button
                variant="ghost"
                size="icon"
                class="relative size-10 rounded-full"
            >
                <Grip class="size-5 opacity-80" />
            </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent align="end" class="w-64 p-4">
            <div class="grid grid-cols-3 gap-2">
                <a
                    v-for="app in apps"
                    :key="app.name"
                    :href="app.url"
                    target="_blank"
                    class="flex flex-col items-center justify-center gap-2 rounded-md p-2 text-center text-xs hover:bg-accent hover:text-accent-foreground"
                >
                    <component :is="app.icon" class="size-6 text-neutral-600 dark:text-neutral-400" />
                    <span>{{ app.name }}</span>
                </a>
            </div>
        </DropdownMenuContent>
    </DropdownMenu>
</template>
