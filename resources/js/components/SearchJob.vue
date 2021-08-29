<template>
    <div>
        <form method="post" class="form">
            <input @keyup="search" v-model='keyword' type="text" class="form-control d-block" placeholder="Enter keyword to search...">
            <transition name="fade">
                <div class="card-footer" v-show="jobs.length">
                    <ul class="list-group">
                        <li class="list-group-item p-0" v-for="job in jobs" :key="job.id">
                            <a :href="job.url_detail" class="d-block" style="padding: 15px 20px;">
                                <span class="d-block">
                                     {{job.title}}
                                </span>
                                <span class="badge badge-success">{{job.position}}</span>
                            </a>

                        </li>
                    </ul>
                </div>
            </transition>
        </form>
    </div>
</template>

<script>
export default {
    name: "SearchJob",
    data() {
        return {
            jobs:[],
            keyword: null
        }
    },
    methods: {
        search: _.debounce(function(){
            if(this.keyword) {
                axios.post(`/jobs/search-job`, {'keyword': this.keyword})
                .then(res => {
                    if(res.data.success){
                        this.jobs = res.data.data.jobs
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
            } else {
                this.jobs = []
            }
        }, 200)
    }
}
</script>

<style scoped>

</style>
