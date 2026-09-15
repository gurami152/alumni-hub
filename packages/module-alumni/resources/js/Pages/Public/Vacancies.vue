<template>
  <PublicLayout>
    <div class="bg-slate-50 py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold text-znu mb-4">Кар'єра та Вакансії</h1>
        <p class="text-lg text-slate-600 max-w-2xl mx-auto">
          Ексклюзивні пропозиції від партнерів університету та випускників. Будуйте успішну кар'єру разом зі спільнотою ЗНУ!
        </p>
      </div>
    </div>

    <div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
      
      <!-- Search/Filter Bar -->
      <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-200 mb-8 flex gap-4">
        <input type="text" placeholder="Пошук вакансій (посада, компанія...)" class="flex-grow rounded-lg border-slate-300 focus:ring-znu focus:border-znu" />
        <button class="bg-znu hover:bg-znu-light text-white px-6 py-2 rounded-lg font-semibold transition-colors">
          Знайти
        </button>
      </div>

      <!-- Vacancy List -->
      <div class="space-y-4">
        
        <!-- Vacancy Mock 1 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:border-znu/50 transition-colors group flex flex-col md:flex-row gap-6 items-start">
          <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center font-bold text-xl shrink-0">
            IT
          </div>
          <div class="flex-grow">
            <div class="flex justify-between items-start mb-1">
              <h2 class="text-xl font-bold text-slate-900 group-hover:text-znu transition-colors">Senior Software Engineer (Vue/Laravel)</h2>
              <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold whitespace-nowrap">$3000 - $4500</span>
            </div>
            <p class="text-znu font-medium mb-3">TechZNU Solutions • Віддалено</p>
            <p class="text-slate-600 text-sm mb-4">
              Шукаємо досвідченого розробника для створення сучасних веб-додатків. Досвід роботи з Laravel та Vue 3 обов'язковий. Перевага надається випускникам математичного факультету ЗНУ.
            </p>
            <div class="flex items-center gap-4 text-xs font-medium text-slate-500">
              <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Повний день</span>
              <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> Опубліковано сьогодні</span>
            </div>
          </div>
          <div class="shrink-0">
            <button class="bg-slate-100 hover:bg-slate-200 text-slate-800 px-4 py-2 rounded-lg font-medium transition-colors w-full md:w-auto">
              Відгукнутися
            </button>
          </div>
        </div>

      </div>
    </div>
  </PublicLayout>
</template>

<script setup>
import PublicLayout from '../../Layouts/PublicLayout.vue';
</script>
