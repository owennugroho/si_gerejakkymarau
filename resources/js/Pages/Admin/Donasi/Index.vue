<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { ref } from 'vue'

const props = defineProps({
  donasis: Array
})

// Form delete
const form = useForm()

function destroy(id) {
  if (confirm('Yakin ingin menghapus data ini?')) {
    form.delete(route('admin.donasi.destroy', id), {
      onSuccess: () => window.location.reload()
    })
  }
}
</script>

<template>
  <Head title="Daftar Donasi" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl">Daftar Donasi</h2>
    </template>

    <div class="p-6 bg-white rounded-lg shadow">
      <div class="flex justify-end mb-4">
        <Link
          class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
          :href="route('admin.donasi.create')"
        >
          + Tambah Donasi
        </Link>
      </div>

      <table class="w-full border-collapse">
        <thead>
          <tr>
            <th class="border px-4 py-2">#</th>
            <th class="border px-4 py-2">Bank</th>
            <th class="border px-4 py-2">No. Rekening</th>
            <th class="border px-4 py-2">Atas Nama</th>
            <th class="border px-4 py-2">QRIS</th>
            <th class="border px-4 py-2">Keterangan</th>
            <th class="border px-4 py-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, i) in donasis" :key="item.id">
            <td class="border px-4 py-2">{{ i+1 }}</td>
            <td class="border px-4 py-2">{{ item.nama_bank }}</td>
            <td class="border px-4 py-2">{{ item.nomor_rekening }}</td>
            <td class="border px-4 py-2">{{ item.atas_nama }}</td>
            <td class="border px-4 py-2">
              <img
                v-if="item.qris_image"
                :src="`/storage/${item.qris_image}`"
                alt="QRIS"
                class="h-12"
              />
              <span v-else class="text-gray-500">—</span>
            </td>
            <td class="border px-4 py-2">{{ item.keterangan }}</td>
            <td class="border px-4 py-2 space-x-2">
              <Link
                class="text-blue-600 hover:underline"
                :href="route('admin.donasi.show', item.id)"
              >Lihat</Link>
              <Link
                class="text-green-600 hover:underline"
                :href="route('admin.donasi.edit', item.id)"
              >Edit</Link>
              <button
                @click="destroy(item.id)"
                class="text-red-600 hover:underline"
              >Hapus</button>
            </td>
          </tr>
          <tr v-if="donasis.length===0">
            <td colspan="7" class="text-center py-4 text-gray-500">
              Belum ada data donasi.
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </AuthenticatedLayout>
</template>
