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
    <div class="max-w-3xl mx-auto py-8 px-4">
      <h1 class="text-3xl font-semibold mb-4 text-gray-900 text-center">
        {{ berita.judul }}
      </h1>

      <p class="text-sm text-gray-600 mb-6 text-center">
        Oleh {{ berita.penulis }}
      </p>

      <img
        v-if="berita.foto"
        :src="`/storage/${berita.foto}`"
        alt="Foto Berita"
        class="w-full h-auto rounded mb-6"
      />

      <div class="prose prose-lg mx-auto text-gray-800">
        <div v-html="berita.isi"></div>
      </div>
    </div>
  </GuestLayout>
</template>

<style scoped>
/* tidak ada perubahan khusus */
</style>
