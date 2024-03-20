<script setup>
import Tweet from '../components/Tweet.vue';
import Button from '../components/Button.vue';
import axios, { formToJSON } from "axios";
import { ref, watch, onMounted, computed } from "vue";

import { useRoute } from 'vue-router'

const route = useRoute()





const tweetID = ref();

tweetID.value = route.params.id;

console.log(tweetID.value);



const responseData = ref();
const tw = ref();
const data = ref({


    'tweet_title': '',

    'tweet_text': ''

});

const errors = ref({

    'error_title': '',

    'error_text': ''
});

const getValue = async () => {
    try {


        let response = await axios.get("/api/test-me");

        responseData.value = response.data;
        tw.value = responseData.value.filter(e => e.id == route.params.id)
        data.value.tweet_title = tw.value[0].tweet_title;
        data.value.tweet_text = tw.value[0].tweet_text;



    } catch (error) {
        // Do something with the error
        console.log(error);
    }
};

const editTweet = async () => {
    try {
        let deletedTweet = await axios.put("/api/edit/" + tweetID.value, data.value);
        console.log(deletedTweet);
        alert("Tweet updated succesfuly!")
        window.location.replace("/");
    } catch (error) {
        // Do something with the error
        setTimeout(() => {
            if (error.response == undefined) {
                window.location.replace("/");
            }


            let err = error.response.data.errors;
            let showErr = errors.value;


            if (err.tweet_title) {
                showErr.error_title = err.tweet_title[0] ?? "";
            }

            if (err.tweet_text) {
                showErr.error_text = err.tweet_text[0] ?? "";
            }



        }, 10);

        errors.value.error_vorname = "";

        errors.value.error_nachname = "";

        errors.value.error_email = "";

        errors.value.error_title = "";
        errors.value.error_text = "";

    }

};



onMounted(() => {
    getValue();
})
</script>


<template>
    <div class="container">
        <h2>Tweet bearbeiten</h2>

        <div class="tw-bearbeiten">
            <div class="input_group">
                <label for="tweet_title">Titel</label>
                <input class="title" type="text" name="tweet_title" id="tweet_title" v-model="data.tweet_title">
                <p class="error">{{ errors.error_title ?? '' }}</p>
            </div>

            <div class="input_group">

                <label for="tweet_text">Text</label>
                <textarea class="tweet" type="text-" name="tweet_title" id="tweet_title" v-model="data.tweet_text">
                </textarea>
                <p class="error">{{ errors.error_text ?? '' }}</p>
            </div>
            <Button class="tw-update" @click.prevent="editTweet">Tweet updaten</Button>
        </div>


    </div>
</template>

<style scoped>
.container {
    max-width: 400px;
    margin: auto;
    margin-top: 5rem;

}

h2 {
    font-size: 2rem;
    margin-bottom: 3rem;
}

.tw-bearbeiten {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    padding: 2rem;
    background-color: white;
    border-radius: 0.5rem;

}

.input_group {
    display: flex;
    flex-direction: column;
}

.tweet {
    min-height: 200px;
}

textarea {
    font-family: "Inter", sans-serif;
    padding: 1rem;
    font-size: 1.6rem;
    border: 1px solid rgb(215, 214, 214);
    border-radius: 0.5rem;
}

input {
    font-family: "Inter", sans-serif;
    border-radius: 0.5rem;
    height: 3rem;
    padding: 0 1rem;
    border: 1px solid rgb(215, 214, 214);
}

label {
    font-size: 1.8rem;
}

.tw-update {
    max-width: fit-content;
    background-color: #1D9BF0;
}

.error {
    color: red;
    margin: 0;
}

@media screen and (max-width: 400px) {
    .container {
        padding: 1rem;
        margin-top: 2.5rem;
    }
}
</style>