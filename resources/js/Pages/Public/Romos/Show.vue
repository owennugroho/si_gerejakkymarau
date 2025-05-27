<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  romo: Object,
})
</script>

<template>
  <Head :title="romo.nama" />

  <GuestLayout>
    <div class="max-w-3xl mx-auto py-8 px-4 text-center">
      <!-- Judul Center -->
      <h1 class="text-4xl font-semibold mb-6">{{ romo.nama }}</h1>

      <!-- Foto Romo -->
      <div class="mb-6">
        <img
          v-if="romo.foto"
          :src="`/storage/${romo.foto}`"
          alt="Foto {{ romo.nama }}"
          class="mx-auto w-48 h-48 object-cover rounded-full shadow"
        />
        <div v-else class="w-48 h-48 mx-auto flex items-center justify-center bg-gray-100 rounded-full text-gray-400">
          No Image
        </div>
      </div>

      <!-- Deskripsi -->
      <div class="prose prose-lg mx-auto text-left">
        <div v-if="romo.deskripsi" v-html="romo.deskripsi"></div>
        <p v-else class="text-gray-500">Deskripsi belum tersedia.</p>
      </div>

      <!-- Kembali -->
      <div class="mt-8">
        <Link
          :href="route('romos.index')"
          class="text-blue-600 hover:underline"
        >
          ← Kembali ke Daftar Romo
        </Link>
      </div>
    </div>
  </GuestLayout>
</template>

<style scoped>
/* tambahan styling jika perlu */
</style>
