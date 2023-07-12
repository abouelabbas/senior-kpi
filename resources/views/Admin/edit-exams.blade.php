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
                        <h5>Exams </h5>
                        <h6>{{$Trainer->FullnameEn}} - {{$Course->CourseNameEn}} </h6>
                    </div>
                    <div class="ms-panel-body">
                        <!--  -->
                        <div class="d-flex justify-content-end">


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
                                                                
                                                                 <a href="{{url("/Admin/$Round->RoundId/Exams/$Exam->ExamId/Grades")}}" class="btn btn-danger"><i class="fas fa-marker"></i> Grades</a> </td>
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


   
@endsection