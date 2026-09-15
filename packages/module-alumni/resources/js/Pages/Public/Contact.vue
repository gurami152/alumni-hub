<template>
  <PublicLayout>
    <div class="max-w-4xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
      
      <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-slate-900 mb-4">Зв'яжіться з нами</h1>
        <p class="text-slate-600 text-lg">Залишилися питання? Бажаєте запропонувати співпрацю? Напишіть нам!</p>
      </div>

      <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100 p-8 md:p-12">
        <form class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Ваше ім'я</label>
              <input type="text" required class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20" />
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Email для зв'язку</label>
              <input type="email" required class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20" />
            </div>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Тема повідомлення</label>
            <select class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20">
              <option>Загальні питання</option>
              <option>Пропозиція співпраці</option>
              <option>Менторська програма</option>
              <option>Технічна підтримка</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Ваше повідомлення</label>
            <textarea rows="5" required class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20"></textarea>
          </div>

          <div class="flex justify-end pt-4">
            <button type="submit" class="bg-znu hover:bg-znu-light text-white font-bold py-3 px-8 rounded-lg shadow-md transition-colors">
              Надіслати повідомлення
            </button>
          </div>
        </form>
      </div>

    </div>
  </PublicLayout>
</template>

<script setup>
import PublicLayout from '../../Layouts/PublicLayout.vue';
</script>
