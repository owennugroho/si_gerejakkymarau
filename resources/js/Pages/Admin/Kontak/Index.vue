<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold">Pesan Kontak Masuk</h2>
    </template>

    <div class="overflow-x-auto bg-white shadow rounded-lg p-6">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-2 text-left text-sm font-medium">#</th>
            <th class="px-4 py-2 text-left text-sm font-medium">Nama</th>
            <th class="px-4 py-2 text-left text-sm font-medium">Email</th>
            <th class="px-4 py-2 text-left text-sm font-medium">Pesan</th>
            <th class="px-4 py-2 text-left text-sm font-medium">No. HP</th>
            <th class="px-4 py-2 text-left text-sm font-medium">Whatsapp?</th>
            <th class="px-4 py-2 text-left text-sm font-medium">Paroki / Lingkungan</th>
            <th class="px-4 py-2 text-left text-sm font-medium">Status</th>
            <th class="px-4 py-2"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <tr v-for="k in kontaks" :key="k.id">
            <td class="px-4 py-2 text-sm">{{ k.id }}</td>
            <td class="px-4 py-2 text-sm">{{ k.name }}</td>
            <td class="px-4 py-2 text-sm">{{ k.email }}</td>
            <td class="px-4 py-2 text-sm">{{ k.message }}</td>
            <td class="px-4 py-2 text-sm">{{ k.phone || '–' }}</td>
            <td class="px-4 py-2 text-sm">{{ k.can_whatsapp ? 'Ya' : 'Tidak' }}</td>
            <td class="px-4 py-2 text-sm">
              {{ k.asal_paroki || '–' }}<br />
              <small>{{ k.asal_lingkungan || '–' }}</small>
            </td>
            <td class="px-4 py-2 text-sm">
              <span :class="k.is_read ? 'text-green-600' : 'text-red-600'">
                {{ k.is_read ? 'Dibaca' : 'Belum Dibaca' }}
              </span>
            </td>
            <td class="px-4 py-2 text-right space-x-4">
              <!-- Tombol Lihat -->
              <Link
                :href="route('admin.kontak.show', k.id)"
                class="text-blue-600 hover:underline text-sm"
              >
                Lihat
              </Link>
              <!-- Tombol Hapus -->
              <button
                @click.prevent="destroy(k.id)"
                class="text-red-600 hover:underline text-sm"
              >
                Hapus
              </button>
            </td>
          </tr>
          <tr v-if="!kontaks.length">
            <td colspan="9" class="px-4 py-8 text-center text-gray-500">
              Belum ada pesan.
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

// Unpack props
const { kontaks } = defineProps({ kontaks: Array })

function destroy(id) {
  if (!confirm('Yakin ingin menghapus pesan ini?')) return

  router.delete(route('admin.kontak.destroy', id), {
    onSuccess: () => {
      // Refetch daftar agar baris yang dihapus hilang
      router.get(route('admin.kontak.index'), {}, { preserveState: true })
    },
  })
}
</script>
