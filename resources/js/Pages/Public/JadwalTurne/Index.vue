<template>
  <GuestLayout>
    <section class="bg-gray-50 py-16">
      <div class="container mx-auto px-4">
        <!-- Header + Dropdown -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
          <!-- Judul + Ikon -->
          <div class="flex items-center space-x-2 mb-4 md:mb-0">
            <div class="flex items-center space-x-2 mb-4 md:mb-0">
              <img src="/images/logo.png" alt="Logo Jadwal Turne" class="h-8 w-8 object-contain" />
              <h2 class="text-3xl font-bold text-green-800">Jadwal Turne</h2>
            </div>
            <!-- Dropdown Bulan -->
            <select v-model="month"
              class="border border-green-800 text-green-800 font-medium px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-300 w-full md:w-auto">
              <option v-for="m in months" :key="m.value" :value="m.value">
                {{ m.label }}
              </option>
            </select>
          </div>
        </div>
          <!-- Tabel dalam Card -->
          <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
              <thead class="bg-green-800">
                <tr>
                  <th class="px-4 py-3 text-center text-sm font-medium text-white">Tanggal</th>
                  <th class="px-4 py-3 text-center text-sm font-medium text-white">Hari</th>
                  <th class="px-4 py-3 text-center text-sm font-medium text-white">Waktu</th>
                  <th class="px-4 py-3 text-center text-sm font-medium text-white">Stasi / Lokasi</th>
                  <th class="px-4 py-3 text-center text-sm font-medium text-white">Keterangan</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr v-for="j in filtered" :key="j.id" class="odd:bg-gray-50 hover:bg-gray-100">
                  <td class="px-4 py-3 text-center text-gray-800">
                    {{ formatDateDMY(j.tanggal) }}
                  </td>
                  <td class="px-4 py-3 text-center text-gray-800">{{ j.hari }}</td>
                  <td class="px-4 py-3 text-center text-gray-800">{{ j.jam_mulai }}</td>
                  <td class="px-4 py-3 text-center text-gray-800">{{ jadwal.stasi.nama_stasi }}</td>
                  <td class="px-4 py-3 text-left   text-gray-800">{{ j.deskripsi }}</td>
                </tr>
                <tr v-if="filtered.length === 0">
                  <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                    Belum ada jadwal untuk bulan ini.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </section>
  </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { ref, computed } from 'vue'

const props = defineProps({
  jadwals: {
    type: Array,
    default: () => [],
  },
})

const months = [
  { value: 1, label: 'Januari' },
  { value: 2, label: 'Februari' },
  { value: 3, label: 'Maret' },
  { value: 4, label: 'April' },
  { value: 5, label: 'Mei' },
  { value: 6, label: 'Juni' },
  { value: 7, label: 'Juli' },
  { value: 8, label: 'Agustus' },
  { value: 9, label: 'September' },
  { value: 10, label: 'Oktober' },
  { value: 11, label: 'November' },
  { value: 12, label: 'Desember' },
]
const month = ref(new Date().getMonth() + 1)

function formatDateDMY(dateStr) {
  const d = new Date(dateStr)
  const dd = String(d.getDate()).padStart(2, '0')
  const mm = String(d.getMonth() + 1).padStart(2, '0')
  const yy = d.getFullYear()
  return `${dd}-${mm}-${yy}`
}

const filtered = computed(() =>
  props.jadwals.filter(j =>
    new Date(j.tanggal).getMonth() + 1 === month.value
  )
)
</script>
