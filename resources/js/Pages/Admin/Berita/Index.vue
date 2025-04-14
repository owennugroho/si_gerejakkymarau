<template>
    <div>
      <h1>Daftar Berita</h1>
      <inertia-link href="/admin/beritas/create">Tambah Berita</inertia-link>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in beritas" :key="item.id">
            <td>{{ item.id }}</td>
            <td>{{ item.judul }}</td>
            <td>{{ item.penulis }}</td>
            <td>
              <inertia-link :href="`/admin/beritas/${item.id}`">Detail</inertia-link>
              <inertia-link :href="`/admin/beritas/${item.id}/edit`">Edit</inertia-link>
              <button @click="destroy(item.id)">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia'
  import { Link } from '@inertiajs/inertia-vue3'
  
  export default {
    props: {
      beritas: Array,
    },
    components: { InertiaLink: Link },
    methods: {
      destroy(id) {
        if (confirm("Apakah anda yakin ingin menghapus berita ini?")) {
          Inertia.delete(`/admin/beritas/${id}`)
        }
      }
    }
  }
  </script>
  