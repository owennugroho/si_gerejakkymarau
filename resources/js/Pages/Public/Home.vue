<template>

  <Head title="Beranda" />

  <GuestLayout>
    <!-- Hero Section -->
    <HeroSection bg-image="/images/background.jpg" title="Selamat Datang di Gereja Kanak-kanak Yesus Marau">
      <template #cta>
        <Link href="info" class="btn btn-warning text-green-800 btn-lg">
        Kunjungi Kami
        </Link>
      </template>
    </HeroSection>

    <!-- Jadwal Section -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4 text-center mb-12">
        <img src="/images/logo.png" alt="Logo Jadwal" class="h-12 w-12 mx-auto mb-4" />
        <h2 class="text-4xl font-bold text-green-800">Jadwal Ekaristi</h2>
      </div>
      <div class="container mx-auto px-4 flex flex-col md:flex-row justify-center items-start">
        <!-- Kolom Misa Harian -->
        <div class="md:w-1/4 text-center">
          <h3 class="text-xl font-semibold text-green-800 mb-2">Misa Harian</h3>
          <p class="text-lg text-yellow-500">Senin–Sabtu: 05.15 WIB</p>
        </div>

        <!-- Separator vertikal -->
        <div class="hidden md:block border-l-2 border-green-800 mx-12 h-24"></div>

        <!-- Kolom Misa Mingguan -->
        <div class="md:w-1/4 text-center">
          <h3 class="text-xl font-semibold text-green-800 mb-2">Misa Mingguan</h3>
          <p class="text-lg text-yellow-500">Minggu: 07.30 WIB</p>
        </div>
      </div>
    </section>

    <!-- Berita Section -->
    <section class="py-16" style="background-color: #FFA07A;">
      <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-gray-800 mb-12 text-center">Berita Terbaru</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <div v-for="b in beritas.slice(0, 6)" :key="b.id"
            class="overflow-hidden rounded-lg border bg-white shadow hover:shadow-lg transition">
            <Link :href="route('berita.show', b.id)" class="block h-full">
            <!-- Image container -->
            <div class="h-48 bg-gray-100 overflow-hidden">
              <img v-if="b.foto" :src="`/storage/${b.foto}`" alt="Gambar Berita" class="w-full h-full object-cover" />
              <div v-else class="flex h-full items-center justify-center text-gray-400">
                No Image
              </div>
            </div>

            <!-- Content -->
            <div class="p-4 flex flex-col h-full">
              <h3 class="text-lg font-medium mb-1 text-gray-900">{{ b.judul }}</h3>
              <p class="text-sm text-gray-600 mb-3">
                Oleh {{ b.penulis || 'Admin' }} •
                {{ new Date(b.created_at).toLocaleDateString() }}
              </p>
              <p class="text-sm text-gray-700 line-clamp-3 mb-4 flex-1">
                {{ b.kutipan }}
              </p>
              <div class="mt-auto text-right">
                <span class="text-blue-600 hover:underline">
                  Baca Selengkapnya →
                </span>
              </div>
            </div>
            </Link>
          </div>

          <div v-if="!beritas.length" class="col-span-full text-center text-gray-500 py-12">
            Belum ada berita.
          </div>
        </div>

        <div class="text-center mt-8">
          <Link :href="route('berita.index')"
            class="btn btn-outline text-gray-800 border-gray-800 hover:bg-gray-800 hover:text-white">
          Lihat Semua Berita
          </Link>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import HeroSection from '@/Components/HeroSection.vue'
import { defineProps } from 'vue'

const { beritas, jadwalTurnes } = defineProps({
  beritas: Array,
  jadwalTurnes: Array,
})
</script>

<style scoped>
/* if using line-clamp plugin */
</style>