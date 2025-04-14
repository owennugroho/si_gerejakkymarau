<template>
    <div>
      <h1>Tambah Romos</h1>
      <form @submit.prevent="submit">
        <div>
          <label>Nama:</label>
          <input type="text" v-model="form.nama" required />
        </div>
        <div>
          <label>Foto (URL):</label>
          <input type="text" v-model="form.foto" placeholder="Masukkan URL foto (opsional)" />
        </div>
        <div>
          <label>Deskripsi / Biografi:</label>
          <textarea v-model="form.isi" required></textarea>
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
          nama: '',
          foto: '',
          isi: '',
        },
      }
    },
    methods: {
      submit() {
        Inertia.post('/admin/romos', this.form)
      }
    }
  }
  </script>
  