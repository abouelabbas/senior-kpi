@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="my-Courses.html">My Courses</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                  Attenence
              </li>
            </ol>
          </nav>
      <div class="row">

        <div class="col-md-12">

          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Sessions List </h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table class=" fixed-thead-width dattable table table-striped thead-dark  w-100">
                  <thead>
                    <th>Session Name </th>
                    <th> Attendence</th>
                  </thead>
                  <tbody>
                    @foreach ($Sessions as $Session)
                    <td>Session {{$Session->SessionNumber}}</td>
                        
                           
                    <td>
                    <a href="/Admin/Course/Attendence/Details/{{$Session->SessionId}}" class="text-info"> <i class="fas fa-eye    "></i> View</a>
                    </td>
                     
                   
                </tr>
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

  
  
  <!-- Task Modal -->
  <div class="modal fade" id="DoneTopics" tabindex="-1" role="dialog" aria-labelledby="DoneTopics">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
  
          <div class="modal-body">
  
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="ms-auth-container row no-gutters">
                <div class="col-12 p-5">
                  <form action="">
                   <div class="row">
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" checked="">
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> HTML </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" checked="">
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> CSS </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" checked="">
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> CSS3 </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> JavaScript </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                    
                   </div>
                  <div class="input-group text-center">
                      <input type="submit" value="Save" class="btn btn-success m-auto">                       
                  </div>
                  </form>
                </div>
              </div>
            </div>
  
          </div>
        </div>
      </div>



@endsection