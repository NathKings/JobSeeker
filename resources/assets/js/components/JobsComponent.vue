<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="header"><h2>Available Job list</h2></div>
                <ul class="list-group" v-for="job in jobs">
                    <li class="list-group-item"><h5>{{ job.name }}</h5>
                        <button v-on:click="updateJob(job.id, 0)"  class="btn btn-primary">Submit this Job!</button> </li>
                </ul>
            </div>
            <div>
                <button v-on:click="create = !create" class="btn btn-success" style="color:#FFF">Add new job</button>
            </div>

            <div class="panel-body" v-if="create || edit">
                <form action="" v-on:submit="createJob()">
                    <h1> {{ create  ? 'Create new job:' : 'Update job'}}</h1>
                    <div class="form-group">
                        <label for="">Job Name: </label>
                        <label v-if="edit" for="">{{job.name}}</label>
                        <input v-else type="text" v-model="job.name">
                    </div>
                    <div class="form-group">
                        <label for="">Description: </label>
                        <label v-if="edit" for="">{{ job.description}}</label>
                        <input v-else type="text" v-model="job.description">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Priority:</b></label>
                        <label v-if="edit" for="">{{job.priority}}</label>
                        <input v-else type="text" v-model="job.priority">
                    </div>
                    <div v-if="create" class="form-group">
                        <label for="">Processor</label> <span></span>
                        <select v-model="job.processor_id" name="" id="dropdown">
                            <option value="0" selected>Select here</option>
                            <option  v-for="processor in processors" :value="processor.id">{{ processor.processor_name }}</option>
                        </select>
                    </div>

                    <div v-else class="form-group">
                        <label for="">Submitter</label>
                        <select v-model="job.submitter_id" name="" id="dropdown4">
                            <option value="0" selected>Select here</option>
                            <option  v-for="submitter in submitters" :value="submitter.id">{{ submitter.submitter_name }}</option>
                        </select>
                    </div>
                    <div  v-if="edit" class="form-group">
                        <label for="">State:</label> <span></span>
                        <select v-model="job.state" name="" id="dropdown3">
                            <option value="-1" selected>Select here</option>
                            <option value=1>Completed</option>
                            <option value=0>Pending</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ edit ? 'Update job': 'Add new Job'}}</button>
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
                edit: false,
                submitters:[],
                processors:[],
                job: { name:'', priority:'', state:'0', description:'', processor_id:'', submitter_id:''},
                jobs:[],
            }
        },
        mounted() {
            this.getProcessors();
            this.getSubmitters();
            this.reloadModel();
        },
        methods: {
            createJob: function(){
                let vueInstance = this;

                if (vueInstance.edit) {
                    axios.put('/jobs/update', {
                        id: vueInstance.job.id,
                        priority: vueInstance.job.priority,
                        description: vueInstance.job.description,
                        name: vueInstance.job.name,
                        state: vueInstance.job.state,
                        processor_id: vueInstance.job.processor_id,
                        submitter_id: vueInstance.job.submitter_id
                    })
                    .then(function (response) {
                        alert(response.data.message);
                        vueInstance.create = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }
                else
                {
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
                }
            },
            updateJob: function (id){
                let vue = this;
                axios.post('/findJobById', {
                    id: id
                })
                .then(function (response) {
                    vue.job = response.data[0];
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
