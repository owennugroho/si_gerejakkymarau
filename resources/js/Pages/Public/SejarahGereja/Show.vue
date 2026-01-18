<script setup>
import { Head } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  sejarahGereja: Object,
})
</script>

<template>

  <Head :title="sejarahGereja?.judul ?? 'Sejarah Gereja'" />

  <GuestLayout>
    <section class="max-w-4xl mx-auto py-16 px-6">
      <h1 class="text-3xl md:text-4xl font-bold mb-8 text-center text-amber-600">
        {{ sejarahGereja?.judul || 'Sejarah Gereja' }}
      </h1>

      <div v-if="sejarahGereja && sejarahGereja.isi" class="prose prose-lg max-w-3xl mx-auto text-gray-800 text-justify formatted-content"
        v-html="sejarahGereja.isi"></div>

      <div v-else class="text-center text-gray-500 mt-16 italic">
        Belum ada konten sejarah gereja.
      </div>
    </section>
  </GuestLayout>
</template>
