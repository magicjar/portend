<template>
	<div>
		<div class="actions-body mb-4">
			<div class="card">
				<div class="card-body">
					<div class="container-fluid text-center h-100" id="dropzone">
						<form class="d-flex h-100" id="fileDropzone">
							<div class="uploader my-5 mx-auto w-50">
								<div class="drop-uploader h4 mb-0">
									Drop files to upload
								</div>
								<div class="d-inline-block border border-secondary rounded-circle my-3 p-2" style="line-height: .9">or</div>
								<div class="select-uploader text-left">
									<div class="custom-file">
										<input id="media" class="custom-file-input">
										<label for="media" class="custom-file-label">Browse</label>
									</div>
								</div>
								<strong class="error text-danger" data-dz-errormessage></strong>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="actions-body mb-4">
			<div class="card">
				<div class="card-body" id="media">
					<div class="container-fluid h-100" id="library">
						<div class="row h-100">
							<div class="col-sm-8 p-3" style="overflow: auto;">
								<nav aria-label="pagination" class="mb-3 d-flex">
									<span class="my-auto text-muted">{{ pagination.total_post }} images</span>
									<ul class="pagination ml-auto mb-0">
										<span class="my-auto text-muted">{{ pagination.current_page }} of {{ pagination.last_page }}</span>
										<li :class="[{ disabled: !pagination.prev_page }]" class="page-item ml-2">
											<a @click="fetchMedia(pagination.prev_page)" class="page-link rounded-0 border-0" href="#"><i data-feather="chevron-left"></i></a>
										</li>
										<li :class="[{ disabled: !pagination.next_page }]" class="page-item">
											<a @click="fetchMedia(pagination.next_page)" class="page-link rounded-0 border-0" href="#"><i data-feather="chevron-right"></i></a>
										</li>
									</ul>
								</nav>
								<ul class="row px-2 list-unstyled" id="dropzonePreview">
									<li class="col-6 col-lg-4 col-xl-3 px-2 mb-3" id="template">
										<div class="media-checkbox template-image">
											<div class="media-thumbnail progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
												<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
											</div>
										</div>
									</li>
									<li v-for="image in media" v-bind:key="image.id" class="col-6 col-lg-4 col-xl-3 px-2 mb-3">
										<div @click.prevent="editMedia(image)" role="checkbox" :class="[{ selected: image.id == img.id }]" class="media-checkbox">
											<img class="media-thumbnail img-fluid rounded-0" :title="image.title" :alt="image.alt" :src="image.thumbnail">
										</div>
									</li>
								</ul>
							</div>
							<div class="col-sm-4 h-100 border-left p-0" style="overflow: auto;">
								<div v-show="show" class="detail p-3 border-bottom">
									<h5>Media details</h5>
									<img class="img-fluid mb-2" :src="image.thumbnail">
									<ul class="list-unstyled mb-0 text-muted">
										<li class="font-weight-bold">{{image.file}}</li>
										<li class="small">{{image.created_at}}</li>
										<li class="small">{{image.filesize}} Byte</li>
										<li class="small">{{image.resolution}}</li>
										<li class="small"><a @click="deleteMedia(image.id)" href="#" class="text-danger">Delete permanently</a></li>
									</ul>
								</div>
								<form @submit.prevent="saveMedia" v-if="show" class="form-field p-3">
									<div class="form-group">
										<input class="form-control" type="text" name="file" v-model="image.image_url" readonly>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" name="title" v-model="image.title" placeholder="Title">
									</div>
									<div class="form-group">
										<textarea class="form-control" type="text" name="caption" v-model="image.caption" placeholder="Caption"></textarea>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" name="alt" v-model="image.alt" placeholder="Alt text">
									</div>
									<div class="form-group">
										<textarea class="form-control" type="text" name="description" v-model="image.description" placeholder="Description"></textarea>
									</div>
									<button type="submit" class="btn btn-primary btn-sm">Save</button>
								</form>
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
				show: false,
				media: [],
				image: {
					id: '',
					file: '',
					title: '',
					caption: '',
					alt: '',
					description: '',
					image_url: '',
					thumbnail: '',
					resolution: '',
					filesize: '',
					created_at: ''
				},
				img: {},
				pagination: {}
			}
		},

		mounted() {
			this.mediaUploads();
		},

		created() {
            this.fetchMedia();
        },

		methods: {
			mediaUploads() {
				var previewNode = document.querySelector("#template");
				var previewTemplate = previewNode.parentNode.innerHTML;
				previewNode.parentNode.removeChild(previewNode);
				let vm = this;

				new Dropzone("#fileDropzone", {
					url: this.$baseUrl + '/api/media/upload',
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
					},
					parallelUploads: 10,
					uploadMultiple: true,
					forceFallback: false,
					timeout: 600000, // 10 mins in millisecond
					previewsContainer: '#dropzonePreview',
					previewTemplate: previewTemplate,
					clickable: ".select-uploader", // Clickable form
					//autoQueue: false, // Prevent auto upload on select

					addedfiles() {
						$('#library, #library-tab').addClass('show active');
						$('#dropzone, #dropzone-tab').removeClass('show active');
					},
					successmultiple() {
						vm.fetchMedia();
					}
				});
			},
			fetchMedia(page_url){
				page_url = page_url || this.$baseUrl + '/api/media';
        		axios.get(page_url)
                .then(response => {
                    this.media = response.data.data;
                    this.createPagination(response.data.meta, response.data.links);
                })
                .catch(error => console.log(error));
			},
			editMedia(image){
				this.image.id = image.id;
                this.image.file = image.file;
                this.image.title = image.title;
                this.image.caption = image.caption;
                this.image.alt = image.alt;
                this.image.description = image.description;
                this.image.image_url = image.image_url;
                this.image.thumbnail = image.thumbnail;
                this.image.resolution = image.resolution;
                this.image.filesize = image.filesize;
                this.image.created_at = image.created_at;
                this.img = image;
                this.show = true;
			},
			saveMedia(){
				axios.put(this.$baseUrl + '/api/media', this.image )
				.then(data => {
				    this.fetchMedia();
				})
				.catch(error => console.log(error));
			},
			deleteMedia(id){
				if(confirm('This action cannot be undone!')){
                    axios.delete(this.$baseUrl + '/api/media/' + id )
                    .then(data => {
                    	this.show = false;
                        this.fetchMedia();
                    })
                    .catch(error => console.log(error));
                }
			},
			createPagination(meta, links){
        		let pagination = {
        			total_post: meta.total,
        			current_page: meta.current_page,
        			last_page: meta.last_page,
        			next_page: links.next,
        			prev_page: links.prev,
        		}
        		this.pagination = pagination;
        	},
		}
	}
</script>