<template>
    <div>
      <h1>Detail Berita</h1>
      <p><strong>Judul:</strong> {{ berita.judul }}</p>
      <p><strong>Penulis:</strong> {{ berita.penulis }}</p>
      <p><strong>Kutipan:</strong> {{ berita.kutipan }}</p>
      <div>
        <strong>Foto:</strong>
        <div v-if="berita.foto">
          <img :src="berita.foto" alt="Foto Berita" style="max-width: 300px;">
        </div>
        <div v-else>
          Tidak ada foto.
        </div>
      </div>
      <div>
        <strong>Isi Berita:</strong>
        <div v-html="berita.isi"></div>
      </div>
      <div style="margin-top: 1rem;">
        <inertia-link :href="`/admin/beritas/${berita.id}/edit`">Edit</inertia-link>
        <inertia-link href="/admin/beritas">Kembali ke Daftar</inertia-link>
      </div>
    </div>
  </template>
  
  <script>
  import { Link } from '@inertiajs/inertia-vue3'
  
  export default {
    props: {
      berita: Object,
    },
    components: { InertiaLink: Link }
  }
  </script>
  