<!-- resources/js/Pages/Info/Index.vue -->
<template>
  <Head title="Informasi Gereja" />

  <GuestLayout>
    <!-- Wrapper background off-white -->
    <div class="bg-gray-50 py-12">
      <div class="max-w-4xl mx-auto px-4 space-y-8">
        <!-- Judul Halaman -->
        <h1 class="text-3xl font-bold text-center text-green-800">
          Informasi Gereja
        </h1>

        <!-- Blok Informasi Dinamis -->
        <div v-if="infos.length" class="space-y-6">
          <section
            v-for="info in infos"
            :key="info.id"
          >
            <h2 class="text-2xl font-semibold text-amber-500 text-center mb-4">
              {{ info.judul }}
            </h2>
            <div
              class="prose prose-lg text-green-800 mx-auto text-center"
              v-html="info.isi"
            />
          </section>
        </div>
        <div v-else class="text-center text-gray-500 py-12">
          Belum ada informasi tersedia.
        </div>

        <!-- === TAMBAHKAN PETA DI SINI === -->
        <section class="mt-12">
          <h2 class="text-xl font-semibold text-amber-500 mb-4 text-center">
            Lokasi Gereja
          </h2>
          <div class="w-full h-64 md:h-96 rounded-lg overflow-hidden shadow-md">
            <iframe
              class="w-full h-full"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4070270.4756309404!2d107.89016069750956!3d-4.960687967765621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e059359d53eb97d%3A0xc02a79122806fb55!2sGereja%20Katolik%20Paroki%20Kanak-Kanak%20Yesus%2C%20Marau!5e0!3m2!1sen!2sid!4v1746777087037!5m2!1sen!2sid"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </section>
        <!-- === SELESAI EMBED MAPS === -->

      </div>
    </div>
  </GuestLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
  infos: {
    type: Array,
    default: () => [],
  },
})
</script>
