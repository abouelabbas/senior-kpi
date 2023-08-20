@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Add Student Link-Video </li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-md-12">

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>Add Link/Video </h6>
                        </div>
                        <div class="ms-panel-body">
                                <form action="/Admin/Videos/Create" method="POST">
{{ csrf_field() }}
                                        <div class="ms-auth-container row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Title</label>
                                                    <div class="input-group">
                                                    <input type="text" name="StudentVideoTitle" id="" class="form-control"
                                                           placeholder="Enter a suitable title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  >Student Video/Link</label>
                                                        <div class="input-group">
                                                        <input type="text" name="StudentVideoLink" id="" class="form-control"
                                                               placeholder="Enter the reference link">
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Video/Link Type</label>
                                                    <div class="input-group">
                                                    <select class="form-select form-control" name="StudentVideoType" required aria-label="Default select example">
                                                        <option selected disabled>Choose a Content Type</option>
                                                        <option value="0">Youtube Video</option>
                                                        <option value="1">GitHub Link</option>
                                                        <option value="2">Google Drive Link</option>
                                                        <option value="3">Regular Link</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>                        
                                        </div>
                                        <div class="input-group d-flex justify-content-end text-center">
                                            <a href="{{url("/Admin")}}" class="btn btn-dark mx-2"> Cancel </a>                       
                                            <input type="submit" value="Save" class="btn btn-success ">                       
                                        </div>
                                    </form>
                        </div>
                    </div>
                   

                </div>

            </div>
    
            @endsection