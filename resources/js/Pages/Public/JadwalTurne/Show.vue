<script setup>
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({
  jadwal: Object,
})
</script>

<template>
  <Head :title="`Jadwal — ${jadwal.lokasi}`" />

  <div class="container mx-auto py-8 px-4">
    <Link href="/jadwal-turne" class="text-blue-600 hover:underline mb-4 inline-block">
      ← Kembali ke Jadwal
    </Link>

    <h1 class="text-3xl font-bold">{{ jadwal.lokasi }}</h1>
    <p class="text-gray-600 mb-4">
      {{ new Date(jadwal.tanggal).toLocaleDateString() }} — {{ jadwal.hari }} pukul {{ jadwal.jam_mulai }}
    </p>
    <p class="text-gray-700 mb-4">
      Romo: {{ jadwal.romo.nama }}
    </p>
    <div class="prose">
      <p v-if="jadwal.deskripsi">{{ jadwal.deskripsi }}</p>
      <p v-else class="text-gray-500">Tiada deskripsi.</p>
    </div>
  </div>
</template>
