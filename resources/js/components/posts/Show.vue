<template>
    <div>
        show post component
        <br>
        <router-link :to="{name: 'posts.create'}">create new post</router-link>
        <br>
        <hr>
        <h1>posts:</h1>
        <div v-for="post in posts">
            <h4>{{ post.title }}</h4>
            <h5>{{ post.content }}</h5>
            <router-link :to="{ name: 'posts.edit', params: { id: post.id }}">edit post</router-link>
            <button @click.prevent="$store.dispatch('deletePost', post.id )"> delete post</button>
            <hr>
        </div>
    </div>
</template>

<script>
import router from "@/router.js";
import store from "@/store/index.js";

export default {
    name: "ShowPostComponent",

    mounted() {
        this.$store.dispatch('getPosts')
    },

    computed: {
        posts() {
            return this.$store.getters.posts
        }
    },

    methods: {
        store() {
            return store
        },

    }


}
</script>

<style scoped>

</style>
