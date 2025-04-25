<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

const props = defineProps({
  donasi: Object
})

const form = useForm({
  id: props.donasi.id,
  nama_bank: props.donasi.nama_bank,
  nomor_rekening: props.donasi.nomor_rekening,
  atas_nama: props.donasi.atas_nama,
  qris_image: null,
  keterangan: props.donasi.keterangan,
})

function submit() {
  form.post(route('admin.donasi.update', form.id), {
    _method: 'patch'
  })
}
</script>

<template>
  <Head title="Edit Donasi" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl">Edit Donasi</h2>
    </template>

    <div class="p-6 bg-white rounded-lg shadow">
      <form @submit.prevent="submit" enctype="multipart/form-data">
        <div class="space-y-4">

          <!-- fields sama seperti Create.vue, tapi tampilkan preview QRIS lama -->
          <div>
            <label class="block font-medium">QRIS Saat Ini</label>
            <img
              v-if="donasi.qris_image"
              :src="`/storage/${donasi.qris_image}`"
              alt="QRIS"
              class="h-16 mb-2"
            />
          </div>

          <!-- reuse field-field seperti di Create.vue -->
          <!-- ... (nama_bank, nomor_rekening, atas_nama, file input, keterangan) -->

          <div class="flex space-x-2">
            <button
              type="submit"
              class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
              :disabled="form.processing"
            >Perbarui</button>
            <button
              type="button"
              class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
              @click="$inertia.visit(route('admin.donasi.index'))"
            >Batal</button>
          </div>
        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
