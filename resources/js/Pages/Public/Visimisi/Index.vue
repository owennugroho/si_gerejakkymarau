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
    <section class="max-w-4xl mx-auto py-16 px-6 space-y-12">

      <h1 class="text-3xl md:text-4xl font-bold text-center text-amber-600">
        Visi & Misi
      </h1>

      <template v-if="visimisis.length">

        <div v-for="item in visimisis" :key="item.id" class="space-y-6">

          <h2 class="text-2xl md:text-3xl font-semibold text-center text-green-800">
            {{ item.judul }}
          </h2>

          <div class="text-gray-800 text-lg leading-relaxed text-justify space-y-4" v-html="item.isi"></div>

        </div>

      </template>

      <div v-else class="text-center text-gray-500 italic">
        Belum ada konten Visi & Misi.
      </div>

    </section>
  </GuestLayout>
</template>

<style scoped>
/* Jika perlu override styling DaisyUI/Tailwind */
</style>
