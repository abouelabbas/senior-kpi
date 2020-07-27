@extends('Layouts/studentkpi',['StudentRounds'=>$StudentRounds])
@section('content')

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Student"><i class="material-icons">home</i> Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Trainer & Center</li>
        </ol>
      </nav>
      <div class="row">

        <div class="col-md-12">

          <div class="ms-panel">
            <div class="ms-panel-header d-flex py-2 align-items-center justify-content-between">
            <h6>ُEvaluate trainer per topic</h6>
                <div>
                    <input type="reset" form="fform" class="btn btn-warning" value="undo">
                    <input value="Save" type="submit" id="savesenior" class="btn btn-success">
                </div>
              </div>
          
          <div class="ms-panel-body">
            
            <div class="table-responsive">
              <table id="seniortb" class="dattable table table-striped thead-dark  w-100">
                <thead>
                  <th>#</th>
                  <th>Topic</th>
                  <th>Students Deal</th>
                  <th>Solving Problems</th>
                  <th>Buffet Quality</th>
                  <th>General Cleanliness</th>
                  <th>Recepitionist Quality</th>
                  <th>Answering Calls Quality</th>
                  <th>Social Media  Quality</th>
                  <th>Overall Evaluation</th>
                  <th>Total</th>
                  <th>note </th>
                </thead>
                <tbody>
                  @php
                      $i = 1
                  @endphp
@foreach ($SeniorEvaluations as $SeniorEval)
  <tr>
  <td>{{$i}}</td>
  <td class="content" data-eval="{{$SeniorEval->SeniorstepsEvaluationsId}}">{{$SeniorEval->ContentNameEn}}</td>

                    <form id="fform" action="">

                        <td>
                            <ul class='stars Students_Deal'>
                              <li class="star
                              @if ($SeniorEval->Students_Deal == 1 || $SeniorEval->Students_Deal == 2 || $SeniorEval->Students_Deal == 3 ||$SeniorEval->Students_Deal == 4 ||$SeniorEval->Students_Deal == 5)
                                  selected
                              @endif
                              @if ($SeniorEval->Students_Deal == 1 )
                                  value
                              @endif
                               " title='Poor' data-value='1'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star
                              @if ($SeniorEval->Students_Deal == 2 || $SeniorEval->Students_Deal == 3 ||$SeniorEval->Students_Deal == 4 ||$SeniorEval->Students_Deal == 5)
                                  selected
                              @endif
                              @if ($SeniorEval->Students_Deal == 2 )
                                  value
                              @endif
                              ' title='Fair' data-value='2'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star
                              @if ($SeniorEval->Students_Deal == 3 ||$SeniorEval->Students_Deal == 4 ||$SeniorEval->Students_Deal == 5)
                                  selected
                              @endif
                              @if ($SeniorEval->Students_Deal == 3 )
                                  value
                              @endif
                              ' title='Good' data-value='3'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star
                              @if ($SeniorEval->Students_Deal == 4 ||$SeniorEval->Students_Deal == 5)
                                  selected
                              @endif
                              @if ($SeniorEval->Students_Deal == 4 )
                                  value
                              @endif
                              ' title='Excellent' data-value='4'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star
                              @if ($SeniorEval->Students_Deal == 5)
                                  selected
                              @endif
                              @if ($SeniorEval->Students_Deal == 5 )
                                  value
                              @endif
                              ' title='WOW!!!' data-value='5'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                            </ul>
                          </td>
                          <td>
                              <ul class='stars Solving_Problems'>
                                <li class="star
                                @if ($SeniorEval->Solving_Problems == 1 || $SeniorEval->Solving_Problems == 2 || $SeniorEval->Solving_Problems == 3 ||$SeniorEval->Solving_Problems == 4 ||$SeniorEval->Solving_Problems == 5)
                                    selected
                                @endif
                                @if ($SeniorEval->Solving_Problems == 1 )
                                    value
                                @endif
                                 " title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($SeniorEval->Solving_Problems == 2 || $SeniorEval->Solving_Problems == 3 ||$SeniorEval->Solving_Problems == 4 ||$SeniorEval->Solving_Problems == 5)
                                    selected
                                @endif
                                @if ($SeniorEval->Solving_Problems == 2 )
                                    value
                                @endif
                                ' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($SeniorEval->Solving_Problems == 3 ||$SeniorEval->Solving_Problems == 4 ||$SeniorEval->Solving_Problems == 5)
                                    selected
                                @endif
                                @if ($SeniorEval->Solving_Problems == 3 )
                                    value
                                @endif
                                ' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($SeniorEval->Solving_Problems == 4 ||$SeniorEval->Solving_Problems == 5)
                                    selected
                                @endif
                                @if ($SeniorEval->Solving_Problems == 4 )
                                    value
                                @endif
                                ' title='Excellent' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($SeniorEval->Solving_Problems == 5)
                                    selected
                                @endif
                                @if ($SeniorEval->Solving_Problems == 5 )
                                    value
                                @endif
                                ' title='WOW!!!' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                              </ul>
                            </td>
                            <td>
                                <ul class='stars Buffet_Quality'>
                                  <li class="star
                                  @if ($SeniorEval->Buffet_Quality == 1 || $SeniorEval->Buffet_Quality == 2 || $SeniorEval->Buffet_Quality == 3 ||$SeniorEval->Buffet_Quality == 4 ||$SeniorEval->Buffet_Quality == 5)
                                      selected
                                  @endif
                                  @if ($SeniorEval->Buffet_Quality == 1 )
                                      value
                                  @endif
                                   " title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($SeniorEval->Buffet_Quality == 2 || $SeniorEval->Buffet_Quality == 3 ||$SeniorEval->Buffet_Quality == 4 ||$SeniorEval->Buffet_Quality == 5)
                                      selected
                                  @endif
                                  @if ($SeniorEval->Buffet_Quality == 2 )
                                      value
                                  @endif
                                  ' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($SeniorEval->Buffet_Quality == 3 ||$SeniorEval->Buffet_Quality == 4 ||$SeniorEval->Buffet_Quality == 5)
                                      selected
                                  @endif
                                  @if ($SeniorEval->Buffet_Quality == 3 )
                                      value
                                  @endif
                                  ' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($SeniorEval->Buffet_Quality == 4 ||$SeniorEval->Buffet_Quality == 5)
                                      selected
                                  @endif
                                  @if ($SeniorEval->Buffet_Quality == 4 )
                                      value
                                  @endif
                                  ' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($SeniorEval->Buffet_Quality == 5)
                                      selected
                                  @endif
                                  @if ($SeniorEval->Buffet_Quality == 5 )
                                      value
                                  @endif
                                  ' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                </ul>
                              </td>
                              <td>
                                  <ul class='stars General_Cleanliness'>
                                    <li class="star
                                    @if ($SeniorEval->General_Cleanliness == 1 || $SeniorEval->General_Cleanliness == 2 || $SeniorEval->General_Cleanliness == 3 ||$SeniorEval->General_Cleanliness == 4 ||$SeniorEval->General_Cleanliness == 5)
                                        selected
                                    @endif
                                    @if ($SeniorEval->General_Cleanliness == 1 )
                                        value
                                    @endif
                                     " title='Poor' data-value='1'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($SeniorEval->General_Cleanliness == 2 || $SeniorEval->General_Cleanliness == 3 ||$SeniorEval->General_Cleanliness == 4 ||$SeniorEval->General_Cleanliness == 5)
                                        selected
                                    @endif
                                    @if ($SeniorEval->General_Cleanliness == 2 )
                                        value
                                    @endif
                                    ' title='Fair' data-value='2'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($SeniorEval->General_Cleanliness == 3 ||$SeniorEval->General_Cleanliness == 4 ||$SeniorEval->General_Cleanliness == 5)
                                        selected
                                    @endif
                                    @if ($SeniorEval->General_Cleanliness == 3 )
                                        value
                                    @endif
                                    ' title='Good' data-value='3'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($SeniorEval->General_Cleanliness == 4 ||$SeniorEval->General_Cleanliness == 5)
                                        selected
                                    @endif
                                    @if ($SeniorEval->General_Cleanliness == 4 )
                                        value
                                    @endif
                                    ' title='Excellent' data-value='4'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($SeniorEval->General_Cleanliness == 5)
                                        selected
                                    @endif
                                    @if ($SeniorEval->General_Cleanliness == 5 )
                                        value
                                    @endif
                                    ' title='WOW!!!' data-value='5'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                  </ul>
                                </td>
                                <td>
                                    <ul class='stars Recepitionist_Quality'>
                                      <li class="star
                                      @if ($SeniorEval->Recepitionist_Quality == 1 || $SeniorEval->Recepitionist_Quality == 2 || $SeniorEval->Recepitionist_Quality == 3 ||$SeniorEval->Recepitionist_Quality == 4 ||$SeniorEval->Recepitionist_Quality == 5)
                                          selected
                                      @endif
                                      @if ($SeniorEval->Recepitionist_Quality == 1 )
                                          value
                                      @endif
                                       " title='Poor' data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($SeniorEval->Recepitionist_Quality == 2 || $SeniorEval->Recepitionist_Quality == 3 ||$SeniorEval->Recepitionist_Quality == 4 ||$SeniorEval->Recepitionist_Quality == 5)
                                          selected
                                      @endif
                                      @if ($SeniorEval->Recepitionist_Quality == 2 )
                                          value
                                      @endif
                                      ' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($SeniorEval->Recepitionist_Quality == 3 ||$SeniorEval->Recepitionist_Quality == 4 ||$SeniorEval->Recepitionist_Quality == 5)
                                          selected
                                      @endif
                                      @if ($SeniorEval->Recepitionist_Quality == 3 )
                                          value
                                      @endif
                                      ' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($SeniorEval->Recepitionist_Quality == 4 ||$SeniorEval->Recepitionist_Quality == 5)
                                          selected
                                      @endif
                                      @if ($SeniorEval->Recepitionist_Quality == 4 )
                                          value
                                      @endif
                                      ' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($SeniorEval->Recepitionist_Quality == 5)
                                          selected
                                      @endif
                                      @if ($SeniorEval->Recepitionist_Quality == 5 )
                                          value
                                      @endif
                                      ' title='WOW!!!' data-value='5'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                    </ul>
                                  </td>
                                  <td>
                                      <ul class='stars Answering_Calls_Quality'>
                                        <li class="star
                                        @if ($SeniorEval->Answering_Calls_Quality == 1 || $SeniorEval->Answering_Calls_Quality == 2 || $SeniorEval->Answering_Calls_Quality == 3 ||$SeniorEval->Answering_Calls_Quality == 4 ||$SeniorEval->Answering_Calls_Quality == 5)
                                            selected
                                        @endif
                                        @if ($SeniorEval->Answering_Calls_Quality == 1 )
                                            value
                                        @endif
                                         " title='Poor' data-value='1'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($SeniorEval->Answering_Calls_Quality == 2 || $SeniorEval->Answering_Calls_Quality == 3 ||$SeniorEval->Answering_Calls_Quality == 4 ||$SeniorEval->Answering_Calls_Quality == 5)
                                            selected
                                        @endif
                                        @if ($SeniorEval->Answering_Calls_Quality == 2 )
                                            value
                                        @endif
                                        ' title='Fair' data-value='2'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($SeniorEval->Answering_Calls_Quality == 3 ||$SeniorEval->Answering_Calls_Quality == 4 ||$SeniorEval->Answering_Calls_Quality == 5)
                                            selected
                                        @endif
                                        @if ($SeniorEval->Answering_Calls_Quality == 3 )
                                            value
                                        @endif
                                        ' title='Good' data-value='3'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($SeniorEval->Answering_Calls_Quality == 4 ||$SeniorEval->Answering_Calls_Quality == 5)
                                            selected
                                        @endif
                                        @if ($SeniorEval->Answering_Calls_Quality == 4 )
                                            value
                                        @endif
                                        ' title='Excellent' data-value='4'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($SeniorEval->Answering_Calls_Quality == 5)
                                            selected
                                        @endif
                                        @if ($SeniorEval->Answering_Calls_Quality == 5 )
                                            value
                                        @endif
                                        ' title='WOW!!!' data-value='5'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                      </ul>
                                    </td>
                      
                          <td>
                              <ul class='stars Social_Media_Quality'>
                                <li class="star
                                @if ($SeniorEval->Social_Media_Quality == 1 || $SeniorEval->Social_Media_Quality == 2 || $SeniorEval->Social_Media_Quality == 3 ||$SeniorEval->Social_Media_Quality == 4 ||$SeniorEval->Social_Media_Quality == 5)
                                    selected
                                @endif
                                @if ($SeniorEval->Social_Media_Quality == 1 )
                                    value
                                @endif
                                 " title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($SeniorEval->Social_Media_Quality == 2 || $SeniorEval->Social_Media_Quality == 3 ||$SeniorEval->Social_Media_Quality == 4 ||$SeniorEval->Social_Media_Quality == 5)
                                    selected
                                @endif
                                @if ($SeniorEval->Social_Media_Quality == 2 )
                                    value
                                @endif
                                ' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($SeniorEval->Social_Media_Quality == 3 ||$SeniorEval->Social_Media_Quality == 4 ||$SeniorEval->Social_Media_Quality == 5)
                                    selected
                                @endif
                                @if ($SeniorEval->Social_Media_Quality == 3 )
                                    value
                                @endif
                                ' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($SeniorEval->Social_Media_Quality == 4 ||$SeniorEval->Social_Media_Quality == 5)
                                    selected
                                @endif
                                @if ($SeniorEval->Social_Media_Quality == 4 )
                                    value
                                @endif
                                ' title='Excellent' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($SeniorEval->Social_Media_Quality == 5)
                                    selected
                                @endif
                                @if ($SeniorEval->Social_Media_Quality == 5 )
                                    value
                                @endif
                                ' title='WOW!!!' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                              </ul>
                            </td>
                            
                          <td>
                            <ul class='stars Overall_Evaluation'>
                              <li class="star
                              @if ($SeniorEval->Overall_Evaluation == 1 || $SeniorEval->Overall_Evaluation == 2 || $SeniorEval->Overall_Evaluation == 3 ||$SeniorEval->Overall_Evaluation == 4 ||$SeniorEval->Overall_Evaluation == 5)
                                  selected
                              @endif
                              @if ($SeniorEval->Overall_Evaluation == 1 )
                                  value
                              @endif
                               " title='Poor' data-value='1'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star
                              @if ($SeniorEval->Overall_Evaluation == 2 || $SeniorEval->Overall_Evaluation == 3 ||$SeniorEval->Overall_Evaluation == 4 ||$SeniorEval->Overall_Evaluation == 5)
                                  selected
                              @endif
                              @if ($SeniorEval->Overall_Evaluation == 2 )
                                  value
                              @endif
                              ' title='Fair' data-value='2'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star
                              @if ($SeniorEval->Overall_Evaluation == 3 ||$SeniorEval->Overall_Evaluation == 4 ||$SeniorEval->Overall_Evaluation == 5)
                                  selected
                              @endif
                              @if ($SeniorEval->Overall_Evaluation == 3 )
                                  value
                              @endif
                              ' title='Good' data-value='3'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star
                              @if ($SeniorEval->Overall_Evaluation == 4 ||$SeniorEval->Overall_Evaluation == 5)
                                  selected
                              @endif
                              @if ($SeniorEval->Overall_Evaluation == 4 )
                                  value
                              @endif
                              ' title='Excellent' data-value='4'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star
                              @if ($SeniorEval->Overall_Evaluation == 5)
                                  selected
                              @endif
                              @if ($SeniorEval->Overall_Evaluation == 5 )
                                  value
                              @endif
                              ' title='WOW!!!' data-value='5'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                            </ul>
                          </td>
                      <td>
                        <?php
                          $totaltrainer = (($SeniorEval->Students_Deal + $SeniorEval->Solving_Problems + $SeniorEval->Buffet_Quality + $SeniorEval->General_Cleanliness + $SeniorEval->Recepitionist_Quality + $SeniorEval->Answering_Calls_Quality + $SeniorEval->Overall_Evaluation)/35)*100 ;
                        ?>
                          <div
                          class="progress-circle"
                      data-value="0.@if ($totaltrainer !== 0){{number_format($totaltrainer,0)}}@endif"
                          data-size="50"
                          data-thickness="3"
                          data-animation-start-value="1.0"
                          data-fill="{
                            &quot;color&quot;: &quot;green&quot;
                          }"
                          data-reverse="true">
                          <div class="percent">
                              @if ($totaltrainer !== 0)
                                  {{number_format($totaltrainer,0)}}
                                  @else
                                  0
                              @endif%
                          </div>
                        </div>
                      </td>
                      <td class="note">
                      <textarea name="" id="" rows="2" class="form-control notes" placeholder="note">{{$SeniorEval->Notes}}</textarea>
                      </td>
                    </form>

                  </tr>
                  @php
                      $i++
                  @endphp
@endforeach
                  

                </tbody>
              </table>
            </div>
          </div>
        </div>

          <div class="ms-panel">
              <div class="ms-panel-header d-flex py-2 align-items-center justify-content-between">
              <h6>ُEvaluate trainer per topic</h6>
                  <div>
                      <input type="reset" form="fform" class="btn btn-warning" value="undo">
                      <input value="Save" type="submit" id="saveTPer" class="btn btn-success">
                  </div>
                </div>
            
            <div class="ms-panel-body">
              
              <div class="table-responsive">
                <table id="trainerper" class="dattable table table-striped thead-dark  w-100">
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
    <tr>
    <td>{{$i}}</td>
    <td class="content" data-eval="{{$TrainerEval->TrainerEvaluationsId}}">{{$TrainerEval->ContentNameEn}}</td>

                      <form id="fform" action="">
                          <td>
                              <ul class='stars Knowledge_Experience'>
                                <li class="star
                                @if ($TrainerEval->Knowledge_Experience == 1 || $TrainerEval->Knowledge_Experience == 2 || $TrainerEval->Knowledge_Experience == 3 ||$TrainerEval->Knowledge_Experience == 4 ||$TrainerEval->Knowledge_Experience == 5)
                                    selected
                                @endif
                                @if ($TrainerEval->Knowledge_Experience == 1 )
                                    value
                                @endif
                                 " title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($TrainerEval->Knowledge_Experience == 2 || $TrainerEval->Knowledge_Experience == 3 ||$TrainerEval->Knowledge_Experience == 4 ||$TrainerEval->Knowledge_Experience == 5)
                                    selected
                                @endif
                                @if ($TrainerEval->Knowledge_Experience == 2 )
                                    value
                                @endif
                                ' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($TrainerEval->Knowledge_Experience == 3 ||$TrainerEval->Knowledge_Experience == 4 ||$TrainerEval->Knowledge_Experience == 5)
                                    selected
                                @endif
                                @if ($TrainerEval->Knowledge_Experience == 3 )
                                    value
                                @endif
                                ' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($TrainerEval->Knowledge_Experience == 4 ||$TrainerEval->Knowledge_Experience == 5)
                                    selected
                                @endif
                                @if ($TrainerEval->Knowledge_Experience == 4 )
                                    value
                                @endif
                                ' title='Excellent' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($TrainerEval->Knowledge_Experience == 5)
                                    selected
                                @endif
                                @if ($TrainerEval->Knowledge_Experience == 5 )
                                    value
                                @endif
                                ' title='WOW!!!' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                              </ul>
                            </td>
                            <td>
                                <ul class='stars Training_Qualified'>
                                  <li class="star
                                  @if ($TrainerEval->Training_Qualified == 1 || $TrainerEval->Training_Qualified == 2 || $TrainerEval->Training_Qualified == 3 ||$TrainerEval->Training_Qualified == 4 ||$TrainerEval->Training_Qualified == 5)
                                      selected
                                  @endif
                                  @if ($TrainerEval->Training_Qualified == 1 )
                                      value
                                  @endif
                                   " title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($TrainerEval->Training_Qualified == 2 || $TrainerEval->Training_Qualified == 3 ||$TrainerEval->Training_Qualified == 4 ||$TrainerEval->Training_Qualified == 5)
                                      selected
                                  @endif
                                  @if ($TrainerEval->Training_Qualified == 2 )
                                      value
                                  @endif
                                  ' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($TrainerEval->Training_Qualified == 3 ||$TrainerEval->Training_Qualified == 4 ||$TrainerEval->Training_Qualified == 5)
                                      selected
                                  @endif
                                  @if ($TrainerEval->Training_Qualified == 3 )
                                      value
                                  @endif
                                  ' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($TrainerEval->Training_Qualified == 4 ||$TrainerEval->Training_Qualified == 5)
                                      selected
                                  @endif
                                  @if ($TrainerEval->Training_Qualified == 4 )
                                      value
                                  @endif
                                  ' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($TrainerEval->Training_Qualified == 5)
                                      selected
                                  @endif
                                  @if ($TrainerEval->Training_Qualified == 5 )
                                      value
                                  @endif
                                  ' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                </ul>
                              </td>
                              <td>
                                  <ul class='stars Topics_Preparation'>
                                    <li class="star
                                    @if ($TrainerEval->Topics_Preparation == 1 || $TrainerEval->Topics_Preparation == 2 || $TrainerEval->Topics_Preparation == 3 ||$TrainerEval->Topics_Preparation == 4 ||$TrainerEval->Topics_Preparation == 5)
                                        selected
                                    @endif
                                    @if ($TrainerEval->Topics_Preparation == 1 )
                                        value
                                    @endif
                                     " title='Poor' data-value='1'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($TrainerEval->Topics_Preparation == 2 || $TrainerEval->Topics_Preparation == 3 ||$TrainerEval->Topics_Preparation == 4 ||$TrainerEval->Topics_Preparation == 5)
                                        selected
                                    @endif
                                    @if ($TrainerEval->Topics_Preparation == 2 )
                                        value
                                    @endif
                                    ' title='Fair' data-value='2'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($TrainerEval->Topics_Preparation == 3 ||$TrainerEval->Topics_Preparation == 4 ||$TrainerEval->Topics_Preparation == 5)
                                        selected
                                    @endif
                                    @if ($TrainerEval->Topics_Preparation == 3 )
                                        value
                                    @endif
                                    ' title='Good' data-value='3'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($TrainerEval->Topics_Preparation == 4 ||$TrainerEval->Topics_Preparation == 5)
                                        selected
                                    @endif
                                    @if ($TrainerEval->Topics_Preparation == 4 )
                                        value
                                    @endif
                                    ' title='Excellent' data-value='4'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($TrainerEval->Topics_Preparation == 5)
                                        selected
                                    @endif
                                    @if ($TrainerEval->Topics_Preparation == 5 )
                                        value
                                    @endif
                                    ' title='WOW!!!' data-value='5'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                  </ul>
                                </td>
                                <td>
                                    <ul class='stars Trainer_Attitude'>
                                      <li class="star
                                      @if ($TrainerEval->Trainer_Attitude == 1 || $TrainerEval->Trainer_Attitude == 2 || $TrainerEval->Trainer_Attitude == 3 ||$TrainerEval->Trainer_Attitude == 4 ||$TrainerEval->Trainer_Attitude == 5)
                                          selected
                                      @endif
                                      @if ($TrainerEval->Trainer_Attitude == 1 )
                                          value
                                      @endif
                                       " title='Poor' data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($TrainerEval->Trainer_Attitude == 2 || $TrainerEval->Trainer_Attitude == 3 ||$TrainerEval->Trainer_Attitude == 4 ||$TrainerEval->Trainer_Attitude == 5)
                                          selected
                                      @endif
                                      @if ($TrainerEval->Trainer_Attitude == 2 )
                                          value
                                      @endif
                                      ' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($TrainerEval->Trainer_Attitude == 3 ||$TrainerEval->Trainer_Attitude == 4 ||$TrainerEval->Trainer_Attitude == 5)
                                          selected
                                      @endif
                                      @if ($TrainerEval->Trainer_Attitude == 3 )
                                          value
                                      @endif
                                      ' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($TrainerEval->Trainer_Attitude == 4 ||$TrainerEval->Trainer_Attitude == 5)
                                          selected
                                      @endif
                                      @if ($TrainerEval->Trainer_Attitude == 4 )
                                          value
                                      @endif
                                      ' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($TrainerEval->Trainer_Attitude == 5)
                                          selected
                                      @endif
                                      @if ($TrainerEval->Trainer_Attitude == 5 )
                                          value
                                      @endif
                                      ' title='WOW!!!' data-value='5'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                    </ul>
                                  </td>
                                  <td>
                                      <ul class='stars Time_Respect'>
                                        <li class="star
                                        @if ($TrainerEval->Time_Respect == 1 || $TrainerEval->Time_Respect == 2 || $TrainerEval->Time_Respect == 3 ||$TrainerEval->Time_Respect == 4 ||$TrainerEval->Time_Respect == 5)
                                            selected
                                        @endif
                                        @if ($TrainerEval->Time_Respect == 1 )
                                            value
                                        @endif
                                         " title='Poor' data-value='1'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($TrainerEval->Time_Respect == 2 || $TrainerEval->Time_Respect == 3 ||$TrainerEval->Time_Respect == 4 ||$TrainerEval->Time_Respect == 5)
                                            selected
                                        @endif
                                        @if ($TrainerEval->Time_Respect == 2 )
                                            value
                                        @endif
                                        ' title='Fair' data-value='2'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($TrainerEval->Time_Respect == 3 ||$TrainerEval->Time_Respect == 4 ||$TrainerEval->Time_Respect == 5)
                                            selected
                                        @endif
                                        @if ($TrainerEval->Time_Respect == 3 )
                                            value
                                        @endif
                                        ' title='Good' data-value='3'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($TrainerEval->Time_Respect == 4 ||$TrainerEval->Time_Respect == 5)
                                            selected
                                        @endif
                                        @if ($TrainerEval->Time_Respect == 4 )
                                            value
                                        @endif
                                        ' title='Excellent' data-value='4'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($TrainerEval->Time_Respect == 5)
                                            selected
                                        @endif
                                        @if ($TrainerEval->Time_Respect == 5 )
                                            value
                                        @endif
                                        ' title='WOW!!!' data-value='5'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                      </ul>
                                    </td>
                                    <td>
                                        <ul class='stars Student_Interaction'>
                                          <li class="star
                                          @if ($TrainerEval->Student_Interaction == 1 || $TrainerEval->Student_Interaction == 2 || $TrainerEval->Student_Interaction == 3 ||$TrainerEval->Student_Interaction == 4 ||$TrainerEval->Student_Interaction == 5)
                                              selected
                                          @endif
                                          @if ($TrainerEval->Student_Interaction == 1 )
                                              value
                                          @endif
                                           " title='Poor' data-value='1'>
                                            <i class='fa fa-star fa-fw'></i>
                                          </li>
                                          <li class='star
                                          @if ($TrainerEval->Student_Interaction == 2 || $TrainerEval->Student_Interaction == 3 ||$TrainerEval->Student_Interaction == 4 ||$TrainerEval->Student_Interaction == 5)
                                              selected
                                          @endif
                                          @if ($TrainerEval->Student_Interaction == 2 )
                                              value
                                          @endif
                                          ' title='Fair' data-value='2'>
                                            <i class='fa fa-star fa-fw'></i>
                                          </li>
                                          <li class='star
                                          @if ($TrainerEval->Student_Interaction == 3 ||$TrainerEval->Student_Interaction == 4 ||$TrainerEval->Student_Interaction == 5)
                                              selected
                                          @endif
                                          @if ($TrainerEval->Student_Interaction == 3 )
                                              value
                                          @endif
                                          ' title='Good' data-value='3'>
                                            <i class='fa fa-star fa-fw'></i>
                                          </li>
                                          <li class='star
                                          @if ($TrainerEval->Student_Interaction == 4 ||$TrainerEval->Student_Interaction == 5)
                                              selected
                                          @endif
                                          @if ($TrainerEval->Student_Interaction == 4 )
                                              value
                                          @endif
                                          ' title='Excellent' data-value='4'>
                                            <i class='fa fa-star fa-fw'></i>
                                          </li>
                                          <li class='star
                                          @if ($TrainerEval->Student_Interaction == 5)
                                              selected
                                          @endif
                                          @if ($TrainerEval->Student_Interaction == 5 )
                                              value
                                          @endif
                                          ' title='WOW!!!' data-value='5'>
                                            <i class='fa fa-star fa-fw'></i>
                                          </li>
                                        </ul>
                                      </td>
                        
                            <td>
                                <ul class='stars Overall_Evaluation'>
                                  <li class="star
                                  @if ($TrainerEval->Overall_Evaluation == 1 || $TrainerEval->Overall_Evaluation == 2 || $TrainerEval->Overall_Evaluation == 3 ||$TrainerEval->Overall_Evaluation == 4 ||$TrainerEval->Overall_Evaluation == 5)
                                      selected
                                  @endif
                                  @if ($TrainerEval->Overall_Evaluation == 1 )
                                      value
                                  @endif
                                   " title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($TrainerEval->Overall_Evaluation == 2 || $TrainerEval->Overall_Evaluation == 3 ||$TrainerEval->Overall_Evaluation == 4 ||$TrainerEval->Overall_Evaluation == 5)
                                      selected
                                  @endif
                                  @if ($TrainerEval->Overall_Evaluation == 2 )
                                      value
                                  @endif
                                  ' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($TrainerEval->Overall_Evaluation == 3 ||$TrainerEval->Overall_Evaluation == 4 ||$TrainerEval->Overall_Evaluation == 5)
                                      selected
                                  @endif
                                  @if ($TrainerEval->Overall_Evaluation == 3 )
                                      value
                                  @endif
                                  ' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($TrainerEval->Overall_Evaluation == 4 ||$TrainerEval->Overall_Evaluation == 5)
                                      selected
                                  @endif
                                  @if ($TrainerEval->Overall_Evaluation == 4 )
                                      value
                                  @endif
                                  ' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($TrainerEval->Overall_Evaluation == 5)
                                      selected
                                  @endif
                                  @if ($TrainerEval->Overall_Evaluation == 5 )
                                      value
                                  @endif
                                  ' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                </ul>
                              </td>
                        <td>
                          <?php
                            $totaltrainer = (($TrainerEval->Knowledge_Experience + $TrainerEval->Training_Qualified + $TrainerEval->Topics_Preparation + $TrainerEval->Trainer_Attitude + $TrainerEval->Time_Respect + $TrainerEval->Student_Interaction + $TrainerEval->Overall_Evaluation)/35)*100 ;
                          ?>
                            <div
                            class="progress-circle"
                        data-value="0.@if ($totaltrainer !== 0){{number_format($totaltrainer,0)}}@endif"
                            data-size="50"
                            data-thickness="3"
                            data-animation-start-value="1.0"
                            data-fill="{
                              &quot;color&quot;: &quot;green&quot;
                            }"
                            data-reverse="true">
                            <div class="percent">
                                @if ($totaltrainer !== 0)
                                    {{number_format($totaltrainer,0)}}
                                    @else
                                    0
                                @endif%
                            </div>
                          </div>
                        </td>
                        <td class="note">
                        <textarea name="" id="" rows="2" class="form-control notes" placeholder="note">{{$TrainerEval->Notes}}</textarea>
                        </td>
                      </form>

                    </tr>
                    @php
                        $i++
                    @endphp
@endforeach
                    

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="ms-panel">
            <div class="ms-panel-header d-flex py-2 align-items-center justify-content-between">
              <h6>ُCourse Evaluation</h6>
              <div>
                  <input type="reset" form="fform" class="btn btn-warning" value="undo">
                  {{-- <input value="Save" type="submit" id="saveTPer" class="btn btn-success"> --}}
                  <input type="submit" id="saveRoundEval" class="btn btn-success" value="save">
              </div>
            </div>
            <div class="ms-panel-body">
              <div class="mb-3 ">
              </div>
              <div class="table-responsive">
                <table id="RoundEval" class="dattable table table-striped thead-dark  w-100">
                  <thead>
                    <th>#</th>
                    <th>Topic</th>
                    <th> Course Wealthy </th>
                    <th> Enough Hours </th>
                    <th>Enough Practice</th>
                    <th>Materials Evaluation</th>
                    <th>Suitable price</th>
                    <th>Overall Education</th>
                    <th>Total</th>
                    <th>note </th>
                  </thead>
                  <tbody>
                    @php
                        $i = 1
                    @endphp
@foreach ($RoundEvaluations as $RoundEval)
    <tr>
      <td>{{$i}}</td>
                      <td class="content" data-eval="{{$RoundEval->RoundEvaluationId}}">{{$RoundEval->ContentNameEn}}</td>

                      <form action="">

                          <td>
                              <ul class='stars Course_Wealthy'>
                                <li class="star
                                @if ($RoundEval->Course_Wealthy == 1 || $RoundEval->Course_Wealthy == 2 || $RoundEval->Course_Wealthy == 3 ||$RoundEval->Course_Wealthy == 4 ||$RoundEval->Course_Wealthy == 5)
                                    selected
                                @endif
                                @if ($RoundEval->Course_Wealthy == 1 )
                                    value
                                @endif
                                 " title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($RoundEval->Course_Wealthy == 2 || $RoundEval->Course_Wealthy == 3 ||$RoundEval->Course_Wealthy == 4 ||$RoundEval->Course_Wealthy == 5)
                                    selected
                                @endif
                                @if ($RoundEval->Course_Wealthy == 2 )
                                    value
                                @endif
                                ' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($RoundEval->Course_Wealthy == 3 ||$RoundEval->Course_Wealthy == 4 ||$RoundEval->Course_Wealthy == 5)
                                    selected
                                @endif
                                @if ($RoundEval->Course_Wealthy == 3 )
                                    value
                                @endif
                                ' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($RoundEval->Course_Wealthy == 4 ||$RoundEval->Course_Wealthy == 5)
                                    selected
                                @endif
                                @if ($RoundEval->Course_Wealthy == 4 )
                                    value
                                @endif
                                ' title='Excellent' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($RoundEval->Course_Wealthy == 5)
                                    selected
                                @endif
                                @if ($RoundEval->Course_Wealthy == 5 )
                                    value
                                @endif
                                ' title='WOW!!!' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                              </ul>
                            </td>
                            <td>
                                <ul class='stars Enough_Hours'>
                                  <li class="star
                                  @if ($RoundEval->Enough_Hours == 1 || $RoundEval->Enough_Hours == 2 || $RoundEval->Enough_Hours == 3 ||$RoundEval->Enough_Hours == 4 ||$RoundEval->Enough_Hours == 5)
                                      selected
                                  @endif
                                  @if ($RoundEval->Enough_Hours == 1 )
                                      value
                                  @endif
                                   " title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($RoundEval->Enough_Hours == 2 || $RoundEval->Enough_Hours == 3 ||$RoundEval->Enough_Hours == 4 ||$RoundEval->Enough_Hours == 5)
                                      selected
                                  @endif
                                  @if ($RoundEval->Enough_Hours == 2 )
                                      value
                                  @endif
                                  ' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($RoundEval->Enough_Hours == 3 ||$RoundEval->Enough_Hours == 4 ||$RoundEval->Enough_Hours == 5)
                                      selected
                                  @endif
                                  @if ($RoundEval->Enough_Hours == 3 )
                                      value
                                  @endif
                                  ' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($RoundEval->Enough_Hours == 4 ||$RoundEval->Enough_Hours == 5)
                                      selected
                                  @endif
                                  @if ($RoundEval->Enough_Hours == 4 )
                                      value
                                  @endif
                                  ' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($RoundEval->Enough_Hours == 5)
                                      selected
                                  @endif
                                  @if ($RoundEval->Enough_Hours == 5 )
                                      value
                                  @endif
                                  ' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                </ul>
                              </td>
                              <td>
                                  <ul class='stars Enough_Practice'>
                                    <li class="star
                                    @if ($RoundEval->Enough_Practice == 1 || $RoundEval->Enough_Practice == 2 || $RoundEval->Enough_Practice == 3 ||$RoundEval->Enough_Practice == 4 ||$RoundEval->Enough_Practice == 5)
                                        selected
                                    @endif
                                    @if ($RoundEval->Enough_Practice == 1 )
                                        value
                                    @endif
                                     " title='Poor' data-value='1'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($RoundEval->Enough_Practice == 2 || $RoundEval->Enough_Practice == 3 ||$RoundEval->Enough_Practice == 4 ||$RoundEval->Enough_Practice == 5)
                                        selected
                                    @endif
                                    @if ($RoundEval->Enough_Practice == 2 )
                                        value
                                    @endif
                                    ' title='Fair' data-value='2'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($RoundEval->Enough_Practice == 3 ||$RoundEval->Enough_Practice == 4 ||$RoundEval->Enough_Practice == 5)
                                        selected
                                    @endif
                                    @if ($RoundEval->Enough_Practice == 3 )
                                        value
                                    @endif
                                    ' title='Good' data-value='3'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($RoundEval->Enough_Practice == 4 ||$RoundEval->Enough_Practice == 5)
                                        selected
                                    @endif
                                    @if ($RoundEval->Enough_Practice == 4 )
                                        value
                                    @endif
                                    ' title='Excellent' data-value='4'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($RoundEval->Enough_Practice == 5)
                                        selected
                                    @endif
                                    @if ($RoundEval->Enough_Practice == 5 )
                                        value
                                    @endif
                                    ' title='WOW!!!' data-value='5'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                  </ul>
                                </td>
                                <td>
                                    <ul class='stars Materials_Evaluation'>
                                      <li class="star
                                      @if ($RoundEval->Materials_Evaluation == 1 || $RoundEval->Materials_Evaluation == 2 || $RoundEval->Materials_Evaluation == 3 ||$RoundEval->Materials_Evaluation == 4 ||$RoundEval->Materials_Evaluation == 5)
                                          selected
                                      @endif
                                      @if ($RoundEval->Materials_Evaluation == 1 )
                                          value
                                      @endif
                                       " title='Poor' data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($RoundEval->Materials_Evaluation == 2 || $RoundEval->Materials_Evaluation == 3 ||$RoundEval->Materials_Evaluation == 4 ||$RoundEval->Materials_Evaluation == 5)
                                          selected
                                      @endif
                                      @if ($RoundEval->Materials_Evaluation == 2 )
                                          value
                                      @endif
                                      ' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($RoundEval->Materials_Evaluation == 3 ||$RoundEval->Materials_Evaluation == 4 ||$RoundEval->Materials_Evaluation == 5)
                                          selected
                                      @endif
                                      @if ($RoundEval->Materials_Evaluation == 3 )
                                          value
                                      @endif
                                      ' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($RoundEval->Materials_Evaluation == 4 ||$RoundEval->Materials_Evaluation == 5)
                                          selected
                                      @endif
                                      @if ($RoundEval->Materials_Evaluation == 4 )
                                          value
                                      @endif
                                      ' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($RoundEval->Materials_Evaluation == 5)
                                          selected
                                      @endif
                                      @if ($RoundEval->Materials_Evaluation == 5 )
                                          value
                                      @endif
                                      ' title='WOW!!!' data-value='5'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                    </ul>
                                  </td>
                                  <td>
                                      <ul class='stars Suitable_Price'>
                                        <li class="star
                                        @if ($RoundEval->Suitable_Price == 1 || $RoundEval->Suitable_Price == 2 || $RoundEval->Suitable_Price == 3 ||$RoundEval->Suitable_Price == 4 ||$RoundEval->Suitable_Price == 5)
                                            selected
                                        @endif
                                        @if ($RoundEval->Suitable_Price == 1 )
                                            value
                                        @endif
                                         " title='Poor' data-value='1'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($RoundEval->Suitable_Price == 2 || $RoundEval->Suitable_Price == 3 ||$RoundEval->Suitable_Price == 4 ||$RoundEval->Suitable_Price == 5)
                                            selected
                                        @endif
                                        @if ($RoundEval->Suitable_Price == 2 )
                                            value
                                        @endif
                                        ' title='Fair' data-value='2'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($RoundEval->Suitable_Price == 3 ||$RoundEval->Suitable_Price == 4 ||$RoundEval->Suitable_Price == 5)
                                            selected
                                        @endif
                                        @if ($RoundEval->Suitable_Price == 3 )
                                            value
                                        @endif
                                        ' title='Good' data-value='3'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($RoundEval->Suitable_Price == 4 ||$RoundEval->Suitable_Price == 5)
                                            selected
                                        @endif
                                        @if ($RoundEval->Suitable_Price == 4 )
                                            value
                                        @endif
                                        ' title='Excellent' data-value='4'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li> 
                                        <li class='star
                                        @if ($RoundEval->Suitable_Price == 5)
                                            selected
                                        @endif
                                        @if ($RoundEval->Suitable_Price == 5 )
                                            value
                                        @endif
                                        ' title='WOW!!!' data-value='5'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                      </ul>
                                    </td>
                                    <td>
                                        <ul class='stars Overall_Education'>
                                          <li class="star
                                          @if ($RoundEval->Overall_Education == 1 || $RoundEval->Overall_Education == 2 || $RoundEval->Overall_Education == 3 ||$RoundEval->Overall_Education == 4 ||$RoundEval->Overall_Education == 5)
                                              selected
                                          @endif
                                          @if ($RoundEval->Overall_Education == 1 )
                                              value
                                          @endif
                                           " title='Poor' data-value='1'>
                                            <i class='fa fa-star fa-fw'></i>
                                          </li>
                                          <li class='star
                                          @if ($RoundEval->Overall_Education == 2 || $RoundEval->Overall_Education == 3 ||$RoundEval->Overall_Education == 4 ||$RoundEval->Overall_Education == 5)
                                              selected
                                          @endif
                                          @if ($RoundEval->Overall_Education == 2 )
                                              value
                                          @endif
                                          ' title='Fair' data-value='2'>
                                            <i class='fa fa-star fa-fw'></i>
                                          </li>
                                          <li class='star
                                          @if ($RoundEval->Overall_Education == 3 ||$RoundEval->Overall_Education == 4 ||$RoundEval->Overall_Education == 5)
                                              selected
                                          @endif
                                          @if ($RoundEval->Overall_Education == 3 )
                                              value
                                          @endif
                                          ' title='Good' data-value='3'>
                                            <i class='fa fa-star fa-fw'></i>
                                          </li>
                                          <li class='star
                                          @if ($RoundEval->Overall_Education == 4 ||$RoundEval->Overall_Education == 5)
                                              selected
                                          @endif
                                          @if ($RoundEval->Overall_Education == 4 )
                                              value
                                          @endif
                                          ' title='Excellent' data-value='4'>
                                            <i class='fa fa-star fa-fw'></i>
                                          </li>
                                          <li class='star
                                          @if ($RoundEval->Overall_Education == 5)
                                              selected
                                          @endif
                                          @if ($RoundEval->Overall_Education == 5 )
                                              value
                                          @endif
                                          ' title='WOW!!!' data-value='5'>
                                            <i class='fa fa-star fa-fw'></i>
                                          </li>
                                        </ul>
                                      </td>
                        <td>
                            <?php
                            $totalround = (($RoundEval->Course_Wealthy + $RoundEval->Enough_Hours + $RoundEval->Enough_Practice + $RoundEval->Materials_Evaluation + $RoundEval->Suitable_Price + $RoundEval->Overall_Education)/30)*100 ;
                          ?>
                            <div
                            class="progress-circle"
                            data-value="0.@if ($totalround !== 0){{number_format($totalround,0)}}@endif"
                            data-size="50"
                            data-thickness="3"
                            data-animation-start-value="1.0"
                            data-fill="{
                              &quot;color&quot;: &quot;green&quot;
                            }"
                            data-reverse="true">
                            <div class="percent">
                                @if ($totalround !== 0)
                                    {{number_format($totalround,0)}}
                                    @else
                                    0
                                @endif%
                            </div>
                          </div>
                        </td>
                        <td class="note">
                          <textarea name="" id="" rows="2" class="form-control notes" placeholder="note">{{$RoundEval->Notes}}</textarea>
                        </td>
                      </form>

                    </tr>
                    @php
                        $i++
                    @endphp

@endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="ms-panel">
            <div class="ms-panel-header d-flex py-2 align-items-center justify-content-between">
              <h6>Center Evaluation</h6>
              <div>
                  <input type="reset" form="fform" class="btn btn-warning" value="undo">
                  <input type="submit" id="saveCenterEval" class="btn btn-success" value="save">
              </div>
            </div>
            <div class="ms-panel-body">
              <div class="mb-3 ">
              </div>
              <div class="table-responsive">
                <table id="CenterEval" class="dattable table table-striped thead-dark  w-100">
                  <thead>
                    <th>#</th>
                    <th>Topic</th>
                    <th> PCs Quality  </th>
                    <th> Projectors Quality </th>
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
@foreach ($CenterEvaluations as $CenterEval)
                        <tr>
                        <td>{{$i}}</td>
                      <td  class="content" data-eval="{{$CenterEval->CenterEvaluationId}}">{{$CenterEval->ContentNameEn}}</td>
                      <td>
                          <ul class='stars PCs_Quality'>
                            <li class="star
                            @if ($CenterEval->PCs_Quality == 1 || $CenterEval->PCs_Quality == 2 || $CenterEval->PCs_Quality == 3 ||$CenterEval->PCs_Quality == 4 ||$CenterEval->PCs_Quality == 5)
                                selected
                            @endif
                            @if ($CenterEval->PCs_Quality == 1 )
                                value
                            @endif
                             " title='Poor' data-value='1'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star
                            @if ($CenterEval->PCs_Quality == 2 || $CenterEval->PCs_Quality == 3 ||$CenterEval->PCs_Quality == 4 ||$CenterEval->PCs_Quality == 5)
                                selected
                            @endif
                            @if ($CenterEval->PCs_Quality == 2 )
                                value
                            @endif
                            ' title='Fair' data-value='2'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star
                            @if ($CenterEval->PCs_Quality == 3 ||$CenterEval->PCs_Quality == 4 ||$CenterEval->PCs_Quality == 5)
                                selected
                            @endif
                            @if ($CenterEval->PCs_Quality == 3 )
                                value
                            @endif
                            ' title='Good' data-value='3'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star
                            @if ($CenterEval->PCs_Quality == 4 ||$CenterEval->PCs_Quality == 5)
                                selected
                            @endif
                            @if ($CenterEval->PCs_Quality == 4 )
                                value
                            @endif
                            ' title='Excellent' data-value='4'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star
                            @if ($CenterEval->PCs_Quality == 5)
                                selected
                            @endif
                            @if ($CenterEval->PCs_Quality == 5 )
                                value
                            @endif
                            ' title='WOW!!!' data-value='5'>
                              <i class='fa fa-star fa-fw'></i>
                            </li>
                          </ul>
                        </td>
                        <td>
                            <ul class='stars Projectors_Quality'>
                              <li class="star
                              @if ($CenterEval->Projectors_Quality == 1 || $CenterEval->Projectors_Quality == 2 || $CenterEval->Projectors_Quality == 3 ||$CenterEval->Projectors_Quality == 4 ||$CenterEval->Projectors_Quality == 5)
                                  selected
                              @endif
                              @if ($CenterEval->Projectors_Quality == 1 )
                                  value
                              @endif
                               " title='Poor' data-value='1'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star
                              @if ($CenterEval->Projectors_Quality == 2 || $CenterEval->Projectors_Quality == 3 ||$CenterEval->Projectors_Quality == 4 ||$CenterEval->Projectors_Quality == 5)
                                  selected
                              @endif
                              @if ($CenterEval->Projectors_Quality == 2 )
                                  value
                              @endif
                              ' title='Fair' data-value='2'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star
                              @if ($CenterEval->Projectors_Quality == 3 ||$CenterEval->Projectors_Quality == 4 ||$CenterEval->Projectors_Quality == 5)
                                  selected
                              @endif
                              @if ($CenterEval->Projectors_Quality == 3 )
                                  value
                              @endif
                              ' title='Good' data-value='3'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star
                              @if ($CenterEval->Projectors_Quality == 4 ||$CenterEval->Projectors_Quality == 5)
                                  selected
                              @endif
                              @if ($CenterEval->Projectors_Quality == 4 )
                                  value
                              @endif
                              ' title='Excellent' data-value='4'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star
                              @if ($CenterEval->Projectors_Quality == 5)
                                  selected
                              @endif
                              @if ($CenterEval->Projectors_Quality == 5 )
                                  value
                              @endif
                              ' title='WOW!!!' data-value='5'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                            </ul>
                          </td>
                          <td>
                              <ul class='stars Air_Conditioners'>
                                <li class="star
                                @if ($CenterEval->Air_Conditioners == 1 || $CenterEval->Air_Conditioners == 2 || $CenterEval->Air_Conditioners == 3 ||$CenterEval->Air_Conditioners == 4 ||$CenterEval->Air_Conditioners == 5)
                                    selected
                                @endif
                                @if ($CenterEval->Air_Conditioners == 1 )
                                    value
                                @endif
                                 " title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($CenterEval->Air_Conditioners == 2 || $CenterEval->Air_Conditioners == 3 ||$CenterEval->Air_Conditioners == 4 ||$CenterEval->Air_Conditioners == 5)
                                    selected
                                @endif
                                @if ($CenterEval->Air_Conditioners == 2 )
                                    value
                                @endif
                                ' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($CenterEval->Air_Conditioners == 3 ||$CenterEval->Air_Conditioners == 4 ||$CenterEval->Air_Conditioners == 5)
                                    selected
                                @endif
                                @if ($CenterEval->Air_Conditioners == 3 )
                                    value
                                @endif
                                ' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($CenterEval->Air_Conditioners == 4 ||$CenterEval->Air_Conditioners == 5)
                                    selected
                                @endif
                                @if ($CenterEval->Air_Conditioners == 4 )
                                    value
                                @endif
                                ' title='Excellent' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star
                                @if ($CenterEval->Air_Conditioners == 5)
                                    selected
                                @endif
                                @if ($CenterEval->Air_Conditioners == 5 )
                                    value
                                @endif
                                ' title='WOW!!!' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                              </ul>
                            </td>
                            <td>
                                <ul class='stars Seats_Quality'>
                                  <li class="star
                                  @if ($CenterEval->Seats_Quality == 1 || $CenterEval->Seats_Quality == 2 || $CenterEval->Seats_Quality == 3 ||$CenterEval->Seats_Quality == 4 ||$CenterEval->Seats_Quality == 5)
                                      selected
                                  @endif
                                  @if ($CenterEval->Seats_Quality == 1 )
                                      value
                                  @endif
                                   " title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($CenterEval->Seats_Quality == 2 || $CenterEval->Seats_Quality == 3 ||$CenterEval->Seats_Quality == 4 ||$CenterEval->Seats_Quality == 5)
                                      selected
                                  @endif
                                  @if ($CenterEval->Seats_Quality == 2 )
                                      value
                                  @endif
                                  ' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($CenterEval->Seats_Quality == 3 ||$CenterEval->Seats_Quality == 4 ||$CenterEval->Seats_Quality == 5)
                                      selected
                                  @endif
                                  @if ($CenterEval->Seats_Quality == 3 )
                                      value
                                  @endif
                                  ' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($CenterEval->Seats_Quality == 4 ||$CenterEval->Seats_Quality == 5)
                                      selected
                                  @endif
                                  @if ($CenterEval->Seats_Quality == 4 )
                                      value
                                  @endif
                                  ' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star
                                  @if ($CenterEval->Seats_Quality == 5)
                                      selected
                                  @endif
                                  @if ($CenterEval->Seats_Quality == 5 )
                                      value
                                  @endif
                                  ' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                </ul>
                              </td>
                              <td>
                                  <ul class='stars Lab_Cleaning'>
                                    <li class="star
                                    @if ($CenterEval->Lab_Cleaning == 1 || $CenterEval->Lab_Cleaning == 2 || $CenterEval->Lab_Cleaning == 3 ||$CenterEval->Lab_Cleaning == 4 ||$CenterEval->Lab_Cleaning == 5)
                                        selected
                                    @endif
                                    @if ($CenterEval->Lab_Cleaning == 1 )
                                        value
                                    @endif
                                     " title='Poor' data-value='1'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($CenterEval->Lab_Cleaning == 2 || $CenterEval->Lab_Cleaning == 3 ||$CenterEval->Lab_Cleaning == 4 ||$CenterEval->Lab_Cleaning == 5)
                                        selected
                                    @endif
                                    @if ($CenterEval->Lab_Cleaning == 2 )
                                        value
                                    @endif
                                    ' title='Fair' data-value='2'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($CenterEval->Lab_Cleaning == 3 ||$CenterEval->Lab_Cleaning == 4 ||$CenterEval->Lab_Cleaning == 5)
                                        selected
                                    @endif
                                    @if ($CenterEval->Lab_Cleaning == 3 )
                                        value
                                    @endif
                                    ' title='Good' data-value='3'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($CenterEval->Lab_Cleaning == 4 ||$CenterEval->Lab_Cleaning == 5)
                                        selected
                                    @endif
                                    @if ($CenterEval->Lab_Cleaning == 4 )
                                        value
                                    @endif
                                    ' title='Excellent' data-value='4'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star
                                    @if ($CenterEval->Lab_Cleaning == 5)
                                        selected
                                    @endif
                                    @if ($CenterEval->Lab_Cleaning == 5 )
                                        value
                                    @endif
                                    ' title='WOW!!!' data-value='5'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                  </ul>
                                </td>
                                <td>
                                    <ul class='stars Lab_Capacity'>
                                      <li class="star
                                      @if ($CenterEval->Lab_Capacity == 1 || $CenterEval->Lab_Capacity == 2 || $CenterEval->Lab_Capacity == 3 ||$CenterEval->Lab_Capacity == 4 ||$CenterEval->Lab_Capacity == 5)
                                          selected
                                      @endif
                                      @if ($CenterEval->Lab_Capacity == 1 )
                                          value
                                      @endif
                                       " title='Poor' data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($CenterEval->Lab_Capacity == 2 || $CenterEval->Lab_Capacity == 3 ||$CenterEval->Lab_Capacity == 4 ||$CenterEval->Lab_Capacity == 5)
                                          selected
                                      @endif
                                      @if ($CenterEval->Lab_Capacity == 2 )
                                          value
                                      @endif
                                      ' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($CenterEval->Lab_Capacity == 3 ||$CenterEval->Lab_Capacity == 4 ||$CenterEval->Lab_Capacity == 5)
                                          selected
                                      @endif
                                      @if ($CenterEval->Lab_Capacity == 3 )
                                          value
                                      @endif
                                      ' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($CenterEval->Lab_Capacity == 4 ||$CenterEval->Lab_Capacity == 5)
                                          selected
                                      @endif
                                      @if ($CenterEval->Lab_Capacity == 4 )
                                          value
                                      @endif
                                      ' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                      <li class='star
                                      @if ($CenterEval->Lab_Capacity == 5)
                                          selected
                                      @endif
                                      @if ($CenterEval->Lab_Capacity == 5 )
                                          value
                                      @endif
                                      ' title='WOW!!!' data-value='5'>
                                        <i class='fa fa-star fa-fw'></i>
                                      </li>
                                    </ul>
                                  </td>
                                  <td>
                                      <ul class='stars Overall_Evaluation'>
                                        <li class="star
                                        @if ($CenterEval->Overall_Evaluation == 1 || $CenterEval->Overall_Evaluation == 2 || $CenterEval->Overall_Evaluation == 3 ||$CenterEval->Overall_Evaluation == 4 ||$CenterEval->Overall_Evaluation == 5)
                                            selected
                                        @endif
                                        @if ($CenterEval->Overall_Evaluation == 1 )
                                            value
                                        @endif
                                         " title='Poor' data-value='1'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($CenterEval->Overall_Evaluation == 2 || $CenterEval->Overall_Evaluation == 3 ||$CenterEval->Overall_Evaluation == 4 ||$CenterEval->Overall_Evaluation == 5)
                                            selected
                                        @endif
                                        @if ($CenterEval->Overall_Evaluation == 2 )
                                            value
                                        @endif
                                        ' title='Fair' data-value='2'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($CenterEval->Overall_Evaluation == 3 ||$CenterEval->Overall_Evaluation == 4 ||$CenterEval->Overall_Evaluation == 5)
                                            selected
                                        @endif
                                        @if ($CenterEval->Overall_Evaluation == 3 )
                                            value
                                        @endif
                                        ' title='Good' data-value='3'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($CenterEval->Overall_Evaluation == 4 ||$CenterEval->Overall_Evaluation == 5)
                                            selected
                                        @endif
                                        @if ($CenterEval->Overall_Evaluation == 4 )
                                            value
                                        @endif
                                        ' title='Excellent' data-value='4'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star
                                        @if ($CenterEval->Overall_Evaluation == 5)
                                            selected
                                        @endif
                                        @if ($CenterEval->Overall_Evaluation == 5 )
                                            value
                                        @endif
                                        ' title='WOW!!!' data-value='5'>
                                          <i class='fa fa-star fa-fw'></i>
                                        </li>
                                      </ul>
                                    </td>
                        
                        <td><?php
                            $totalcenter = (($CenterEval->PCs_Quality + $CenterEval->Projectors_Quality + $CenterEval->Air_Conditioners + $CenterEval->Seats_Quality + $CenterEval->Lab_Cleaning + $CenterEval->Lab_Capacity + $CenterEval->Overall_Evaluation )/35)*100 ;
                          ?>
                            <div
                            class="progress-circle"
                            data-value="0.@if ($totalcenter !== 0){{number_format($totalcenter,0)}}@endif"
                            data-size="50"
                            data-thickness="3"
                            data-animation-start-value="1.0"
                            data-fill="{
                              &quot;color&quot;: &quot;green&quot;
                            }"
                            data-reverse="true">
                            <div class="percent">
                                @if ($totalcenter !== 0)
                                    {{number_format($totalcenter,0)}}
                                    @else
                                    0
                                @endif%
                            </div>
                          </div>
                        </td>
                        <td class="note">
                          <textarea name="" id="" rows="2" class="form-control notes" placeholder="note">{{$CenterEval->Notes}}</textarea>
                        </td>


                    </tr>
                    @php
                        $i++
                    @endphp
@endforeach


                  </tbody>
                </table>
              </div>
            </div>
          </div>
         
     


        </div>

      </div>
    </div>

  </main>

    <!-- note Modal -->
    <div class="modal fade" id="NoteModal" tabindex="-1" role="dialog" aria-labelledby="NoteModal">
        <div class="modal-dialog modal-dialog-centered " role="document">
          <div class="modal-content">
    
            <div class="modal-body">
    
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="ms-auth-container row no-gutters">
                  <div class="col-12 p-5">
                      <form action="">
                        
                      <label for="note">Note</label>
                      <div class="input-group">
                         <textarea class="form-control" rows="5" placeholder="Write your note"></textarea>
                      </div>
                      <div class="input-group text-center">
                          <input type="submit" value="Add" class="btn btn-primary m-auto">                       
                      </div>
                      </form>
                  </div>
                </div>
              </div>
    
            </div>
          </div>
        </div>
    
        @endsection