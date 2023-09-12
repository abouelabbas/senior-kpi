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

              <li class="breadcrumb-item active" aria-current="page"> Rounds</li>

            </ol>

          </nav>

      <div class="row">



        <div class="col-md-12">



          <div class="ms-panel">

            <div class="ms-panel-header">

              <h6>Rounds List </h6>

            </div>

            <div class="ms-panel-body">

              <div class="d-flex w-100  justify-content-end">

                <a href="#" class="btn btn-success m-0 mb-2"  data-toggle="modal" data-target="#addRound"> <i class="fas fa-plus"></i> Add new round</a>

              </div>

              <div class="table-responsive">

                <table  class="dattable table table-striped thead-dark  w-100">

                  <thead>

                    <th>#</th>

                    <th>Round Name </th>

                    <th> </th>

                  </thead>

                  <tbody>

                    @php

                        $i = 1

                    @endphp

                  @foreach ($Rounds as $Round)

                      <tr>

                        <td>{{$i}}</td>

                      <td>

                        <span data-toggle="tooltip" data-placement="top"  title="{{$Round->StartDate}}">

                          {{$Round->CourseNameEn}} GR {{$Round->GroupNo}}

                        </span>

                      </td>

                      

                      <td>

                        

                      <a href="/Admin/Rounds/{{$Round->RoundId}}/Attendance" class="ms-btn-icon btn-dark" data-toggle="tooltip" data-placement="top"  title="attendence">

                            <i class="fas fa-table    "></i>

                        </a>

                      <a href="/Admin/Rounds/Edit/{{$Round->RoundId}}" class="ms-btn-icon btn-success" data-toggle="tooltip" data-placement="top"  title="edit">

                            <i class="fas fa-pencil-alt"></i>

                        </a>

                      <a href="/Admin/Rounds/Details/{{$Round->RoundId}}" class="ms-btn-icon btn-warning" data-toggle="tooltip" data-placement="top"  title="details">

                            <i class="fas fa-table    "></i>

                        </a>
{{-- onclick="delette('this round');"  --}}
                        <a href="{{url("/Admin/Rounds/Delete/$Round->RoundId")}}" class="ms-btn-icon btn-danger" data-toggle="tooltip" data-placement="top"  title="Delete">

                                <i class="fas fa-trash"></i>

                            </a>

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

  <div class="modal fade" id="addRound" tabindex="-1" role="dialog" aria-labelledby="addCourse">

        <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">

          <div class="modal-content">

    

            <div class="modal-body">

    

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

              <div class="ms-auth-container row no-gutters">

                  <div class="col-12 p-3">

                      <form action="">

                        

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

                                          <select name="CourseId" class="form-control" id="CourseId">

                                            <option disabled selected>Select a course</option>

                                            @foreach ($Courses as $Course)

                                            <option value="{{$Course->CourseId}}"> {{$Course->CourseNameEn}} </option>

                                            @endforeach

                                          </select>

                                      </div>

                                  </div>

                              </div>

                              <div class="col-md-6">

                                  <div class="form-group">

                                      <label for="note">Round Number</label>

                                      <div class="input-group">

                                          <input type="text" name="GroupNo" id="round_Number" class="form-control"

                                             placeholder="Round Number">

                                      </div>

                                  </div>

                              </div>

                              <div class="col-md-6">

                                  <div class="form-group">

                                      <label for="note">Round Start Date</label>

                                      <div class="input-group">

                                          <input type="date" name="StartDate" id="round_ST_Date" data-toggle="datepicker" class="form-control"

                                             placeholder="Round Start Date">

                                      </div>

                                  </div>

                              </div>

                              <div class="col-md-6">

                                  <div class="form-group">

                                      <label for="note">Round End Date</label>

                                      <div class="input-group">

                                          <input type="date" name="EndDate" id="round_ED_Date" data-toggle="datepicker" class="form-control" placeholder="Round End Date">

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

                              <div class="col-md-6">

                                  <div class="form-group">

                                      <label for="note">Assigned Trainers</label>

                                      <div class="input-group">

                                          <select name="TrainerId[]" multiple id="round_trainers_assigned" class="form-control">

                                              <option disabled>Trainers to be assigned</option>

                                          </select>

                                      </div>

                                  </div>

                              </div>

                             

                              <!--  Add Round days and times -->

                              <div id="roundDT" class="w-100 my-3">

                                  <div class="col-md-12">

                                      <div class="form-group">

                                          <label for="note">Choose Round Days</label>

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

                                            <option value="{{$Lab->LabId}}"> lab {{$Lab->LabNumber}} - {{$Lab->BranchNameEn}} </option>

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

                                              rows="5" placeholder="Note"></textarea>

                                      </div>

                                  </div>

                              </div>

                          </div>

                          <div class="input-group d-flex justify-content-end text-center">

                            <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">                       

                            <input type="button" value="Save round" onclick="SaveRound()" class="btn btn-success ">                       

                        </div>

                      </form>

                  </div>

                </div>

              </div>

    

            </div>

          </div>

        </div>

    

        @endsection