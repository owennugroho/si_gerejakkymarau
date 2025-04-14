<template>
    <div>
      <h1>Detail Donasi</h1>
      <p><strong>Nama Bank:</strong> {{ donasi.nama_bank }}</p>
      <p><strong>Nomor Rekening:</strong> {{ donasi.nomor_rekening }}</p>
      <p><strong>Atas Nama:</strong> {{ donasi.atas_nama }}</p>
      <div>
        <strong>QRIS Image:</strong>
        <div v-if="donasi.qris_image">
          <img :src="donasi.qris_image" alt="QRIS" style="max-width:300px;">
        </div>
        <div v-else>
          Tidak ada gambar.
        </div>
      </div>
      <p><strong>Keterangan:</strong></p>
      <p>{{ donasi.keterangan }}</p>
      <div>
        <inertia-link :href="`/admin/donasis/${donasi.id}/edit`">Edit</inertia-link>
        <inertia-link href="/admin/donasis">Kembali</inertia-link>
      </div>
    </div>
  </template>
  
  <script>
  import { Link } from '@inertiajs/inertia-vue3'
  
  export default {
    props: {
      donasi: Object,
    },
    components: { InertiaLink: Link },
  }
  </script>
  