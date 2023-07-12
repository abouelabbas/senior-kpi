@extends('Layouts/trainerkpi',['TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds])

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

                    <li class="breadcrumb-item active" aria-current="page"> Task History</li>

                </ol>

            </nav>

      <div class="row">



        <div class="col-md-12">



            <div class="ms-panel">

                <div class="ms-panel-header">

                <h2>{{$Course->CourseNameEn}} - GR{{$Round->GroupNo}}</h2>

                    <h6>{{$Student->FullnameEn}} - Task #{{$Task->TaskId}} History </h6>

                  

                </div>

                <div class="ms-panel-body">


                  <div class="table-responsive ">

                    <table class="fixed-thead-width table-striped dattable table thead-dark w-100">

                      <thead>

                          <th>#</th>

                        <th>Task URL </th>

                        <th>Date </th>

                        <th> Notes</th>

                        <th> Comments</th>

                        <th> Grade</th>

                      </thead>

                      <tbody>

                          @php

                              $i = 1

                          @endphp

                       @foreach ($History as $TaskH)

                       

                       <tr>

                       <td>{{$i}}</td>

                        <td>{{$TaskH->TaskURL}}</td>

                        

                        <td>{{$TaskH->TaskDate}}</td>

                       <td>{{$TaskH->TaskNotes}}</td>
                       <td>{{$TaskH->TaskComment}}</td>
                       <td>{{$TaskH->IsGraded ? $TaskH->TaskGrade : "Not Graded"}}</td>

                           


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

  
@endsection