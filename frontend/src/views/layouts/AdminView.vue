<script setup>
import httpClient from '@/services/http-client.js'
import storage from '@/services/storage.js'

const logout = () => {
  httpClient.delete('/logout').then(() => {
    storage.remove('auth')
    location.href = '/auth/login'
  })
}

// export default {
//   methods: {
//     logout() {
//       httpClient.post('/logout').then((response) => {
//         storage.remove('token')
//         location.href = '/auth/login'
//       })
//     }
//   }
// }
</script>
<template>
  <section>
    <div class="w-full flex justify-between">
      <div id="sidebar" class="w-48 h-screen bg-gray-800 shadow">
        <div class="block bg-black h-14 text-white pt-4 pl-4 font-bold">Admin Loja</div>
        <ul class="w-48 pt-10">
          <li class="w-full hover:bg-white transition ease-in-out duration-300">
            <router-link
              :to="{ name: 'admin.products' }"
              class="w-full flex items-center gap-2 px-4 py-4 text-white hover:text-black"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-4 h-4"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122"
                />
              </svg>

              Produtos
            </router-link>
          </li>
        </ul>
      </div>

      <div id="content" class="bg-gray-300 w-screen">
        <header class="w-full h-14 bg-black flex justify-end">
          <nav>
            <ul class="w-full">
              <li class="w-full px-4 py-4">
                <a
                  href="#"
                  @click.prevent="logout"
                  class="w-full px-4 py-4 text-white hover:bg-red-800 transition ease-in-out duration-300"
                  >Sair</a
                >
              </li>
            </ul>
          </nav>
        </header>
        <div class="p-8">
          <div class="p-6 rounded shadow bg-white">
            <router-view></router-view>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>