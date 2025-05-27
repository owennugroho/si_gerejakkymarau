<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  stasi: Object, // di‐controller: ['stasi' => Stasi::findOrFail($id)]
})
</script>

<template>
  <Head :title="stasi.nama_stasi" />

  <GuestLayout>
    <div class="max-w-3xl mx-auto py-8 px-4">
      <h1 class="text-3xl font-semibold mb-4 text-gray-900 text-center">
        {{ stasi.nama_stasi }}
      </h1>
      <p class="text-gray-600 mb-6 text-center">
        {{ stasi.desa }} — {{ stasi.alamat }}
      </p>

      <div class="flex flex-wrap gap-4 justify-center mb-6">
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

      <div v-if="stasi.deskripsi" class="prose prose-lg mx-auto text-gray-800 mb-6">
        <div v-html="stasi.deskripsi"></div>
      </div>

      <div class="text-gray-800 space-y-1">
        <div><span class="font-medium">Umat Laki:</span> {{ stasi.umat_laki }}</div>
        <div><span class="font-medium">Umat Perempuan:</span> {{ stasi.umat_perempuan }}</div>
      </div>
    </div>
  </GuestLayout>
</template>
