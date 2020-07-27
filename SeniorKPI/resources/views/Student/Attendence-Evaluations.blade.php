@extends('Layouts/studentkpi',['StudentRounds'=>$StudentRounds])
@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/Student"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Attendence & Evaluations</li>
            </ol>
          </nav>
        <div class="row">

            <div class="col-md-12">
             
    
    
              <div class="ms-panel">
                <div class="ms-panel-header">
                  <h6>Attendence</h6>
                </div>
                <div class="ms-panel-body">
                 <div class="row">
                   <div class="col-md-8">
                      <div class="table-responsive">
                          <table id="StudentTable" class="dattable table table-striped thead-dark  w-100">
                            <thead>
                              <th>#</th>
                              <th>Session No</th>
                              
                              <th>Attendence</th>
                              <th>Note</th>
                            </thead>
                            <tbody>
                              @php
                                  $i = 1
                              @endphp
                            @foreach ($Attendance as $Attend)
                                <tr>
                                <td>{{$i}}</td>
                                <td>
                                  <span data-toggle="tooltip" data-placement="top"  title="{{$Attend->SessionDate}}">

                                    Session {{$Attend->SessionNumber}}
                                  </span>
                                </td>
                               
                              
                                <td>
                                  @if ($Attend->IsAttend == 1)
                                  <i class="fas fa-check    "></i>
                                  @elseif($Attend->IsAttend !== 0)
                                  <i class="fas fa-minus    "></i>
                                  @else
                                  <i class="fas fa-times    "></i>
                                  @endif
                                  
                                </td>
                                <td>
                                  <p>{{$Attend->Notes}}</p>
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
                   <div class="col-md-4 py-5 border">
                      
                    <ul>
                      <li><i class="fas fa-circle    "></i>  Total sessions = {{$AllAttend}} </li>
                      <li><i class="fas fa-circle    "></i> Total sessions run = {{$IsAttend}} </li>
                      <li><i class="fas fa-circle    "></i> Total sessions absent = {{$AllAttend - $IsAttend}} </li>
                    </ul>
                    <div class="progress-rounded progress-round-tiny ">
                          <div class="progress-value">
                              @if ($AllAttend != 0)
                              {{number_format(($IsAttend/$AllAttend)*100,1)}}%
                              @else
                              0
                              @endif
                            </div>
                            <svg>
                              <circle class="progress-cicle bg-success"
                              cx="65"
                              cy="65"
                              r="57"
                              stroke-width="4"
                              fill="none"
                              aria-valuenow="
                              @if ($AllAttend != 0)
                              {{($IsAttend/$AllAttend)*100}}
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
                        <h3 class="text-center">total absence kpi</h3>
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
              <h6>ُMy Evaluation</h6>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="ms-panel-body">
                  <div class="table-responsive">
                    <table  class="dattable table table-striped thead-dark  w-100">
                      <thead>
                        <th>#</th>
                        <th>Session No</th>
                        <th>Quiz Grade</th>
                        <th>Task Grade</th>
                       
                      </thead>
                      <tbody>
                        @php
                            $i = 1
                        @endphp
                      @foreach ($Grades as $Grade)
                          <tr>
                            <td>{{$i}}</td>
                          <td>
                            <span data-toggle="tooltip" data-placement="top"  title="{{$Grade->SessionDate}}">

                              Session {{$Grade->SessionNumber}}
                            </span>
                          </td>
                         
                          <td>
                            {{$Grade->QuizGrade}}/100
                          </td>
                          <td>
                            {{$Grade->TaskGrade}}/100
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
              <div class="col-md-6">
                  <div class="ms-panel-body">
                      <div class="table-responsive">
                          <table  class="dattable table table-striped thead-dark  w-100">
                              <thead>
                                <th>#</th>
                                <th>Exam Name</th>
                                <th>Exam Grade </th>
                                <th>Evaluation </th>
                               
                              </thead>
                              <tbody>
                                @php
                                    $i = 1
                                @endphp
                              @foreach ($ExamGrades as $Exam)
                                  <tr>
                                  <td>
                                    <span data-toggle="tooltip" data-placement="top"  title="14/10/2019">
  
                                      {{$Exam->ExamNameEn}}
                                    </span>
                                  </td>
                                  <td>
                                    {{$Exam->Grade}}/100
                                  </td>
                                  
                                  <td>
                                    @if ($Exam->Evaluation == 1)
                                    
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                        
                                    @elseif ($Exam->Evaluation == 2)
                                    
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    @elseif ($Exam->Evaluation == 3)
                                    
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    @elseif ($Exam->Evaluation == 4)
                                    
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    @elseif ($Exam->Evaluation == 5)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
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
          <div class="row">
            <div class="col-md-12">
              <div class="ms-panel">
                <div class="ms-panel-header">
                  <h6>KPIS</h6>
                </div>
                <div class="ms-panel-body">
                      <div class="table-responsive">
                          <table  class="dattable table table-striped thead-dark  w-100">
                              <thead>
                                <th>#</th>
                                <th>Track name</th>
                                <th>Attendence<br>5% </th>
                                <th>Time Respect<br>5% </th>
                                <th>Lecture Practice<br>5% </th>
                                <th>Assigned Tasks<br>10% </th>
                                <th>Inteaction<br>5% </th>
                                <th>Attiude<br>5%</th>
                                <th>Focus<br>5%</th>
                                <th>Understand Speed<br>5%</th>
                                <th>Exams<br>5%</th>
                                <th>total</th>
                                <th>note</th>
                              </thead>
                              <tbody>
                                @php
                                    $i = 1
                                @endphp
                                  @foreach ($StudentEvaluations as $Evaluation)
                                    <tr>
                                      <td>{{$i}}</td>
                                  <td>
                                    <span data-toggle="tooltip" data-placement="top"  title="14/10/2019">
  
                                      {{$Evaluation->ContentNameEn}}
                                    </span>
                                  </td>
                                  <td>{{$Evaluation->TimeRespect}}%</td>
                                  <td>{{$Evaluation->Lecture_Practice}}%</td>
                                  <td>{{$Evaluation->Solve_Home_Tasks}}%</td>
                                  <td>{{$Evaluation->Student_Interaction}}%</td>
                                  <td>{{$Evaluation->Student_Attitude}}%</td>
                                  <td>{{$Evaluation->Student_Focus}}%</td>
                                  <td>{{$Evaluation->Understand_Speed}}%</td>
                                  <td>{{$Evaluation->Exam_Marks}}%</td>
                                  <td>{{$Evaluation->Overall}}%</td>
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
                                  <td class="note">
                                      {{$Evaluation->Notes}}
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
          {{-- <div class="row">
            <div class="col-md-6">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                      <h6>Exam KPI</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row no-gutters">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                </div>
                                <div class="col-md-6">
                                        <div class="progress-rounded progress-round-tiny">
                                          <div class="progress-value">72%</div>
                                            <svg>
                                              <circle class="progress-cicle bg-success"
                                              cx="65"
                                              cy="65"
                                              r="57"
                                              stroke-width="4"
                                              fill="none"
                                              aria-valuenow="72"
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
            <div class="col-md-6">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                      <h6>Quiz KPI</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row no-gutters">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                </div>
                                <div class="col-md-6">
                                        <div class="progress-rounded progress-round-tiny">
                                          <div class="progress-value">72%</div>
                                            <svg>
                                              <circle class="progress-cicle bg-success"
                                              cx="65"
                                              cy="65"
                                              r="57"
                                              stroke-width="4"
                                              fill="none"
                                              aria-valuenow="72"
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
            <div class="col-md-6">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                      <h6>Task KPI</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row no-gutters">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                </div>
                                <div class="col-md-6">
                                        <div class="progress-rounded progress-round-tiny">
                                          <div class="progress-value">72%</div>
                                            <svg>
                                              <circle class="progress-cicle bg-success"
                                              cx="65"
                                              cy="65"
                                              r="57"
                                              stroke-width="4"
                                              fill="none"
                                              aria-valuenow="72"
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
            <div class="col-md-6">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                      <h6>Interaction KPI</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row no-gutters">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                </div>
                                <div class="col-md-6">
                                        <div class="progress-rounded progress-round-tiny">
                                          <div class="progress-value">72%</div>
                                            <svg>
                                              <circle class="progress-cicle bg-success"
                                              cx="65"
                                              cy="65"
                                              r="57"
                                              stroke-width="4"
                                              fill="none"
                                              aria-valuenow="72"
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
            <div class="col-md-6">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                      <h6>Attiude KPI</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row no-gutters">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                </div>
                                <div class="col-md-6">
                                        <div class="progress-rounded progress-round-tiny">
                                          <div class="progress-value">80%</div>
                                            <svg>
                                              <circle class="progress-cicle bg-success"
                                              cx="65"
                                              cy="65"
                                              r="57"
                                              stroke-width="4"
                                              fill="none"
                                              aria-valuenow="80"
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
            <div class="col-md-6">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                      <h6>Helpful KPI</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row no-gutters">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                </div>
                                <div class="col-md-6">
                                        <div class="progress-rounded progress-round-tiny">
                                          <div class="progress-value">60%</div>
                                            <svg>
                                              <circle class="progress-cicle bg-warning"
                                              cx="65"
                                              cy="65"
                                              r="57"
                                              stroke-width="4"
                                              fill="none"
                                              aria-valuenow="60"
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
         --}}
        </div>

      </div>
@endsection