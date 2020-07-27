@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="/Admin/Labs"> Labs</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Lab Details</li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-md-12">

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>Lab Details</h6>
                        </div>
                        <div class="ms-panel-body">
                                <form action="">
                        
                                        <div class="ms-auth-container row">
                      
                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Lab Name</label>
                                                    <div class="input-group">
                                                        <input type="text" id="Lab_Name"  class="form-control" disabled
                                                           placeholder="Lab Name">
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Lab Number</label>
                                                    <div class="input-group">
                                                    <input type="text" value="{{$Lab->LabNumber}}" id="Lab_Number"  class="form-control" disabled
                                                           placeholder="Lab Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Lab Capacity</label>
                                                    <div class="input-group">
                                                    <input type="text" value="{{$Lab->LabCapacity}}" id="Lab_Capacity"  class="form-control" disabled
                                                           placeholder="Lab Capacity">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Branch Name</label>
                                                    <div class="input-group">
                                                    <input type="text" value="{{$Lab->BranchNameEn}}" id="Branch_Name"  class="form-control" disabled
                                                           placeholder="Branch Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                                    </form>
                        </div>
                    </div>
                   

                </div>

            </div>
           
@endsection