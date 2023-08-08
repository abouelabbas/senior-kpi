@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="/Admin/Branches"> {{$Course->CourseNameEn}} - G{{$Round->GroupNo}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Edit Extra Content</li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-md-12">

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>Edit Extra Content </h6>
                        </div>
                        <div class="ms-panel-body">
                                <form action="/Admin/ExtraContent/Edit" method="POST">
{{ csrf_field() }}
                                <input type="hidden" value="{{$Content->ContentId}}" name="ContentId" />                        
                                        <div class="ms-auth-container row">
                      
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Content Name</label>
                                                    <div class="input-group">
                                                    <input type="text" name="ContentName" value="{{$Content->ContentName}}" id="" class="form-control"
                                                           placeholder="Enter a suitable content name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  >Content URL</label>
                                                        <div class="input-group">
                                                        <input type="text" name="ContentURL" value="{{$Content->ContentURL}}" id="" class="form-control"
                                                               placeholder="Enter the reference link for the content">
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Content Type</label>
                                                    <div class="input-group">
                                                    <select class="form-select form-control" name="Type" required aria-label="Default select example">
                                                        <option disabled>Choose a Content Type</option>
                                                        <option value="0" 
                                                        @if($Content->Type == 0) selected @endif
                                                        >Youtube Video</option>
                                                        <option value="1"
                                                        @if($Content->Type == 1) selected @endif
                                                        >Book</option>
                                                        <option value="2"
                                                        @if($Content->Type == 2) selected @endif
                                                        >Article</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Content Level</label>
                                                    <div class="input-group">
                                                    <select class="form-select form-control" name="Level" required aria-label="Default select example">
                                                        <option disabled>Choose a Content Level</option>
                                                        <option value="0"
                                                        @if($Content->Level == 0) selected @endif
                                                        >Beginner</option>
                                                        <option value="1"
                                                        @if($Content->Level == 1) selected @endif
                                                        >Intermediate</option>
                                                        <option value="2"
                                                        @if($Content->Level == 2) selected @endif
                                                        >Professional</option>
                                                        <option value="3"
                                                        @if($Content->Level == 3) selected @endif
                                                        >Expert</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                                          
                                        </div>
                                        <div class="input-group d-flex justify-content-end text-center">
                                            <a href="{{url("/Admin/Round/$Round->RoundId")}}" class="btn btn-dark mx-2"> Cancel </a>                       
                                            <input type="submit" value="Save" class="btn btn-success ">                       
                                        </div>
                                    </form>
                        </div>
                    </div>
                   

                </div>

            </div>
    
            @endsection