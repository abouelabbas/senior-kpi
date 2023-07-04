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

                    <li class="breadcrumb-item active" aria-current="page"> Attendance Exceptions</li>

                </ol>

            </nav>

      <div class="row">



        <div class="col-md-12">

          <form action="{{url("/Admin/Exceptions/Submission/$Round->RoundId")}}" method="post">
            @csrf
            <input type="hidden" name="RoundId" value="{{$Round->RoundId}}">
            <div class="ms-panel">

                <div class="ms-panel-header">

                <h2>{{$Course->CourseNameEn}} - GR{{$Round->GroupNo}}</h2>

                    <h6>Students Exceptions</h6>

                  

                </div>
                
                <div class="ms-panel-body">
                    <div class="d-flex w-100  justify-content-end">

                            

                            <button type="submit" class="btn btn-primary m-0 mb-2" >Save</button> &nbsp;&nbsp;
                              <a href="{{url("/Admin/Exceptions/Report/$Round->RoundId")}}" class="btn btn-success m-0 mb-2"><i class="fas fa-file-excel"></i> Excel Report</a>
                              </div>

                  <div class="table-responsive ">

                    <table class="fixed-thead-width table-striped dattable table thead-dark w-100">

                      <thead>

                          <th>#</th>

                        <th> Student Name </th>

                        <th class="w-50"> Exceptions </th>


                      </thead>

                      <tbody>

                          @php

                              $i = 1

                          @endphp

                       @foreach ($Students as $Student)

                       

                       <tr>

                       <td>{{$i}}</td>

                        <td>{{$Student->FullnameEn}}</td>
                        <td class="w-50">
                          <input type="hidden" name="exception[{{$i - 1}}][0]" value="{{$Student->StudentRoundsId}}">
                          <textarea style="resize: auto;" name="exception[{{$i - 1}}][1]" id="" cols="5" class="form-control" rows="10">{{$Student->ExceptionNotes}}</textarea>  
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

        

        </form>
            </div>



      </div>

  
@endsection