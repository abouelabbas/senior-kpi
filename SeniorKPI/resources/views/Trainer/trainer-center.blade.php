@extends('Layouts/trainerkpi',['TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds])
@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/Trainer"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Trainer & Center</li>
            </ol>
          </nav>
          <div class="row">

              <div class="col-md-12">
      
      
      
              
                <div class="ms-panel">
                  <div class="ms-panel-header d-flex py-2 align-items-center justify-content-between">
                    <h6>Center Evaluation</h6>
                    <div>
                        <input type="reset" form="fform" class="btn btn-warning" value="undo">
                        <input type="submit" id="saveCenter" form="fform" class="btn btn-success" value="save">
                    </div>
                  </div>
                  <div class="ms-panel-body">
                    <div class="mb-3 ">
                    </div>
                    <div class="table-responsive">
                      <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                          <th>#</th>
                          <th>Topic</th>
                          <th> PCs Quality  </th>
                          <th> Projectors Quality </th>
                          <th>Seats Quality</th>
                          <th> Air Conditioners </th>
                          <th>Lab cleanings</th>
                          <th>Lab Capacity</th>
                          <th>Overall</th>
                          <th>Total</th>
                          <th>note </th>
                        </thead>
                        <tbody>
                          @php
                              $i = 1
                          @endphp
                          @foreach ($RoundContent as $Content)
                          <tr>
                            <td>{{$i}}</td>
                          <td class="content" data-center="{{$Content->CenterEvaluationId}}" data-content="{{$Content->RoundContentId}}">{{$Content->ContentNameEn}}</td>
      
                            <form action="">
                              <td>
                              <ul class='stars' id="pc" data-id="{{session('Id')}}">
                                @if ($Content->PCs_Quality == 1)
                                <li class='star selected value' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @elseif($Content->PCs_Quality == 2)
                                <li class='star selected' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected value' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @elseif($Content->PCs_Quality == 3)
                                <li class='star selected' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected value' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @elseif($Content->PCs_Quality == 4)
                                <li class='star selected' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected value' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @elseif($Content->PCs_Quality == 5)
                                <li class='star selected' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected value' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @else
                                <li class='star' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @endif
                                  
                                </ul>
                              </td>
                              <td>
                                <ul class='stars' id="proj">
                                  @if ($Content->Projectors_Quality == 1)
                                  <li class='star selected value' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Projectors_Quality == 2)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Projectors_Quality == 3)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Projectors_Quality == 4)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Projectors_Quality == 5)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @else
                                  <li class='star' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @endif
                                </ul>
                              </td>
                              <td>
                                <ul class='stars' id="air">
                                  @if ($Content->Seats_Quality == 1)
                                <li class='star selected value' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @elseif($Content->Seats_Quality == 2)
                                <li class='star selected' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected value' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @elseif($Content->Seats_Quality == 3)
                                <li class='star selected' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected value' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @elseif($Content->Seats_Quality == 4)
                                <li class='star selected' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected value' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @elseif($Content->Seats_Quality == 5)
                                <li class='star selected' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected value' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @else
                                <li class='star' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @endif
                                  
                                </ul>
                              </td>
                              <td>
                                <ul class='stars' id="seats">
                                  @if ($Content->Air_Conditioners == 1)
                                <li class='star selected value' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @elseif($Content->Air_Conditioners == 2)
                                <li class='star selected' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected value' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @elseif($Content->Air_Conditioners == 3)
                                <li class='star selected' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected value' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @elseif($Content->Air_Conditioners == 4)
                                <li class='star selected' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected value' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @elseif($Content->Air_Conditioners == 5)
                                <li class='star selected' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected value' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @else
                                <li class='star' title='Poor' data-value='1'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Very good' data-value='4'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='5'>
                                  <i class='fa fa-star fa-fw'></i>
                                </li>
                                @endif
                                  
                                </ul>
                              </td>
                              <td>
                                <ul class='stars' id="clean">
                                  @if ($Content->Lab_Cleaning == 1)
                                  <li class='star selected value' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Lab_Cleaning == 2)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Lab_Cleaning == 3)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Lab_Cleaning == 4)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Lab_Cleaning == 5)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @else
                                  <li class='star' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @endif
                                </ul>
                              </td>
                              </td>
                              <td>
                                <ul class='stars' id="capacity">
                                  @if ($Content->Lab_Capacity == 1)
                                  <li class='star selected value' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Lab_Capacity == 2)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Lab_Capacity == 3)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Lab_Capacity == 4)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Lab_Capacity == 5)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @else
                                  <li class='star' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @endif
                                </ul>
                              </td>
                              <td>
                                <ul class='stars' id="overall">
                                  @if ($Content->Overall_Evaluation == 1)
                                  <li class='star selected value' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Overall_Evaluation == 2)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Poor' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Poor' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Poor' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Poor' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Overall_Evaluation == 3)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Overall_Evaluation == 4)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @elseif($Content->Overall_Evaluation == 5)
                                  <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star selected value' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @else
                                  <li class='star' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Very good' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  @endif
                                </ul>
                              </td>
                              <td>
                                  <div
                                  class="progress-circle"
                                  data-value="{{(($Content->PCs_Quality + $Content->Projectors_Quality + $Content->Air_Conditioners + $Content->Seats_Quality + $Content->Lab_Cleaning + $Content->Lab_Capacity + $Content->Overall_Evaluation)/35)}}"
                                  data-size="50"
                                  data-thickness="3"
                                  data-animation-start-value="1.0"
                                  data-fill="{
                                    &quot;color&quot;: &quot;green&quot;
                                  }"
                                  data-reverse="true">
                                  <div class="percent">
                                    {{round((($Content->PCs_Quality + $Content->Projectors_Quality + $Content->Air_Conditioners + $Content->Seats_Quality + $Content->Lab_Cleaning + $Content->Lab_Capacity + $Content->Overall_Evaluation)/35)*100)}}%
                                  </div>
                                </div>
                              </td>
                              <td class="note">
                              <textarea name="" id="notes" rows="2" class="form-control" placeholder="note">{{$Content->Notes}}</textarea>
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
               
              
      
      
              </div>
      
            </div>
 @endsection