@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="/Admin/Rounds"> Rounds</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Round Details</li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-md-12">

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                        <h2>{{$Course->CourseNameEn}} - GR{{$RoundSelected->GroupNo}}</h2>

                            <h6> Round  Details</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form action="">

                                <div class="ms-auth-container row">

                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label  >Round Name</label>
                                            <div class="input-group">
                                                <input type="text" id="round_Name"  class="form-control" disabled
                                                    placeholder="Round Name">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  >Course Name</label>
                                            <div class="input-group">
                                            <input type="text" value="{{$CourseSelected->CourseNameEn}}" id="course_Name"  class="form-control" disabled
                                                    placeholder="Course Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  >Round Number</label>
                                            <div class="input-group">
                                            <input type="text" id="round_Number" value="{{$RoundSelected->GroupNo}}"  class="form-control" disabled
                                                    placeholder="Round Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  >Round Start Date</label>
                                            <div class="input-group">
                                            <input type="text" id="round_ST_Date" value="{{$RoundSelected->StartDate}}" data-toggle="datepicker"
                                                     class="form-control" disabled placeholder="Round Start Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  >Round End Date</label>
                                            <div class="input-group">
                                            <input type="text" id="round_ST_Date" value="{{$RoundSelected->EndDate}}" data-toggle="datepicker"
                                                     class="form-control" disabled placeholder="Round End Date">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Assigned Course</label>
                                                    <div class="input-group">
                                                        <select name="" id="round_course_Assigned"  class="form-control" disabled>
                                                            <option value="fullstack">FullStack</option>
                                                            <option value="meanstack">MeanStack</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  >Assigned Trainers</label>
                                            <div class="input-group">
                                                <select name="" multiple size="2" id="round_trainers_Assigned"
                                                     class="form-control" disabled>
                                                     @foreach ($TrainerRounds as $TrainerRound)
                                            <option value="{{$TrainerRound->TrainerId}}">{{$TrainerRound->FullnameEn}}</option>
                                                     @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  >Round Days</label>
                                            <div class="input-group">
                                                {{-- <input type="text" id="round_days"  class="form-control" disabled
                                                    placeholder="Round Days"> --}}
                                                    <select name="" style="width:100%;" multiple id="">
                                                        @foreach ($RoundDays as $Day)
                                                    <option >({{$Day->DayNameEn}}) from : ({{$Day->From}}) to : ({{$Day->To}})</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label  >Round Times</label>
                                            <div class="input-group">
                                                <input type="text" id="round_times"  class="form-control" disabled
                                                    placeholder="Round Times">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  >Round Branch</label>
                                            <div class="input-group">
                                            <input type="text" value="{{$Labs->BranchNameEn}}" id="round_Branch"  class="form-control" disabled
                                                    placeholder="Round Branch">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  >Round Lab</label>
                                            <div class="input-group">
                                            <input type="text" value="Lab {{$Labs->LabNumber}}" id="round_Lab"  class="form-control" disabled
                                                    placeholder="Round Lab">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label  >Status</label>
                                            <div>
                                                <label class="ms-switch">
                                                    <input type="checkbox" disabled 
                                                    @if ($RoundSelected->Done)
                                                    checked=""
                                                    @endif
                                                    >
                                                    <span class="ms-switch-slider ms-switch-success round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label  >Note</label>
                                            <div class="input-group">
                                                <textarea name="" id="note"  class="form-control" disabled rows="5"
                                            placeholder="Note">{{$RoundSelected->Notes}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </form>
                        </div>
                    </div>
                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6> Round Details </h6>
                        </div>
                        <div class="ms-panel-body">
                            <div class="row no-gutters">
                                <div class="col-md-4 col-sm-8">
                                    <ul class="nav nav-tabs d-flex nav-justified mb-4" role="tablist">
                                        <li role="presentation"><a href="#Roundes" aria-controls="Roundes"
                                                class="active show" role="tab" data-toggle="tab"
                                                aria-selected="true">Students</a></li>
                                        <li role="presentation"><a href="#Instructors" aria-controls="Instructors"
                                                role="tab" data-toggle="tab" class="" aria-selected="false">Trainers
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active show" id="Roundes">

                                    <div class="table-responsive">
                                            <div class="table-responsive">
                                                    <table  class="dattable table table-striped thead-dark  w-100">
                                                      <thead>
                                                          <th>#</th>
                                                        <th>Student Name_en  </th>
                                                        <th>Student Name_ar  </th>
                                                        <th>Student Mobile  </th>
                                                        <th></th>
                                                      </thead>
                                                      <tbody>
                                                      @php
                                                          $i = 1
                                                      @endphp
                                                            @foreach ($Students as $Student)
                                                            <tr>
                                                            <td>{{$i}}</td>
                                                            <td>
                                                              <span>
                                      
                                                                {{$Student->FullnameEn}}
                                                              </span>
                                                            </td>
                                                            <td> {{$Student->FullnameAr}} </td>
                                                            <td> {{$Student->Phone}} </td>
                                                            <td>
                                                                  <a href="student-profile.html" class="btn btn-success">
                                                                          View Profile
                                                                      </a>
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
                                <div role="tabpanel" class="tab-pane fade" id="Instructors">
                                    {{-- <div class="d-flex w-100  justify-content-end">
                                        <a href="#" class="btn btn-success m-0 mb-2" data-toggle="modal"
                                            data-target="#addTrainer"> <i class="fas fa-plus"></i> Add Trainer</a>
                                    </div> --}}
                                    <div class="table-responsive">
                                            <table  class="dattable smal-tb table table-striped thead-dark  w-100">
                                                    <thead>
                                                        <th>#</th>
                                                      <th> </th>
                                                      <th>Trainer </th>
                                                      <th>Mobile </th>
                                                      <th> Social Links </th>
                                                      <th> </th>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $x = 1
                                                    @endphp
                                                            @foreach ($TrainerRounds as $TrainerRound)
                                                            <tr>
                                                            <td>{{$x}}</td>
                                                               <td  class="img">
                                                                     @if (!$TrainerRound->ImagePath)
                                                                     <img style="max-width:40px;height:40px;width:40px !important;" class="img-circle profile" src="{{ asset('img/midal-back.jpg') }}">
                                                                 @else
                                                                     <img style="max-width:40px;height:40px;width:40px !important;" class="img-circle profile" src="{{ asset("$TrainerRound->ImagePath") }}">
                                                                 @endif  </td>
                                                             <td>
                                                             
                                       
                                                                 {{$TrainerRound->FullnameEn}}
                                                             
                                                             </td>
                                                             <td> {{$TrainerRound->Phone}}
                                                             @if ($TrainerRound->SecondPhone)
                                                                 , {{$TrainerRound->SecondPhone}}
                                                             @endif
                                                             
                                                             </td>
                                                             <td> 
                                                                     @if ($TrainerRound->Facebook)
                                                                     <a href="{{$TrainerRound->Facebook}}" class="ms-btn-icon btn-pill btn-secondary"> <i class="fab fa-facebook-f    "></i> </a>
                                                                       @endif
                                                                       @if ($TrainerRound->Youtube)
                                                                           <a href="{{$TrainerRound->Youtube}}" class="ms-btn-icon btn-pill btn-info"> <i class="fab fa-linkedin    "></i> </a>
                                                                       @endif
                                                                       @if ($TrainerRound->Linkedin)
                                                                           <a href="{{$TrainerRound->Linkedin}}" class="ms-btn-icon btn-pill btn-danger"> <i class="fab fa-youtube    "></i> </a>
                                                                       @endif
                                                                       
                                                             </td>
                                                             <td>
                                                               <a href="/Admin/Trainers/Profile/{{$TrainerRound->TrainerId}}" class="btn btn-success">
                                                                   View Profile
                                                               </a>
                                                               <a href="/Admin/Courses/{{$CourseSelected->CourseId}}/Topics/{{$TrainerRound->TrainerId}}" class="btn mx-1 btn-dark">
                                                                   Course Topics
                                                               </a>
                                                              
                                                             </td>
                                                            
                                                             
                                                            
                                                           </tr> 
                                                           @php
                                                               $x++
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
          
@endsection