<template>
    <div id="app" class="container">
        <router-link :to="{name: 'home'}">home  |</router-link>
        <router-link :to="{name: 'about'}">about |</router-link>
<!--        <router-link :to="{name: 'persons'}">persons |</router-link>
        <router-link :to="{name: 'posts'}">posts |</router-link>-->

        <br>
        <router-view></router-view>

    </div>
</template>

<script>

export default {
    components: {

    },

}

</script>
