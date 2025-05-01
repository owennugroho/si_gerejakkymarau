<script setup>
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  romos: Array, // [{ id, nama, foto, ... }, …]
});
</script>

<template>
  <Head title="Daftar Romos" />

  <div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-6">Profil Romo</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div
        v-for="r in romos"
        :key="r.id"
        class="bg-white rounded shadow overflow-hidden"
      >
        <img
          v-if="r.foto"
          :src="`/storage/${r.foto}`"
          alt="Foto Romo"
          class="h-48 w-full object-cover"
        />
        <div class="p-4">
          <h2 class="font-semibold mb-2">{{ r.nama }}</h2>
          <Link
            :href="route('romos.show', r.id)"
            class="text-blue-600 hover:underline"
          >Lihat Profil →</Link>
        </div>
      </div>
    </div>

    <div v-if="!romos.length" class="text-center text-gray-500 py-10">
      Belum ada data Romo.
    </div>
  </div>
</template>
