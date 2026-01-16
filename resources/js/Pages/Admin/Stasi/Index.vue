<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
  stasis: Array
})

function destroy(id) {
  if (confirm('Yakin ingin menghapus data ini?')) {
    Inertia.delete(route('admin.stasi.destroy', id))
  }
}
</script>

<template>
  <Head title="Daftar Stasi" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Daftar Stasi</h2>
        <Link
          :href="route('admin.stasi.create')"
          class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >
          + Tambah Stasi
        </Link>
      </div>
    </template>

    <div class="py-6">
      <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No.</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Desa</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Umat (L/P)</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto Gereja</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto Tanah</th>
              <th class="px-6 py-3"></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-for="(item, index) in props.stasis" :key="item.id">
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ index + 1 }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">{{ item.nama_stasi }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">{{ item.desa }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">
                {{ item.umat_laki }} / {{ item.umat_perempuan }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <img
                  v-if="item.foto_gereja"
                  :src="`/storage/${item.foto_gereja}`"
                  alt="Foto Gereja"
                  class="h-10 w-10 object-cover rounded"
                />
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <img
                  v-if="item.foto_tanah"
                  :src="`/storage/${item.foto_tanah}`"
                  alt="Foto Tanah"
                  class="h-10 w-10 object-cover rounded"
                />
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                <Link
                  :href="route('admin.stasi.show', item.id)"
                  class="text-indigo-600 hover:text-indigo-900"
                >
                  Lihat
                </Link>
                <Link
                  :href="route('admin.stasi.edit', item.id)"
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
            <tr v-if="!props.stasis.length">
              <td colspan="7" class="text-center py-8 text-gray-500">Belum ada data.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
