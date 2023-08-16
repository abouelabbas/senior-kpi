@extends('Layouts/studentkpi',['StudentRounds'=>$StudentRounds])

@section('content')

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

              <li class="breadcrumb-item"><a href="/Student"><i class="material-icons">home</i> Home</a></li>

            <li class="breadcrumb-item active" aria-current="page"><a href="/Student/Course/{{$Round->RoundId}}">{{$Course->CourseNameEn}} - {{$Round->GroupNo}} - Session #{{$Session->SessionNumber}}</a></li>

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
                    <th class="text-left">Submit Task</th>

                    

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
                          <span data-toggle="tooltip" data-placement="top" title="{{$Task->ExtraTaskDesc}}">

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
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{$Task->ExtraTaskId}}">
                              <i class="fas fa-upload"></i> Upload Solution
                            </button>
                            
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$Task->ExtraTaskId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <form action="{{url("/Student/ExtraTask/Submission")}}" method="POST">

                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  @csrf
                                  <input type="hidden" name="StudentRoundId" value="{{$StudentRoundId}}">
                                  <input type="hidden" name="ExtraTaskId" value="{{$Task->ExtraTaskId}}">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Submission Link</label>
                                    <input type="text" class="form-control" value="{{$Task->SubmissionLink}}" name="SubmissionLink" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a valid link">
                                  </div>

                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Submission Notes</label>
                                    <textarea name="SubmissionNotes" class="form-control" placeholder="Enter the Submission Notes" id="" style="resize: auto;">{{$Task->SubmissionNotes}}</textarea>
                                  </div>



                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                              </form>

                            </div>
                          </div>
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