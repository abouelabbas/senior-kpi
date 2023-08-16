@extends('Layouts.adminkpi')
@section('content')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="StudentsL.html"> Students</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Edit Student</li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-md-12">

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>Trainer Info </h6>
                        </div>
                        <div class="ms-panel-body">
                                <form action="/Admin/Students/Edit" method="POST">
                        {{ csrf_field() }}
                                    <div class="row">
                                        <div class=" form-group col-md-6">
                                            <label  >Student EN Name</label>
                                            <div class="input-group">
                                            <input type="hidden" name="StudentId" value="{{$Student->StudentId}}" />
                                               <input disabled type="text" value="{{$Student->FullnameEn}}" name="FullnameEn" class="form-control" id="student_EN_Name" placeholder="student EN name">
                                            </div>
                                        </div>
                                        <div class=" form-group col-md-6">
                                            <label  >Student AR Name</label>
                                            <div class="input-group">
                                               <input disabled type="text" value="{{$Student->FullnameAr}}" name="FullnameAr" class="form-control" id="student_AR_Name" placeholder="student AR name">
                                            </div>
                                        </div>
                                        <div class=" form-group col-md-6">
                                            <label  >Student Password</label>
                                            <div class="input-group">
                                               <input disabled type="password" value="{{$Student->Password}}" name="Password" class="form-control" id="student_PR_mobile" placeholder="Student mobile">
                                            </div>
                                        </div>
                                        <div class=" form-group col-md-6">
                                          <label  >Student Mobile</label>
                                          <div class="input-group">
                                             <input disabled type="text" name="Phone" value="{{$Student->Phone}}" class="form-control" id="student_PR_mobile" placeholder="Student mobile">
                                          </div>
                                      </div>
                                        <div class=" form-group col-md-6">
                                            <label  >Student Whatsapp</label>
                                            <div class="input-group">
                                               <input disabled type="text" name="Whatsapp" value="{{$Student->Whatsapp}}" class="form-control" id="student_Whatsapp" placeholder="Student Whatsapp">
                                            </div>
                                        </div>

                                                                                
                              
                              <div class=" form-group col-md-6">

                                  <label  >Certificate Name</label>

                                  <div class="input-group">

                                     <input type="text" name="CertificateName" disabled value="{{$Student->CertificateName}}" class="form-control" id="student_Whatsapp" placeholder="Student Certificate Name">

                                  </div>

                              </div>

                              <div class=" form-group col-md-6">

                                  <label  >GitHub Link</label>

                                  <div class="input-group">

                                     <input type="text" name="GithubLink" disabled value="{{$Student->GithubLink}}" class="form-control" id="student_Whatsapp" placeholder="Student GitHub Link">

                                  </div>

                              </div>

                              
                              <div class=" form-group col-md-6">

                                  <label  >Linkedin</label>

                                  <div class="input-group">

                                     <input type="text" name="Linkedin" disabled value="{{$Student->Linkedin}}" class="form-control" id="student_Whatsapp" placeholder="Student LinkedIn Profile">

                                  </div>

                              </div>
                              
                              <div class=" form-group col-md-6">

                                  <label  >Wuzzuf Link</label>

                                  <div class="input-group">

                                     <input type="text" name="Wuzzuf" disabled value="{{$Student->Wuzzuf}}" class="form-control" id="student_Whatsapp" placeholder="Student Wuzzuf Profile">

                                  </div>

                              </div>

{{--                               
                              <div class=" form-group col-md-6">

                                  <label  >Facebook</label>

                                  <div class="input-group">

                                     <input type="text" name="Facebook" value="{{$Student->Facebook}}" class="form-control" id="student_Whatsapp" placeholder="Student Whatsapp">

                                  </div>

                              </div> --}}
                              
                              <div class=" form-group col-md-6">

                                  <label  >Personal Email (Formal)</label>

                                  <div class="input-group">

                                     <input type="text" name="PersonalEmail" disabled value="{{$Student->PersonalEmail}}" class="form-control" id="student_Whatsapp" placeholder="Student Personal Email">

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
                                               <input disabled type="text" name="Facebook" value="{{$Student->Facebook}}" class="form-control" id="student_FB_Account" placeholder="Student FB Account">
                                            </div>
                                        </div>
                                        <div class=" form-group col-md-6">
                                            <label  >Student DOB</label>
                                            <div class="input-group">
                                               <input disabled type="date" name="Birthdate" value="{{$Student->Birthdate}}" class="form-control" id="student_DOB" placeholder="Student DOB">
                                            </div>
                                        </div>
                                        <div class=" form-group col-md-6">
                                            <label  >Student Adderss</label>
                                            <div class="input-group">
                                               <input disabled type="text" name="Address" value="{{$Student->Address}}" class="form-control" id="student_Adderss" placeholder="Student Adderss">
                                            </div>
                                        </div>
                                        <div class=" form-group col-md-6">
                                            <label  >Student Education</label>
                                            <div class="input-group">
                                               <input disabled type="text" name="Education"  value="{{$Student->Education}}" class="form-control" id="student_Education" placeholder="Student Education">
                                            </div>
                                        </div>
                                        <div class=" form-group col-md-6">
                                            <label  >Student University</label>
                                            <div class="input-group">
                                               <input disabled type="text" name="University"  value="{{$Student->University}}"  class="form-control" id="student_University" placeholder="Student University">
                                            </div>
                                        </div>
                                        <div class=" form-group col-md-6">
                                            <label  >Student Faculty</label>
                                            <div class="input-group">
                                               <input disabled type="text" name="Faculty" value="{{$Student->Faculty}}"  class="form-control" id="student_Faculty" placeholder="Student Faculty">
                                            </div>
                                        </div>
                                        <div class=" form-group col-md-6">
                                            <label  >Student Nationality</label>
                                            <div class="input-group">
                                               <input disabled type="text" name="Nationality" value="{{$Student->Nationality}}"  class="form-control" id="student_Nationality" placeholder="Student Nationality">
                                            </div>
                                        </div>
                                        <div class=" form-group col-md-6">
                                            <label>Student Job</label>
                                            <div class="input-group">
                                               <input disabled type="text" name="Job" value="{{$Student->Job}}"  class="form-control" id="student_JOB" placeholder="Student JOB">
                                            </div>
                                        </div>
                                        <div class=" form-group col-md-6">
                                            <label>Student Company</label>
                                            <div class="input-group">
                                               <input disabled type="text" name="Company" value="{{$Student->Company}}"  class="form-control" id="student_Company" placeholder="Student Company">
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
                                            {{-- <div class="input-group">
                                               <input disabled type="file" name="ImagePath" value="{{$Student->ImagePath}}"  id="student_img">
                                            </div> --}}
                                            <div class="input-group">
                                                    <div class="input-group mb-3">
                                                            <div class="custom-file">
                                                      <input type="file" disabled name="ImagePath" value="{{$Student->ImagePath}}" id="inputGroupFile03 student_img" class="custom-file-input disabled">
                                                      {{-- <input type="file" /> --}}
                                                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                                            </div>
                                                        </div>
                                        </div>
                                        <div class=" form-group col-md-12">
                                            <label  >note</label>
                                            <div class="input-group">
                                               <textarea disabled id="trainer_note" name="AdditionalNotes" class="form-control" placeholder="Note" rows="4">{{$Student->AdditionalNotes}}</textarea>
                                            </div>
                                        </div>
                                  </div>
                                        <div class="input-group d-flex justify-content-end text-center">
                                            <a href="/Admin/Students" class="btn btn-dark mx-2"> Cancel </a>                       
                                            <input type="submit" value="Save" class="btn btn-success ">                       
                                        </div>
                                      </form>
                        </div>
                    </div>
                    <div class="ms-panel">
                        
                            <div class="ms-panel-body">
                                    <div class="row no-gutters">
                                        <div class="col-md-2 col-sm-6">
                                            <ul class="nav nav-tabs d-flex nav-justified mb-4" role="tablist">
                                                <li role="presentation"><a href="#Roundes" aria-controls="Roundes" class="active show" role="tab" data-toggle="tab" aria-selected="true">Roundes</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active show" id="Roundes">
                                                   
                                            <div class="table-responsive">
                                                        <table  class="dattable table table-striped thead-dark  w-100">
                                                          <thead>
                                                              <th>#</th>
                                                            <th>Round </th>
                                                            <th>Start Date </th>
                                                            <th>Trainer </th>
                                                            <th>Branch </th>
                                                            <th>Lab </th>
                                                          </thead>
                                                          <tbody>
                                                              @php
                                                                  $i = 1
                                                              @endphp
                                                          @foreach ($Rounds as $Round)
                                                              <tr>
                                                              <td>{{$i}}</td>
                                                              <td>
                                                                <span>
                                        
                                                                  {{$Round->CourseNameEn}} GR {{$Round->GroupNo}}
                                                                </span>
                                                              </td>
                                                              <td> {{$Round->StartDate}} </td>
                                                              <td> <?php $i = 0; ?>
                                                                @foreach ($TrainerRounds as $Trainer)
                                                                    @if($Trainer->RoundId == $Round->RoundId)
                                                                    <?php  $i++ ?>
                                                                    @if($i > 1)
                                                                    , {{$Trainer->FullnameEn}}
                                                                    @else
                                                                    {{$Trainer->FullnameEn}}
                                                                    @endif
                                                                    @endif
                                                                    
                                                                @endforeach  
                                                                </td>
                                                              <td> {{$Round->BranchNameEn}} </td>
                                                              <td> Lab {{$Round->LabNumber}} </td>
                                                             
                                                             
                                                              
                                                             
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
            
@endsection