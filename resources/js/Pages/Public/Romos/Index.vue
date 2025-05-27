<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  romos: Array,
})
</script>

<template>

  <Head title="Daftar Romo" />

  <GuestLayout>
    <div class="container mx-auto py-8 px-4">
      <h1 class="text-3xl md:text-4xl font-bold mb-6 text-center text-amber-500">Daftar Romo</h1>

      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <div v-for="r in romos" :key="r.id"
          class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
          <!-- Foto Romo -->
          <div class="h-48 bg-gray-100 overflow-hidden">
            <img v-if="r.foto" :src="`/storage/${r.foto}`" alt="Foto {{ r.nama }}" class="w-full h-full object-cover" />
            <div v-else class="w-full h-full flex items-center justify-center text-gray-400">
              No Image
            </div>
          </div>

          <!-- Body Card -->
          <div class="p-4">
            <h2 class="text-xl font-medium mb-2">{{ r.nama }}</h2>
            <p class="text-sm text-gray-600 line-clamp-3">
              {{ r.deskripsi || 'Tidak ada deskripsi.' }}
            </p>
            <div class="mt-4 text-right">
              <Link :href="route('romos.show', r.id)" class="text-blue-600 hover:underline">
              Lihat Detail →
              </Link>
            </div>
          </div>
        </div>

        <div v-if="!romos.length" class="col-span-full text-center text-gray-500 py-12">
          Belum ada data Romo.
        </div>
      </div>
    </div>
  </GuestLayout>
</template>

<style scoped>
</style>
