<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  visimisis: Array,
})
</script>

<template>
  <Head title="Visi & Misi" />

  <GuestLayout>
    <div class="max-w-3xl mx-auto py-8 px-4 space-y-12">
      <template v-if="visimisis.length">
        <div
          v-for="item in visimisis"
          :key="item.id"
          class="space-y-6"
        >
          <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center text-amber-500">
            {{ item.judul }}
          </h2>
          <div class="prose prose-lg mx-auto text-gray-800">
            <div v-html="item.isi"></div>
          </div>
        </div>
      </template>
      <div v-else class="text-center text-gray-500">
        Belum ada konten Visi & Misi.
      </div>
    </div>
  </GuestLayout>
</template>

<style scoped>
/* Jika perlu override styling DaisyUI/Tailwind */
</style>
