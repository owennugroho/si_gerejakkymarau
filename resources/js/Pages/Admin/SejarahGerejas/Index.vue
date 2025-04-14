<template>
  <div>
    <h1>Daftar Sejarah Gereja</h1>
    <inertia-link href="/admin/sejarah-gerejas/create">Tambah Sejarah Gereja</inertia-link>
    <table border="1" cellpadding="8">
      <thead>
        <tr>
          <th>ID</th>
          <th>Judul</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="sejarah in sejarahGerejas" :key="sejarah.id">
          <td>{{ sejarah.id }}</td>
          <td>{{ sejarah.judul }}</td>
          <td>
            <inertia-link :href="`/admin/sejarah-gerejas/${sejarah.id}`">Detail</inertia-link>
            |
            <inertia-link :href="`/admin/sejarah-gerejas/${sejarah.id}/edit`">Edit</inertia-link>
            |
            <button @click="destroy(sejarah.id)">Hapus</button>
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
    sejarahGerejas: Array,
  },
  components: { InertiaLink },
  methods: {
    destroy(id) {
      if (confirm("Anda yakin ingin menghapus sejarah gereja ini?")) {
        Inertia.delete(`/admin/sejarah-gerejas/${id}`)
      }
    },
  },
}
</script>
