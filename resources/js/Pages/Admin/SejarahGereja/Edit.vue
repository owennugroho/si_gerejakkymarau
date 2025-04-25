<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({ sejarahGereja: Object })

const form = useForm({
  judul: props.sejarahGereja.judul,
  isi: props.sejarahGereja.isi,
})

function submit() {
  form.post(route('admin.sejarah-gereja.update', props.sejarahGereja.id), {
    _method: 'patch',
    preserveScroll: true
  })
}
</script>

<template>
  <Head title="Edit Sejarah Gereja" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Edit Sejarah Gereja</h2>
        <Link :href="route('admin.sejarah-gereja.index')" class="text-blue-600 hover:underline">← Kembali</Link>
      </div>
    </template>

    <div class="py-6 max-w-3xl mx-auto bg-white p-6 rounded shadow">
      <form @submit.prevent="submit" class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Judul</label>
          <input v-model="form.judul" type="text" class="mt-1 block w-full border-gray-300 rounded" />
          <p v-if="form.errors.judul" class="text-red-600 text-sm">{{ form.errors.judul }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Isi</label>
          <textarea v-model="form.isi" rows="6" class="mt-1 block w-full border-gray-300 rounded"></textarea>
          <p v-if="form.errors.isi" class="text-red-600 text-sm">{{ form.errors.isi }}</p>
        </div>
        <button type="submit" :disabled="form.processing" class="w-full py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 disabled:opacity-50">
          Update
        </button>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
