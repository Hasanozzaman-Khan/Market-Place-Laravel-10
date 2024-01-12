<template>
    <div class="row">

        <div class="col-md-2">
            <p v-for="(user,index) in users" :key="index">
                  <span v-if="user.avatar">
                        <img :src=" '/storage/'+ (user.avatar.substring(7)) " width="80" style="border-radius:50%;">
                  </span>
                  <span v-else>
                      <img src="/public/img/pp.jpg" width="80" style="border-radius:50%;">
                  </span>
                    <a href="#" @click.prevent="showMessage(user.id)">
                        <p>{{user.name}}</p>
                    </a>
                </p>
        </div>

        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <span>Chat </span>
                </div>

                <div class="card-header chat-msg">
                    <ul class="chat" v-for="(message,index) in messages" :key="index">

                        <li class="sender clearfix">

                            <span class="chat-img left clearfix mx-2">
                                <img width="60" />img
                            </span>
                            <span class="chat-img left clearfix mx-2">
                                <img width="60">img

                            </span>

                            <div class="chat-body2 clearfix">
                                <div class="header clearfix">
                                    <strong class="primary-font">Name</strong>
                                    <small class="right text-muted">
                                        <span class="glyphicon glyphicon-time">Date</span>
                                    </small>
                                </div>
                                <p class="text-center">
                                    <a href="" target="_blank">
                                        <img src="" width="120">
                                    </a>

                                </p>
                            </div>
                        </li>

                        <li class="buyer clearfix">

                            <span class="chat-img right clearfix mx-2">
                                <img width="60" />img
                            </span>
                            <span class="chat-img right clearfix mx-2">
                                <img width="60">img

                            </span>

                            <div class="chat-body clearfix">
                                <div class="header clearfix">
                                    <strong class="right primary-font">Name</strong>
                                    <small class="right text-muted">
                                        <span class="glyphicon glyphicon-time">Date</span>
                                    </small>
                                </div>
                                <p class="text-center">
                                    <a href="" target="_blank">
                                        <img src="" width="120">
                                    </a>
                                    {{message.body}}
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

                <div class="card-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-primary">Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

export default {
    data(){
        return{
            users:[],
            messages:[],
            selectedUserId:'',
            body:'',
        }
    },
    mounted(){
        axios.get('/users').then((response)=>{
            this.users = response.data
        });
    },
    methods:{
        showMessage(userId){
            axios.get('/message/user/'+userId).then((response)=>{
                this.messages = response.data
                this.selectedUserId = userId
            });

        },
    }
};
</script>





<style>
    .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 40px;
    padding-bottom: 5px;
    margin-top: 10px;
    width: 80%;
    height: 10px;
}


.chat li .chat-body p
{
    margin: 0;
}


.chat-msg
{
    overflow-y: scroll;
    height: 350px;
}
.chat-msg .chat-img
{
    width: 50px;
    height: 50px;
}
.chat-msg .img-circle
{
    border-radius: 50%;
}
.chat-msg .chat-img
{
    display: inline-block;
}
.chat-msg .chat-body
{
    display: inline-block;
    max-width: 80%;
    background-color: #FFC195;
    border-radius: 12.5px;
    padding: 15px;
}
.chat-msg .chat-body2
{
    display: inline-block;
    max-width: 80%;
    background-color:#ccc;
    border-radius: 12.5px;
    padding: 15px;
}
.chat-msg .chat-body strong
{
  color: #0169DA;
}

.chat-msg .buyer
{
    text-align: right ;
    float: right;
}
.chat-msg .buyer p
{
    text-align: left ;
}
.chat-msg .sender
{
    text-align: left ;
    float: left;
}
.chat-msg .left
{
    float: left;
}
.chat-msg .right
{
    float: right;
}

.clearfix {
  clear: both;
}

</style>
