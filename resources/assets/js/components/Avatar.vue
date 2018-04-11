<template>
	<div class="avatar mb-3 text-center">
		<div>
            <input type="hidden" name="avatar" v-model="ava">
            <img class="img-fluid w-100 mb-3" :src="ava ? ava : $baseUrl+'/image/user.svg'" >
        </div>
        
	    <a class="btn btn-primary btn-sm" href="#" @click.prevent="setAvatar" data-toggle="modal" data-target="#imagemodal"><i data-feather="image"></i> {{ ava ? 'Change avatar' : 'Set avatar' }}</a>
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