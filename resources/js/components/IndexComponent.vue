<template>
    <div class="container">
        <create-component></create-component>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            <template v-for="user in users">
                <tr :class=" isEdit(user.id) ? 'd-none' : '' " @click="isEdit(user.id)">
                    <th scope="row">{{ user.id }}</th>
                    <td>{{ user.name }}</td>
                    <td>{{ user.age }}</td>
                    <td>{{ user.job }}</td>
                    <td>

                        <button @click.prevent="changePersonID(user.id, user.name, user.age, user.job)"
                                class="btn btn-secondary">edit user
                        </button>

                        <button @click.prevent="deletePerson(user.id)" class="btn btn-danger m-lg-2">delete
                        </button>
                    </td>

                </tr>

                <tr :class=" isEdit(user.id) ?  '' : 'd-none' ">
                    <th scope="row">{{ user.id }}</th>
                    <td><input v-model="name" class="form-control" placeholder="new name" type="text"></td>
                    <td><input v-model="age" class="form-control" placeholder="new age" type="number"></td>
                    <td><input v-model="job" class="form-control" placeholder="new job" type="text"></td>

                    <td>
                        <!--                        <button @click.prevent="updatePerson" class="btn btn-success">update</button>-->
                        <button @click.prevent="updatePerson(user.id)" class="btn btn-success">update</button>

                    </td>
                </tr>
            </template>

            </tbody>
        </table>
    </div>
</template>

<script>

import data from "bootstrap/js/src/dom/data.js";
import CreateComponent from "@/components/CreateComponent.vue"

export default {
    name: "IndexComponent",

    components: {
        CreateComponent
    },


    data() {
        return {
            users: [],
            editPersonID: null,
            name: null,
            age: null,
            job: null,
        }
    },

    mounted() {
        this.getPeople()
    },

    methods: {
        changePersonID(id, name, age, job) {
            this.editPersonID = id,
                this.name = name,
                this.age = age,
                this.job = job,
                this.id = id

        },

        isEdit(id) {
            // console.log(this.editPersonID === id)
            return this.editPersonID === id
        },

        getPeople() {
            axios('/api/people')
                .then(res => {
                    // console.log(res)
                    this.users = res.data
                })
        },

        updatePerson(id) {
            // console.log({name: this.name, job: this.job, age: this.age})
            axios.patch(`/api/people/${id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.getPeople()
                    console.log(res)
                })

            this.changePersonID(null)
        },

        deletePerson(id) {
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    console.log(res);
                    this.getPeople()
                })
        }


    }
}


</script>

<style scoped>

</style>
