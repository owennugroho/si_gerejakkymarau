<script setup>
import {
  ResponsiveContainer,
  LineChart, Line,
  XAxis, YAxis,
  CartesianGrid, Tooltip, Legend
} from 'recharts'

const props = defineProps({
  data: Array, // expects [{ year, stasi_count, total_umat }, …]
})
</script>

<template>
  <ResponsiveContainer width="100%" height="250">
    <LineChart :data="data">
      <CartesianGrid strokeDasharray="3 3" />
      <XAxis dataKey="year" />
      <YAxis />
      <Tooltip />
      <Legend />
      <Line type="monotone" dataKey="stasi_count" name="Jumlah Stasi" />
      <Line type="monotone" dataKey="total_umat" name="Total Umat" />
    </LineChart>
  </ResponsiveContainer>
</template>
