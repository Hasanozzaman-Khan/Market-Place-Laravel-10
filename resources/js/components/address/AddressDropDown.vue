<template>
    <div class="col-md-4">
        <label for="country_id" class=""><b>Country</b></label>
        <select class="form-control" name="country_id" id="country_id" v-model="country" @change="getStates()">
            <option value="">Choose Country</option>
            <option v-for="data in countries" :value="data.id" :key="data.id">{{data.name}}</option>
        </select>
    </div>

    <div class="col-md-4">
        <label for="state_id" class=""><b>State</b></label>
        <select class="form-control" name="state_id" id="state_id" v-model="state" @change="getCities()">
            <option value="">Choose State</option>
            <option v-for="data in states" :value="data.id" :key="data.id">{{data.name}}</option>
        </select>
    </div>

    <div class="col-md-4">
        <label for="city_id" class=""><b>City</b></label>
        <select class="form-control" name="city_id" id="city_id" v-model="city">
            <option value="">Choose City</option>
            <option v-for="data in cities" :value="data.id" :key="data.id">{{data.name}}</option>
        </select>
    </div>
</template>


<script>
    export default{
        data(){
            return{
                country:0,
                countries:[],
                state:0,
                states:[],
                city:0,
                cities:[]
            }
        },
        mounted(){
            this.getCountries();
        },
        methods:{
            getCountries(){
                axios.get('/api/country').then((response)=>{
                    this.countries = response.data
                });
            },
            getStates(){
                axios.get('/api/state', {params:{country_id:this.country}}).then((response)=>{
                    this.states = response.data
                });
            },
            getCities(){
                axios.get('/api/city', {params:{state_id:this.state}}).then((response)=>{
                    this.cities = response.data
                });
            }
        }
    };
</script>
