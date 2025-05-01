<script setup>
import { Head } from '@inertiajs/vue3'

const props = defineProps({
  visimisi: Object, // bisa null jika belum ada data
})
</script>

<template>
  <Head :title="visimisi?.judul ?? 'Visi & Misi'" />

  <div class="max-w-3xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-semibold mb-4">
      {{ visimisi?.judul || 'Visi & Misi' }}
    </h1>

    <p v-if="visimisi" class="text-gray-700 prose-lg">
      {{ visimisi.isi }}
    </p>
    <p v-else class="text-center text-gray-500">
      Konten belum tersedia.
    </p>
  </div>
</template>
