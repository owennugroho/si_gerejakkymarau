<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
  stasi: Object
})
</script>

<template>
  <Head title="Detail Stasi" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Detail Stasi</h2>
        <Link
          :href="route('admin.stasi.index')"
          class="text-blue-600 hover:underline"
        >
          ← Kembali
        </Link>
      </div>
    </template>

    <div class="py-6 max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-4">
      <div>
        <h3 class="font-medium text-gray-700">Nama Stasi</h3>
        <p class="mt-1">{{ props.stasi.nama_stasi }}</p>
      </div>
      <div>
        <h3 class="font-medium text-gray-700">Desa</h3>
        <p class="mt-1">{{ props.stasi.desa }}</p>
      </div>
      <div>
        <h3 class="font-medium text-gray-700">Alamat</h3>
        <p class="mt-1">{{ props.stasi.alamat }}</p>
      </div>
      <div>
        <h3 class="font-medium text-gray-700">Deskripsi</h3>
        <p class="mt-1 whitespace-pre-line">{{ props.stasi.deskripsi }}</p>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <h3 class="font-medium text-gray-700">Umat Laki-laki</h3>
          <p class="mt-1">{{ props.stasi.umat_laki }}</p>
        </div>
        <div>
          <h3 class="font-medium text-gray-700">Umat Perempuan</h3>
          <p class="mt-1">{{ props.stasi.umat_perempuan }}</p>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <h3 class="font-medium text-gray-700">Foto Gereja</h3>
          <img
            v-if="props.stasi.foto_gereja"
            :src="`/storage/${props.stasi.foto_gereja}`"
            alt="Foto Gereja"
            class="mt-2 h-32 w-32 object-cover rounded"
          />
        </div>
        <div>
          <h3 class="font-medium text-gray-700">Foto Tanah</h3>
          <img
            v-if="props.stasi.foto_tanah"
            :src="`/storage/${props.stasi.foto_tanah}`"
            alt="Foto Tanah"
            class="mt-2 h-32 w-32 object-cover rounded"
          />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
