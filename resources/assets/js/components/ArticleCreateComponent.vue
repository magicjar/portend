<template>
    <div class="actions-meta">
        <div class="row">
            <div class="col-12 col-sm-6 col-xl-12">
                <div class="card text-white bg-gray-dark mb-4">
                    <h5 class="card-header">Publish</h5>
                    <div class="card-body">
                        <a href="#" class="btn btn-sm btn-success float-right">View</a>
                    </div>
                    <div class="card-footer d-flex">
                        <a href="#" class="btn btn-sm btn-danger mt-auto">Move to Trash</a>
                        <button type="submit" class="btn btn-primary ml-auto">Publish</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-12">
                <div class="card mb-4">
                    <h5 class="card-header clearfix">
                        Categories
                        <span class="float-right">
                            <a class="badge badge-dark" data-toggle="collapse" href="#newCategory" role="button" aria-expanded="false" aria-controls="newCategory">+ Add new category</a>
                        </span>
                    </h5>
                    <div class="card-body taxo-category">
                        <div v-for="category in categories" v-bind:key="category.id" class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="article.category[]" :id="category.id" :value="category" v-model="article.category">
                            <label class="custom-control-label" :for="category.id">{{ category.name }}</label>
                        </div>
                    </div>
                    <span class="p-4">
                    Test categories: {{ article.category }}</span>
                    <div class="collapse" id="newCategory">
                        <div class="card-footer">
                            <form @submit.prevent="addCategory" id="category" class="input-group">
                                <input type="text" class="form-control" placeholder="New categories" v-model="category.name" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-12">
                <div class="card mb-4">
                    <h5 class="card-header">
                        Tags
                        <span class="float-right">
                            <a class="badge badge-dark" data-toggle="collapse" href="#newTag" role="button" aria-expanded="false" aria-controls="newCategory">+ Add new tag</a>
                        </span>
                    </h5>
                    {{ article.tag }}
                    <ul class="card-body list-inline mb-0" v-if="article.tag.length">
                        <li class="list-inline-item mr-3" v-for="tag in article.tag" v-bind:key="tag.id">
                            <button type="button" class="btn btn-danger rounded-circle remove-tag mr-1" v-on:click="article.tag.pop(article.tag)">&times;
                            </button>{{ tag.name }}
                            <input type="hidden" name="article.tag[]" :value="tag.id">
                        </li>
                    </ul>
                    <ul class="card-body list-inline mb-0" v-else>
                        No tag
                    </ul>
                    <div class="collapse" id="newTag">
                        <ul class="card-footer list-inline mb-0" v-if="tags.length">
                            <h6>Availlable Tags</h6>
                            <li class="list-inline-item mr-3" v-for="tag in tags" v-bind:key="tag.id">
                                <button type="button" class="btn btn-success rounded-circle remove-tag mr-1" v-on:click="article.tag.push(tag)">&plus;</button>{{ tag.name }}
                            </li>
                        </ul>
                        <span v-else>
                        </span>
                        <div class="card-footer">
                            <form @submit.prevent="addTag" id="tag" class="input-group">
                                <input type="text" class="form-control" placeholder="New tag" v-model="tag.name" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-12">
                <div class="card mb-4">
                    <h5 class="card-header">Thumbnail</h5>
                    <div class="card-body">
                        <img data-src="holder.js/100px250" class="img-fluid" alt="100%x250" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22623%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20623%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16222957d8e%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A31pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16222957d8e%22%3E%3Crect%20width%3D%22623%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22232.2109375%22%20y%3D%22138.8%22%3E623x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                    </div>
                    <div class="card-footer">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="thumbnail">Browse</label>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imagemodal">
                            Launch demo modal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
    import axios from 'axios';

    export default {
        data(){
            return {
                article: {
                    category: [],
                    tag: []
                },
                categories: [],
                category: {
                    id: '',
                    name: '',
                },
                tags: [],
                tag: {
                    id: '',
                    name: '',
                }
            }
        },

        created() {
            this.fetchArticle();
            this.fetchCategories();
            this.fetchTags();
        },

        methods: {
            fetchArticle(){
                let id = $('#article').data('id');

                axios.get(vars.urls.baseUrl + '/api/article/' + id)
                .then(response => {
                    this.article = response.data.data;
                    this.article.category = response.data.data.category;
                })
                .catch(error => console.log(error));
            },
            fetchCategories(){
                axios.get(vars.urls.baseUrl + '/api/article-category')
                .then(response => {
                    this.categories = response.data.data;
                })
                .catch(error => console.log(error));
            },
            addCategory(){
                axios.post(vars.urls.baseUrl + '/api/article-category', this.category )
                .then(data => {
                    this.category.name = '';
                    this.fetchCategories();
                })
                .catch(error => console.log(error));
            },
            fetchTags(){
                axios.get(vars.urls.baseUrl + '/api/article-tag')
                .then(response => {
                    this.tags = response.data.data;
                })
                .catch(error => console.log(error));
            },
            addTag(){
                axios.post(vars.urls.baseUrl + '/api/article-tag', this.tag)
                .then(data => {
                    this.tag.name = '';
                    this.fetchTags();
                })
                .catch(error => console.log(error));
            }
        }
    }
</script>