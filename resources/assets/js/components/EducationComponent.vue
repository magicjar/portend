<template>
    <div>
        <form @submit.prevent="addEducation" class="actions-wrapper row no-gutters">
            <div class="actions-body mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" name="name" id="name" placeholder="Enter your degree here"  v-model="education.name" required>
                            <small id="name" class="form-text text-muted">* ex: Bachelor of Multimedia or Senior High School</small>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="institution" id="institution" placeholder="Enter the institution here"  v-model="education.institution" required>
                            <small id="institution" class="form-text text-muted">* Institution</small>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="date" class="form-control" name="date_start" id="date_start"  v-model="education.date_start">
                                <small id="date_start" class="form-text text-muted">* Education start</small>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" class="form-control" name="date_end" id="date_end" v-model="education.date_end">
                                <small id="date_end" class="form-text text-muted">* Education end</small>
                            </div>
                        </div>
                        <div>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter description here" rows="5" v-model="education.description" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="actions-meta">
                <div class="row">
                    <div class="col-12">
                        <div class="card text-white bg-gray-dark mb-4">
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
                    <div v-for="education in educations" v-bind:key="education.id" class="col-sm-6 col-xl-4 pb-3">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="h5 card-text text-muted">{{ education.name }}</h3>
                                <h4 class="h4 card-title">{{ education.institution }}</h4>
                                <p class="card-text">{{ education.description }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ education.date_start }} - {{ education.date_end }}</small>
                                <div class="float-right">
                                    <button @click="editEducation(education)" class="btn btn-sm btn-primary">Edit</button>
                                    <button @click="deleteEducation(education.id)" class="btn btn-sm btn-danger">Delete</button>
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
                educations: [],
                education: {
                    id: '',
                    name: '',
                    institution: '',
                    date_start: '',
                    date_end: '',
                    description: '',
                    resume_type: 'Education',
                },
                education_id: '',
                edit_state: false
            }
        },

        created() {
            this.fetchEducations();
        },

        methods: {
            fetchEducations(){
                axios.get(vars.urls.baseUrl + '/api/education')
                .then(response => {
                    this.educations = response.data.data;
                })
                .catch(error => console.log(error));
            },
            addEducation(){
                if(this.edit_state === false){
                    // Create
                    axios.post(vars.urls.baseUrl + '/api/education', this.education )
                    .then(data => {
                        this.education.name = '';
                        this.education.institution = '';
                        this.education.date_start = '';
                        this.education.date_end = '';
                        this.education.description = '';
                        this.fetchEducations();
                    })
                    .catch(error => console.log(error));
                } else {
                    // Update
                    axios.put(vars.urls.baseUrl + '/api/education', this.education )
                    .then(data => {
                        this.education.name = '';
                        this.education.institution = '';
                        this.education.date_start = '';
                        this.education.date_end = '';
                        this.education.description = '';
                        this.fetchEducations();
                    })
                    .catch(error => console.log(error));
                }
            },
            deleteEducation(id){
                if(confirm('This action cannot be undone!')){
                    axios.delete(vars.urls.baseUrl + '/api/education/' + id )
                    .then(data => {
                        this.fetchEducations();
                    })
                    .catch(error => console.log(error));
                }
            },
            editEducation(education){
                this.edit_state = true;
                this.education.id = education.id;
                this.education.education_id = education.id;
                this.education.name = education.name;
                this.education.institution = education.institution;
                this.education.date_start = education.date_start;
                this.education.date_end = education.date_end;
                this.education.description = education.description;
            }
        }
    }
</script>