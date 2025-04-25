<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const props = defineProps({
  info: Object,
})

const form = useForm({
  judul: props.info.judul,
  isi: props.info.isi,
})

function submit() {
  form.put(route('admin.info.update', props.info.id))
}
</script>

<template>
  <div>
    <h1 class="text-2xl font-semibold mb-6">Edit Info</h1>

    <form @submit.prevent="submit" class="space-y-4 bg-white p-6 shadow rounded-lg">
      <div>
        <label class="block text-sm font-medium text-gray-700">Judul</label>
        <input
          v-model="form.judul"
          type="text"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        <div v-if="form.errors.judul" class="text-red-600 text-sm">{{ form.errors.judul }}</div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Isi</label>
        <textarea
          v-model="form.isi"
          rows="5"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        ></textarea>
        <div v-if="form.errors.isi" class="text-red-600 text-sm">{{ form.errors.isi }}</div>
      </div>

      <div class="flex space-x-2 mt-6">
        <button
          type="submit"
          :disabled="form.processing"
          class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 disabled:opacity-50"
        >
          Update
        </button>
        <Link
          :href="route('admin.info.index')"
          class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400"
        >
          Batal
        </Link>
      </div>
    </form>
  </div>
</template>
