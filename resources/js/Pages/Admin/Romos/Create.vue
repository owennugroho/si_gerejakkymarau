<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
  nama: '',
  isi: '',
  foto: null,
})

function submit() {
  form.post(route('admin.romos.store'), {
    preserveScroll: true,
    onSuccess: () => form.reset(),
  })
}
</script>

<template>
  <Head title="Tambah Romos" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold text-gray-800">Tambah Romos</h2>
    </template>

    <div class="py-6 max-w-3xl mx-auto space-y-6">
      <!-- ← Kembali ke Daftar -->
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
          <div
            v-if="form.errors.nama"
            class="text-red-600 text-sm"
          >{{ form.errors.nama }}</div>
        </div>

        <!-- Foto -->
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Foto
          </label>
          <input
            @change="e => form.foto = e.target.files[0]"
            type="file"
            accept="image/*"
            class="mt-1 block w-full"
          />
          <div
            v-if="form.errors.foto"
            class="text-red-600 text-sm"
          >{{ form.errors.foto }}</div>
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
          <div
            v-if="form.errors.isi"
            class="text-red-600 text-sm"
          >{{ form.errors.isi }}</div>
        </div>

        <!-- Submit -->
        <button
          type="submit"
          :disabled="form.processing"
          class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 disabled:opacity-50"
        >
          Simpan
        </button>
      </form>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
/* any additional styles */
</style>
