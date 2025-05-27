<script setup>
import { Head } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

// ambil prop yang dikirim controller
const props = defineProps({
  sejarahGereja: Object,
})
</script>

<template>
  <Head :title="sejarahGereja?.judul ?? 'Sejarah Gereja'" />

  <GuestLayout>
    <div class="max-w-3xl mx-auto py-12 px-6">
      <!-- Judul -->
      <h1
        class="text-3xl md:text-4xl font-bold mb-6 text-center text-amber-500"
      >
        {{ sejarahGereja?.judul || 'Sejarah Gereja' }}
      </h1>

      <!-- Konten isi -->
      <div v-if="sejarahGereja" class="prose prose-lg mx-auto text-green-800">
        <div v-html="sejarahGereja.isi"></div>
      </div>

      <!-- Fallback -->
      <div v-else class="text-center text-gray-500 mt-12">
        Belum ada konten sejarah gereja.
      </div>
    </div>
  </GuestLayout>
</template>

<style scoped>
/* Tidak perlu tambahan; semua styling via Tailwind */
</style>
