<!-- resources/js/Pages/Admin/Dashboard.vue -->
<template>

  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Dashboard
      </h2>
    </template>

    <div class="py-12 max-w-7xl mx-auto px-4 space-y-8">
      <!-- Row Statistik: 2 kolom -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <StatCard label="Jumlah Stasi" :value="jumlahStasi" :icon="BuildingLibraryIcon" />
        <StatCard label="Total Umat di seluruh Stasi" :value="totalUmat" :icon="UsersIcon" />
        <StatCard label="Pesan Belum Dibaca" :value="pesanBelumDibaca" :icon="EnvelopeIcon" />
      </div>

      <!-- Quick Access Buttons -->
      <div class="mt-8">
        <h3 class="text-lg font-semibold mb-4">Quick Access</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
          <Link :href="route('admin.stasi.create')"
            class="bg-green-800 text-white py-4 px-6 rounded-lg text-center hover:bg-green-700 transition">
            Tambah Stasi
          </Link>
          <Link :href="route('admin.jadwal-turne.create')"
            class="bg-green-800 text-white py-4 px-6 rounded-lg text-center hover:bg-green-700 transition">
            Buat Jadwal Turne
          </Link>
          <Link :href="route('admin.kontak.index')"
            class="bg-green-800 text-white py-4 px-6 rounded-lg text-center hover:bg-green-700 transition">
            Pesan Masuk
          </Link>
          <Link :href="route('admin.berita.create')"
            class="bg-green-800 text-white py-4 px-6 rounded-lg text-center hover:bg-green-700 transition">
            Buat Berita
          </Link>
          <Link :href="route('admin.kegiatan-foto.create')"
            class="bg-green-800 text-white py-4 px-6 rounded-lg text-center hover:bg-green-700 transition">
            Tambah Foto Kegiatan
          </Link>
        </div>
      </div>

      <!-- Jadwal Turne Bulan Ini -->
      <div class="mt-12">
        <h3 class="text-lg font-semibold mb-4">Jadwal Turne Bulan Ini</h3>
        <div class="overflow-x-auto bg-white shadow rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-800 text-white">
              <tr>
                <th class="px-4 py-2 text-left">#</th>
                <th class="px-4 py-2 text-left">Tanggal</th>
                <th class="px-4 py-2 text-left">Stasi</th>
                <th class="px-4 py-2 text-left">Romo</th>
                <th class="px-4 py-2 text-left">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <tr v-for="(jadwal, idx) in currentMonthSchedules" :key="jadwal.id">
                <td class="px-4 py-2">{{ idx + 1 }}</td>
                <td class="px-4 py-2">
                  {{ new Date(jadwal.tanggal).toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                  }) }}
                </td>
                <td class="px-4 py-2">{{ jadwal.stasi.nama_stasi }}</td>
                <td class="px-4 py-2">{{ jadwal.romo.nama }}</td>
                <td class="px-4 py-2">
                  <Link :href="route('admin.jadwal-turne.show', jadwal.id)" class="text-blue-600 hover:underline">
                    Detail
                  </Link>
                </td>
              </tr>

              <tr v-if="currentMonthSchedules.length === 0">
                <td class="px-4 py-6 text-center text-gray-500" colspan="5">
                  Belum ada jadwal untuk bulan ini.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import StatCard from '@/Components/StatCard.vue'
import { UsersIcon, BuildingLibraryIcon, EnvelopeIcon } from '@heroicons/vue/24/solid'


// Ambil props yang dikirim DashboardController
const { jumlahStasi, totalUmat, pesanBelumDibaca, currentMonthSchedules } = usePage().props
</script>
