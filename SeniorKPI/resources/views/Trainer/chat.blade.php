@extends('Layouts/trainerkpi',['TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds])
@section('content')
<div id="app">
{{-- <input type="hidden" value="{{session()->get('token')}}" id="token" /> --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html"><i class="material-icons">home</i> Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Chat</li>
    </ol>
  </nav>
<div class="row">

<!-- Chat Sidebar -->
<div class="col-xl-4 col-md-12">
  <div class="ms-panel ms-panel-fh">
    <div class="ms-panel-body py-3 px-0">
      <div class="ms-chat-container">

        <div class="ms-chat-header px-3">
          <div class="ms-chat-user-container media clearfix">
            <div class="ms-chat-status ms-status-online ms-chat-img mr-3 align-self-center">
              <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
            </div>
            <div class="media-body ms-chat-user-info mt-1">
              <h6>{{session('NameEn')}}</h6>
              <a href="#" class="text-disabled  fs-12"  >
                Available
              </a>
            </div>
          </div>
          <form class="ms-form my-3" method="post">
            <div class="ms-form-group my-0 mb-0 has-icon fs-14">
              <input type="search" class="ms-form-input w-100" name="search" placeholder="Search for People and Groups" value="">
              <i class="flaticon-search text-disabled"></i>
            </div>
          </form>
        </div>

        <div class="ms-chat-body">
          <ul class="nav nav-tabs tabs-bordered d-flex nav-justified px-3" role="tablist">
            <li role="presentation" class="fs-12"><a href="#chats-2" aria-controls="chats" class="active show" role="tab" data-toggle="tab"> Chats </a></li>
            <li role="presentation" class="fs-12"><a href="#groups-2" aria-controls="groups" role="tab" data-toggle="tab"> Groups </a></li>
            <li role="presentation" class="fs-12"><a href="#contacts-2" aria-controls="contacts" role="tab" data-toggle="tab"> Contacts </a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active show fade in" id="chats-2">
              <ul class="ms-scrollable">
                <li v-for="user in users" @click="selectUser(user.TrainerId)" style="cursor:pointer;" class="ms-chat-user-container ms-open-chat ms-deletable p-3 media clearfix">
                 <a class="d-flex w-100">
                  <span class="ms-chat-status ms-status-away ms-has-new-msg ms-chat-img mr-3 align-self-center">
                    <span class="msg-count">3</span>
                    <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
                  </span>
                  <span class="media-body ms-chat-user-info mt-1">
                    <h6>@{{user.FullnameEn}}</h6> <span class="ms-chat-time">2 Hours ago</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu turpis. Nunc</p>
                    <a href="#" class="ms-hoverable-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                   
                  </span>
                 </a>
                </li>
               
              </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="groups-2">
              <ul class="ms-scrollable">
                <li class="ms-chat-user-container ms-open-chat p-3 media clearfix">
                  <div class="ms-chat-img mr-3 align-self-center">
                    <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
                  </div>
                  <div class="media-body ms-chat-user-info mt-1">
                    <h6>John Doe</h6> <a href="#" class="ms-chat-time"> <i class="flaticon-chat"></i> </a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu turpis. Nunc</p>
                    <ul class="ms-group-members clearfix mt-3 mb-0">
                      <li> <img src="https://via.placeholder.com/270x270" alt="member"> </li>
                      <li> <img src="https://via.placeholder.com/270x270" alt="member"> </li>
                      <li> <img src="https://via.placeholder.com/270x270" alt="member"> </li>
                      <li class="ms-group-count"> + 12 more </li>
                    </ul>
                  </div>
                </li>
                <li class="ms-chat-user-container ms-open-chat p-3 media clearfix">
                  <div class="ms-chat-img mr-3 align-self-center">
                    <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
                  </div>
                  <div class="media-body ms-chat-user-info mt-1">
                    <h6>John Doe</h6> <a href="#" class="ms-chat-time"> <i class="flaticon-chat"></i> </a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu turpis. Nunc</p>
                    <ul class="ms-group-members clearfix mt-3 mb-0">
                      <li> <img src="https://via.placeholder.com/270x270" alt="member"> </li>
                      <li> <img src="https://via.placeholder.com/270x270" alt="member"> </li>
                    </ul>
                  </div>
                </li>
                <li class="ms-chat-user-container ms-open-chat p-3 media clearfix">
                  <div class="ms-chat-img mr-3 align-self-center">
                    <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
                  </div>
                  <div class="media-body ms-chat-user-info mt-1">
                    <h6>John Doe</h6> <a href="#" class="ms-chat-time"> <i class="flaticon-chat"></i> </a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu turpis. Nunc</p>
                    <ul class="ms-group-members clearfix mt-3 mb-0">
                      <li> <img src="https://via.placeholder.com/270x270" alt="member"> </li>
                      <li> <img src="https://via.placeholder.com/270x270" alt="member"> </li>
                      <li> <img src="https://via.placeholder.com/270x270" alt="member"> </li>
                      <li class="ms-group-count"> + 4 more </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="contacts-2">
              <ul class="ms-scrollable">
                  <li v-for="contact in contacts" @click="selectUser(contact.TrainerId)" style="cursor:pointer;" class="ms-chat-user-container ms-open-chat ms-deletable p-3 media clearfix">
                      <a class="d-flex w-100">
                       <span class="ms-chat-status ms-status-away ms-has-new-msg ms-chat-img mr-3 align-self-center">
                         <span class="msg-count">3</span>
                         <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
                       </span>
                       <span class="media-body ms-chat-user-info mt-1">
                         <h6>@{{contact.FullnameEn}}</h6> <span class="ms-chat-time">2 Hours ago</span>
                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu turpis. Nunc</p>
                         <a href="#" class="ms-hoverable-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         </a>
                        
                       </span>
                      </a>
                     </li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>

<!-- Chat Body -->
<div class="col-xl-8 col-md-12">
  <div class="ms-panel ms-chat-conversations ms-widget">
    <div class="ms-panel-header">
      <div class="ms-chat-header justify-content-between">
        <div class="ms-chat-user-container media clearfix">
          <div class="ms-chat-status ms-status-online ms-chat-img mr-3 align-self-center">
            <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
          </div>
          <div class="media-body ms-chat-user-info mt-1">
            <h6>John Doe</h6>
            <span class="text-disabled fs-12">
              Active Now
            </span>
          </div>
        </div>
        
      </div>
    </div>
    <div class="ms-panel-body ms-scrollable" v-chat-scroll>

    <template v-for="(msg,index) in orderedM">
      <div v-if="msg.User_from == {{session('Id')}}" class="ms-chat-bubble ms-chat-message ms-chat-outgoing media clearfix">
              <div class="ms-chat-status ms-status-online ms-chat-img">
          <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
        </div>
        <div class="media-body">
              <div class="ms-chat-text">
                <p>
                    @{{msg.Message}}
                </p>
              </div>
              <p class="ms-chat-time">10:33 pm</p>
            </div> 
    </div>
    <div v-else class="ms-chat-bubble ms-chat-message media ms-chat-incoming clearfix">
        <div class="ms-chat-status ms-status-online ms-chat-img">
          <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
        </div>
        <div class="media-body">
          <div class="ms-chat-text">
            <p>
                @{{msg.Message}}
            </p>
          </div>
          <p class="ms-chat-time">10:33 pm</p>
        </div>
      </div>
      </template>
    </div>
    <form action="" autocomplete="off" v-on:submit.prevent="prev()">
    <div class="ms-panel-footer pt-0">
      <div class="ms-chat-textbox">
          <ul class="ms-list-flex mb-0">
              <li class="ms-chat-input">
                <input type="hidden" v-model="Receiver">
                <input type="text" v-model="message" @keyup.enter="send()" name="msg" placeholder="Enter Message" value="">
              </li>
            
              <ul class="ms-chat-text-controls ms-list-flex">
                <li class="upload"> 
                    <i class="material-icons">attach_file</i>
                    <input type="file" name="file">
                </li>
                
              </ul>
             
            </ul>
            
          </div>
        </div>
      </form>
  </div>
</div>

</div>
</div>
 @endsection
