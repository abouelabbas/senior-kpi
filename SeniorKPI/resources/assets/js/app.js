
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)
 

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('message', require('./components/message.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        message : '',
        chat : {
            message : []
        },
        users : [],
        contacts : [],
        ConMessages : [],
        Receiver : ''
    },
    ready: function(){
      this.created();  
    },
    created(){
        axios.get('http://localhost:8000/chat/users')
        .then(res => {
            console.log(res);
            app.users = res.data;
        })
        .catch(err => {
            console.error(err); 
        })

        axios.get('http://localhost:8000/chat/AllUsers')
        .then(resp => {
            console.log(resp);
            app.contacts = resp.data;
        })
        .catch(erro => {
            console.error(erro); 
        })
    },
    methods: {
        prev: function(event){
        },
        send : function(){
            if(this.message.length != 0){
                axios.post('http://localhost:8000/chat/send', {
                        Receiver:this.Receiver,
                        Message: this.message,
                        Messages : this.ConMessages
                })
                .then(function (response) {
                    //console.log(response.data)
                    if(response.status===200){
                        app.ConMessages = response.data;
                        app.message = '';
                        console.log(response.data);
                    }
                })
                .catch(function (error) {
                    alert(error);
                })
            }
            
        },
        selectUser: function(id){
            axios.get('http://localhost:8000/chat/users/' + id)
            .then(res => {
                console.log(id)
                app.ConMessages = res.data;
                //app.Receiver = res.data[0].ConversationId;
                app.Receiver = id;
                // $('#scrolled').stop().animate({
                //     scrollTop: $(document).height()
                // });
            })
            .catch(err => {
                console.error(err); 
            })
        }
    },
    computed : {
        orderedM: function () {
            return _.orderBy(this.ConMessages, 'MessageId')
          }
    },
    mounted(){
        Echo.channel('chat')
            .listen('ChatEvent', (e) => {
                // // this.ConMessages.push(e.Message);
                //  console.log(e.receiver);
                // //alert('yes');
                axios.post('http://localhost:8000/getMsg', {
                        Receiver:e.receiver,
                })
                .then(function (response) {
                    //console.log(response.data)
                    if(response.status===200){
                        //if(app.Receiver == e.)
                        app.ConMessages = response.data;
                        //app.message = '';
                    console.log(response.data);
                    }
                })
                .catch(function (error) {
                    alert(error);
                })
            });
    }
});
