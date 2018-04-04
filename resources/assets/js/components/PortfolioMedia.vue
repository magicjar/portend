<template>
    <div class="actions-body mt-4">
        <div class="card">
            <div class="card-body">
                <div v-if="portfolio.media" class="row px-2">
                    <div class="col-4 col-lg-3 px-2 mb-3" v-for="media in portfolio.media">
                        <div class="bg-info">
                            <img class="card-img-top" :src="media.thumbnail">
                            <input type="hidden" name="portfolio.media[]" :value="media.id">
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3" v-else>
                    <h4>No media attached</h4>
                </div>
                <button type="button" @click="addPortfolioMedia" data-toggle="modal" data-target="#imagemodal" class="btn btn-primary w-100">Add Portfolio Media</button>
            </div>
        </div>
    </div>
</template>

<script>
    import { bus } from '../dashboard.js';

    export default {
        data(){
            return {
                portfolio: {
                    media: []
                },
                isPortfolioMedia: false,
            }
        },

        created(){
            bus.$on('thePortfolioMedia', data => {
                this.portfolio.media.push(data)
            });
            bus.$on('portfolioMediaFalse', (data) => {
                this.isPortfolioMedia = data
            });
            bus.$on('thePortfolio', (data) => {
                console.log(data)
                this.portfolio = data
            });
        },

        methods: {
            addPortfolioMedia(){
                bus.$emit('portfolioMediaTrue', this.isPortfolioMedia = true);
            }
        }
    }
</script>