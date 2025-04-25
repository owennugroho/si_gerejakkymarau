<script setup>
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
  judul: '',
  isi: '',
})

// For Edit.vue you’d populate:
// const form = useForm({ judul: props.info.judul, isi: props.info.isi })

function submit() {
  form.post(route('admin.info.store'))
}
</script>

<template>
  <div>
    <h1 class="text-xl mb-4">Tambah Info</h1>
    <form @submit.prevent="submit">
      <div class="mb-4">
        <label>Judul</label>
        <input v-model="form.judul"
               class="w-full border px-2 py-1 rounded"/>
        <div v-if="form.errors.judul"
             class="text-red-600 text-sm">{{ form.errors.judul }}</div>
      </div>

      <div class="mb-4">
        <label>Isi</label>
        <textarea v-model="form.isi"
                  class="w-full border px-2 py-1 rounded"></textarea>
        <div v-if="form.errors.isi"
             class="text-red-600 text-sm">{{ form.errors.isi }}</div>
      </div>

      <button type="submit"
              class="px-4 py-2 bg-blue-600 text-white rounded">
        Simpan
      </button>
    </form>
  </div>
</template>
