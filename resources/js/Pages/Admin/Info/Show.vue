<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({
  info: {
    type: Object,
    required: true,
  },
})
</script>

<template>
  <Head :title="props.info.judul" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Detail Info</h2>
        <Link
          :href="route('admin.info.index')"
          class="text-blue-600 hover:underline"
        >
          ← Kembali
        </Link>
      </div>
    </template>

    <div class="py-6 max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-4">
      <div>
        <h3 class="text-sm font-medium text-gray-700">Judul</h3>
        <p class="mt-1 text-gray-900">{{ props.info.judul }}</p>
      </div>
      <div>
        <h3 class="text-sm font-medium text-gray-700">Isi</h3>
        <div class="mt-1 prose whitespace-pre-line text-gray-800">{{ props.info.isi }}</div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
