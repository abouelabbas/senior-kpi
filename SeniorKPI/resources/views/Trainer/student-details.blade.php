@extends('Layouts/trainerkpi',['TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds])
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/Trainer"><i class="material-icons">home</i> Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="/Trainer/Courses/{{$RoundId}}">My Course</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="/Trainer/Course/{{$RoundId}}/Students">Students</a></li>
      <li class="breadcrumb-item active" aria-current="page">Students Details </li>
    </ol>
  </nav>
  <div class="ms-panel">
    <div class="ms-panel-body">
        <div class="row">

            <div class="col-md-6">



              <div class="">
                <div class="ms-panel-header">
                  <h6>Attendence</h6>
                </div>
                <div class="ms-panel-body">
                  <div class="table-responsive">
                    <table id="StudentTable" class="dattable table table-striped thead-dark  w-100">
                      <thead>
                        <th>#</th>
                        <th>Session No</th>

                        <th>Attendence</th>
                      </thead>
                      <tbody>
                        @php
                            $i = 1
                        @endphp
                      @foreach ($Attendance as $Session)
                          <tr>
                          <td>{{$i}}</td>
                          <td>Session {{$Session->SessionNumber}}</td>


                          <td>
                            @if ($Session->IsAttend == 1)
                                <i class="fas fa-check    "></i>
                            <span> Attended </span>
                            @elseif($Session->IsAttend == 0)
                                <i class="fas fa-times    "></i>
                            <span> Absent </span>
                            @else
                            Not set
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
            <div class="col-md-6">
                    <div class="">
                            <div class="ms-panel-header">
                              <h6>Attendence KPI</h6>
                            </div>
                            <div class="ms-panel-body">
                                <div class="row no-gutters">
                                        <div>


                                          <ul>
                                            <li><i class="fas fa-circle    "></i>  Total sessions = {{$Count}} </li>
                                            <li><i class="fas fa-circle    "></i> Total sessions run = {{$IsAttend}} </li>
                                            <li><i class="fas fa-circle    "></i> Total sessions absent = {{$NotAttend}} </li>
                                          </ul>


                                        </div>
                                        <div class="w-100 d-flex justify-content-center">
                                                <div class="progress-rounded progress-round-tiny">
                                                  <div class="progress-value">
                                                    @if ($Count !== 0)
                                                        {{number_format(($IsAttend/$Count)*100,1)}}
                                                    @else
                                                        0
                                                    @endif
                                                    %</div>
                                                    <svg>
                                                      <circle class="progress-cicle bg-success"
                                                      cx="65"
                                                      cy="65"
                                                      r="57"
                                                      stroke-width="4"
                                                      fill="none"
                                                      aria-valuenow="
                                                      @if ($Count !== 0)
                                                          {{number_format(($IsAttend/$Count)*100,0)}}
                                                      @else
                                                          0
                                                      @endif
                                                      "
                                                      aria-orientation="vertical"
                                                      aria-valuemin="0"
                                                      aria-valuemax="100"
                                                      role="slider">
                                                    </circle>
                                                  </svg>
                                                </div>
                                              </div>
                                </div>
                            </div>
                          </div>
            </div>
          </div>
    </div>
  </div>
  <div class="row">

   <div class="col-md-12">
      <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>ُQuiz and Exams</h6>
          </div>
          <div class="ms-panel-body">
              <div class="row">
                  <div class="col-md-6">
                      <div class="d-flex justify-content-end">
                          <input type="reset" value="undo" class="btn btn-warning mb-2 mx-1 mt-0">

                          <input type="submit" value="Save" id="save" class="btn btn-success mb-2 mt-0">
                      </div>
                      <div class="table-responsive">
                          <table class="dattable table table-striped thead-dark  w-100" id="grades">
                            <thead>
                              <th>#</th>
                              <th>Session No</th>
                              <th>Quiz Grade<br>100%</th>
                              <th>Task Grade<br>100%</th>
                              <th>Download Task</th>


                            </thead>
                            <tbody>
                              @php
                                  $i = 1
                              @endphp
                                @foreach ($Grades as $Grade)
                                <tr>
                                <td>{{$i}}</td>
                                                   <form action="">
                                                     <td>
                                                       <span data-toggle="tooltip" data-placement="top" title="14/10/2019">

                                                         Session {{$Grade->SessionNumber}}
                                                       </span>
                                                     </td>

                                                     <td>

                                                     <input type="text" value="{{$Grade->QuizGrade}}" name="quiz1-grade" data-id="{{$Grade->TaskId}}" placeholder="10%" class="quiz form-control">
                                                     </td>
                                                     <td>
                                                     <input type="text" value="{{$Grade->TaskGrade}}" name="task1-grade" data-status="update" data-grade="{{$Grade->GradeId}}" placeholder="10%" class="task form-control">
                                                     </td>
                                                     <td>
                                                     <a href="{{ asset("/storage/$Grade->TaskURL") }}" Download class="ms-btn-icon-outline btn-info">
                                                             <i class="fa fa-download"></i>
                                                           </a>
                                                     </td>

                                                   </form>
                                                 </tr>
                                                 @php
                                                     $i++
                                                 @endphp
                           @endforeach


                            </tbody>
                          </table>
                        </div>

                  </div>
                  <div class="col-md-6">
                      <div class="d-flex justify-content-end">
                          <input type="reset" value="undo" class="btn btn-warning mb-2 mx-1 mt-0">
                          <input type="submit" value="Save" id="saveExam" class="btn btn-success mb-2 mt-0">
                      </div>
                      <div class="table-responsive">
                          <table class="dattable table table-striped thead-dark  w-100" id="Exams">
                            <thead>
                              <th>#</th>
                              <th>Exam Name</th>
                              <th>Exam Grade<br>100% </th>
                              <th>Evaluation </th>


                            </thead>
                            <tbody>
                              @php
                                  $i = 1
                              @endphp
        @foreach ($ExamGrades as $ExamGrade)
            <tr>
                                <form action="">
                                <td>{{$i}}</td>
                                  <td>
                                  <span data-toggle="tooltip" data-placement="top" title="14/10/2019">

                                      {{$ExamGrade->ExamNameEn}}
                                    </span>
                                  </td>
                                  <td>
                                    <input type="hidden" class="gradeid" value="{{$ExamGrade->ExamGradesId}}">
                                  <input type="text" data-exam="{{$ExamGrade->ExamGradesId}}" value="{{$ExamGrade->Grade}}" name="quiz1-grade"  placeholder="10%" class="form-control grade-value">
                                  </td>
                                  <td>
                                    <ul class='stars'>
                                      <li class="star
                                      @if ($ExamGrade->Evaluation == 1 || $ExamGrade->Evaluation == 2 || $ExamGrade->Evaluation == 3 ||$ExamGrade->Evaluation == 4 ||$ExamGrade->Evaluation == 5)
                                          selected
                                      @endif
                                      @if ($ExamGrade->Evaluation == 1 )
                                          value
                                      @endif
                                       " title='Poor' data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($ExamGrade->Evaluation == 2 || $ExamGrade->Evaluation == 3 ||$ExamGrade->Evaluation == 4 ||$ExamGrade->Evaluation == 5)
                                          selected
                                      @endif
                                      @if ($ExamGrade->Evaluation == 2 )
                                          value
                                      @endif
                                      ' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($ExamGrade->Evaluation == 3 ||$ExamGrade->Evaluation == 4 ||$ExamGrade->Evaluation == 5)
                                          selected
                                      @endif
                                      @if ($ExamGrade->Evaluation == 3 )
                                          value
                                      @endif
                                      ' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($ExamGrade->Evaluation == 4 ||$ExamGrade->Evaluation == 5)
                                          selected
                                      @endif
                                      @if ($ExamGrade->Evaluation == 4 )
                                          value
                                      @endif
                                      ' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($ExamGrade->Evaluation == 5)
                                          selected
                                      @endif
                                      @if ($ExamGrade->Evaluation == 5 )
                                          value
                                      @endif
                                      ' title='WOW!!!' data-value='5'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                    </ul>
                                  </td>



                                </form>

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
  </div>
  <div class="row">
      <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header d-flex py-2 align-items-center justify-content-between">
                <h6>Tracks evaluations</h6>
                <div>
                    <input type="reset" value="undo" class="btn btn-warning  mx-1 mt-0">

                    <input type="submit" id="saveStudentEval" class="btn btn-success" value="save">
                </div>
              </div>

          <div class="ms-panel-body">
            <div class="table-responsive">
              <table id="studenteval" class="dattable table table-striped thead-dark  w-100">
                <thead>
                  <th>#</th>
                  <th>Track</th>
                  <th>Time Respect<br>10%</th>
                  <th>Lecture Practice<br>10%</th>
                  <th>Solve Home Tasks<br>10%</th>
                  <th>Student Interaction<br>10%</th>
                  <th>Student Attitude<br>10%</th>
                  <th>Student Focus<br>10%</th>
                  <th>Understand Speed<br>10%</th>
                  <th>Extra Marks<br>10%</th>
                  <th>Overall<br>10%</th>
                  <th>Total</th>
                  <th>Notes</th>
                </thead>
                <tbody>
                  @php
                      $i = 1
                  @endphp
                  @foreach ($StudentEvaluations as $Evaluation)
<tr>
<td>{{$i}}</td>
                        <td>
                            <span data-toggle="tooltip" data-placement="top" title="14/10/2019">

                              {{$Evaluation->ContentNameEn}}
                            </span>
                          </td>
                          <td><input type="text" value="{{$Evaluation->TimeRespect}}" data-eval="{{$Evaluation->StudentEvaluationId}}" class="TimeRespect form-control" placeholder="Eval/100"></td>
                          <td><input type="text" value="{{$Evaluation->Lecture_Practice}}" class="LecturePractise form-control" placeholder="Eval/100"></td>
                          <td><input type="text" value="{{$Evaluation->Solve_Home_Tasks}}" class="SolveHomeTasks form-control" placeholder="Eval/100"></td>
                          <td><input type="text" value="{{$Evaluation->Student_Interaction}}" class="StudentInteractions form-control" placeholder="Eval/100"></td>
                          <td><input type="text" value="{{$Evaluation->Student_Attitude}}" class="StudentAttitude form-control" placeholder="Eval/100"></td>
                          <td><input type="text" value="{{$Evaluation->Student_Focus}}" class="StudentFocus form-control" placeholder="Eval/100"></td>
                          <td><input type="text" value="{{$Evaluation->Understand_Speed}}" class="UnderstandSpeed form-control" placeholder="Eval/100"></td>
                          <td><input type="text" value="{{$Evaluation->Exam_Marks}}" class="ExtraMarks form-control" placeholder="Eval/100"></td>
                          <td><input type="text" value="{{$Evaluation->Overall}}" class="Overall form-control" placeholder="100%"></td>
                          <?php $total = (($Evaluation->TimeRespect + $Evaluation->Lecture_Practice + $Evaluation->Solve_Home_Tasks + $Evaluation->Student_Interaction + $Evaluation->Student_Attitude + $Evaluation->Student_Focus + $Evaluation->Understand_Speed + $Evaluation->Exam_Marks + $Evaluation->Overall)/900)*100?>
                          <td>
                              <div
                              class="progress-circle"
                          data-value="0.{{number_format($total,0)}}"
                              data-size="50"
                              data-thickness="3"
                              data-animation-start-value="1.0"
                              data-fill="{
                                &quot;color&quot;: &quot;green&quot;
                              }"
                              data-reverse="true">
                              <div class="percent">
                              {{number_format($total,0)}}%
                              </div>
                            </div>
                          </td>
                          <td>
                          <textarea name=""  placeholder="note" cols="3" class="form-control notes">{{$Evaluation->Notes}}</textarea>
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
<!-- note Modal -->
<div class="modal fade" id="NoteModal" tabindex="-1" role="dialog" aria-labelledby="NoteModal">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="ms-auth-container row no-gutters">
              <div class="col-12 p-5">
                  <form action="">

                  <label for="note">Note</label>
                  <div class="input-group">
                     <textarea class="form-control" rows="5" placeholder="Write your note"></textarea>
                  </div>
                  <div class="input-group text-center">
                      <input type="submit" value="Add" class="btn btn-primary m-auto">
                  </div>
                  </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
<!-- Task Modal -->
<div class="modal fade" id="DoneTopics" tabindex="-1" role="dialog" aria-labelledby="DoneTopics">
<div class="modal-dialog modal-dialog-centered " role="document">
  <div class="modal-content">
    <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
          aria-hidden="true">&times;</span></button>
      <div class="ms-auth-container row no-gutters">
        <div class="col-12 p-5">
          <form action="">
            <div class="row">
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="" checked="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span>   HTML </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="" checked="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> CSS </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="" checked="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> CSS3 </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> JavaScript </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> Jquery </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> Jquery </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> Jquery </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> Jquery </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> Jquery </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> Jquery </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> Jquery </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> Jquery </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> Jquery </span>
              </div>
              <div class="col-md-6 my-2">
                <label class="ms-checkbox-wrap ms-checkbox-success">
                  <input type="checkbox" value="">
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> Jquery </span>
              </div>

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
@endsection