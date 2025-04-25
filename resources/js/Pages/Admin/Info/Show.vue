<script setup>
const props = defineProps({
  info: Object,
})
</script>

<template>
  <div>
    <h1 class="text-xl mb-2">Detail Info</h1>
    <p><strong>Judul:</strong> {{ info.judul }}</p>
    <p class="mt-2"><strong>Isi:</strong></p>
    <div class="border p-4 bg-gray-50">{{ info.isi }}</div>
  </div>
</template>
