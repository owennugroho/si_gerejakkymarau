<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue'

const props = defineProps({
  align: { type: String, default: 'right' },
  width: { type: String, default: '48' },
  contentClasses: { type: String, default: 'py-1 bg-white' },
})

const open = ref(false)

// Toggle dropdown
function toggle(e) {
  e.stopPropagation()
  open.value = !open.value
}

// Close dropdown
function close() {
  open.value = false
}

// Close on Escape
function closeOnEscape(e) {
  if (open.value && e.key === 'Escape') {
    close()
  }
}

onMounted(() => document.addEventListener('keydown', closeOnEscape))
onUnmounted(() =>
  document.removeEventListener('keydown', closeOnEscape)
)

const widthClass = computed(() => {
  return props.width === '48' ? 'w-48' : `w-${props.width}`
})

const alignmentClasses = computed(() => {
  if (props.align === 'left') {
    return 'ltr:origin-top-left rtl:origin-top-right start-0'
  } else if (props.align === 'right') {
    return 'ltr:origin-top-right rtl:origin-top-left end-0'
  }
  return 'origin-top'
})
</script>

<template>
  <div class="relative">
    <!-- trigger -->
    <div @click="toggle">
      <slot name="trigger" />
    </div>

    <!-- overlay: klik di luar -->
    <div
      v-if="open"
      class="fixed inset-0 z-40"
      @click="close"
    ></div>

    <Transition
      enter-active-class="transition ease-out duration-200"
      enter-from-class="opacity-0 scale-95"
      enter-to-class="opacity-100 scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-from-class="opacity-100 scale-100"
      leave-to-class="opacity-0 scale-95"
    >
      <div
        v-if="open"
        class="absolute z-50 mt-2 rounded-md shadow-lg"
        :class="[widthClass, alignmentClasses]"
      >
        <div
          @click.stop
          class="rounded-md ring-1 ring-black ring-opacity-5"
          :class="contentClasses"
        >
          <slot name="content" />
        </div>
      </div>
    </Transition>
  </div>
</template>

<style scoped>
/* Kalau perlu styling tambahan, pakai CSS di sini */
</style>
