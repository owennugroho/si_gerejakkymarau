<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  stasis: Array, // di‐controller: ['stasis' => Stasi::all()]
})
</script>

<template>
  <Head title="Daftar Stasi" />

  <GuestLayout>
    <div class="container mx-auto py-8 px-4">
      <h1 class="text-3xl md:text-4xl font-bold mb-6 text-center text-amber-500">
        Daftar Stasi
      </h1>

      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <div
          v-for="s in stasis"
          :key="s.id"
          class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden"
        >
          <!-- Foto Gereja -->
          <div class="h-48 bg-gray-100 overflow-hidden">
            <img
              v-if="s.foto_gereja"
              :src="`/storage/${s.foto_gereja}`"
              alt="Foto Stasi"
              class="w-full h-full object-cover"
            />
            <div v-else class="w-full h-full flex items-center justify-center text-gray-400">
              No Image
            </div>
          </div>

          <!-- Body Card -->
          <div class="p-4">
            <h2 class="text-xl font-medium mb-2 text-gray-900">{{ s.nama_stasi }}</h2>
            <p class="text-sm text-gray-600 line-clamp-3 mb-4">
              {{ s.deskripsi || 'Tidak ada deskripsi.' }}
            </p>
            <div class="mt-auto text-right">
              <Link
                :href="route('stasi.show', s.id)"
                class="text-blue-600 hover:underline"
              >
                Lihat Detail →
              </Link>
            </div>
          </div>
        </div>

        <div v-if="!stasis.length" class="col-span-full text-center text-gray-500 py-12">
          Belum ada data Stasi.
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
