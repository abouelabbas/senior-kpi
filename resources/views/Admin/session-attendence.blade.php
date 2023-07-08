@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])

@section('content')



            <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>

                    <li class="breadcrumb-item"><a href="{{url("/Admin/Courses/$Round->RoundId")}}"> {{$Course->CourseNameEn}} - GR{{$Round->GroupNo}}</a></li>

                <li class="breadcrumb-item"><a href="{{url("/Admin/Rounds/$Round->RoundId/Attendance")}}"> Session Attendance</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Session Attendence</li>

                </ol>

            </nav>

      <div class="ms-panel">

        <div class="ms-panel-body">

        <h2>{{$Course->CourseNameEn}} - GR{{$Round->GroupNo}}</h2>

            <h4>SESSION : {{$Session->SessionNumber}}</h4>

            <hr>

          <div class="row">



            <div class="col-md-12">

             

    

    

              <div class="">

                <div class="ms-panel-header">

                  <h6>Attendence</h6>

                </div>

                <div class="ms-panel-body">

                  <div class="table-responsive">

                   <form action="">

                     <div class="d-flex mb-2 justify-content-end">

                        <input type="button" id="save-student"  value="Save" class="btn btn-primary">&nbsp; &nbsp; 
                        <a href="{{url("/Admin/Session/$Session->SessionId/AllAttend")}}" class="btn btn-info"> <i class="fas fa-check text-white"></i> Attend All</a> &nbsp; &nbsp;
                        <a href="{{url("/Admin/Session/$Session->SessionId/Attendance/Reset")}}" class="btn btn-info"> Reset Attendance</a> &nbsp; &nbsp;
                        <a href="{{url("/Admin/Session/$Session->SessionId/Attendance/Skip")}}" class="btn btn-info"> Skip Attendance</a> &nbsp; &nbsp;



                     </div>

                     <table id="StudentTable" class="dattable table table-striped thead-dark  w-100">

                      <thead>

                        <th>#</th>

                        <th>Name</th>

                        

                        <th>Attendence</th>

                        <th>Note</th>

                      </thead>

                      <tbody>

                   <?php $i = 1; ?>

                      @foreach ($Attendance as $Attend)

                          <tr>

                          <td style="width: 20px"> {{$i}}</td>

                          <td>{{$Attend->FullnameEn}}</td>

                         

                        

                          <td>

                          <input class="student" value="{{$Attend->StudentRoundsId}}" data-session="{{$SessionId}}" type="hidden">



                            <span class="d-inline-block mr-2">

                              <label class="ms-checkbox-wrap ms-checkbox-success">

                                <input  

                                @if ($Attend->IsAttend == 1)

                                    checked

                                @endif

                              type="radio" value="1" name="attendence{{$i}}">

                                <i class="ms-checkbox-check"></i>

                              </label>

                              <span> attended </span>

                            </span>
                             <span class="d-inline-block mr-2">

                              <label class="ms-checkbox-wrap ms-checkbox-success">

                                <input  

                                @if ($Attend->IsAttend == 2)

                                    checked

                                @endif

                              type="radio" value="2" name="attendence{{$i}}">

                                <i class="ms-checkbox-check"></i>

                              </label>

                              <span> attended online </span>

                            </span>

                            <span class="d-inline-block mr-2">

                              <label class="ms-checkbox-wrap ms-checkbox-success">

                                <input  

                                @if ($Attend->IsAttend == 3)

                                    checked

                                @endif

                              type="radio" value="3" name="attendence{{$i}}">

                                <i class="ms-checkbox-check"></i>

                              </label>

                              <span> Pre-join </span>

                            </span>

                            <span class="d-inline-block ">

                              <label class="ms-checkbox-wrap ms-checkbox-danger">

                                <input 

                                @if ($Attend->IsAttend == 0)

                                    checked

                                @endif

                              type="radio" value="0" name="attendence{{$i}}">

                                <i class="ms-checkbox-check"></i>

                              </label>

                              <span> Absent </span>

                            </span>

                             

                          </td>

                          <td >

                          <textarea name="" id="" rows="2" class="form-control notes" placeholder="note">{{$Attend->Notes}}</textarea>

                          </td>

                        </tr>

                        <?php $i++; ?>

                      @endforeach

                      

                       

                       

                      </tbody>

                    </table> 

                   </form> 

                  </div>

                </div>

              </div>

            

            </div>

            

          </div>

        </div>

      </div>

          

@endsection