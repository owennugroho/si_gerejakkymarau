<script setup>
import { watch } from 'vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

const props = defineProps({
  jadwalTurne: Object,
  romos:       Array,
  stasis:      Array,
})

const form = useForm({
  stasi_id:   props.jadwalTurne.stasi_id,
  tanggal:   props.jadwalTurne.tanggal,
  hari:      props.jadwalTurne.hari,
  jam_mulai: props.jadwalTurne.jam_mulai,
  romo_id:   props.jadwalTurne.romo_id,
  deskripsi: props.jadwalTurne.deskripsi || '',
})

const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']
watch(() => form.tanggal, (d) => { form.hari = d ? days[new Date(d).getDay()] : '' })
function submit() {
  form.patch(route('admin.jadwal-turne.update', props.jadwalTurne.id), { preserveScroll: true })
}
</script>

<template>
  <Head title="Edit Jadwal Turne" />
  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Edit Jadwal Turne</h2>
        <Link :href="route('admin.jadwal-turne.index')" class="text-blue-600 hover:underline">← Kembali</Link>
      </div>
    </template>

    <div class="py-6 max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-6">
      <form @submit.prevent="submit" class="space-y-4">
        <!-- Stasi -->
        <div>
          <label class="block font-medium text-gray-700">Stasi</label>
          <select v-model="form.stasi_id" class="mt-1 block w-full border-gray-300 rounded">
            <option value="">-- Pilih Stasi --</option>
            <option v-for="s in props.stasis" :key="s.id" :value="s.id">{{ s.nama_stasi }}</option>
          </select>
          <p v-if="form.errors.stasi_id" class="text-red-600 text-sm">{{ form.errors.stasi_id }}</p>
        </div>
        <!-- Tanggal & Hari -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block font-medium text-gray-700">Tanggal</label>
            <input v-model="form.tanggal" type="date" class="mt-1 block w-full border-gray-300 rounded" />
            <p v-if="form.errors.tanggal" class="text-red-600 text-sm">{{ form.errors.tanggal }}</p>
          </div>
          <div>
            <label class="block font-medium text-gray-700">Hari</label>
            <input v-model="form.hari" type="text" readonly class="mt-1 block w-full bg-gray-100 rounded cursor-not-allowed" />
            <p v-if="form.errors.hari" class="text-red-600 text-sm">{{ form.errors.hari }}</p>
          </div>
        </div>
        <!-- Jam Mulai & Romo -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block font-medium text-gray-700">Jam Mulai</label>
            <input v-model="form.jam_mulai" type="time" class="mt-1 block w-full border-gray-300 rounded" />
            <p v-if="form.errors.jam_mulai" class="text-red-600 text-sm">{{ form.errors.jam_mulai }}</p>
          </div>
          <div>
            <label class="block font-medium text-gray-700">Romo</label>
            <select v-model="form.romo_id" class="mt-1 block w-full border-gray-300 rounded">
              <option value="">-- Pilih Romo --</option>
              <option v-for="r in props.romos" :key="r.id" :value="r.id">{{ r.nama }}</option>
            </select>
            <p v-if="form.errors.romo_id" class="text-red-600 text-sm">{{ form.errors.romo_id }}</p>
          </div>
        </div>
        <!-- Deskripsi -->
        <div>
          <label class="block font-medium text-gray-700">Deskripsi (opsional)</label>
          <textarea v-model="form.deskripsi" rows="3" class="mt-1 block w-full border-gray-300 rounded"></textarea>
          <p v-if="form.errors.deskripsi" class="text-red-600 text-sm">{{ form.errors.deskripsi }}</p>
        </div>
        <!-- Submit -->
        <button type="submit" :disabled="form.processing" class="w-full py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 disabled:opacity-50">
          Update
        </button>
      </form>
    </div>
  </AuthenticatedLayout>
</template>