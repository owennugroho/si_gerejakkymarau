<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
  stasi: Object,
})

const form = useForm({
  nama_stasi: props.stasi.nama_stasi,
  desa: props.stasi.desa,
  alamat: props.stasi.alamat,
  deskripsi: props.stasi.deskripsi,
  umat_laki: props.stasi.umat_laki,
  umat_perempuan: props.stasi.umat_perempuan,
  foto_gereja: null,
  foto_tanah: null,
})

function submit() {
  form.transform(data => ({
    ...data,
    _method: 'patch',
  })).post(route('admin.stasi.update', props.stasi.id), {
    forceFormData: true,
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
        <Link :href="route('admin.stasi.index')" class="text-blue-600 hover:underline">
          ← Kembali
        </Link>
      </div>
    </template>

    <div class="py-6 max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-6">
      <form @submit.prevent="submit" class="space-y-4">

        <!-- Nama -->
        <div>
          <label class="block font-medium text-gray-700">Nama Stasi</label>
          <input v-model="form.nama_stasi" type="text" class="mt-1 block w-full border-gray-300 rounded" />
          <p v-if="form.errors.nama_stasi" class="text-red-600 text-sm">{{ form.errors.nama_stasi }}</p>
        </div>

        <!-- Desa & Alamat -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block font-medium text-gray-700">Desa</label>
            <input v-model="form.desa" type="text" class="mt-1 block w-full border-gray-300 rounded" />
          </div>
          <div>
            <label class="block font-medium text-gray-700">Alamat</label>
            <input v-model="form.alamat" type="text" class="mt-1 block w-full border-gray-300 rounded" />
          </div>
        </div>

        <!-- Deskripsi -->
        <div>
          <label class="block font-medium text-gray-700">Deskripsi</label>
          <textarea v-model="form.deskripsi" rows="3" class="mt-1 block w-full border-gray-300 rounded"></textarea>
        </div>

        <!-- Umat -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block font-medium text-gray-700">Umat Laki-laki</label>
            <input v-model="form.umat_laki" type="number" min="0" class="mt-1 block w-full border-gray-300 rounded" />
          </div>
          <div>
            <label class="block font-medium text-gray-700">Umat Perempuan</label>
            <input v-model="form.umat_perempuan" type="number" min="0"
              class="mt-1 block w-full border-gray-300 rounded" />
          </div>
        </div>

        <!-- Foto lama -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <p class="font-medium">Foto Gereja Sekarang</p>
            <img v-if="props.stasi.foto_gereja" :src="`/storage/${props.stasi.foto_gereja}`" class="h-24 rounded" />
          </div>
          <div>
            <p class="font-medium">Foto Tanah Sekarang</p>
            <img v-if="props.stasi.foto_tanah" :src="`/storage/${props.stasi.foto_tanah}`" class="h-24 rounded" />
          </div>
        </div>

        <!-- Upload baru -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block font-medium text-gray-700">Ganti Foto Gereja</label>
            <input @change="e => form.foto_gereja = e.target.files[0]" type="file" accept="image/*" />
          </div>
          <div>
            <label class="block font-medium text-gray-700">Ganti Foto Tanah</label>
            <input @change="e => form.foto_tanah = e.target.files[0]" type="file" accept="image/*" />
          </div>
        </div>

        <!-- Tombol -->
        <button type="submit" :disabled="form.processing"
          class="w-full py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 disabled:opacity-50">
          Update
        </button>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
