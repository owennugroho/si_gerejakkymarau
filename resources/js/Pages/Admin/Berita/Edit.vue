<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
  berita: Object,
})

const form = useForm({
  judul: props.berita.judul,
  kutipan: props.berita.kutipan,
  foto: null,
  isi: props.berita.isi,
})

function onFileChange(e) {
  form.foto = e.target.files[0]
}

function submit() {
  form.put(route('admin.berita.update', props.berita.id))
}
</script>

<template>
  <Head title="Edit Berita" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Berita
      </h2>
    </template>

    <div class="py-6">
      <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
        <form @submit.prevent="submit" enctype="multipart/form-data" class="space-y-6 bg-white p-6 shadow rounded-lg">
          <!-- Judul -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Judul</label>
            <input
              v-model="form.judul"
              type="text"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            />
            <div v-if="form.errors.judul" class="text-red-600 text-sm">{{ form.errors.judul }}</div>
          </div>

          <!-- Kutipan -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Kutipan</label>
            <input
              v-model="form.kutipan"
              type="text"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            />
            <div v-if="form.errors.kutipan" class="text-red-600 text-sm">{{ form.errors.kutipan }}</div>
          </div>

          <!-- Foto -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Foto (ubah jika perlu)</label>
            <input
              type="file"
              @change="onFileChange"
              class="mt-1 block w-full"
            />
            <div v-if="form.errors.foto" class="text-red-600 text-sm">{{ form.errors.foto }}</div>
            <div v-else-if="props.berita.foto" class="mt-2">
              <img :src="`/storage/${props.berita.foto}`" class="max-w-xs rounded" />
            </div>
          </div>

          <!-- Isi -->
          <div>
            <label class="block text-sm font-medium text-gray-700">Isi</label>
            <textarea
              v-model="form.isi"
              rows="6"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            ></textarea>
            <div v-if="form.errors.isi" class="text-red-600 text-sm">{{ form.errors.isi }}</div>
          </div>

          <div class="flex space-x-2">
            <button
              type="submit"
              :disabled="form.processing"
              class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 disabled:opacity-50"
            >
              Update
            </button>
            <Link
              :href="route('admin.berita.index')"
              class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400"
            >
              Batal
            </Link>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
