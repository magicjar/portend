<template>
    <div>
        <form @submit.prevent="addExperience" class="actions-wrapper row no-gutters">
            <div class="actions-body mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" name="name" id="name" placeholder="Enter your position here"  v-model="experience.name" required>
                            <small id="name" class="form-text text-muted">* ex: Web Developer or Graphic Designer</small>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="institution" id="institution" placeholder="Enter company name here"  v-model="experience.institution" required>
                            <small id="institution" class="form-text text-muted">* Company</small>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="date" class="form-control" name="date_start" id="date_start"  v-model="experience.date_start">
                                <small id="date_start" class="form-text text-muted">* Start working</small>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" class="form-control" name="date_end" id="date_end" v-model="experience.date_end">
                                <small id="date_end" class="form-text text-muted">* Finish working</small>
                            </div>
                        </div>
                        <div>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter description here" rows="5" v-model="experience.description" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="actions-meta">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Publish</h5>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary ml-auto">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="card">
            <div class="card-body pb-1">
                <div class="row">
                    <div v-for="experience in experiences" v-bind:key="experience.id" class="col-sm-6 col-xl-4 pb-3">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="h5 card-text text-muted">{{ experience.name }}</h3>
                                <h4 class="h4 card-title">{{ experience.institution }}</h4>
                                <p class="card-text">{{ experience.description }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ experience.date_start }} - {{ experience.date_end }}</small>
                                <div class="float-right">
                                    <button @click="editExperience(experience)" class="btn btn-sm btn-primary">Edit</button>
                                    <button @click="deleteExperience(experience.id)" class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                experiences: [],
                experience: {
                    id: '',
                    name: '',
                    institution: '',
                    date_start: '',
                    date_end: '',
                    description: '',
                    resume_type: 'experience',
                },
                resume_id: '',
                edit_state: false,
            }
        },

        created() {
            this.fetchExperiences();
        },

        methods: {
            fetchExperiences(){
                axios.get(this.$baseUrl + '/api/resume?type=experience')
                .then(response => {
                    this.experiences = response.data.data;
                })
                .catch(error => console.log(error));
            },
            addExperience(){
                if(this.edit_state === false){
                    // Create
                    axios.post(this.$baseUrl + '/api/resume', this.experience )
                    .then(data => {
                        this.experience.name = '';
                        this.experience.institution = '';
                        this.experience.date_start = '';
                        this.experience.date_end = '';
                        this.experience.description = '';
                        this.fetchExperiences();
                    })
                    .catch(error => console.log(error));
                } else {
                    // Update
                    axios.put(this.$baseUrl + '/api/resume', this.experience )
                    .then(data => {
                        this.experience.name = '';
                        this.experience.institution = '';
                        this.experience.date_start = '';
                        this.experience.date_end = '';
                        this.experience.description = '';
                        this.fetchExperiences();
                    })
                    .catch(error => console.log(error));
                }
            },
            deleteExperience(id){
                if(confirm('This action cannot be undone!')){
                    axios.delete(this.$baseUrl + '/api/resume/' + id )
                    .then(data => {
                        this.fetchExperiences();
                    })
                    .catch(error => console.log(error));
                }
            },
            editExperience(experience){
                this.edit_state = true;
                this.experience.id = experience.id;
                this.experience.resume_id = experience.id;
                this.experience.name = experience.name;
                this.experience.institution = experience.institution;
                this.experience.date_start = experience.date_start;
                this.experience.date_end = experience.date_end;
                this.experience.description = experience.description;
            }
        }
    }
</script>