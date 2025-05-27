<script setup>
import { ref, watch } from 'vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

// Props: daftar Romo untuk dropdown
const props = defineProps({
  romos: {
    type: Array,
    default: () => [],
  },
})

// Inisialisasi form
const form = useForm({
  lokasi:    '',
  tanggal:   '',
  hari:      '',
  jam_mulai: '',
  romo_id:   '',
  deskripsi: '',
})

// Array nama hari Bahasa Indonesia
const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']

// Watch perubahan tanggal, lalu isi otomatis kolom hari
watch(() => form.tanggal, (newDate) => {
  if (newDate) {
    form.hari = days[new Date(newDate).getDay()]
  } else {
    form.hari = ''
  }
})

function submit() {
  form.post(route('admin.jadwal-turne.store'), { preserveScroll: true })
}
</script>

<template>
  <Head title="Tambah Jadwal Turne" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Tambah Jadwal Turne</h2>
        <Link
          :href="route('admin.jadwal-turne.index')"
          class="text-blue-600 hover:underline"
        >← Kembali</Link>
      </div>
    </template>

    <div class="py-6 max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-6">
      <form @submit.prevent="submit" class="space-y-4">
        <!-- Lokasi -->
        <div>
          <label class="block font-medium text-gray-700">Lokasi</label>
          <input
            v-model="form.lokasi"
            type="text"
            class="mt-1 block w-full border-gray-300 rounded"
          />
          <p v-if="form.errors.lokasi" class="text-red-600 text-sm">{{ form.errors.lokasi }}</p>
        </div>

        <!-- Tanggal & Hari (otomatis) -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block font-medium text-gray-700">Tanggal</label>
            <input
              v-model="form.tanggal"
              type="date"
              class="mt-1 block w-full border-gray-300 rounded"
            />
            <p v-if="form.errors.tanggal" class="text-red-600 text-sm">{{ form.errors.tanggal }}</p>
          </div>
          <div>
            <label class="block font-medium text-gray-700">Hari</label>
            <input
              v-model="form.hari"
              type="text"
              readonly
              class="mt-1 block w-full border-gray-300 bg-gray-100 rounded cursor-not-allowed"
            />
            <p v-if="form.errors.hari" class="text-red-600 text-sm">{{ form.errors.hari }}</p>
          </div>
        </div>

        <!-- Jam Mulai & Romo -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block font-medium text-gray-700">Jam Mulai</label>
            <input
              v-model="form.jam_mulai"
              type="time"
              class="mt-1 block w-full border-gray-300 rounded"
            />
            <p v-if="form.errors.jam_mulai" class="text-red-600 text-sm">{{ form.errors.jam_mulai }}</p>
          </div>
          <div>
            <label class="block font-medium text-gray-700">Romo</label>
            <select
              v-model="form.romo_id"
              class="mt-1 block w-full border-gray-300 rounded"
            >
              <option value="">-- Pilih Romo --</option>
              <option v-for="r in props.romos" :key="r.id" :value="r.id">
                {{ r.nama }}
              </option>
            </select>
            <p v-if="form.errors.romo_id" class="text-red-600 text-sm">{{ form.errors.romo_id }}</p>
          </div>
        </div>

        <!-- Deskripsi -->
        <div>
          <label class="block font-medium text-gray-700">Deskripsi (opsional)</label>
          <textarea
            v-model="form.deskripsi"
            rows="3"
            class="mt-1 block w-full border-gray-300 rounded"
          ></textarea>
          <p v-if="form.errors.deskripsi" class="text-red-600 text-sm">{{ form.errors.deskripsi }}</p>
        </div>

        <!-- Tombol Simpan -->
        <button
          type="submit"
          :disabled="form.processing"
          class="w-full py-2 bg-green-600 text-white rounded hover:bg-green-700 disabled:opacity-50"
        >
          Simpan
        </button>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
