@extends('Layouts/trainerkpi',['TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds])
@section('content')
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Trainer"><i class="material-icons">home</i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/Trainer/Courses/{{$RoundId}}">My Courses</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Done Topics</li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-md-12">

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>Topics </h6>
                        </div>
                        <div class="ms-panel-body">
                            <div class="accordion has-gap ms-accordion-chevron" id="accordionExample4">
                              @foreach ($Topics as $Topic)
                                  <div class="card">
                                    <div class="card-header" data-toggle="collapse" role="button"
                                  data-target="#HTML{{$Topic->RoundContentId}}" aria-expanded="false" aria-controls="collapseTen">
                                        <span class="has-icon"> 
                                            <i class="fas fa-code"></i> {{$Topic->ContentNameEn}} 
                                        </span>
                                    </div>

                                    <div id="HTML{{$Topic->RoundContentId}}" class="collapse" data-parent="#accordionExample4">
                                        <div class="card-body">
                                            <!--  -->
                                            <div class="d-flex justify-content-end">
                                                <a href="#" class="btn btn-dark m-2 has-chevron"data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                                                     Add
                                                </a>
                                               
                                                  <ul class="dropdown-menu">
                                                    <li class="ms-dropdown-list">
                                                      <a class="media p-2" href="#" data-toggle="modal" data-target="#addTopic{{$Topic->RoundContentId}}">
                                                        Topic
                                                      </a>
                                                      <a class="media p-2" href="#" data-toggle="modal" data-target="#addExample{{$Topic->RoundContentId}}">
                                                        Example
                                                      </a>
                                                      <a class="media p-2" href="#" data-toggle="modal" data-target="#addTask{{$Topic->RoundContentId}}">
                                                        Task
                                                      </a>
                                                     
                                                    </li>
                                                  </ul>
                                                <input type="submit" class="btn btn-success my-2" value="Save">
                                            </div>

                                            <div class="table-responsive">
                                                    <table class="dattable table table-striped thead-warning  w-100">
                                                      <thead>
                                                        <th>#</th>
                                                        <th>Point</th>
                                                        <th>Example </th>
                                                        <th>Task</th>
                                                        <th>Edit</th>
                                                      </thead>
                                                      <tbody>
                                                        @php
                                                            $i = 1
                                                        @endphp
                                                        @foreach ($SubTopics as $SubTopic)
                                                        {{-- @if ($SubTopic->RoundContentId == $Topic->RoundContentId) --}}
                                                        <tr>
                                                          <td>{{$i}}</td>
                                                            <td>
                                                              @if ($SubTopic->PointDone == 1)
                                                              <i class="fas fa-check"></i>
                                                              @else
                                                              <i class="fas fa-spinner"></i>
                                                              @endif
                                                              <span>{{$SubTopic->SubContentNameEn}}</span>
                                                            </td>
                                                            <td>
                                                                @if ($SubTopic->DoneExample == 1)
                                                                <i class="fas fa-check"></i> 
                                                                @else
                                                                <i class="fas fa-spinner"></i>
                                                                @endif
                                                              <span>{{$SubTopic->Example}}</span>
                                                            </td>
                                                            <td>
                                                                @if ($SubTopic->DoneTask == 1)
                                                                <i class="fas fa-check"></i> 
                                                                @else
                                                                <i class="fas fa-spinner"></i>
                                                                @endif
                                                              <span>{{$SubTopic->Task}}</span>
                                                            </td>
                                                          <td> <a href="#" data-toggle="modal" data-target="#editTopic{{$SubTopic->RoundSubContentsId}}" class="ms-btn-icon btn-dark"><i class="fas fa-pencil-alt    "></i></a> </td>
   
                                                          </tr>
                                                          @php
                                                              $i++
                                                          @endphp
                                                        {{-- @endif --}}
                                                           
                                                        @endforeach
                                                       
                                                      </tbody>
                                                    </table>
                                                  </div>
                                        </div>
                                    </div>
                                </div>
                              @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </main>

    
  
  @foreach ($Topics as $Topicname)
      <!-- topic Modal -->
  <div class="modal fade" id="addTopic{{$Topicname->RoundContentId}}" tabindex="-1" role="dialog" aria-labelledby="addTopic">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
  
          <div class="modal-body">
  
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="ms-auth-container row no-gutters">
                <div class="col-12 p-5">
                    <form action="/Trainer/DoneTopics/Add/{{$Topicname->RoundId}}" method="POST">
                      {{ csrf_field() }}
                    <label for="note">Topic Name</label>
                    <div class="input-group">
                        <input type="text" name="TrainerSubAgendaName" class="form-control" placeholder="topic name">
                        <input type="hidden" name="RoundId" class="form-control" value="{{$Topicname->RoundId}}" placeholder="topic name">
                        <input type="hidden" name="RoundContentId" class="form-control" value="{{$Topicname->RoundContentId}}" placeholder="topic name">
                        {{-- <input type="hidden" name="TrainerAgendaId" class="form-control" value="{{$Topicname->TrainerAgendaId}}" placeholder="topic name"> --}}
                    </div>
                    <div class="input-group text-center">
                        <input type="submit" value="Add" class="btn btn-success m-auto">                       
                    </div>
                    </form>
                </div>
              </div>
            </div>
  
          </div>
        </div>
      </div>
      
<!-- example Modal -->
<div class="modal fade" id="addExample{{$Topicname->RoundContentId}}" tabindex="-1" role="dialog" aria-labelledby="addExample">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">

      <div class="modal-body">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-5">
                <form action="/Trainer/DoneTopics/Example/{{$Topicname->RoundId}}" method="POST">
                  {{ csrf_field() }}
                <label for="note">Topic Name</label>
                <div class="input-group">
                   <select name="SubContentId" id=""  class="form-control">
                     @foreach ($SubTopics as $sub)
                     @if ($sub->RoundContentId == $Topicname->RoundContentId)
                   <option value="{{$sub->RoundSubContentsId}}">{{$sub->SubContentNameEn}}</option>
                   @endif
                     @endforeach
                   </select>
                </div>
                <label for="note">Example Name</label>
                <div class="input-group">
                   <input type="text" name="Example" class="form-control" placeholder="Example name">
                </div>
                <div class="input-group text-center">
                    <input type="submit" value="Add" class="btn btn-success m-auto">                       
                </div>
                </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

<!-- Task Modal -->
<div class="modal fade" id="addTask{{$Topicname->RoundContentId}}" tabindex="-1" role="dialog" aria-labelledby="addTask">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">

      <div class="modal-body">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-5">
                <form action="/Trainer/DoneTopics/Task/{{$Topicname->RoundId}}" method="POST">
                  {{ csrf_field() }}
                <label for="note">Topic Name</label>
                <div class="input-group">
                   <select name="SubContentId" id=""  class="form-control">
                      @foreach ($SubTopics as $sub2)
                      @if ($sub2->RoundContentId == $Topicname->RoundContentId)
                    <option value="{{$sub2->RoundSubContentsId}}">{{$sub2->SubContentNameEn}}</option>
                    @endif
                      @endforeach
                   </select>
                </div>
                <label for="note">task Name</label>
                <div class="input-group">
                   <input type="text" name="Task" class="form-control" placeholder="task name">
                </div>
                <div class="input-group text-center">
                    <input type="submit" value="Add" class="btn btn-success m-auto">                       
                </div>
                </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  @endforeach
  @foreach ($Topics as $TopicContent)

  @foreach ($SubTopics as $TopicSub)
  <!-- edit topic Modal -->
<div class="modal fade" id="editTopic{{$TopicSub->RoundSubContentsId}}" tabindex="-1" role="dialog" aria-labelledby="editTopic">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
  
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="ms-auth-container row no-gutters">
                <div class="col-12 p-5">
                    <div class="d-flex justify-content-end">
                        <a href="/Trainer/Course/DoneTopics/Delete/{{$TopicSub->RoundSubContentsId}}/{{$TopicContent->RoundId}}" class="btn btn-danger"> <i class="fas fa-trash"></i> </a>
                    </div>
                    <form action="/Trainer/DoneTopics/Edit/{{$Topicname->RoundId}}" method="POST">
                      {{ csrf_field() }}
                      
                      <input type="hidden" name="RoundSubContentsId" value="{{$TopicSub->RoundSubContentsId}}" />
                      {{-- <input type="hidden" name="TrainerSubAgendaId" value="{{$TopicSub->TrainerSubAgendaId}}" /> --}}

                    <label for="note">Topic Name</label>
                    <div class="input-group">
                    <input type="text" name="SubAgendaName" value="{{$TopicSub->SubContentNameEn}}" class="form-control" placeholder="topic name">
                    </div>
                    <label for="note">Topic Done</label>
                    <div class="input-group">
                    <input type="checkbox" name="PointDone"
                    @if ($TopicSub->PointDone == 1)
                    checked 
                    @endif
                    class="form-control" placeholder="topic name">
                    </div>
                    <label for="note">Example Name</label>
                    <div class="input-group">
                    <input type="text" name="Example" class="form-control" value="{{$TopicSub->Example}}" placeholder="example name">
                    </div>
                    <label for="note">Example Done</label>
                    <div class="input-group">
                    <input type="checkbox" name="DoneExample"
                    @if ($TopicSub->DoneExample == 1)
                    checked 
                    @endif
                    class="form-control" placeholder="topic name">
                    </div>
                    <label for="note">Task Name</label>
                    <div class="input-group">
                    <input type="text" name="Task" class="form-control" value="{{$TopicSub->Task}}" placeholder="task name">
                    </div>
                    <label for="note">Task Done</label>
                    <div class="input-group">
                    <input type="checkbox" name="DoneTask"
                    @if ($TopicSub->DoneTask == 1)
                    checked 
                    @endif
                    class="form-control" placeholder="topic name">
                    </div>
                    <div class="input-group text-center">
                        <input type="submit" value="Save" class="btn btn-success m-auto">                       
                    </div>

                    </form>
                </div>
              </div>
            </div>
  
          </div>
        </div>
      </div>    
  @endforeach      
  @endforeach
  


@endsection