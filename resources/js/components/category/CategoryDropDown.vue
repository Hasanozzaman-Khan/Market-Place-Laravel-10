<template>
    <div class="col-md-4">
        <label for="category_id" class=""><b>Category</b></label>
        <select class="form-control" name="category_id" id="category_id" v-model="category" @change="getSubCategories()">
            <option value="">Choose Category</option>
            <option v-for="data in categories" :value="data.id" :key="data.id">{{data.name}}</option>
        </select>
    </div>

    <div class="col-md-4">
        <label for="subcategory_id" class=""><b>Subcategory</b></label>
        <select class="form-control" name="subcategory_id" id="subcategory_id" v-model="subcategory" @change="getChildCategories()">
            <option value="">Choose Subcategory</option>
            <option v-for="data in subcategories" :value="data.id" :key="data.id">{{data.name}}</option>
        </select>
    </div>

    <div class="col-md-4">
        <label for="childcategory_id" class=""><b>Childcategory</b></label>
        <select class="form-control" name="childcategory_id" id="childcategory_id" v-model="childcategory">
            <option value="">Choose Childcategory</option>
            <option v-for="data in childcategories" :value="data.id" :key="data.id">{{data.name}}</option>
        </select>
    </div>
</template>


<script>
    export default{
        data(){
            return{
                category:0,
                categories:[],
                subcategory:0,
                subcategories:[],
                childcategory:0,
                childcategories:[]
            }
        },
        mounted(){
            this.getCategories();
        },
        methods:{
            getCategories(){
                axios.get('/api/category').then((response)=>{
                    this.categories = response.data
                });
            },
            getSubCategories(){
                axios.get('/api/subcategory', {params:{category_id:this.category}}).then((response)=>{
                    this.subcategories = response.data
                });
            },
            getChildCategories(){
                axios.get('/api/childcategory', {params:{subcategory_id:this.subcategory}}).then((response)=>{
                    this.childcategories = response.data
                });
            }
        }
    };
</script>
