<template>
    <div>
      <h1>Detail Stasi</h1>
      <p><strong>Nama Stasi:</strong> {{ stasi.nama_stasi }}</p>
      <p><strong>Desa:</strong> {{ stasi.desa }}</p>
      <p><strong>Alamat:</strong> {{ stasi.alamat }}</p>
      <p><strong>Deskripsi:</strong> {{ stasi.deskripsi }}</p>
      <p><strong>Jumlah Umat Laki:</strong> {{ stasi.umat_laki }}</p>
      <p><strong>Jumlah Umat Perempuan:</strong> {{ stasi.umat_perempuan }}</p>
      <div>
        <strong>Foto Gereja:</strong>
        <div v-if="stasi.foto_gereja">
          <img :src="stasi.foto_gereja" alt="Foto Gereja" style="max-width: 200px;">
        </div>
        <div v-else>Tidak ada foto gereja.</div>
      </div>
      <div>
        <strong>Foto Tanah:</strong>
        <div v-if="stasi.foto_tanah">
          <img :src="stasi.foto_tanah" alt="Foto Tanah" style="max-width: 200px;">
        </div>
        <div v-else>Tidak ada foto tanah.</div>
      </div>
      <div style="margin-top: 1rem;">
        <inertia-link :href="`/admin/stasis/${stasi.id}/edit`">Edit</inertia-link>
        <inertia-link href="/admin/stasis">Kembali ke Daftar</inertia-link>
      </div>
    </div>
  </template>
  
  <script>
  import { Link as InertiaLink } from '@inertiajs/inertia-vue3'
  
  export default {
    props: {
      stasi: Object,
    },
    components: { InertiaLink }
  }
  </script>
  