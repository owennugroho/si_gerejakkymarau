<template>
    <div>
      <h1>Detail Jadwal Turnes</h1>
      <p><strong>Lokasi:</strong> {{ jadwalTurne.lokasi }}</p>
      <p><strong>Tanggal:</strong> {{ jadwalTurne.tanggal }}</p>
      <p><strong>Hari:</strong> {{ jadwalTurne.hari }}</p>
      <p><strong>Jam Mulai:</strong> {{ jadwalTurne.jam_mulai }}</p>
      <p><strong>Romo:</strong> {{ jadwalTurne.romos.nama }}</p>
      <div>
        <strong>Deskripsi:</strong>
        <p>{{ jadwalTurne.deskripsi }}</p>
      </div>
      <div style="margin-top: 1rem;">
        <inertia-link :href="`/admin/jadwal-turnes/${jadwalTurne.id}/edit`">Edit</inertia-link>
        <inertia-link href="/admin/jadwal-turnes">Kembali</inertia-link>
      </div>
    </div>
  </template>
  
  <script>
  import { Link as InertiaLink } from '@inertiajs/inertia-vue3'
  
  export default {
    props: {
      jadwalTurne: Object,
    },
    components: { InertiaLink }
  }
  </script>
  