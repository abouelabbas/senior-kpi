@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="attendence.html">Attendence</a></li>
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
                        <th>Student Name</th>
                        
                        <th>Attendence</th>
                      </thead>
                      <tbody>
                      @foreach ($Attendance as $student)
                      <tr>
                          <td>{{$student->FullnameEn}}</td>
                         
                        
                          <td>
                            @if ($student->IsAttend == 1)
                                <i class="fas fa-check    "></i>
                            <span> Attended </span>
                            @elseif($student->IsAttend !== 0)
                            <i class="fas fa-minus    "></i>
                            <span> Not set </span>
                            @else
                            <i class="fas fa-times    "></i>
                            <span> Absent </span>
                            @endif
                            
                          </td>
                        </tr>
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
                                                  <div class="progress-value">{{$KPI}}%</div>
                                                    <svg>
                                                      <circle class="progress-cicle bg-success"
                                                      cx="65"
                                                      cy="65"
                                                      r="57"
                                                      stroke-width="4"
                                                      fill="none"
                                                    aria-valuenow="{{$KPI}}"
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