<template>
    <div>
      <h1>Edit Donasi</h1>
      <form @submit.prevent="submit">
        <div>
          <label>Nama Bank:</label>
          <input type="text" v-model="form.nama_bank" />
        </div>
        <div>
          <label>Nomor Rekening:</label>
          <input type="text" v-model="form.nomor_rekening" />
        </div>
        <div>
          <label>Atas Nama:</label>
          <input type="text" v-model="form.atas_nama" />
        </div>
        <div>
          <label>QRIS Image (URL):</label>
          <input type="text" v-model="form.qris_image" />
        </div>
        <div>
          <label>Keterangan:</label>
          <textarea v-model="form.keterangan"></textarea>
        </div>
        <button type="submit">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia'
  
  export default {
    props: {
      donasi: Object,
    },
    data() {
      return {
        form: {
          nama_bank: this.donasi.nama_bank,
          nomor_rekening: this.donasi.nomor_rekening,
          atas_nama: this.donasi.atas_nama,
          qris_image: this.donasi.qris_image,
          keterangan: this.donasi.keterangan,
        }
      }
    },
    methods: {
      submit() {
        Inertia.put(`/admin/donasis/${this.donasi.id}`, this.form)
      }
    }
  }
  </script>
  