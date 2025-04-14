<template>
    <div>
      <h1>Tambah Info</h1>
      <form @submit.prevent="submit">
        <div>
          <label>Judul:</label>
          <input type="text" v-model="form.judul" required />
        </div>
        <div>
          <label>Isi:</label>
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
          judul: '',
          isi: '',
        },
      }
    },
    methods: {
      submit() {
        Inertia.post('/admin/infos', this.form)
      }
    }
  }
  </script>
  