@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])

@section('content')

@if (session('failed'))

<div class="alert alert-danger">

    {{ session('failed') }}

</div>

@endif

@if (session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

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

                                <form action="/Admin/Trainers/EditProfile" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}

                                <input type="hidden" value="{{$Trainer->TrainerId}}" name="id">

                                        <div class="row">

                                          <div class="col-md-6">

                                              <div class="form-group">

                                                  <label for="note">Trainer EN Name</label>

                                                  <div class="input-group">

                                                  <input type="text" name="FullnameEn" value="{{$Trainer->FullnameEn}}" class="form-control" id="trainer_EN_Name" placeholder="Trainer EN name">

                                                  </div>

                                              </div>

                                              <div class="form-group">

                                                  <label for="note">Trainer AR Name</label>

                                                  <div class="input-group">

                                                  <input type="text" name="FullnameAr" value="{{$Trainer->FullnameAr}}" class="form-control" id="trainer_AR_Name" placeholder="Trainer AR name">

                                                  </div>

                                              </div>

                                              <div class="form-group">

                                                  <label for="note">Trainer Mobile</label>

                                                  <div class="input-group">

                                                  <input type="text" name="Phone" value="{{$Trainer->Phone}}" class="form-control" id="trainer_mobile" placeholder="Trainer mobile">

                                                  </div>

                                              </div>

                                              <div class="form-group">

                                                  <label for="note">Trainer Mobile2</label>

                                                  <div class="input-group">

                                                  <input type="text" name="SecondPhone" value="{{$Trainer->SecondPhone}}" class="form-control" id="trainer_mobile2" placeholder="Trainer mobile2">

                                                  </div>

                                              </div>

                                              <div class="form-group">

                                                  <label for="note">Trainer Address</label>

                                                  <div class="input-group">

                                                  <input type="text" name="Address" value="{{$Trainer->Address}}" class="form-control" id="trainer_address" placeholder="Trainer address">

                                                  </div>

                                              </div>

                                              <div class="form-group">

                                                  <label>Trainer Email</label>

                                                  <div class="input-group">

                                                  <input type="text" name="Email" value="{{$Trainer->Email}}" id="trainer_email" class="form-control" placeholder="trainer email">

                                                  </div>

                                              </div>



                                          </div>

                                          <div class="col-md-6">

                                              <div class="form-group">

                                                  <label>Trainer CV</label>

                                                  <div class="input-group mb-3">

                                                        <div class="custom-file">

                                                  <input type="file" name="resumeLink" value="{{$Trainer->resumeLink}}" id="inputGroupFile02 trainer_CV" class="custom-file-input">

                                                  {{-- <input type="file" /> --}}

                                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>

                                                        </div>

                                                    </div>

                                                  {{-- <div class="input-group">

                                                      

                                                  <input type="file" name="resumeLink" value="{{$Trainer->resumeLink}}" id="trainer_CV">

                                                  </div> --}}

                                              </div>

                                              <div class="form-group">

                                                  <label>Trainer Picture</label>

                                                  <div class="input-group">

                                                        <div class="input-group mb-3">

                                                                <div class="custom-file">

                                                          <input type="file" name="ImagePath" value="{{$Trainer->ImagePath}}" id="inputGroupFile03 trainer_CV" class="custom-file-input">

                                                          {{-- <input type="file" /> --}}

                                                                    <label class="custom-file-label" for="inputGroupFile03">Choose file</label>

                                                                </div>

                                                            </div>

                                                  {{-- <input type="file" name="ImagePath" value="{{$Trainer->ImagePath}}" id="trainer_Pic"> --}}

                                                  </div>

                                              </div>

                                              <div class="form-group">

                                                  <label>FaceBook</label>

                                                  <div class="input-group">

                                                  <input type="text" id="trainer_FB" name="Facebook" value="{{$Trainer->Facebook}}" class="form-control" placeholder="Trainer FaceBook Link">

                                                  </div>

                                              </div>

                                              <div class="form-group">

                                                  <label>Youtube</label>

                                                  <div class="input-group">

                                                  <input type="text" name="Youtube" value="{{$Trainer->Youtube}}" id="trainer_YT" class="form-control" placeholder="Trainer Youtube Link">

                                                  </div>

                                              </div>

                                              <div class="form-group">

                                                  <label>LinkedIn</label>

                                                  <div class="input-group">

                                                  <input type="text" name="Linkedin" value="{{$Trainer->Linkedin}}" id="trainer_Linked" class="form-control" placeholder="Trainer LinkedIn Link">

                                                  </div>

                                              </div>

                                              <div class="form-group">

                                                  <label for="note">note</label>

                                                  <div class="input-group">

                                                  <textarea id="trainer_note" name="AdditionalNotes" class="form-control" placeholder="Note" rows="4">{{$Trainer->AdditionalNotes}}</textarea>

                                                  </div>

                                              </div>

                                          </div>

                                        </div>

                                        <div class="col-md-12">

                                            <div class="input-group d-flex justify-content-end text-center">

                                                <a href="trainer.html" class="btn btn-dark mx-2"> Cancel </a>

                                                <input type="submit" value="Save" class="btn btn-success ">

                                            </div>

                                            </div>

                                      </form>

                        </div>

                    </div>

                    <div class="ms-panel">

                            <div class="ms-panel-header">

                                <h6>MeanStack </h6>

                            </div>

                            <div class="ms-panel-body">

                                <div class="row no-gutters">

                                    <div class="col-md-4 col-sm-8">

                                        <ul class="nav nav-tabs d-flex nav-justified mb-4" role="tablist">

                                            <li role="presentation"><a href="#Roundes" aria-controls="Roundes" class="active show" role="tab" data-toggle="tab" aria-selected="true">Roundes</a></li>

                                            <li role="presentation"><a href="#CoursesL" aria-controls="CoursesL" role="tab" data-toggle="tab" class="" aria-selected="false">Courses </a></li>

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

                                                        {{-- <th>Trainer </th> --}}

                                                        <th>Branch </th>

                                                        <th>Lab </th>

                                                      </thead>

                                                      <tbody>

                                                          <?php $i = 1; ?>

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

                                                          <?php $i++; ?>

                                                        @endforeach

                                                      </tbody>

                                                    </table>

                                        </div>

                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="CoursesL">

                                            <div class="d-flex w-100  justify-content-end">

                                                    <a href="#" class="btn btn-success m-0 mb-2"  data-toggle="modal" data-target="#addCourse"> <i class="fas fa-plus"></i> Add Course</a>

                                                </div>

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

                                                        <?php $x = 1; ?>

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

                                                                <a href=""  data-toggle="modal" data-target="#addexam{{$Course->CourseId}}" class="btn btn-info">

                                                                    Add exam

                                                                </a>

                                                            </td>







                                                          </tr>

                                                          <?php $x++; ?>

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



    <div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="addCourse">

            <div class="modal-dialog modal-dialog-centered modal " role="document">

                <div class="modal-content">



                <div class="modal-body">



                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <div class="ms-auth-container row no-gutters">

                        <div class="col-12 p-5">

                            <form action="/Admin/Trainer/AddTrainerToCourse" method="POST">

                                {{ csrf_field() }}

                                <div class="form-group">

                                    <label for=""> Choose Course </label>

                                <input type="hidden" name="TrainerId" value="{{$Trainer->TrainerId}}" />

                                    <select name="CourseId" id="" class="form-control">

                                        @foreach ($CoursesList as $CourseList)

                                            <option value="{{$CourseList->CourseId}}">{{$CourseList->CourseNameEn}}</option>

                                        @endforeach

                                    </select>

                                </div>

                            <div class="input-group text-center">

                                <input type="submit" value="Add" class="btn btn-success m-auto">

                            </div>

                            </form>

                        </div>

                    </div>

                </div>



                </div>

                </div>

            </div>

            @foreach ($Courses as $CourseModal)

        <div class="modal fade" id="addexam{{$CourseModal->CourseId}}" tabindex="-1" role="dialog" aria-labelledby="addCourse">

                    <div class="modal-dialog modal-dialog-centered modal " role="document">

                        <div class="modal-content">

        

                        <div class="modal-body">

        

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            <div class="ms-auth-container row no-gutters">

                                <div class="col-12 p-5">

                                    <form action="/Admin/Trainer/AddExam" method="POST">

                                        {{ csrf_field() }}

                                        <div class="form-group">

                                            <label for=""> Exam name en </label>

                                            <input type="hidden" name="CourseId" value="{{$CourseModal->CourseId}}" />

                                            <input type="hidden" name="TrainerId" value="{{$Trainer->TrainerId}}" />

                                            <input type="text" name="ExamNameEn" class="form-control" />



                                        </div>

                                        <div class="form-group">

                                                <label for=""> Exam name ar</label>

                                                

                                                <input type="text" name="ExamNameAr" class="form-control" />

    

                                            </div>

                                    <div class="input-group text-center">

                                        <input type="submit" value="Add" class="btn btn-success m-auto">

                                    </div>

                                    </form>

                                </div>

                            </div>

                        </div>

        

                        </div>

                        </div>

                    </div>

            @endforeach



            @endsection