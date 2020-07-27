@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="/Admin/Branches"> Branches</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Branch Detais</li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-md-12">

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>Branch Detais </h6>
                        </div>
                        <div class="ms-panel-body">
                                <form action="">
                        
                                        <div class="ms-auth-container row">
                      
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Branch Name</label>
                                                    <div class="input-group">
                                                        <input type="text" id="Branch_Name" disabled class="form-control"
                                                           placeholder="Branch Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Branch Adress</label>
                                                    <div class="input-group">
                                                        <input type="text" id="Branch_Adress" disabled class="form-control"
                                                           placeholder="Branch Adress">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Branch Location</label>
                                                    <div class="input-group">
                                                        <input type="text" id="Branch_Location" disabled class="form-control"
                                                           placeholder="Branch Location">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                                          
                                        </div>
                                    {{-- <div class="input-group text-center">
                                        <input type="submit" value="Save" class="btn btn-success m-auto">                       
                                    </div> --}}
                                    </form>
                        </div>
                    </div>
                   

                </div>

            </div>
           
@endsection