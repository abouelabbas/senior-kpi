@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')
@if (session('add'))
<div class="alert alert-info">
    {{ session('add') }}
</div>
@endif
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Admin"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="Admin/Courses"> Courses</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> {{$Course->CourseNameEn}}</li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-md-12">

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>{{$Course->CourseNameEn}} </h6>
                        </div>
                        <div class="ms-panel-body">
                                <form action="/Admin/CoursePostEdit" method="POST">
{{ csrf_field() }}
                                    <div class="ms-auth-container row">
                                    <input type="hidden" name="Id" value="{{$Course->CourseId}}">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="note">Course EN Name</label>
                                                    <div class="input-group">
                                                        <input type="text" name="CourseNameEn" id="course_EN_Name" class="form-control"
                                                            value="{{$Course->CourseNameEn}}"  >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="note">Course AR Name</label>
                                                    <div class="input-group">
                                                        <input type="text" name="CourseNameAr" id="course_AR_Name" class="form-control"
                                                            value="{{$Course->CourseNameAr}}"  >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="note">Course EN Description</label>
                                                    <div class="input-group">
                                                        <textarea name="DescriptionEn" id="course_EN_DESC" class="form-control"  
                                                            rows="5">{{$Course->DescriptionEn}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="note">Course AR Description</label>
                                                    <div class="input-group">
                                                        <textarea name="DescriptionAr" id="course_AR_DESC" class="form-control"  
                                                            rows="5">{{$Course->DescriptionAr}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="note">Course Hours</label>
                                                    <div class="input-group">
                                                        <input type="text" name="Duration" id="course_hourse" class="form-control" value="{{$Course->Duration}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="note">Course Cost</label>
                                                    <div class="input-group">
                                                        <input type="text" name="CourseCost" id="course_cost" class="form-control" value="{{$Course->CourseCost}}"
                                                             >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="note">Status</label>
                                                    <div>
                                                        <label class="ms-switch">
                                                            <input id="active" name="Active" type="checkbox"
                                                            @if ($Course->Active == 1)
                                                            checked="checked"
                                                            @else
                                                                
                                                            @endif
                                                            >
                                                            <span class="ms-switch-slider ms-switch-success round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="note">Note</label>
                                                    <div class="input-group">
                                                        <textarea name="Notes" id="note" class="form-control"  
                                                            rows="5">{{$Course->Notes}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group d-flex justify-content-end text-center">
                                                    <a href="course.html" class="btn btn-dark mx-2"> Cancel </a>                       
                                                    <input type="submit" value="Save" class="btn btn-success ">                       
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                        </div>
                    </div>
                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>{{$Course->CourseNameEn}} </h6>
                        </div>
                        <div class="ms-panel-body">
                            <div class="row no-gutters">
                                <div class="col-md-4 col-sm-8">
                                    <ul class="nav nav-tabs d-flex nav-justified mb-4" role="tablist">
                                        <li role="presentation"><a href="#Roundes" aria-controls="Roundes" class="active show" role="tab" data-toggle="tab" aria-selected="true">Roundes</a></li>
                                        <li role="presentation"><a href="#Instructors" aria-controls="Instructors" role="tab" data-toggle="tab" class="" aria-selected="false">Trainers </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active show" id="Roundes">
                                           
                                    <div class="table-responsive">
                                                <table  class="dattable table table-striped thead-dark  w-100">
                                                  <thead>
                                                      <th>#</th>
                                                    <th>Round </th>
                                                    <th>Start Date </th>
                                                    <th>Trainer </th>
                                                    <th>Branch </th>
                                                    <th>Lab </th>
                                                  </thead>
                                                  <tbody>
                                                      <?php $x = 1; ?>
                                                  @foreach ($Rounds as $Round)
                                                       <tr>
                                                       <td>{{$x}}</td>
                                                      <td>
                                                        <span>
                                
                                                          {{$Round->CourseNameEn}} GR {{$Round->GroupNo}}
                                                        </span>
                                                      </td>
                                                      <td> {{$Round->StartDate}} </td>
                                                      <td>
                                                          <?php $i = 0 ?>
                                                        @foreach ($TrainerRounds as $TrainerR)
                                                        @if ($TrainerR->RoundId == $Round->RoundId)
                                                            <?php  $i++ ?>
                                                            @if ($i > 1)
                                                            , {{$TrainerR->FullnameEn}}
                                                            @else
                                                            {{$TrainerR->FullnameEn}}
                                                            @endif
                                                             
                                                        @endif
                                                            
                                                        @endforeach  
                                                        </td>
                                                      <td> {{$Round->BranchNameEn}} </td>
                                                      <td> Lab {{$Round->LabNumber}} </td>
                                                     
                                                     
                                                      
                                                     
                                                    </tr>
                                                  <?php $x++;?>
                                                  @endforeach
                                                    
                                                   
                                                  
                                                   
                                                  </tbody>
                                                </table>  
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="Instructors">
                                        <div class="d-flex w-100  justify-content-end">
                                                <a href="#" class="btn btn-success m-0 mb-2"  data-toggle="modal" data-target="#addTrainer"> <i class="fas fa-plus"></i> Add Trainer</a>
                                            </div>    
                                    <div class="table-responsive">
                                                <table  class="dattable smal-tb table table-striped thead-dark  w-100">
                                                  <thead>
                                                      <th>#</th>
                                                    <th> </th>
                                                    <th>Trainer </th>
                                                    <th>Mobile </th>
                                                    <th> Social Links </th>
                                                    <th> </th>
                                                  </thead>
                                                  <tbody>
                                                      <?php $i = 1;?>
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
                                                                  <a href="{{$Trainer->Youtube}}" class="ms-btn-icon btn-pill btn-danger"> <i class="fab fa-youtube    "></i> </a>
                                                              @endif
                                                              @if ($Trainer->Linkedin)
                                                                  <a href="{{$Trainer->Linkedin}}" class="ms-btn-icon btn-pill btn-info"> <i class="fab fa-linkedin    "></i></a>
                                                              @endif
                                                              
                                                              
                                                              
                                                            </td>
                                                      <td>
                                                      <a href="/Admin/Trainers/Profile/{{$Trainer->TrainerId}}" class="btn btn-success">
                                                            View Profile
                                                        </a>
                                                        <a href="/Admin/Courses/{{$Course->CourseId}}/Topics/{{$Trainer->TrainerId}}" class="btn mx-1 btn-dark">
                                                            Course Topics
                                                        </a>
                                                       
                                                      </td>
                                                     
                                                      
                                                     
                                                    </tr>
                                                    <?php $i++; ?>
                                                  @endforeach
                                                    
                                                  
                                                    
                                                   
                                                  
                                                   
                                                  </tbody>
                                                </table>  
                                              </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="modal fade" id="addTrainer" tabindex="-1" role="dialog" aria-labelledby="addCourse">
            <div class="modal-dialog modal-dialog-centered modal " role="document">
                <div class="modal-content">
        
                <div class="modal-body">
        
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                            <form action="/Admin/Courses/Add/Trainer" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for=""> Choose Trainer </label>
                                    <input type="hidden" name="CourseId" value="{{$Course->CourseId}}" />
                                    <select name="TrainerId" id="" class="form-control">
                                        @foreach ($TrainersList as $TrainerList)
                                    <option value="{{$TrainerList->TrainerId}}">{{$TrainerList->FullnameEn}}</option>
                                            
                                        @endforeach
                                    </select>
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
@endsection