<script setup>
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  foto: Object, // { id, judul, deskripsi, foto, created_at, ... }
});
</script>

<template>
  <Head :title="foto.judul"/>

  <div class="max-w-3xl mx-auto py-8">
    <Link href="/" class="text-gray-600 hover:underline mb-4 inline-block">← Kembali</Link>
    <h1 class="text-3xl font-semibold mb-4">{{ foto.judul }}</h1>
    <img
      :src="`/storage/${foto.foto}`"
      alt=""
      class="w-full rounded shadow mb-6"
    />
    <p class="text-gray-700 mb-6">{{ foto.deskripsi }}</p>
    <p class="text-sm text-gray-500">Diunggah: {{ new Date(foto.created_at).toLocaleDateString() }}</p>
  </div>
</template>
