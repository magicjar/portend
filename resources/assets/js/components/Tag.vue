<template>
    <div class="row">
        <form @submit.prevent="addTag" class="col-sm-6">
            <div class="actions-body mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" id="name" placeholder="Enter name here" v-model="tag.name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="slug" id="slug" placeholder="Enter slug here" v-model="tag.slug">
                        </div>
                        <div>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter description here" rows="5" v-model="tag.description"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-block" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body table-responsive pb-1">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="py-1">Name</th>
                                <th class="py-1">Description</th>
                                <th class="py-1">Slug</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="tag in tags" v-bind:key="tag.id">
                                <td>{{ tag.name }}
                                    <div class="btn-group mt-2 d-flex" role="group">
                                        <button @click="editTag(tag)" type="button" class="btn btn-sm btn-primary">Edit</button>
                                        <button @click="editTag(tag.id)" type="button" class="btn btn-sm btn-danger">Del</button>
                                    </div>
                                </td>
                                <td>{{ tag.description }}</td>
                                <td>{{ tag.slug }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                tags: [],
                tag: {
                    id: '',
                    name: '',
                    slug: '',
                    description: '',
                    type: $('#tag').data('type') === 'article' ? 'article' : 'portfolio'
                },
                tag_id: '',
                edit_state: false,
            }
        },

        created() {
            this.fetchTags();
        },

        methods: {
            fetchTags(){
                if($('#tag').data('type') === 'article'){
                    axios.get(this.$baseUrl + '/api/tag?type=article')
                    .then(response => {
                        this.tags = response.data.data;
                    })
                    .catch(error => console.log(error));
                } else {
                    axios.get(this.$baseUrl + '/api/tag?type=portfolio')
                    .then(response => {
                        this.tags = response.data.data;
                    })
                    .catch(error => console.log(error));
                }
            },
            addTag(){
                if(this.edit_state === false){
                    // Create
                    axios.post(this.$baseUrl + '/api/tag', this.tag )
                    .then(data => {
                        this.tag.name = '';
                        this.tag.slug = '';
                        this.tag.description = '';
                        this.fetchTags();
                    })
                    .catch(error => console.log(error));
                } else {
                    // Update
                    axios.put(this.$baseUrl + '/api/tag', this.tag )
                    .then(data => {
                        this.tag.name = '';
                        this.tag.slug = '';
                        this.tag.description = '';
                        this.fetchTags();
                    })
                    .catch(error => console.log(error));
                }
                
            },
            deleteTag(id){
                if(confirm('This action cannot be undone!')){
                    axios.delete(this.$baseUrl + '/api/tag/' + id )
                    .then(data => {
                        this.fetchTags();
                    })
                    .catch(error => console.log(error));
                }
            },
            editTag(tag){
                this.edit_state = true;
                this.tag.id = tag.id;
                this.tag.tag_id = tag.id;
                this.tag.name = tag.name;
                this.tag.slug = tag.slug;
                this.tag.description = tag.description;
            }
        }
    }
</script>