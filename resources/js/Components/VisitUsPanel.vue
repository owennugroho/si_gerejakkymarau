<!-- resources/js/Components/VisitUsPanel.vue -->
<script setup>
import { ref } from 'vue'

// state buka/tutup panel
const open = ref(false)

// toggle panel
function toggle() {
  open.value = !open.value
}
</script>

<template>
  <!-- Tab “Visit Us” -->
  <div @click="toggle" :class="[
    'fixed top-2/3 right-0 z-50 cursor-pointer',
    'bg-green-800 text-white w-36 h-12',
    'flex items-center justify-center rounded font-medium transform',
    'rounded-none rounded-bl rounded-br',
    'transition-transform duration-300 rotate-90',
    open ? '-translate-x-80' : ''
  ]" style="transform-origin: top right;">
    Kunjungi Kami
  </div>

  <!-- Panel -->
  <transition name="slide">
    <aside v-if="open" class="fixed top-0 right-0 z-40 h-full w-80 bg-green-800 text-white shadow-xl overflow-y-auto">
      <!-- Close button -->
      <button @click="toggle" class="absolute top-4 right-4 text-white text-2xl leading-none">&times;</button>

      <div class="p-6 space-y-6">
        <h2 class="text-2xl font-bold">Visit Us</h2>
        <p>Jl. Daeng Utih, Dusun Tempayak, Suka Karya, Marau, Ketapang, Kalbar 78863</p>
        <p class="mt-4 font-semibold">Opening Hours:</p>
        <ul class="list-inside list-disc">
          <li>Senin–Sabtu: 05.30 WIB</li>
          <li>Minggu: 07.30 WIB</li>
        </ul>
        <!-- Google Maps kecil -->
        <div class="mt-6 h-40 overflow-hidden rounded">
          <iframe class="w-full h-full border-0"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4070270.4756309404!2d107.89016069750956!3d-4.960687967765621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e059359d53eb97d%3A0xc02a79122806fb55!2sGereja%20Katolik%20Paroki%20Kanak-Kanak%20Yesus%2C%20Marau!5e0!3m2!1sen!2sid!4v1746777087037!5m2!1sen!2sid"
            allowfullscreen loading="lazy"></iframe>
        </div>
        <!-- Kontak -->
        <div class="mt-6 space-y-1">
          <p>Email: info@gerejamarau.id</p>
          <p>Phone: +62 81-234-567-890</p>
        </div>
      </div>
    </aside>
  </transition>
</template>

<style scoped>
/* Transisi slide in dari kanan */
.slide-enter-from {
  transform: translateX(100%);
}

.slide-enter-to {
  transform: translateX(0);
}

.slide-enter-active,
.slide-leave-active {
  transition: transform 0.3s ease;
}

.slide-leave-from {
  transform: translateX(0);
}

.slide-leave-to {
  transform: translateX(100%);
}
</style>
