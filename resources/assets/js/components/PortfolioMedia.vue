<template>
    <div class="actions-body mb-4">
        <div class="card">
            <div class="card-body">
                <div v-if="portfolioMedia.length" class="row px-2">
                    <div class="col-4 col-lg-3 px-2 mb-3" v-for="media in portfolioMedia">
                        <div class="bg-info">
                            <img class="card-img-top" :src="media.thumbnail">
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
    import axios from 'axios';
    import { bus } from '../app.js';

    export default {
        data(){
            return {
                portfolioMedia: [],
                isPortfolioMedia: false,
            }
        },

        created(){
            bus.$on('thePortfolioMedia', data => {
                this.portfolioMedia.push(data)
            });
            bus.$on('portfolioMediaFalse', (data) => {
                this.isPortfolioMedia = data
            });
        },

        methods: {
            addPortfolioMedia(){
                bus.$emit('portfolioMediaTrue', this.isPortfolioMedia = true);
            }
        }
    }
</script>