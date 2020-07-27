@extends('Layouts.adminkpi')

@section('content')



        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

              <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>

              <li class="breadcrumb-item active" aria-current="page">Senior Steps Eval</li>

            </ol>

          </nav>

          <div class="row">



              <div class="col-md-12">

      

      

      

              

                <div class="ms-panel">

                  <div class="ms-panel-header d-flex py-2 justify-content-between">

                    <h6>Lab Evaluation</h6>

                  <span>{{$CenterEvalCount}} Surveys has been submitted.</span>

                  <a href="/Admin/CenterEvaluation/Details/{{$Round->RoundId}}" class="btn btn-warning">  Evl Details </a>

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

                          <th>Air Conditioners</th>

                          <th>Seats Quality </th>

                          <th>Lab cleaning</th>

                          <th>Lab Capacity</th>

                          <th>Overall Evaluation</th>

                          {{-- <th>note </th> --}}

                          <th>Total</th>

                        </thead>

                        <tbody>

                          @php

                              $i = 1

                          @endphp

      @if ($CenterEvalCount != 0)

      @foreach ($CenterEvaluations as $CenterEvaluation)

      <tr>

      <td>{{$i}}</td>

          <td>{{$CenterEvaluation->ContentNameEn}}</td>



          <td>

              @if (($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) == 1)

              

              <i class="fa fa-star" aria-hidden="true"></i>

                  

              @elseif (($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) > 1 && ($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) < 2)

              

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fas fa-star-half"></i>

              @elseif (($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) == 2)

              

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              @elseif (($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) > 2 && ($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) < 3)

              

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fas fa-star-half"></i>

              @elseif (($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) == 3)

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              @elseif (($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) > 3 && ($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) < 4)

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fas fa-star-half"></i>

              @elseif (($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) == 4)

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              @elseif (($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) > 4 && ($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) < 5)

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fas fa-star-half"></i>

              @elseif (($CenterEvaluation->PCs_Quality/$CenterEvaluation->EvalCount) == 5)

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              <i class="fa fa-star" aria-hidden="true"></i>

              @endif

               </td>

               <td>

                  @if (($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) == 1)

                  

                  <i class="fa fa-star" aria-hidden="true"></i>

                      

                  @elseif (($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) > 1 && ($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) < 2)

                  

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fas fa-star-half"></i>

                  @elseif (($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) == 2)

                  

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  @elseif (($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) > 2 && ($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) < 3)

                  

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fas fa-star-half"></i>

                  @elseif (($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) == 3)

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  @elseif (($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) > 3 && ($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) < 4)

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fas fa-star-half"></i>

                  @elseif (($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) == 4)

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  @elseif (($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) > 4 && ($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) < 5)

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fas fa-star-half"></i>

                  @elseif (($CenterEvaluation->Projectors_Quality/$CenterEvaluation->EvalCount) == 5)

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  @endif

                   </td>

                   <td>

                      @if (($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) == 1)

                      

                      <i class="fa fa-star" aria-hidden="true"></i>

                          

                      @elseif (($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) > 1 && ($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) < 2)

                      

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fas fa-star-half"></i>

                      @elseif (($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) == 2)

                      

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      @elseif (($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) > 2 && ($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) < 3)

                      

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fas fa-star-half"></i>

                      @elseif (($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) == 3)

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      @elseif (($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) > 3 && ($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) < 4)

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fas fa-star-half"></i>

                      @elseif (($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) == 4)

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      @elseif (($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) > 4 && ($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) < 5)

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fas fa-star-half"></i>

                      @elseif (($CenterEvaluation->Air_Conditioners/$CenterEvaluation->EvalCount) == 5)

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      @endif

                       </td>

                       <td>

                          @if (($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) == 1)

                          

                          <i class="fa fa-star" aria-hidden="true"></i>

                              

                          @elseif (($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) > 1 && ($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) < 2)

                          

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fas fa-star-half"></i>

                          @elseif (($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) == 2)

                          

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          @elseif (($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) > 2 && ($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) < 3)

                          

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fas fa-star-half"></i>

                          @elseif (($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) == 3)

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          @elseif (($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) > 3 && ($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) < 4)

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fas fa-star-half"></i>

                          @elseif (($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) == 4)

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          @elseif (($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) > 4 && ($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) < 5)

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fas fa-star-half"></i>

                          @elseif (($CenterEvaluation->Seats_Quality/$CenterEvaluation->EvalCount) == 5)

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          <i class="fa fa-star" aria-hidden="true"></i>

                          @endif

                           </td>

                           <td>

                              @if (($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) == 1)

                              

                              <i class="fa fa-star" aria-hidden="true"></i>

                                  

                              @elseif (($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) > 1 && ($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) < 2)

                              

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fas fa-star-half"></i>

                              @elseif (($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) == 2)

                              

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              @elseif (($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) > 2 && ($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) < 3)

                              

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fas fa-star-half"></i>

                              @elseif (($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) == 3)

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              @elseif (($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) > 3 && ($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) < 4)

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fas fa-star-half"></i>

                              @elseif (($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) == 4)

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              @elseif (($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) > 4 && ($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) < 5)

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fas fa-star-half"></i>

                              @elseif (($CenterEvaluation->Lab_Cleaning/$CenterEvaluation->EvalCount) == 5)

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              <i class="fa fa-star" aria-hidden="true"></i>

                              @endif

                               </td>

            </td>

            <td>

                @if (($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) == 1)

                

                <i class="fa fa-star" aria-hidden="true"></i>

                    

                @elseif (($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) > 1 && ($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) < 2)

                

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fas fa-star-half"></i>

                @elseif (($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) == 2)

                

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                @elseif (($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) > 2 && ($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) < 3)

                

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fas fa-star-half"></i>

                @elseif (($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) == 3)

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                @elseif (($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) > 3 && ($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) < 4)

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fas fa-star-half"></i>

                @elseif (($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) == 4)

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                @elseif (($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) > 4 && ($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) < 5)

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fas fa-star-half"></i>

                @elseif (($CenterEvaluation->Lab_Capacity/$CenterEvaluation->EvalCount) == 5)

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                @endif

                </td>

                <td>

                    @if (($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) == 1)

                    

                    <i class="fa fa-star" aria-hidden="true"></i>

                        

                    @elseif (($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) > 1 && ($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) < 2)

                    

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fas fa-star-half"></i>

                    @elseif (($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) == 2)

                    

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    @elseif (($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) > 2 && ($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) < 3)

                    

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fas fa-star-half"></i>

                    @elseif (($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) == 3)

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    @elseif (($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) > 3 && ($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) < 4)

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fas fa-star-half"></i>

                    @elseif (($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) == 4)

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    @elseif (($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) > 4 && ($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) < 5)

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fas fa-star-half"></i>

                    @elseif (($CenterEvaluation->Overall_Evaluation/$CenterEvaluation->EvalCount) == 5)

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    @endif

                    </td>

            {{-- <td class="note">

              Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem enim consequatur earum totam vel quo, iure ad voluptatibus natus? Illum, neque inventore quis voluptate repellendus beatae aliquam nisi facere odit!

            </td> --}}

            <td>

                <div

                class="progress-circle"

                data-value="{{number_format((($CenterEvaluation->PCs_Quality+$CenterEvaluation->Projectors_Quality+$CenterEvaluation->Air_Conditioners+$CenterEvaluation->Seats_Quality+$CenterEvaluation->Lab_Cleaning+$CenterEvaluation->Lab_Capacity+$CenterEvaluation->Overall_Evaluation)/(35*$CenterEvaluation->EvalCount)),1)}}"

                data-size="50"

                data-thickness="3"

                data-animation-start-value="1.0"

                data-fill="{

                  &quot;color&quot;: &quot;green&quot;

                }"

                data-reverse="true">

                <div class="percent">

                    {{number_format((($CenterEvaluation->PCs_Quality+$CenterEvaluation->Projectors_Quality+$CenterEvaluation->Air_Conditioners+$CenterEvaluation->Seats_Quality+$CenterEvaluation->Lab_Cleaning+$CenterEvaluation->Lab_Capacity+$CenterEvaluation->Overall_Evaluation)/(35*$CenterEvaluation->EvalCount))*100)}}%

                </div>

              </div>

            </td>



        </tr>

        @php

            $i++

        @endphp

      @endforeach

      @endif

                          

      

                        </tbody>

                      </table>

                    </div>

                  </div>

                </div>

                <div class="ms-panel">

                    <div class="ms-panel-header d-flex py-2 justify-content-between">

                      <h6>Senior Steps Evaluation</h6>

                    <span>{{$CenterEvalCount}} Surveys has been submitted.</span>

                    <a href="/Admin/SeniorEvaluation/Details/{{$Round->RoundId}}" class="btn btn-warning">  Evl Details </a>

                    </div>

                    <div class="ms-panel-body">

                      <div class="mb-3 ">

                      </div>

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

                            {{-- <th>note </th> --}}

                            <th>Total</th>

                          </thead>

                          <tbody>

                            @php

                                $i = 1

                            @endphp

        @if ($SeniorEvalCount != 0)

        @foreach ($SeniorEvaluations as $SeniorEvaluation)

        <tr>

        <td>{{$i}}</td>

            <td>{{$SeniorEvaluation->ContentNameEn}}</td>

  

            <td>

                @if (($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) == 1)

                

                <i class="fa fa-star" aria-hidden="true"></i>

                    

                @elseif (($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) > 1 && ($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) < 2)

                

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fas fa-star-half"></i>

                @elseif (($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) == 2)

                

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                @elseif (($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) > 2 && ($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) < 3)

                

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fas fa-star-half"></i>

                @elseif (($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) == 3)

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                @elseif (($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) > 3 && ($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) < 4)

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fas fa-star-half"></i>

                @elseif (($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) == 4)

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                @elseif (($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) > 4 && ($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) < 5)

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fas fa-star-half"></i>

                @elseif (($SeniorEvaluation->Students_Deal/$SeniorEvaluation->EvalCount) == 5)

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                <i class="fa fa-star" aria-hidden="true"></i>

                @endif

                 </td>

                 <td>

                    @if (($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) == 1)

                    

                    <i class="fa fa-star" aria-hidden="true"></i>

                        

                    @elseif (($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) > 1 && ($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) < 2)

                    

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fas fa-star-half"></i>

                    @elseif (($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) == 2)

                    

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    @elseif (($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) > 2 && ($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) < 3)

                    

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fas fa-star-half"></i>

                    @elseif (($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) == 3)

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    @elseif (($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) > 3 && ($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) < 4)

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fas fa-star-half"></i>

                    @elseif (($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) == 4)

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    @elseif (($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) > 4 && ($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) < 5)

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fas fa-star-half"></i>

                    @elseif (($SeniorEvaluation->Solving_Problems/$SeniorEvaluation->EvalCount) == 5)

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    <i class="fa fa-star" aria-hidden="true"></i>

                    @endif

                     </td>

                     <td>

                        @if (($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) == 1)

                        

                        <i class="fa fa-star" aria-hidden="true"></i>

                            

                        @elseif (($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) > 1 && ($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) < 2)

                        

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fas fa-star-half"></i>

                        @elseif (($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) == 2)

                        

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        @elseif (($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) > 2 && ($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) < 3)

                        

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fas fa-star-half"></i>

                        @elseif (($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) == 3)

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        @elseif (($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) > 3 && ($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) < 4)

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fas fa-star-half"></i>

                        @elseif (($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) == 4)

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        @elseif (($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) > 4 && ($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) < 5)

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fas fa-star-half"></i>

                        @elseif (($SeniorEvaluation->Buffet_Quality/$SeniorEvaluation->EvalCount) == 5)

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        <i class="fa fa-star" aria-hidden="true"></i>

                        @endif

                         </td>

                         <td>

                            @if (($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) == 1)

                            

                            <i class="fa fa-star" aria-hidden="true"></i>

                                

                            @elseif (($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) > 1 && ($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) < 2)

                            

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fas fa-star-half"></i>

                            @elseif (($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) == 2)

                            

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            @elseif (($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) > 2 && ($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) < 3)

                            

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fas fa-star-half"></i>

                            @elseif (($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) == 3)

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            @elseif (($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) > 3 && ($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) < 4)

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fas fa-star-half"></i>

                            @elseif (($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) == 4)

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            @elseif (($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) > 4 && ($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) < 5)

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fas fa-star-half"></i>

                            @elseif (($SeniorEvaluation->General_Cleanliness/$SeniorEvaluation->EvalCount) == 5)

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            @endif

                             </td>

                         <td>

                            @if (($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) == 1)

                            

                            <i class="fa fa-star" aria-hidden="true"></i>

                                

                            @elseif (($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) > 1 && ($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) < 2)

                            

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fas fa-star-half"></i>

                            @elseif (($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) == 2)

                            

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            @elseif (($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) > 2 && ($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) < 3)

                            

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fas fa-star-half"></i>

                            @elseif (($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) == 3)

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            @elseif (($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) > 3 && ($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) < 4)

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fas fa-star-half"></i>

                            @elseif (($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) == 4)

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            @elseif (($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) > 4 && ($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) < 5)

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fas fa-star-half"></i>

                            @elseif (($SeniorEvaluation->Recepitionist_Quality/$SeniorEvaluation->EvalCount) == 5)

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            <i class="fa fa-star" aria-hidden="true"></i>

                            @endif

                             </td>

                             <td>

                                @if (($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) == 1)

                                

                                <i class="fa fa-star" aria-hidden="true"></i>

                                    

                                @elseif (($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) > 1 && ($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) < 2)

                                

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fas fa-star-half"></i>

                                @elseif (($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) == 2)

                                

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                @elseif (($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) > 2 && ($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) < 3)

                                

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fas fa-star-half"></i>

                                @elseif (($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) == 3)

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                @elseif (($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) > 3 && ($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) < 4)

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fas fa-star-half"></i>

                                @elseif (($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) == 4)

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                @elseif (($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) > 4 && ($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) < 5)

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fas fa-star-half"></i>

                                @elseif (($SeniorEvaluation->Answering_Calls_Quality/$SeniorEvaluation->EvalCount) == 5)

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                <i class="fa fa-star" aria-hidden="true"></i>

                                @endif

                                 </td>

              </td>

              <td>

                  @if (($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) == 1)

                  

                  <i class="fa fa-star" aria-hidden="true"></i>

                      

                  @elseif (($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) > 1 && ($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) < 2)

                  

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fas fa-star-half"></i>

                  @elseif (($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) == 2)

                  

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  @elseif (($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) > 2 && ($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) < 3)

                  

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fas fa-star-half"></i>

                  @elseif (($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) == 3)

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  @elseif (($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) > 3 && ($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) < 4)

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fas fa-star-half"></i>

                  @elseif (($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) == 4)

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  @elseif (($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) > 4 && ($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) < 5)

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fas fa-star-half"></i>

                  @elseif (($SeniorEvaluation->Social_Media_Quality/$SeniorEvaluation->EvalCount) == 5)

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  <i class="fa fa-star" aria-hidden="true"></i>

                  @endif

                  </td>

                  <td>

                      @if (($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) == 1)

                      

                      <i class="fa fa-star" aria-hidden="true"></i>

                          

                      @elseif (($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) > 1 && ($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) < 2)

                      

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fas fa-star-half"></i>

                      @elseif (($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) == 2)

                      

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      @elseif (($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) > 2 && ($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) < 3)

                      

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fas fa-star-half"></i>

                      @elseif (($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) == 3)

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      @elseif (($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) > 3 && ($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) < 4)

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fas fa-star-half"></i>

                      @elseif (($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) == 4)

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      @elseif (($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) > 4 && ($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) < 5)

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fas fa-star-half"></i>

                      @elseif (($SeniorEvaluation->Overall_Evaluation/$SeniorEvaluation->EvalCount) == 5)

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      <i class="fa fa-star" aria-hidden="true"></i>

                      @endif

                      </td>

              {{-- <td class="note">

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem enim consequatur earum totam vel quo, iure ad voluptatibus natus? Illum, neque inventore quis voluptate repellendus beatae aliquam nisi facere odit!

              </td> --}}

              <td>

                  <div

                  class="progress-circle"

                  data-value="0.{{number_format((($SeniorEvaluation->Students_Deal+$SeniorEvaluation->Solving_Problems+$SeniorEvaluation->Buffet_Quality+$SeniorEvaluation->General_Cleanliness+$SeniorEvaluation->Recepitionist_Quality+$SeniorEvaluation->Answering_Calls_Quality+$SeniorEvaluation->Social_Media_Quality+$SeniorEvaluation->Overall_Evaluation)/40)*100)}}"

                  data-size="50"

                  data-thickness="3"

                  data-animation-start-value="1.0"

                  data-fill="{

                    &quot;color&quot;: &quot;green&quot;

                  }"

                  data-reverse="true">

                  <div class="percent">

                      {{number_format((($SeniorEvaluation->Students_Deal+$SeniorEvaluation->Solving_Problems+$SeniorEvaluation->Buffet_Quality+$SeniorEvaluation->General_Cleanliness+$SeniorEvaluation->Recepitionist_Quality+$SeniorEvaluation->Answering_Calls_Quality+$SeniorEvaluation->Social_Media_Quality+$SeniorEvaluation->Overall_Evaluation)/40)*100)}}%

                  </div>

                </div>

              </td>

  

          </tr>

          @php

              $i++

          @endphp

        @endforeach

        @endif

                            

        

                          </tbody>

                        </table>

                      </div>

                    </div>

                  </div>

               

                <!-- <div class="ms-panel">

                  <div class="ms-panel-header">

                    <h6>Center Evaluation</h6>

                  </div>

                  <div class="ms-panel-body">

                    <div class="table-responsive">

                      <table id="centerEval" class="dattable table table-striped thead-dark  w-100">

                        <thead>

                          <th>item</th>

                          <th>Evaluation </th>

                          <th>note </th>

                          <th> </th>

                        </thead>

                        <tbody>

      

                          <tr>

                            <td>Chairs</td>

      

                            <form action="">

                              <td>

                                <ul class='stars'>

                                  <li class='star' title='Poor' data-value='1'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='Fair' data-value='2'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='Good' data-value='3'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='Excellent' data-value='4'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='WOW!!!' data-value='5'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                </ul>

                              </td>

                              <td class="note">

                                <textarea name="" id="" rows="2" class="form-control" placeholder="note"></textarea>

                              </td>

                              <td>

                                <input type="submit" class="btn btn-success" value="save">

                              </td>

                            </form>

      

                          </tr>

                          <tr>

                            <td>Projectors</td>

      

                            <form action="">

                              <td>

                                <ul class='stars'>

                                  <li class='star' title='Poor' data-value='1'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='Fair' data-value='2'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='Good' data-value='3'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='Excellent' data-value='4'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='WOW!!!' data-value='5'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                </ul>

                              </td>

                              <td class="note">

                                <textarea name="" id="" rows="2" class="form-control" placeholder="note"></textarea>

                              </td>

                              <td>

                                <input type="submit" class="btn btn-success" value="save">

                              </td>

                            </form>

      

                          </tr>

                          <tr>

                            <td>Cleaning</td>

      

                            <form action="">

                              <td>

                                <ul class='stars'>

                                  <li class='star' title='Poor' data-value='1'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='Fair' data-value='2'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='Good' data-value='3'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='Excellent' data-value='4'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='WOW!!!' data-value='5'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                </ul>

                              </td>

                              <td class="note">

                                <textarea name="" id="" rows="2" class="form-control" placeholder="note"></textarea>

                              </td>

                              <td>

                                <input type="submit" class="btn btn-success" value="save">

                              </td>

                            </form>

                          </tr>

                          <tr>

                            <td>Attitude</td>

      

                            <form action="">

                              <td>

                                <ul class='stars'>

                                  <li class='star' title='Poor' data-value='1'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='Fair' data-value='2'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='Good' data-value='3'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='Excellent' data-value='4'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                  <li class='star' title='WOW!!!' data-value='5'>

                                    <i class='fa fa-star fa-fw'></i>

                                  </li>

                                </ul>

                              </td>

                              <td class="note">

                                <textarea name="" id="" rows="2" class="form-control" placeholder="note"></textarea>

                              </td>

                              <td>

                                <input type="submit" class="btn btn-success" value="save">

                              </td>

                            </form>

      

                          </tr>

      

      

                        </tbody>

                      </table>

                    </div>

                  </div>

                </div>

                <div class="row">

                  <div class="col-md-6">

                    <div class="ms-panel">

                      <div class="ms-panel-header">

                        <h6>Trainer KPI</h6>

                      </div>

                      <div class="ms-panel-body">

                        <div class="row no-gutters">

                          <div class="col-md-6">

                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a

                              sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum

                              labore doloribus tempora ipsam laboriosam?</p>

                          </div>

                          <div class="col-md-6">

                            <div class="progress-rounded progress-round-tiny">

                              <div class="progress-value">72%</div>

                              <svg>

                                <circle class="progress-cicle bg-success" cx="65" cy="65" r="57" stroke-width="4" fill="none"

                                  aria-valuenow="72" aria-orientation="vertical" aria-valuemin="0" aria-valuemax="100"

                                  role="slider">

                                </circle>

                              </svg>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="ms-panel">

                      <div class="ms-panel-header">

                        <h6>Center KPI</h6>

                      </div>

                      <div class="ms-panel-body">

                        <div class="row no-gutters">

                          <div class="col-md-6">

                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a

                              sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum

                              labore doloribus tempora ipsam laboriosam?</p>

                          </div>

                          <div class="col-md-6">

                            <div class="progress-rounded progress-round-tiny">

                              <div class="progress-value">72%</div>

                              <svg>

                                <circle class="progress-cicle bg-success" cx="65" cy="65" r="57" stroke-width="4" fill="none"

                                  aria-valuenow="72" aria-orientation="vertical" aria-valuemin="0" aria-valuemax="100"

                                  role="slider">

                                </circle>

                              </svg>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div> -->

      

      

              </div>

      

            </div>

      

@endsection