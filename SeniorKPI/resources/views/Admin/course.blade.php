@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
@if (session('statusupdate'))
<div class="alert alert-info">
    {{ session('statusupdate') }}
</div>
@endif
@if (session('statusDel'))
<div class="alert alert-info">
    {{ session('statusDel') }}
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
              <li class="breadcrumb-item active" aria-current="page"> Courses</li>
            </ol>
          </nav>
      <div class="row">

        <div class="col-md-12">

          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Courses List </h6>
            </div>
            <div class="ms-panel-body">
              <div class="d-flex w-100  justify-content-end">
                <a href="#" class="btn btn-success m-0 mb-2"  data-toggle="modal" data-target="#addCourse"> <i class="fas fa-plus"></i> Add new course</a>
              </div>
              <div class="table-responsive">
                <table  class="dattable table table-striped thead-dark  w-100">
                  <thead>
                    <th>#</th>
                    <th>Course Name </th>
                    <th>Hours </th>
                    <th>Cost </th>
                    <th>Active </th>
                    <th> </th>
                  </thead>
                  <tbody>
                    <?php $i= 1;?>
                  @foreach ($Courses as $Course)
                       <tr>
                       <td>{{$i}}</td>
                      <td>
                        <span data-toggle="tooltip" data-placement="top"  title="14/10/2019">

                        {{$Course->CourseNameEn}}
                        </span>
                      </td>
                      <td> {{$Course->Duration}} h </td>
                      <td> {{$Course->CourseCost}} L.E </td>
                      <td>
                        @if ($Course->Active == 1)
                            <p class="badge py-1 px-3 badge-success"> Yes </p> </td>
                        @else
                            <p class="badge py-1 px-3 badge-danger"> No </p> </td>
                        @endif 
                      <td>
                        <a href="/Admin/Courses/Edit/{{$Course->CourseId}}" class="ms-btn-icon btn-success" data-toggle="tooltip" data-placement="top"  title="edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                      <a href="/Admin/Courses/CourseDetails/{{$Course->CourseId}}" class="ms-btn-icon btn-warning" data-toggle="tooltip" data-placement="top"  title="details">
                            <i class="fas fa-table    "></i>
                        </a>
                      <a href="#" data-toggle="modal" data-target="#delCourse{{$Course->CourseId}}" class="ms-btn-icon btn-danger" data-toggle="tooltip" data-placement="top"  title="Delete">
                                <i class="fas fa-trash"></i>
                            </a>
                      </td>
                      <?php $i++; ?>
                  @endforeach     
                  </tbody>
                </table>  
              </div>
            </div>
          </div>
        
        </div>

      </div>
      <div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="addCourse">
          <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">
            <div class="modal-content">
      
              <div class="modal-body">
      
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="/Admin/AddCourse" method="POST">
                          {{ csrf_field() }}
                            <div class="ms-auth-container row">
          
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="note">Course EN Name</label>
                                        <div class="input-group">
                                            <input type="text" name="CourseNameEn" id="course_EN_Name" class="form-control"
                                               placeholder="Course AR Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="note">Course AR Name</label>
                                        <div class="input-group">
                                            <input type="text" name="CourseNameAr" id="course_AR_Name" class="form-control"
                                            placeholder="Course AR Name"  >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="note">Course EN Description</label>
                                        <div class="input-group">
                                            <textarea name="DescriptionEn" id="course_EN_DESC" class="form-control"  
                                                rows="5" placeholder="Course EN Description"  ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="note">Course AR Description</label>
                                        <div class="input-group">
                                            <textarea name="DescriptionAr" id="course_AR_DESC" class="form-control"  
                                                rows="5" placeholder="Course AR Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="note">Course Hours</label>
                                        <div class="input-group">
                                            <input type="text" name="Duration" id="course_hourse" class="form-control" placeholder="Course Hours"
                                                 >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="note">Course Cost</label>
                                        <div class="input-group">
                                            <input type="text" name="CourseCost" id="course_cost" class="form-control" placeholder="Course Cost"
                                                 >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="note">Status</label>
                                        <div>
                                            <label class="ms-switch">
                                                <input type="checkbox" id="active" name="Active" checked="">
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
                                                rows="5" placeholder="Note"></textarea>
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
          @foreach ($Courses as $CourseItem)
        <div class="modal fade" id="delCourse{{$CourseItem->CourseId}}" tabindex="-1" role="dialog" aria-labelledby="addCourse">
              <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">
                <div class="modal-content">
          
                  <div class="modal-body">
          
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                            <form action="/Admin/DeleteCourse" method="POST">
                              {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$Course->CourseId}}" />
                                Are you sure you want to delete {{$CourseItem->CourseNameEn}} course?
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