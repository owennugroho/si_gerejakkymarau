<script setup>
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({
  jadwals: Array, // koleksi JadwalTurne
})
</script>

<template>
  <Head title="Jadwal Turne" />

  <div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6">Jadwal Turne</h1>

    <ul class="space-y-4">
      <li
        v-for="j in jadwals"
        :key="j.id"
        class="border rounded-lg p-4 hover:shadow"
      >
        <Link
          :href="route('jadwal-turne.show', j.id)"
          class="text-xl font-semibold text-blue-600 hover:underline"
        >
          {{ j.lokasi }} — {{ new Date(j.tanggal).toLocaleDateString() }}
        </Link>
        <p class="text-gray-600">
          Romo: {{ j.romo.nama }} | Hari: {{ j.hari }} | Jam: {{ j.jam_mulai }}
        </p>
        <p class="mt-2 text-gray-700">
          {{ j.deskripsi?.length > 100
             ? j.deskripsi.substr(0,100)+'…'
             : j.deskripsi }}
        </p>
      </li>
    </ul>

    <p v-if="!jadwals.length" class="text-center text-gray-500 mt-12">
      Belum ada jadwal turne.
    </p>
  </div>
</template>
