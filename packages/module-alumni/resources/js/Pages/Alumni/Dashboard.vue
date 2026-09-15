<template>
  <PublicLayout>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
      
      <!-- Greeting & Status -->
      <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 mb-8 flex flex-col md:flex-row justify-between items-center gap-6">
        <div>
          <h1 class="text-2xl font-bold text-slate-800">Вітаємо у кабінеті випускника!</h1>
          <p class="text-slate-500 mt-2">Ви успішно авторизовані. Статус вашого профілю: 
            <span v-if="profile.status === 'verified'" class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Верифіковано</span>
            <span v-else-if="profile.status === 'pending'" class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">Очікує підтвердження</span>
            <span v-else class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">Відхилено</span>
          </p>
        </div>
        <div>
          <Link href="/logout" method="post" class="text-sm font-medium text-slate-500 hover:text-slate-800 transition-colors">Вийти з акаунта</Link>
        </div>
      </div>

      <!-- Feature Grid -->
      <div v-if="profile.status === 'verified'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Events Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow">
          <div class="w-12 h-12 bg-znu/10 text-znu rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
          </div>
          <h2 class="text-lg font-bold text-slate-800 mb-2">Мої події</h2>
          <p class="text-sm text-slate-500 mb-4">Переглядайте події, на які ви зареєструвались, та знаходьте нові заходи від університету.</p>
          <Link href="/events" class="text-znu font-medium text-sm hover:underline">Перейти до подій &rarr;</Link>
        </div>

        <!-- Vacancies Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow">
          <div class="w-12 h-12 bg-znu/10 text-znu rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
          </div>
          <h2 class="text-lg font-bold text-slate-800 mb-2">Вакансії та Кар'єра</h2>
          <p class="text-sm text-slate-500 mb-4">Ексклюзивні кар'єрні пропозиції для випускників ЗНУ. Знайдіть роботу або опублікуйте вакансію.</p>
          <Link href="/vacancies" class="text-znu font-medium text-sm hover:underline">Переглянути вакансії &rarr;</Link>
        </div>

        <!-- Mentorship Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow">
          <div class="w-12 h-12 bg-znu/10 text-znu rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
          </div>
          <h2 class="text-lg font-bold text-slate-800 mb-2">Менторство</h2>
          <p class="text-sm text-slate-500 mb-4">Допоможіть студентам або знайдіть наставника серед досвідчених випускників нашої спільноти.</p>
          <Link href="/mentorship" class="text-znu font-medium text-sm hover:underline">Долучитись до програми &rarr;</Link>
        </div>

      </div>

      <!-- Pending State -->
      <div v-if="profile.status === 'pending'" class="bg-blue-50 border border-blue-100 rounded-2xl p-8 text-center">
        <svg class="w-16 h-16 text-blue-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <h2 class="text-xl font-bold text-blue-900 mb-2">Профіль на перевірці</h2>
        <p class="text-blue-700 max-w-2xl mx-auto">
          Шановний випускнику! Ваша анкета зараз перевіряється адміністратором вашого факультету. 
          Це зазвичай займає від 1 до 3 робочих днів. Як тільки ваш статус буде підтверджено, ви отримаєте доступ до всіх розширених можливостей (внутрішніх новин, подій, вакансій та менторства).
        </p>
      </div>

    </div>
  </PublicLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import PublicLayout from '../../Layouts/PublicLayout.vue';

defineProps({
  profile: {
    type: Object,
    default: () => ({ status: 'verified' }) // Default for mock
  }
});
</script>
