<script setup>
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({
  berita: Object,
})
</script>

<template>
  <Head :title="berita.judul" />

  <div class="prose mx-auto py-8">
    <h1>{{ berita.judul }}</h1>
    <p class="text-sm text-gray-600">Oleh {{ berita.penulis }} pada {{ new Date(berita.created_at).toLocaleDateString() }}</p>
    <img 
      v-if="berita.foto" 
      :src="`/storage/${berita.foto}`" 
      alt="" 
      class="mt-4 mb-4 w-full rounded"
    />
    <div v-html="berita.isi"></div>

    <div class="mt-8">
      <Link href="/" class="text-blue-600 hover:underline">← Kembali ke Berita</Link>
    </div>
  </div>
</template>
