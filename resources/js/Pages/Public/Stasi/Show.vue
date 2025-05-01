<script setup>
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  stasi: Object, 
});
</script>

<template>
  <Head :title="stasi.nama_stasi" />

  <div class="max-w-3xl mx-auto py-8 px-4">
    <Link href="/stasi" class="text-gray-600 hover:underline mb-4 inline-block">
      ← Kembali ke Daftar
    </Link>

    <h1 class="text-3xl font-semibold mb-4">{{ stasi.nama_stasi }}</h1>
    <p class="text-gray-600 mb-2">{{ stasi.desa }} — {{ stasi.alamat }}</p>

    <div class="flex flex-wrap gap-4 mb-6">
      <img
        v-if="stasi.foto_gereja"
        :src="`/storage/${stasi.foto_gereja}`"
        alt="Foto Gereja"
        class="w-48 h-32 object-cover rounded"
      />
      <img
        v-if="stasi.foto_tanah"
        :src="`/storage/${stasi.foto_tanah}`"
        alt="Foto Tanah"
        class="w-48 h-32 object-cover rounded"
      />
    </div>

    <p class="text-gray-700 mb-4">{{ stasi.deskripsi }}</p>

    <div class="text-gray-800">
      <span class="font-medium">Umat Laki:</span> {{ stasi.umat_laki }}<br/>
      <span class="font-medium">Umat Perempuan:</span> {{ stasi.umat_perempuan }}
    </div>
  </div>
</template>
