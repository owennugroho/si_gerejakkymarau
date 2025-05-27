<template>
    <section
      class="relative h-screen bg-cover bg-center"
      :style="{ backgroundImage: `url(${bgImage})` }"
    >
      <!-- overlay gelap supaya teks selalu terbaca -->
      <div class="absolute inset-0 bg-black/60"></div>
  
      <!-- konten teks & tombol -->
      <div
        class="relative z-10 container mx-auto px-4 flex flex-col items-center justify-center h-full text-center"
      >
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">
          {{ title }}
        </h1>
        <p class="text-lg md:text-xl text-white mb-6">
          {{ subtitle }}
        </p>
        <!-- slot untuk tombol CTA (misal Link atau button) -->
        <slot name="cta" />
      </div>
    </section>
  </template>
  
  <script setup>
  defineProps({
    /** path gambar hero (public folder) */
    bgImage: { type: String, required: true },
    /** Judul besar di hero */
    title: { type: String, required: true },
    /** Subjudul di bawah judul */
    subtitle: { type: String, default: '' },
  })
  </script>
  
  <style scoped>
  /* tidak perlu tambahan styling, semua handle oleh Tailwind/DaisyUI */
  </style>
  