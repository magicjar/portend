<template>
	<div>
		<div class="actions-body mb-4">
			<div class="card">
				<div class="card-body">
					<div class="container-fluid text-center h-100" id="dropzone">
						<form class="uploader d-flex h-100 row" id="fileDropzone">
							<div class="my-5 mx-auto w-50">
								<div class="drop-uploader h4 mb-0">
									Drop images to upload
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
					<hr>
					<div class="link-uploader my-5 mx-auto w-50">
						<div class="h4 text-center mb-3">
							Import file from url
						</div>
						<form class="input-group mb-0">
							<input v-model="imports.import_file" type="text" class="form-control pr-4" placeholder="http://">
							<div class="input-group-append">
								<i id="spinner" data-feather="sun"></i>
								<button id="btn-import" @click.prevent="importFromUrl()" class="btn btn-secondary" type="button">Import</button>
							</div>
						</form>
						<small class="form-text text-muted">Supported host: Youtube, Vimeo, SoundCloud</small>
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
									<li v-for="image in media" v-bind:key="image.id" class="col-6 col-sm-4 col-lg-4 col-xl-3 px-2 mb-3">
										<div @click.prevent="editMedia(image)" role="checkbox" :class="[{ selected: image.id == img.id }]" class="media-checkbox">
											<div class="media-overlay" v-if="image.media_type !== 'image'"></div>
											<img class="media-thumbnail img-fluid rounded-0" :title="image.title" :alt="image.alt" :src="image.thumbnail">
										</div>
									</li>
								</ul>
							</div>
							<div class="col-sm-4 h-100 border-left p-0" style="overflow: auto;">
								<div v-show="show" class="detail p-3 border-bottom">
									<h5>Media details</h5>
									<img v-if="image.thumbnail" class="img-fluid mb-2" :src="image.thumbnail">
									<ul class="list-unstyled mb-0 text-muted">
										<li class="font-weight-bold">{{image.file}}</li>
										<li class="small">{{image.created_at}}</li>
										<li class="small text-capitalize">{{image.media_type}}</li>
										<li class="small" v-if="image.filesize">{{image.filesize}} Byte</li>
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
									<div v-if="image.media_type === 'image'" class="form-group">
										<textarea class="form-control" type="text" name="caption" v-model="image.caption" placeholder="Caption"></textarea>
									</div>
									<div v-if="image.media_type === 'image'" class="form-group">
										<input class="form-control" type="text" name="alt" v-model="image.alt" placeholder="Alt text">
									</div>
									<div v-if="image.media_type === 'image'" class="form-group">
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
					media_type: '',
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
				pagination: {},
				imports: {
					import_file: '',
					import_type: '',
					import_title: '',
					import_thumbnail: ''
				},
				oembed_data: {}
			}
		},

		mounted() {
			this.mediaUploads();
		},

		created() {
            this.fetchMedia();
        },

		methods: {
			importFromUrl(){
				var spinner = $('#spinner');
				var button = $('#btn-import');
				var url = this.imports.import_file;
				var domain = url.replace('http://', '').replace('https://', '').replace('www.', '').split(/[/?#]/)[0]
				var vm = this

				if (domain === 'youtube.com' || domain === 'youtu.be' || domain === 'vimeo.com') {
					this.imports.import_type = 'video'
				} else if (domain === 'soundcloud.com') {
					this.imports.import_type = 'audio'
				} else {
					return alert('Host not supported!')
				}

				// Array.prototype.includes
				/*var video_host = ['youtube.com', 'youtu.be', 'vimeo.com']
            	var audio_host = ['soundcloud.com']

				if (video_host.includes(domain)) {
					this.imports.import_type = 'video'
				} else if (audio_host.includes(domain)) {
					this.imports.import_type = 'audio'
				} else {
					return alert('Host not supported!')
				}*/

				// Fetch noembed and get the data
				fetch('https://noembed.com/embed?url=' + url)
				.then(response => response.json())
				.then(response => {
                    this.oembed_data = response;
                    this.imports.import_thumbnail = response.thumbnail_url;
                    this.imports.import_title = response.title;
                })
                .catch(error => console.log(error));

                // Show spinner / disabled button
				spinner.show();
				button.attr("disabled", true)

                // Wait 2seconds until noembed get response to prevent error
                setTimeout(function(){
                	axios.post(vm.$baseUrl + '/api/media/import', vm.imports)
					.then(data => {
						vm.imports.import_file = '';
						vm.imports.import_type = '';
						vm.imports.import_title = '';
						vm.imports.import_thumbnail = '';
					    vm.fetchMedia();
					})
					.catch(error => console.log(error));

					// Hide spinner / enabled button
					spinner.hide();
					button.attr("disabled", false)
            	}, 3000);
			},
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
                this.image.media_type = image.media_type;
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