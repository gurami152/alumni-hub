<?php

namespace Znu\ModuleAlumni\Providers;

use Illuminate\Support\ServiceProvider;

class AlumniServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        \Illuminate\Support\Facades\Gate::policy(\Znu\ModuleAlumni\Models\Event::class, \Znu\ModuleAlumni\Policies\EventPolicy::class);
        \Illuminate\Support\Facades\Gate::policy(\Znu\ModuleAlumni\Models\Vacancy::class, \Znu\ModuleAlumni\Policies\VacancyPolicy::class);
        \Illuminate\Support\Facades\Gate::policy(\Znu\ModuleAlumni\Models\AlumniProfile::class, \Znu\ModuleAlumni\Policies\AlumniProfilePolicy::class);
        \Illuminate\Support\Facades\Gate::policy(\Znu\ModuleAlumni\Models\Story::class, \Znu\ModuleAlumni\Policies\StoryPolicy::class);

        if (file_exists(__DIR__ . '/../../routes/api.php')) {
            \Illuminate\Support\Facades\Route::middleware('api')
                ->prefix('api/v1/alumni')
                ->group(__DIR__ . '/../../routes/api.php');
        }

        if (class_exists(\Znu\Core\Menu\MenuRegistry::class)) {
            app(\Znu\Core\Menu\MenuRegistry::class)->addItem([
                'label' => 'Alumni',
                'url' => '/alumni',
                'icon' => 'Square2StackIcon',
                'order' => 10,
                'section' => 'Основне',
            ]);
        }
    }
}
