<template>
    <div>
      <h1>Daftar Kegiatan Foto</h1>
      <inertia-link href="/admin/kegiatan-fotos/create">Tambah Foto</inertia-link>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="foto in fotos" :key="foto.id">
            <td>{{ foto.id }}</td>
            <td>{{ foto.judul }}</td>
            <td>{{ foto.deskripsi }}</td>
            <td>
              <img :src="foto.foto" alt="Foto Kegiatan" style="max-width:100px;">
            </td>
            <td>
              <inertia-link :href="`/admin/kegiatan-fotos/${foto.id}`">Detail</inertia-link>
              <inertia-link :href="`/admin/kegiatan-fotos/${foto.id}/edit`">Edit</inertia-link>
              <button @click="destroy(foto.id)">Hapus</button>
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
      fotos: Array, // Pastikan data ini dikirim dari controller
    },
    components: { InertiaLink },
    methods: {
      destroy(id) {
        if (confirm("Yakin ingin menghapus foto kegiatan ini?")) {
          Inertia.delete(`/admin/kegiatan-fotos/${id}`)
        }
      },
    },
  }
  </script>
  