<template>
	<div class="actions-body mb-4">
        <div class="card">
            <div class="card-header">
                <strong>Details</strong>
            </div>
            <div class="card-body">
                <div class="input-group form-group">
                    <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First name"  v-model="setting[4].value" required>
                    <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last name"  v-model="setting[5].value" required>
                </div>
                <div class="input-group form-group">
                    <input class="form-control" type="text" name="title" id="title" placeholder="Title"  v-model="setting[6].value" required>
                    <input class="form-control" type="text" name="occupation" id="occupation" placeholder="Enter your occupation"  v-model="setting[7].value" required>
                </div>
                <div class="input-group form-group">
                    <input class="form-control" type="date" name="birthdate" id="birthdate" placeholder="Enter your birthdate"  v-model="setting[8].value" required>
                    <input class="form-control" type="text" name="birthplace" id="birthplace" placeholder="Enter your birthplace"  v-model="setting[9].value" required>
                </div>
                <div class="input-group form-group">
                    <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email"  v-model="setting[10].value" required>
                    <input class="form-control" type="tel" name="phone" id="phone" placeholder="Enter your phone"  v-model="setting[11].value" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="address" id="address" placeholder="Enter your address"  v-model="setting[12].value" required>
                </div>
                <div class="form-group">
                	<textarea class="form-control" name="about_me" id="about_me" placeholder="Small description about you" v-model="setting[13].value"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</template>

<script>
    import { bus } from '../app.js';

    export default {
        data(){
            return {
                setting: {
                	id: '',
                	name: '',
                	value: ''
                }
            }
        },

        created() {
        	this.fetchSetting();
        },

        methods: {
        	fetchSetting(){
                axios.get(vars.urls.baseUrl + '/api/setting')
                .then(response => {
                    bus.$emit('settingData', this.setting = response.data.data);
                })
                .catch(error => console.log(error));
            },
        }
    }
</script>