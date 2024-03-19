<script setup>
import {defineProps} from 'vue';

defineProps({
  title: String,
  date: String,
  text:String
})
</script>

<template>

    <div class="tweet">
        <div class="tweet-head">

<a href="" class="tweet-title">{{ title}}</a>

<a href="" class="tweet-date">{{ date }}</a>

</div>
<p>{{ text }}</p>

    </div>


</template>


<style scoped>

.tweet-head{
    display: flex;
    align-items: center;
    justify-content: space-between;
    
   

}
.tweet{
    width: 50%;
   margin: auto;
}

</style>