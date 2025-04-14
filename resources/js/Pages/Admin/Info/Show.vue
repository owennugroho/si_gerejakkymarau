<template>
    <div>
      <h1>Detail Info</h1>
      <p><strong>Judul:</strong> {{ info.judul }}</p>
      <div>
        <strong>Isi:</strong>
        <p>{{ info.isi }}</p>
      </div>
      <div>
        <inertia-link :href="`/admin/infos/${info.id}/edit`">Edit</inertia-link>
        <inertia-link href="/admin/infos">Kembali</inertia-link>
      </div>
    </div>
  </template>
  
  <script>
  import { Link as InertiaLink } from '@inertiajs/inertia-vue3'
  export default {
    props: {
      info: Object,
    },
    components: { InertiaLink }
  }
  </script>
  