<script setup>
import Tweet from '../components/Tweet.vue';
import Button from '../components/Button.vue';
import axios from "axios";
import { ref, watch, onMounted, computed } from "vue";


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



// Start Sorting test
const getSortedData = async (url) => {



    try {
        let response = await axios.get(url);

        responseData.value = response.data;
        console.log(responseData.value);
        responseData.value.forEach(e => {
            e.created_at = e.created_at.split("T")[0].split("-").reverse().join(".")
        });


    } catch (error) {
        // Do something with the error
        console.log(error);
    }
};


// End Sorting test

onMounted(() => {

    getValue();
    // getSortedData();


})


const sortingParameter = ref('');

watch(sortingParameter, async (newParam, oldQuestion) => {

    let urlParam = "";

    switch (sortingParameter.value) {
        case "by Author":
            urlParam = "/api/tweet?sort=-vorname";
            getSortedData(urlParam);
            break;
        case "by Date":
            urlParam = "/api/tweet?sort=-created_at";
            getSortedData(urlParam);
            break;

        case "by Title":
            urlParam = "/api/tweet?sort=-tweet_title";
            getSortedData(urlParam);

        default:
        // code block
    }
})

// // Add dynamic changes to items by index
// setTimeout(() => {
//     let last_tw_cell = document.getElementsByClassName("index")[0].querySelectorAll(".tw-cell");
//     last_tw_cell[last_tw_cell.length - 1].style.backgroundColor = "red";
//     console.log(last_tw_cell[last_tw_cell.length - 1]);
// }, 1000)

</script>


<template>
    <div class="index">
        <div class="head">

            <h4>FEED VON</h4>
            <h2>Nachname Vorname</h2>
            <div class="sort_box">
                <span> Sort Tweets: {{ sortingParameter }}</span>

                <select v-model="sortingParameter" class="sort_options">
                    <option disabled value="">Please select one</option>
                    <option>by Author</option>
                    <option>by Date</option>
                    <option>by Title</option>
                </select>
            </div>

            <!-- <Button class="sort" @click.prevent="getSortedData">Sort Tweets</Button> -->
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
/* 
Testing Sorting feauture
*/
.sort_box {
    align-self: flex-end;
    display: flex;
    flex-direction: column;
}

.sort_options {
    background-color: #1D9BF0;
    justify-self: flex-end;
    align-self: flex-end;
    border: none;
    padding: 0.2rem;
    color: white;
    border-radius: 0.3rem;
}



.index {
    display: flex;
    flex-direction: column;
    max-width: 400px;
    margin: auto;
    align-items: center;
    gap: 1rem;
    margin-bottom: 5rem;

}

.head {
    align-self: flex-start;
    margin-top: 5rem;
    width: 100%;
    display: flex;
    flex-direction: column;
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
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

@media screen and (max-width: 400px) {
    .index {
        padding: 1rem;
    }
}
</style>
