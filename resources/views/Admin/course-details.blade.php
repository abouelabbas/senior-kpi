@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])

@section('content')

    



            <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>

                    <li class="breadcrumb-item"><a href="/Admin/Courses"> Courses</a></li>

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

                                <form action="">

                                        <div class="ms-auth-container row">

        

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Course EN Name</label>

                                                    <div class="input-group">

                                                        <input type="text" id="course_EN_Name" class="form-control"

                                                            value="{{$Course->CourseNameEn}}" readonly>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Course AR Name</label>

                                                    <div class="input-group">

                                                        <input type="text" id="course_AR_Name" class="form-control"

                                                            value="{{$Course->CourseNameAr}}" readonly>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Course EN Description</label>

                                                    <div class="input-group">

                                                        <textarea name="" id="course_EN_DESC" class="form-control" readonly

                                                            rows="5">{{$Course->DescriptionEn}}</textarea>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Course AR Description</label>

                                                    <div class="input-group">

                                                        <textarea name="" id="course_AR_DESC" class="form-control" readonly

                                                    rows="5">{{$Course->DescriptionAr}}</textarea>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Course Hours</label>

                                                    <div class="input-group">

                                                        <input type="text" id="course_hourse" class="form-control" value="{{$Course->Duration}}"

                                                            readonly>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Course Cost</label>

                                                    <div class="input-group">

                                                        <input type="text" id="course_cost" class="form-control" value="{{$Course->CourseCost}}"

                                                            readonly>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="note">Status</label>

                                                    <div>

                                                        <label class="ms-switch">

                                                            <input type="checkbox" disabled 

                                                            @if ($Course->Active == 1)

                                                                checked="checked"

                                                            @else

                                                                

                                                            @endif

                                                            >

                                                            <span class="ms-switch-slider ms-switch-info round"></span>

                                                        </label>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label for="note">Note</label>

                                                    <div class="input-group">

                                                        <textarea name="" id="note" class="form-control" readonly

                                                            rows="5">{{$Course->Notes}}</textarea>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </form>

                        </div>

                    </div>

                    <div class="ms-panel">

                        <div class="ms-panel-header">

                            <h6>MeanStack </h6>

                        </div>

                        <div class="ms-panel-body">

                            <div class="row no-gutters">

                                <div class="col-md-4 col-sm-8">

                                    <ul class="nav nav-tabs d-flex nav-justified mb-4" role="tablist">

                                        <li role="presentation"><a href="#Roundes" aria-controls="Roundes" class="active show" role="tab" data-toggle="tab" aria-selected="true">Roundes</a></li>

                                        <li role="presentation"><a href="#Trainers" aria-controls="Trainers" role="tab" data-toggle="tab" class="" aria-selected="false">Trainers </a></li>

                                    </ul>

                                </div>

                            </div>

                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane fade in active show" id="Roundes">

                                                <div class="table-responsive">

                                                        <table  class="dattable table table-striped thead-dark  w-100">

                                                          <thead>

                                                                <th># </th>

                                                                <th>Round </th>

                                                            <th>Start Date </th>

                                                            <th>Trainer </th>

                                                            <th>Branch </th>

                                                            <th>Lab </th>

                                                          </thead>

                                                          <tbody>

                                                              <?php $i = 1; ?>

                                                          @foreach ($Rounds as $Round)

                                                              <tr>

                                                              <td>{{$i}}</td>

                                                              <td>

                                                                <span>

                                        

                                                                  {{$Round->CourseNameEn}} GR {{$Round->GroupNo}}

                                                                </span>

                                                              </td>

                                                              <td> {{$Round->StartDate}} </td>

                                                              <td> {{$Round->FullnameEn}} </td>

                                                              <td> {{$Round->BranchNameEn}} </td>

                                                              <td> Lab {{$Round->LabNumber}} </td>

                                                             

                                                             

                                                              

                                                             

                                                            </tr>

                                                            <?php $i++; ?>

                                                          @endforeach

                                                            

                                                          

                                                            

                                                           

                                                          

                                                           

                                                          </tbody>

                                                        </table>  

                                            </div>

                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="Trainers">

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

                                                            <?php $x = 1; ?>

                                                                @foreach ($Trainers as $Trainer)

                                                                <tr>

                                                                    <td>{{$x}}</td>

                                                                  <td  class="img"> 

                                                                @if ($Trainer->ImagePath)

                                                                <img style="width:30px;height:30px" class="img-circle profile" src="{{ asset("http://kpi.seniorsteps.net/storage/app/public/$Trainer->ImagePath") }}">                                                                    

                                                                @else

                                                                <img style="width:30px;height:30px" class="img-circle profile" src="{{ asset('img/user.jpg') }}">

                                                                @endif      

                                                                </td>

                                                                <td>

                                                                

                                          {{$Trainer->FullnameEn}}

                                                                

                                                                </td>

                                                                <td> {{$Trainer->Phone}} </td>

                                                                <td> 
                                                                    @if ($Trainer->Facebook)

                                                                    <a href="{{$Trainer->Facebook}}" target="_blank" class="ms-btn-icon btn-pill btn-secondary"> <i class="fab fa-facebook-f    "></i> </a>
                
                                                                      @endif
                
                                                                      @if ($Trainer->Youtube)
                
                                                                          <a href="{{$Trainer->Youtube}}" target="_blank" class="ms-btn-icon btn-pill btn-danger"> <i class="fab fa-youtube    "></i> </a>
                
                                                                      @endif
                
                                                                      @if ($Trainer->Linkedin)
                
                                                                          <a href="{{$Trainer->Linkedin}}" target="_blank" class="ms-btn-icon btn-pill btn-info"> <i class="fab fa-linkedin    "></i> </a>
                
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

                                                              <?php $x++; ?>

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

            @endsection