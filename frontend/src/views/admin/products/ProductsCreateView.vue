<script setup>
import { useProducts } from '@/stores/products'
import { ref } from 'vue'

const productStore = useProducts()

const products = ref({
  name: '',
  description: '',
  price: ''
})

const create = () => {
  productStore.createProduct(products.value)
}
</script>
<template>
  <div id="header-content" class="block w-full py-4 border-b border-gray-300">
    <h2 class="text-xl font-bold">Criar Produto</h2>
  </div>
  <div class="block w-full border-b pb-10 border-gray-300 py-10">
    <form action="">
      <div class="w-full flex gap-4">
        <div class="w-1/2 block mb-6">
          <label class="block mb-2">Nome Produto</label>
          <input
            type="text"
            v-model="products.name"
            class="w-full rounded shadow border border-gray-300 focus:border-gray-400 focus:shadow-lg outline-none p-2 transition ease-in-ou duration-300"
          />
        </div>

        <div class="w-1/2 block mb-6">
          <label class="block mb-2">Descrição</label>
          <input
            type="text"
            v-model="products.description"
            class="w-full rounded shadow border border-gray-300 focus:border-gray-400 focus:shadow-lg outline-none p-2 transition ease-in-ou duration-300"
          />
        </div>
      </div>

      <div class="w-full flex gap-4">
        <div class="w-1/2 block mb-6">
          <label class="block mb-2">Preço</label>
          <input
            type="text"
            v-model="products.price"
            class="w-full rounded shadow border border-gray-300 focus:border-gray-400 focus:shadow-lg outline-none p-2 transition ease-in-ou duration-300"
          />
        </div>
      </div>
      <div class="w-full flex justify-end">
        <button
          @click.prevent="create"
          class="px-4 py-2 rounded bg-green-600 hover:bg-green-900 text-white font-bold text-xl shadow transition ease-in-out duration-300"
        >
          Criar Produto
        </button>
      </div>
    </form>
  </div>
</template>