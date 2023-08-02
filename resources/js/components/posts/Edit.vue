<template>
<div>edit post</div>
    <div class="container">
        <div class="w-50">
            <input class="form-control" v-model="title" type="text" placeholder="title">
        </div>
        <div class="w-50">
            <textarea class="form-control" v-model="content" type="text" placeholder="content"/>
        </div>
        <div class="w-50">
            <button @click.prevent="editPost" type="submit" class="btn btn-success">add</button>
        </div>
    </div>

</template>

<script>
import router from "@/router.js";

export default {
    name: "EditPostComponent",

    data(){
        return {
            id: this.$route.params.id,
            title: '',
            content: ''

        }

    },

    mounted() {
        this.getPost()
    },

    methods: {

        editPost(){
            axios.patch(`/api/post/${this.id}` , {title: this.title, content: this.content})
                .then(res=> {
                    // console.log('post edited!')
                    router.push({name: 'posts'})
                })
        },

        getPost(){
            axios(`/api/post/${this.id}`)
                .then(res => {
                    this.title = res.data.title
                    this.content = res.data.content
                    // console.log(this.title, this.content)
                })
        }


    },

}
</script>

<style scoped>

</style>
