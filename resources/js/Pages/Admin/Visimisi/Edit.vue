<template>
    <div>
      <h1>Edit Visi & Misi</h1>
      <form @submit.prevent="submit">
        <div>
          <label>Judul:</label>
          <input type="text" v-model="form.judul" required />
        </div>
        <div>
          <label>Isi:</label>
          <textarea v-model="form.isi" required></textarea>
        </div>
        <button type="submit">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia'
  
  export default {
    props: {
      visimisi: Object,
    },
    data() {
      return {
        form: {
          judul: this.visimisi.judul,
          isi: this.visimisi.isi,
        }
      }
    },
    methods: {
      submit() {
        Inertia.put(`/admin/visimisis/${this.visimisi.id}`, this.form)
      }
    }
  }
  </script>
  