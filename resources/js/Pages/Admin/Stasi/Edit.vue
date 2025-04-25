<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
  stasi: Object
})

const form = useForm({
  nama_stasi:    props.stasi.nama_stasi,
  desa:          props.stasi.desa,
  alamat:        props.stasi.alamat,
  deskripsi:     props.stasi.deskripsi,
  umat_laki:     props.stasi.umat_laki,
  umat_perempuan:props.stasi.umat_perempuan,
  foto_gereja:   null,
  foto_tanah:    null,
})

function submit() {
  form.post(route('admin.stasi.update', props.stasi.id), {
    _method: 'patch',
    preserveScroll: true,
  })
}
</script>

<template>
  <Head title="Edit Stasi" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Edit Stasi</h2>
        <Link
          :href="route('admin.stasi.index')"
          class="text-blue-600 hover:underline"
        >
          ← Kembali
        </Link>
      </div>
    </template>

    <div class="py-6 max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-6">
      <form @submit.prevent="submit" class="space-y-4">
        <!-- sama persis dengan Create.vue, hanya prefilled dan menampilkan thumbnail -->
        <!-- Nama, Desa, Alamat, Deskripsi, Umat, Foto Gereja, Foto Tanah -->
        <!-- ... gunakan struktur Create.vue di atas ... -->

        <!-- Contoh salah satu field: -->
        <div>
          <label class="block font-medium text-gray-700">Nama Stasi</label>
          <input
            v-model="form.nama_stasi"
            type="text"
            class="mt-1 block w-full border-gray-300 rounded"
          />
          <p v-if="form.errors.nama_stasi" class="text-red-600">{{ form.errors.nama_stasi }}</p>
        </div>

        <!-- Thumbnail foto lama -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <h3 class="font-medium mb-1">Foto Gereja Sekarang</h3>
            <img
              v-if="props.stasi.foto_gereja"
              :src="`/storage/${props.stasi.foto_gereja}`"
              class="h-24 w-24 object-cover rounded"
            />
          </div>
          <div>
            <h3 class="font-medium mb-1">Foto Tanah Sekarang</h3>
            <img
              v-if="props.stasi.foto_tanah"
              :src="`/storage/${props.stasi.foto_tanah}`"
              class="h-24 w-24 object-cover rounded"
            />
          </div>
        </div>

        <!-- tombol -->
        <button
          type="submit"
          :disabled="form.processing"
          class="w-full py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 disabled:opacity-50"
        >
          Update
        </button>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
