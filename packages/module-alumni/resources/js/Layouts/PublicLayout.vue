<template>
  <div class="min-h-screen flex flex-col bg-slate-50 font-sans">
    <!-- Header -->
    <header class="bg-znu text-white shadow-md sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <!-- Logo & Brand -->
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-znu font-bold text-xl">
              ЗНУ
            </div>
            <Link href="/" class="text-xl font-bold tracking-tight hover:text-slate-200 transition-colors">
              Alumni Hub ZNU
            </Link>
          </div>
          
          <!-- Desktop Navigation -->
          <nav class="hidden md:flex items-center gap-6">
            <Link href="/events" class="hover:text-slate-300 transition-colors font-medium">Події</Link>
            <Link href="/vacancies" class="hover:text-slate-300 transition-colors font-medium">Вакансії</Link>
            <Link href="/mentorship" class="hover:text-slate-300 transition-colors font-medium">Менторство</Link>
            <Link href="/learning" class="hover:text-slate-300 transition-colors font-medium">Lifelong Learning</Link>
            <Link href="/contact" class="hover:text-slate-300 transition-colors font-medium">Контакти</Link>
            
            <div class="h-6 w-px bg-white/30 mx-2"></div>
            
            <Link v-if="!$page.props.auth.user" href="/register" class="bg-white text-znu hover:bg-slate-100 px-4 py-2 rounded-lg font-semibold transition-all shadow-sm">
              Приєднатися
            </Link>
            <Link v-else href="/alumni/dashboard" class="bg-white text-znu hover:bg-slate-100 px-4 py-2 rounded-lg font-semibold transition-all shadow-sm">
              Мій кабінет
            </Link>
          </nav>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
      <slot />
    </main>

    <!-- Footer (Checklist items 18, 19) -->
    <footer class="bg-znu-dark text-slate-300 py-12 mt-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Column 1: Brand -->
          <div>
            <div class="flex items-center gap-3 mb-4">
              <div class="w-8 h-8 bg-slate-300 rounded-full flex items-center justify-center text-znu-dark font-bold">
                ЗНУ
              </div>
              <span class="text-lg font-bold text-white">Асоціація випускників</span>
            </div>
            <p class="text-sm">Ми пишаємось кожним із Вас! Дякуємо, що обрали Запорізький національний університет.</p>
            <div class="flex gap-4 mt-4">
              <a href="https://www.facebook.com/univerzp" target="_blank" class="hover:text-white transition-colors">FB</a>
              <a href="https://www.instagram.com/znu.official/" target="_blank" class="hover:text-white transition-colors">IN</a>
              <a href="https://t.me/znu_official" target="_blank" class="hover:text-white transition-colors">TG</a>
              <a href="https://www.youtube.com/@ZNUofficial/featured" target="_blank" class="hover:text-white transition-colors">YT</a>
            </div>
          </div>
          
          <!-- Column 2: Contact Person -->
          <div>
            <h3 class="text-white font-semibold mb-4 text-lg">Контактна особа</h3>
            <ul class="space-y-2 text-sm">
              <li><strong>ПІБ:</strong> Петров Петро Петрович</li>
              <li><strong>Посада:</strong> Голова Асоціації випускників ЗНУ</li>
              <li><strong>Email:</strong> alumni@znu.edu.ua</li>
              <li><strong>Телефон:</strong> +38 (061) 228-75-00</li>
            </ul>
          </div>
          
          <!-- Column 3: Tech Support -->
          <div>
            <h3 class="text-white font-semibold mb-4 text-lg">Технічна підтримка</h3>
            <ul class="space-y-2 text-sm">
              <li><strong>Підрозділ:</strong> Центр інформаційних технологій ЗНУ</li>
              <li><strong>Відповідальний:</strong> Іванов Іван Іванович</li>
              <li><strong>Email:</strong> support@znu.edu.ua</li>
            </ul>
          </div>
        </div>
        
        <div class="border-t border-slate-700 mt-8 pt-8 text-sm text-center">
          &copy; {{ new Date().getFullYear() }} Запорізький національний університет. Усі права захищено.
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
