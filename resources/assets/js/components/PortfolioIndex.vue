<template>
	<div>
		<div class="d-flex mb-0">
			<input class="form-control mb-0 bottom-rounded-0 border-0" @keyup="fetchPortfolio()" type="text" name="search" v-model="searchQuery" placeholder="Search...">
			<span class="btn bottom-rounded-0 bg-white ml-2 border-0">{{ pagination.total_post }} portfolios</span>
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
								<th scope="col">Description</th>
								<th scope="col">Thumbnail</th>
								<th scope="col">Date</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="portfolio in portfolios" :key="portfolio.id">
								<td>
									{{ portfolio.title }}
									<div class="d-block">
										<a class="edit btn btn-sm btn-primary" :href="portfolio.url + '/edit'">Edit</a>
										<a class="view btn btn-sm btn-info" :href="portfolio.url">View</a>
										<button type="button" class="trash btn btn-sm btn-danger" @click.prevent="deletePortfolio(portfolio.id)">Trash</button>
									</div>
								</td>
								<td>{{ portfolio.description.replace(/(<([^>]+)>)/ig, '') | truncate(100) }}</td>
								<td>
									<img v-if="portfolio.image !== null"  :src="portfolio.image.thumbnail" class="index-thumbnail img-fluid">
									<span v-else class="index-thumbnail">None</span>
								</td>
								<td>{{ portfolio.created_at }}</td>
							</tr>
						</tbody>
					</table>
			    </div>
			</div>
		</div>
		<!-- <div class="d-flex mb-4">
			<nav aria-label="pagination" class="ml-auto">
				<ul class="pagination mb-0">
					<li :class="[{ disabled: !pagination.prev_page }]" class="page-item">
						<a @click="fetchPortfolio(pagination.prev_page)" class="page-link top-rounded-0" href="#"><i data-feather="chevron-left"></i></a>
					</li>
					<li class="page-item disabled">
						<span class="page-link disabled top-rounded-0">
							{{ pagination.current_page }} of {{ pagination.last_page }}
						</span>
					</li>
					<li :class="[{ disabled: !pagination.next_page }]" class="page-item">
						<a @click="fetchPortfolio(pagination.next_page)" class="page-link top-rounded-0" href="#"><i data-feather="chevron-right"></i></a>
					</li>
				</ul>
			</nav>
		</div> -->
	</div>
</template>

<script>
    export default {
        data(){
            return {
                portfolios: [],
                pagination: {},
                searchQuery: ''
            }
        },

        created() {
        	this.fetchPortfolio();
        },

        methods: {
        	fetchPortfolio(page_url){
        		page_url = page_url || `${this.$baseUrl}/api/portfolio?search=${this.searchQuery}`;
        		axios.get(page_url)
                    .then(response => {
                    this.portfolios = response.data.data;
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
        	deletePortfolio(id){
        		if(confirm('This is soft delete, so it can be restored later!')){
                    axios.delete(this.$baseUrl + '/api/portfolio/' + id )
                    .then(data => {
                        this.fetchPortfolio();
                    })
                    .catch(error => console.log(error));
                }
        	}
        }
    }
</script>