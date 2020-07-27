@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Attendence & Evaluations</li>
            </ol>
          </nav>
      
      <div class="row">
     
        <div class="col-md-12">

            <div class="ms-panel">
                <div class="ms-panel-header">
                <h2>{{$Course->CourseNameEn}} - GR{{$Round->GroupNo}}</h2>
                </div>
            </div>


            <div class="ms-panel">
                
                <div class="ms-panel-header d-flex justify-content-between">
                    
                  <h6>Course Evaluation Per Track</h6>
                <span>{{$TrainerEvalCount}} surveys have been submitted</span>
                <a href="/Admin/TrainerEvaluation/Details/{{$RoundId}}" class="btn btn-warning"> Tracks Evl Details </a>
                </div>
                <div class="ms-panel-body">
                  <div class="table-responsive">
                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                <thead>
                                  <th>#</th>
                                  <th>Topic</th>
                                  <th>Knowledge Experience</th>
                                  <th>Topics Qualified</th>
                                  <th>Topics Preperation</th>
                                  <th>Trainer Attiude</th>
                                  <th>Time Respect </th>
                                  <th>Students Interaction</th>
                                  <th>Overall Evaluation</th>
                                  <th>Total</th>
                                  {{-- <th>note </th> --}}
                                </thead>
                                <tbody>
                                  @php
                                      $i = 1
                                  @endphp
              @if ($TrainerEvalCount != 0)
              @foreach ($TrainerEvaluations as $TrainerEval)
              <tr>
              <td>{{$i}}</td>
              <td>{{$TrainerEval->ContentNameEn}}</td>
          
                <td>
                    @if (($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) == 1)
                    
                    <i class="fa fa-star" aria-hidden="true"></i>
                        
                    @elseif (($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) > 1 && ($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) < 2)
                    
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star-half"></i>
                    @elseif (($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) == 2)
                    
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    @elseif (($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) > 2 && ($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) < 3)
                    
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star-half"></i>
                    @elseif (($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) == 3)
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    @elseif (($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) > 3 && ($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) < 4)
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star-half"></i>
                    @elseif (($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) == 4)
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    @elseif (($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) > 4 && ($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) < 5)
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fas fa-star-half"></i>
                    @elseif (($TrainerEval->Knowledge_Experience/$TrainerEval->EvalCount) == 5)
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    @endif
                    </td>
                   <td>
                      @if (($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) == 1)
                      
                      <i class="fa fa-star" aria-hidden="true"></i>
                          
                      @elseif (($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) > 1 && ($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) < 2)
                      
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fas fa-star-half"></i>
                      @elseif (($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) == 2)
                      
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      @elseif (($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) > 2 && ($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) < 3)
                      
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fas fa-star-half"></i>
                      @elseif (($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) == 3)
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      @elseif (($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) > 3 && ($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) < 4)
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fas fa-star-half"></i>
                      @elseif (($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) == 4)
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      @elseif (($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) > 4 && ($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) < 5)
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fas fa-star-half"></i>
                      @elseif (($TrainerEval->Training_Qualified/$TrainerEval->EvalCount) == 5)
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      @endif
                       </td>
                       <td>
                          @if (($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) == 1)
                          
                          <i class="fa fa-star" aria-hidden="true"></i>
                              
                          @elseif (($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) > 1 && ($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) < 2)
                          
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fas fa-star-half"></i>
                          @elseif (($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) == 2)
                          
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          @elseif (($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) > 2 && ($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) < 3)
                          
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fas fa-star-half"></i>
                          @elseif (($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) == 3)
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          @elseif (($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) > 3 && ($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) < 4)
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fas fa-star-half"></i>
                          @elseif (($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) == 4)
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          @elseif (($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) > 4 && ($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) < 5)
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fas fa-star-half"></i>
                          @elseif (($TrainerEval->Topics_Preparation/$TrainerEval->EvalCount) == 5)
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          @endif
                           </td>
                           <td>
                              @if (($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) == 1)
                              
                              <i class="fa fa-star" aria-hidden="true"></i>
                                  
                              @elseif (($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) > 1 && ($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) < 2)
                              
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fas fa-star-half"></i>
                              @elseif (($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) == 2)
                              
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              @elseif (($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) > 2 && ($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) < 3)
                              
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fas fa-star-half"></i>
                              @elseif (($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) == 3)
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              @elseif (($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) > 3 && ($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) < 4)
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fas fa-star-half"></i>
                              @elseif (($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) == 4)
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              @elseif (($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) > 4 && ($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) < 5)
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fas fa-star-half"></i>
                              @elseif (($TrainerEval->Trainer_Attitude/$TrainerEval->EvalCount) == 5)
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              @endif
                               </td>
                               <td>
                                  @if (($TrainerEval->Time_Respect/$TrainerEval->EvalCount) == 1)
                                  
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                      
                                  @elseif (($TrainerEval->Time_Respect/$TrainerEval->EvalCount) > 1 && ($TrainerEval->Time_Respect/$TrainerEval->EvalCount) < 2)
                                  
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fas fa-star-half"></i>
                                  @elseif (($TrainerEval->Time_Respect/$TrainerEval->EvalCount) == 2)
                                  
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  @elseif (($TrainerEval->Time_Respect/$TrainerEval->EvalCount) > 2 && ($TrainerEval->Time_Respect/$TrainerEval->EvalCount) < 3)
                                  
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fas fa-star-half"></i>
                                  @elseif (($TrainerEval->Time_Respect/$TrainerEval->EvalCount) == 3)
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  @elseif (($TrainerEval->Time_Respect/$TrainerEval->EvalCount) > 3 && ($TrainerEval->Time_Respect/$TrainerEval->EvalCount) < 4)
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fas fa-star-half"></i>
                                  @elseif (($TrainerEval->Time_Respect/$TrainerEval->EvalCount) == 4)
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  @elseif (($TrainerEval->Time_Respect/$TrainerEval->EvalCount) > 4 && ($TrainerEval->Time_Respect/$TrainerEval->EvalCount) < 5)
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fas fa-star-half"></i>
                                  @elseif (($TrainerEval->Time_Respect/$TrainerEval->EvalCount) == 5)
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  @endif
                                   </td>
                                   <td>
                                      @if (($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) == 1)
                                      
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                          
                                      @elseif (($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) > 1 && ($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) < 2)
                                      
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fas fa-star-half"></i>
                                      @elseif (($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) == 2)
                                      
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      @elseif (($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) > 2 && ($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) < 3)
                                      
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fas fa-star-half"></i>
                                      @elseif (($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) == 3)
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      @elseif (($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) > 3 && ($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) < 4)
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fas fa-star-half"></i>
                                      @elseif (($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) == 4)
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      @elseif (($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) > 4 && ($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) < 5)
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fas fa-star-half"></i>
                                      @elseif (($TrainerEval->Student_Interaction/$TrainerEval->EvalCount) == 5)
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      @endif
                                       </td>

                                       <td>
                                          @if (($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) == 1)
                                          
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                              
                                          @elseif (($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) > 1 && ($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) < 2)
                                          
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fas fa-star-half"></i>
                                          @elseif (($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) == 2)
                                          
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          @elseif (($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) > 2 && ($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) < 3)
                                          
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fas fa-star-half"></i>
                                          @elseif (($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) == 3)
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          @elseif (($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) > 3 && ($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) < 4)
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fas fa-star-half"></i>
                                          @elseif (($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) == 4)
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          @elseif (($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) > 4 && ($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) < 5)
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fas fa-star-half"></i>
                                          @elseif (($TrainerEval->Overall_Evaluation/$TrainerEval->EvalCount) == 5)
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          @endif
                                           </td>
                                 
                                  
                                  <td>
                                    <?php 
                                      $total1 = ((($TrainerEval->Knowledge_Experience + $TrainerEval->Training_Qualified + $TrainerEval->Topics_Preparation + $TrainerEval->Trainer_Attitude + $TrainerEval->Time_Respect + $TrainerEval->Student_Interaction + $TrainerEval->Overall_Evaluation)/$TrainerEval->EvalCount)/35)*100;
                                      ?>
                                      <div
                                      class="progress-circle"
                                      data-value="0.{{number_format($total1,0)}}"
                                      data-size="50"
                                      data-thickness="3"
                                      data-animation-start-value="1.0"
                                      data-fill="{
                                        &quot;color&quot;: &quot;green&quot;
                                      }"
                                      data-reverse="true">
                                      <div class="percent">
                                          {{number_format($total1,0)}}%
                                      </div>
                                    </div>
                                  </td>
                                  {{-- <td class="note">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus fugit nos
                                  </td> --}}
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
                    <div class="ms-panel-header d-flex justify-content-between">
                      <h6>ُCourse Evaluation</h6>
                <span>{{count($RoundEvaluations)}} surveys have been submitted</span>

                    <a href="/Admin/CourseEvaluation/{{$RoundId}}" class="btn btn-warning"> Course Evl Details </a>

                    </div>
                    <div class="ms-panel-body">
                      <div class="mb-3 ">
                      </div>
                      <div class="table-responsive">
                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                          <thead>
                            <th>#</th>
                            <th>Topic</th>
                            <th> Course Wealthy </th>
                            <th> Enough Hours </th>
                            <th>Enough Practice</th>
                            <th>Materials Evaluation</th>
                            <th>Suitable Price</th>
                            <th>Overall Evaluation</th>
                            <th>Total</th>
                          </thead>
                          <tbody>
                            @php
                                $i = 1
                            @endphp
                            @foreach ($RoundEvaluations as $RoundEval)
                                <tr>
                                <td>{{$i}}</td>
                                <td>{{$RoundEval->ContentNameEn}}</td>
        
                              <td>
                                  @if (($RoundEval->Course_Wealthy/$RoundEval->EvalCount) == 1)
                                  
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                      
                                  @elseif (($RoundEval->Course_Wealthy/$RoundEval->EvalCount) > 1 && ($RoundEval->Course_Wealthy/$RoundEval->EvalCount) < 2)
                                  
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fas fa-star-half"></i>
                                  @elseif (($RoundEval->Course_Wealthy/$RoundEval->EvalCount) == 2)
                                  
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  @elseif (($RoundEval->Course_Wealthy/$RoundEval->EvalCount) > 2 && ($RoundEval->Course_Wealthy/$RoundEval->EvalCount) < 3)
                                  
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fas fa-star-half"></i>
                                  @elseif (($RoundEval->Course_Wealthy/$RoundEval->EvalCount) == 3)
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  @elseif (($RoundEval->Course_Wealthy/$RoundEval->EvalCount) > 3 && ($RoundEval->Course_Wealthy/$RoundEval->EvalCount) < 4)
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fas fa-star-half"></i>
                                  @elseif (($RoundEval->Course_Wealthy/$RoundEval->EvalCount) == 4)
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  @elseif (($RoundEval->Course_Wealthy/$RoundEval->EvalCount) > 4 && ($RoundEval->Course_Wealthy/$RoundEval->EvalCount) < 5)
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fas fa-star-half"></i>
                                  @elseif (($RoundEval->Course_Wealthy/$RoundEval->EvalCount) == 5)
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  @endif
                                   </td>
                                   <td>
                                      @if (($RoundEval->Enough_Hours/$RoundEval->EvalCount) === 1)
                                      
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                          
                                      @elseif (($RoundEval->Enough_Hours/$RoundEval->EvalCount) > 1 && ($RoundEval->Enough_Hours/$RoundEval->EvalCount) < 2)
                                      
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fas fa-star-half"></i>
                                      @elseif (($RoundEval->Enough_Hours/$RoundEval->EvalCount) == 2)
                                      
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      @elseif (($RoundEval->Enough_Hours/$RoundEval->EvalCount) > 2 && ($RoundEval->Enough_Hours/$RoundEval->EvalCount) < 3)
                                      
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fas fa-star-half"></i>
                                      @elseif (($RoundEval->Enough_Hours/$RoundEval->EvalCount) == 3)
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      @elseif (($RoundEval->Enough_Hours/$RoundEval->EvalCount) > 3 && ($RoundEval->Enough_Hours/$RoundEval->EvalCount) < 4)
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fas fa-star-half"></i>
                                      @elseif (($RoundEval->Enough_Hours/$RoundEval->EvalCount) == 4)
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      @elseif (($RoundEval->Enough_Hours/$RoundEval->EvalCount) > 4 && ($RoundEval->Enough_Hours/$RoundEval->EvalCount) < 5)
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fas fa-star-half"></i>
                                      @elseif (($RoundEval->Enough_Hours/$RoundEval->EvalCount) == 5)
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      @endif
                                       </td>
                                       <td>
                                          @if (($RoundEval->Enough_Practice/$RoundEval->EvalCount) == 1)
                                          
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                              
                                          @elseif (($RoundEval->Enough_Practice/$RoundEval->EvalCount) > 1 && ($RoundEval->Enough_Practice/$RoundEval->EvalCount) < 2)
                                          
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fas fa-star-half"></i>
                                          @elseif (($RoundEval->Enough_Practice/$RoundEval->EvalCount) == 2)
                                          
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          @elseif (($RoundEval->Enough_Practice/$RoundEval->EvalCount) > 2 && ($RoundEval->Enough_Practice/$RoundEval->EvalCount) < 3)
                                          
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fas fa-star-half"></i>
                                          @elseif (($RoundEval->Enough_Practice/$RoundEval->EvalCount) == 3)
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          @elseif (($RoundEval->Enough_Practice/$RoundEval->EvalCount) > 3 && ($RoundEval->Enough_Practice/$RoundEval->EvalCount) < 4)
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fas fa-star-half"></i>
                                          @elseif (($RoundEval->Enough_Practice/$RoundEval->EvalCount) == 4)
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          @elseif (($RoundEval->Enough_Practice/$RoundEval->EvalCount) > 4 && ($RoundEval->Enough_Practice/$RoundEval->EvalCount) < 5)
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fas fa-star-half"></i>
                                          @elseif (($RoundEval->Enough_Practice/$RoundEval->EvalCount) == 5)
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          @endif
                                           </td>
                                           <td>
                                              @if (($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) == 1)
                                              
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                                  
                                              @elseif (($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) > 1 && ($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) < 2)
                                              
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fas fa-star-half"></i>
                                              @elseif (($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) == 2)
                                              
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              @elseif (($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) > 2 && ($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) < 3)
                                              
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fas fa-star-half"></i>
                                              @elseif (($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) == 3)
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              @elseif (($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) > 3 && ($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) < 4)
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fas fa-star-half"></i>
                                              @elseif (($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) == 4)
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              @elseif (($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) > 4 && ($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) < 5)
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fas fa-star-half"></i>
                                              @elseif (($RoundEval->Materials_Evaluation/$RoundEval->EvalCount) == 5)
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              @endif
                                               </td>
                                               <td>
                                                  @if (($RoundEval->Suitable_Price/$RoundEval->EvalCount) == 1)
                                                  
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                      
                                                  @elseif (($RoundEval->Suitable_Price/$RoundEval->EvalCount) > 1 && ($RoundEval->Suitable_Price/$RoundEval->EvalCount) < 2)
                                                  
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fas fa-star-half"></i>
                                                  @elseif (($RoundEval->Suitable_Price/$RoundEval->EvalCount) == 2)
                                                  
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  @elseif (($RoundEval->Suitable_Price/$RoundEval->EvalCount) > 2 && ($RoundEval->Suitable_Price/$RoundEval->EvalCount) < 3)
                                                  
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fas fa-star-half"></i>
                                                  @elseif (($RoundEval->Suitable_Price/$RoundEval->EvalCount) == 3)
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  @elseif (($RoundEval->Suitable_Price/$RoundEval->EvalCount) > 3 && ($RoundEval->Suitable_Price/$RoundEval->EvalCount) < 4)
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fas fa-star-half"></i>
                                                  @elseif (($RoundEval->Suitable_Price/$RoundEval->EvalCount) == 4)
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  @elseif (($RoundEval->Suitable_Price/$RoundEval->EvalCount) > 4 && ($RoundEval->Suitable_Price/$RoundEval->EvalCount) < 5)
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fas fa-star-half"></i>
                                                  @elseif (($RoundEval->Suitable_Price/$RoundEval->EvalCount) == 5)
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  <i class="fa fa-star" aria-hidden="true"></i>
                                                  @endif
                                                   </td>
                                                   <td>
                                                      @if (($RoundEval->Overall_Education/$RoundEval->EvalCount) == 1)
                                                      
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                          
                                                      @elseif (($RoundEval->Overall_Education/$RoundEval->EvalCount) > 1 && ($RoundEval->Overall_Education/$RoundEval->EvalCount) < 2)
                                                      
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fas fa-star-half"></i>
                                                      @elseif (($RoundEval->Overall_Education/$RoundEval->EvalCount) == 2)
                                                      
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      @elseif (($RoundEval->Overall_Education/$RoundEval->EvalCount) > 2 && ($RoundEval->Overall_Education/$RoundEval->EvalCount) < 3)
                                                      
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fas fa-star-half"></i>
                                                      @elseif (($RoundEval->Overall_Education/$RoundEval->EvalCount) == 3)
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      @elseif (($RoundEval->Overall_Education/$RoundEval->EvalCount) > 3 && ($RoundEval->Overall_Education/$RoundEval->EvalCount) < 4)
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fas fa-star-half"></i>
                                                      @elseif (($RoundEval->Overall_Education/$RoundEval->EvalCount) == 4)
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      @elseif (($RoundEval->Overall_Education/$RoundEval->EvalCount) > 4 && ($RoundEval->Overall_Education/$RoundEval->EvalCount) < 5)
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fas fa-star-half"></i>
                                                      @elseif (($RoundEval->Overall_Education/$RoundEval->EvalCount) == 5)
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      @endif
                                                       </td>
                              
                               
                                <td>
                                  <?php 
                                    $total2 = ((($RoundEval->Course_Wealthy + $RoundEval->Enough_Hours + $RoundEval->Enough_Practice + $RoundEval->Materials_Evaluation + $RoundEval->Suitable_Price + $RoundEval->Overall_Education)/$RoundEval->EvalCount)/30)*100;
                                    ?>
                                    <div
                                    class="progress-circle"
                                    data-value="0.{{number_format($total2,0)}}"
                                    data-size="50"
                                    data-thickness="3"
                                    data-animation-start-value="1.0"
                                    data-fill="{
                                      &quot;color&quot;: &quot;green&quot;
                                    }"
                                    data-reverse="true">
                                    <div class="percent">
                                        {{number_format($total2,0)}}%
                                    </div>
                                  </div>
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
          {{-- <div class="row">
            <div class="col-md-6">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                      <h6>Exam KPI</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row no-gutters">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                </div>
                                <div class="col-md-6">
                                        <div class="progress-rounded progress-round-tiny">
                                          <div class="progress-value">72%</div>
                                            <svg>
                                              <circle class="progress-cicle bg-success"
                                              cx="65"
                                              cy="65"
                                              r="57"
                                              stroke-width="4"
                                              fill="none"
                                              aria-valuenow="72"
                                              aria-orientation="vertical"
                                              aria-valuemin="0"
                                              aria-valuemax="100"
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
                      <h6>Quiz KPI</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row no-gutters">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                </div>
                                <div class="col-md-6">
                                        <div class="progress-rounded progress-round-tiny">
                                          <div class="progress-value">72%</div>
                                            <svg>
                                              <circle class="progress-cicle bg-success"
                                              cx="65"
                                              cy="65"
                                              r="57"
                                              stroke-width="4"
                                              fill="none"
                                              aria-valuenow="72"
                                              aria-orientation="vertical"
                                              aria-valuemin="0"
                                              aria-valuemax="100"
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
                      <h6>Task KPI</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row no-gutters">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                </div>
                                <div class="col-md-6">
                                        <div class="progress-rounded progress-round-tiny">
                                          <div class="progress-value">72%</div>
                                            <svg>
                                              <circle class="progress-cicle bg-success"
                                              cx="65"
                                              cy="65"
                                              r="57"
                                              stroke-width="4"
                                              fill="none"
                                              aria-valuenow="72"
                                              aria-orientation="vertical"
                                              aria-valuemin="0"
                                              aria-valuemax="100"
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
                      <h6>Interaction KPI</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row no-gutters">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                </div>
                                <div class="col-md-6">
                                        <div class="progress-rounded progress-round-tiny">
                                          <div class="progress-value">72%</div>
                                            <svg>
                                              <circle class="progress-cicle bg-success"
                                              cx="65"
                                              cy="65"
                                              r="57"
                                              stroke-width="4"
                                              fill="none"
                                              aria-valuenow="72"
                                              aria-orientation="vertical"
                                              aria-valuemin="0"
                                              aria-valuemax="100"
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
                      <h6>Attiude KPI</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row no-gutters">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                </div>
                                <div class="col-md-6">
                                        <div class="progress-rounded progress-round-tiny">
                                          <div class="progress-value">80%</div>
                                            <svg>
                                              <circle class="progress-cicle bg-success"
                                              cx="65"
                                              cy="65"
                                              r="57"
                                              stroke-width="4"
                                              fill="none"
                                              aria-valuenow="80"
                                              aria-orientation="vertical"
                                              aria-valuemin="0"
                                              aria-valuemax="100"
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
                      <h6>Helpful KPI</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="row no-gutters">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto accusantium fuga repudiandae a sed rem eaque doloremque quasi error, harum laboriosam asperiores voluptatum! Voluptatum, rerum labore doloribus tempora ipsam laboriosam?</p>
                                </div>
                                <div class="col-md-6">
                                        <div class="progress-rounded progress-round-tiny">
                                          <div class="progress-value">60%</div>
                                            <svg>
                                              <circle class="progress-cicle bg-warning"
                                              cx="65"
                                              cy="65"
                                              r="57"
                                              stroke-width="4"
                                              fill="none"
                                              aria-valuenow="60"
                                              aria-orientation="vertical"
                                              aria-valuemin="0"
                                              aria-valuemax="100"
                                              role="slider">
                                            </circle>
                                          </svg>
                                        </div>
                                      </div>
                        </div>
                    </div>
                  </div>
            </div>
          </div> --}}
        
        </div>

      </div>
        
@endsection