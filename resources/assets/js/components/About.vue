<template>
    <div>
        <form @submit.prevent="saveAbout" class="actions-wrapper row no-gutters">
        	<div class="actions-body mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group form-group">
                            <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First name"  v-model="about[4].value" required>
                            <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last name"  v-model="about[5].value" required>
                        </div>
                        <div class="input-group form-group">
                            <input class="form-control" type="text" name="title" id="title" placeholder="Title"  v-model="about[6].value" required>
                            <input class="form-control" type="text" name="occupation" id="occupation" placeholder="Enter your occupation"  v-model="about[7].value" required>
                        </div>
                        <div class="input-group form-group">
                            <input class="form-control" type="date" name="birthdate" id="birthdate" placeholder="Enter your birthdate"  v-model="about[8].value" required>
                            <input class="form-control" type="text" name="birthplace" id="birthplace" placeholder="Enter your birthplace"  v-model="about[9].value" required>
                        </div>
                        <div class="input-group form-group">
                            <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email"  v-model="about[10].value" required>
                            <input class="form-control" type="tel" name="phone" id="phone" placeholder="Enter your phone"  v-model="about[11].value" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="address" id="address" placeholder="Enter your address"  v-model="about[12].value" required>
                        </div>
                        <div class="form-group">
                        	<textarea class="form-control" name="about_me" id="about_me" placeholder="Small description about you" v-model="about[13].value"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                about: {
                	id: '',
                	name: '',
                	value: ''
                }
            }
        },

        created() {
        	this.fetchAboutMe();
        },

        methods: {
        	fetchAboutMe(){
                axios.get(vars.urls.baseUrl + '/api/setting')
                .then(response => {
                    this.about = response.data.data;
                })
                .catch(error => console.log(error));
            },
        }
    }
</script>