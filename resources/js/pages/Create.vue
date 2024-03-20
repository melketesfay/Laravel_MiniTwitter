<script setup>
import Button from "../components/Button.vue";
import { RouterLink } from "vue-router";
import axios from "axios";
import { ref, watch } from "vue";


const data = ref({
    'vorname': '',

    'nachname': '',

    'email': '',

    'tweet_title': '',

    'tweet_text': '',

});

const errors = ref({

    'error_vorname': '',

    'error_nachname': '',

    'error_email': '',

    'error_title': '',

    'error_text': ''
});



const response = ref();
const message = ref({ 'front-end': 'Vue', 'Data': 'Hallo from Vue.js' });

const getValue = async () => {
    try {
        response.value = await axios.get("/api/test-me");
    } catch (error) {
        // Do something with the error
        console.log(error);
    }
};

const sendValue = async () => {
    try {
        let responseLaravel = await axios.post("/api/receive", message.value);
        console.log(responseLaravel.data);

    } catch (error) {
        // Do something with the error
        console.log(error);
    }
};

const sendFormData = async () => {
    try {
        axios.defaults.headers.common['Accept'] = 'application/json';
        axios.defaults.headers.common['Content-Type'] = 'application/json';

        let formData = await axios.post("/api/form", data.value);
        console.log(formData.response.data);



        alert("You just Tweeted!");
        window.location.replace("/");


    } catch (error) {
        // Do something with the error


        setTimeout(() => {
            if (error.response == undefined) {
                window.location.replace("/");
            }


            let err = error.response.data.errors;
            let showErr = errors.value;

            if (err.vorname) {
                showErr.error_vorname = err.vorname[0] ?? "";
            }

            if (err.nachname) {
                showErr.error_nachname = err.nachname[0] ?? "";
            }

            if (err.email) {
                showErr.error_email = err.email[0] ?? "";
            }
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






</script>

<template>


    <div class="container">
        <div class="head">
            <h2>Tweet erstellen</h2>
            <h3>Was möchtest du der Welt mitteilen?</h3>
        </div>

        <div class="tw-bearbeiten">

            <div class="input_group">
                <label for="vorname">vorname</label>
                <input type="text" name="vorname" id="vorname" v-model="data.vorname">
                <p class="error">{{ errors.error_vorname ?? '' }}</p>
            </div>
            <div class="input_group">
                <label for="nachname">nachname</label>
                <input type="text" name="nachname" id="nachname" v-model="data.nachname">
                <p class="error">{{ errors.error_nachname ?? '' }}</p>
            </div>
            <div class="input_group">
                <label for="email">email</label>
                <input type="email" name="email" id="email" v-model="data.email">
                <p class="error">{{ errors.error_email ?? '' }}</p>
            </div>
            <div class="input_group">
                <label for="tweet_title">Titel</label>
                <input type="text" name="tweet_title" id="tweet_title" v-model="data.tweet_title">
                <p class="error">{{ errors.error_title ?? '' }}</p>
            </div>
            <div class="input_group">
                <label for="tweet_text">Tweet</label>
                <textarea type="text" name="tweet_text" id="tweet_text" v-model="data.tweet_text">
                </textarea>
                <p class="error">{{ errors.error_text ?? '' }}</p>
            </div>




            <Button class="tw-update" @click.prevent="sendFormData">


                Tweet speichern
            </Button>




        </div>
    </div>
</template>


<style scoped>
.container {
    max-width: 400px;
    margin: auto;
    margin-top: 5rem;

}

.head {
    margin-bottom: 2rem;
}

h2 {
    font-size: 2.5rem;
    margin: 0;
}

h3 {
    font-size: 1.8rem;
    margin: 0;
    color: gray;
}

.tw-bearbeiten {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
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
    margin-top: 2rem;
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