@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])

@section('content')

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

              <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>

            <li class="breadcrumb-item active" aria-current="page"><a href="/Admin/Courses/{{$Round->RoundId}}">{{$Course->CourseNameEn}} - {{$Round->GroupNo}}</a></li>

              <li class="breadcrumb-item active" aria-current="page">Session progress</li>

            </ol>

          </nav>

      <div class="row">



        <div class="col-md-12">



          <div class="ms-panel">
            

            <div class="ms-panel-header">

                <h2>{{$Course->CourseNameEn}} - {{$Round->GroupNo}} </h2>

                <h6>Session {{$Session->SessionNumber}} List -  {{ date('d-m-Y', strtotime($Session->SessionDate))}}</h6>

            </div>


            <div class="ms-panel-body">
              <div class="d-flex justify-content-end">
                <a href="{{url("/Admin/Session/$Session->SessionId/Practice/File")}}" class="btn btn-success mb-2 mt-0">Download Session Practice Report</a>&nbsp;
                {{-- <input type="submit" value="Save" id="savesessionprog" class="btn btn-success mb-2 mt-0"> --}}
                

            </div>

              <div class="table-responsive">

                <table id="prog"  class="dattable table table-striped thead-dark  w-100">

                  <thead>

                    <th>#</th>

                    <th class="text-left">Student name </th>

                    <th class="text-left"> State</th>

                    <th class="text-left">Practice Link </th>

                    <th class="text-left">Comment/Notes</th>

                    

                  </thead>

                  <tbody>

                    @php

                        $i = 1

                    @endphp

                      @foreach ($Tasks as $Task)
                          
                          <tr>

                            <td>{{$i}} </td>

                          <td>

                              <span data-toggle="tooltip" data-placement="top" title="{{$Task->FullnameEn}}">

    

                                {{$Task->FullnameEn}}
                        

                              </span>

                            </td>

                        <td>
                          @if($Task->PracticeURL == null)
                          <i class="fa fa-times"></i> 
                          @else
                          <i class="fas fa-check"></i>
                            @endif
                        </td>

                        <td> 
                              @if($Task->PracticeURL != null)
                              <a href="{{$Task->PracticeURL}}" target="_blank" class="btn btn-square btn-outline-primary has-icon" >



                                <i class="fa fa-download"></i> 



                                Go to Practice Files

                            </a>

                            @endif 


                        </td>
                        



                        <td>
                          @if($Task->PracticeURL != null)
                           <input type="hidden" name="id" class="taskid" value="{{$Task->TaskId}}">
                           <textarea class="form-control comment p-changable" rows="3">{{$Task->PracticeComment}}</textarea>
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

    </div>



  </main>


  
@endsection