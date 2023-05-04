@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])

@section('content')

@if (session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

            <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>

                    <li class="breadcrumb-item"><a href="/Admin/Rounds"> Rounds</a></li>

                    <li class="breadcrumb-item active" aria-current="page"> Edit Round</li>

                </ol>

            </nav>

            <div class="row">



                <div class="col-md-12">



                    <div class="ms-panel">

                        <div class="ms-panel-header">

                        <h2>{{$Course->CourseNameEn}} - GR{{$RoundSelected->GroupNo}}</h2>

                            <h6>Edit Round </h6>

                        </div>

                        <div class="ms-auth-container row no-gutters">

                                <div class="col-12 p-3">

                                    <form action="">

                                    <input id="RoundId" type="hidden" value="{{$RoundSelected->RoundId}}" />

                                        <div class="ms-auth-container row">

              {{--         

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Round Name</label>

                                                    <div class="input-group">

                                                        <input type="text"  id="round_Name" class="form-control"

                                                           placeholder="Round Name">

                                                    </div>

                                                </div>

                                            </div> --}}

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Course Name</label>

                                                    <div class="input-group">

                                                        <select name="CourseId" disabled class="form-control" id="CourseId">

                                                          <option disabled>Select a course</option>

                                                          @foreach ($Courses as $Course)

                                                          <option 

                                                          @if ($RoundSelected->CourseId == $Course->CourseId)

                                                              selected

                                                          @endif

                                                          value="{{$Course->CourseId}}"> {{$Course->CourseNameEn}} </option>

                                                          @endforeach

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Round Number</label>

                                                    <div class="input-group">

                                                    <input type="text" value="{{$RoundSelected->GroupNo}}" disabled name="GroupNo" id="round_Number" class="form-control"

                                                           placeholder="Round Number">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Round Start Date</label>

                                                    <div class="input-group">

                                                    <input type="date" name="StartDate" value="{{$RoundSelected->StartDate}}" id="round_ST_Date" class="form-control"

                                                           placeholder="Round Start Date">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Round End Date</label>

                                                    <div class="input-group">

                                                    <input type="date" name="EndDate" value="{{$RoundSelected->EndDate}}" id="round_ED_Date" class="form-control" placeholder="Round End Date">

                                                    </div>

                                                </div>

                                            </div>

                                            <!-- <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Assigned Course</label>

                                                    <div class="input-group">

                                                        <select name="" id="round_course_Assigned" class="form-control">

                                                            <option value="fullstack">FullStack</option>

                                                            <option value="meanstack">MeanStack</option>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div> -->

                                            {{-- <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Assigned Trainers</label>

                                                    <div class="input-group">

                                                        <select name="TrainerId[]" disabled multiple id="round_trainers_Assigned" class="form-control">

                                                                @foreach ($TrainerRounds as $TrainerRound)

                                                                <option value="{{$TrainerRound->TrainerId}}">{{$TrainerRound->FullnameEn}}</option>

                                                                    @endforeach

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                            --}}

                                            <!--  Add Round days and times -->

                                            <div id="roundDT" class="w-100 my-3">

                                                <div class="col-md-12">

                                                    <div class="form-group">

                                                        <label for="note">Add New Round Days</label>

                                                        

                                                        <div class="input-group">

                                                            <select name="" class="form-control" id="Days">

                                                              @foreach ($Days as $Day)

                                                            <option value="{{$Day->DayId}}"> {{$Day->DayNameEn}} </option>

                                                              @endforeach

                                                              </select>

                                                              <input type="time" class="form-control d-block" id="Daytime">

                                                              <input type="time" class="form-control d-block" id="to">

                                                          

                                                        </div>

                                                        <div class="input-group">

                                                              <button type="button" onclick="addRoundDay()" class="btn btn-dark" style="margin:0px auto;">Add </button>

                                                          </div>

                                                          <h6>*Double click to delete a round day*</h6>



                                                    <div class="input-group">

                                                      <select name="" multiple class="form-control" id="selecteddays">

                                                        <option disabled value=""> Round days.... </option>

                                                      </select>

                                                        </div></div>

                                                </div>

                                                <div class="w-100 my-1" id="added">

              

                                                </div>

              

              

                                            </div>

                                            <!--  /Add Round days and times -->

                                            

                                            {{-- <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Round Branch</label>

                                                    <div class="input-group">

              

                                                      <select name="" class="form-control" id="BranchId">

                                                        @foreach ($Branches as $Branch)

                                                        <option value="{{$Branch->BranchId}}"> {{$Branch->BranchNameEn}} </option>

                                                        @endforeach

                                                        

                                                      </select>

                                                    </div>

                                                </div>

                                            </div> --}}

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Round Lab</label>

                                                    <div class="input-group">

                                                        <select name="" class="form-control" id="LabId">

                                                          @foreach ($Labs as $Lab)

                                                          <option

                                                          @if ($Lab->LabId == $RoundSelected->LabId)

                                                              selected

                                                          @endif

                                                          value="{{$Lab->LabId}}"> lab {{$Lab->LabNumber}} - {{$Lab->BranchNameEn}} </option>

                                                          @endforeach

                                                           

                                                          </select>

                                                    </div>

                                                </div>

                                            </div>

                                            

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Status</label>

                                                    <div>

                                                        <label class="ms-switch">

                                                            <input type="checkbox" id="active" checked="">

                                                            <span class="ms-switch-slider ms-switch-success round"></span>

                                                        </label>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label for="note">Note</label>

                                                    <div class="input-group">

                                                        <textarea name="" id="note" class="form-control"  

                                                    rows="5" placeholder="Note">{{$RoundSelected->Notes}}</textarea>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="input-group d-flex justify-content-end text-center">

                                          <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">                       

                                          <input type="button" value="Finish editing" onclick="EditRound()" class="btn btn-success ">                       

                                      </div>

                                    </form>

                                </div>

                              </div>

                    </div>

                    <div class="ms-panel">

                        <div class="ms-panel-header">

                            <h6> Round Members </h6>

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

                                    <div class="">

                                        <div class="my-3 form-group">

                                            <label  >Assign Students</label>

                                            <div class="row">

                                                <div class="col-12">

                                                    <div class="form-group">

                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-8">

                                                                            <input type="text" name="" id="SearchStudentField"

                                                                                class="form-control"

                                                                                placeholder="Search by name or phone">

                                                                        </div>

                                                                        <div class="col-4">

                                                                            <button type="button" name="" id="SearchStudentBTN"

                                                                                class="btn mt-0 py-2 btn-block btn-dark">Search</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 p-3 border">
                                                                    <form action="{{url("/Admin/Rounds/$RoundSelected->RoundId/Upload")}}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            <label for="formFile" class="form-label">Assign Using an Excel File</label>
                                                                            <input class="form-control" type="file" name="excelfile">
                                                                        </div>
                                                                        <button type="submit" name="" id="SearchStudentBTN"
                                                                            class="btn mt-0 py-2 btn-success"><i class="far fa-file-excel"></i> 
                                                                            Upload
                                                                        </button>
                                                                    </form>

                                                                </div>

                                                                <div class="col-6">

                                                                    <ul id="filtered_Students" class="ms-followers ms-list ms-scrollable ps ps--active-x">

                                                                    </ul>

                                                                </div>
                                                            </div>
                                                            


                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="my-2" id="addNewStudentWrapper" style="display: none">

                                        <form action="">

                                                <div class="row ms-list pt-3">

                                                        <div class="col-md-6">

                                                            <div class="form-group">

                                                                <label  >Student_Name_En</label>

                                                                <div class="input-group">

                                                                    <input type="text" id="Student_Name_En" class="form-control"

                                                                        placeholder="Student_Name_En">

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">

                                                                <label  >Student_Name_Ar</label>

                                                                <div class="input-group">

                                                                    <input type="text" id="Student_Name_Ar" class="form-control"

                                                                        placeholder="Student_Name_Ar">

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">

                                                                <label  >Student_mobile</label>

                                                                <div class="input-group">

                                                                    <input type="text" id="Student_mobile" class="form-control"

                                                                        placeholder="Student_mobile">

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-12 text-center">

                                                            <input type="submit" value="Add" class="btn btn-primary">

                                                        </div>

                                                    </div>

                                        </form>

                                    </div>

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

                                                            <a href="/Admin/Students/Profile/{{$Student->StudentId}}" class="btn btn-success">

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

                                <div role="tabpanel" class="tab-pane fade" id="Instructors">

                                    <div class="d-flex w-100  justify-content-end">

                                        <a href="#" class="btn btn-success m-0 mb-2" data-toggle="modal"

                                            data-target="#addTrainer"> <i class="fas fa-plus"></i> Add Trainer</a>

                                    </div>

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

                                                            $i = 1

                                                        @endphp

                                                    @foreach ($TrainerRounds as $TrainerRound)

                                                       <tr>

                                                       <td>{{$i}}</td>

                                                          <td  class="img">

                                                                @if (!$TrainerRound->ImagePath)

                                                                <img style="max-width:40px;height:40px;width:40px !important;" class="img-circle profile" src="{{ asset('img/midal-back.jpg') }}">

                                                            @else

                                                                <img style="max-width:40px;height:40px;width:40px !important;" class="img-circle profile" src="{{ asset("http://kpi.seniorsteps.net/storage/app/public/$TrainerRound->ImagePath") }}">

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

                                                                <a href="{{$TrainerRound->Facebook}}" target="_blank" class="ms-btn-icon btn-pill btn-secondary"> <i class="fab fa-facebook-f    "></i> </a>

                                                                  @endif

                                                                  @if ($TrainerRound->Youtube)

                                                                      <a href="{{$TrainerRound->Youtube}}" target="_blank" class="ms-btn-icon btn-pill btn-danger"> <i class="fab fa-youtube    "></i> </a>

                                                                  @endif

                                                                  @if ($TrainerRound->Linkedin)

                                                                      <a href="{{$TrainerRound->Linkedin}}" target="_blank" class="ms-btn-icon btn-pill btn-info"> <i class="fab fa-linkedin"></i> </a>

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

        </div>

    </main>



    <div class="modal fade" id="addTrainer" tabindex="-1" role="dialog" aria-labelledby="addCourse">

            <div class="modal-dialog modal-dialog-centered modal " role="document">

                <div class="modal-content">

        

                <div class="modal-body">

        

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <div class="ms-auth-container row no-gutters">

                        <div class="col-12 p-3">

                            <form action="/Admin/Rounds/AddTrainer" method="POST">

                                {{ csrf_field() }}

                                <div class="form-group">

                                    <label for=""> Choose Trainer </label>

                                    <input type="hidden" name="RoundId" value="{{$RoundSelected->RoundId}}"/>

                                    <select name="TrainerId" id="" class="form-control">

                                        @foreach ($Trainers as $Trainer)

                                    <option value="{{$Trainer->TrainerId}}">{{$Trainer->FullnameEn}}</option>

                                        @endforeach

                                        

                                    </select>

                                </div>

                                <div class="input-group d-flex justify-content-end text-center">

                                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">                       

                                    <input type="submit" value="Add" class="btn btn-success ">                       

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

        

                </div>

                </div>

            </div>







            <div class="modal  fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="addTrainer">

                <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">

                  <div class="modal-content">

            

                    <div class="modal-body">

            

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                      <div class="ms-auth-container row no-gutters">

                          <div class="col-12 p-3">

                              <form action="/Admin/Students/Add" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="row">

                                      <div class=" form-group col-md-6">

                                          <label  >Student EN Name</label>

                                          <div class="input-group">

                                             <input type="text" name="FullnameEn" class="form-control" id="student_EN_Name" placeholder="student EN name">

                                          </div>

                                      </div>

                                      <div class=" form-group col-md-6">

                                          <label  >Student AR Name</label>

                                          <div class="input-group">

                                             <input type="text" name="FullnameAr" class="form-control" id="student_AR_Name" placeholder="student AR name">

                                          </div>

                                      </div>

                                      <div class=" form-group col-md-6">

                                          <label  >Student Email</label>

                                          <div class="input-group">

                                             <input type="email" name="Email" class="form-control" id="student_PR_mobile" placeholder="Student mobile">

                                          </div>

                                      </div>

                                      <div class=" form-group col-md-6">

                                        <label  >Student Mobile</label>

                                        <div class="input-group">

                                           <input type="text" name="Phone" class="form-control" id="student_PR_mobile" placeholder="Student mobile">

                                        </div>

                                    </div>

                                      <div class=" form-group col-md-6">

                                          <label  >Student Whatsapp</label>

                                          <div class="input-group">

                                             <input type="text" name="Whatsapp" class="form-control" id="student_Whatsapp" placeholder="Student Whatsapp">

                                          </div>

                                      </div>

                                      {{-- <div class=" form-group col-md-6">

                                          <label  >Student Phone</label>

                                          <div class="input-group">

                                             <input type="text" class="form-control" id="student_Phone" placeholder="Student Phone">

                                          </div>

                                      </div> --}}

                                      <div class=" form-group col-md-6">

                                          <label  >Student FB Account</label>

                                          <div class="input-group">

                                             <input type="text" name="Facebook" class="form-control" id="student_FB_Account" placeholder="Student FB Account">

                                          </div>

                                      </div>

                                      <div class=" form-group col-md-6">

                                          <label  >Student DOB</label>

                                          <div class="input-group">

                                             <input type="date" name="Birthdate" class="form-control" id="student_DOB" placeholder="Student DOB">

                                          </div>

                                      </div>

                                      <div class=" form-group col-md-6">

                                          <label  >Student Adderss</label>

                                          <div class="input-group">

                                             <input type="text" name="Address" class="form-control" id="student_Adderss" placeholder="Student Adderss">

                                          </div>

                                      </div>

                                      <div class=" form-group col-md-6">

                                          <label  >Student Education</label>

                                          <div class="input-group">

                                             <input type="text" name="Education" class="form-control" id="student_Education" placeholder="Student Education">

                                          </div>

                                      </div>

                                      <div class=" form-group col-md-6">

                                          <label  >Student University</label>

                                          <div class="input-group">

                                             <input type="text" name="University" class="form-control" id="student_University" placeholder="Student University">

                                          </div>

                                      </div>

                                      <div class=" form-group col-md-6">

                                          <label  >Student Faculty</label>

                                          <div class="input-group">

                                             <input type="text" name="Faculty" class="form-control" id="student_Faculty" placeholder="Student Faculty">

                                          </div>

                                      </div>

                                      <div class=" form-group col-md-6">

                                          <label  >Student Nationality</label>

                                          <div class="input-group">

                                             <input type="text" name="Nationality" class="form-control" id="student_Nationality" placeholder="Student Nationality">

                                          </div>

                                      </div>

                                      <div class=" form-group col-md-6">

                                          <label>Student Job</label>

                                          <div class="input-group">

                                             <input type="text" name="Job" class="form-control" id="student_JOB" placeholder="Student JOB">

                                          </div>

                                      </div>

                                      <div class=" form-group col-md-6">

                                          <label>Student Company</label>

                                          <div class="input-group">

                                             <input type="text" name="Company" class="form-control" id="student_Company" placeholder="Student Company">

                                          </div>

                                      </div>

                                      {{-- <div class=" form-group col-md-6">

                                          <label>Student Source_ID</label>

                                          <div class="input-group">

                                             <input type="text" class="form-control" id="student_Source_ID" placeholder="Student Source_ID">

                                          </div>

                                      </div> --}}

                                      <div class=" form-group col-md-6">

                                          <label>Student Image</label>

                                          <div class="input-group">

                                             <input type="file" name="ImagePath" id="student_img">

                                          </div>

                                      </div>

                                      <div class=" form-group col-md-12">

                                          <label  >note</label>

                                          <div class="input-group">

                                             <textarea id="trainer_note" name="AdditionalNotes" class="form-control" placeholder="Note" rows="4"></textarea>

                                          </div>

                                      </div>

                                </div>

                                <div class="input-group d-flex justify-content-end text-center">

                                  <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">                       

                                  <input type="submit" value="Add" class="btn btn-success ">                       

                              </div>

                              </form>

                          </div>

                        </div>

                      </div>

            

                    </div>

                  </div>

                </div>

   @endsection