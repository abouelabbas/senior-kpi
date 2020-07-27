@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds,'Notifications'=>$Notifications])
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Labs</li>
            </ol>
          </nav>
      <div class="row">

        <div class="col-md-12">

          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Labs List </h6>
            </div>
            <div class="ms-panel-body">
              <div class="d-flex w-100  justify-content-end">
                <a href="#" class="btn btn-success m-0 mb-2"  data-toggle="modal" data-target="#addLab"> <i class="fas fa-plus"></i> Add new lab</a>
              </div>
              <div class="table-responsive">
                <table  class="dattable table table-striped thead-dark  w-100">
                  <thead>
                    <th>#</th>
                    <th>Lab Name </th>
                    <th>Branch Name </th>
                    <th> </th>
                  </thead>
                  <tbody>
                    @php
                        $i = 1
                    @endphp
                  @foreach ($Labs as $Lab)
                      <tr>
                      <td>{{$i}}</td>
                      <td>
                        <span>
                          Lab {{$Lab->LabNumber}}
                        </span>
                      </td>
                      <td>
                        <span>
                           {{$Lab->BranchNameEn}}
                        </span>
                      </td>
                      
                      <td>
                      <a href="/Admin/Labs/Edit/{{$Lab->LabId}}" class="ms-btn-icon btn-success" data-toggle="tooltip" data-placement="top"  title="edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="/Admin/Labs/Details/{{$Lab->LabId}}" class="ms-btn-icon btn-warning" data-toggle="tooltip" data-placement="top"  title="details">
                            <i class="fas fa-table    "></i>
                        </a>
                      <a href="#" data-toggle="modal" data-target="#DeleteLab{{$Lab->LabId}}" class="ms-btn-icon btn-danger" data-toggle="tooltip" data-placement="top"  title="Delete">
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
  <div class="modal fade" id="addLab" tabindex="-1" role="dialog" aria-labelledby="addCourse">
        <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">
          <div class="modal-content">
    
            <div class="modal-body">
    
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="ms-auth-container row no-gutters">
                  <div class="col-12 p-3">
                      <form action="/Admin/Labs/Add" method="POST">
                        {{ csrf_field() }}
                          <div class="ms-auth-container row">
        
                              {{-- <div class="col-md-6">
                                  <div class="form-group">
                                      <label  >Lab Name</label>
                                      <div class="input-group">
                                          <input type="text" id="Lab_Name" class="form-control"
                                             placeholder="Lab Name">
                                      </div>
                                  </div>
                              </div> --}}
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label  >Lab Number</label>
                                      <div class="input-group">
                                          <input type="text" name="LabNumber" id="Lab_Number" class="form-control"
                                             placeholder="Lab Number">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label  >Lab Capacity</label>
                                      <div class="input-group">
                                          <input type="text" name="LabCapacity" id="Lab_Capacity" class="form-control"
                                             placeholder="Lab Capacity">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label  >Branch Name</label>
                                      <div class="input-group">
                                          <select name="BranchId" id="Branch_Name" class="form-control">
                                              @foreach ($Branches as $Branch)
                                                  <option value="{{$Branch->BranchId}}">{{$Branch->BranchNameEn}}</option>
                                              @endforeach
                                          </select>
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
        @foreach ($Labs as $MLab)
      <div class="modal fade" id="DeleteLab{{$MLab->LabId}}" tabindex="-1" role="dialog" aria-labelledby="addCourse">
            <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">
              <div class="modal-content">
        
                <div class="modal-body">
        
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="ms-auth-container row no-gutters">
                      <div class="col-12 p-3">
                      <form action="/Admin/Labs/Delete" method="POST">
                        {{ csrf_field() }}
                              Do you want really to delete Lab {{$MLab->LabNumber}}?
                              <input name="LabId" value="{{$MLab->LabId}}" type="hidden">
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