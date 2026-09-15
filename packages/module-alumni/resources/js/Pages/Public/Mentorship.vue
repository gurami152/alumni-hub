<template>
  <PublicLayout>
    <div class="bg-slate-900 text-white py-20 relative overflow-hidden">
      <!-- Decor background -->
      <div class="absolute -top-24 -right-24 w-96 h-96 bg-znu rounded-full opacity-20 blur-3xl"></div>
      
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-12">
        <div class="md:w-1/2">
          <h1 class="text-4xl md:text-5xl font-bold mb-6">Менторська програма ЗНУ</h1>
          <p class="text-lg text-slate-300 mb-8 leading-relaxed">
            Обмін досвідом, що змінює життя. Досвідчені випускники допомагають студентам та молодим спеціалістам зробити перші впевнені кроки у професії.
          </p>
          <div class="flex gap-4">
            <button class="bg-znu hover:bg-znu-light text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg shadow-znu/30">
              Стати ментором
            </button>
            <button class="bg-white/10 hover:bg-white/20 text-white px-6 py-3 rounded-xl font-bold transition-all backdrop-blur">
              Знайти ментора
            </button>
          </div>
        </div>
        <div class="md:w-1/2 flex justify-center">
          <!-- Graphic representation -->
          <div class="grid grid-cols-2 gap-4">
            <div class="bg-white/5 backdrop-blur border border-white/10 p-6 rounded-2xl w-48 text-center transform translate-y-8">
              <div class="text-4xl font-black text-znu-light mb-2">150+</div>
              <div class="text-sm font-medium text-slate-300">Активних менторів</div>
            </div>
            <div class="bg-white/5 backdrop-blur border border-white/10 p-6 rounded-2xl w-48 text-center">
              <div class="text-4xl font-black text-znu-light mb-2">500+</div>
              <div class="text-sm font-medium text-slate-300">Успішних історій</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- How it works -->
    <div class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-slate-900 mb-12">Як це працює?</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
          <div>
            <div class="w-16 h-16 mx-auto bg-slate-100 text-znu rounded-full flex items-center justify-center font-bold text-2xl mb-4">1</div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Подайте заявку</h3>
            <p class="text-slate-600">Заповніть анкету, розкажіть про свій досвід або цілі, яких хочете досягти.</p>
          </div>
          <div>
            <div class="w-16 h-16 mx-auto bg-slate-100 text-znu rounded-full flex items-center justify-center font-bold text-2xl mb-4">2</div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Підбір пари</h3>
            <p class="text-slate-600">Система або координатор підбере найкращого кандидата відповідно до ваших запитів.</p>
          </div>
          <div>
            <div class="w-16 h-16 mx-auto bg-slate-100 text-znu rounded-full flex items-center justify-center font-bold text-2xl mb-4">3</div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Співпраця</h3>
            <p class="text-slate-600">Проведіть першу ознайомчу зустріч та почніть плідну співпрацю.</p>
          </div>
        </div>
      </div>
    </div>
  </PublicLayout>
</template>

<script setup>
import PublicLayout from '../../Layouts/PublicLayout.vue';
</script>
