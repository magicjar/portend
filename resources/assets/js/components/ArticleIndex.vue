<template>
	<div>
		<div class="d-flex mb-0">
			<div class="input-group">
				<input class="form-control mb-0 bottom-rounded-0 border-0" @keyup.enter="fetchArticle()" type="text" name="search" v-model="searchQuery" placeholder="Search...">
				<div class="input-group-append">
					<button @click.prevent="fetchArticle()" class="btn btn-secondary border-0 bottom-rounded-0" type="button"><i data-feather="search"></i></button>
				</div>
			</div>
			
			<span class="btn bottom-rounded-0 bg-white ml-2 border-0">{{ pagination.total_post }} articles</span>
			<nav aria-label="pagination" class="ml-2">
				<ul class="pagination mb-0">
					<li :class="[{ disabled: !pagination.prev_page }]" class="page-item">
						<a @click="fetchArticle(pagination.prev_page)" class="page-link bottom-rounded-0 border-0" href="#"><i data-feather="chevron-left"></i></a>
					</li>
					<li class="page-item disabled">
						<span class="page-link disabled bottom-rounded-0 border-0">
							{{ pagination.current_page }} of {{ pagination.last_page }}
						</span>
					</li>
					<li :class="[{ disabled: !pagination.next_page }]" class="page-item">
						<a @click="fetchArticle(pagination.next_page)" class="page-link bottom-rounded-0 border-0" href="#"><i data-feather="chevron-right"></i></a>
					</li>
				</ul>
			</nav>
		</div>
		
		<div class="card top-rounded-0">
			<div class="card-body">
			    <div class="table-responsive">
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Title</th>
								<th scope="col">Content</th>
								<th scope="col">Thumbnail</th>
								<th scope="col">Date</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="article in articles" :key="article.id">
								<td>
									<p class="mb-2">{{ article.title }}</p>
									<div role="group" class="btn-group">
										<a class="edit btn btn-sm btn-primary" :href="article.url + '/edit'">Edit</a>
										<a class="view btn btn-sm btn-info" :href="$baseUrl + '/article/' + article.id" target="_blank">View</a>
										<button type="button" class="trash btn btn-sm btn-danger" @click.prevent="deleteArticle(article.id)">Trash</button>
									</div>
								</td>
								<td><p class="mb-0">{{ article.content.replace(/(<([^>]+)>)/ig, '') | truncate(100) }}</p></td>
								<td>
									<img v-if="article.image !== null"  :src="article.image.thumbnail" class="index-thumbnail img-fluid">
									<span v-else class="index-thumbnail">None</span>
								</td>
								<td>{{ article.created_at }}</td>
							</tr>
						</tbody>
					</table>
			    </div>
			</div>
		</div>
	</div>
</template>

<script>
	import debounce from '../dashboard.js';

    export default {
        data(){
            return {
                articles: [],
                pagination: {},
                searchQuery: '',
            }
        },

        created() {
        	this.fetchArticle();
        },

        methods: {
        	fetchArticle(page_url){
        		page_url = page_url || `${this.$baseUrl}/api/article?search=${this.searchQuery}`;
        		axios.get(page_url)
                    .then(response => {
                    this.articles = response.data.data;
                    this.createPagination(response.data.meta, response.data.links);
                })
                .catch(error => console.log(error));
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
        	deleteArticle(id){
        		if(confirm('This is soft delete, so it can be restored later!')){
                    axios.delete(this.$baseUrl + '/api/article/' + id )
                    .then(data => {
                        this.fetchArticle();
                    })
                    .catch(error => console.log(error));
                }
        	}
        }
    }
</script>