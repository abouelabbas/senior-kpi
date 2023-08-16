@extends('Layouts/trainerkpi',['TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds])

@section('content')

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

              <li class="breadcrumb-item"><a href="/Trainer"><i class="material-icons">home</i> Home</a></li>

            <li class="breadcrumb-item active" aria-current="page"><a href="/Trainer/Courses/{{$Round->RoundId}}">{{$Course->CourseNameEn}} - {{$Round->GroupNo}} - Session #{{$Session->SessionNumber}}</a></li>

              <li class="breadcrumb-item active" aria-current="page">Extra Tasks</li>

            </ol>

          </nav>

      <div class="row">



        <div class="col-md-12">



          <div class="ms-panel">
            

            <div class="ms-panel-header">

                <h2>{{$Course->CourseNameEn}} - {{$Round->GroupNo}} </h2>

                <h6>Extra Tasks</h6>
            </div>


            <div class="ms-panel-body">
              <div class="d-flex justify-content-end">
                <a href="{{url("/Trainer/ExtraTask/$Round->RoundId/Add/$Session->SessionId")}}" class="btn btn-success mb-2 mt-0">Add Extra Task</a>&nbsp;
                {{-- <input type="submit" value="Save" id="savesessionprog" class="btn btn-success mb-2 mt-0"> --}}
                

            </div>

              <div class="table-responsive">

                <table id="prog"  class="dattable table table-striped thead-dark  w-100">

                  <thead>

                    <th>#</th>

                    <th class="text-left">Task Link</th>

                    <th class="text-left">Task Description</th>
                    {{-- <th class="text-left">Task Type</th> --}}

                    <th class="text-left">Task Level</th>

                    {{-- <th class="text-left">Task Link</th> --}}
                    <th class="text-left">Actions</th>

                    

                  </thead>

                  <tbody>

                    @php

                        $i = 1

                    @endphp

                      @foreach ($Tasks as $Task)
                          
                          <tr>

                            <td>{{$i}} </td>

                          <td>
                              <a href="{{url($Task->ExtraTaskLink)}}" class="btn btn-primary"><i class="fas fa-link"></i> Go to Task</a>

                            </td>
{{-- 
                        <td>
                          @switch($Cont->Type)
                            @case(0)
                            <span class="badge badge-danger text-white">Youtube videos</span>
                               
                              @break
                            @case(1)
                            <span class="badge badge-success text-white">Books</span>
                                 
                              @break
                            @case(2)
                            <span class="badge badge-info">Articles</span>
                                 
                              @break
                          
                            @default
                              
                          @endswitch
                        </td> --}}
                        <td>
                          <span data-toggle="tooltip" data-placement="top" title="{{$Task->ExtraTaskDescription}}">

                            {{$Task->ExtraTaskDesc}}
                    
      
                          </span>
                        </td>

                        
                        <td>
                          @switch($Task->ExtraTaskLevel)
                            @case(0)
                            <span class="badge badge-success text-white">Beginner</span>
                               
                              @break
                            @case(1)
                            <span class="badge badge-primary text-white">Intermediate</span>
                                
                              @break
                            @case(2)
                            <span class="badge badge-warning text-white">Professional</span>
                                
                              @break
                            @case(3)
                            <span class="badge badge-dark text-white">Expert</span>
                               
                              @break
                          
                            @default
                              
                          @endswitch
                        </td>
                        
                        <td>

                          <div class="p-1 d-inline-block">
                            <a href="{{url("/Trainer/ExtraTask/$Task->ExtraTaskId/Edit")}}" class="btn btn-info">
                          <i class="far fa-edit"></i>
                          </a>
                          </div>
                          <div class="p-1 d-inline-block">
                            <a href="{{url("/Trainer/ExtraTask/$Task->ExtraTaskId/Delete")}}" class="btn btn-danger">
                              <i class="fas fa-trash"></i>
                            </a>
                          </div>

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