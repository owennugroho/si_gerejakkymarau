<template>
  <div>
    <h1>Detail Sejarah Gereja</h1>
    <p><strong>Judul:</strong> {{ sejarah.judul }}</p>
    <div>
      <strong>Isi:</strong>
      <div v-html="sejarah.isi"></div>
    </div>
    <div style="margin-top: 1rem;">
      <inertia-link :href="`/admin/sejarah-gerejas/${sejarah.id}/edit`">Edit</inertia-link>
      <inertia-link href="/admin/sejarah-gerejas">Kembali ke Daftar</inertia-link>
    </div>
  </div>
</template>

<script>
import { Link as InertiaLink } from '@inertiajs/inertia-vue3'
export default {
  props: {
    sejarah: Object,
  },
  components: { InertiaLink }
}
</script>
