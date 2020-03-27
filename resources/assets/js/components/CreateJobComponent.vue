<template>
    <div class="container">
        <div class="panel-body">
            <form action="" v-on:submit="update()">
                <h1> Update job state:</h1>
                <div class="form-group">
                    <label for="">Job Name: </label>
                    <input type="text" v-model="job.name">
                </div>
                <div class="form-group">
                    <label v-model="job.description" for="">{{ job.description}} </label>
                </div>
                <div class="form-group">
                    <label for="">{{job.priority}}</label>
                </div>
                <div v-if="this.props.submitter" class="form-group">
                    <label for="">Submitter: </label> <span></span>
                    <select v-model="job.submitter_id" name="" id="dropdown1">
                        <option value="0">Select here</option>
                        <option  v-for="processor in processors" :value="processor.id">{{ processor.processor_name }}</option>
                    </select>
                </div>
                <div v-else class="form-group">
                    <label for="">Submitter: </label> <span></span>
                    <select v-model="job.processor_id" name="" id="dropdown2">
                        <option value="0">Select here</option>
                        <option  v-for="submitter in submitters" :value="submitter.id">{{ submitter.submitter_name }}</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">{{ buttonTitle }}</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props:['job', 'submitter', 'processor'],
        name: "CreateJobComponent.vue",
        data: function(){
            return {
                job: this.props.job,
                buttonTitle:''
            }
        },
        mounted() {
            buttonTitle = this.props.submitter ? 'Submit this job' : 'Take this job';
        },
        methods:
        {
            update: function()
            {

            }
        }
    }
</script>