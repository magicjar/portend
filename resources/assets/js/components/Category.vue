<template>
    <div class="row">
        <form @submit.prevent="addCategory" class="col-sm-6">
            <div class="actions-body mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" id="name" placeholder="Enter name here" v-model="category.name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="slug" id="slug" placeholder="Enter slug here" v-model="category.slug">
                        </div>
                        <div>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter description here" rows="5" v-model="category.description"></textarea>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">Save</button>
                </div>
            </div>
        </form>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body table-responsive pb-1">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories" v-bind:key="category.id">
                                <td>{{ category.name }}</td>
                                <td>{{ category.description }}</td>
                                <td>{{ category.slug }}</td>
                                <td class="d-flex">
                                    <button @click="editCategory(category)" class="btn btn-info btn-sm">Edit</button>
                                    <button @click="deleteCategory(category.id)" class="btn btn-danger btn-sm">Del</button>
                                </td>
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
                categories: [],
                category: {
                    id: '',
                    name: '',
                    slug: '',
                    description: ''
                },
                category_id: '',
                edit_state: false,
            }
        },

        created() {
            this.fetchCategories();
        },

        methods: {
            fetchCategories(){
                if($('#category').data('type') === 'article'){
                    axios.get(this.$baseUrl + '/api/article-category')
                    .then(response => {
                        this.categories = response.data.data;
                    })
                    .catch(error => console.log(error));
                } else {
                    axios.get(this.$baseUrl + '/api/portfolio-category')
                    .then(response => {
                        this.categories = response.data.data;
                    })
                    .catch(error => console.log(error));
                }
            },
            addCategory(){
                if(this.edit_state === false){
                    if($('#category').data('type') === 'article'){
                        axios.post(this.$baseUrl + '/api/article-category', this.category )
                        .then(data => {
                            this.category.name = '';
                            this.category.slug = '';
                            this.category.description = '';
                            this.fetchCategories();
                        })
                        .catch(error => console.log(error));
                    } else {
                        axios.post(this.$baseUrl + '/api/portfolio-category', this.category )
                        .then(data => {
                            this.category.name = '';
                            this.category.slug = '';
                            this.category.description = '';
                            this.fetchCategories();
                        })
                        .catch(error => console.log(error));
                    }
                } else {
                    if($('#category').data('type') === 'article'){
                        axios.put(this.$baseUrl + '/api/article-category', this.category )
                        .then(data => {
                            this.category.name = '';
                            this.category.slug = '';
                            this.category.description = '';
                            this.fetchCategories();
                        })
                        .catch(error => console.log(error));
                    } else {
                        axios.put(this.$baseUrl + '/api/portfolio-category', this.category )
                        .then(data => {
                            this.category.name = '';
                            this.category.slug = '';
                            this.category.description = '';
                            this.fetchCategories();
                        })
                        .catch(error => console.log(error));
                    }
                }
                
            },
            deleteCategory(id){
                if(confirm('This action cannot be undone!')){
                    axios.delete(this.$baseUrl + '/api/article-category/' + id )
                    .then(data => {
                        this.fetchCategories();
                    })
                    .catch(error => console.log(error));
                }
            },
            editCategory(category){
                this.edit_state = true;
                this.category.id = category.id;
                this.category.category_id = category.id;
                this.category.name = category.name;
                this.category.slug = category.slug;
                this.category.description = category.description;
            }
        }
    }
</script>