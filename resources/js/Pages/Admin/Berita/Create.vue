<template>
    <div>
      <h1>Tambah Berita</h1>
      <form @submit.prevent="submit">
        <div>
          <label>Judul:</label>
          <input type="text" v-model="form.judul" />
        </div>
        <div>
          <label>Penulis:</label>
          <input type="text" v-model="form.penulis" />
        </div>
        <div>
          <label>Kutipan:</label>
          <textarea v-model="form.kutipan"></textarea>
        </div>
        <div>
          <label>Foto (URL):</label>
          <input type="text" v-model="form.foto" />
        </div>
        <div>
          <label>Isi:</label>
          <textarea v-model="form.isi"></textarea>
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
          penulis: '',
          kutipan: '',
          foto: '',
          isi: '',
        },
      }
    },
    methods: {
      submit() {
        Inertia.post('/admin/beritas', this.form)
      }
    }
  }
  </script>
  