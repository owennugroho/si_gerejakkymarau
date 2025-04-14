<template>
  <div>
    <h1>Tambah Sejarah Gereja</h1>
    <form @submit.prevent="submit">
      <div>
        <label>Judul:</label>
        <input type="text" v-model="form.judul" placeholder="Masukkan judul" required />
      </div>
      <div>
        <label>Isi:</label>
        <textarea v-model="form.isi" placeholder="Masukkan isi sejarah gereja" required></textarea>
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
      }
    }
  },
  methods: {
    submit() {
      Inertia.post('/admin/sejarah-gerejas', this.form)
    }
  }
}
</script>
