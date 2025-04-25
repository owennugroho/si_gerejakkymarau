<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

const form = useForm({
  judul: '',
  penulis: '',
  kutipan: '',
  foto: null,
  isi: '',
})

function onFileChange(e) {
  form.foto = e.target.files[0]
}

function submit() {
  // this must point to the STORE route, not CREATE
  form.post(route('admin.berita.store'))
}
</script>

<template>
  <Head title="Tambah Berita" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tambah Berita
      </h2>
    </template>

    <div class="py-6">
      <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
        <form @submit.prevent="submit"
              enctype="multipart/form-data"
              class="space-y-6 bg-white p-6 shadow rounded-lg">

          <!-- Judul -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Judul</label>
            <input v-model="form.judul" type="text"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            <div v-if="form.errors.judul" class="text-red-600 text-sm">
              {{ form.errors.judul }}
            </div>
          </div>

          <!-- Penulis -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Penulis</label>
            <input v-model="form.penulis" type="text"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            <div v-if="form.errors.penulis" class="text-red-600 text-sm">
              {{ form.errors.penulis }}
            </div>
          </div>

          <!-- Kutipan -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Kutipan</label>
            <input v-model="form.kutipan" type="text"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            <div v-if="form.errors.kutipan" class="text-red-600 text-sm">
              {{ form.errors.kutipan }}
            </div>
          </div>

          <!-- Foto -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Foto</label>
            <input type="file" @change="onFileChange"
                   class="mt-1 block w-full" />
            <div v-if="form.errors.foto" class="text-red-600 text-sm">
              {{ form.errors.foto }}
            </div>
          </div>

          <!-- Isi -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Isi</label>
            <textarea v-model="form.isi" rows="6"
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            <div v-if="form.errors.isi" class="text-red-600 text-sm">
              {{ form.errors.isi }}
            </div>
          </div>

          <!-- Buttons -->
          <div class="flex space-x-2">
            <button type="submit"
                    :disabled="form.processing"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 disabled:opacity-50">
              Simpan
            </button>
            <Link :href="route('admin.berita.index')"
                  class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
              Batal
            </Link>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
