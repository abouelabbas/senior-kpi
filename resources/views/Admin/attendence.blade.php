@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])

@section('content')

@if (session('success'))
<div class="alert alert-info">

    {{ session('success') }}

</div>

@endif
@if (session('cancelsession'))
<div class="alert alert-info">

    {{ session('cancelsession') }}

</div>

@endif
            <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>

                    <li class="breadcrumb-item"><a href="{{url("/Admin/Courses/$Round->RoundId")}}"> {{$Course->CourseNameEn}} - GR{{$Round->GroupNo}}</a></li>

                    <li class="breadcrumb-item active" aria-current="page"> Attendence</li>

                </ol>

            </nav>

      <div class="row">



        <div class="col-md-12">



            <div class="ms-panel">

                <div class="ms-panel-header">

                <h2>{{$Course->CourseNameEn}} - GR{{$Round->GroupNo}}</h2>

                    <h6>Sessions List </h6>

                  

                </div>

                <div class="ms-panel-body">

                        <div class="d-flex w-100  justify-content-end">

                            <a href="#" class="btn btn-success m-0 mb-2"  data-toggle="modal" data-target="#addSession"> <i class="fas fa-plus"></i> Add new session</a> &nbsp; &nbsp;
                            <a href="{{url("/Admin/Exceptions/$Round->RoundId")}}" class="btn btn-info m-0 mb-2"> Students Exceptions</a> &nbsp; &nbsp;

                            <a href="/Admin/Rounds/{{$Round->RoundId}}/StopRound" class="btn btn-danger m-0 mb-2" > <i class="fas fa-times" style="color:#fff;"></i> Stop round</a>

                              </div>

                  <div class="table-responsive">

                    <table class="fixed-thead-width dattable table thead-dark w-100">

                      <thead>

                          <th>#</th>

                        <th>Session No </th>

                        <th>Date </th>

                        <th> note</th>

                        <th> Attendence</th>

                        <th> Actions</th>

                      </thead>

                      <tbody>

                          @php

                              $i = 1

                          @endphp

                       @foreach ($Sessions as $Session)

                       

                       <tr class="

                       

                       @if ($Session->IsCancelled == 1)
                       alert alert-danger
                       @else
                       @if (\Carbon\Carbon::today()->format('Y-m-d') < $Session->SessionDate)

                       alert alert-success 

                       @else

                       alert alert-dark

                       @endif
                       @endif

                       ">

                       <td>{{$i}}</td>

                        <td>{{$Session->SessionNumber}}</td>

                        

                        <td>{{$Session->SessionDate}}</td>

                       <td>{{$Session->Notes}}</td>

                           

                          <td>
                          @if($Session->IsCancelled == 1)
                          @else
                          <a href="/Admin/Rounds/Session/{{$Session->SessionId}}/Attendance" class="btn-outline-info btn"> <i class="fas fa-eye mr-1"></i>View</a>
@endif
                          </td>

                           

                          <td>
@if($Session->IsCancelled == 1)

                          <a href="/Admin/Session/Cancel/{{$Session->SessionId}}/Undo" class="btn-outline-danger btn"> <i class="fas fa-times"></i>Undo cancelling session</a>

@else
                          <a href="#" class="btn-outline-danger btn" data-toggle="modal"

data-target="#cancelModal{{$Session->SessionId}}"> <i class="fas fa-times"></i>Cancel session</a>

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

      <div class="modal fade" id="addSession" tabindex="-1" role="dialog" aria-labelledby="addCourse">

            <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">

              <div class="modal-content">

        

                <div class="modal-body">

        

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <div class="ms-auth-container row no-gutters">

                      <div class="col-12 p-3">

                          <form action="/Admin/Rounds/Sessions/Add" method="POST">

                            {{ csrf_field() }}

                              <div class="ms-auth-container row">

                              <input type="hidden" value="{{$RoundId}}" name="RoundId">

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

                                  {{-- <div class="col-md-6">

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

                                  </div> --}}

                                  <div class="col-md-6">

                                      <div class="form-group">

                                          <label for="note">Session Number</label>

                                          <div class="input-group">

                                              <input type="text" name="SessionNumber" id="round_Number" class="form-control"

                                                 placeholder="Session Number">

                                          </div>

                                      </div>

                                  </div>

                                  <div class="col-md-6">

                                      <div class="form-group">

                                          <label for="note">Session Date</label>

                                          <div class="input-group">

                                              <input type="date" name="SessionDate" id="round_ST_Date" data-toggle="datepicker" class="form-control"

                                                 placeholder="Round Start Date">

                                          </div>

                                      </div>

                                  </div>

                                  {{-- <div class="col-md-6">

                                      <div class="form-group">

                                          <label for="note">Round End Date</label>

                                          <div class="input-group">

                                              <input type="date" name="EndDate" id="round_ED_Date" data-toggle="datepicker" class="form-control" placeholder="Round End Date">

                                          </div>

                                      </div>

                                  </div> --}}

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

                                              <select name="TrainerId[]" multiple id="round_trainers_Assigned" class="form-control">

                                                  <option disabled>Trainers to be assigned</option>

                                              </select>

                                          </div>

                                      </div>

                                  </div>

                                  --}}

                                  <!--  Add Round days and times -->

                                  {{-- <div id="roundDT" class="w-100 my-3">

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

                                          <div class="input-group">

                                            <select name="" multiple class="form-control" id="selecteddays">

                                              <option disabled value=""> Round days.... </option>

                                            </select>

                                              </div></div>

                                      </div>

                                      <div class="w-100 my-1" id="added">

    

                                      </div>

    

    

                                  </div> --}}

                                  <!--  /Add Round days and times -->

{{--                                   

                                  <div class="col-md-6">

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

                                  {{-- <div class="col-md-6">

                                      <div class="form-group">

                                          <label for="note">Round Lab</label>

                                          <div class="input-group">

                                              <select name="" class="form-control" id="LabId">

                                                @foreach ($Labs as $Lab)

                                                <option value="{{$Lab->LabId}}"> lab {{$Lab->LabNumber}} </option>

                                                @endforeach

                                                 

                                                </select>

                                          </div>

                                      </div>

                                  </div> --}}

                                  

                                  {{-- <div class="col-md-6">

                                      <div class="form-group">

                                          <label for="note">Status</label>

                                          <div>

                                              <label class="ms-switch">

                                                  <input type="checkbox" id="active" checked="">

                                                  <span class="ms-switch-slider ms-switch-success round"></span>

                                              </label>

                                          </div>

                                      </div>

                                  </div> --}}

                                  <div class="col-md-12">

                                      <div class="form-group">

                                          <label for="note">Note</label>

                                          <div class="input-group">

                                              <textarea name="Notes" id="note" class="form-control"  

                                                  rows="5" placeholder="Note"></textarea>

                                          </div>

                                      </div>

                                  </div>

                              </div>

                              <div class="input-group d-flex justify-content-end text-center">

                                <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">                       

                                <input type="Submit" value="Add" class="btn btn-success ">                       

                            </div>

                          </form>

                      </div>

                    </div>

                  </div>

        

                </div>

              </div>

            </div>
@foreach($Sessions as $SessionModal)
            <div class="modal fade" id="cancelModal{{$SessionModal->SessionId}}" tabindex="-1" role="dialog" aria-labelledby="taskModal">

    <div class="modal-dialog modal-dialog-centered modal-auth" id="modal1" role="document">

      <div class="modal-content">


        <div class="modal-body">


          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

              aria-hidden="true">&times;</span></button>

          <div class="ms-auth-container row no-gutters">

            <div class="col-md-12">

              <div class="ms-auth-bg">

                <h1 class="text-white" style="text-align:center;">Are you sure you want to cancel this session?<br><a href="/Admin/Session/Cancel/{{$SessionModal->SessionId}}" class="btn-outline-danger btn proceed">Yes, Proceed it</a></h1>
                                   
              </div>
            </div>


          </div>

        </div>



      </div>

    </div>

  </div>
@endforeach
@endsection