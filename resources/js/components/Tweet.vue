<script setup>
import { defineProps } from 'vue';

defineProps({
    title: String,
    date: String,
    text: String
})
</script>

<template>

    <div class="tweet">
        <div class="tweet-head">

            <a href="" class="tweet-title">{{ title }}</a>

            <a href="" class="tweet-date">{{ date }}</a>

        </div>
        <p class="tw-body">{{ text }}</p>

    </div>


</template>


<style scoped>
.tweet-head {
    display: flex;
    align-items: center;
    justify-content: space-between;



}

.tweet {
    max-width: 400px;
    margin: auto;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

a {
    text-decoration: none;
}

.tweet-title {
    color: black;
    font-size: 1.5rem;
    font-weight: bold;
}

.tweet-date {
    font-size: 1.2rem;
    color: gray;
}

.tw-body {
    font-size: 1.4rem;
    color: rgb(50, 50, 50);
}
</style>