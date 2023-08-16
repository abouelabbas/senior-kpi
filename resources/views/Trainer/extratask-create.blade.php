@extends('Layouts/trainerkpi',['TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds])
@section('content')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Trainer"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="/Trainer/Branches"> {{$Course->CourseNameEn}} - G{{$Round->GroupNo}} - Session #{{$Session->SessionNumber}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Add Extra Task</li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-md-12">

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>Add Extra Task </h6>
                        </div>
                        <div class="ms-panel-body">
                                <form action="/Trainer/ExtraTask/Create" method="POST">
{{ csrf_field() }}
                                <input type="hidden" value="{{$Round->RoundId}}" name="RoundId" />                        
                                <input type="hidden" value="{{$Session->SessionId}}" name="SessionId" />                        
                                        <div class="ms-auth-container row">
                      
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  >Extra Task Link</label>
                                                    <div class="input-group">
                                                    <input type="text" name="ExtraTaskLink" id="" class="form-control"
                                                           placeholder="Enter a task link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  >Extra Task Description</label>
                                                        <div class="input-group">
                                                            <textarea name="ExtraTaskDesc" class="form-control" placeholder="Enter the description of the task" id="" style="resize: auto"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Content Type</label>
                                                    <div class="input-group">
                                                    <select class="form-select form-control" name="Type" required aria-label="Default select example">
                                                        <option selected disabled>Choose a Content Type</option>
                                                        <option value="0">Youtube Video</option>
                                                        <option value="1">Book</option>
                                                        <option value="2">Article</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Extra Task Level</label>
                                                    <div class="input-group">
                                                    <select class="form-select form-control" name="ExtraTaskLevel" required aria-label="Default select example">
                                                        <option selected disabled>Choose a Content Level</option>
                                                        <option value="0">Beginner</option>
                                                        <option value="1">Intermediate</option>
                                                        <option value="2">Professional</option>
                                                        <option value="3">Expert</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                                          
                                        </div>
                                        <div class="input-group d-flex justify-content-end text-center">
                                            <a href="{{url("/Trainer/Round/$Round->RoundId")}}" class="btn btn-dark mx-2"> Cancel </a>                       
                                            <input type="submit" value="Save" class="btn btn-success ">                       
                                        </div>
                                    </form>
                        </div>
                    </div>
                   

                </div>

            </div>
    
            @endsection