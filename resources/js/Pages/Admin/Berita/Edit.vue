<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

const props = defineProps({
  berita: Object,
})

const form = useForm({
  judul: props.berita.judul,
  penulis: props.berita.penulis,
  kutipan: props.berita.kutipan,
  foto: null,
  isi: props.berita.isi,
})

function onFileChange(e) {
  form.foto = e.target.files[0]
}

function submit() {
  form.transform(data => ({
    ...data,
    _method: 'patch',
  })).post(route('admin.berita.update', props.berita.id), {
    forceFormData: true,
    preserveScroll: true,
  })
}
</script>

<template>
  <Head title="Edit Berita" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800">Edit Berita</h2>
    </template>

    <div class="py-6">
      <div class="mx-auto max-w-3xl">
        <form
          @submit.prevent="submit"
          enctype="multipart/form-data"
          class="space-y-6 bg-white p-6 shadow rounded-lg"
        >

          <!-- Judul -->
          <div>
            <label class="block text-sm font-medium">Judul</label>
            <input v-model="form.judul" type="text" class="w-full border rounded p-2" />
          </div>

          <!-- Penulis -->
          <div>
            <label class="block text-sm font-medium">Penulis</label>
            <input v-model="form.penulis" type="text" class="w-full border rounded p-2" />
          </div>

          <!-- Kutipan -->
          <div>
            <label class="block text-sm font-medium">Kutipan</label>
            <input v-model="form.kutipan" type="text" class="w-full border rounded p-2" />
          </div>

          <!-- Foto Lama -->
          <div v-if="props.berita.foto">
            <label class="block text-sm font-medium">Foto Saat Ini</label>
            <img :src="`/storage/${props.berita.foto}`" class="h-32 rounded mb-2" />
          </div>

          <!-- Foto Baru -->
          <div>
            <label class="block text-sm font-medium">Ganti Foto (opsional)</label>
            <input type="file" @change="onFileChange" />
          </div>

          <!-- Isi -->
          <div>
            <label class="block text-sm font-medium">Isi</label>
            <textarea v-model="form.isi" rows="6" class="w-full border rounded p-2"></textarea>
          </div>

          <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">
              Update
            </button>
            <Link :href="route('admin.berita.index')" class="px-4 py-2 bg-gray-300 rounded">
              Batal
            </Link>
          </div>

        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
