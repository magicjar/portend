<template>
    <div class="actions-body mb-4">
        <div class="card">
            <div class="card-header">
                <strong>Social Media</strong>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control" type="text" name="facebook_url" placeholder="Facebook url"  v-model="setting[14].value" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="github_url" placeholder="Github url"  v-model="setting[15].value" required>
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
            bus.$on('settingData', (data) => {
                this.setting = data
            });
        },
    }
</script>