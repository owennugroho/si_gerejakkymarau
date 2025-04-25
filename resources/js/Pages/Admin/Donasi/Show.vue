<script setup>
import { Head, Link } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

const props = defineProps({
  donasi: Object
})
</script>

<template>
  <Head title="Detail Donasi" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl">Detail Donasi</h2>
    </template>

    <div class="p-6 bg-white rounded-lg shadow space-y-4">
      <div>
        <strong>Nama Bank:</strong> {{ donasi.nama_bank }}
      </div>
      <div>
        <strong>Nomor Rekening:</strong> {{ donasi.nomor_rekening }}
      </div>
      <div>
        <strong>Atas Nama:</strong> {{ donasi.atas_nama }}
      </div>
      <div>
        <strong>QRIS:</strong>
        <img
          v-if="donasi.qris_image"
          :src="`/storage/${donasi.qris_image}`"
          alt="QRIS"
          class="h-24"
        />
      </div>
      <div>
        <strong>Keterangan:</strong>
        <p>{{ donasi.keterangan }}</p>
      </div>
      <div class="pt-4">
        <Link
          class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600"
          :href="route('admin.donasi.index')"
        >
          Kembali
        </Link>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
