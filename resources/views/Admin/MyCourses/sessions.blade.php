@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])

@section('content')

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

              <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>

            <li class="breadcrumb-item active" aria-current="page"><a href="/Admin/Courses/{{$Round->RoundId}}">{{$Course->CourseNameEn}} - {{$Round->GroupNo}}</a></li>

              <li class="breadcrumb-item active" aria-current="page">Sessions</li>

            </ol>

          </nav>

      <div class="row">



        <div class="col-md-12">



          <div class="ms-panel">

            <div class="ms-panel-header">

                <h2>{{$Course->CourseNameEn}} - {{$Round->GroupNo}} </h2>

                <h6>Sessions List </h6>

            </div>

            <div class="ms-panel-body">

              <div class="table-responsive">

                <table id="stdListTable"  class="dattable table table-striped thead-dark  w-100">

                  <thead>

                    <th>#</th>

                    <th class="text-left">Session </th>

                    <th class="text-left"> Material</th>

                    <th class="text-left">Videos </th>

                    <th class="text-left">Quiz</th>

                    <th class="text-left">Task</th>

                    

                  </thead>

                  <tbody>

                    @php

                        $i = 1

                    @endphp

                      @foreach ($Sessions as $Session)
                          
                          <tr >

                          <td>{{$i}} </td>

                          <td>

                              <span data-toggle="tooltip" data-placement="top" title="{{$Session->SessionDate}}">

    

                                Session {{$Session->SessionNumber}}
                        

                              </span>

                            </td>

                        <td>
                        @if($Session->IsCancelled == 1)
                        <i class="fa fa-times"></i> 
                        @else
                        <a href="#" class="btn btn-square btn-outline-success has-icon" data-toggle="modal" data-target="#MaterialModal{{$Session->SessionId}}" >

                          @if ($Session->SessionMaterial !== null || $Session->MaterialText !== null)

                              <i class="fa fa-check"></i> 

                          @else

                              <i class="fa fa-upload"></i> 

                          @endif

                            Upload

                          </a>


                          @if ($Session->SessionMaterial !== null || $Session->MaterialText !== null)
                          {{-- <a href="http://kpi.seniorsteps.net/storage/app/public/{{$Session->SessionMaterial}}" class="btn btn-square btn-outline-success has-icon" >



                              <i class="fa fa-download"></i> 



                            Download Material

                          </a> --}}
                          <a href="" class="btn btn-square btn-outline-success has-icon" data-toggle="modal"

                                  data-target="#viewmaterialModal{{$Session->SessionId}}">

                              <i class="fa fa-eye"></i> View Material

                          </a>
                          @endif
                          @endif
                        </td>

                        <td> 
                        @if($Session->IsCancelled == 1)
                        <i class="fa fa-times"></i> 
                        @else
                        <a href="#" class="btn btn-square btn-outline-info has-icon" data-toggle="modal" data-target="#VideoModal{{$Session->SessionId}}" >

                          @if ($Session->SessionVideo !== null || $Session->VideoText !== null)

                          <i class="fa fa-check"></i> 

                      @else

                          <i class="fa fa-upload"></i> 

                      @endif Upload


                          </a>

                          @if ($Session->VideoText !== null)
                          <a href="{{$Session->VideoText}}" target="_blank" class="btn btn-square btn-outline-dark has-icon" >



                              <i class="fa fa-eye"></i> 



                            Visit session video

                          </a>
                          @endif
@endif

                        </td>

                        <td>
                        @if($Session->IsCancelled == 1)
                        <i class="fa fa-times"></i>

                        @else
                        <a href="#" class="btn btn-square btn-outline-dark has-icon" data-toggle="modal" data-target="#QuizModal{{$Session->SessionId}}" >

                            @if ($Session->SessionQuiz !== null || $Session->QuizText !== null)

                              <i class="fa fa-check"></i> 

                          @else

                              <i class="fa fa-upload"></i> 

                          @endif Upload

                          </a>
                          @if ($Session->SessionQuiz !== null || $Session->QuizText !== null)
                          {{-- <a href="http://kpi.seniorsteps.net/storage/app/public/{{$Session->SessionQuiz}}" class="btn btn-square btn-outline-dark has-icon" >



                              <i class="fa fa-download"></i> 



                            Download Quiz

                          </a> --}}
                          <a href="" class="btn btn-square btn-outline-dark has-icon" data-toggle="modal"

                              data-target="#viewquizModal{{$Session->SessionId}}">

                              <i class="fa fa-eye"></i> View Quiz

                          </a>
                          @endif
                          @endif
                        </td>

                        <td>
                        @if($Session->IsCancelled == 1)
                        <i class="fa fa-times"></i>
                        @else
                        @if($Session->HasTask == 0)
                        @else
                        <a href="#" class="btn btn-square btn-outline-primary has-icon" data-toggle="modal" data-target="#TaskModal{{$Session->SessionId}}" >

                            @if ($Session->SessionTask !== null || $Session->TaskText !== null)

                              <i class="fa fa-check"></i> 

                          @else

                              <i class="fa fa-upload"></i> 

                          @endif Upload

                          </a>
                          @endif
                          @if ($Session->HasTask && ($Session->SessionTask !== null || $Session->TaskText !== null))
                          {{-- <a href='{{url("/storage/app/public/$Session->SessionTask")}}' class="btn btn-square btn-outline-primary has-icon" >



                              <i class="fa fa-download"></i> 



                            Download Task

                          </a> --}}
                          <a href="" class="btn btn-square btn-outline-primary has-icon" data-toggle="modal"

                              data-target="#viewtaskModal{{$Session->SessionId}}">

                              <i class="fa fa-eye"></i> View Task

                          </a>
                          <a href='{{url("/session/task/students/$Session->SessionId")}}' class="btn btn-square btn-outline-primary has-icon" >



                            <i class="fa fa-cog"></i> 



                          Check progress

                        </a>
                        @else
                        @if($Session->HasTask == 0)
                            <a href="{{url("/Admin/$Session->SessionId/SetTask")}}" class="btn btn-square btn-outline-primary has-icon" >

                           
                            <i class="fa fa-check"></i>
                            Undo Cancel Task

                          </a>
                          @endif
                          @endif
                          @endif
                        </td>

                      </tr>

                      @php

                          $i++

                      @endphp

                      @endforeach

                    </tbody>

                </table>  

              </div>

            </div>

          </div>

        

        </div>



      </div>

    </div>



  </main>



  @foreach ($Sessions as $SessionModal)

      <!-- Material Modal -->

<div class="modal fade" id="MaterialModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="MaterialModal">

      <div class="modal-dialog modal-dialog-centered " role="document">

        <div class="modal-content">

  

          <div class="modal-body">

              <form action="/Admin/Session/ContentUpload" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                <input type="hidden" name="SessionId" class="form-control" value="{{$SessionModal->SessionId}}" />

                <input type="hidden" name="SessionRole" class="form-control" value="Material" />

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

              <div class="ms-auth-container row no-gutters">

                  <div class="col-12 p-5">
{{-- 
                        <div class="input-group mb-3">

                            <div class="custom-file">

                      <input type="file" name="MaterialFile" value="{{$SessionModal->SessionMaterial}}" id="inputGroupFile0{{$SessionModal->SessionId}} student_img" class="custom-file-input">

                      <input type="file" />

                                <label class="custom-file-label" for="inputGroupFile0{{$SessionModal->SessionId}}">Choose file</label>

                            </div>

                        </div> --}}
                      <label for="note">Material Link</label>
                      <input type="text" name="material_link" class="form-control" placeholder="Enter material link">

                      <label for="note">Note</label>

                      <div class="input-group">

                          <textarea name="MaterialText" id="note" class="form-control" rows="10" placeholder="write note"></textarea>

                         

                      </div>

                      <div class="input-group text-center">

                          <input type="submit" value="upload" class="btn btn-success m-auto">                       

                      </div>

                  </div>

                </div>

              </form>

            </div>

  

          </div>

        </div>

      </div>

      <!-- Material Modal -->

    <div class="modal fade" id="VideoModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="MaterialModal">

        <div class="modal-dialog modal-dialog-centered " role="document">

          <div class="modal-content">

    

            <div class="modal-body">

                <form action="/Admin/Session/ContentUpload" method="POST" enctype="multipart/form-data">

                  {{ csrf_field() }}

                    <input type="hidden" name="SessionId" class="form-control" value="{{$SessionModal->SessionId}}" />

                    <input type="hidden" name="SessionRole" class="form-control" value="Video" />

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <div class="ms-auth-container row no-gutters">

                      <div class="col-12 p-5">

                            {{-- <div class="input-group">

                              <div class="input-group-prepend">

                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>

                              </div>

                              <div class="custom-file">

                                <input type="file" name="VideoFile" class="custom-file-input" id="inputGroupFile01"

                                  aria-describedby="inputGroupFileAddon01">

                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>

                              </div>

                            </div> --}}

                          <label for="note">Session URL</label>

                          <div class="input-group">

                              <textarea name="VideoText" id="note" class="form-control" rows="10" placeholder="write note"></textarea>

                             

                          </div>

                          <div class="input-group text-center">

                              <input type="submit" value="upload" class="btn btn-success m-auto">                       

                          </div>

                      </div>

                    </div>

                </form>

              </div>

    

            </div>

          </div>

        </div>

        <!-- Material Modal -->

      <div class="modal fade" id="QuizModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="MaterialModal">

        <div class="modal-dialog modal-dialog-centered " role="document">

          <div class="modal-content">

    

            <div class="modal-body">

                <form action="/Admin/Session/ContentUpload" method="POST" enctype="multipart/form-data">

                  {{ csrf_field() }}

                    <input type="hidden" name="SessionId" class="form-control" value="{{$SessionModal->SessionId}}" />

                    <input type="hidden" name="SessionRole" class="form-control" value="Quiz" />

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <div class="ms-auth-container row no-gutters">

                      <div class="col-12 p-5">
                                            <label for="note">Quiz Link</label>
                <input type="text" name="quiz_link" class="form-control" placeholder="Enter quiz link">

                            <label for="note">Note</label>

                          <div class="input-group">

                              <textarea name="QuizText" id="note" class="form-control" rows="10" placeholder="write note"></textarea>

                             

                          </div>

                          <div class="input-group text-center">

                              <input type="submit" value="upload" class="btn btn-success m-auto">                       

                          </div>

                      </div>

                    </div>

                </form>

              </div>

    

            </div>

          </div>

        </div>

        <!-- Material Modal -->

      <div class="modal fade" id="TaskModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="MaterialModal">

        <div class="modal-dialog modal-dialog-centered " role="document">

          <div class="modal-content">

    

            <div class="modal-body">

                <form action="/Admin/Session/ContentUpload" method="POST" enctype="multipart/form-data">

                  {{ csrf_field() }}

                    <input type="hidden" name="SessionId" class="form-control" value="{{$SessionModal->SessionId}}" />

                    <input type="hidden" name="SessionRole" class="form-control" value="Task" />

    

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <div class="ms-auth-container row no-gutters">

                      <div class="col-12 p-5">
                        
              <label for="note">Task Link<br/><span class="text-info"> (<i class="fab fa-google-drive"></i> Google Drive - <i class="fab fa-github"></i> Github)</span></label>
              <input type="text" name="task_link" class="form-control" placeholder="Enter task link">
                        <br/>
              <label for="note">Task Deadline</label>
              <input type="datetime-local" name="TaskDeadline" class="form-control" placeholder="Enter task deadline">
                      <br/>

                          <label for="note">Note</label>

                          <div class="input-group">

                              <textarea name="TaskText" id="note" class="form-control" rows="10" placeholder="write note"></textarea>

                             

                          </div>

                          <div class="input-group text-center">

                              <input type="submit" value="upload" class="btn btn-success m-auto">                       
                              <a href="{{url("/Admin/$SessionModal->SessionId/IgnoreTast")}}" class="btn btn-primary m-auto">Cancel Task</a>
                          </div>

                      </div>

                    </div>

                </form>

              </div>

    

            </div>

          </div>

        </div>

        
<div class="modal fade" id="viewtaskModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="MaterialModal">

<div class="modal-dialog modal-dialog-centered " role="document">

<div class="modal-content">



<div class="modal-body">


      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <div class="ms-auth-container row no-gutters">

           <div class="col-12 p-5">
              <div class="text-center">
                <a href="{{$SessionModal->SessionTask}}" target="_blank" class="btn btn-primary">View Task</a>
              </div>
              <div>
                <label for="note">Task Deadline</label>
                <input type="text" name="TaskDeadline" class="form-control" placeholder="Enter task deadline" value="{{date_format(date_create($SessionModal->TaskDeadline),'d M, Y, H:i:s')}}" disabled> 
              </div>
              <br/>
              <label for="note" class="mb-0">Task Notes</label>
              <div class="input-group mt-0">
                  <textarea name="notes" id="note" disabled class="form-control mt-3 text-left" rows="10" placeholder="write note">
                    {{$SessionModal->TaskText}}
                  </textarea>
                </div>
            </div>

        </div>


  </div>



</div>

</div>

</div>


<div class="modal fade" id="viewmaterialModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="MaterialModal">

<div class="modal-dialog modal-dialog-centered " role="document">

<div class="modal-content">



<div class="modal-body">




      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <div class="ms-auth-container row no-gutters">

           <div class="col-12 p-5">
              <div class="text-center">
                <a href="{{$SessionModal->SessionMaterial}}" target="_blank" class="btn btn-primary">View Material</a>
              </div>
              <div class="input-group">

                  <textarea name="notes" id="note" disabled class="form-control mt-3 text-left" rows="10" placeholder="write note">
                    {{$SessionModal->MaterialText}}
                  </textarea>



                </div>
            </div>

        </div>


  </div>



</div>

</div>

</div>

<div class="modal fade" id="viewquizModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="MaterialModal">

<div class="modal-dialog modal-dialog-centered " role="document">

<div class="modal-content">



<div class="modal-body">


      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <div class="ms-auth-container row no-gutters">

           <div class="col-12 p-5">
              <div class="text-center">
                <a href="{{$SessionModal->SessionQuiz}}" target="_blank" class="btn btn-primary">View Quiz</a>
              </div>
              <div class="input-group">

                  <textarea name="notes" id="note" disabled class="form-control mt-3 text-left" rows="10" placeholder="write note">
                    {{$SessionModal->QuizText}}
                  </textarea>



                </div>
            </div>

        </div>


  </div>



</div>

</div>

</div>


  @endforeach

    





@endsection