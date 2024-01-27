<template>
    <div>
        <p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" v-if="showBtn" @click.prevent="showPhoneBtn()">Show phone Number</button>
        </p>
        <p v-if="showNumber">
            <button type="button" class="btn btn-danger"  @click.prevent="hidePhoneBtn()">{{phoneNumber}}</button>
        </p>

    </div>
</template>


<script>
    export default{
        props:['phoneNumber'],
        data(){
            return{
                showBtn:true,
                showNumber:false
            }
        },
        methods:{
            showPhoneBtn(){
                this.showNumber=true;
                this.showBtn=false;
            },
            hidePhoneBtn(){
                this.showNumber=false;
                this.showBtn=true;
            }
        }
    };
</script>
