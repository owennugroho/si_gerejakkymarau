<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
  jadwalTurnes: Array
})

function destroy(id) {
  if (confirm('Yakin ingin menghapus jadwal ini?')) {
    Inertia.delete(route('admin.jadwal-turne.destroy', id))
  }
}
</script>

<template>
  <Head title="Daftar Jadwal Turne" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Jadwal Turne</h2>
        <Link
          :href="route('admin.jadwal-turne.create')"
          class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >
          + Tambah Jadwal
        </Link>
      </div>
    </template>

    <div class="py-6">
      <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lokasi</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jam Mulai</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Romo</th>
              <th class="px-6 py-3"></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-for="item in props.jadwalTurnes" :key="item.id">
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ item.lokasi }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">{{ item.tanggal }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">{{ item.hari }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">{{ item.jam_mulai }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">{{ item.romo.nama }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                <Link
                  :href="route('admin.jadwal-turne.show', item.id)"
                  class="text-indigo-600 hover:text-indigo-900"
                >
                  Lihat
                </Link>
                <Link
                  :href="route('admin.jadwal-turne.edit', item.id)"
                  class="text-yellow-600 hover:text-yellow-900"
                >
                  Edit
                </Link>
                <button
                  @click="destroy(item.id)"
                  class="text-red-600 hover:text-red-900"
                >
                  Hapus
                </button>
              </td>
            </tr>
            <tr v-if="!props.jadwalTurnes.length">
              <td colspan="6" class="text-center py-8 text-gray-500">Belum ada jadwal.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
