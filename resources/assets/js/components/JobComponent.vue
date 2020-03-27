<template>
    <div>
        <ul class="list-group" v-for="job in jobs">
            <li class="list-group-item"><h5>{{ job.name }}</h5> <button v-on:click="updateJob(id)"  class="btn btn-primary">Take the Job!</button></li>
        </ul>
        <button class="btn btn-primary" v-on:click="reloadModel()">Reload model</button>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                jobs: []
            }
        },
        mounted() {
           this.reloadModel();
        },
        methods: {
            updateJob: function(id)
            {

            },
            reloadModel: function()
            {
                axios
                    .get('/jobs')
                    .then(response => (this.jobs = response.data));
            }
        }
    }
</script>

