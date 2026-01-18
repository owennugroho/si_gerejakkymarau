<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  foto: Object,
})
</script>

<template>

  <Head :title="foto.judul" />

  <GuestLayout>
    <section class="max-w-4xl mx-auto py-16 px-6">

      <!-- Judul -->
      <h1 class="text-3xl md:text-4xl font-bold text-center text-amber-600 mb-8">
        {{ foto.judul }}
      </h1>

      <div class="max-w-3xl mx-auto space-y-6">

        <!-- Foto -->
        <img v-if="foto.foto" :src="`/storage/${foto.foto}`" :alt="foto.judul" class="w-full rounded-lg shadow-md" />

        <div class="text-gray-800 leading-relaxed text-justify space-y-4">
          <p v-html="foto.deskripsi"></p>
        </div>

        <!-- Tanggal -->
        <p class="text-sm text-gray-500 text-center mt-6">
          Diunggah: {{ new Date(foto.created_at).toLocaleDateString('id-ID') }}
        </p>
      </div>

      <div class="mt-10 text-center">
        <Link :href="route('foto-kegiatan.index')"
          class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
          Kembali ke Foto Kegiatan
        </Link>
      </div>

    </section>
  </GuestLayout>
</template>
