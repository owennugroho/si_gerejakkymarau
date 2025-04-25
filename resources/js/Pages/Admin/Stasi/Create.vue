<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
  nama_stasi: '',
  desa: '',
  alamat: '',
  deskripsi: '',
  umat_laki: 0,
  umat_perempuan: 0,
  foto_gereja: null,
  foto_tanah: null,
})

function submit() {
  form.post(route('admin.stasi.store'), { preserveScroll: true })
}
</script>

<template>
  <Head title="Tambah Stasi" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Tambah Stasi</h2>
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
        <div>
          <label class="block font-medium text-gray-700">Nama Stasi</label>
          <input
            v-model="form.nama_stasi"
            type="text"
            class="mt-1 block w-full border-gray-300 rounded"
          />
          <p v-if="form.errors.nama_stasi" class="text-red-600 text-sm">{{ form.errors.nama_stasi }}</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block font-medium text-gray-700">Desa</label>
            <input
              v-model="form.desa"
              type="text"
              class="mt-1 block w-full border-gray-300 rounded"
            />
            <p v-if="form.errors.desa" class="text-red-600 text-sm">{{ form.errors.desa }}</p>
          </div>
          <div>
            <label class="block font-medium text-gray-700">Alamat</label>
            <input
              v-model="form.alamat"
              type="text"
              class="mt-1 block w-full border-gray-300 rounded"
            />
            <p v-if="form.errors.alamat" class="text-red-600 text-sm">{{ form.errors.alamat }}</p>
          </div>
        </div>

        <div>
          <label class="block font-medium text-gray-700">Deskripsi</label>
          <textarea
            v-model="form.deskripsi"
            rows="3"
            class="mt-1 block w-full border-gray-300 rounded"
          ></textarea>
          <p v-if="form.errors.deskripsi" class="text-red-600 text-sm">{{ form.errors.deskripsi }}</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block font-medium text-gray-700">Umat Laki-laki</label>
            <input
              v-model="form.umat_laki"
              type="number"
              min="0"
              class="mt-1 block w-full border-gray-300 rounded"
            />
            <p v-if="form.errors.umat_laki" class="text-red-600 text-sm">{{ form.errors.umat_laki }}</p>
          </div>
          <div>
            <label class="block font-medium text-gray-700">Umat Perempuan</label>
            <input
              v-model="form.umat_perempuan"
              type="number"
              min="0"
              class="mt-1 block w-full border-gray-300 rounded"
            />
            <p v-if="form.errors.umat_perempuan" class="text-red-600 text-sm">{{ form.errors.umat_perempuan }}</p>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block font-medium text-gray-700">Foto Gereja</label>
            <input
              @change="e => form.foto_gereja = e.target.files[0]"
              type="file"
              accept="image/*"
              class="mt-1 block w-full"
            />
            <p v-if="form.errors.foto_gereja" class="text-red-600 text-sm">{{ form.errors.foto_gereja }}</p>
          </div>
          <div>
            <label class="block font-medium text-gray-700">Foto Tanah</label>
            <input
              @change="e => form.foto_tanah = e.target.files[0]"
              type="file"
              accept="image/*"
              class="mt-1 block w-full"
            />
            <p v-if="form.errors.foto_tanah" class="text-red-600 text-sm">{{ form.errors.foto_tanah }}</p>
          </div>
        </div>

        <button
          type="submit"
          :disabled="form.processing"
          class="w-full py-2 bg-green-600 text-white rounded hover:bg-green-700 disabled:opacity-50"
        >
          Simpan
        </button>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
