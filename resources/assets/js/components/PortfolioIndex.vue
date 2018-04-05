<template>
	<div>
		<div class="d-block d-sm-flex mb-4">
			<div class="w-100 mb-3 mb-sm-0">
				<input class="form-control form-control-lg" type="text" name="search" placeholder="Search...">
			</div>
			<nav aria-label="pagination" class="d-flex">
				<ul class="pagination my-auto mx-auto ml-sm-4">
					<li :class="[{ disabled: !pagination.prev_page }]" class="page-item">
						<a @click="fetchArticle(pagination.prev_page)" class="page-link" href="#"><i data-feather="chevron-left"></i></a>
					</li>
					<li class="page-item disabled">
						<span class="page-link text-mute">
							{{ pagination.current_page }} of {{ pagination.last_page }}
						</span>
					</li>
					<li :class="[{ disabled: !pagination.next_page }]" class="page-item">
						<a @click="fetchArticle(pagination.next_page)" class="page-link" href="#"><i data-feather="chevron-right"></i></a>
					</li>
				</ul>
			</nav>
		</div>
		
		<div class="card">
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
								<td>{{ portfolio.description | truncate(100) }}</td>
								<td>
									<img v-if="portfolio.image !== null"  :src="portfolio.image.thumbnail" class="index-thumbnail img-fluid">
									<img v-else src="adsdj" class="index-thumbnail img-fluid">
								</td>
								<td>{{ portfolio.created_at }}</td>
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
                portfolios: [],
                pagination: {}
            }
        },

        created() {
        	this.fetchPortfolio();
        },

        methods: {
        	fetchPortfolio(page_url){
        		page_url = page_url || this.$baseUrl + '/api/portfolio'
        		axios.get(page_url)
                    .then(response => {
                    this.portfolios = response.data.data;
                    this.createPagination(response.data.meta, response.data.links);
                })
                .catch(error => console.log(error));
        	},
        	createPagination(meta, links){
        		let pagination = {
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