<template>
    <div v-show="!isSuccess">
        <form @submit.prevent="applyJob" method="post">
            <button type="submit" class="btn btn-success mt-2 w-100">Apply</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "ApplyJob",
    props: ['jobSlug'],
    data(){
        return {
          isSuccess: false
        }
    },
    methods: {
        applyJob() {
            axios.post(`/apply-job/${this.jobSlug}`)
            .then(res => {
                if (res.data.success) {
                    Toast.fire({
                        icon: 'success',
                        title: res.data.message
                    })
                    this.isSuccess = true
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: res.data.message
                    })
                }

            })
            .catch(err => {
                Toast.fire({
                    icon: 'error',
                    title: err.response.statusText
                })
            })
        }
    }
}
</script>

<style scoped>

</style>
