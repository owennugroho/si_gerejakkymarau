<script setup>
import Checkbox    from '@/Components/Checkbox.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import InputError  from '@/Components/InputError.vue'
import InputLabel  from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput   from '@/Components/TextInput.vue'
import { Head, useForm } from '@inertiajs/vue3'

defineProps({
  status: { type: String },
})

const form = useForm({
  email:    '',
  password: '',
  remember: false,
})

function submit() {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  })
}
</script>

<template>
  <GuestLayout>
    <Head title="Log in" />

    <!-- Wrapper penuh, center vertikal & horizontal -->
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
      <!-- Card putih -->
      <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">

        <!-- Flash status -->
        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
          {{ status }}
        </div>

        <form @submit.prevent="submit" class="space-y-6">

          <!-- Email -->
          <div>
            <InputLabel for="email" value="Email" />
            <TextInput
              id="email"
              type="email"
              v-model="form.email"
              required
              autofocus
              autocomplete="username"
              class="mt-1 block w-full text-black"
            />
            <InputError :message="form.errors.email" class="mt-1" />
          </div>

          <!-- Password -->
          <div>
            <InputLabel for="password" value="Password" />
            <TextInput
              id="password"
              type="password"
              v-model="form.password"
              required
              autocomplete="current-password"
              class="mt-1 block w-full text-black"
            />
            <InputError :message="form.errors.password" class="mt-1" />
          </div>

          <!-- Remember Me -->
          <div class="flex items-center">
            <Checkbox id="remember" v-model:checked="form.remember" />
            <label for="remember" class="ms-2 text-sm text-gray-600">
              Remember me
            </label>
          </div>

          <!-- Actions -->
          <div class="flex items-center justify-end">
            <PrimaryButton
              type="submit"
              :disabled="form.processing"
            >
              Log in
            </PrimaryButton>
          </div>

        </form>
      </div>
    </div>
  </GuestLayout>
</template>
