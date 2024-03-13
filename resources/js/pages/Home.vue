

<script setup>
    import axios from "axios";
    import { ref } from "vue";

    const response = ref();
    const message = ref({'front-end': 'Vue','Data': 'Hallo from Vue.js'});

    const getValue = async () => {
        try {
            response.value = await axios.get("/api/test-me");
        } catch (error) {
            // Do something with the error
            console.log(error);
        }
    };

    const sendValue = async() => {
        try {
            response.value = await axios.post("/api/receive",message.value);
        } catch (error) {
            // Do something with the error
            console.log(error);
        }
    };
</script>

<template>
    <div>
        <h1>HOME</h1>
        <router-link to="/test">Link zur Test Seite</router-link>
        <button @click.prevent="getValue">Trigger Endpoint</button>
        <p v-if="response">{{ response.data }}</p>
    </div>
</template>