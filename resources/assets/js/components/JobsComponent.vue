<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="header"><h2>Available Job list</h2></div>
                <job-component @update="updateJob()"></job-component>
            </div>
            <div>
                <button v-on:click="create = !create" class="btn btn-success" style="color:#FFF">Add new job</button>
            </div>

            <div class="panel-body" v-if="create || edit">
                <form action="" v-on:submit="createJob()">
                    <h1> Create new job:</h1>
                    <div class="form-group">
                        <label for="">Job Name: </label>
                        <input type="text" v-model="job.name">
                    </div>
                    <div class="form-group">
                        <label for="">Description: </label>
                        <input type="text" v-model="job.description">
                    </div>
                    <div class="form-group">
                        <label for="">Priority: <em>high, medium or low</em></label>
                        <input type="text" v-model="job.priority">
                    </div>
                    <div class="form-group">
                        <label for="">Processor: </label> <span></span>
                        <select v-model="job.processor_id" name="" id="dropdown">
                            <option value="0">Select here</option>
                            <option  v-for="processor in processors" :value="processor.id">{{ processor.processor_name }}</option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary">Add new Job</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                create:false,
                submitters:[],
                processors:[],
                job: { name:'', priority:'', state:'0', description:'', processor_id:''}
            }
        },
        mounted() {
            this.getProcessors();
        },
        methods: {
            createJob: function(){
                let vueInstance = this;
                axios.post('/jobs', {
                    priority: vueInstance.job.priority,
                    description: vueInstance.job.description,
                    name: vueInstance.job.name,
                    state: 0,
                    processor_id: vueInstance.job.processor_id,
                })
                .then(function (response) {
                    alert(response.data.message);
                    vueInstance.create = false;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            getProcessors: function(){
                axios
                    .get('/processors')
                    .then(response => (this.processors = response.data));
            },
            getSubmitters: function(){
                axios
                    .get('/submitters')
                    .then(response => (this.submitters = response.data));
            }
        }
    }
</script>
