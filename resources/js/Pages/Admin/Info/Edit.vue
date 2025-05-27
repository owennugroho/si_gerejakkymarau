<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

const props = defineProps({
  info: {
    type: Object,
    required: true,
  },
})

const form = useForm({
  judul: props.info.judul,
  isi:   props.info.isi,
})

function submit() {
  form.patch(route('admin.info.update', props.info.id), { preserveScroll: true })
}
</script>

<template>
  <Head title="Edit Info" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Edit Info</h2>
        <Link
          :href="route('admin.info.index')"
          class="text-blue-600 hover:underline"
        >
          ← Kembali
        </Link>
      </div>
    </template>

    <div class="py-6 max-w-3xl mx-auto bg-white p-6 rounded shadow">
      <form @submit.prevent="submit" class="space-y-6">
        <div>
          <label class="block text-sm font-medium text-gray-700">Judul</label>
          <input
            v-model="form.judul"
            type="text"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
          />
          <p v-if="form.errors.judul" class="text-red-600 text-sm">{{ form.errors.judul }}</p>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Isi</label>
          <textarea
            v-model="form.isi"
            rows="6"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
          ></textarea>
          <p v-if="form.errors.isi" class="text-red-600 text-sm">{{ form.errors.isi }}</p>
        </div>

        <div class="flex justify-end space-x-2">
          <Link
            :href="route('admin.info.index')"
            class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400"
          >
            Batal
          </Link>
          <button
            type="submit"
            :disabled="form.processing"
            class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 disabled:opacity-50"
          >
            Update
          </button>
        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
