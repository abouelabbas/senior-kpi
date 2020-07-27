@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')
@if (session('added'))
<div class="alert alert-success">
    {{ session('added') }}
</div>
@endif
@if (session('deleted'))
<div class="alert alert-info">
    {{ session('deleted') }}
</div>
@endif
@if (session('danger'))
<div class="alert alert-danger">
    {{ session('danger') }}
</div>
@endif
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Trainers</li>
            </ol>
          </nav>
      <div class="row">

        <div class="col-md-12">

          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Trainers List </h6>
            </div>
            <div class="ms-panel-body">
              <div class="d-flex w-100  justify-content-end">
                <a href="#" class="btn btn-success m-0 mb-2"  data-toggle="modal" data-target="#addTrainer"> <i class="fas fa-plus"></i> Add Trainer</a>
              </div>
              <div class="table-responsive">
                  <table  class="dattable smal-tb table table-striped thead-dark  w-100">
                      <thead>
                          <th># </th>
                          <th> </th>
                        <th>Trainer </th>
                        <th>Mobile </th>
                        <th> Social Links </th>
                        <th> </th>
                      </thead>
                      <tbody>
                        @php
                            $i = 1
                        @endphp
                      @foreach ($Trainers as $Trainer)
                           <tr>
                           <td>{{$i}}</td>

                            <td  class="img"> 
                              @if (!$Trainer->ImagePath)
                                  <img style="max-width:40px;height:40px;width:40px !important;" class="img-circle profile" src="{{ asset('img/midal-back.jpg') }}">
                              @else
                                  <img style="max-width:40px;height:40px;width:40px !important;" class="img-circle profile" src="{{ asset("$Trainer->ImagePath") }}">
                              @endif </td>
                          <td>
                          
    
                              {{$Trainer->FullnameEn}}
                          
                          </td>
                          <td> {{$Trainer->Phone}} 
                          @if ($Trainer->SecondPhone)
                          , {{$Trainer->SecondPhone}}
                          @endif
                          </td>
                          <td> 
                            @if ($Trainer->Facebook)
                          <a href="{{$Trainer->Facebook}}" class="ms-btn-icon btn-pill btn-secondary"> <i class="fab fa-facebook-f    "></i> </a>
                            @endif
                            @if ($Trainer->Youtube)
                                <a href="{{$Trainer->Youtube}}" class="ms-btn-icon btn-pill btn-info"> <i class="fab fa-linkedin    "></i> </a>
                            @endif
                            @if ($Trainer->Linkedin)
                                <a href="{{$Trainer->Linkedin}}" class="ms-btn-icon btn-pill btn-danger"> <i class="fab fa-youtube    "></i> </a>
                            @endif
                            
                            
                            
                          </td>
                          <td>
                          <a href="/Admin/Trainers/EditProfile/{{$Trainer->TrainerId}}" class="ms-btn-icon btn-success" data-toggle="tooltip" data-placement="top"  title="edit">
                                  <i class="fas fa-pencil-alt"></i>
                              </a>
                              <a href="/Admin/Trainers/Details/{{$Trainer->TrainerId}}" class="ms-btn-icon btn-warning" data-toggle="tooltip" data-placement="top"  title="details">
                                  <i class="fas fa-table    "></i>
                              </a>
                              <a href="#" data-toggle="modal" data-target="#resetPass{{$Trainer->TrainerId}}" class="ms-btn-icon btn-info" data-toggle="tooltip" data-placement="top"  title="Reset password">
                                <i class="fas fa-info"></i>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#DelTrainer{{$Trainer->TrainerId}}" class="ms-btn-icon btn-danger" data-toggle="tooltip" data-placement="top"  title="Delete">
                                      <i class="fas fa-trash"></i>
                                  </a>
                           
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
  <div class="modal  fade" id="addTrainer" tabindex="-1" role="dialog" aria-labelledby="addTrainer">
        <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">
          <div class="modal-content">
    
            <div class="modal-body">
    
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="ms-auth-container row no-gutters">
                  <div class="col-12 p-3">
                      <form action="/Admin/Trainers/Add" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}                        
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="note">Trainer EN Name</label>
                                  {{-- <div class="input-group mb-3">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="inputGroupFile02"/>
                                          <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                      </div>
                                      <div class="input-group-append">
                                          <button class="btn btn-primary">Upload</button>
                                      </div>
                                  </div> --}}
                                  <div class="input-group">
                                     <input type="text" name="FullnameEn" class="form-control" id="trainer_EN_Name" placeholder="Trainer EN name">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="note">Trainer AR Name</label>
                                  <div class="input-group">
                                     <input type="text" name="FullnameAr" class="form-control" id="trainer_AR_Name" placeholder="Trainer AR name">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="note">Trainer Mobile</label>
                                  <div class="input-group">
                                     <input type="text" name="Phone" class="form-control" id="trainer_mobile" placeholder="Trainer mobile">
                                  </div>
                              </div>
                              {{-- <div class="form-group">
                                <label for="note">Trainer Password</label>
                                <div class="input-group">
                                   <input type="password" name="Password" class="form-control" id="trainer_mobile" placeholder="Trainer Password">
                                </div>
                            </div> --}}
                              <div class="form-group">
                                <label for="note">Trainer Birthdate</label>
                                <div class="input-group">
                                   <input type="date" name="Birthdate" class="form-control" id="trainer_mobile" placeholder="Trainer Birthdate">
                                </div>
                            </div>
                              <div class="form-group">
                                  <label for="note">Trainer Mobile2</label>
                                  <div class="input-group">
                                     <input type="text" name="SecondPhone" class="form-control" id="trainer_mobile2" placeholder="Trainer mobile2">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="note">Trainer Address</label>
                                  <div class="input-group">
                                     <input type="text" name="Address" class="form-control" id="trainer_address" placeholder="Trainer address">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label>Trainer Email</label>
                                  <div class="input-group">
                                     <input type="text" name="Email" id="trainer_email" class="form-control" placeholder="trainer email">
                                  </div>
                              </div>
                              
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Trainer CV</label>
                                  <div class="input-group mb-3">
                                      <div class="custom-file">
                                <input type="file" name="resumeLink" value="{{$Trainer->resumeLink}}" id="inputGroupFile02 trainer_CV" class="custom-file-input">
                                {{-- <input type="file" /> --}}
                                          <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label>Trainer Picture</label>
                                  <div class="input-group">
                                      <div class="input-group mb-3">
                                              <div class="custom-file">
                                        <input type="file" name="ImagePath" value="{{$Trainer->resumeLink}}" id="inputGroupFile03 trainer_CV" class="custom-file-input">
                                        {{-- <input type="file" /> --}}
                                                  <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                              </div>
                                          </div>
                                {{-- <input type="file" name="ImagePath" value="{{$Trainer->ImagePath}}" id="trainer_Pic"> --}}
                                </div>
                                  {{-- <div class="input-group">
                                     <input type="file" name="ImagePath" id="trainer_Pic">
                                  </div> --}}
                              </div>
                              <div class="form-group">
                                  <label>FaceBook</label>
                                  <div class="input-group">
                                     <input type="text" name="Facebook" id="trainer_FB" class="form-control" placeholder="Trainer FaceBook Link">
                                  </div>
                              </div>
                              <div class="form-group">
                                <label>Trainer job</label>
                                <div class="input-group">
                                   <input type="text" name="Job" id="trainer_FB" class="form-control" placeholder="Trainer Job">
                                </div>
                            </div>
                            <div class="form-group">
                              <label>Trainer Company</label>
                              <div class="input-group">
                                 <input type="text" name="Company" id="trainer_FB" class="form-control" placeholder="Trainer Company">
                              </div>
                          </div>
                              <div class="form-group">
                                  <label>Youtube</label>
                                  <div class="input-group">
                                     <input type="text" name="Youtube" id="trainer_YT" class="form-control" placeholder="Trainer Youtube Link">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label>LinkedIn</label>
                                  <div class="input-group">
                                     <input type="text" name="Linkedin" id="trainer_Linked" class="form-control" placeholder="Trainer LinkedIn Link">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="note">note</label>
                                  <div class="input-group">
                                     <textarea id="trainer_note" name="AdditionalNotes" class="form-control" placeholder="Note" rows="4"></textarea>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="input-group d-flex justify-content-end text-center">
                          <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">                       
                          <input type="submit" value="Add" class="btn btn-success ">                       
                      </div>
                      </form>
                  </div>
                </div>
              </div>
    
            </div>
          </div>
        </div>
    @foreach ($Trainers as $Tr)
      <div class="modal  fade" id="DelTrainer{{$Tr->TrainerId}}" tabindex="-1" role="dialog" aria-labelledby="addTrainer">
            <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">
              <div class="modal-content">
        
                <div class="modal-body">
        
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="ms-auth-container row no-gutters">
                      <div class="col-12 p-3">
                          <form action="/Admin/Trainers/Delete" method="POST" >
                            {{ csrf_field() }}                        
                          <input type="hidden" name="TrainerId" value="{{$Tr->TrainerId}}" />
                            Do you really want to delete {{$Tr->FullnameEn}}'s profile
                            <div class="input-group d-flex justify-content-end text-center">
                              <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">                       
                              <input type="submit" value="Yes, I'm sure" class="btn btn-success ">                       
                          </div>
                          </form>
                      </div>
                    </div>
                  </div>
        
                </div>
              </div>
            </div>
            <div class="modal  fade" id="resetPass{{$Tr->TrainerId}}" tabindex="-1" role="dialog" aria-labelledby="addTrainer">
              <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">
                <div class="modal-content">
          
                  <div class="modal-body">
          
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                            <form action="/Admin/Trainers/ResetPassword" method="POST" >
                              {{ csrf_field() }}                        
                            <input type="hidden" name="TrainerId" value="{{$Tr->TrainerId}}" />
                              Do you really want to reset {{$Tr->FullnameEn}}'s password
                              <div class="input-group d-flex justify-content-end text-center">
                                <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">                       
                                <input type="submit" value="Yes, I'm sure" class="btn btn-success ">                       
                            </div>
                            </form>
                        </div>
                      </div>
                    </div>
          
                  </div>
                </div>
              </div>
    @endforeach
       
        
        @endsection