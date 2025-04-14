<template>
    <div>
      <h1>Edit Romos</h1>
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
        <button type="submit">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia'
  
  export default {
    props: {
      romo: Object,
    },
    data() {
      return {
        form: {
          nama: this.romo.nama,
          foto: this.romo.foto,
          isi: this.romo.isi,
        },
      }
    },
    methods: {
      submit() {
        Inertia.put(`/admin/romos/${this.romo.id}`, this.form)
      }
    }
  }
  </script>
  