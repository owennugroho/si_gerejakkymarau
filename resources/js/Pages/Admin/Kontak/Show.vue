<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold">Detail Pesan Kontak</h2>
    </template>

    <div class="py-6 px-4">
      <div class="flex justify-between items-center mb-4">
        <!-- Tombol Kembali -->
        <Link
          :href="route('admin.kontak.index')"
          class="text-blue-600 hover:underline"
        >
          ← Kembali
        </Link>
        <!-- Tombol Hapus di bawah header -->
        <button
          @click.prevent="destroy(kontak.id)"
          class="px-3 py-1 bg-red-600 text-white rounded text-sm"
        >
          Hapus
        </button>
      </div>

      <div class="bg-white shadow rounded-lg p-6 space-y-4">
        <div><strong>Nama</strong><br/>{{ kontak.name }}</div>
        <div>
          <strong>Email</strong><br/>
          {{ kontak.email ?? '–' }}
        </div>
        <div>
          <strong>No. HP</strong><br/>
          {{ kontak.phone || '–' }}
        </div>
        <div>
          <strong>Whatsapp?</strong><br/>
          {{ kontak.can_whatsapp ? 'Ya' : 'Tidak' }}
        </div>
        <div>
          <strong>Paroki / Lingkungan</strong><br/>
          {{ kontak.asal_paroki || '–' }} / {{ kontak.asal_lingkungan || '–' }}
        </div>
        <div>
          <strong>Pesan</strong><br/>
          <p class="whitespace-pre-wrap mt-1">{{ kontak.message }}</p>
        </div>
        <div>
          <strong>Dikirim</strong><br/>
          {{ kontak.sent_at }}
        </div>
        <div>
          <strong>Status</strong><br/>
          <span :class="kontak.is_read ? 'text-green-600' : 'text-red-600'">
            {{ kontak.is_read ? 'Dibaca' : 'Belum Dibaca' }}
          </span>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

// Unpack props
const { kontak } = defineProps({ kontak: Object })

function destroy(id) {
  if (!confirm('Yakin ingin menghapus pesan ini?')) return

  router.delete(route('admin.kontak.destroy', id), {
    onSuccess: () => {
      // Setelah dihapus, redirect kembali ke daftar
      router.get(route('admin.kontak.index'))
    },
  })
}
</script>
