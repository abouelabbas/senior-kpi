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
                            <a href="#" class="btn btn-dark m-2 has-chevron" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="true">
                                Add
                            </a>

                            <ul class="dropdown-menu">
                                <li class="ms-dropdown-list">
                                    <a class="media p-2" href="#" data-toggle="modal" data-target="#addTrack">
                                        Track
                                    </a>
                                    <a class="media p-2" href="#" data-toggle="modal" data-target="#addTopic ">
                                        Topic
                                    </a>
                                    <a class="media p-2" href="#" data-toggle="modal" data-target="#addExample">
                                        Example
                                    </a>
                                    <a class="media p-2" href="#" data-toggle="modal" data-target="#addTask">
                                        Task
                                    </a>

                                </li>
                            </ul>
                            {{-- <input type="submit" class="btn btn-success my-2" value="Save"> --}}
                        </div>
                        <div class="accordion has-gap ms-accordion-chevron" id="accordionExample4">
                            @foreach ($Agenda as $Ag)
                                <div class="card">
                                <div class="card-header" data-toggle="collapse" role="button" data-target="#topic{{$Ag->TrainerAgendaId}}"
                                    aria-expanded="false" aria-controls="collapseTen">
                                    <span class="has-icon">
                                        <i class="fas fa-code"></i> {{$Ag->ContentNameEn}}
                                    </span>
                                </div>

                                <div id="topic{{$Ag->TrainerAgendaId}}" class="collapse" data-parent="#accordionExample4">
                                    <div class="card-body">


                                        <div class="table-responsive">
                                            <table class="dattable table table-striped thead-warning  w-100">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Point</th>
                                                    <th>Example </th>
                                                    <th>Task</th>
                                                    <th>Edit</th>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach ($SubAgenda as $SubAg)
                                                        @if ($Ag->TrainerAgendaId == $SubAg->TrainerAgendaId)
                                                        <tr>
                                                        <td>{{$i}}</td>
                                                                <td>
                                                                    {{-- <i class="fas fa-check    "></i> --}}
                                                                    <span>{{$SubAg->SubAgendaNameEn}}</span>
                                                                </td>
                                                                <td>
                                                                        {{-- <i class="fas fa-check    "></i> --}}
                                                                    <span>ex: {{$SubAg->Example}}</span>
                                                                </td>
                                                                <td><span>ex: {{$SubAg->Task}}</span> </td>
                                                            <td> <a href="#" data-toggle="modal" data-target="#editTopic{{$SubAg->TrainerSubAgendaId}}"
                                                                        class="ms-btn-icon btn-dark"><i
                                                                            class="fas fa-pencil-alt    "></i></a> </td>
                                                            </tr>
                                                            <?php $i++; ?>
                                                        @endif
                                                       
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
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
        </div>

    </main>



    <!-- Track Modal -->
    <div class="modal fade" id="addTrack" tabindex="-1" role="dialog" aria-labelledby="addTopic">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-5">
                            <form action="/Admin/Courses/Topics/Track/Add" method="POST">
{{ csrf_field() }}
                                <label for="note">Track Name</label>
                                <div class="input-group">
                                        <input type="hidden" value="{{$TrainerId}}" name="id">
                                        <input type="hidden" value="{{$CourseId}}" name="cid">
                                    <input type="text" name="content" class="form-control" placeholder="track name">
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
    <!-- topic Modal -->
    <div class="modal fade" id="addTopic" tabindex="-1" role="dialog" aria-labelledby="addTopic">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-5">
                            <form action="/Admin/Courses/Topics/Topic/Add" method="POST">
                                {{ csrf_field() }}
                                    <label>Track</label>
                                    <div class="input-group">
                                        <select name="TrainerAgendaId" id="" class="form-control">
                                            @foreach ($Agenda as $AgendaItem)
                                        <option value="{{$AgendaItem->TrainerAgendaId}}"> {{$AgendaItem->ContentNameEn}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                <label for="note">Topic Name</label>
                                <div class="input-group">
                                        <input type="hidden" value="{{$TrainerId}}" name="id">
                                        <input type="hidden" value="{{$CourseId}}" name="cid">

                                    <input type="text" name="subcontent" class="form-control" placeholder="topic name">
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
    @foreach ($SubAgenda as $MSubAg)
            <!-- edit topic Modal -->
<div class="modal fade" id="editTopic{{$MSubAg->TrainerSubAgendaId}}" tabindex="-1" role="dialog" aria-labelledby="editTopic">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-5">
                            <div class="d-flex justify-content-end">
                            <a href="/Admin/Courses/Topic/Sub/{{$MSubAg->TrainerSubAgendaId}}/{{$CourseId}}/{{$TrainerId}}" class="btn btn-danger"> <i class="fas fa-trash"></i> </a>
                            </div>
                            <form action="/Admin/Courses/Topics/Edit" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$TrainerId}}" name="id">
                                <input type="hidden" value="{{$CourseId}}" name="cid">
                            <input type="hidden" name="TrainerSubAgendaId" value="{{$MSubAg->TrainerSubAgendaId}}" />
                                <label for="note">Topic Name</label>
                                <div class="input-group">
                                <input type="text" name="Topic" value="{{$MSubAg->SubAgendaNameEn}}" class="form-control" placeholder="topic name">
                                </div>
                                <label for="note">Example Name</label>
                                <div class="input-group">
                                <input type="text" name="Example" value="{{$MSubAg->Example}}" class="form-control" placeholder="example name">
                                </div>
                                <label for="note">Task Name</label>
                                <div class="input-group">
                                <input type="text" name="Task" value="{{$MSubAg->Task}}" class="form-control" placeholder="task name">
                                </div>
                                <div class="input-group text-center">
                                    <input type="submit" value="Save" class="btn btn-success m-auto">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach



    <!-- example Modal -->
    <div class="modal fade" id="addExample" tabindex="-1" role="dialog" aria-labelledby="addExample">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-5">
                            <form action="/Admin/Courses/Topics/Example/Add" method="POST">
                                {{ csrf_field() }}
                                    <label>Track</label>
                                    <div class="input-group">
                                            <input type="hidden" value="{{$TrainerId}}" name="id">
                                            <input type="hidden" value="{{$CourseId}}" name="cid">
                                        <select name="TrainerAgendaId" id="agenda" class="form-control">
                                                @foreach ($Agenda as $AgendaItem2)
                                                <option value="{{$AgendaItem2->TrainerAgendaId}}"> {{$AgendaItem2->ContentNameEn}} </option>
                                                    @endforeach
                                        </select>
                                    </div>
                                <label for="note">Topic Name</label>
                                <div class="input-group">
                                    <select name="TrainerSubAgendaId" id="subagenda" class="form-control">
                                            {{-- @foreach ($SubAgenda as $Topic)
                                            <option value="{{$Topic->TrainerSubAgendaId}}"> {{$Topic->SubAgendaNameEn}} </option>
                                                @endforeach --}}
                                    </select>
                                </div>
                                <label for="note">Example Name</label>
                                <div class="input-group">
                                    <input type="text" name="Example" class="form-control" placeholder="Example name">
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

    <!-- Task Modal -->
    <div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="addTask">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-5">
                                <form action="/Admin/Courses/Topics/Task/Add" method="POST">
                                    {{ csrf_field() }}
                                        <label>Track</label>
                                        <div class="input-group">
                                                <input type="hidden" value="{{$TrainerId}}" name="id">
                                                <input type="hidden" value="{{$CourseId}}" name="cid">
                                            <select name="TrainerAgendaId" id="agenda2" class="form-control">
                                                    @foreach ($Agenda as $AgendaItem2)
                                                    <option value="{{$AgendaItem2->TrainerAgendaId}}"> {{$AgendaItem2->ContentNameEn}} </option>
                                                        @endforeach
                                            </select>
                                        </div>
                                    <label for="note">Topic Name</label>
                                    <div class="input-group">
                                        <select name="TrainerSubAgendaId" id="subagenda2" class="form-control">
                                                {{-- @foreach ($SubAgenda as $Topic)
                                                <option value="{{$Topic->TrainerSubAgendaId}}"> {{$Topic->SubAgendaNameEn}} </option>
                                                    @endforeach --}}
                                        </select>
                                    </div>
                                    <label for="note">Task Name</label>
                                    <div class="input-group">
                                        <input type="text" name="Task" class="form-control" placeholder="Task name">
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
    
    @endsection