@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')
@if (session('content'))
<div class="alert alert-success">
    {{ session('content') }}
</div>
@endif
@if (session('delete'))
<div class="alert alert-danger">
    {{ session('delete') }}
</div>
@endif
        <div class="row">

            <div class="col-md-12">

                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h5>Topics </h5>
                        <h6>{{$Trainer->FullnameEn}} - {{$Course->CourseNameEn}} </h6>
                    </div>
                    <div class="ms-panel-body">
                        <!--  -->
                        <div class="d-flex justify-content-end">
                            {{-- <a href="#" class="btn btn-dark has-chevron" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="true">
                                Add
                            </a> --}}
                            <a href=""  data-toggle="modal" data-target="#addexam" class="btn m-2 btn-primary">

                                Add exam

                            </a>
                            <div class="modal fade" id="addexam" tabindex="-1" role="dialog" aria-labelledby="addCourse">

                    <div class="modal-dialog modal-dialog-centered modal " role="document">

                        <div class="modal-content">

        

                        <div class="modal-body">

        

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            <div class="ms-auth-container row no-gutters">

                                <div class="col-12 p-5">

                                    <form action="/Admin/Trainer/AddExam" method="POST">

                                        {{ csrf_field() }}

                                        <div class="form-group">

                                            <label for=""> Exam name en </label>

                                            <input type="hidden" name="CourseId" value="{{$Course->CourseId}}" />

                                            <input type="hidden" name="TrainerId" value="{{$Trainer->TrainerId}}" />

                                            <input type="text" name="ExamNameEn" class="form-control" />



                                        </div>

                                        <div class="form-group">

                                                <label for=""> Exam name ar</label>

                                                

                                                <input type="text" name="ExamNameAr" class="form-control" />

    

                                            </div>

                                    <div class="input-group text-center">

                                        <input type="submit" value="Add" class="btn btn-success m-auto">

                                    </div>

                                    </form>

                                </div>

                            </div>

                        </div>

        

                        </div>

                        </div>

                    </div>
                            

                            {{-- <input type="submit" class="btn btn-success my-2" value="Save"> --}}
                        </div>
                        <hr/>
                            {{-- <form action="{{url("/Admin/Courses/$CourseId/Topics/Sheet/$TrainerId")}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input required type="file" class="form-control" name="file" />
                                <button type="submit" class="btn btn-success text-white m-2">
                                    Add from Xlsx <i class="fas fa-file-excel"></i>
                                </button>
                            </form>
                            <hr/> --}}
                        <div class="accordion has-gap ms-accordion-chevron" id="accordionExample4">

                                        <div class="table-responsive">
                                            <table class="dattable table table-striped thead-warning  w-100">
                                                <thead>
                                                    <th>#</th>
                                                    <th>
                                                        Exam Name En
                                                    </th>
                                                    <th>
                                                        Exam Name Ar    
                                                    </th>
                                                    <th>Actions</th>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach ($Exams as $Exam)
                                                        <tr>
                                                        <td>{{$i}}</td>
                                                                <td>
                                                                    {{-- <i class="fas fa-check    "></i> --}}
                                                                    <span>{{$Exam->ExamNameEn}}</span>
                                                                </td>
                                                                <td>
                                                                        {{-- <i class="fas fa-check    "></i> --}}
                                                                    <span>{{$Exam->ExamNameAr}}</span>
                                                                </td>
                                                            <td>
                                                                 <a href="#" data-toggle="modal" data-target="#editExam{{$Exam->ExamId}}"
                                                                        class="ms-btn-icon btn-dark"><i
                                                                            class="fas fa-pencil-alt    "></i></a>
                                                                            
                                                                 <a href="{{url("/Admin/Exams/$Exam->ExamId/Delete")}}" class="ms-btn-icon btn-danger"><i class="fas fa-trash"></i></a> </td>
                                                                  </td>
                                                            </tr>
                                                            <?php $i++; ?>
                                                       
                                                    @endforeach
                                                    
                                                    {{-- <tr>
                                                        <td><i class="fas fa-check    "></i> <span>form</span></td>
                                                        <td><i class="fas fa-spinner"></i> <span>span</span></td>
                                                        <td><i class="fas fa-spinner"></i> <span>login page</span> </td>
                                                        <td> <a href="#" data-toggle="modal" data-target="#editTopic"
                                                                class="ms-btn-icon btn-dark"><i
                                                                    class="fas fa-pencil-alt    "></i></a> </td>

                                                    </tr> --}}




                                                </tbody>
                                            </table>
                                        </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


   
    @foreach ($Exams as $ExamModal)
            <!-- edit exam Modal -->
<div class="modal fade" id="editExam{{$ExamModal->ExamId}}" tabindex="-1" role="dialog" aria-labelledby="editExam">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-5">
                           <form action="/Admin/Trainer/EditExam" method="POST">

                                        {{ csrf_field() }}

                                        <div class="form-group">

                                            <label for=""> Exam name en </label>

                                            <input type="hidden" name="CourseId" value="{{$Course->CourseId}}" />

                                            <input type="hidden" name="TrainerId" value="{{$Trainer->TrainerId}}" />
                                            <input type="hidden" name="ExamId" value="{{$ExamModal->ExamId}}" />

                                            <input type="text" name="ExamNameEn" value="{{$ExamModal->ExamNameEn}}" class="form-control" />



                                        </div>

                                        <div class="form-group">

                                                <label for=""> Exam name ar</label>

                                                

                                                <input type="text" name="ExamNameAr" value="{{$ExamModal->ExamNameAr}}" class="form-control" />

    

                                            </div>

                                    <div class="input-group text-center">

                                        <input type="submit" value="Add" class="btn btn-success m-auto">

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