@extends('Layouts/studentkpi',['StudentRounds'=>$StudentRounds])

@section('content')

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

              <li class="breadcrumb-item"><a href="{{url("/Student")}}"><i class="material-icons">home</i> Home</a></li>

            <li class="breadcrumb-item active" aria-current="page"><a href="{{url("/Student/Course/$Round->RoundId")}}">{{$Course->CourseNameEn}} - {{$Round->GroupNo}}</a></li>

              <li class="breadcrumb-item active" aria-current="page">Extra Content</li>

            </ol>

          </nav>

      <div class="row">



        <div class="col-md-12">



          <div class="ms-panel">
            

            <div class="ms-panel-header">

                <h2>{{$Course->CourseNameEn}} - {{$Round->GroupNo}} </h2>

                <h6>Extra Content</h6>
            </div>
            


            <div class="ms-panel-body">
              <div class="alert alert-info" role="alert">
                New Feature : Extra Content is now available for all courses that you are enrolled in.
</div>

              <div class="d-flex justify-content-end">
                {{-- <input type="submit" value="Save" id="savesessionprog" class="btn btn-success mb-2 mt-0"> --}}
                

            </div>

              <div class="table-responsive">

                <table id="prog"  class="dattable table table-striped thead-dark  w-100">

                  <thead>

                    <th>#</th>

                    <th class="text-left">Content Name</th>

                    <th class="text-left">Type</th>

                    <th class="text-left">Level</th>

                    <th class="text-left">Content Link</th>

                    

                  </thead>

                  <tbody>

                    @php

                        $i = 1

                    @endphp

                      @foreach ($Content as $Cont)
                          
                          <tr>

                            <td>{{$i}} </td>

                          <td>

                              <span data-toggle="tooltip" data-placement="top" title="{{$Cont->ContentName}}">

    

                                {{$Cont->ContentName}}
                        

                              </span>

                            </td>

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
                        </td>

                        <td>
                          @switch($Cont->Level)
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
                          <a href="{{$Cont->ContentURL}}" class="btn btn-square btn-success has-icon" target="_blank">
                            <i class="fa fa-link"></i> 
                            Content Link
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