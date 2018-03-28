<template>
    <form>
        <div class="mb-3">
            <label for="fname">First name</label>
            <input class="form-control" type="text" name="fname" id="fname" placeholder="Your first name" v-model="fname">
            Your first name is : {{ fname }}
        </div>
        <div class="mb-3">
            <label for="lname">First name</label>
            <input class="form-control" type="text" name="lname" id="lname" placeholder="Your last name" v-model="lname">
            Your last name is : {{ lname }}
        </div>
    </form>
</template>

<script>
    export default {
        data(){
            return {
                fname: '',
                lname: '',
            }
        }
    }
</script>