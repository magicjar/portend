<template>
    <div>
        <form @submit.prevent="addSkill" class="actions-wrapper row no-gutters">
            <div class="actions-body mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Skill name</label>
                            <input class="form-control form-control-lg" type="text" name="name" id="name" placeholder="Enter your skill here" v-model="skill.name" required>
                        </div>
                        <div class="form-group">
                            <label for="institution" class="font-weight-bold">Knowledge level</label>
                            <input class="form-control" type="number" name="institution" id="institution" placeholder="Enter level of knowledge here"  v-model="skill.institution" required>
                            <small id="institution" class="form-text text-muted">* ex: 95 for Excelent knowledge</small>
                        </div>
                        <div>
                            <label for="name" class="font-weight-bold">Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter description here" rows="5" v-model="skill.description" required></textarea>
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
                <div class="row" v-if="skills.length">
                    <div v-for="skill in skills" v-bind:key="skill.id" class="col-sm-6 col-xl-4 pb-3">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="h5 card-text text-muted">{{ skill.name }}</h3>
                                <h4 class="h4 card-title">{{ skill.institution }}</h4>
                                <p class="card-text">{{ skill.description }}</p>
                            </div>
                            <div class="card-footer">
                                <div role="group" class="btn-group float-right">
                                    <button @click="editSkill(skill)" class="btn btn-sm btn-primary">Edit</button>
                                    <button @click="deleteSkill(skill.id)" class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" v-else>
                    <div class="col-12 mb-3 text-center h4">You have not added any skill to your resume.</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                skills: [],
                skill: {
                    id: '',
                    name: '',
                    institution: '',
                    description: '',
                    resume_type: 'skill',
                },
                resume_id: '',
                edit_state: false
            }
        },

        created() {
            this.fetchSkills();
        },

        methods: {
            fetchSkills(){
                axios.get(this.$baseUrl + '/api/resume?type=skill')
                .then(response => {
                    this.skills = response.data.data;
                })
                .catch(error => console.log(error));
            },
            addSkill(){
                if(this.edit_state === false){
                    // Create
                    axios.post(this.$baseUrl + '/api/resume', this.skill )
                    .then(data => {
                        this.skill.name = '';
                        this.skill.institution = '';
                        this.skill.description = '';
                        this.fetchSkills();
                    })
                    .catch(error => console.log(error));
                } else {
                    // Update
                    axios.put(this.$baseUrl + '/api/resume', this.skill )
                    .then(data => {
                        this.skill.name = '';
                        this.skill.institution = '';
                        this.skill.description = '';
                        this.fetchSkills();
                    })
                    .catch(error => console.log(error));
                }
            },
            deleteSkill(id){
                if(confirm('This action cannot be undone!')){
                    axios.delete(this.$baseUrl + '/api/resume/' + id )
                    .then(data => {
                        this.fetchSkills();
                    })
                    .catch(error => console.log(error));
                }
            },
            editSkill(skill){
                this.edit_state = true;
                this.skill.id = skill.id;
                this.skill.resume_id = skill.id;
                this.skill.name = skill.name;
                this.skill.institution = skill.institution;
                this.skill.description = skill.description;
            }
        }
    }
</script>