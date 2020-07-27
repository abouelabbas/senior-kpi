@extends('Layouts.adminkpi')
@section('content')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
                <li class="breadcrumb-item"><a href="/Admin/Evaluations/{{$Round->RoundId}}"> Attendence & Evaluations</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Details </li>
                </ol>
            </nav>

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
                                                            <th>Course Wealthy</th>
                                                            <th>Enough Hours</th>
                                                            <th>Enough Practice</th>
                                                            <th>Materials Evaluation</th>
                                                            <th>Suitable Price</th>
                                                            <th>Overall Education</th>
                                                            <th>Total</th>
                                                            <th>note </th>
                                                          </thead>
                                                          <tbody>
                                                            @php
                                                                $i = 1
                                                            @endphp
                                        @foreach ($RoundEvaluations as $RoundEval)
                                            @if ($RoundEval->StudentRoundId === $StudentRound->StudentRoundsId)
                                                <tr>
                                                  <td>{{$i}}</td>
                                                              <td>{{$RoundEval->ContentNameEn}}</td>
          
                                                              <td>
                                                                        @if ($RoundEval->Course_Wealthy == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($RoundEval->Course_Wealthy == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Course_Wealthy == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Course_Wealthy == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Course_Wealthy == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                         
                                                              <td>
                                                                        @if ($RoundEval->Enough_Hours == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($RoundEval->Enough_Hours == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Enough_Hours == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Enough_Hours == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Enough_Hours == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($RoundEval->Enough_Practice == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($RoundEval->Enough_Practice == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Enough_Practice == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Enough_Practice == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Enough_Practice == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($RoundEval->Materials_Evaluation == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($RoundEval->Materials_Evaluation == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Materials_Evaluation == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Materials_Evaluation == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Materials_Evaluation == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($RoundEval->Suitable_Price == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($RoundEval->Suitable_Price == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Suitable_Price == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Suitable_Price == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Suitable_Price == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                              <td>
                                                                        @if ($RoundEval->Overall_Education == 1)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                            

                                                                        @elseif ($RoundEval->Overall_Education == 2)
                                                                        
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Overall_Education == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Overall_Education == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($RoundEval->Overall_Education == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                                   
                                                             <td>
                                                                        <?php
                                                                                $total = (($RoundEval->Course_Wealthy + $RoundEval->Enough_Hours + $RoundEval->Enough_Practice + $RoundEval->Materials_Evaluation + $RoundEval->Suitable_Price + $RoundEval->Overall_Education)/30)*100;
                                                                                
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
                                                                   {{$RoundEval->Notes}}
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