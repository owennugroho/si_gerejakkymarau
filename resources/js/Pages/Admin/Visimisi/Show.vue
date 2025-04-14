<template>
    <div>
      <h1>Detail Visi & Misi</h1>
      <p><strong>Judul:</strong> {{ visimisi.judul }}</p>
      <div>
        <strong>Isi:</strong>
        <div v-html="visimisi.isi"></div>
      </div>
      <div style="margin-top: 1rem;">
        <inertia-link :href="`/admin/visimisis/${visimisi.id}/edit`">Edit</inertia-link>
        <inertia-link href="/admin/visimisis">Kembali ke Daftar</inertia-link>
      </div>
    </div>
  </template>
  
  <script>
  import { Link as InertiaLink } from '@inertiajs/inertia-vue3'
  
  export default {
    props: {
      visimisi: Object,
    },
    components: { InertiaLink },
  }
  </script>
  