<template>
    <div>
      <h1>Daftar Visi & Misi</h1>
      <inertia-link href="/admin/visimisis/create">Tambah Visi & Misi</inertia-link>
      <table border="1" cellpadding="8">
        <thead>
          <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="visimisi in visimisis" :key="visimisi.id">
            <td>{{ visimisi.id }}</td>
            <td>{{ visimisi.judul }}</td>
            <td>
              <inertia-link :href="`/admin/visimisis/${visimisi.id}`">Detail</inertia-link>
              |
              <inertia-link :href="`/admin/visimisis/${visimisi.id}/edit`">Edit</inertia-link>
              |
              <button @click="destroy(visimisi.id)">Hapus</button>
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
      visimisis: Array,
    },
    components: { InertiaLink },
    methods: {
      destroy(id) {
        if (confirm("Anda yakin ingin menghapus data visimisi ini?")) {
          Inertia.delete(`/admin/visimisis/${id}`)
        }
      }
    }
  }
  </script>
  