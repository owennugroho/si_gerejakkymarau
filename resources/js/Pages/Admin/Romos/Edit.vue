<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'   // ← WAJIB ganti ini

const props = defineProps({
  romo: Object,
})

const form = useForm({
  nama: props.romo.nama,
  isi: props.romo.isi,
  foto: null,
})

function submit() {
  form.transform(data => ({
    ...data,
    _method: 'patch',
  })).post(route('admin.romos.update', props.romo.id), {
    forceFormData: true,
    preserveScroll: false,
    onError: (errors) => {
      console.error(errors)
      alert('Update gagal')
    }
  })
}
</script>

<template>
  <Head title="Edit Romos" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold text-gray-800">Edit Romos</h2>
    </template>

    <div class="py-6 max-w-3xl mx-auto space-y-6">
      <Link
        :href="route('admin.romos.index')"
        class="inline-block text-blue-600 hover:underline"
      >
        ← Kembali ke Daftar
      </Link>

      <form
        @submit.prevent="submit"
        class="space-y-4 bg-white p-6 rounded shadow"
      >
        <!-- Nama -->
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Nama Romo
          </label>
          <input
            v-model="form.nama"
            type="text"
            class="mt-1 block w-full border-gray-300 rounded"
          />
          <div v-if="form.errors.nama" class="text-red-600 text-sm">
            {{ form.errors.nama }}
          </div>
        </div>

        <!-- Foto -->
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Foto Baru (kosongkan untuk tidak diubah)
          </label>
          <input
            type="file"
            accept="image/*"
            @change="e => form.foto = e.target.files[0]"
            class="mt-1 block w-full"
          />
          <div v-if="form.errors.foto" class="text-red-600 text-sm">
            {{ form.errors.foto }}
          </div>

          <div v-if="props.romo.foto" class="mt-2">
            <img
              :src="`/storage/${props.romo.foto}`"
              alt="Foto Lama"
              class="h-24 w-24 object-cover rounded"
            />
          </div>
        </div>

        <!-- Deskripsi -->
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Deskripsi
          </label>
          <textarea
            v-model="form.isi"
            rows="4"
            class="mt-1 block w-full border-gray-300 rounded"
          ></textarea>
          <div v-if="form.errors.isi" class="text-red-600 text-sm">
            {{ form.errors.isi }}
          </div>
        </div>

        <!-- Submit -->
        <button
          type="submit"
          :disabled="form.processing"
          class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 disabled:opacity-50"
        >
          Update
        </button>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
