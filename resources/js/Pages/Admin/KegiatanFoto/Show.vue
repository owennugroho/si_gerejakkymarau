<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({ kegiatanfoto: Object })
</script>

<template>
  <Head title="Detail Foto Kegiatan" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold">Detail Foto Kegiatan</h2>
    </template>

    <div class="py-6">
      <div class="mx-auto max-w-3xl sm:px-6 lg:px-8 bg-white p-6 shadow rounded-lg space-y-4">
        <div><strong>Judul:</strong> {{ kegiatanfoto.judul }}</div>
        <div><strong>Deskripsi:</strong>
          <p class="mt-1">{{ kegiatanfoto.deskripsi }}</p>
        </div>
        <div>
          <strong>Foto:</strong>
          <img
            :src="`/storage/${kegiatanfoto.foto}`"
            class="mt-2 max-w-full h-auto rounded"
            alt="Foto Kegiatan"
          />
        </div>
        <div class="mt-4">
          <Link
            :href="route('admin.kegiatan-foto.index')"
            class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400"
          >Kembali</Link>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
