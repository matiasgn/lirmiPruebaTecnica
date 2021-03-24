<template>
    <ul class="list-group">
        <li class="list-group-item text-center" v-for="user in users"  v-if="user.id != undefined">
            <button  type="button" class="btn btn-danger" @click="deleteUser(user.id)">Eliminar</button>  {{ user.name }}    {{ user.surname }}  -  {{ user.email }}
        </li>
        <li class="list-group-item text-center"   v-if="users.length == 0"  >
            <h5>No existen usuarios registrados</h5>
        </li>
    </ul>
</template>

<script>
export default {
    mounted() {
        this.getUser()
    },
    data() {
        return {
            users: []
        }
    }, methods: {
        getUser() {
            axios.get('/users').then(res => {
                console.log(res.data);
                this.users = res.data;
            }).catch(function (error) {
                console.log(error);
            }).then(function () {
            });
        },
            deleteUser(id) {
            axios.delete('/user/delete',{
                params:{ id:id }
            }).then(res => {
                this.users = res.data;
                this.getUser()
            }).catch(function (error) {
                console.log(error);
               this.getUser()
            }).then(function () {
            });
        },

    }
}
</script>
