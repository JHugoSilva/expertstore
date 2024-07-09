import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'

import httpClient from './services/http-client'
import App from './App.vue'
import router from './router'

httpClient.setInterceptor()
const auth = JSON.parse(localStorage.getItem('auth'))

if (auth) {
  httpClient.setAuthToken(auth.token)
}

const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)
const app = createApp(App)
app.use(pinia)
app.use(router)
app.mount('#app')
