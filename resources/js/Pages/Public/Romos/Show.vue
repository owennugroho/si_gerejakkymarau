<script setup>
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  romo: Object, // { id, nama, foto, deskripsi, ... }
});
</script>

<template>
  <Head :title="romo.nama" />

  <div class="max-w-3xl mx-auto py-8">
    <Link href="/" class="text-gray-600 hover:underline mb-4 inline-block">← Kembali</Link>
    <h1 class="text-3xl font-semibold mb-4">{{ romo.nama }}</h1>

    <img
      v-if="romo.foto"
      :src="`/storage/${romo.foto}`"
      alt="Foto Romo"
      class="w-full rounded shadow mb-6"
    />

    <p class="text-gray-700 mb-6">{{ romo.deskripsi }}</p>
  </div>
</template>
