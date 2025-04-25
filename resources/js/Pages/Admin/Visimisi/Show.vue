<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

const props = defineProps({ visimisi: Object })
</script>

<template>
  <Head title="Detail Visi & Misi" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Detail Visi & Misi</h2>
        <Link :href="route('admin.visimisi.index')" class="text-blue-600 hover:underline">← Kembali</Link>
      </div>
    </template>

    <div class="py-6 max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-4">
      <div>
        <h3 class="font-medium text-gray-700">Judul</h3>
        <p class="mt-1">{{ props.visimisi.judul }}</p>
      </div>
      <div>
        <h3 class="font-medium text-gray-700">Isi</h3>
        <p class="mt-1 whitespace-pre-line">{{ props.visimisi.isi }}</p>
      </div>
      <div>
        <h3 class="font-medium text-gray-700">Tanggal Dibuat</h3>
        <p class="mt-1">{{ new Date(props.visimisi.tanggal_isi).toLocaleString() }}</p>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
