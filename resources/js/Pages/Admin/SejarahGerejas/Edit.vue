<template>
  <div>
    <h1>Edit Sejarah Gereja</h1>
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
    sejarah: Object,
  },
  data() {
    return {
      form: {
        judul: this.sejarah.judul,
        isi: this.sejarah.isi,
      }
    }
  },
  methods: {
    submit() {
      Inertia.put(`/admin/sejarah-gerejas/${this.sejarah.id}`, this.form)
    }
  }
}
</script>
