<script setup>
import { Link, Head } from '@inertiajs/vue3'

const props = defineProps({
  beritas: Array,
})
</script>

<template>
  <Head title="Daftar Berita" />

  <div class="prose mx-auto py-8">
    <h1>Daftar Berita</h1>
    <ul>
      <li v-for="b in beritas" :key="b.id" class="mb-4">
        <Link 
          :href="route('berita.show', b.id)"
          class="text-blue-600 hover:underline"
        >
          {{ b.judul }}
        </Link>
        <p class="text-sm text-gray-600">
          {{ new Date(b.created_at).toLocaleDateString() }}
        </p>
      </li>
    </ul>
  </div>
</template>
