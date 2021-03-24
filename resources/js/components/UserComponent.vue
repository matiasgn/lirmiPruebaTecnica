<template>
    <div class="container">
        <div class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <label for="input" class="sr-only">Buscar por ID</label>
                <input v-model="idUser" type="text" class="form-control" id="input" placeholder="ID">
            </div>
            <button v-on:click="findById()" class="btn btn-primary mb-2">buscar</button>
        </div>
        <ul class="list-group">
            <li class="list-group-item text-center" v-for="user in users"
                v-on:click="showProfile(user.avatar,user.first_name,user.last_name,user.email)">
                {{ user.first_name }} {{ user.last_name }}
            </li>
        </ul>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" v-on:click="changePage(page-1)">anterior</a></li>

                <li class="page-item">
                    <a class="page-link">{{ page }}</a>
                </li>

                <li class="page-item"><a class="page-link" v-on:click="changePage(page+1)">siguiente</a></li>
            </ul>
        </nav>

        <div v-if="showModal">
            <transition name="modal">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" @click="showModal=false">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="lg-6">
                                            <img v-bind:src="user.avatar" class="float-center"/>
                                        </div>
                                        <div class="lg-6">
                                            <div>
                                                <ul class="list-group">
                                                    <li class="list-group-item text-center"> {{ user.name }}
                                                        {{ user.surname }}
                                                    </li>
                                                    <li class="list-group-item text-center"> {{ user.email }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-lg float-right"
                                            v-on:click="saveUser()">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>

    </div>
</template>

<script>
export default {
    mounted() {
        this.getApiUser()
    },
    data() {
        return {
            showModal: false,
            users: [],
            idUser:'',
            user: {
                name: '',
                surname: '',
                email: '',
                avatar: ''
            },
            page: 1,
            pages: 1

        }
    }, methods: {
        getApiUser() {
            const params = {
                page: this.page
            }
            axios.get('/ApiUsers', {
                params
            }).then(res => {
                console.log(res.data);
                this.users = res.data.data;
                this.pages = res.data.total_pages;
            }).catch(function (error) {
                console.log(error);
            }).then(function () {
            });
        },
        changePage(page) {
            this.page = (page <= 0 || page > this.pages) ? this.page : page
            this.getApiUser()
        },showProfile(avatar, first_name, last_name, email) {
            this.showModal = true
            this.user.email = email
            this.user.avatar = avatar
            this.user.name = first_name
            this.user.surname = last_name
        }, saveUser() {

            axios.post('/user', this.user).then(res => {
                this.showModal = false
                Vue.swal('Guardado con exito');

            }).catch(function (error) {
                console.log(error);
            }).then(function () {
            });

        },findById(){
            axios.get('/ApiUser', {
                params: {
                    id: this.idUser
                }
            }).then(res => {

                if (res == '{}'){
                    Vue.swal('usuario no encontrado');
                }
                let userfind = res.data.data
                this.showProfile(userfind.avatar, userfind.first_name, userfind.last_name, userfind.email)

            }).catch(function (error) {

                var stringError = `Error `;
                if (error.response.data.hasOwnProperty('errors')) {
                    Vue.swal.fire(stringError, Object.values(error.response.data.errors)[0].toString(), 'error');
                } else if (error.response.data.hasOwnProperty('message')) {
                    Vue.swal.fire(stringError, error.response.data.message.toString(), 'error');
                } else if (error.response.hasOwnProperty('data')) {
                    Vue.swal.fire(stringError, error.response.data.toString(), 'error');
                }
            }).then(function () {
            });
        }
    }
}
</script>

<style>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    display: table;
    transition: opacity .3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}
</style>
