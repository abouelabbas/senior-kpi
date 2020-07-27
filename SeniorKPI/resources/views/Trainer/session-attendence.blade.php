@extends('Layouts/trainerkpi',['TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds])
@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/Trainer"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="/Trainer/Course/{{$RoundId}}/Attendance">Attendence</a></li>
              <li class="breadcrumb-item active" aria-current="page">Student Attendence </li>
            </ol>
          </nav>
        <div class="row">

            <div class="col-md-6">
             
    
    
              <div class="ms-panel">
                <div class="ms-panel-header">
                  <h6>Attendence</h6>
                </div>
                <div class="ms-panel-body">
                  <div class="table-responsive">
                    <table id="StudentTable" class="dattable table table-striped thead-dark  w-100">
                      <thead>
                        <th>#</th>
                        <th>Student Name</th>
                        
                        <th>Attendence</th>
                      </thead>
                      <tbody>
                        @php
                            $i = 1
                        @endphp
                      @foreach ($Attendance as $student)
                      <tr>
                      <td>{{$i}}</td>
                          <td>{{$student->FullnameEn}}</td>
                         
                        
                          <td>
                            @if ($student->IsAttend == 1)
                                <i class="fas fa-check    "></i>
                            <span> Attended </span>
                            @else
                            <i class="fas fa-times    "></i>
                            <span> Absent </span>
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
                    <div class="ms-panel">
                            <div class="ms-panel-header">
                              <h6>Attendence KPI</h6>
                            </div>
                            <div class="ms-panel-body">
                                <div class="row no-gutters">
                                        <div>
                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                        </div>
                                        <div class="w-100 d-flex justify-content-center">
                                                <div class="progress-rounded progress-round-tiny">
                                                  <div class="progress-value">{{number_format($KPI,0)}}%</div>
                                                    <svg>
                                                      <circle class="progress-cicle bg-success"
                                                      cx="65"
                                                      cy="65"
                                                      r="57"
                                                      stroke-width="4"
                                                      fill="none"
                                                    aria-valuenow="{{number_format($KPI,0)}}"
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
    @endsection