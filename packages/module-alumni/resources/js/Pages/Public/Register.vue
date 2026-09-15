<template>
  <PublicLayout>
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">
        <!-- Header -->
        <div class="bg-znu text-white p-8">
          <h1 class="text-3xl font-bold mb-4">Анкета випускника Запорізького національного університету</h1>
          <p class="text-znu-light-100 opacity-90 text-sm leading-relaxed mb-4">
            Шановні випускники Запорізького державного педагогічного інституту, Запорізького державного університету, Запорізького металургійного інституту, Запорізького індустріального інституту, Запорізької державної інженерної академії, Інженерного навчально-наукового інституту Запорізького національного університету та Запорізького національного університету запрошуємо Вас приєднатися до Асоціації випускників ЗНУ, яка ставить мету налагодити з вами співпрацю, полегшити спілкування та долучати вас до заходів, які проводить Запорізький національний університет.
          </p>
          <p class="text-white font-medium text-lg">
            Будемо раді, якщо ви залишите свої контактні дані та короткі відомості про себе. Дякуємо, що колись ви обрали наш заклад вищої освіти! Ми пишаємось кожним із Вас!
          </p>
        </div>

        <!-- Form -->
        <form @submit.prevent="submit" class="p-8 space-y-8">
          
          <!-- Section 1: Basic Info -->
          <div class="space-y-6">
            <h2 class="text-xl font-semibold text-znu border-b pb-2">1. Контактна інформація</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Електронна пошта *</label>
                <input v-model="form.email" type="email" required class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20" />
              </div>
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Пароль (для доступу в кабінет) *</label>
                <input v-model="form.password" type="password" required class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20" />
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Ваше прізвище, ім'я, по батькові *</label>
                <input v-model="form.name" type="text" required class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20" />
              </div>
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Якщо змінювали прізвище, напишіть попереднє</label>
                <input v-model="form.maiden_name" type="text" class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20" />
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Номер мобільного телефону *</label>
              <input v-model="form.phone" type="tel" required class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20" />
            </div>
          </div>

          <!-- Section 2: Education -->
          <div class="space-y-6">
            <h2 class="text-xl font-semibold text-znu border-b pb-2">2. Дані про навчання</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Рік вступу в наш заклад освіти *</label>
                <input v-model="form.enrollment_year" type="number" min="1950" :max="new Date().getFullYear()" required class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20" />
              </div>
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Рік випуску *</label>
                <input v-model="form.graduation_year" type="number" min="1950" :max="new Date().getFullYear() + 5" required class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20" />
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">На якому факультеті(-ах) і на якій спеціальності(-остях)/освітній(-іх) програмі навчались? *</label>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- In a real app, this would be a select from DB -->
                <select v-model="form.department_id" required class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20">
                  <option value="" disabled>Оберіть факультет</option>
                  <option v-for="dept in departments" :key="dept.id" :value="dept.id">{{ dept.name }}</option>
                </select>
                <input v-model="form.specialty" type="text" placeholder="Спеціальність / Програма" class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20" />
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700 mb-2">Який рівень освіти ви здобули: *</label>
              <div class="space-y-2">
                <label v-for="lvl in ['Бакалавр', 'Спеціаліст', 'Магістр', 'Аспірантура', 'Докторантура']" :key="lvl" class="flex items-center">
                  <input type="radio" v-model="form.education_level" :value="lvl" required class="text-znu focus:ring-znu" />
                  <span class="ml-2 text-slate-700">{{ lvl }}</span>
                </label>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Група (якщо пам'ятаєте)</label>
              <input v-model="form.group_number" type="text" class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20" />
            </div>
          </div>

          <!-- Section 3: Professional Info -->
          <div class="space-y-6">
            <h2 class="text-xl font-semibold text-znu border-b pb-2">3. Професійна діяльність</h2>

            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Вкажіть, будь ласка, актуальне місце роботи і посаду *</label>
              <input v-model="form.current_job" type="text" required class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20" />
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Якщо маєте державні відзнаки, вкажіть, будь ласка, які</label>
              <textarea v-model="form.awards_state" rows="2" class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20"></textarea>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Вкажіть, чи отримували ви нагороди? Якщо так, вкажіть, які</label>
              <textarea v-model="form.awards_other" rows="2" class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20"></textarea>
            </div>
          </div>

          <!-- Section 4: Connectivity -->
          <div class="space-y-6">
            <h2 class="text-xl font-semibold text-znu border-b pb-2">4. Співпраця з університетом</h2>

            <div>
              <label class="block text-sm font-medium text-slate-700 mb-2">У який спосіб ви б хотіли підтримувати контакти з університетом? *</label>
              <div class="space-y-2">
                <label v-for="pref in ['Відвідувати наукові семінари та конференції.', 'Брати участь у розважальних заходах, які проводяться в університеті.', 'Працювати в ЗНУ.', 'Відвідувати вечори зустрічі випускників.']" :key="pref" class="flex items-center">
                  <input type="checkbox" v-model="form.contact_preferences" :value="pref" class="rounded text-znu focus:ring-znu" />
                  <span class="ml-2 text-slate-700">{{ pref }}</span>
                </label>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Чи маєте побажання/пропозиції до Асоціації випускників?</label>
              <textarea v-model="form.suggestions" rows="3" class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20"></textarea>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Дайте, будь ласка, посилання на власні сторінки в соціальних мережах «Фейсбук», «Інстаграм», «Телеграм» (при наявності)</label>
              <textarea v-model="form.social_links_text" rows="2" placeholder="Наприклад: FB: link, TG: @username" class="w-full rounded-md border-slate-300 shadow-sm focus:border-znu focus:ring focus:ring-znu/20"></textarea>
            </div>
          </div>

          <!-- Consent -->
          <div class="bg-slate-50 p-4 rounded-lg border border-slate-200 flex items-start gap-3">
            <input type="checkbox" id="consent" v-model="form.consent" required class="mt-1 rounded text-znu focus:ring-znu" />
            <label for="consent" class="text-sm text-slate-700">
              Я даю згоду на обробку своїх персональних даних відповідно до Закону України «Про захист персональних даних». *
            </label>
          </div>

          <!-- Submit -->
          <div class="flex justify-end pt-4">
            <button type="submit" class="bg-znu hover:bg-znu-light text-white font-bold py-3 px-8 rounded-lg shadow-md transition-colors" :disabled="form.processing">
              Надіслати анкету
            </button>
          </div>

        </form>
      </div>
    </div>
  </PublicLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import PublicLayout from '../../Layouts/PublicLayout.vue';

const props = defineProps({
  departments: {
    type: Array,
    default: () => [
      { id: 1, name: 'Математичний факультет' },
      { id: 2, name: 'Юридичний факультет' },
      { id: 3, name: 'Факультет економіки' }
    ] // Fallback for demonstration
  }
});

const form = useForm({
  email: '',
  password: '',
  name: '',
  maiden_name: '',
  phone: '',
  enrollment_year: '',
  graduation_year: '',
  department_id: '',
  specialty: '',
  education_level: '',
  group_number: '',
  current_job: '',
  awards_state: '',
  awards_other: '',
  contact_preferences: [],
  suggestions: '',
  social_links_text: '',
  consent: false,
  privacy_show_profile: true,
});

const submit = () => {
  // Convert social links text to array for the backend
  const socialLinks = form.social_links_text ? form.social_links_text.split('\n') : [];
  
  form.transform((data) => ({
    ...data,
    social_links: socialLinks
  })).post('/api/v1/alumni/profiles', {
    onSuccess: () => {
      alert('Анкету успішно надіслано! Дякуємо.');
    }
  });
};
</script>
