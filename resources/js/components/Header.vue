<script setup>

</script>

<template>

    <div class="header">
        <div class="left">
            <p>MNI-TWITTER</p>
        </div>
        <div class="right">
            <a class="tw-all" href="/">Meine Tweets</a>
            <a class="tw-erstellen" href="/create">+Tweet erstellen</a>

        </div>
    </div>

</template>


<style scoped>
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    bottom: 0px;
    background-color: white;
    padding: 2rem 5rem;
}

.right {
    display: flex;
    gap: 2rem;
}

.right a {
    text-decoration: none;
    padding: 1rem 2rem;
    font-size: 1.4rem;
    font-weight: 600;
}

.tw-all {
    color: black;

}

.tw-all:active {

    border-bottom: 2px solid black;

}



.tw-erstellen {
    background-color: #1D9BF0;
    color: white;
    border-radius: 4rem;
}

.left {
    font-size: 2rem;
    font-weight: 900;
}


@media screen and (max-width: 600px) {
    .left {
        display: none;
    }

    .header {
        padding: 2rem 1rem;
        justify-content: center;
    }

    .right {

        color: red;
        display: flex;
        justify-content: space-between;
    }
}
</style>