<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  fotos: {
    type: Array,
    default: () => [],
  },
})
</script>

<template>

  <Head title="Galeri Foto Kegiatan" />

  <GuestLayout>
    <div class="container mx-auto px-4 py-12">
      <h1 class="text-4xl font-bold text-center text-green-800 mb-10">
        Galeri Foto Kegiatan
      </h1>

      <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        <template v-if="fotos.length">
          <Link v-for="f in fotos" :key="f.id" :href="route('foto-kegiatan.show', f.id)"
            class="group block bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition">
            <!-- Thumbnail -->
            <div class="h-48 overflow-hidden">
              <img v-if="f.foto" :src="`/storage/${f.foto}`" alt="Foto {{ f.judul }}"
                class="w-full h-full object-cover" />
              <div v-else class="flex h-full items-center justify-center bg-gray-100 text-gray-400">
                No Image
              </div>
            </div>

            <!-- Card body -->
            <div class="p-5 flex flex-col h-full">
              <h2 class="text-xl font-semibold text-gray-800 mb-3">
                {{ f.judul }}
              </h2>
              <p class="text-gray-600 text-sm mb-5 line-clamp-3">
                {{ f.deskripsi }}
              </p>
              <div class="mt-auto text-right">
                <span class="text-indigo-600 group-hover:text-indigo-800 font-medium">
                  Lihat Detail →
                </span>
              </div>
            </div>
          </Link>
        </template>

        <div v-else class="col-span-full text-center text-gray-500 py-16">
          Belum ada foto kegiatan.
        </div>
      </div>
    </div>
  </GuestLayout>
</template>

<style scoped></style>
