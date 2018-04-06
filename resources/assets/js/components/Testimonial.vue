<template>
    <div>
        <form @submit.prevent="addTestimonial" class="actions-wrapper row no-gutters">
            <div class="actions-body mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" name="title" id="title" placeholder="Enter title here" v-model="testimonial.title" required>
                        </div>
                        <div class="input-group form-group">
                            <input class="form-control" type="text" name="author" id="author" placeholder="Enter author here" v-model="testimonial.author" required>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose avatar</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="url" id="url" placeholder="Enter url here" v-model="testimonial.url" required>
                        </div>
                        <div>
                            <textarea class="form-control" name="content" id="content" placeholder="Enter testimonial here" rows="5" v-model="testimonial.content" required></textarea>
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
                    <div v-for="testimonial in testimonials" v-bind:key="testimonial.id" class="col-sm-6 col-xl-4 pb-3">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="h5 card-text text-muted">{{ testimonial.author }}</h3>
                                <h4 class="h4 card-title">{{ testimonial.title }}</h4>
                                <p class="card-text">{{ testimonial.content }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ testimonial.url }}</small>
                                <div class="float-right">
                                    <button @click="editTestimonial(testimonial)" class="btn btn-sm btn-primary">Edit</button>
                                    <button @click="deleteTestimonial(testimonial.id)" class="btn btn-sm btn-danger">Delete</button>
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
                testimonials: [],
                testimonial: {
                    id: '',
                    title: '',
                    content: '',
                    author: '',
                    url: '',
                },
                testimonial_id: '',
                edit_state: false,
            }
        },

        created() {
            this.fetchTestimonials();
        },

        methods: {
            fetchTestimonials(){
                axios.get(this.$baseUrl + '/api/testimonial')
                .then(response => {
                    this.testimonials = response.data.data;
                })
                .catch(error => console.log(error));
            },
            addTestimonial(){
                if(this.edit_state === false){
                    // Create
                    axios.post(this.$baseUrl + '/api/testimonial', this.testimonial )
                    .then(data => {
                        this.testimonial.title = '';
                        this.testimonial.content = '';
                        this.testimonial.author = '';
                        this.testimonial.url = '';
                        this.fetchTestimonials();
                    })
                    .catch(error => console.log(error));
                } else {
                    // Update
                    axios.put(this.$baseUrl + '/api/testimonial', this.testimonial )
                    .then(data => {
                        this.testimonial.title = '';
                        this.testimonial.content = '';
                        this.testimonial.author = '';
                        this.testimonial.url = '';
                        this.fetchTestimonials();
                    })
                    .catch(error => console.log(error));
                }
            },
            deleteTestimonial(id){
                if(confirm('This action cannot be undone!')){
                    axios.delete(this.$baseUrl + '/api/testimonial/' + id )
                    .then(data => {
                        this.fetchTestimonials();
                    })
                    .catch(error => console.log(error));
                }
            },
            editTestimonial(testimonial){
                this.edit_state = true;
                this.testimonial.id = testimonial.id;
                this.testimonial.testimonial_id = testimonial.id;
                this.testimonial.title = testimonial.title;
                this.testimonial.content = testimonial.content;
                this.testimonial.author = testimonial.author;
                this.testimonial.url = testimonial.url;
            }
        }
    }
</script>