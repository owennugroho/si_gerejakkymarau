<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  berita: Object,
})
</script>

<template>

  <Head :title="berita.judul" />

  <GuestLayout>
    <article class="max-w-3xl mx-auto py-12 px-6">
      <!-- Judul -->
      <h1 class="text-3xl md:text-4xl font-bold mb-3 text-center text-amber-600">
        {{ berita.judul }}
      </h1>

      <!-- Penulis -->
      <p class="text-sm text-gray-600 mb-6 text-center italic">
        Oleh {{ berita.penulis }}
      </p>

      <!-- Foto -->
      <img v-if="berita.foto" :src="`/storage/${berita.foto}`" alt="Foto Berita"
        class="w-full h-auto rounded mb-8 shadow" />

      <!-- ISI BERITA (YANG PENTING) -->
      <div v-if="berita && berita.isi" class="berita-content text-gray-800 text-justify" v-html="berita.isi"></div>

      <div v-else class="text-center text-gray-500 mt-8">
        Konten berita belum tersedia.
      </div>

      <div class="mt-10 text-center">
        <Link :href="route('berita.index')" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
          Kembali ke Berita
        </Link>
      </div>
    </article>
  </GuestLayout>
</template>

<style scoped>
.berita-content p {
  text-align: justify;
  line-height: 1.8;
  margin-bottom: 1rem;
}

/* Kalau ada list */
.berita-content ul,
.berita-content ol {
  margin-left: 1.5rem;
  margin-bottom: 1rem;
}

/* Kalau ada heading dalam isi */
.berita-content h2,
.berita-content h3 {
  margin-top: 1.2rem;
  margin-bottom: 0.8rem;
}
</style>
