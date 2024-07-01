<template>
  <div class="w-full h-full">
    <div class="rounded border border-gray-300 max-w-2xl p-4">
      <form>
        <div class="w-full mb-6">
          <label for="email" class="block mb-3">Email</label>
          <input
            type="email"
            v-model="credentials.email"
            placeholder="Seu email..."
            class="w-full rounded outline-none border border-gray-300 p-2 focus:border-gray-900 focus:ring transition duration-300 ease-in-out"
            id="email"
          />
        </div>
        <div class="w-full mb-6">
          <label for="password" class="block mb-3"></label>
          <input
            type="password"
            v-model="credentials.password"
            placeholder="Sua Senha..."
            class="w-full rounded outline-none border border-gray-300 p-2 focus:border-gray-900 focus:ring transition duration-300 ease-in-out"
            id="password"
          />
        </div>
        <button
          @click.prevent="login"
          class="px-4 py-2 rounded border border-green-900 bg-green-600 hover:bg-green-900 text-white font-bold transition duration-300 ease-in-out"
        >
          Acessar
        </button>
      </form>
    </div>
  </div>
</template>
<script>
import HttpClient from '@/services/HttpClient.js'
import Storage from '@/services/Storage.js'
export default {
  data() {
    return {
      credentials: {
        email: 'admin@admin.com',
        password: 'password'
      }
    }
  },
  methods: {
    login() {
      HttpClient.post('/login', this.credentials).then((response) => {
        Storage.set('token', response.data.data.token)
        // this.$router.push({ name: 'admin.products' })
        location.href = '/admin/products'
      })
    }
  }
}
</script>
