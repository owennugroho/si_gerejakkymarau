<template>
    <div>
      <h1>Edit Info</h1>
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
      info: Object,
    },
    data() {
      return {
        form: {
          judul: this.info.judul,
          isi: this.info.isi,
        },
      }
    },
    methods: {
      submit() {
        Inertia.put(`/admin/infos/${this.info.id}`, this.form)
      }
    }
  }
  </script>
  