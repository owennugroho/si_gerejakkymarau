<script setup>
// Props: label (string) & value (number|string)
defineProps({
  label: String,
  value: [String, Number],
  icon: { type: Object, default: null }  // optional
})
</script>

<template>
  <div class="bg-white rounded-lg shadow p-6 flex items-center space-x-4">
    <!-- Jika ada icon, tampilkan -->
    <component
      v-if="icon"
      :is="icon"
      class="w-8 h-8 text-green-600 flex-shrink-0"
    />
    <div>
      <div class="text-sm text-gray-500">{{ label }}</div>
      <div class="mt-1 text-2xl font-bold text-gray-800">{{ value }}</div>
    </div>
  </div>
</template>
