<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
  romo: Object,
})

const form = useForm({
  nama: props.omo.nama,    // pastikan prop namanya sesuai
  isi: props.romo.isi,
  foto: null,
})

function submit() {
  form.post(route('admin.romos.update', props.romo.id), {
    _method: 'patch',
    preserveScroll: true,
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
            @change="e => form.foto = e.target.files[0]"
            type="file"
            accept="image/*"
            class="mt-1 block w-full"
          />
          <div v-if="form.errors.foto" class="text-red-600 text-sm">
            {{ form.errors.foto }}
          </div>
          <div class="mt-2">
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
