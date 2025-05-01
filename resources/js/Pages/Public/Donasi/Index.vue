<script setup>
const props = defineProps({
  donasis: Array,
});
</script>

<template>
  <div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Donasi</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div
        v-for="don in donasis"
        :key="don.id"
        class="bg-white rounded-lg shadow p-4 flex flex-col"
      >
        <h2 class="text-xl font-semibold mb-2">{{ don.judul }}</h2>
        <p class="text-gray-600 mb-4">{{ don.deskripsi }}</p>

        <div v-if="don.foto" class="mb-4">
          <img
            :src="`/storage/${don.foto}`"
            alt="Foto donasi"
            class="w-full h-48 object-cover rounded"
          />
        </div>

        <div class="mt-auto">
          <span class="text-sm text-gray-500">ID: {{ don.id }}</span>
        </div>
      </div>
    </div>

    <div v-if="!donasis.length" class="text-center text-gray-500 mt-12">
      Belum ada data donasi.
    </div>
  </div>
</template>

<style scoped>
/* kalau ada styling khusus, taruh di sini */
</style>
