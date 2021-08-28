<template>
    <div>
        <form @submit.prevent="toggleFavoriteJob" method="post">
            <button type="submit" class="btn btn-outline-primary mt-2 w-100" v-text="isSaveAlready ? 'UnSave' : 'Save'"></button>
        </form>
    </div>
</template>

<script>
export default {
    name: "SaveJob",
    props: ['jobSlug', 'isSave'],
    data(){
        return {
            isSaveAlready: this.isSave
        }
    },
    methods: {
        toggleFavoriteJob() {
            axios.post(`/jobs/favorite/${this.jobSlug}`)
            .then(res => {
                if(res.data.success){
                    Toast.fire({
                        icon: 'success',
                        title: res.data.message
                    })
                    this.isSaveAlready = !this.isSaveAlready
                }else {
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
