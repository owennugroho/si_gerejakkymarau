<script setup>
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  infos: Array,
});
</script>

<template>
  <div class="container mx-auto py-8 px-4">
    <Head title="Informasi Gereja" />

    <h1 class="text-3xl font-bold mb-6">Informasi Gereja</h1>

    <div class="space-y-8">
      <div
        v-for="info in infos"
        :key="info.id"
        class="bg-white shadow rounded-lg p-6"
      >
        <h2 class="text-2xl font-semibold mb-2">{{ info.judul }}</h2>
        <p class="text-gray-700">
          {{ info.isi.length > 200 ? info.isi.substr(0, 200) + '…' : info.isi }}
        </p>
      </div>

      <div v-if="!infos.length" class="text-center text-gray-500">
        Belum ada informasi tersedia.
      </div>
    </div>
  </div>
</template>

<style scoped>
/* tambahkan styling khusus jika perlu */
</style>
