<template>
    <div>
      <h1>Tambah Stasi</h1>
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
          nama_stasi: '',
          desa: '',
          alamat: '',
          deskripsi: '',
          umat_laki: 0,
          umat_perempuan: 0,
          foto_gereja: '',
          foto_tanah: '',
        }
      }
    },
    methods: {
      submit() {
        Inertia.post('/admin/stasis', this.form)
      }
    }
  }
  </script>
  