<template>
    <div>
      <h1>Detail Romos</h1>
      <p><strong>Nama:</strong> {{ romo.nama }}</p>
      <div>
        <strong>Foto:</strong>
        <div v-if="romo.foto">
          <img :src="romo.foto" alt="Foto Romos" style="max-width: 300px;">
        </div>
        <div v-else>
          Tidak ada foto.
        </div>
      </div>
      <div>
        <strong>Deskripsi / Biografi:</strong>
        <p v-html="romo.isi"></p>
      </div>
      <div style="margin-top: 1rem;">
        <inertia-link :href="`/admin/romos/${romo.id}/edit`">Edit</inertia-link>
        <inertia-link href="/admin/romos">Kembali ke Daftar</inertia-link>
      </div>
    </div>
  </template>
  
  <script>
  import { Link as InertiaLink } from '@inertiajs/inertia-vue3'
  export default {
    props: {
      romo: Object,
    },
    components: { InertiaLink },
  }
  </script>
  