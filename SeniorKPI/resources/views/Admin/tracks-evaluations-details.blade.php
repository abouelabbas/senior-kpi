@extends('Layouts.adminkpi')
@section('content')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
                <li class="breadcrumb-item"><a href="/Admin/CenterEvaluation/{{$Round->RoundId}}"> Attendence & Evaluations</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Details </li>
                </ol>
            </nav>
<div class="row">
  <div class="col-12">
      <div class="ms-panel">
          <div class="ms-panel-header">
          <h2>{{$Course->CourseNameEn}} - GR{{$Round->GroupNo}}</h2>
          </div>
      </div>
  </div>
</div>
           <div class="card">
                <div class="card-body">
                        <div class="accordion has-gap ms-accordion-chevron" id="accordionExample4">
                                @foreach ($StudentRounds as $StudentRound)
                                  <div class="card">
                                    <div class="card-header collapsed" data-toggle="collapse" role="button" data-target="#STD{{$StudentRound->StudentId}}"
                                        aria-expanded="false" aria-controls="collapseTen">
                                        <span class="has-icon">
                                            <i class="fas fa-user"></i> {{$StudentRound->FullnameEn}}
                                        </span>
                                    </div>
                
                                    <div id="STD{{$StudentRound->StudentId}}" class="collapse" data-parent="#accordionExample4" style="">
                                        <div class="card-body">
                
                
                                                <div class="table-responsive">
                                                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                                          <thead>
                                                            <th>#</th>
                                                            <th>Topic</th>
                                                            <th>PCs Quality</th>
                                                            <th>Projectors Quality</th>
                                                            <th>Air Conditioners</th>
                                                            <th>Seats Quality</th>
                                                            <th>Lab Cleaning</th>
                                                            <th>Lab Capacity</th>
                                                            <th>Overall Evaluation</th>
                                                            <th>Total</th>
                                                            <th>note </th>
                                                          </thead>
                                                          <tbody>
                                                            @php
                                                                $i = 1
                                                            @endphp
                                        @foreach ($TrainerEvaluations as $TrainerEval)
                                            @if ($TrainerEval->PersonId === $StudentRound->StudentRoundsId && $TrainerEval->PersonType == 'Student')
                                                <tr>
                                                <td>{{$i}}</td>
                                                              <td>{{$TrainerEval->ContentNameEn}}</td>
          
                                                              <td>
                                                                        @if ($TrainerEval->PCs_Quality == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->PCs_Quality == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->PCs_Quality == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->PCs_Quality == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->PCs_Quality == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                         
                                                              <td>
                                                                        @if ($TrainerEval->Projectors_Quality == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->Projectors_Quality == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Projectors_Quality == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Projectors_Quality == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Projectors_Quality == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($TrainerEval->Air_Conditioners == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->Air_Conditioners == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Air_Conditioners == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Air_Conditioners == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Air_Conditioners == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($TrainerEval->Seats_Quality == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->Seats_Quality == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Seats_Quality == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Seats_Quality == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Seats_Quality == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($TrainerEval->Lab_Cleaning == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->Lab_Cleaning == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Lab_Cleaning == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Lab_Cleaning == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Lab_Cleaning == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($TrainerEval->Lab_Capacity == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->Lab_Capacity == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Lab_Capacity == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Lab_Capacity == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Lab_Capacity == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($TrainerEval->Overall_Evaluation == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->Overall_Evaluation == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Overall_Evaluation == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Overall_Evaluation == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Overall_Evaluation == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                <td>
                                                                        <?php
                                                                                $total = (($TrainerEval->PCs_Quality + $TrainerEval->Projectors_Quality + $TrainerEval->Air_Conditioners + $TrainerEval->Seats_Quality + $TrainerEval->Lab_Cleaning + $TrainerEval->Lab_Capacity + $TrainerEval->Overall_Evaluation)/35)*100;
                                                                                
                                                                                ?>

                                                                    <div
                                                                    class="progress-circle"
                                                                    data-value="0.{{number_format($total,0)}}"
                                                                    data-size="50"
                                                                    data-thickness="3"
                                                                    data-animation-start-value="1.0"
                                                                    data-fill="{
                                                                      &quot;color&quot;: &quot;green&quot;
                                                                    }"
                                                                    data-reverse="true">
                                                                    <div class="percent">
                                                                        {{number_format($total,0)}}%
                                                                    </div>
                                                                  </div>
                                                                </td>
                                                                <td class="note">
                                                                   {{$TrainerEval->Notes}}
                                                                </td>
                                        
                                                            </tr>
                                                            @php
                                                                $i++
                                                            @endphp
                                            @endif
                                        @endforeach
                                                            
                                        
                                                          </tbody>
                                                        </table>
                                                      </div>
                                        </div>
                                    </div>
                                </div>  
                                @endforeach
                                @foreach ($TrainerRounds as $TrainerRound)
                                  <div class="card">
                                    <div class="card-header collapsed" style="background-color:rgb(65, 65, 65);" data-toggle="collapse" role="button" data-target="#TD{{$TrainerRound->TrainerId}}"
                                        aria-expanded="false" aria-controls="collapseTen">
                                        <span class="has-icon" style="color:#fff;">
                                            <i class="fas fa-user"></i>(Trainer) {{$TrainerRound->FullnameEn}}
                                        </span>
                                    </div>
                
                                    <div id="TD{{$TrainerRound->TrainerId}}" class="collapse" data-parent="#accordionExample4" style="">
                                        <div class="card-body">
                
                
                                                <div class="table-responsive">
                                                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                                          <thead>
                                                            <th>#</th>
                                                            <th>Topic</th>
                                                            <th>PCs Quality</th>
                                                            <th>Projectors Quality</th>
                                                            <th>Air Conditioners</th>
                                                            <th>Seats Quality</th>
                                                            <th>Lab Cleaning</th>
                                                            <th>Lab Capacity</th>
                                                            <th>Overall Evaluation</th>
                                                            <th>Total</th>
                                                            <th>note </th>
                                                          </thead>
                                                          <tbody>
                                                            @php
                                                                $i = 1
                                                            @endphp
                                        @foreach ($TrainerEvaluations as $TrainerEval)
                                            @if ($TrainerEval->PersonId === $TrainerRound->TrainerRoundsId && $TrainerEval->PersonType == 'Trainer')
                                                <tr>
                                                <td>{{$i}}</td>
                                                              <td>{{$TrainerEval->ContentNameEn}}</td>
          
                                                              <td>
                                                                        @if ($TrainerEval->PCs_Quality == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->PCs_Quality == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->PCs_Quality == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->PCs_Quality == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->PCs_Quality == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                         
                                                              <td>
                                                                        @if ($TrainerEval->Projectors_Quality == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->Projectors_Quality == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Projectors_Quality == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Projectors_Quality == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Projectors_Quality == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($TrainerEval->Air_Conditioners == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->Air_Conditioners == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Air_Conditioners == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Air_Conditioners == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Air_Conditioners == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($TrainerEval->Seats_Quality == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->Seats_Quality == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Seats_Quality == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Seats_Quality == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Seats_Quality == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($TrainerEval->Lab_Cleaning == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->Lab_Cleaning == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Lab_Cleaning == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Lab_Cleaning == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Lab_Cleaning == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($TrainerEval->Lab_Capacity == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->Lab_Capacity == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Lab_Capacity == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Lab_Capacity == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Lab_Capacity == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($TrainerEval->Overall_Evaluation == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($TrainerEval->Overall_Evaluation == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Overall_Evaluation == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Overall_Evaluation == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($TrainerEval->Overall_Evaluation == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                <td>
                                                                        <?php
                                                                                $total = (($TrainerEval->PCs_Quality + $TrainerEval->Projectors_Quality + $TrainerEval->Air_Conditioners + $TrainerEval->Seats_Quality + $TrainerEval->Lab_Cleaning + $TrainerEval->Lab_Capacity + $TrainerEval->Overall_Evaluation)/35)*100;
                                                                                
                                                                                ?>

                                                                    <div
                                                                    class="progress-circle"
                                                                    data-value="0.{{number_format($total,0)}}"
                                                                    data-size="50"
                                                                    data-thickness="3"
                                                                    data-animation-start-value="1.0"
                                                                    data-fill="{
                                                                      &quot;color&quot;: &quot;green&quot;
                                                                    }"
                                                                    data-reverse="true">
                                                                    <div class="percent">
                                                                        {{number_format($total,0)}}%
                                                                    </div>
                                                                  </div>
                                                                </td>
                                                                <td class="note">
                                                                   {{$TrainerEval->Notes}}
                                                                </td>
                                        
                                                            </tr>
                                                            @php
                                                                $i++
                                                            @endphp
                                            @endif
                                        @endforeach
                                                            
                                        
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
           
@endsection