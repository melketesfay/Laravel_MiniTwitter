<script setup>

import Tweet from '../components/Tweet.vue';
import Button from '../components/Button.vue';
import axios, { formToJSON } from "axios";
import { ref, watch, onMounted, computed } from "vue";

import { useRoute } from 'vue-router'

const route = useRoute()


console.log(route.params.id)




const responseData = ref();


const tw = ref()

const getValue = async () => {
    try {


        let response = await axios.get("/api/test-me");

        responseData.value = response.data;
        responseData.value.forEach(e => {
            e.created_at = e.created_at.split("T")[0].split("-").reverse().join(".")
        })
        tw.value = responseData.value.filter(e => e.id == route.params.id)



    } catch (error) {
        // Do something with the error
        console.log(error);
    }
};



const tweetID = ref();

tweetID.value = route.params.id;

console.log(tweetID.value);

const deleteTweet = async () => {


    if (confirm("Are you sure you want to delete this Tweet!")) {
        try {

            let deletedTweet = await axios.delete("/api/delete/" + tweetID.value, { "id": tweetID.value });
            console.log(deletedTweet);
            alert("Deleted")
            window.location.replace("/");
        } catch (error) {
            // Do something with the error
            console.log(error);
        }
    } else {

    }

};





onMounted(() => {
    getValue();
})



</script>



<template>

    <div class="container">

        <div v-if="tw" class="tw-single">



            <h2>TWEET VOM {{ tw[0].created_at }}</h2>


            <Tweet :title="tw[0].tweet_title" :text="tw[0].tweet_text"></Tweet>

            <div class="btn-group">

                <router-link :to="`/edit/${$route.params.id}`"><Button>Tweet bearbeiten</Button></router-link>
                <Button class="delete" @click.prevent="deleteTweet">Tweet löschen</Button>
            </div>




        </div>



        <div v-else>

            <h1>Loading Tweets</h1>
        </div>
    </div>






</template>

<style scoped>
.container {
    display: flex;
    justify-content: center;
    margin-top: 5rem;
}

.tw-single {
    max-width: 400px;
    justify-self: center;
}

.btn-group {
    display: flex;
    gap: 1rem;
}

.delete {
    background-color: #DF1313;

}

h2 {
    font-size: 1.2rem;
    font-weight: bold;
    color: gray;
    margin-bottom: 2rem;
}
</style>