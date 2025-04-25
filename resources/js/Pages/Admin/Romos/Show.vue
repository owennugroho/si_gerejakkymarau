<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
  romo: Object,
})
</script>

<template>
  <Head title="Detail Romos" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold text-gray-800">Detail Romos</h2>
    </template>

    <div class="py-6 max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-4">
      <Link
        :href="route('admin.romos.index')"
        class="inline-block text-blue-600 hover:underline"
      >
        ← Kembali ke Daftar
      </Link>

      <div>
        <h3 class="font-medium text-gray-700">Nama Romo</h3>
        <p class="mt-1">{{ props.romo.nama }}</p>
      </div>

      <div>
        <h3 class="font-medium text-gray-700">Deskripsi</h3>
        <p class="mt-1 whitespace-pre-line">{{ props.romo.isi }}</p>
      </div>

      <div>
        <h3 class="font-medium text-gray-700">Foto</h3>
        <img
          :src="`/storage/${props.romo.foto}`"
          alt="Foto Romo"
          class="mt-2 h-32 w-32 object-cover rounded"
        />
      </div>
    </div>
  </AuthenticatedLayout>
</template>
