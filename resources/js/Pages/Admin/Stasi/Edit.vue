<template>
    <div>
      <h1>Edit Stasi</h1>
      <form @submit.prevent="submit">
        <div>
          <label>Nama Stasi:</label>
          <input type="text" v-model="form.nama_stasi" required />
        </div>
        <div>
          <label>Desa:</label>
          <input type="text" v-model="form.desa" placeholder="Opsional" />
        </div>
        <div>
          <label>Alamat:</label>
          <textarea v-model="form.alamat" required></textarea>
        </div>
        <div>
          <label>Deskripsi:</label>
          <textarea v-model="form.deskripsi" placeholder="Opsional"></textarea>
        </div>
        <div>
          <label>Jumlah Umat Laki:</label>
          <input type="number" v-model="form.umat_laki" min="0" required />
        </div>
        <div>
          <label>Jumlah Umat Perempuan:</label>
          <input type="number" v-model="form.umat_perempuan" min="0" required />
        </div>
        <div>
          <label>Foto Gereja (URL):</label>
          <input type="text" v-model="form.foto_gereja" placeholder="Opsional" />
        </div>
        <div>
          <label>Foto Tanah (URL):</label>
          <input type="text" v-model="form.foto_tanah" placeholder="Opsional" />
        </div>
        <button type="submit">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia'
  
  export default {
    props: {
      stasi: Object,  // Data stasi yang diambil dari controller
    },
    data() {
      return {
        form: {
          nama_stasi: this.stasi.nama_stasi,
          desa: this.stasi.desa,
          alamat: this.stasi.alamat,
          deskripsi: this.stasi.deskripsi,
          umat_laki: this.stasi.umat_laki,
          umat_perempuan: this.stasi.umat_perempuan,
          foto_gereja: this.stasi.foto_gereja,
          foto_tanah: this.stasi.foto_tanah,
        }
      }
    },
    methods: {
      submit() {
        Inertia.put(`/admin/stasis/${this.stasi.id}`, this.form)
      }
    }
  }
  </script>
  