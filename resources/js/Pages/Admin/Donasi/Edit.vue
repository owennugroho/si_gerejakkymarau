<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

const props = defineProps({
  donasi: Object
})

const form = useForm({
  nama_bank: props.donasi.nama_bank,
  nomor_rekening: props.donasi.nomor_rekening,
  atas_nama: props.donasi.atas_nama,
  qris_image: null,
  keterangan: props.donasi.keterangan,
})

function submit() {
  form.transform(data => ({
    ...data,
    _method: 'PATCH'
  })).post(route('admin.donasi.update', props.donasi.id), {
    preserveScroll: true,
    forceFormData: true,
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

          <!-- Nama Bank -->
          <div>
            <label class="block font-medium">Nama Bank</label>
            <input
              v-model="form.nama_bank"
              type="text"
              class="w-full border rounded px-3 py-2"
            />
            <span v-if="form.errors.nama_bank" class="text-red-600 text-sm">
              {{ form.errors.nama_bank }}
            </span>
          </div>

          <!-- Nomor Rekening -->
          <div>
            <label class="block font-medium">Nomor Rekening</label>
            <input
              v-model="form.nomor_rekening"
              type="text"
              class="w-full border rounded px-3 py-2"
            />
            <span v-if="form.errors.nomor_rekening" class="text-red-600 text-sm">
              {{ form.errors.nomor_rekening }}
            </span>
          </div>

          <!-- Atas Nama -->
          <div>
            <label class="block font-medium">Atas Nama</label>
            <input
              v-model="form.atas_nama"
              type="text"
              class="w-full border rounded px-3 py-2"
            />
            <span v-if="form.errors.atas_nama" class="text-red-600 text-sm">
              {{ form.errors.atas_nama }}
            </span>
          </div>

          <!-- QRIS Lama -->
          <div v-if="props.donasi.qris_image">
            <label class="block font-medium">QRIS Saat Ini</label>
            <img
              :src="`/storage/${props.donasi.qris_image}`"
              class="h-24 mb-2 border rounded"
            />
          </div>

          <!-- Upload QRIS Baru -->
          <div>
            <label class="block font-medium">Ganti QRIS (Opsional)</label>
            <input
              @change="e => form.qris_image = e.target.files[0]"
              type="file"
              accept="image/*"
              class="w-full"
            />
            <span v-if="form.errors.qris_image" class="text-red-600 text-sm">
              {{ form.errors.qris_image }}
            </span>
          </div>

          <!-- Keterangan -->
          <div>
            <label class="block font-medium">Keterangan</label>
            <textarea
              v-model="form.keterangan"
              class="w-full border rounded px-3 py-2"
              rows="3"
            ></textarea>
            <span v-if="form.errors.keterangan" class="text-red-600 text-sm">
              {{ form.errors.keterangan }}
            </span>
          </div>

          <!-- Buttons -->
          <div class="flex space-x-2">
            <button
              type="submit"
              class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
              :disabled="form.processing"
            >
              Perbarui
            </button>
            <button
              type="button"
              class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
              @click="$inertia.visit(route('admin.donasi.index'))"
            >
              Batal
            </button>
          </div>

        </div>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
