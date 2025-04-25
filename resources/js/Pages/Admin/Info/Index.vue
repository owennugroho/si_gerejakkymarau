<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
  infos: {
    type: Array,
    default: () => [],
  },
})

function destroy(id) {
  if (confirm('Yakin ingin menghapus data ini?')) {
    Inertia.delete(route('admin.info.destroy', id))
  }
}
</script>

<template>
  <!-- this puts <title>Daftar Info Gereja</title> -->
  <Head title="Daftar Info Gereja" />

  <!-- wrap everything in your admin layout -->
  <AuthenticatedLayout>
    <!-- this fills the "header" slot in your layout -->
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Daftar Info Gereja
      </h2>
    </template>

    <!-- page content -->
    <div class="py-6">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">
        <div class="flex justify-end">
          <Link
            :href="route('admin.info.create')"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
          >
            Tambah Info
          </Link>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200 mb-4">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Isi</th>
                  <th class="px-6 py-3"></th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="info in props.infos" :key="info.id">
                  <td class="px-6 py-4 whitespace-nowrap">{{ info.id }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ info.judul }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    {{ info.isi.length > 50 
                        ? info.isi.substring(0, 50) + '…' 
                        : info.isi 
                    }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                    <Link
                      :href="route('admin.info.show', info.id)"
                      class="text-blue-600 hover:underline"
                    >View</Link>
                    <Link
                      :href="route('admin.info.edit', info.id)"
                      class="text-green-600 hover:underline"
                    >Edit</Link>
                    <button
                      @click="destroy(info.id)"
                      class="text-red-600 hover:underline"
                    >Delete</button>
                  </td>
                </tr>
                <tr v-if="props.infos.length === 0">
                  <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                    Belum ada data.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
