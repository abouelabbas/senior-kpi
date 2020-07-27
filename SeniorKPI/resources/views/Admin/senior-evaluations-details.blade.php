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
                                                            <th>Students Deal</th>
                                                            <th>Solving Problems</th>
                                                            <th>Buffet Quality</th>
                                                            <th>General Cleanliness</th>
                                                            <th>Recepitionist Quality</th>
                                                            <th>Answering Calls Quality</th>
                                                            <th>Social Media Quality</th>
                                                            <th>Overall Evaluation</th>
                                                            <th>Total</th>
                                                            <th>note </th>
                                                          </thead>
                                                          <tbody>
                                                            @php
                                                                $i = 1
                                                            @endphp
                                        @foreach ($SeniorEvaluations as $SeniorEval)
                                            @if ($SeniorEval->StudentRoundId === $StudentRound->StudentRoundsId)
                                                <tr>
                                                <td>{{$i}}</td>
                                                              <td>{{$SeniorEval->ContentNameEn}}</td>

                                                              <td>
                                                                        @if ($SeniorEval->Students_Deal == 1)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>


                                                                        @elseif ($SeniorEval->Students_Deal == 2)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Students_Deal == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Students_Deal == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Students_Deal == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>

                                                              <td>
                                                                  @if ($SeniorEval->Solving_Problems == 1)

                                                                  <i class="fa fa-star" aria-hidden="true"></i>


                                                                  @elseif ($SeniorEval->Solving_Problems == 2)

                                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                                  @elseif ($SeniorEval->Solving_Problems == 3)
                                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                                  @elseif ($SeniorEval->Solving_Problems == 4)
                                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                                  @elseif ($SeniorEval->Solving_Problems == 5)
                                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                                  @endif
                                                                   </td>

                                                              <td>
                                                                        @if ($SeniorEval->Buffet_Quality == 1)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>


                                                                        @elseif ($SeniorEval->Buffet_Quality == 2)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Buffet_Quality == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Buffet_Quality == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Buffet_Quality == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>

                                                              <td>
                                                                        @if ($SeniorEval->General_Cleanliness == 1)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>


                                                                        @elseif ($SeniorEval->General_Cleanliness == 2)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->General_Cleanliness == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->General_Cleanliness == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->General_Cleanliness == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>

                                                              <td>
                                                                        @if ($SeniorEval->Recepitionist_Quality == 1)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>


                                                                        @elseif ($SeniorEval->Recepitionist_Quality == 2)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Recepitionist_Quality == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Recepitionist_Quality == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Recepitionist_Quality == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>

                                                              <td>
                                                                        @if ($SeniorEval->Answering_Calls_Quality == 1)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>


                                                                        @elseif ($SeniorEval->Answering_Calls_Quality == 2)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Answering_Calls_Quality == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Answering_Calls_Quality == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Answering_Calls_Quality == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>

                                                              <td>
                                                                        @if ($SeniorEval->Social_Media_Quality == 1)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>


                                                                        @elseif ($SeniorEval->Social_Media_Quality == 2)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Social_Media_Quality == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Social_Media_Quality == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Social_Media_Quality == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>

                                                              <td>
                                                                        @if ($SeniorEval->Overall_Evaluation == 1)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>


                                                                        @elseif ($SeniorEval->Overall_Evaluation == 2)

                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Overall_Evaluation == 3)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Overall_Evaluation == 4)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                                        @elseif ($SeniorEval->Overall_Evaluation == 5)
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                         </td>
                                                                <td>
                                                                        <?php
                                                                                $total = (($SeniorEval->Students_Deal + $SeniorEval->Buffet_Quality + $SeniorEval->General_Cleanliness + $SeniorEval->Recepitionist_Quality + $SeniorEval->Answering_Calls_Quality + $SeniorEval->Social_Media_Quality + $SeniorEval->Overall_Evaluation)/35)*100;

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
                                                                   {{$SeniorEval->Notes}}
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