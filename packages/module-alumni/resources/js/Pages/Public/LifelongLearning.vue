<template>
  <PublicLayout>
    <div class="bg-slate-50 py-16 min-h-screen">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
          <h1 class="text-4xl font-bold text-slate-900 mb-6">Lifelong Learning</h1>
          <p class="text-lg text-slate-600">
            Освіта не закінчується з отриманням диплома. Запорізький національний університет пропонує випускникам програми безперервного навчання для підвищення кваліфікації та професійного зростання.
          </p>
        </div>

        <!-- Programs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          
          <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
            <h2 class="text-2xl font-bold text-znu mb-4">Друга вища освіта</h2>
            <p class="text-slate-600 mb-6">
              Можливість отримати нову спеціальність за скороченою програмою на базі вашого диплома бакалавра чи магістра. Відкрийте нові горизонти у своїй кар'єрі.
            </p>
            <ul class="space-y-2 text-slate-700 font-medium mb-6">
              <li class="flex items-center gap-2"><svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Диплом державного зразка</li>
              <li class="flex items-center gap-2"><svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Зручний графік навчання</li>
            </ul>
            <a href="#" class="inline-block text-znu font-bold hover:underline">Дізнатися більше &rarr;</a>
          </div>

          <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
            <h2 class="text-2xl font-bold text-znu mb-4">Курси підвищення кваліфікації</h2>
            <p class="text-slate-600 mb-6">
              Короткострокові програми, тренінги та сертифікатні курси від провідних викладачів ЗНУ та практиків з бізнесу. Ідеально для швидкого оновлення знань.
            </p>
            <ul class="space-y-2 text-slate-700 font-medium mb-6">
              <li class="flex items-center gap-2"><svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Сертифікат про проходження</li>
              <li class="flex items-center gap-2"><svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Практична спрямованість</li>
            </ul>
            <a href="#" class="inline-block text-znu font-bold hover:underline">Каталог курсів &rarr;</a>
          </div>

        </div>
      </div>
    </div>
  </PublicLayout>
</template>

<script setup>
import PublicLayout from '../../Layouts/PublicLayout.vue';
</script>
