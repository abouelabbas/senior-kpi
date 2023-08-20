@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])

@section('content')

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

              <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>


              <li class="breadcrumb-item active" aria-current="page">Extra Content</li>

            </ol>

          </nav>

      <div class="row">



        <div class="col-md-12">



          <div class="ms-panel">
            

            <div class="ms-panel-header">

                <h2>Student Home Page</h2>

                <h6>Videos & Links</h6>
            </div>


            <div class="ms-panel-body">
              <div class="d-flex justify-content-end">
                <a href="{{url("/Admin/Videos/Add")}}" class="btn btn-success mb-2 mt-0">Add Videos & Links</a>&nbsp;
                {{-- <input type="submit" value="Save" id="savesessionprog" class="btn btn-success mb-2 mt-0"> --}}
                
            </div>

              <div class="table-responsive">

                <table id="prog"  class="dattable table table-striped thead-dark  w-100">

                  <thead>

                    <th>#</th>

                    <th class="text-left">Title</th>

                    <th class="text-left">Link</th>

                    <th class="text-left">Type</th>


                    <th class="text-left">Actions</th>

                    

                  </thead>

                  <tbody>

                    @php

                        $i = 1

                    @endphp

                      @foreach ($StudentVideos as $Video)
                          
                          <tr>

                            <td>{{$i}} </td>

                          <td>

                              <span data-toggle="tooltip" data-placement="top" title="{{$Video->StudentVideoTitle}}">

    

                                {{$Video->StudentVideoTitle}}
                        

                              </span>

                            </td>
                            
                        <td>
                          <a href="{{$Video->StudentVideoLink}}" class="btn btn-square btn-outline-primary has-icon" target="_blank">
                            <i class="fa fa-link"></i> 
                            Go to Resource
                        </td>

                        <td>
                          @switch($Video->StudentVideoType)
                            @case(0)
                            <span class="badge badge-danger text-white">Youtube videos</span>
                               
                              @break
                            @case(1)
                            <span class="badge badge-success text-white">GitHub Link</span>
                                 
                              @break
                            @case(2)
                            <span class="badge badge-info">Google Drive Link</span>
                                 
                              @break
                              
                            @case(3)
                            <span class="badge badge-info">Regular Link</span>
                                 
                              @break
                          
                            @default
                              
                          @endswitch
                        </td>

                        <td>

                          <div class="p-1 d-inline-block">
                            <a href="{{url("/Admin/Videos/Edit/$Video->StudentVideoId")}}" class="btn btn-info">
                          <i class="far fa-edit"></i>
                          </a>
                          </div>
                          <div class="p-1 d-inline-block">
                            <a href="{{url("/Admin/Videos/Delete/$Video->StudentVideoId")}}" class="btn btn-danger">
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