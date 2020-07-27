@extends('Layouts.adminkpi')

@section('content')



            <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>

                <li class="breadcrumb-item"><a href="/Admin/Evaluations/{{$Round->RoundId}}"> (Trainer / Course Eval)</a></li>

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

                                                            <th>Knowledge Experience</th>

                                                            <th>Training Qualified</th>

                                                            <th>Topics Preparation</th>

                                                            <th>Trainer Attitude</th>

                                                            <th>Time Respect</th>

                                                            <th>Student Interaction</th>

                                                            <th>Overall Evaluation</th>

                                                            <th>Total</th>

                                                            <th>note </th>

                                                          </thead>

                                                          <tbody>

                                                            @php

                                                                $i = 1

                                                            @endphp

                                        @foreach ($TrainerEvaluations as $TrainerEval)

                                        @if ($TrainerEval->StudentRoundsId === $StudentRound->StudentRoundsId)



                                                <tr>

                                                <td>{{$i}}</td>

                                                              <td>{{$TrainerEval->ContentNameEn}}</td>

          

                                                              <td>

                                                                        @if ($TrainerEval->Knowledge_Experience == 1)

                                                                        

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                            



                                                                        @elseif ($TrainerEval->Knowledge_Experience == 2)

                                                                        

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Knowledge_Experience == 3)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Knowledge_Experience == 4)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Knowledge_Experience == 5)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @endif

                                                                         </td>

                                                                         

                                                              <td>

                                                                        @if ($TrainerEval->Training_Qualified == 1)

                                                                        

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                            



                                                                        @elseif ($TrainerEval->Training_Qualified == 2)

                                                                        

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Training_Qualified == 3)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Training_Qualified == 4)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Training_Qualified == 5)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @endif

                                                                         </td>

                                                                                   

                                                              <td>

                                                                        @if ($TrainerEval->Topics_Preparation == 1)

                                                                        

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                            



                                                                        @elseif ($TrainerEval->Topics_Preparation == 2)

                                                                        

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Topics_Preparation == 3)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Topics_Preparation == 4)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Topics_Preparation == 5)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @endif

                                                                         </td>

                                                                                   

                                                              <td>

                                                                        @if ($TrainerEval->Trainer_Attitude == 1)

                                                                        

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                            



                                                                        @elseif ($TrainerEval->Trainer_Attitude == 2)

                                                                        

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Trainer_Attitude == 3)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Trainer_Attitude == 4)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Trainer_Attitude == 5)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @endif

                                                                         </td>

                                                                                   

                                                              <td>

                                                                        @if ($TrainerEval->Time_Respect == 1)

                                                                        

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                            



                                                                        @elseif ($TrainerEval->Time_Respect == 2)

                                                                        

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Time_Respect == 3)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Time_Respect == 4)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Time_Respect == 5)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @endif

                                                                         </td>

                                                                                   

                                                              <td>

                                                                        @if ($TrainerEval->Student_Interaction == 1)

                                                                        

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                            



                                                                        @elseif ($TrainerEval->Student_Interaction == 2)

                                                                        

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Student_Interaction == 3)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Student_Interaction == 4)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        <i class="fa fa-star" aria-hidden="true"></i>



                                                                        @elseif ($TrainerEval->Student_Interaction == 5)

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

                                                                                $total = (($TrainerEval->Knowledge_Experience + $TrainerEval->Training_Qualified + $TrainerEval->Topics_Preparation + $TrainerEval->Trainer_Attitude + $TrainerEval->Time_Respect + $TrainerEval->Student_Interaction + $TrainerEval->Overall_Evaluation)/35)*100;

                                                                                

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