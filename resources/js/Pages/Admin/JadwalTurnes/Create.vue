<template>
    <div>
      <h1>Tambah Jadwal Turnes</h1>
      <form @submit.prevent="submit">
        <div>
          <label>Lokasi:</label>
          <input type="text" v-model="form.lokasi" required />
        </div>
        <div>
          <label>Tanggal:</label>
          <input type="date" v-model="form.tanggal" required />
        </div>
        <div>
          <label>Hari:</label>
          <input type="text" v-model="form.hari" required />
        </div>
        <div>
          <label>Jam Mulai:</label>
          <input type="time" v-model="form.jam_mulai" required />
        </div>
        <div>
          <label>Romo:</label>
          <select v-model="form.romo_id" required>
            <option value="">-- Pilih Romos --</option>
            <option v-for="romo in romos" :key="romo.id" :value="romo.id">
              {{ romo.nama }}
            </option>
          </select>
        </div>
        <div>
          <label>Deskripsi:</label>
          <textarea v-model="form.deskripsi"></textarea>
        </div>
        <button type="submit">Simpan</button>
      </form>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia'
  
  export default {
    props: {
      romos: Array, // Data romos yang harus dikirim dari controller
    },
    data() {
      return {
        form: {
          lokasi: '',
          tanggal: '',
          hari: '',
          jam_mulai: '',
          romo_id: '',
          deskripsi: '',
        }
      }
    },
    methods: {
      submit() {
        Inertia.post('/admin/jadwal-turnes', this.form)
      }
    }
  }
  </script>
  