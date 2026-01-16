<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
  sejarahGerejas: Array
})

function destroy(id) {
  if (confirm('Yakin ingin menghapus data ini?')) {
    Inertia.delete(route('admin.sejarah-gereja.destroy', id))
  }
}

// helper cuplikan isi
function snippet(text, len = 50) {
  return text.length > len ? text.slice(0, len) + '…' : text
}
</script>

<template>
  <Head title="Sejarah Gereja" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Sejarah Gereja</h2>
        <Link
          :href="route('admin.sejarah-gereja.create')"
          class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >
          + Tambah
        </Link>
      </div>
    </template>

    <div class="py-6">
      <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No.</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cuplikan</th>
              <th class="px-6 py-3"></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-for="(item, index) in props.sejarahGerejas" :key="item.id">
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ index+1 }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">{{ item.judul }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">{{ snippet(item.isi) }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                <Link :href="route('admin.sejarah-gereja.show', item.id)" class="text-indigo-600 hover:text-indigo-900">Lihat</Link>
                <Link :href="route('admin.sejarah-gereja.edit', item.id)" class="text-yellow-600 hover:text-yellow-900">Edit</Link>
                <button @click="destroy(item.id)" class="text-red-600 hover:text-red-900">Hapus</button>
              </td>
            </tr>
            <tr v-if="!props.sejarahGerejas.length">
              <td colspan="4" class="py-8 text-center text-gray-500">Belum ada data.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
