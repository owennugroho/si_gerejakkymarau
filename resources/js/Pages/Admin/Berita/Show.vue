<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({
  berita: Object,
})
</script>

<template>
  <Head title="Detail Berita" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Detail Berita
      </h2>
    </template>

    <div class="py-6">
      <div class="mx-auto max-w-3xl sm:px-6 lg:px-8 bg-white p-6 shadow rounded-lg space-y-4">
        <div>
          <h3 class="text-lg font-medium text-gray-700">Judul</h3>
          <p class="mt-1 text-gray-900">{{ props.berita.judul }}</p>
        </div>
        <div>
          <h3 class="text-lg font-medium text-gray-700">Kutipan</h3>
          <p class="mt-1 text-gray-900">{{ props.berita.kutipan }}</p>
        </div>
        <div v-if="props.berita.foto">
          <h3 class="text-lg font-medium text-gray-700">Foto</h3>
          <img :src="`/storage/${props.berita.foto}`" class="mt-2 max-w-xs rounded" />
        </div>
        <div>
          <h3 class="text-lg font-medium text-gray-700">Isi</h3>
          <p class="mt-1 text-gray-900 whitespace-pre-line">{{ props.berita.isi }}</p>
        </div>
        <div class="mt-6">
          <Link
            :href="route('admin.berita.index')"
            class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400"
          >
            Kembali
          </Link>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
