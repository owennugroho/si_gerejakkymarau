<template>
    <div>
      <h1>Edit Foto Kegiatan</h1>
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
          <input type="text" v-model="form.foto" required>
        </div>
        <button type="submit">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia'
  
  export default {
    props: {
      foto: Object, // Data foto kegiatan dari controller
    },
    data() {
      return {
        form: {
          judul: this.foto.judul,
          deskripsi: this.foto.deskripsi,
          foto: this.foto.foto,
        },
      }
    },
    methods: {
      submit() {
        Inertia.put(`/admin/kegiatan-fotos/${this.foto.id}`, this.form)
      }
    }
  }
  </script>
  