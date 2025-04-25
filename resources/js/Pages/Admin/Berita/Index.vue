<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
  beritas: {
    type: Array,
    default: () => [],
  },
})

function destroy(id) {
  if (confirm('Yakin ingin menghapus berita ini?')) {
    Inertia.delete(route('admin.berita.destroy', id))
  }
}
</script>

<template>
  <!-- Set the page title -->
  <Head title="Daftar Berita" />

  <!-- Wrap in your admin layout -->
  <AuthenticatedLayout>
    <!-- Header slot for the nav -->
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Daftar Berita
      </h2>
    </template>

    <!-- Main content -->
    <div class="py-6">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">
        <!-- Action button -->
        <div class="flex justify-end">
          <Link
            :href="route('admin.berita.create')"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
          >
            Tambah Berita
          </Link>
        </div>

        <!-- Table container -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kutipan</th>
                  <th class="px-6 py-3"></th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="b in props.beritas" :key="b.id">
                  <td class="px-6 py-4 whitespace-nowrap">{{ b.id }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ b.judul }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ b.kutipan }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                    <Link
                      :href="route('admin.berita.show', b.id)"
                      class="text-blue-600 hover:underline"
                    >View</Link>
                    <Link
                      :href="route('admin.berita.edit', b.id)"
                      class="text-green-600 hover:underline"
                    >Edit</Link>
                    <button
                      @click="destroy(b.id)"
                      class="text-red-600 hover:underline"
                    >Delete</button>
                  </td>
                </tr>
                <tr v-if="props.beritas.length === 0">
                  <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                    Belum ada berita.
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
