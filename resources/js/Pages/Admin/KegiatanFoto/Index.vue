<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
import { Inertia }    from '@inertiajs/inertia'

const props = defineProps({
  kegiatanfotos: Array,
})

function destroy(id) {
  if (confirm('Yakin ingin menghapus?')) {
    Inertia.delete(route('admin.kegiatan-foto.destroy', id))
  }
}
</script>

<template>
  <Head title="Foto Kegiatan" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold">Foto Kegiatan</h2>
    </template>

    <div class="py-6">
      <div class="flex justify-end mb-4">
        <Link
          :href="route('admin.kegiatan-foto.create')"
          class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >Tambah Foto</Link>
      </div>

      <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
              <th class="px-6 py-3"></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-for="item in kegiatanfotos" :key="item.id">
              <td class="px-6 py-4">{{ item.id }}</td>
              <td class="px-6 py-4">{{ item.judul }}</td>
              <td class="px-6 py-4">
                <img
                  :src="`/storage/${item.foto}`"
                  class="h-16 w-16 object-cover rounded"
                  alt="Foto"
                />
              </td>
              <td class="px-6 py-4">
                {{ item.deskripsi?.length > 50 
                    ? item.deskripsi.substr(0,50) + '…' 
                    : item.deskripsi }}
              </td>
              <td class="px-6 py-4 text-right space-x-2">
                <Link
                  :href="route('admin.kegiatan-foto.show', item.id)"
                  class="text-blue-600 hover:underline"
                >View</Link>
                <Link
                  :href="route('admin.kegiatan-foto.edit', item.id)"
                  class="text-green-600 hover:underline"
                >Edit</Link>
                <button
                  @click="destroy(item.id)"
                  class="text-red-600 hover:underline"
                >Delete</button>
              </td>
            </tr>
            <tr v-if="kegiatanfotos.length === 0">
              <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                Belum ada data.
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
