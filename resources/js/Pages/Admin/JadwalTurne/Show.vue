<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({
  jadwalTurne: Object
})
</script>

<template>
  <Head title="Detail Jadwal Turne" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Detail Jadwal Turne</h2>
        <Link :href="route('admin.jadwal-turne.index')" class="text-blue-600 hover:underline">← Kembali</Link>
      </div>
    </template>

    <div class="py-6 max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-4">
      <div>
        <h3 class="font-medium text-gray-700">Lokasi</h3>
        <p class="mt-1">{{ props.jadwalTurne.lokasi }}</p>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <h3 class="font-medium text-gray-700">Tanggal</h3>
          <p class="mt-1">{{ props.jadwalTurne.tanggal }}</p>
        </div>
        <div>
          <h3 class="font-medium text-gray-700">Hari</h3>
          <p class="mt-1">{{ props.jadwalTurne.hari }}</p>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <h3 class="font-medium text-gray-700">Jam Mulai</h3>
          <p class="mt-1">{{ props.jadwalTurne.jam_mulai }}</p>
        </div>
        <div>
          <h3 class="font-medium text-gray-700">Romo</h3>
          <p class="mt-1">{{ props.jadwalTurne.romo.nama }}</p>
        </div>
      </div>
      <div>
        <h3 class="font-medium text-gray-700">Deskripsi</h3>
        <p class="mt-1 whitespace-pre-line">{{ props.jadwalTurne.deskripsi }}</p>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
