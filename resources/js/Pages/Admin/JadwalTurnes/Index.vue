<template>
    <div>
      <h1>Daftar Jadwal Turnes</h1>
      <inertia-link href="/admin/jadwal-turnes/create">Tambah Jadwal</inertia-link>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
            <th>Hari</th>
            <th>Jam Mulai</th>
            <th>Romo</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="jadwal in jadwalTurnes" :key="jadwal.id">
            <td>{{ jadwal.id }}</td>
            <td>{{ jadwal.lokasi }}</td>
            <td>{{ jadwal.tanggal }}</td>
            <td>{{ jadwal.hari }}</td>
            <td>{{ jadwal.jam_mulai }}</td>
            <td>{{ jadwal.romos.nama }}</td>
            <td>
              <inertia-link :href="`/admin/jadwal-turnes/${jadwal.id}`">Detail</inertia-link>
              <inertia-link :href="`/admin/jadwal-turnes/${jadwal.id}/edit`">Edit</inertia-link>
              <button @click="destroy(jadwal.id)">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia'
  import { Link as InertiaLink } from '@inertiajs/inertia-vue3'
  
  export default {
    props: {
      jadwalTurnes: Array,
    },
    components: { InertiaLink },
    methods: {
      destroy(id) {
        if (confirm("Anda yakin ingin menghapus jadwal ini?")) {
          Inertia.delete(`/admin/jadwal-turnes/${id}`)
        }
      }
    }
  }
  </script>
  