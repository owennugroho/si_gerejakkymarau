<script setup>
import { Head } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  donasis: Array,
})
</script>

<template>
  <Head title="Donasi" />

  <GuestLayout>
    <div class="mx-auto max-w-7xl px-4 py-8">
      <h1 class="text-3xl font-bold mb-6">Donasi</h1>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="don in donasis"
          :key="don.id"
          class="bg-white rounded-lg shadow p-6 flex flex-col"
        >
          <h2 class="text-xl font-semibold mb-2">{{ don.judul }}</h2>
          <p class="text-gray-600 mb-4">{{ don.deskripsi }}</p>

          <div v-if="don.qris_image" class="mb-4">
            <img
              :src="`/storage/${don.qris_image}`"
              alt="QRIS Donasi"
              class="w-full h-48 object-contain rounded"
            />
          </div>

          <div class="mt-auto text-sm text-gray-500">
            <span>ID: {{ don.id }}</span>
          </div>
        </div>
      </div>

      <div v-if="!donasis.length" class="text-center text-gray-500 mt-12">
        Belum ada data donasi.
      </div>
    </div>
  </GuestLayout>
</template>

<style scoped>
/* Tambahkan styling khusus jika diperlukan */
</style>
