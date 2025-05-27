<script setup>
import { computed } from 'vue'
import { Head, useForm, usePage } from '@inertiajs/vue3'  // ← tambahkan Head
import GuestLayout from '@/Layouts/GuestLayout.vue'

const page  = usePage()
const flash = computed(() => page.props.flash || {})

const form = useForm({
  name: '',
  email: '',
  message: '',
  asal_paroki: '',
  asal_lingkungan: '',
  phone: '',
  can_whatsapp: false,
})

function submit() {
  form.post(route('kontak.store'), {
    onSuccess: () => form.reset(),
  })
}
</script>

<template>
  <GuestLayout>

    <Head title="Kontak Sekretariat" />

    <div class="max-w-xl mx-auto px-4 py-8">
      <h1 class="text-3xl font-semibold mb-6 text-center text-green-800">
        Kontak Sekretariat
      </h1>

      <!-- Tampilkan notifikasi sukses -->
      <div v-if="flash.success" class="mb-4 rounded bg-green-100 px-4 py-3 text-green-800">
        {{ flash.success }}
      </div>
      <form @submit.prevent="submit" class="space-y-6">

        <!-- Nama -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Nama</label>
          <input v-model="form.name" type="text" class="mt-1 w-full rounded border-gray-300 px-3 py-2 text-gray-900" />
          <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">
            {{ form.errors.name }}
          </p>
        </div>

        <!-- Email -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Email Address</label>
          <input v-model="form.email" type="email"
            class="mt-1 w-full rounded border-gray-300 px-3 py-2 text-gray-900" />
          <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">
            {{ form.errors.email }}
          </p>
        </div>

        <!-- Message -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Message</label>
          <textarea v-model="form.message" rows="4"
            class="mt-1 w-full rounded border-gray-300 px-3 py-2 text-gray-900"></textarea>
          <p v-if="form.errors.message" class="mt-1 text-sm text-red-600">
            {{ form.errors.message }}
          </p>
        </div>

        <!-- Asal Paroki (opsional) -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Asal Paroki</label>
          <input v-model="form.asal_paroki" type="text"
            class="mt-1 w-full rounded border-gray-300 px-3 py-2 text-gray-900" placeholder="(opsional)" />
          <p v-if="form.errors.asal_paroki" class="mt-1 text-sm text-red-600">
            {{ form.errors.asal_paroki }}
          </p>
        </div>

        <!-- Asal Lingkungan (opsional) -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Asal Lingkungan</label>
          <input v-model="form.asal_lingkungan" type="text"
            class="mt-1 w-full rounded border-gray-300 px-3 py-2 text-gray-900" placeholder="(opsional)" />
          <p v-if="form.errors.asal_lingkungan" class="mt-1 text-sm text-red-600">
            {{ form.errors.asal_lingkungan }}
          </p>
        </div>

        <!-- Phone -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Nomor WA Aktif / HP Aktif</label>
          <input v-model="form.phone" type="text" class="mt-1 w-full rounded border-gray-300 px-3 py-2 text-gray-900" />
          <p v-if="form.errors.phone" class="mt-1 text-sm text-red-600">
            {{ form.errors.phone }}
          </p>
        </div>

        <!-- Checkbox Whatsapp -->
        <div class="flex items-center space-x-2">
          <input v-model="form.can_whatsapp" id="whatsapp" type="checkbox"
            class="h-4 w-4 rounded border-gray-300 text-indigo-600" />
          <label for="whatsapp" class="text-sm text-gray-700">
            Apakah No ini bisa dihubungi melalui Whatsapp?
          </label>
        </div>

        <!-- Tombol Kirim -->
        <div>
          <button type="submit" :disabled="form.processing"
            class="w-full rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700 disabled:opacity-50">
            Kirim
          </button>
        </div>
      </form>
    </div>
  </GuestLayout>
</template>
