<template>
    <div>
      <h1>Daftar Romos</h1>
      <inertia-link href="/admin/romos/create">Tambah Romos</inertia-link>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="romo in romos" :key="romo.id">
            <td>{{ romo.id }}</td>
            <td>{{ romo.nama }}</td>
            <td>
              <div v-if="romo.foto">
                <img :src="romo.foto" alt="Foto Romos" style="max-width: 100px;">
              </div>
              <div v-else>
                Tidak ada foto.
              </div>
            </td>
            <td>
              <inertia-link :href="`/admin/romos/${romo.id}`">Detail</inertia-link> |
              <inertia-link :href="`/admin/romos/${romo.id}/edit`">Edit</inertia-link> |
              <button @click="destroy(romo.id)">Hapus</button>
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
      romos: Array, // Data romos dari controller
    },
    components: {
      InertiaLink,
    },
    methods: {
      destroy(id) {
        if (confirm("Yakin ingin menghapus data romos ini?")) {
          Inertia.delete(`/admin/romos/${id}`)
        }
      },
    },
  }
  </script>
  