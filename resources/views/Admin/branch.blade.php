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
              <li class="breadcrumb-item active" aria-current="page"> Branchs</li>
            </ol>
          </nav>
      <div class="row">

        <div class="col-md-12">

          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Branchs List </h6>
            </div>
            <div class="ms-panel-body">
              <div class="d-flex w-100  justify-content-end">
                <a href="#" class="btn btn-success m-0 mb-2"  data-toggle="modal" data-target="#addBranch"> <i class="fas fa-plus"></i> Add new Branch</a>
              </div>
              <div class="table-responsive">
                <table  class="dattable table table-striped thead-dark  w-100">
                  <thead>
                    <th>#</th>
                    <th>Branch Name </th>
                    <th> </th>
                  </thead>
                  <tbody>
                    @php
                        $i = 1
                    @endphp
                  @foreach ($Branches as $Branch)
                      <tr>
                      <td>{{$i}}</td>
                      <td>
                        <span>
                          {{$Branch->BranchNameEn}}
                        </span>
                      </td>
                      
                      <td>
                      <a href="/Admin/Branches/Edit/{{$Branch->BranchId}}" class="ms-btn-icon btn-success" data-toggle="tooltip" data-placement="top"  title="edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                      <a href="/Admin/Branches/Details/{{$Branch->BranchId}}" class="ms-btn-icon btn-warning" data-toggle="tooltip" data-placement="top"  title="details">
                            <i class="fas fa-table    "></i>
                        </a>
                      <a href="#"  data-toggle="modal" data-target="#DeleteBranch{{$Branch->BranchId}}" class="ms-btn-icon btn-danger" data-toggle="tooltip" data-placement="top"  title="Delete">
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
  <div class="modal fade" id="addBranch" tabindex="-1" role="dialog" aria-labelledby="addCourse">
        <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">
          <div class="modal-content">
    
            <div class="modal-body">
    
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="ms-auth-container row no-gutters">
                  <div class="col-12 p-3">
                      <form action="/Admin/Branches/Add" method="POST">
                        {{ csrf_field() }}
                          <div class="ms-auth-container row">
        
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label  >Branch Name En</label>
                                      <div class="input-group">
                                          <input name="BranchNameEn" type="text" id="Branch_Name" class="form-control"
                                             placeholder="Branch Name En">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label  >Branch Name Ar</label>
                                      <div class="input-group">
                                          <input type="text" name="BranchNameAr" id="Branch_Name" class="form-control"
                                             placeholder="Branch Name Ar">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label  >Branch Adress</label>
                                      <div class="input-group">
                                          <input type="text" name="BranchAddress" id="Branch_Adress" class="form-control"
                                             placeholder="Branch Adress">
                                      </div>
                                  </div>
                              </div>
                              
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label  >Branch Location</label>
                                      <div class="input-group">
                                          <input type="text" name="BranchLocation" id="Branch_Location" class="form-control"
                                             placeholder="Branch Location">
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
        @foreach ($Branches as $MBranch)
      <div class="modal fade" id="DeleteBranch{{$MBranch->BranchId}}" tabindex="-1" role="dialog" aria-labelledby="addCourse">
            <div class="modal-dialog modal-lg modal-dialog-centered modal " role="document">
              <div class="modal-content">
        
                <div class="modal-body">
        
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="ms-auth-container row no-gutters">
                      <div class="col-12 p-3">
                          <form action="/Admin/Branches/Delete" method="POST">
                            {{ csrf_field() }}
                          <input type="hidden" name="BranchId" value="{{$MBranch->BranchId}}" />
                              Do you really want to delete {{$MBranch->BranchNameEn}}?
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
        @endforeach
    
        @endsection