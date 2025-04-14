<template>
    <div>
      <h1>Daftar Info</h1>
      <inertia-link href="/admin/infos/create">Tambah Info</inertia-link>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="info in infos" :key="info.id">
            <td>{{ info.id }}</td>
            <td>{{ info.judul }}</td>
            <td>
              <inertia-link :href="`/admin/infos/${info.id}`">Detail</inertia-link>
              <inertia-link :href="`/admin/infos/${info.id}/edit`">Edit</inertia-link>
              <button @click="destroy(info.id)">Hapus</button>
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
      infos: Array,
    },
    components: { InertiaLink },
    methods: {
      destroy(id) {
        if(confirm("Apakah Anda yakin ingin menghapus info ini?")){
          Inertia.delete(`/admin/infos/${id}`)
        }
      }
    }
  }
  </script>
  