<template>
    <div>
        <button v-if="saveBtn" type="button" class="btn btn-outline-info" @click.prevent="saveAd" name="button">Save this ad</button>
        <p v-else class="alert alert-success">Advertisement Saved</p>
    </div>
</template>


<script>
    export default{
        props:['adId', 'userId'],
        data(){
            return{
                saveBtn:true,
            }
        },
        methods:{
            saveAd(){
                axios.post('/ad/save', {
                    adId:this.adId,
                    userId:this.userId
                }).then((response)=>{
                    this.saveBtn = false
                }).catch((err)=>{
                    alert('Error!')
                })
            }
        }
    };
</script>
