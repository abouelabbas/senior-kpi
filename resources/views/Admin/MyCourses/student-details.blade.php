@extends('Layouts.adminkpi', ['ActiveRounds' => $ActiveRounds])

@section('content')
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>

            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ url("/Admin/Courses/$RoundId") }}">{{ $CourseS->CourseNameEn }} - GR{{ $Course->GroupNo }}</a>
            </li>

            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ url("/Admin/Course/$RoundId/Students") }}">Students</a></li>

            <li class="breadcrumb-item active" aria-current="page">{{ $Student->FullnameEn }}</li>

        </ol>

    </nav>



    <div class="ms-panel">

        <div class="ms-panel-body">

            <h2>{{ $Student->FullnameEn }} - {{$Student->Phone}}</h2>

            <h4>{{ $CourseS->CourseNameEn }} - GR{{ $Course->GroupNo }}</h4>
            <hr>
            <p style="margin-bottom:0;">Not in this course ? </p>
            <a href="#" data-toggle="modal" data-target="#cancelModal" class="btn btn-outline-danger">Delete student's
                round registeration</a>
            <hr>

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
                                            
                                            $i = 1;
                                            
                                        @endphp

                                        @foreach ($Attendance as $Session)
                                            <tr
                                                @if ($Session->IsCancelled == 1) style="background-color:#dc3545!important;color:#fff!important;" @endif>

                                                <td>{{ $i }}</td>

                                                <td @if ($Session->IsCancelled == 1) style="color:#fff!important;" @endif>

                                                    <span data-toggle="tooltip" data-placement="top"
                                                        title="{{ date('d-m-Y', strtotime($Session->SessionDate)) }}">
                                                        Session {{ $Session->SessionNumber }}
                                                    </span>
                                                </td>





                                                <td>

                                                    @if ($Session->IsCancelled == 1)
                                                        <span style="color:#fff!important;">
                                                            Cancelled
                                                        </span>
                                                    @elseif ($Session->IsAttend == 1)
                                                        <i class="fas fa-check    "></i>

                                                        <span> Attended </span>
                                                    @elseif($Session->IsAttend == 2)
                                                        <i class="fas fa-check"></i>

                                                        <span> Attended Online </span>
                                                    @elseif($Session->IsAttend == 3)
                                                        <i class="fas fa-minus"></i>

                                                        <span> Pre-join </span>
                                                    @elseif($Session->IsAttend == 4)
                                                        <i class="fas fa-minus"></i>

                                                        <span> Skipped </span>
                                                    @elseif($Session->IsAttend == 0 && $Session->IsAttend !== null)
                                                        <i class="fas fa-times    "></i>

                                                        <span> Absent </span>
                                                    @elseif($Session->IsDone == 0)
                                                        <span> Not set </span>
                                                    @else
                                                        Not set
                                                    @endif



                                                </td>

                                            </tr>

                                            @php
                                                
                                                $i++;
                                                
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

                                        <li><i class="fas fa-circle"></i> Total sessions = {{ $Count }} </li>

                                        <li><i class="fas fa-circle"></i> Total sessions run = {{ $Run }} </li>
                                        <li><i class="fas fa-circle"></i> Total sessions Attended = {{ $IsAttend }}
                                        </li>
                                        <li><i class="fas fa-circle"></i> Total sessions Attended Online =
                                            {{ $IsOnline }} </li>
                                        <li><i class="fas fa-circle"></i> Total sessions Attended Offline =
                                            {{ $IsAttend - $IsOnline }} </li>


                                        <li><i class="fas fa-circle"></i> Total sessions prejoined = {{ $IsPreJoined }}
                                        </li>
                                        <li><i class="fas fa-circle"></i> Total sessions attendance Skipped =
                                            {{ $Run - $IsPreJoined - $IsAttend - $NotAttend }} </li>

                                        <li><i class="fas fa-circle"></i> Total sessions absent = {{ $NotAttend }} </li>
                                        <hr />
                                        <li class="text-info"><i class="fas fa-circle    "></i> Total tasks required =
                                            {{ $TasksReq }} </li>

                                        <li class="text-info"><i class="fas fa-circle    "></i> Total tasks solved =
                                            {{ $SolvedTasks }} </li>
                                        <hr />
                                        <li class="text-warning"><i class="fas fa-circle    "></i> Total sessions skipped =
                                            {{ $Run - $IsPreJoined - $IsAttend - $NotAttend }} </li>
                                        <hr />
                                        <li style="color:red;"><i class="fas fa-circle    "></i> Total cancelled sessions =
                                            {{ $Cancelled }} </li>
                                        <hr />
                                    </ul>





                                </div>

                                <div class="w-100 text-center justify-content-center">

                                    <div class="progress-rounded progress-round-tiny">

                                        <div class="progress-value">

                                            @if ($Count !== 0 && $Run !== 0)
                                                {{ number_format(($IsAttend / $Run) * 100, 0) }}
                                            @else
                                                0
                                            @endif

                                            %
                                        </div>

                                        <svg>

                                            <circle class="progress-cicle bg-success" cx="65" cy="65"
                                                r="57" stroke-width="4" fill="none"
                                                aria-valuenow="

                                                          @if ($Count !== 0 && $Run !== 0) {{ number_format(($IsAttend / $Run) * 100, 0) }}

                                                          @else

                                                              0 @endif

                                                          "
                                                aria-orientation="vertical" aria-valuemin="0" aria-valuemax="100"
                                                role="slider">

                                            </circle>

                                        </svg>

                                    </div>
                                    <h3>Attendance %</h3>
                                    <hr>
                                    <div class="progress-rounded progress-round-tiny">

                                        <div class="progress-value">

                                            @if ($Count !== 0 && $Run !== 0)
                                                {{ number_format(($SolvedTasks / ($Run - $SessionWithoutTask)) * 100, 0) }}
                                            @else
                                                0
                                            @endif

                                            %
                                        </div>

                                        <svg>

                                            <circle class="progress-cicle bg-success" cx="65" cy="65"
                                                r="57" stroke-width="4" fill="none"
                                                aria-valuenow="

                                                          @if ($Count !== 0 && $Run !== 0) {{ number_format(($SolvedTasks / ($Run - $SessionWithoutTask)) * 100, 0) }}

                                                          @else

                                                              0 @endif

                                                          "
                                                aria-orientation="vertical" aria-valuemin="0" aria-valuemax="100"
                                                role="slider">

                                            </circle>

                                        </svg>

                                    </div>
                                    <h3>Tasks Done %</h3>

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

                        <div class="col-12">

                            <div class="d-flex justify-content-end">

                                {{-- <input type="reset" value="undo" class="btn btn-warning mb-2 mx-1 mt-0"> --}}



                                {{-- <input type="submit" value="Save" id="save" class="btn btn-success mb-2 mt-0"> --}}

                            </div>

                            <div class="table-responsive">

                                <table class="dattable table table-striped thead-dark  w-100" id="grades">

                                    <thead>

                                        <th>#</th>
                                        <th><i class="fas fa-history"></i></th>

                                        <th>Session No</th>

                                        <th>Quiz Grade<br>100%</th>

                                        <th>Task Grade<br>100%</th>

                                        <th>Download Task</th>
                                        <th>Task notes</th>
                                        <th>Extra Tasks</th>




                                    </thead>

                                    <tbody>

                                        @php
                                            
                                            $i = 1;
                                            
                                        @endphp

                                        @foreach ($Grades as $Grade)
                                            @if ($Grade->IsCancelled != 1 && $Grade->HasTask == 1)
                                                <tr>
                                                    <form action="">

                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            <a href="{{ url("/Admin/Submission/History/$Grade->TaskId") }}"
                                                                class="btn btn-info"><i class="fas fa-history"></i>
                                                                History</a>
                                                        </td>

                                                        <td>

                                                            <span data-toggle="tooltip" data-placement="top"
                                                                title="{{ date('d-m-Y', strtotime($Grade->SessionDate)) }}">



                                                                Session {{ $Grade->SessionNumber }}

                                                            </span>

                                                        </td>



                                                        <td>



                                                            <input type="text" value="{{ $Grade->QuizGrade }}"
                                                                name="quiz1-grade" data-id="{{ $Grade->TaskId }}"
                                                                placeholder="10%" class="quiz form-control q-changable">

                                                        </td>

                                                        <td>

                                                            <input type="text" value="{{ $Grade->TaskGrade }}"
                                                                name="task1-grade" data-status="update"
                                                                data-grade="{{ $Grade->GradeId }}" placeholder="10%"
                                                                class="task form-control q-changable">

                                                        </td>

                                                        <td>
                                                            @if ($Grade->TaskURL !== null)
                                                                <a href="" data-toggle="modal"
                                                                    data-target="#viewtaskModal{{ $Grade->GradeId }}"
                                                                    class="ms-btn-icon-outline btn-info"><i
                                                                        class="fa fa-download"></i></a>
                                                            @else
                                                                Waiting..
                                                            @endif

                                                            <a href="" class="btn btn-dark d-inline"
                                                                data-toggle="modal"
                                                                data-target="#TUpload{{ $Grade->GradeId }}">Upload</a>

                                                        </td>

                                                        <td>
                                                            @if ($Grade->TaskURL != null)
                                                                <a href="" class="btn btn-light d-inline"
                                                                    data-toggle="modal"
                                                                    data-target="#comment{{ $Grade->GradeId }}">Add
                                                                    comment</a>

                                                                <textarea style="display:none;" class="form-control comment q-changable" data-id="{{ $i }}"
                                                                    placeholder="ex: Great work!">{{ $Grade->TaskComment }}</textarea>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <a href="{{url("/Admin/Student/$StudentRound->StudentRoundsId/ExtraTasks/$Session->SessionId")}}" class="btn btn-primary">Extra Tasks</a>
                                                        </td>

                                                    </form>
                                                </tr>
                                            @else
                                                <tr>
                                                    @if ($Grade->IsCancelled == 1)
                                                        <td class="bg-danger text-white text-center">{{ $i }}
                                                        </td>

                                                        <td colspan="6" class="bg-danger text-white text-center">
                                                            Cancelled Session</td>
                                                    @else
                                                        <td class="bg-warning text-white text-center">{{ $i }}
                                                        </td>

                                                        <td colspan="6" class="bg-warning text-white text-center">
                                                            Session doesn't have task</td>
                                                        
                                                </tr>
                                            @endif
                                        @endif



                                        @php
                                            
                                            $i++;
                                            
                                        @endphp
                                        @endforeach





                                    </tbody>

                                </table>

                            </div>



                        </div>

                        <div class="col-12">

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

                                        <th>Exam Notes</th>

                                        <th>Exam File Upload</th>





                                    </thead>

                                    <tbody>

                                        @php
                                            
                                            $i = 1;
                                            
                                        @endphp

                                        @foreach ($ExamGrades as $ExamGrade)
                                            <tr>



                                                <form action="">

                                                    <td>{{ $i }}</td>

                                                    <td>

                                                        <span data-toggle="tooltip" data-placement="top"
                                                            title="14/10/2019">



                                                            {{ $ExamGrade->ExamNameEn }}

                                                        </span>

                                                    </td>

                                                    <td>

                                                        <input type="hidden" class="gradeid"
                                                            value="{{ $ExamGrade->ExamGradesId }}">

                                                        <input type="text" data-exam="{{ $ExamGrade->ExamGradesId }}"
                                                            value="{{ $ExamGrade->Grade }}" name="quiz1-grade"
                                                            placeholder="10%" class="form-control grade-value">

                                                    </td>

                                                    <td>

                                                        <ul class='stars'>

                                                            <li class="star

                                          @if (
                                              $ExamGrade->Evaluation == 1 ||
                                                  $ExamGrade->Evaluation == 2 ||
                                                  $ExamGrade->Evaluation == 3 ||
                                                  $ExamGrade->Evaluation == 4 ||
                                                  $ExamGrade->Evaluation == 5) selected @endif

                                          @if ($ExamGrade->Evaluation == 1) value @endif

                                           "
                                                                title='Poor' data-value='1'>

                                                                <i class='fa fa-star fa-fw'></i>

                                                            </li>

                                                            <li class='star

                                          @if (
                                              $ExamGrade->Evaluation == 2 ||
                                                  $ExamGrade->Evaluation == 3 ||
                                                  $ExamGrade->Evaluation == 4 ||
                                                  $ExamGrade->Evaluation == 5) selected @endif

                                          @if ($ExamGrade->Evaluation == 2) value @endif

                                          '
                                                                title='Fair' data-value='2'>

                                                                <i class='fa fa-star fa-fw'></i>

                                                            </li>

                                                            <li class='star

                                          @if ($ExamGrade->Evaluation == 3 || $ExamGrade->Evaluation == 4 || $ExamGrade->Evaluation == 5) selected @endif

                                          @if ($ExamGrade->Evaluation == 3) value @endif

                                          '
                                                                title='Good' data-value='3'>

                                                                <i class='fa fa-star fa-fw'></i>

                                                            </li>

                                                            <li class='star

                                          @if ($ExamGrade->Evaluation == 4 || $ExamGrade->Evaluation == 5) selected @endif

                                          @if ($ExamGrade->Evaluation == 4) value @endif

                                          '
                                                                title='Excellent' data-value='4'>

                                                                <i class='fa fa-star fa-fw'></i>

                                                            </li>

                                                            <li class='star

                                          @if ($ExamGrade->Evaluation == 5) selected @endif

                                          @if ($ExamGrade->Evaluation == 5) value @endif

                                          '
                                                                title='WOW!!!' data-value='5'>

                                                                <i class='fa fa-star fa-fw'></i>

                                                            </li>

                                                        </ul>

                                                    </td>

                                                    <td>
                                                        <textarea style="resize: auto" name="examnotes" class="examnotes form-control" id="">{{ $ExamGrade->ExamNotes }}</textarea>
                                                    </td>
                                                    <td>
                                                        <textarea style="resize: auto" name="examfile" class="examfile form-control" id="">{{ $ExamGrade->File }}</textarea>
                                                    </td>





                                                </form>



                                            </tr>

                                            @php
                                                
                                                $i++;
                                                
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

                                <th>Time Respect<br>100%</th>

                                <th>Lecture Practice<br>100%</th>

                                <th>Solve Home Tasks<br>100%</th>

                                <th>Student Interaction<br>100%</th>

                                <th>Student Attitude<br>100%</th>

                                <th>Student Focus<br>100%</th>

                                <th>Understand Speed<br>100%</th>

                                <th>Extra Marks<br>100%</th>

                                <th>Overall<br>100%</th>

                                <th>Total</th>

                                <th>Notes</th>

                            </thead>

                            <tbody>

                                @php
                                    
                                    $i = 1;
                                    
                                @endphp

                                @foreach ($StudentEvaluations as $Evaluation)
                                    <tr>

                                        <td>{{ $i }}</td>

                                        <td>

                                            <span data-toggle="tooltip" data-placement="top" title="14/10/2019">



                                                {{ $Evaluation->ContentNameEn }}

                                            </span>

                                        </td>

                                        <td><input type="text" value="{{ $Evaluation->TimeRespect }}"
                                                data-eval="{{ $Evaluation->StudentEvaluationId }}"
                                                class="TimeRespect form-control" placeholder="100%"></td>

                                        <td><input type="text" value="{{ $Evaluation->Lecture_Practice }}"
                                                class="LecturePractise form-control" placeholder="100%"></td>

                                        <td><input type="text" value="{{ $Evaluation->Solve_Home_Tasks }}"
                                                class="SolveHomeTasks form-control" placeholder="100%"></td>

                                        <td><input type="text" value="{{ $Evaluation->Student_Interaction }}"
                                                class="StudentInteractions form-control" placeholder="100%"></td>

                                        <td><input type="text" value="{{ $Evaluation->Student_Attitude }}"
                                                class="StudentAttitude form-control" placeholder="100%"></td>

                                        <td><input type="text" value="{{ $Evaluation->Student_Focus }}"
                                                class="StudentFocus form-control" placeholder="100%"></td>

                                        <td><input type="text" value="{{ $Evaluation->Understand_Speed }}"
                                                class="UnderstandSpeed form-control" placeholder="100%"></td>

                                        <td><input type="text" value="{{ $Evaluation->Exam_Marks }}"
                                                class="ExtraMarks form-control" placeholder="100%"></td>

                                        <td><input type="text" value="{{ $Evaluation->Overall }}"
                                                class="Overall form-control" placeholder="100%"></td>

                                        <?php $total = (($Evaluation->TimeRespect + $Evaluation->Lecture_Practice + $Evaluation->Solve_Home_Tasks + $Evaluation->Student_Interaction + $Evaluation->Student_Attitude + $Evaluation->Student_Focus + $Evaluation->Understand_Speed + $Evaluation->Exam_Marks + $Evaluation->Overall) / 900) * 100; ?>

                                        <td>

                                            <div class="progress-circle" data-value="{{ number_format($total, 0) }}"
                                                data-size="50" data-thickness="3" data-animation-start-value="1.0"
                                                data-fill="{

                                    &quot;color&quot;: &quot;green&quot;

                                  }"
                                                data-reverse="true">

                                                <div class="percent">

                                                    {{ number_format($total, 0) }}%

                                                </div>

                                            </div>

                                        </td>

                                        <td>

                                            <textarea name="" placeholder="note" cols="3" class="form-control notes">{{ $Evaluation->Notes }}</textarea>

                                        </td>



                                    </tr>

                                    @php
                                        
                                        $i++;
                                        
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
    @foreach ($Grades as $index => $GradeModal)
        <!-- note Modal -->

        <div class="modal fade" id="TUpload{{ $GradeModal->GradeId }}" tabindex="-1" role="dialog"
            aria-labelledby="NoteModal">

            <div class="modal-dialog modal-dialog-centered " role="document">

                <div class="modal-content">



                    <div class="modal-body">



                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>

                        <div class="ms-auth-container row no-gutters">

                            <div class="col-12 p-5">

                                <form action="/Admin/TaskUpload" class="form-prog" id="form-prog" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}


                                    <input type="hidden" class="session_id" name="session"
                                        value="{{ $GradeModal->SessionId }}" />

                                    <input type="hidden" class="sround_id" name="id"
                                        value="{{ $StudentRound->StudentRoundsId }}" />

                                    <input type="hidden" name="round" value="{{ $RoundId }}" />
                                    <label for="note">Task Link<br /><span class="text-info"> (<i
                                                class="fab fa-google-drive"></i> Google Drive - <i
                                                class="fab fa-github"></i> Github)</span></label>
                                    <input type="text" name="task_link" class="form-control"
                                        placeholder="Enter task link">


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
        <div class="modal fade" id="viewtaskModal{{ $GradeModal->GradeId }}" tabindex="-1" role="dialog"
            aria-labelledby="uploadtaskModal">

            <div class="modal-dialog modal-dialog-centered " role="document">

                <div class="modal-content">



                    <div class="modal-body">



                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>

                        <div class="ms-auth-container row no-gutters">

                            <div class="col-12 p-5">
                                <div class="text-center">
                                    <a href="{{ $GradeModal->TaskURL }}" target="_blank" class="btn btn-primary">View
                                        Task</a>
                                </div>
                                <div class="input-group">

                                    <textarea name="notes" id="note" disabled class="form-control mt-3 text-left" rows="10"
                                        placeholder="write note">
                    {{ $GradeModal->TaskNotes }}
                  </textarea>



                                </div>
                            </div>

                        </div>

                    </div>



                </div>

            </div>

        </div>

        <div class="modal fade" id="comment{{ $GradeModal->GradeId }}" tabindex="-1" role="dialog"
            aria-labelledby="NoteModal">

            <div class="modal-dialog modal-dialog-centered " role="document">

                <div class="modal-content">



                    <div class="modal-body">



                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>

                        <div class="ms-auth-container row no-gutters">

                            <div class="col-12 p-5">

                                <textarea class="form-control comment-box" data-id="{{ $index + 1 }}" placeholder="ex: Great work!">{{ $GradeModal->TaskComment }}</textarea>
                                <button type="button" class="btn btn-primary comment-add" data-id="{{ $index + 1 }}"
                                    data-dismiss="modal" aria-label="Close">add comment</button>

                            </div>

                        </div>

                    </div>



                </div>

            </div>

        </div>

        <!-- Task Modal -->
    @endforeach

    <!-- note Modal -->

    <div class="modal fade" id="NoteModal" tabindex="-1" role="dialog" aria-labelledby="NoteModal">

        <div class="modal-dialog modal-dialog-centered " role="document">

            <div class="modal-content">



                <div class="modal-body">



                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

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


    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModal">

        <div class="modal-dialog modal-dialog-centered " role="document">

            <div class="modal-content">



                <div class="modal-body">



                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                    <div class="ms-auth-container row no-gutters">

                        <div class="col-12 p-5" style="text-align:center;">
                            <p>Are you sure you want to delete this round registeration?</p>
                            <a href="/Admin/Course/Student/CancelRegisteration/{{ $StudentRound->StudentRoundsId }}"
                                class="btn btn-outline-danger">Yes, I'm sure. Delete it</a>



                        </div>

                    </div>

                </div>



            </div>

        </div>

    </div>
@endsection
@section('scripts')
    <script>
        // function progressHandler(event) {
        //   _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
        //   var percent = (event.loaded / event.total) * 100;
        //   _("progressBar").value = Math.round(percent);
        //   _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
        // }


        //-------------------------------
        $(document).ready(function() {
            $('#form-prog').submit(function(event) {
                if ($('#uploadFile').val()) {
                    // event.preventDefault();
                    $(this).ajaxSubmit({

                        // target: '#targetLayer',
                        beforeSubmit: function() {
                            $('.progress-bar').width('0%');
                        },
                        uploadProgress: function(event, position, total, percentageComplete) {
                            $('.progress-bar').width(percentageComplete + '%')
                            // $('.progress-bar').animate({
                            //   width: percentageComplete + '%'
                            // }, {
                            //   duration: 1
                            // });
                            $("#prog-perc").html(percentageComplete + "%");
                        },
                        success: function() {
                            // $('#form-prog').submit();
                        },
                        // resetForm: true
                    });
                }
            });
        });
        $('.comment-add').click(function() {
            $('.comment[data-id=' + $(this).attr('data-id') + ']').val($('.comment-box[data-id=' + $(this).attr(
                'data-id') + ']').val());
            $('.comment[data-id=' + $(this).attr('data-id') + ']').change();
            // $(this).closest( ".modal" ).modal('hide');
            debugger;
        });
    </script>
@endsection
