<template>
    <div>
      <h1>Edit Berita</h1>
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
        <button type="submit">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia'
  
  export default {
    props: {
      berita: Object,
    },
    data() {
      return {
        form: {
          judul: this.berita.judul,
          penulis: this.berita.penulis,
          kutipan: this.berita.kutipan,
          foto: this.berita.foto,
          isi: this.berita.isi,
        }
      }
    },
    methods: {
      submit() {
        Inertia.put(`/admin/beritas/${this.berita.id}`, this.form)
      }
    }
  }
  </script>
  