@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="/Admin/Trainers"> Trainers</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Edit Trainer</li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-md-12">

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>Trainer Info </h6>
                        </div>
                        <div class="ms-panel-body">
                                <form action="">
                        
                                        <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="note">Trainer EN Name</label>
                                                  <div class="input-group">
                                                  <input type="text" value="{{$Trainer->FullnameEn}}" class="form-control" disabled id="trainer_EN_Name" placeholder="Trainer EN name">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="note">Trainer AR Name</label>
                                                  <div class="input-group">
                                                  <input type="text" value="{{$Trainer->FullnameAr}}" class="form-control" disabled id="trainer_AR_Name" placeholder="Trainer AR name">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="note">Trainer Mobile</label>
                                                  <div class="input-group">
                                                  <input type="text" value="{{$Trainer->Phone}}" class="form-control" disabled id="trainer_mobile" placeholder="Trainer mobile">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="note">Trainer Mobile2</label>
                                                  <div class="input-group">
                                                  <input type="text" value="{{$Trainer->SecondPhone}}" class="form-control" disabled id="trainer_mobile2" placeholder="Trainer mobile2">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="note">Trainer Address</label>
                                                  <div class="input-group">
                                                  <input type="text" value="{{$Trainer->Address}}" class="form-control" disabled id="trainer_address" placeholder="Trainer address">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label>Trainer Email</label>
                                                  <div class="input-group">
                                                  <input type="text" value="{{$Trainer->Email}}" id="trainer_email" class="form-control" disabled placeholder="trainer email">
                                                  </div>
                                              </div>
                                              
                                          </div>
                                          <div class="col-md-6">
                                              <!-- <div class="form-group">
                                                  <label>Trainer CV</label>
                                                  <div class="input-group">
                                                     <input type="file" disabled id="trainer_CV">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label>Trainer Picture</label>
                                                  <div class="input-group">
                                                     <input type="file" disabled id="trainer_Pic">
                                                  </div>
                                              </div> -->
                                              <div class="form-group">
                                                  <label>FaceBook</label>
                                                  <div class="input-group">
                                                  <input type="text" value="{{$Trainer->Facebook}}" id="trainer_FB" class="form-control" disabled placeholder="Trainer FaceBook Link">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label>Youtube</label>
                                                  <div class="input-group">
                                                  <input type="text" value="{{$Trainer->Youtube}}" id="trainer_YT" class="form-control" disabled placeholder="Trainer Youtube Link">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label>LinkedIn</label>
                                                  <div class="input-group">
                                                  <input type="text" value="{{$Trainer->Linkedin}}" id="trainer_Linked" class="form-control" disabled placeholder="Trainer LinkedIn Link">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="note">note</label>
                                                  <div class="input-group">
                                                     <textarea id="trainer_note" class="form-control" disabled placeholder="Note" rows="4">{{$Trainer->AdditionalNotes}}</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        
                                      </form>
                        </div>
                    </div>
                    <div class="ms-panel">
                        
                            <div class="ms-panel-body">
                                <div class="row no-gutters">
                                    <div class="col-md-4 col-sm-8">
                                        <ul class="nav nav-tabs d-flex nav-justified mb-4" role="tablist">
                                            <li role="presentation"><a href="#Courses" aria-controls="Trainers" class="active show" role="tab" data-toggle="tab" class="" aria-selected="false">Courses </a></li>
                                            <li role="presentation"><a href="#Roundes" aria-controls="Roundes"  role="tab" data-toggle="tab" aria-selected="true">Roundes</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade" id="Roundes">
                                            <div class="table-responsive">
                                                    <table  class="dattable table table-striped thead-dark  w-100">
                                                            <thead>
                                                                <th>#</th>
                                                              <th>Round </th>
                                                              <th>Start Date </th>
                                                              {{-- <th>Trainer </th> --}}
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
                                                                {{-- <td> Mohammad Gamal </td> --}}
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
                                    <div role="tabpanel" class="tab-pane fade in show active" id="Courses">
                                            <div class="table-responsive">
                                                    <table  class="dattable table table-striped thead-dark  w-100">
                                                            <thead>
                                                                <th>#</th>
                                                              <th>Course </th>
                                                              <th>Hours </th>
                                                              <th>Cost </th>
                                                              <th>Active </th>
                                                              <th> </th>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $x = 1
                                                                @endphp
                                                            @foreach ($Courses as $Course)
                                                                <tr>
                                                                <td>{{$x}}</td>
                                                                <td>
                                                                  <span>
                                          
                                                                    {{$Course->CourseNameEn}}
                                                                  </span>
                                                                </td>
                                                                <td> {{$Course->Duration}} h </td>
                                                                <td> {{$Course->CourseCost}} L.E </td>
                                                                <td> 
                                                                @if ($Course->Active != 1)
                                                                <p class="badge py-1 px-3 badge-danger"> No </p>
                                                                @else
                                                                <p class="badge py-1 px-3 badge-success"> Yes </p>
                                                                @endif    
                                                                </td>
                                                                <td>
                                                                 
                                                                  <a href="/Admin/Courses/{{$Course->CourseId}}/Topics/{{$Trainer->TrainerId}}" class="btn mx-1 btn-dark">
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