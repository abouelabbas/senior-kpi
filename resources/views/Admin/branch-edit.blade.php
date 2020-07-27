@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="/Admin/Branches"> Branches</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Edit Branch</li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-md-12">

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>Edit Branch </h6>
                        </div>
                        <div class="ms-panel-body">
                                <form action="/Admin/Branches/Edit" method="POST">
{{ csrf_field() }}
                                <input type="hidden" value="{{$Branch->BranchId}}" name="BranchId" />                        
                                        <div class="ms-auth-container row">
                      
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Branch Name En</label>
                                                    <div class="input-group">
                                                    <input type="text" name="BranchNameEn" value="{{$Branch->BranchNameEn}}" id="Branch_Name" class="form-control"
                                                           placeholder="Branch Name En">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  >Branch Name Ar</label>
                                                        <div class="input-group">
                                                        <input type="text" name="BranchNameAr" value="{{$Branch->BranchNameEn}}" id="Branch_Name" class="form-control"
                                                               placeholder="Branch Name Ar">
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Branch Adress</label>
                                                    <div class="input-group">
                                                    <input type="text" name="BranchAddress" value="{{$Branch->BranchAddress}}" id="Branch_Adress" class="form-control"
                                                           placeholder="Branch Adress">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Branch Location</label>
                                                    <div class="input-group">
                                                        <input type="text" name="BranchLocation" value="{{$Branch->BranchLocation}}" id="Branch_Location" class="form-control"
                                                           placeholder="Branch Location">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                                          
                                        </div>
                                        <div class="input-group d-flex justify-content-end text-center">
                                            <a href="/Admin/Branches" class="btn btn-dark mx-2"> Cancel </a>                       
                                            <input type="submit" value="Save" class="btn btn-success ">                       
                                        </div>
                                    </form>
                        </div>
                    </div>
                   

                </div>

            </div>
    
            @endsection