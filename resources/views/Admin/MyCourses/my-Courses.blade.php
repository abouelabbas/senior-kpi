@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])

@section('content')

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

              <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>

              <li class="breadcrumb-item active" aria-current="page">{{$Round->CourseNameEn}} G{{$Round->GroupNo}}</li>

            </ol>

          </nav>

      <div class="row">



        <div class="col-md-12">



          <div class="ms-panel">

            <div class="ms-panel-header">

              <h6>Courses List </h6>

            </div>

            <div class="ms-panel-body">

              <div class="table-responsive">

                <table  class="dattable table table-striped thead-dark  w-100">

                  <thead>

                    <th>Course Name </th>

                    <th> </th>

                    <th></th>

                    <th></th>

                    <th></th>
                    <th></th>

                  </thead>

                  <tbody>

                  {{-- @foreach ($TrainerRounds as $TrainerRound) --}}

                    {{-- @if ($TrainerRound->RoundId == $RoundId) --}}

                        <tr>

                    <td>

                      <span data-toggle="tooltip" data-placement="top"  title="14/10/2019">



                        {{$Round->CourseNameEn}} G{{$Round->GroupNo}}

                      </span>

                    </td>

                    <td>

                    <a href="/Admin/Course/{{$Round->RoundId}}/Students" class="text-primary">

                        <i class="fas fa-users    "></i> Students

                      </a>

                    </td>

                    <td>

                    <a href="/Admin/Rounds/{{$Round->RoundId}}/Attendance" class="text-dark">

                        <i class="fas fa-table"></i> Attendence

                      </a>

                    </td>

                    <td>

                      <a href="/Admin/Course/{{$Round->RoundId}}/Sessions" class="text-success">

                       <i class="fas fa-laptop-code    "></i> Sessions

                      </a>

                    </td>

                    <td>

                      <a href="/Admin/Course/{{$Round->RoundId}}/DoneTopics" class="text-info">

                       <i class="fas fa-thumbs-up"></i> Done Topics

                      </a>

                    </td>

                    <td>

                      <a href="{{url("/Admin/Round/$Round->RoundId/Extra")}}" class="text-info">

                       <i class="fas fa-plus"></i> Extra Content

                      </a>

                    </td>



                  </tr>

                    {{-- @endif



                  @endforeach --}}

                  {{-- @foreach ($HistoryRounds as $HistoryRound)

                  @if ($HistoryRound->RoundId == $RoundId)

                      <tr>

                  <td>

                    <span data-toggle="tooltip" data-placement="top"  title="14/10/2019">



                      {{$HistoryRound->CourseNameEn}} G{{$HistoryRound->GroupNo}}

                    </span>

                  </td>

                  <td>

                  <a href="/Admin/Course/{{$HistoryRound->RoundId}}/Students" class="text-primary">

                      <i class="fas fa-users    "></i> Students

                    </a>

                  </td>

                  <td>

                  <a href="/Admin/Course/{{$HistoryRound->RoundId}}/Attendance" class="text-dark">

                      <i class="fas fa-table"></i> Attendence

                    </a>

                  </td>

                  <td>

                  <a href="/Admin/Course/{{$HistoryRound->RoundId}}/Sessions" class="text-success">

                     <i class="fas fa-laptop-code    "></i> Sessions

                    </a>

                  </td>

                  <td>

                    <a href="/Admin/Course/{{$HistoryRound->RoundId}}/DoneTopics" class="text-info">

                     <i class="fas fa-thumbs-up    "></i> Done Topics

                    </a>

                  </td>



                </tr>

                  @endif



                @endforeach
 --}}




                  </tbody>

                </table>

              </div>

            </div>

          </div>



        </div>



      </div>



      @endsection