<template>
    <div class="container">
        <div class="w-50">
            <input class="form-control" v-model="title" type="text" placeholder="title">
        </div>
        <div class="w-50">
            <textarea class="form-control" v-model="content" type="text" placeholder="content"/>
        </div>
        <div class="w-50">
            <button :disabled="!isDisabled" @click.prevent="addPost" type="submit" class="btn btn-success">add</button>
        </div>
    </div>
</template>

<script>

import router from "@/router.js";
export default {
    name: "CreatePostComponent",

    data() {
        return {
            title: null,
            content: null
        }
    },

    computed: {
        isDisabled() {
            return this.title && this.content
        }
    },


    methods: {
        addPost(){
            // console.log(this.title, this.content)
            axios.post('/api/post', {title: this.title, content: this.content})
                .then(res => {


                    // router.push({name: 'home'})
                    router.push({name: 'posts'})
                    // console.log(res)
                })
        }
    }


}
</script>

<style scoped>

</style>
