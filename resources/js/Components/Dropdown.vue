<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue'

const props = defineProps({
  align: {
    type: String,
    default: 'right',
  },
  width: {
    type: String,
    default: '48',
  },
  contentClasses: {
    type: String,
    default: 'py-1 bg-white',
  },
})

// State untuk dropdown
const open = ref(false)

// Metode toggle untuk membuka/menutup dropdown
function toggle(e) {
  e.stopPropagation(); // Mencegah bubbling agar klik tidak memicu penutupan oleh overlay
  open.value = !open.value;
}

// Metode untuk menutup dropdown
function close() {
  open.value = false;
}

// Menutup dropdown saat Escape ditekan
const closeOnEscape = (e) => {
  if (open.value && e.key === 'Escape') {
    open.value = false;
  }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

// Kelas untuk mengatur lebar dropdown
const widthClass = computed(() => {
  return {
    48: 'w-48',
  }[props.width.toString()];
});

// Kelas untuk pengaturan alignment dropdown
const alignmentClasses = computed(() => {
  if (props.align === 'left') {
    return 'ltr:origin-top-left rtl:origin-top-right start-0';
  } else if (props.align === 'right') {
    return 'ltr:origin-top-right rtl:origin-top-left end-0';
  } else {
    return 'origin-top';
  }
});
</script>

<template>
  <div class="relative">
    <!-- Trigger dropdown -->
    <div @click="toggle">
      <slot name="trigger" />
    </div>

    <!-- Full Screen Overlay (menutup dropdown jika klik di luar) -->
    <div v-show="open" class="fixed inset-0 z-40" @click="close"></div>

    <Transition
      enter-active-class="transition ease-out duration-200"
      enter-from-class="opacity-0 scale-95"
      enter-to-class="opacity-100 scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-from-class="opacity-100 scale-100"
      leave-to-class="opacity-0 scale-95"
    >
      <div
        v-show="open"
        class="absolute z-50 mt-2 rounded-md shadow-lg"
        :class="[widthClass, alignmentClasses]"
      >
        <!-- Konten Dropdown, pastikan klik di sini tidak menutup dropdown -->
        <div class="rounded-md ring-1 ring-black ring-opacity-5" :class="contentClasses" @click.stop>
          <slot name="content" />
        </div>
      </div>
    </Transition>
  </div>
</template>

<style scoped>
/* Anda bisa menyesuaikan style tambahan di sini */
</style>
