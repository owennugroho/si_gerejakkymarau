<template>
    <div>
      <h1>Daftar Stasi</h1>
      <inertia-link href="/admin/stasis/create">Tambah Stasi</inertia-link>
      <table border="1" cellpadding="8">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Stasi</th>
            <th>Desa</th>
            <th>Alamat</th>
            <th>Jumlah Umat Laki</th>
            <th>Jumlah Umat Perempuan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="stasi in stasis" :key="stasi.id">
            <td>{{ stasi.id }}</td>
            <td>{{ stasi.nama_stasi }}</td>
            <td>{{ stasi.desa }}</td>
            <td>{{ stasi.alamat }}</td>
            <td>{{ stasi.umat_laki }}</td>
            <td>{{ stasi.umat_perempuan }}</td>
            <td>
              <inertia-link :href="`/admin/stasis/${stasi.id}`">Detail</inertia-link>
              |
              <inertia-link :href="`/admin/stasis/${stasi.id}/edit`">Edit</inertia-link>
              |
              <button @click="destroy(stasi.id)">Hapus</button>
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
      stasis: Array,  // Data stasis yang dikirim oleh controller
    },
    components: { InertiaLink },
    methods: {
      destroy(id) {
        if (confirm("Anda yakin ingin menghapus stasi ini?")) {
          Inertia.delete(`/admin/stasis/${id}`)
        }
      }
    }
  }
  </script>
  