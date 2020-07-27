@extends('Layouts.adminkpi')

@section('content')

@if (session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

@if (session('added'))

<div class="alert alert-success">

    {{ session('added') }}

</div>

@endif

@if (session('danger'))

<div class="alert alert-danger">

    {{ session('danger') }}

</div>

@endif

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

              <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>

              <li class="breadcrumb-item active" aria-current="page"> Students</li>

            </ol>

          </nav>

      <div class="row">



        <div class="col-md-12">



          <div class="ms-panel">

            <div class="ms-panel-header">

              <h6>Students List </h6>

            </div>

            <div class="ms-panel-body">

              <div class="d-flex w-100  justify-content-end">

                <a href="#" class="btn btn-success m-0 mb-2"  data-toggle="modal" data-target="#addStudent"> <i class="fas fa-plus"></i> Add Student</a>

              </div>

              <div class="table-responsive">

                <table  class="dattable table table-striped thead-dark  w-100">

                  <thead>

                    <th>#</th>

                    <th>Student Name </th>

                    <th> </th>

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

                      

                      <td>

                      <a href="/Admin/Students/Edit/{{$Student->StudentId}}" class="ms-btn-icon btn-success" data-toggle="tooltip" data-placement="top"  title="edit">

                            <i class="fas fa-pencil-alt"></i>

                        </a>

                      <a href="/Admin/Students/Details/{{$Student->StudentId}}" class="ms-btn-icon btn-warning" data-toggle="tooltip" data-placement="top"  title="details">

                            <i class="fas fa-table    "></i>

                        </a>

                        <a href="#" data-toggle="modal" data-target="#resetPass{{$Student->StudentId}}" class="ms-btn-icon btn-info" data-toggle="tooltip" data-placement="top"  title="Reset password">

                          <i class="fas fa-info"></i>

                      </a>

                      <a href="/Admin/Students/Delete/{{$Student->StudentId}}" class="ms-btn-icon btn-danger" data-toggle="tooltip" data-placement="top"  title="Delete">

                                <i class="fas fa-trash"></i>

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



    

    

  </main>

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

                                  {{-- <div class="input-group">

                                     <input type="file" name="ImagePath" id="student_img">

                                  </div> --}}

                                  <div class="input-group mb-3">

                                      <div class="custom-file">

                                <input type="file" name="ImagePath" id="inputGroupFile03 student_img" class="custom-file-input">

                                {{-- <input type="file" /> --}}

                                          <label class="custom-file-label" for="inputGroupFile03">Choose file</label>

                                      </div>

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



        @foreach ($Students as $st)

        <div class="modal  fade" id="resetPass{{$st->StudentId}}" tabindex="-1" role="dialog" aria-labelledby="addTrainer">

          <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">

            <div class="modal-content">

      

              <div class="modal-body">

      

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <div class="ms-auth-container row no-gutters">

                    <div class="col-12 p-3">

                        <form action="/Admin/Students/ResetPassword" method="POST" >

                          {{ csrf_field() }}                        

                        <input type="hidden" name="id" value="{{$st->StudentId}}" />

                          Do you really want to reset {{$st->FullnameEn}}'s password

                          <div class="input-group d-flex justify-content-end text-center">

                            <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">                       

                            <input type="submit" value="Yes, I'm sure" class="btn btn-success ">                       

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