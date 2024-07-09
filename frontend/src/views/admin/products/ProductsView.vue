<template>
  <div id="header-content" class="block w-full py-4 border-b border-gray-300">
    <h2 class="text-xl font-bold">Produtos</h2>
  </div>
  <div class="block w-full border-b pb-10 border-gray-300">
    <table class="w-full text-left">
      <thead>
        <tr>
          <th class="px-6 py-4">#</th>
          <th class="px-6 py-4">Produto</th>
          <th class="px-6 py-4">Preço</th>
          <th class="px-6 py-4">Criado em</th>
          <th class="px-6 py-4">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in productsStore.products?.data" :key="product.id">
          <td class="px-6 py-4">{{ product.id }}</td>
          <td class="px-6 py-4">{{ product.name }}</td>
          <td class="px-6 py-4">{{ product.price_float }}</td>
          <td class="px-6 py-4">{{ product.created_at }}</td>
          <td class="px-6 py-4"></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script setup>
import { useProducts } from '@/stores/products'
import { onMounted } from 'vue'

const productsStore = useProducts()

onMounted(async () => {
  await productsStore.getAllProducts()
})
// export default {
//   data() {
//     return {
//       products: []
//     }
//   }
// }
</script>
