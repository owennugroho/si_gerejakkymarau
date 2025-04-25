<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link, Head } from '@inertiajs/inertia-vue3'
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
  romos: Array
})

// Form delete
const form = useForm()
function destroy(id) {
  if (!confirm('Hapus romo ini?')) return
  form.delete(route('admin.romos.destroy', id))
}
</script>

<template>
  <Head title="Daftar Romos" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800">Daftar Romos</h2>
    </template>

    <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
        <!-- tombol tambah -->
        <Link
          href="/admin/romos/create"
          class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >
          Tambah Romos
        </Link>

        <!-- tabel data -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="romo in romos" :key="romo.id">
                <td class="px-6 py-4 whitespace-nowrap">{{ romo.id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ romo.nama }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <img :src="`/storage/${romo.foto}`" alt="" class="h-12 w-12 object-cover rounded" />
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center space-x-2">
                  <Link
                    :href="route('admin.romos.edit', romo.id)"
                    class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600"
                  >
                    Edit
                  </Link>
                  <button
                    @click="destroy(romo.id)"
                    class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                  >
                    Hapus
                  </button>
                </td>
              </tr>
            </tbody>
          </table>

          <div v-if="!romos.length" class="p-4 text-center text-gray-500">
            Belum ada data Romos.
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
