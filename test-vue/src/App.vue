<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
</script>

<template>
  <header>

    <div class="wrapper">

      <nav>
        <RouterLink to="/">Register</RouterLink>
        <RouterLink to="/login">Login</RouterLink>
      </nav> 
    </div>
  </header>

  <RouterView />
</template>

