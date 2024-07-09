import httpClient from '@/services/http-client'
import { defineStore } from 'pinia'

export const useProducts = defineStore('products', {
  state: () => ({ products: null, product: null }),
  getters: {
    getProducts(state) {
      return state.products
    }
  },
  actions: {
    getAllProducts() {
      httpClient.get('/products').then((response) => (this.products = response.data))
    },
    getProductById(id) {
      httpClient.get(`/products/${id}`).then((response) => (this.product = response.data))
    },
    createProduct(product) {
      httpClient.post('/products', product).then((response) => console.log(response))
    }
  },
  persist: true
})
