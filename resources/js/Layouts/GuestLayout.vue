<template>
  <div class="flex min-h-screen flex-col">
    <!-- NAVBAR -->
    <nav :class="[
      'fixed top-0 left-0 right-0 z-50 transition-colors duration-300',
      scrolled ? 'bg-green-800 shadow-lg' : 'bg-gray-900'
    ]">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex h-16 items-center justify-between">
        <!-- Logo + Title -->
        <Link href="/" class="flex items-center space-x-2">
        <ApplicationLogo class="h-10 w-10 text-white" />
        <span class="text-xl font-bold text-white">
          Gereja Kanak-kanak Yesus Marau
        </span>
        </Link>

        <!-- Menu Desktop -->
        <div class="hidden sm:flex sm:space-x-6">
          <!-- Beranda -->
          <Link href="/" class="text-white hover:text-yellow-300 px-3 py-2 rounded-md text-sm font-medium"
            :class="{ 'underline': isActive(route('home')) }">
          Beranda
          </Link>

          <!-- Dropdowns -->
          <template v-for="item in navItems" :key="item.name">
            <Dropdown align="left" width="48">
              <template #trigger>
                <button
                  class="text-white hover:text-yellow-300 px-3 py-2 rounded-md inline-flex items-center text-sm font-medium"
                  :class="{ 'underline': item.submenu.some(sub => isActive(sub.href)) }">
                  {{ item.name }}
                  <svg class="ms-1 h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
              </template>
              <template #content>
                <div class="py-1 bg-white rounded-md shadow-lg">
                  <DropdownLink v-for="sub in item.submenu" :key="sub.name" :href="sub.href"
                    class="block px-4 py-2 text-gray-800 hover:bg-gray-100 hover:text-gray-900 text-sm"
                    :class="{ 'bg-gray-100 text-gray-900': isActive(sub.href) }">
                    {{ sub.name }}
                  </DropdownLink>
                </div>
              </template>
            </Dropdown>
          </template>
        </div>
      </div>
    </nav>

    <!-- KOSONGKAN AREA UNTUK HERO -->
    <main class="flex-1 bg-[#FFF5EF] pt-16">
      <slot />
    </main>

    <!-- FOOTER -->
    <footer class="bg-green-800 text-white py-10">
      <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
        <!-- Tentang Kami -->
        <div>
          <h3 class="font-semibold mb-2">Tentang Kami</h3>
          <p class="text-sm">
            Jl Daeng Utih, Dusun Tempayak, Suka Karya,<br />
            Kec. Marau, Kab. Ketapang, Kalbar 78863
          </p>
        </div>

        <!-- Jadwal Ekaristi -->
        <div>
          <h3 class="font-semibold mb-2">Jadwal Ekaristi</h3>
          <ul class="space-y-1 text-sm">
            <li>Senin–Sabtu: 05.30 WIB</li>
            <li>Minggu: 07.30 WIB</li>
          </ul>
        </div>

        <!-- Donasi -->
        <div>
          <h3 class="font-semibold mb-2">Donasi</h3>
          <p class="text-sm">
            Bank CIMB Niaga: 700.169.577.400<br />
            a.n. PGPM Gereja St. Antonius Kotabaru
          </p>
        </div>
      </div>
      <div class="text-center text-gray-200 mt-8 text-sm">
        © {{ new Date().getFullYear() }} Gereja Kanak-kanak Yesus Marau
      </div>
    </footer>
    <VisitUsPanel />
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'
import { Link, usePage } from '@inertiajs/vue3'
import VisitUsPanel from '@/Components/VisitUsPanel.vue'

// Ambil current URL untuk highlight active menu
const page = usePage()
function isActive(href) {
  return page.url === href
}

// Struktur menu
const navItems = [
  {
    name: 'Profil Gereja',
    submenu: [
      { name: 'Sejarah Gereja', href: route('sejarah-gereja.index') },
      { name: 'Visi & Misi', href: route('visimisi.index') },
      { name: 'Pastor Paroki', href: route('romos.index') },
      { name: 'Stasi', href: route('stasi.index') },
    ],
  },
  {
    name: 'Berita',
    submenu: [
      { name: 'Berita', href: route('berita.index') },
      { name: 'Foto Kegiatan', href: route('foto-kegiatan.index') },
    ],
  },
  {
    name: 'Informasi',
    submenu: [
      { name: 'Info', href: route('info.index') },
      { name: 'Jadwal Turne', href: route('jadwal-turne.index') },
      { name: 'Kontak', href: route('kontak.create') },
    ],
  },
]

// Scroll detection untuk navbar
const scrolled = ref(false)
function onScroll() {
  scrolled.value = window.scrollY > 50
}
onMounted(() => window.addEventListener('scroll', onScroll))
onBeforeUnmount(() => window.removeEventListener('scroll', onScroll))
</script>

<style scoped>
/* jika perlu override spacing atau shadow */
</style>
