<template>
    <div>
        <input type="file" name="feature_image" @change="onFileChange" class="custom-file-upload" accept="image/*">
    </div>
    <div>
        <img v-if="url" :src="url" width="100" height="60" id="preview" class="mt-1">
    </div>
</template>


<script>
    export default{
        data(){
            return {
                url: ''
            }
        },
        methods:{
            onFileChange(e){
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file)
            }
        }
    };
</script>
