<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  foto: Object, // { id, judul, deskripsi, foto, created_at, … }
})
</script>

<template>
  <Head :title="foto.judul" />

  <GuestLayout>
    <div class="container mx-auto px-4 py-12">
      <Link
        :href="route('foto-kegiatan.index')"
        class="inline-block text-gray-600 hover:underline mb-6"
      >
        ← Kembali ke Galeri
      </Link>

      <h1 class="text-3xl font-bold text-gray-900 text-center mb-8">
        {{ foto.judul }}
      </h1>

      <div class="max-w-3xl mx-auto">
        <img
          v-if="foto.foto"
          :src="`/storage/${foto.foto}`"
          alt="Foto {{ foto.judul }}"
          class="w-full rounded-lg shadow-lg mb-6"
        />

        <p class="text-gray-700 leading-relaxed mb-6">
          {{ foto.deskripsi }}
        </p>

        <p class="text-sm text-gray-500">
          Diunggah: {{ new Date(foto.created_at).toLocaleDateString() }}
        </p>
      </div>
    </div>
  </GuestLayout>
</template>

<style scoped>
/* kalau perlu override tambahan */
</style>
