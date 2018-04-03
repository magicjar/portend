<template>
	<div class="avatar mb-3 text-center">
		<input type="hidden" name="avatar" v-model="ava">
	    <img class="img-fluid mb-3" :src="ava">
	    <a class="btn btn-primary btn-sm" href="#" @click.prevent="setAvatar" data-toggle="modal" data-target="#imagemodal" v-if="ava.length"><i data-feather="image"></i> Change avatar</a>
	    <a class="btn btn-primary btn-sm" href="#" @click.prevent="setAvatar" data-toggle="modal" data-target="#imagemodal" v-else><i data-feather="image"></i> Set avatar</a>
	</div>
</template>

<script>
    import { bus } from '../dashboard.js';

    export default {
        data(){
            return {
                ava: ''
            }
        },

        props: ['avatar'],

        mounted(){
        	this.ava = this.avatar;
        },

        created() {
            bus.$on('theImage', (data) => {
                this.ava = data.image_url
            });
        },

        methods: {
            setAvatar(){
                bus.$emit('thumbTrue', this.isThumbnail = true);
            },
        }
    }
</script>