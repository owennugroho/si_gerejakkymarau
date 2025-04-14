<template>
    <div>
      <h1>Daftar Donasi</h1>
      <inertia-link href="/admin/donasis/create">Tambah Donasi</inertia-link>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Bank</th>
            <th>Nomor Rekening</th>
            <th>Atas Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="donasi in donasis" :key="donasi.id">
            <td>{{ donasi.id }}</td>
            <td>{{ donasi.nama_bank }}</td>
            <td>{{ donasi.nomor_rekening }}</td>
            <td>{{ donasi.atas_nama }}</td>
            <td>
              <inertia-link :href="`/admin/donasis/${donasi.id}`">Detail</inertia-link>
              <inertia-link :href="`/admin/donasis/${donasi.id}/edit`">Edit</inertia-link>
              <button @click="destroy(donasi.id)">Hapus</button>
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
      donasis: Array,
    },
    components: { InertiaLink },
    methods: {
      destroy(id) {
        if(confirm("Yakin ingin menghapus data donasi ini?")){
          Inertia.delete(`/admin/donasis/${id}`)
        }
      }
    }
  }
  </script>
  