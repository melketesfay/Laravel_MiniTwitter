<script setup>
import Tweet from '../components/Tweet.vue';
import Button from '../components/Button.vue';
import axios from "axios";
import { ref, watch, onMounted } from "vue";


const responseData = ref();


const getValue = async () => {
    try {
        let response = await axios.get("/api/test-me");

        responseData.value = response.data;

        responseData.value.forEach(e => {
            e.created_at = e.created_at.split("T")[0].split("-").reverse().join(".")
        });


    } catch (error) {
        // Do something with the error
        console.log(error);
    }
};



onMounted(() => {

    getValue();


})




</script>


<template>
    <div class="index">
        <div class="head">

            <h4>FEED VON</h4>
            <h2>Nachname Vorname</h2>
        </div>




        <div v-for="tweet in responseData" class="tw-cell">
            <Tweet :title="tweet.tweet_title" :date="tweet.created_at" :text="tweet.tweet_text"></Tweet>
            <router-link :to="`/tweet/${tweet.id}`">

                <Button>Tweet ansehen</Button>
            </router-link>

        </div>







    </div>
</template>

<style scoped>
.index {
    display: flex;
    flex-direction: column;
    max-width: 400px;
    margin: auto;
    align-items: center;
    gap: 1rem;


}

.head {
    align-self: flex-start;
    margin-top: 5rem;
}

h2 {
    font-size: 2.5rem;
    font-weight: 700;
    padding: 0;
    margin: 0;
}

h4 {
    font-size: 1.6rem;
    margin: 0;
    font-weight: 900;
    color: gray;
}

.tw-cell {
    padding: 2rem;
    background-color: white;
    border-radius: 1rem;
    min-width: 100%;
}

@media screen and (max-width: 400px) {
    .index {
        padding: 1rem;
    }
}
</style>