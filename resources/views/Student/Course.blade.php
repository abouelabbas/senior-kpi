@extends('Layouts/studentkpi',['StudentRounds'=>$StudentRounds])

@section('content')

      <nav aria-label="breadcrumb">

        <ol class="breadcrumb">

          <li class="breadcrumb-item"><a href="/Student"><i class="material-icons">home</i> Home</a></li>

          <li class="breadcrumb-item active" aria-current="page">Course Content</li>

        </ol>

      </nav>

      <div class="row">



        <div class="col-md-12">



          <div class="ms-panel">

            <div class="ms-panel-body">

              <div class="accordion has-gap ms-accordion-chevron" id="accordionExample2">

                <div class="card">

                  <div class="card-header collapsed" data-toggle="collapse" role="button" data-target="#collapseFour"

                    aria-expanded="false" aria-controls="collapseFour">

                    <span> Course info </span>

                  </div>



                  <div id="collapseFour" class="collapse" data-parent="#accordionExample2" style="">

                    <div class="card-body table-responsive">

                      <table class="table table-striped thead-dark  w-100">

                        <thead>

                          <tr>

                            <th>Course Name</th>

                            <th>Hours</th>

                            <th>Instructor</th>

                            <th>Barnch</th>

                            <th>Time</th>

                          </tr>

                        </thead>

                        <tbody>

                          <tr>

                            <th>{{$Round->CourseNameEn}}</th>

                            <th>{{$Round->Duration}}</th>

                            <th>{{$Round->FullnameEn}}</th>

                            <th>{{$Round->BranchNameEn}}</th>

                            <th>

                            @foreach ($RoundDays as $RoundDay)

                                {{$RoundDay->DayNameEn}} {{ Carbon\Carbon::parse($RoundDay->From)->format('H:i') }} - {{ Carbon\Carbon::parse($RoundDay->To)->format('H:i') }} <br>

                            @endforeach

                          </th>

                            

                          </tr>

                        </tbody>

                      </table>

                    </div>

                  </div>

                </div>



              </div>

            </div>

          </div>



          <div class="ms-panel">

            <div class="ms-panel-header">

              <h6>Course Content </h6>
              <div class="alert alert-info mt-3" role="alert">
                <b> New Update! </b> Tasks may have deadline feature now, check the task deadline from the <i>"Trainer Task"</i>Window in each session. After deadline date you will not be able to upload your solution.
              </div>

            </div>

            <div class="ms-panel-body">

              <div class="table-responsive">

                <table class="dattable table table-striped thead-dark  w-100">

                  <thead>

                  <th>#</th>

                    <th>Session No</th>

                    <th>Materials </th>

                    <th>Videos</th>

                    <th>Quizes</th>

                    <th>Tasks</th>

                  </thead>

                  <tbody>

                    @php

                        $i = 1

                    @endphp

@foreach ($Sessions as $Session)

    <tr>

    <td>{{$i}}</td>

                      <td>

                      <span data-toggle="tooltip" data-placement="top" title="{{$Session->SessionDate}}">



                          Session {{$Session->SessionNumber}}

                        </span>

                      </td>

                      <td>

                          {{-- {{asset("Storage/$Session->SessionMaterial")}} --}}

                      <span data-toggle="tooltip" data-placement="top" title="View">

                      <a href="/storage/{{$Session->SessionMaterial}}" data-toggle="modal"

                          data-target="#MaterialModal{{$Session->SessionId}}" class="@if ($Session->SessionMaterial === null && $Session->MaterialText === null)disabled

                        @endif

                          btn btn-square btn-outline-info has-icon" >

                               <i class="fa fa-eye"></i> Material

                            </a>

                      </span>

                      </td>

                      <td>

                      <a href="{{$Session->VideoText}}" target="_blank" class="@if ($Session->SessionVideo === null && $Session->VideoText === null)disabled

                        @endif btn btn-square btn-outline-info has-icon" data-toggle="tooltip"

                          data-placement="top" title="View">

                          <i class="fa fa-eye"></i> View

                        </a>

                      </td>

                      <td>

                        <a href="#" class="@if ($Session->SessionQuiz === null && $Session->QuizText === null)disabled

                          @endif btn btn-square btn-outline-warning has-icon" data-toggle="modal"

                      data-target="#quizModal{{$Session->SessionId}}">

                          <i class="fa fa-eye"></i> View

                        </a>

                      </td>

                      <td 
                      @if($Session->IsCancelled == 1)
                      class="bg-danger text-white"
                      @endif
                      >
                        @if($Session->IsCancelled == 0)
                      @if($Session->HasTask)
                      
                        <a href="#" class="@if ($Session->SessionTask === null && $Session->TaskText === null)disabled

                          @endif btn btn-square btn-outline-info has-icon" data-toggle="modal"

                      data-target="#taskModal{{$Session->SessionId}}">

                          <i class="fa fa-eye"></i> Trainer task

                        </a>
                      @if($Session->TaskDeadline >= now() 
                      || $Session->TaskDeadline === null 
                      || (
                        $Session->SecondaryDeadline >= now() 
                        && $Session->SecondaryDeadline !== null
                        ))
                      
                        <a href="#" class="btn btn-square btn-outline-info has-icon" data-toggle="modal"

                      data-target="#uploadtaskModal{{$Session->SessionId}}">

                          <i class="fa fa-upload"></i> Upload solution

                        </a>
                      @endif
                        {{-- {{url("/storage/app/public/$Session->TaskURL")}} --}}
                    <a href="{{$Session->TaskURL}}" class="btn btn-square btn-outline-info has-icon" data-toggle="modal"

                      data-target="#viewtaskModal{{$Session->SessionId}}">

                  <i class="fa fa-eye"></i> View My Solution

                  </a>
                  @else
                  <i class="fa fa-times"></i> No Task Assigned for this session
                  @endif
              @else
                  <i class="fa fa-times"></i> Cancelled Session

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

          <div class="ms-panel">

            <div class="ms-panel-header">

              <h6>Done Topics </h6>

            </div>

            <div class="ms-panel-body">

              <div class="accordion has-gap ms-accordion-chevron" id="accordionExample4">

            @foreach ($RoundContent as $Content)

                                <div class="card">

                  <div class="card-header" data-toggle="collapse" role="button" data-target="#content{{$Content->RoundContentId}}" aria-expanded="false"

                    aria-controls="collapseTen">

                    <span class="has-icon">

                      <i class="fas fa-code"></i> {{$Content->ContentNameEn}}

                    </span>

                  </div>



                <div id="content{{$Content->RoundContentId}}" class="collapse" data-parent="#accordionExample4">

                    <div class="card-body">





                      <div class="table-responsive">

                        <table class="dattable table table-striped thead-warning  w-100">

                          <thead>

                            <th>#</th>

                            <th>Point</th>

                            <th>Example </th>

                            <th>Task</th>

                          </thead>

                          <tbody>

                            @php

                                $i = 1

                            @endphp

                            @foreach ($SubContents as $SubContent)

                            @if ($Content->RoundContentId == $SubContent->RoundContentId)

                                <tr>

                                  <td>{{$i}}</td>

                                  <td>

                                    @if ($SubContent->PointDone == 1)

                                    <i class="fas fa-check"></i> 

                                    @else

                                    <i class="fas fa-spinner"></i> 

                                    @endif

                                    <span>{{$SubContent->SubContentNameEn }}</span></td>

                                    <td>

                                    @if ($SubContent->DoneExample == 1)

                                    <i class="fas fa-check"></i> 

                                    @else

                                    <i class="fas fa-spinner"></i> 

                                    @endif

                                   <span>{{$SubContent->Example}}</span></td>

                                   <td>

                                   @if ($SubContent->DoneTask == 1)

                                    <i class="fas fa-check"></i> 

                                    @else

                                    <i class="fas fa-spinner"></i> 

                                    @endif  

                                    <span>{{$SubContent->Task}}</span> </td>

                                </tr>

                                @php

                                    $i++

                                @endphp

                            @endif

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

  

@foreach ($Sessions as $SessionModal)

    

  <!-- Quiz Modal -->

    <div class="modal fade" id="quizModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="quizModal">

    <div class="modal-dialog modal-dialog-centered modal-auth" role="document">

      <div class="modal-content">



        <div class="modal-body">



          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

              aria-hidden="true">&times;</span></button>

          <div class="ms-auth-container row no-gutters">

            <div class="col-md-4">

              <div class="ms-auth-bg">

                <h1 class="text-white">Quiz Session {{$SessionModal->SessionNumber}}</h1>

              </div>

            </div>

            <div class="col-md-8">

              <div class="ms-auth-form">

                <div class="col-8">

                    @if ($SessionModal->QuizText)

                    <p>{{$SessionModal->QuizText}}</p> 

                    @else 

                    No Quiz information is sent

                @endif

                <br>

                    @if ($SessionModal->SessionQuiz)

                    <a href="{{$SessionModal->SessionQuiz}}" target="_blank" class="btn btn-dark" data-toggle="tooltip" data-placement="top"

                        title="Open Task Link">

                        Quiz Link

                      </a>

                    @else

                    No Quiz attachement is sent

                    @endif

                   

                </div>

              </div>

            </div>

          </div>

        </div>



      </div>

    </div>

  </div>





  <!-- Task Modal -->

<div class="modal fade" id="taskModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="taskModal">

    <div class="modal-dialog modal-dialog-centered modal-auth" role="document">

      <div class="modal-content">



        <div class="modal-body">



          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

              aria-hidden="true">&times;</span></button>

          <div class="ms-auth-container row no-gutters">

            <div class="col-md-4">

              <div class="ms-auth-bg">

                <h1 class="text-white">Task Session {{$SessionModal->SessionNumber}}</h1>

              </div>

            </div>

            <div class="col-md-8">

              <div class="ms-auth-form">

                <div class="col-8">

                  @if ($SessionModal->TaskText)
                      <p>Task Notes:</p>
                      <p class="border border-1 p-3">{{$SessionModal->TaskText}}</p> 

                      @else 

                      No Tasks information is sent

                  @endif

                  <br>

                      @if ($SessionModal->SessionTask)
                      <div class="badge badge-pill badge-warning">Task Deadline</div> : 
                      {{date_format(date_create($SessionModal->TaskDeadline), "d M, Y,  H:i:s")}}
                      <br>
                      <a href="{{$SessionModal->SessionTask}}" target="_blank" class="btn btn-dark" data-toggle="tooltip" data-placement="top"

                        title="Open Task Link">

                        Task Link

                      </a>

                      @else

                      No task attachement is sent

                      @endif

                     

                  

                </div>

              </div>

            </div>

          </div>

        </div>



      </div>

    </div>

  </div>

   <!-- Task Modal -->

<div class="modal fade" id="MaterialModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="taskModal">

    <div class="modal-dialog modal-dialog-centered modal-auth" role="document">

      <div class="modal-content">



        <div class="modal-body">



          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

              aria-hidden="true">&times;</span></button>

          <div class="ms-auth-container row no-gutters">

            <div class="col-md-4">

              <div class="ms-auth-bg">

                <h1 class="text-white">Material of Session {{$SessionModal->SessionNumber}}</h1>

              </div>

            </div>

            <div class="col-md-8">

              <div class="ms-auth-form">

                <div class="col-8">

                    @if ($SessionModal->MaterialText)

                    <p>{{$SessionModal->MaterialText}}</p> 

                    @else 

                    No Material information is sent

                @endif

                <br>

                    @if ($SessionModal->SessionMaterial)

                    <a href="{{$SessionModal->SessionMaterial}}" target="_blank" class="btn btn-dark" data-toggle="tooltip" data-placement="top"

                        title="Open Task Link">

                        Material Link

                      </a>
                    @else

                    No Material attachement is sent

                    @endif

                   

                </div>

              </div>

            </div>

          </div>

        </div>



      </div>

    </div>

  </div>



  <!-- Task Modal -->

<div class="modal fade" id="uploadtaskModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="uploadtaskModal">

    <div class="modal-dialog modal-dialog-centered " role="document">

      <div class="modal-content">



        <div class="modal-body">



          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

              aria-hidden="true">&times;</span></button>

          <div class="ms-auth-container row no-gutters">

            <div class="col-12 p-5">

              <form action="/Student/UploadTask" class="form-prog" id="form-prog" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}


                <input  type="hidden" class="session_id" name="session" value="{{$SessionModal->SessionId}}" />

                <input  type="hidden" class="sround_id" name="id" value="{{$StudentRoundId[0]->StudentRoundsId}}" />

                <input  type="hidden" name="round" value="{{$round}}" />
                <label for="note">Task Link<br/><span class="text-info"> (<i class="fab fa-google-drive"></i> Google Drive - <i class="fab fa-github"></i> Github)</span></label>
                <input type="text" name="task_link" class="form-control" placeholder="Enter task link">
  

                <label for="note">Note</label>

                <div class="input-group">

                  <textarea name="notes" id="note" class="form-control" rows="10" placeholder="write note"></textarea>



                </div>

                <div class="input-group text-center">

                  <input type="submit" value="upload" class="btn btn-success m-auto">

                </div>
                {{-- <div class="card">
                  <div class="card-body">
                    <label>Upload precentage : <span id="prog-perc" class="prog-perc-{{$SessionModal->SessionId}}-{{$StudentRoundId[0]->StudentRoundsId}}">0%</span></label>
                <div class="progress">
                  <div class="progress-bar-{{$SessionModal->SessionId}}-{{$StudentRoundId[0]->StudentRoundsId}} bg-primary" id="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                  </div>
                </div> --}}
              </form>

            </div>

          </div>

        </div>



      </div>

    </div>

  </div>

  <div class="modal fade" id="viewtaskModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="uploadtaskModal">

    <div class="modal-dialog modal-dialog-centered " role="document">

      <div class="modal-content">



        <div class="modal-body">



          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

              aria-hidden="true">&times;</span></button>

          <div class="ms-auth-container row no-gutters">

            <div class="col-12 p-5">
              <div class="text-center">
                <a href="{{$SessionModal->TaskURL}}" target="_blank" class="btn btn-primary">View Task</a>
              </div>
              <div class="input-group">

                  <textarea name="notes" id="note" disabled class="form-control mt-3 text-left" rows="10" placeholder="write note">
                    {{$SessionModal->TaskNotes}}
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
@section('scripts')
<script>
  $(document).ready(function(){
// $('.form-prog').submit(function(event){
//   var session = $(this).find(".session_id").val();
//   var sround = $(this).find(".sround_id").val();
//   //event.preventDefault();
// if($(this).find('.uploadFile').val())
// {
//   // event.preventDefault();
//   $(this).ajaxSubmit({
//     // target: '#targetLayer',
//     beforeSubmit:function(){
//       $('.progress-bar-'+session+'-'+sround).width('0%');
//     },
//     uploadProgress: function(event, position, total, percentageComplete)
//     {
//       console.log(percentageComplete);
//       $('.progress-bar-'+session+'-'+sround).width(percentageComplete + '%')

//       // $('.progress-bar').animate({
//       //   width: percentageComplete + '%'
//       // }, {
//       //   duration: 500
//       // });
//       $('.prog-perc-'+session+'-'+sround).html(percentageComplete+ "%");
//     },
//     success:function(){
//       // $('#form-prog').submit();
//     },
//     // resetForm: true
//   });
// }
// });
});
</script>
@endsection