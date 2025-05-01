<script setup>
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  stasis: Array, // [{id, nama_stasi, desa, alamat, umat_laki, umat_perempuan, foto_gereja, foto_tanah, ...},…]
});
</script>

<template>
  <Head title="Daftar Stasi" />

  <div class="max-w-4xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-semibold mb-6">Daftar Stasi</h1>

    <ul class="space-y-4">
      <li
        v-for="s in stasis"
        :key="s.id"
        class="border rounded-lg p-4 hover:shadow transition"
      >
        <Link
          :href="route('stasi.show', s.id)"
          class="text-xl font-medium text-blue-600 hover:underline"
        >
          {{ s.nama_stasi }}
        </Link>
        <p class="text-gray-600">
          {{ s.desa }} — {{ s.alamat }}
        </p>
        <p class="text-gray-700 mt-2">
          Umat: Laki {{ s.umat_laki }}, Perempuan {{ s.umat_perempuan }}
        </p>
      </li>
    </ul>

    <div v-if="!stasis.length" class="text-center text-gray-500 py-10">
      Belum ada data Stasi.
    </div>
  </div>
</template>
