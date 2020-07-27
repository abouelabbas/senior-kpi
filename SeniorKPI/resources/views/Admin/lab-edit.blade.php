@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="/Admin/Labs"> Labs</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Edit Lab</li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-md-12">

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>Edit Lab </h6>
                        </div>
                        <div class="ms-panel-body">
                                <form action="/Admin/Labs/Edit" method="POST">
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
                                        <input type="hidden" name="LabId" value="{{$Lab->LabId}}"/>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Lab Number</label>
                                                    <div class="input-group">
                                                    <input type="text" name="LabNumber" value="{{$Lab->LabNumber}}" id="Lab_Number" class="form-control"
                                                           placeholder="Lab Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Lab Capacity</label>
                                                    <div class="input-group">
                                                    <input type="text" name="LabCapacity" value="{{$Lab->LabCapacity}}" id="Lab_Capacity" class="form-control"
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
                                                                        <option 
                                                                        
                                                                        @if ($Branch->BranchId == $Lab->BranchId)
                                                                            checked="checked"
                                                                        @endif
                                                                        
                                                                        value="{{$Branch->BranchId}}">{{$Branch->BranchNameEn}}</option>
                                                                    @endforeach
                                                                </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group d-flex justify-content-end text-center">
                                            <a href="/Admin/Labs" class="btn btn-dark mx-2"> Cancel </a>                       
                                            <input type="submit" value="Save" class="btn btn-success ">                       
                                        </div>
                                    </form>
                        </div>
                    </div>
                   

                </div>

            </div>
         
@endsection