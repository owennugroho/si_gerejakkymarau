<template>
    <div>
      <h1>Tambah Donasi</h1>
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
        <button type="submit">Simpan</button>
      </form>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia'
  
  export default {
    data() {
      return {
        form: {
          nama_bank: '',
          nomor_rekening: '',
          atas_nama: '',
          qris_image: '',
          keterangan: '',
        }
      }
    },
    methods: {
      submit() {
        Inertia.post('/admin/donasis', this.form)
      }
    }
  }
  </script>
  