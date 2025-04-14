<template>
    <div>
      <h1>Detail Foto Kegiatan</h1>
      <p><strong>Judul:</strong> {{ foto.judul || 'Tidak ada judul' }}</p>
      <p><strong>Deskripsi:</strong> {{ foto.deskripsi || 'Tidak ada deskripsi' }}</p>
      <div>
        <strong>Foto:</strong>
        <div v-if="foto.foto">
          <img :src="foto.foto" alt="Foto Kegiatan" style="max-width: 300px;">
        </div>
        <div v-else>
          Tidak ada foto.
        </div>
      </div>
      <div style="margin-top: 1rem;">
        <inertia-link :href="`/admin/kegiatan-fotos/${foto.id}/edit`">Edit</inertia-link>
        <inertia-link href="/admin/kegiatan-fotos">Kembali ke Daftar</inertia-link>
      </div>
    </div>
  </template>
  
  <script>
  import { Link as InertiaLink } from '@inertiajs/inertia-vue3'
  
  export default {
    props: {
      foto: Object,
    },
    components: { InertiaLink }
  }
  </script>
  