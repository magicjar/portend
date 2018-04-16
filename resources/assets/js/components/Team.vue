<template>
    <div>
        <form @submit.prevent="addTeam" id="team" class="actions-wrapper row no-gutters">
            <div class="actions-body mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" name="name" id="name" v-model="team.name" placeholder="Enter team name">
                        </div>
                        <div class="input-group form-group">
                            <input class="form-control" type="text" name="job_position" id="job_position" placeholder="Enter job position" v-model="team.job_position">
                            <div class="custom-file">
                                <input type="text" name="image" readonly class="form-control-plaintext px-3" :value="team.avatar ? team.avatar : 'http://'">
                                <div class="input-group-append">
                                    <button @click.prevent="setAvatar" class="btn btn-sm btn-outline-secondary" type="button" data-toggle="modal" data-target="#imagemodal">{{ team.avatar ? 'Change image' : 'Add image' }}</button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter team description" rows="5" v-model="team.description"></textarea>
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
                    <div v-for="team in teams" v-bind:key="team.id" class="col-12 col-xl-6 pb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex">
                                    <img class="d-none d-sm-block rounded-circle" :src="team.avatar ? team.avatar : $baseUrl + '/image/user.svg'" width="130" height="130">
                                    <div class="ml-sm-4">
                                        <h3 class="h4 card-text">{{ team.name }}</h3>
                                        <span class="font-weight-bold">{{ team.job_position }}</span>
                                        <p class="card-text">{{ team.description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div role="group" class="btn-group float-right">
                                    <button @click="editTeam(team)" class="btn btn-sm btn-primary">Edit</button>
                                    <button @click="deleteTeam(team.id)" class="btn btn-sm btn-danger">Delete</button>
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
    import { bus } from '../dashboard.js';

    export default {
        data(){
            return {
                teams: [],
                team: {
                    id: '',
                    name: '',
                    job_position: '',
                    description: '',
                    avatar: ''
                },
                edit_state: false,
            }
        },

        created() {
            this.fetchTeams();
            bus.$on('theImage', (data) => {
                this.team.avatar = data.image_url
            });
        },

        methods: {
            setAvatar(){
                bus.$emit('thumbTrue', this.isThumbnail = true);
            },
            fetchTeams(){
                axios.get(this.$baseUrl + '/api/team')
                .then(response => {
                    this.teams = response.data.data;
                })
                .catch(error => console.log(error));
            },
            addTeam(){
                if(this.edit_state === false){
                    // Create
                    axios.post(this.$baseUrl + '/api/team', this.team )
                    .then(data => {
                        this.team.name = '';
                        this.team.job_position = '';
                        this.team.description = '';
                        this.team.avatar = '';
                        this.fetchTeams();
                    })
                    .catch(error => console.log(error));
                } else {
                    // Update
                    axios.put(this.$baseUrl + '/api/team', this.team )
                    .then(data => {
                        this.team.name = '';
                        this.team.job_position = '';
                        this.team.description = '';
                        this.team.avatar = '';
                        this.fetchTeams();
                    })
                    .catch(error => console.log(error));
                }
            },
            editTeam(team){
                this.edit_state = true;
                this.team.id = team.id;
                this.team.team_id = team.id;
                this.team.name = team.name;
                this.team.job_position = team.job_position;
                this.team.description = team.description;
                this.team.avatar = team.avatar;
            },
            deleteTeam(id){
                if(confirm('This action cannot be undone!')){
                    axios.delete(this.$baseUrl + '/api/team/' + id )
                    .then(data => {
                        this.fetchTeams();
                    })
                    .catch(error => console.log(error));
                }
            },
        }
    }
</script>