<script setup>
import Footer from './components/Footer.vue';
import Header from './components/Header.vue'


</script>


<template>
    <Header></Header>
    <router-view v-slot="{ Component, route }">
        <div :key="route.name">
            <Component :is="Component" />
        </div>
    </router-view>

<Footer></Footer>
</template>



