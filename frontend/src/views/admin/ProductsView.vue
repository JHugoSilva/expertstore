<template>
  <a href="#" @click.prevent="logout" class="mb-10 text-red-800 block hover:underline">Sair</a>
  {{ products }}
</template>
<script>
import HttpClient from '@/services/HttpClient.js'
import Storage from '@/services/Storage.js'

export default {
  data() {
    return {
      products: []
    }
  },
  methods: {
    logout() {
      HttpClient.delete('/logout').then(() => {
        Storage.remove('token')
        location.href = '/auth/login'
      })
    }
  },
  beforeRouteEnter(to, from, next) {
    HttpClient.get('/products').then((response) => next((vm) => (vm.products = response.data)))
  }
}
</script>
