<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="job-email" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Send job to your friend</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="sendEmail">
                            <div v-if="!isLogin">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label">Your name</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control"
                                               :class="errors.name ? 'is-invalid' : ''" v-model="form.name"
                                               autocomplete="email" autofocus>
                                        <span v-if="errors.name" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.name[0] }}</strong>
                                    </span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label">Your email</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control"
                                               :class="errors.email ? 'is-invalid' : ''" v-model="form.email"
                                               autocomplete="email" autofocus>
                                        <span v-if="errors.email" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.email[0] }}</strong>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="person-name" class="col-md-4 col-form-label">Person name</label>

                                <div class="col-md-8">
                                    <input id="person-name" type="text" class="form-control"
                                           :class="errors.namePerson ? 'is-invalid' : ''" v-model="form.namePerson"
                                           autocomplete="email" autofocus>
                                    <span v-if="errors.namePerson" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.namePerson[0] }}</strong>
                                    </span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="person-email" class="col-md-4 col-form-label">Person email</label>

                                <div class="col-md-8">
                                    <input id="person-email" type="email" class="form-control"
                                           :class="errors.emailPerson ? 'is-invalid' : ''" v-model="form.emailPerson"
                                           autocomplete="email" autofocus>
                                    <span v-if="errors.emailPerson" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.emailPerson[0] }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <span v-if="this.isLoading">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </span>
                                        <span>
                                            Mail this job
                                        </span>
                                    </button>
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
    name: "MailForm",
    props: ['jobId', 'isLogin'],
    data() {
        return {
            isLoading: false,
            errors: [],
            form:
                {
                    email: null,
                    name: null,
                    emailPerson: null,
                    namePerson: null,
                }
        }
    },
    methods: {
        sendEmail() {
            this.isLoading = true
            axios.post('/jobs/sent-to-friend', {...this.form, jobId: this.jobId})
                .then(res => {
                    this.errors = []
                    Toast.fire({
                        icon: 'success',
                        title: res.data.message
                    })
                })
                .catch(err => {
                    if (err.response.status == 422) {
                        this.errors = err.response.data.errors
                    } else {
                        let ishandle = 'success' in err.response?.data
                        if (ishandle) {
                            Toast.fire({
                                icon: 'error',
                                title: err.response.data.message
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: err.response.statusText
                            })
                        }
                    }

                })
                .then(res => {
                    this.isLoading = false
                })
        }
    }
}
</script>

<style scoped>

</style>
