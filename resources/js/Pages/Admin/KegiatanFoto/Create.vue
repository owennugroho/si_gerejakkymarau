<template>
    <div>
      <h1>Tambah Foto Kegiatan</h1>
      <form @submit.prevent="submit">
        <div>
          <label>Judul:</label>
          <input type="text" v-model="form.judul" placeholder="Opsional">
        </div>
        <div>
          <label>Deskripsi:</label>
          <textarea v-model="form.deskripsi" placeholder="Opsional"></textarea>
        </div>
        <div>
          <label>Foto (URL):</label>
          <input type="text" v-model="form.foto" required placeholder="Masukkan URL gambar">
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
          judul: '',
          deskripsi: '',
          foto: '',
        },
      }
    },
    methods: {
      submit() {
        Inertia.post('/admin/kegiatan-fotos', this.form)
      }
    }
  }
  </script>
  