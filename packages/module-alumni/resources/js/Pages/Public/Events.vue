<template>
  <PublicLayout>
    <!-- Hero Section -->
    <div class="bg-znu text-white py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold mb-4">Події ЗНУ</h1>
        <p class="text-xl text-znu-light-100 max-w-2xl mx-auto">Наукові конференції, семінари, зустрічі випускників та багато іншого. Долучайтесь до активного життя університету!</p>
      </div>
    </div>

    <!-- Event List -->
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Event Card Mock 1 -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden group hover:shadow-lg transition-all duration-300">
          <div class="h-48 bg-slate-200 relative">
            <!-- Placeholder Image -->
            <div class="absolute inset-0 bg-znu/10"></div>
            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-znu font-bold px-3 py-1 rounded-lg text-sm">
              15 Жовтня
            </div>
          </div>
          <div class="p-6">
            <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-3 uppercase tracking-wider">
              <span class="bg-blue-50 text-blue-600 px-2 py-1 rounded">Зустріч</span>
              <span>•</span>
              <span>Офлайн</span>
            </div>
            <h2 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-znu transition-colors">Щорічна зустріч випускників ЗНУ 2026</h2>
            <p class="text-slate-600 text-sm mb-4 line-clamp-3">
              Запрошуємо всіх випускників відвідати Alma Mater, зустрітися з викладачами та однокурсниками. В програмі концерт, екскурсія кампусом та неформальне спілкування.
            </p>
            <button class="w-full bg-slate-100 hover:bg-znu hover:text-white text-znu font-semibold py-2 px-4 rounded-lg transition-colors">
              Зареєструватись
            </button>
          </div>
        </div>

        <!-- Event Card Mock 2 -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden group hover:shadow-lg transition-all duration-300">
          <div class="h-48 bg-slate-200 relative">
            <div class="absolute inset-0 bg-znu/10"></div>
            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-znu font-bold px-3 py-1 rounded-lg text-sm">
              20 Жовтня
            </div>
          </div>
          <div class="p-6">
            <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-3 uppercase tracking-wider">
              <span class="bg-purple-50 text-purple-600 px-2 py-1 rounded">Конференція</span>
              <span>•</span>
              <span>Онлайн</span>
            </div>
            <h2 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-znu transition-colors">Міжнародна науково-практична конференція ІТ</h2>
            <p class="text-slate-600 text-sm mb-4 line-clamp-3">
              Обговорення сучасних трендів у сфері штучного інтелекту, розробки ПЗ та кібербезпеки за участю провідних ІТ-компаній.
            </p>
            <button class="w-full bg-slate-100 hover:bg-znu hover:text-white text-znu font-semibold py-2 px-4 rounded-lg transition-colors">
              Зареєструватись
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
