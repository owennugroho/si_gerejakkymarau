<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  beritas: {
    type: Array,
    default: () => [],
  },
})
</script>

<template>
  <Head title="Daftar Berita" />

  <GuestLayout>
    <div class="mx-auto max-w-7xl py-8 px-4">
      <h1 class="text-3xl font-semibold mb-6 text-green-800 text-center">
        Daftar Berita
      </h1>

      <!-- grid dengan auto-fit & minmax -->
      <div
        class="grid gap-6
               [grid-template-columns:repeat(auto-fit,minmax(16rem,1fr))]"
      >
        <div
          v-for="b in beritas"
          :key="b.id"
          class="overflow-hidden rounded-lg border bg-white shadow hover:shadow-lg transition"
        >
          <Link :href="route('berita.show', b.id)" class="block h-full">
            <div class="h-48 bg-gray-100 overflow-hidden">
              <img
                v-if="b.foto"
                :src="`/storage/${b.foto}`"
                class="w-full h-full object-cover"
              />
              <div
                v-else
                class="flex h-full items-center justify-center text-gray-400"
              >
                No Image
              </div>
            </div>

            <div class="p-4 flex flex-col h-full">
              <h2 class="text-lg font-medium mb-1 text-gray-900">
                {{ b.judul }}
              </h2>
              <p class="text-sm text-gray-600 mb-3">
                Oleh {{ b.penulis }} •
                {{ new Date(b.created_at).toLocaleDateString() }}
              </p>
              <p class="text-sm text-gray-700 line-clamp-3 mb-4 flex-1">
                {{ b.kutipan }}
              </p>
              <div class="mt-auto text-right">
                <span class="text-blue-600 hover:underline">
                  Baca Selengkapnya →
                </span>
              </div>
            </div>
          </Link>
        </div>

        <div
          v-if="!beritas.length"
          class="col-span-full text-center text-gray-500 py-12"
        >
          Belum ada berita.
        </div>
      </div>
    </div>
  </GuestLayout>
</template>


<style scoped>
</style>
