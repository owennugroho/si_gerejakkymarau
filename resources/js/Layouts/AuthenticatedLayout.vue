<!-- resources/js/Layouts/AuthenticatedLayout.vue -->
<template>
  <div class="flex flex-col min-h-screen">
    <!-- NAVBAR -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-100">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex h-16 items-center justify-between">
        <!-- Logo + Title -->
        <Link :href="route('admin.dashboard')" class="flex items-center space-x-2">
          <ApplicationLogo class="h-9 w-auto fill-current text-gray-800" />
          <span class="text-xl font-semibold text-gray-800">
            Gereja Kanak-kanak Yesus Marau
          </span>
        </Link>

        <!-- Desktop Menu -->
        <div class="hidden sm:flex sm:space-x-6">
          <!-- Dashboard -->
          <NavLink
            :href="route('admin.dashboard')"
            :active="route().current('admin.dashboard')"
            class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 hover:text-gray-900"
            active-class="underline"
          >
            Dashboard
          </NavLink>

          <!-- Profil Gereja -->
          <Dropdown align="left" width="48">
            <template #trigger>
              <button
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 hover:text-gray-900"
                :class="{ 'underline': isAnyActive([
                    'admin.sejarah-gereja.index',
                    'admin.visimisi.index',
                    'admin.romos.index',
                    'admin.stasi.index'
                  ]) }"
              >
                Profil Gereja
                <ChevronDownIcon class="ml-1 h-4 w-4 text-gray-800" />
              </button>
            </template>
            <template #content>
              <DropdownLink :href="route('admin.sejarah-gereja.index')">Sejarah Gereja</DropdownLink>
              <DropdownLink :href="route('admin.visimisi.index')">Visi & Misi</DropdownLink>
              <DropdownLink :href="route('admin.romos.index')">Pastor Paroki</DropdownLink>
              <DropdownLink :href="route('admin.stasi.index')">Stasi</DropdownLink>
            </template>
          </Dropdown>

          <!-- Jadwal Turne -->
          <NavLink
            :href="route('admin.jadwal-turne.index')"
            :active="route().current('admin.jadwal-turne.index')"
            class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 hover:text-gray-900"
            active-class="underline"
          >
            Jadwal Turne
          </NavLink>

          <!-- Informasi Gereja -->
          <Dropdown align="left" width="48">
            <template #trigger>
              <button
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 hover:text-gray-900"
                :class="{ 'underline': isAnyActive([
                    'admin.donasi.index',
                    'admin.info.index',
                    'admin.kontak.index'
                  ]) }"
              >
                Informasi Gereja
                <ChevronDownIcon class="ml-1 h-4 w-4 text-gray-800" />
              </button>
            </template>
            <template #content>
              <DropdownLink :href="route('admin.donasi.index')">Donasi</DropdownLink>
              <DropdownLink :href="route('admin.info.index')">Info</DropdownLink>
              <DropdownLink :href="route('admin.kontak.index')">Kontak</DropdownLink>
            </template>
          </Dropdown>

          <!-- Berita -->
          <Dropdown align="left" width="48">
            <template #trigger>
              <button
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 hover:text-gray-900"
                :class="{ 'underline': isAnyActive([
                    'admin.berita.index',
                    'admin.kegiatan-foto.index'
                  ]) }"
              >
                Berita
                <ChevronDownIcon class="ml-1 h-4 w-4 text-gray-800" />
              </button>
            </template>
            <template #content>
              <DropdownLink :href="route('admin.berita.index')">Berita</DropdownLink>
              <DropdownLink :href="route('admin.kegiatan-foto.index')">Foto Kegiatan</DropdownLink>
            </template>
          </Dropdown>
        </div>

        <!-- User & Mobile Hamburger -->
        <div class="flex items-center">
          <!-- User dropdown -->
          <div class="hidden sm:flex sm:items-center sm:ms-6">
            <Dropdown align="right" width="48">
              <template #trigger>
                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 hover:text-gray-900">
                  {{ $page.props.auth.user.name }}
                  <ChevronDownIcon class="ml-1 h-4 w-4 text-gray-800" />
                </button>
              </template>
              <template #content>
                <DropdownLink :href="route('admin.profile.edit')">Profile</DropdownLink>
                <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
              </template>
            </Dropdown>
          </div>
          <!-- Hamburger -->
          <div class="sm:hidden -me-2">
            <button
              @click="showingNavigationDropdown = !showingNavigationDropdown"
              class="inline-flex items-center justify-center p-2 rounded-md text-gray-800 hover:text-gray-900 focus:outline-none"
            >
              <Bars3Icon v-if="!showingNavigationDropdown" class="h-6 w-6" />
              <XMarkIcon v-else                      class="h-6 w-6" />
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile Menu -->
      <div v-show="showingNavigationDropdown" class="sm:hidden bg-white border-b border-gray-100">
        <div class="px-2 pt-2 pb-3 space-y-1">
          <ResponsiveNavLink
            :href="route('admin.dashboard')"
            :active="route().current('admin.dashboard')"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:text-gray-900"
          >
            Dashboard
          </ResponsiveNavLink>
          <!-- tambah link mobile sesuai kebutuhan -->
        </div>
      </div>
    </nav>

    <!-- HEADER & CONTENT WRAPPER -->
    <div class="flex-1 pt-16">
      <!-- Page Heading -->
      <header v-if="$slots.header" class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-6">
          <slot name="header" />
        </div>
      </header>
      <!-- Page Content -->
      <main class="bg-white flex-1">
        <slot />
      </main>
    </div>

    <!-- FOOTER -->
    <footer class="bg-green-800 text-white py-10">
      <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Footer content… -->
      </div>
      <div class="text-center text-gray-200 mt-8 text-sm">
        © {{ new Date().getFullYear() }} Gereja Kanak-kanak Yesus Marau
      </div>
    </footer>

    <!-- Visit Us panel tetap ada -->
    <VisitUsPanel />
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import NavLink from '@/Components/NavLink.vue'
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import VisitUsPanel from '@/Components/VisitUsPanel.vue'
import { Bars3Icon, XMarkIcon, ChevronDownIcon } from '@heroicons/vue/24/solid'

// Mobile menu state
const showingNavigationDropdown = ref(false)

// Helper: cek active route list
const page = usePage()
function isAnyActive(names) {
  return names.some(n => page.url.includes(n.replace(/\./g, '/')))
}
</script>

<style scoped>
/* tidak perlu override khusus */
</style>
