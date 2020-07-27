@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/Admin"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/Admin/Courses/{{$Round->RoundId}}">{{$Round->CourseNameEn}} G{{$Round->GroupNo}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">Students</li>
            </ol>
          </nav>
      <div class="row">

        <div class="col-md-12">

          <div class="ms-panel">
            <div class="ms-panel-header">
              <h2>{{$Round->CourseNameEn}} G{{$Round->GroupNo}}</h2>
              <h6>Students List </h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table id="students" class=" fixed-thead-width dattable table table-striped thead-dark  w-100">
                  <thead>
                    <th>#</th>
                    <th>Student Name </th>
                    <th> Attendence</th>
                    <th>  Time Respect </th>
                    <th>Lecture Respect</th>
                    <th>Solve Home Tasks</th>
                    <th>Interaction</th>
                    <th>Attiude</th>
                    <th>Focus</th>
                    <th>Understanding Speed</th>
                    <th>Total</th>
                  </thead>
                  <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach ($RoundStudents as $RoundStudent)
                    <tr>
                    <td>{{$i}}</td>
                    <td data-id="{{$RoundStudent->StudentRoundsId}}"><a href="/Admin/Course/Student/Details/{{$RoundStudent->StudentRoundsId}}">{{$RoundStudent->FullnameEn}}</a></td>
                          <td>
                          <input type="hidden" value="{{$RoundStudent->StudentRoundsId}}" class="studentround">
                            <div
                            class="progress-circle attendance"
                            data-value="0"
                            data-size="50"
                            data-thickness="3"
                            data-animation-start-value="1.0"
                            data-fill="{
                              &quot;color&quot;: &quot;green&quot;
                            }"
                            data-reverse="true">
                            <div class="percent attendanceper">
                                0%
                            </div>
                          </div>
                            </td>
                           
                          <td>
                            <div
                            class="progress-circle TimeRespect"
                            data-value="0.55"
                            data-size="50"
                            data-thickness="3"
                            data-animation-start-value="1.0"
                            data-fill="{
                              &quot;color&quot;: &quot;orange&quot;
                            }"
                            data-reverse="true">
                            <div class="percent timeper">
                                55%
                            </div>
                          </div>
                            </td>
                           
                          <td>
                            <div
                            class="progress-circle Lecture"
                            data-value="0.40"
                            data-size="50"
                            data-thickness="3"
                            data-animation-start-value="1.0"
                            data-fill="{
                              &quot;color&quot;: &quot;red&quot;
                            }"
                            data-reverse="true">
                            <div class="percent lectper">
                                40%
                            </div>
                          </div>
                            </td>
                           <td>
                            <div
                            class="progress-circle solve"
                            data-value="0.40"
                            data-size="50"
                            data-thickness="3"
                            data-animation-start-value="1.0"
                            data-fill="{
                              &quot;color&quot;: &quot;red&quot;
                            }"
                            data-reverse="true">
                            <div class="percent solveper">
                                40%
                            </div>
                          </div>
                            </td>
                          <td>
                            <div
                            class="progress-circle interaction"
                            data-value="0.77"
                            data-size="50"
                            data-thickness="3"
                            data-animation-start-value="1.0"
                            data-fill="{
                              &quot;color&quot;: &quot;green&quot;
                            }"
                            data-reverse="true">
                            <div class="percent interper">
                                77%
                            </div>
                          </div>
                            </td>
                           
                          <td>
                            <div
                            class="progress-circle attitude"
                            data-value="0.70"
                            data-size="50"
                            data-thickness="3"
                            data-animation-start-value="1.0"
                            data-fill="{
                              &quot;color&quot;: &quot;green&quot;
                            }"
                            data-reverse="true">
                            <div class="percent attper">
                                70%
                            </div>
                          </div>
                            </td>
                           
                          <td>
                            <div
                            class="progress-circle focus"
                            data-value="0.50"
                            data-size="50"
                            data-thickness="3"
                            data-animation-start-value="1.0"
                            data-fill="{
                              &quot;color&quot;: &quot;red&quot;
                            }"
                            data-reverse="true">
                            <div class="percent focusper">
                                50%
                            </div>
                          </div>
                            </td>
                           
                          <td>
                            <div
                            class="progress-circle understand"
                            data-value="0.60"
                            data-size="50"
                            data-thickness="3"
                            data-animation-start-value="1.0"
                            data-fill="{
                              &quot;color&quot;: &quot;yellow&quot;
                            }"
                            data-reverse="true">
                            <div class="percent understandper">
                                60%
                            </div>
                          </div>
                            </td>
                           
                          <td>
                            <div
                            class="progress-circle"
                            data-value="0.88"
                            data-size="50"
                            data-thickness="3"
                            data-animation-start-value="1.0"
                            data-fill="{
                              &quot;color&quot;: &quot;green&quot;
                            }"
                            data-reverse="true">
                            <div class="percent">
                                88%
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
        
        </div>

      </div>
    </div>

  </main>

  
  
  <!-- Task Modal -->
  <div class="modal fade" id="DoneTopics" tabindex="-1" role="dialog" aria-labelledby="DoneTopics">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
  
          <div class="modal-body">
  
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="ms-auth-container row no-gutters">
                <div class="col-12 p-5">
                  <form action="">
                   <div class="row">
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" checked="">
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> HTML </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" checked="">
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> CSS </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" checked="">
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> CSS3 </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> JavaScript </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                     <div class="col-md-6 my-2">
                     
                        <label class="ms-checkbox-wrap ms-checkbox-success">
                          <input type="checkbox" value="" >
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Jquery </span>
                     </div>
                    
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


@endsection
@section('scripts')
    <script>
    $(document).ready(function(){
      $('#students > tbody  > tr').each(function() {

        var thistr = $(this);
        var StudentRoundsId = $(this).find('input.studentround').val();
        
        //alert(StudentRoundsId);
        $.ajax({
        type:'GET',
        url:'/PercentageAttendance',
        data:{
          StudentRoundsId:StudentRoundsId
        },
        success:function(data) {
          thistr.find('div.attendanceper').text(parseFloat(data.percentage).toFixed(1));
          // thistr.find('div.attendance').attr('data-value',(parseFloat(data).toFixed(0)/100);
          thistr.find('div.attendance').circleProgress({value: parseFloat(data.percentage).toFixed(0)/100});
          thistr.find('div.timeper').text(parseFloat(data.TimeRespect).toFixed(1));
          // thistr.find('div.attendance').attr('data-value',(parseFloat(data).toFixed(0)/100);
          thistr.find('div.TimeRespect').circleProgress({value: parseFloat(data.TimeRespect).toFixed(0)/100});
          thistr.find('div.lectper').text(parseFloat(data.Lecture_Practice).toFixed(1));
          // thistr.find('div.attendance').attr('data-value',(parseFloat(data).toFixed(0)/100);
          thistr.find('div.Lecture').circleProgress({value: parseFloat(data.Lecture_Practice).toFixed(0)/100});
          thistr.find('div.interper').text(parseFloat(data.Student_Interaction).toFixed(1));
          // thistr.find('div.attendance').attr('data-value',(parseFloat(data).toFixed(0)/100);
          thistr.find('div.interaction').circleProgress({value: parseFloat(data.Student_Interaction).toFixed(0)/100});
          thistr.find('div.attper').text(parseFloat(data.Student_Attitude).toFixed(1));
          // thistr.find('div.attendance').attr('data-value',(parseFloat(data).toFixed(0)/100);
          thistr.find('div.attitude').circleProgress({value: parseFloat(data.Student_Attitude).toFixed(0)/100});
          thistr.find('div.focusper').text(parseFloat(data.Student_Focus).toFixed(1));
          // thistr.find('div.attendance').attr('data-value',(parseFloat(data).toFixed(0)/100);
          thistr.find('div.focus').circleProgress({value: parseFloat(data.Student_Focus).toFixed(0)/100});
          thistr.find('div.understandper').text(parseFloat(data.Understand_Speed).toFixed(1));
          // thistr.find('div.attendance').attr('data-value',(parseFloat(data).toFixed(0)/100);
          thistr.find('div.understand').circleProgress({value: parseFloat(data.Understand_Speed).toFixed(0)/100});
          thistr.find('div.solveper').text(parseFloat(data.Solve_Home_Tasks).toFixed(1));
          // thistr.find('div.attendance').attr('data-value',(parseFloat(data).toFixed(0)/100);
          thistr.find('div.solve').circleProgress({value: parseFloat(data.Solve_Home_Tasks).toFixed(0)/100});

        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
     });
      })
    })
    </script>
@endsection