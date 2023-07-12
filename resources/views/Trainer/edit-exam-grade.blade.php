@extends('Layouts/trainerkpi',['TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds])
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
                <form action="{{url("/Trainer/Exams/Grade/Submit")}}" method="POST">
                                                        @csrf

                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h5>{{$Exam->ExamNameEn}} </h5>
                        <h6>{{$Trainer->FullnameEn}} - {{$Course->CourseNameEn}} </h6>
                    </div>
                    <div class="ms-panel-body">
                        <!--  -->
                        <div class="d-flex justify-content-end">
                            {{-- <a href="#" class="btn btn-dark has-chevron" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="true">
                                Add
                            </a> --}}
                            {{-- <a href="{{url("/Admin/Course/$Round->RoundId/Students/Report")}}" class="btn btn-success"><i class="far fa-file-excel"></i> Xlsx</a> &nbsp;&nbsp; --}}
                            <button type="submit" class="btn btn-primary">Save</button>

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
                        <div class="px-5 accordion has-gap ms-accordion-chevron" id="accordionExample4">

                                        <div class="table-responsive">
                                            <table class="dattable table table-striped thead-warning  w-100">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Student Name</th>
                                                    <th>Phone</th>
                                                    <th>
                                                        Exam Name
                                                    </th>
                                                    <th>
                                                        Grade
                                                    </th>
                                                    <th>Evaluation</th>
                                                    <th>Notes</th>
                                                    <th>Link (Extra Files)</th>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach ($ExamGrades as $ExamGrade)
                                                        <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$ExamGrade->FullnameEn}}</td>
                                                        <td>{{$ExamGrade->Phone}}</td>
                                                                <td>
                                                                    <span>{{$Exam->ExamNameEn}} - {{$Exam->ExamNameAr}}</span>
                                                                </td>
                                                                <td>
                                                                    <input type="hidden" name="Grades[{{$i - 1}}]" value="{{$ExamGrade->ExamGradesId}}">
                                                                        {{-- <i class="fas fa-check    "></i> --}}
                                                                    <input class="form-control" type="number" max="100" min="0" placeholder="/100" value="{{$ExamGrade->Grade}}" name="ExamGrade[{{$i - 1}}]"/>
                                                                </td>
                                                                <td>
                                                                        {{-- <i class="fas fa-check    "></i> --}}
                                                                    <input class="form-control" type="number" max="5" min="0" placeholder="/5" value="{{$ExamGrade->Evaluation}}" name="Evaluation[{{$i - 1}}]"/>
                                                                </td>
                                                                <td>
                                                                    <textarea name="ExamNotes[{{$i - 1}}]" id="" style="resize: auto">{{$ExamGrade->ExamNotes}}</textarea>
                                                                </td>
                                                                <td>
                                                                    <textarea name="ExamFile[{{$i - 1}}]" id="" style="resize: auto">{{$ExamGrade->File}}</textarea>
                                                                </td>

                                                            </tr>
                                                            <?php $i++; ?>

                                                    </form>
                                                       
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
                </form>
                </div>

            </div>

        </div>


   
@endsection