<script setup>
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  fotos: Array, // array of { id, judul, deskripsi, foto, created_at, ... }
});
</script>

<template>
  <Head title="Foto Kegiatan"/>

  <div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl mb-6">Galeri Foto Kegiatan</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div v-for="f in fotos" :key="f.id" class="bg-white rounded shadow overflow-hidden">
        <img
          :src="`/storage/${f.foto}`"
          alt=""
          class="h-48 w-full object-cover"
        />
        <div class="p-4">
          <h2 class="font-semibold mb-2">{{ f.judul }}</h2>
          <p class="text-sm text-gray-600">{{ f.deskripsi.substr(0, 80) }}…</p>
          <Link
            :href="route('foto-kegiatan.show', f.id)"
            class="mt-3 inline-block text-blue-600 hover:underline"
          >Lihat Detail →</Link>
        </div>
      </div>
    </div>

    <div v-if="!fotos.length" class="text-center text-gray-500 py-10">
      Belum ada foto kegiatan.
    </div>
  </div>
</template>
