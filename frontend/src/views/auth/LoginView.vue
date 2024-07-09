<template>
  <div class="w-full h-full absolute flex items-center justify-center">
    <div class="rounded border border-gray-300 max-w-3xl p-4 shadow">
      <form>
        <div class="w-96 text-center">
          <h2 class="text-xl font-bold mb-6">Acessar Painel Loja</h2>
        </div>
        <div class="w-96 mb-6">
          <label for="email" class="block mb-3">Email</label>
          <input
            type="email"
            v-model="form.email"
            placeholder="Seu email..."
            class="w-full rounded outline-none border border-gray-300 p-2 focus:border-gray-900 focus:ring transition duration-300 ease-in-out"
            id="email"
          />
        </div>
        <div class="w-full mb-6">
          <label for="password" class="block mb-3"></label>
          <input
            type="password"
            v-model="form.password"
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
<script setup>
import { ref } from 'vue'
import { useAuth } from '@/stores/auth'

const auth = useAuth()
const form = ref({
  email: 'admin@admin.com',
  password: 'password'
})

const login = () => {
  auth.login(form.value)
}

// import HttpClient from '@/services/http-client.js'
// import Storage from '@/services/storage.js'
// export default {
//   data() {
//     return {
//       credentials: {
//         email: 'admin@admin.com',
//         password: 'password'
//       }
//     }
//   },
//   methods: {
//     login() {
//       HttpClient.post('/login', this.credentials).then((response) => {
//         Storage.set('token', response.data.data.token)
//         // this.$router.push({ name: 'admin.products' })
//         location.href = '/admin/products'
//       })
//     }
//   }
// }
</script>
