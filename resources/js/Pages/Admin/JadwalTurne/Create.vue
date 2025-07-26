<script setup>
import { ref, watch } from 'vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import {
  CalendarIcon,
  ClockIcon,
  MapPinIcon,
  UsersIcon,
  ChevronDownIcon,
  PencilSquareIcon,
} from '@heroicons/vue/24/solid'

// Props: daftar Romo & Stasi
const props = defineProps({
  romos:  { type: Array, default: () => [] },
  stasis: { type: Array, default: () => [] },
})

// form state
const form = useForm({
  stasi_id:   '',
  tanggal:    '',
  hari:       '',
  jam_mulai:  '',
  romo_id:    '',
  deskripsi:  '',
})

// ref ke input date
const dateInput = ref(null)

// array nama hari
const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']

// otomatis set hari saat tanggal berubah
watch(() => form.tanggal, (d) => {
  form.hari = d ? days[new Date(d).getDay()] : ''
})

// fungsi untuk memunculkan date‑picker
function openDatePicker() {
  if (dateInput.value?.showPicker) {
    dateInput.value.showPicker()
  } else {
    dateInput.value?.click()
  }
}

function submit() {
  form.post(route('admin.jadwal-turne.store'), { preserveScroll: true })
}
</script>

<template>
  <Head title="Tambah Jadwal Turne" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">
          Tambah Jadwal Turne
        </h2>
        <Link
          :href="route('admin.jadwal-turne.index')"
          class="text-blue-600 hover:underline"
        >← Kembali</Link>
      </div>
    </template>

    <div class="py-6 max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-6">
      <form @submit.prevent="submit" class="space-y-6">

        <!-- Stasi -->
        <div>
          <label for="stasi" class="block font-medium text-gray-700 mb-1">
            Stasi
          </label>
          <div class="relative">
            <MapPinIcon
              class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-green-600"
            />
            <select
              id="stasi"
              v-model="form.stasi_id"
              class="mt-1 block w-full
                     border-gray-300 rounded
                     pl-10 pr-10 appearance-none
                     focus:border-green-600 focus:ring focus:ring-green-200"
            >
              <option value="">-- Pilih Stasi --</option>
              <option
                v-for="s in props.stasis"
                :key="s.id"
                :value="s.id"
              >{{ s.nama_stasi }}</option>
            </select>
            <ChevronDownIcon
              class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
            />
          </div>
          <p v-if="form.errors.stasi_id" class="text-red-600 text-sm mt-1">
            {{ form.errors.stasi_id }}
          </p>
        </div>

        <!-- Tanggal -->
        <div>
          <label for="tanggal" class="block font-medium text-gray-700 mb-1">
            Tanggal
          </label>
          <div class="relative">
            <input
              id="tanggal"
              ref="dateInput"
              v-model="form.tanggal"
              type="date"
              class="mt-1 block w-full
                     border-gray-300 rounded
                     pr-10 focus:border-green-600 focus:ring focus:ring-green-200"
            />
            <!-- custom arrow -->
            <ChevronDownIcon
              @click="openDatePicker"
              class="absolute right-3 top-1/2
                     transform -translate-y-1/2 w-5 h-5 text-gray-400
                     cursor-pointer"
            />
            <!-- calendar icon kalau mau di kiri, tambahkan MapPinIcon serupa -->
          </div>
          <p v-if="form.errors.tanggal" class="text-red-600 text-sm mt-1">
            {{ form.errors.tanggal }}
          </p>
        </div>

        <!-- Hari (read-only) -->
        <div>
          <label for="hari" class="block font-medium text-gray-700 mb-1">
            Hari
          </label>
          <input
            id="hari"
            v-model="form.hari"
            type="text"
            readonly
            class="mt-1 block w-full
                   bg-gray-100 border-gray-300 rounded
                   cursor-not-allowed pl-3"
          />
          <p v-if="form.errors.hari" class="text-red-600 text-sm mt-1">
            {{ form.errors.hari }}
          </p>
        </div>

        <!-- Jam Mulai -->
        <div>
          <label for="jam_mulai" class="block font-medium text-gray-700 mb-1">
            Jam Mulai
          </label>
          <div class="relative">
            <ClockIcon
              class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-green-600"
            />
            <input
              id="jam_mulai"
              v-model="form.jam_mulai"
              type="time"
              class="mt-1 block w-full
                     border-gray-300 rounded
                     pl-10 focus:border-green-600 focus:ring focus:ring-green-200"
            />
          </div>
          <p v-if="form.errors.jam_mulai" class="text-red-600 text-sm mt-1">
            {{ form.errors.jam_mulai }}
          </p>
        </div>

        <!-- Romo -->
        <div>
          <label for="romo" class="block font-medium text-gray-700 mb-1">
            Romo
          </label>
          <div class="relative">
            <UsersIcon
              class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-green-600"
            />
            <select
              id="romo"
              v-model="form.romo_id"
              class="mt-1 block w-full
                     border-gray-300 rounded
                     pl-10 pr-10 appearance-none
                     focus:border-green-600 focus:ring focus:ring-green-200"
            >
              <option value="">-- Pilih Romo --</option>
              <option
                v-for="r in props.romos"
                :key="r.id"
                :value="r.id"
              >{{ r.nama }}</option>
            </select>
            <ChevronDownIcon
              class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
            />
          </div>
          <p v-if="form.errors.romo_id" class="text-red-600 text-sm mt-1">
            {{ form.errors.romo_id }}
          </p>
        </div>

        <!-- Deskripsi -->
        <div>
          <label for="deskripsi" class="block font-medium text-gray-700 mb-1">
            Deskripsi (opsional)
          </label>
          <div class="relative">
            <PencilSquareIcon
              class="absolute left-3 top-3 w-5 h-5 text-green-600"
            />
            <textarea
              id="deskripsi"
              v-model="form.deskripsi"
              rows="3"
              class="mt-1 block w-full
                     border-gray-300 rounded
                     pl-10 focus:border-green-600 focus:ring focus:ring-green-200"
            ></textarea>
          </div>
          <p v-if="form.errors.deskripsi" class="text-red-600 text-sm mt-1">
            {{ form.errors.deskripsi }}
          </p>
        </div>

        <!-- Submit -->
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
