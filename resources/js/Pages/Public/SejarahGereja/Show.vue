<script setup>
import { Head } from '@inertiajs/vue3'

const props = defineProps({
  history: Object, // { judul, isi, created_at, … }
})
</script>

<template>
  <Head :title="history?.judul ?? 'Sejarah Gereja'" />

  <div class="max-w-3xl mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-4">
      {{ history?.judul || 'Sejarah Gereja' }}
    </h1>
    <p class="text-gray-500 text-sm mb-6">
      {{ history
          ? new Date(history.created_at).toLocaleDateString()
          : '' }}
    </p>
    <div v-if="history" class="prose prose-lg">
      {{ history.isi }}
    </div>
    <div v-else class="text-center text-gray-500">
      Belum ada konten sejarah gereja.
    </div>
  </div>
</template>
