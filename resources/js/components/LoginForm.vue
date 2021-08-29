<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="login">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label">Email address</label>

                                <div class="col-md-8">
                                    <input id="email" type="email"
                                           class="form-control" :class="errors.email ? 'is-invalid' : ''" v-model="form.email" name="email"
                                             autocomplete="email" autofocus>
                                    <span v-if="errors.email" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.email[0] }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label">Password</label>

                                <div class="col-md-8">
                                    <input id="password" type="password"
                                           class="form-control" :class="errors.password ? 'is-invalid' : ''" v-model="form.password" name="password"
                                           required autocomplete="current-password">
                                    <span v-if="errors.password" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.password[0] }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" v-model="form.remember" id="remember" >

                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                       Login
                                    </button>
                                    <a class="btn btn-link" href="/password/reset">
                                        Forgot your password
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "LoginForm",
    data() {
        return {
            errors: [],
            form:
                {
                    email: null,
                    password: null,
                    remember:false,
                }
        }
    },
    methods: {
        login() {
            axios.post('/login', this.form)
            .then(res => {
               location.reload()
            })
            .catch(err => {
                this.errors = err.response.data.errors
            })
        }
    }
}
</script>

<style scoped>

</style>
