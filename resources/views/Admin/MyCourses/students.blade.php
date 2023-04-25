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
            <div class="mx-4 mt-3">
              <h4 class="mb-0">Download Students List</h4>
              <a href="{{url("/Admin/Course/$Round->RoundId/Students/Report")}}" class="btn btn-success"><i class="far fa-file-excel"></i> Xlsx</a>
            </div>
            <div class="ms-panel-body">

              <div class="table-responsive">

                <table id="students" class=" fixed-thead-width dattable table table-striped thead-dark  w-100">

                  <thead>

                    <th>#</th>

                    <th>Student Name </th>

                    <th> Attendence</th>

                    <th>  Time Respect </th>

                    <th>Lecture Practice</th>

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

                    <td><span style="visibility: hidden;">{{$i}}</span>
                        @if ($RoundStudent->ImagePath != null)
                      <img  src="{{url("/storage/app/public/$RoundStudent->ImagePath")}}" style="max-width:50px;height:50px;border-radius:50%;"/>
                            
                        @else
                            
                        @endif</td>

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

                            data-value="0"

                            data-size="50"

                            data-thickness="3"

                            data-animation-start-value="1.0"

                            data-fill="{

                              &quot;color&quot;: &quot;orange&quot;

                            }"

                            data-reverse="true">

                            <div class="percent timeper">

                                0%

                            </div>

                          </div>

                            </td>

                           

                          <td>

                            <div

                            class="progress-circle Lecture"

                            data-value="0"

                            data-size="50"

                            data-thickness="3"

                            data-animation-start-value="1.0"

                            data-fill="{

                              &quot;color&quot;: &quot;red&quot;

                            }"

                            data-reverse="true">

                            <div class="percent lectper">

                                0%

                            </div>

                          </div>

                            </td>

                           <td>

                            <div

                            class="progress-circle solve"

                            data-value="0"

                            data-size="50"

                            data-thickness="3"

                            data-animation-start-value="1.0"

                            data-fill="{

                              &quot;color&quot;: &quot;red&quot;

                            }"

                            data-reverse="true">

                            <div class="percent solveper">

                                0%

                            </div>

                          </div>

                            </td>

                          <td>

                            <div

                            class="progress-circle interaction"

                            data-value="0"

                            data-size="50"

                            data-thickness="3"

                            data-animation-start-value="1.0"

                            data-fill="{

                              &quot;color&quot;: &quot;green&quot;

                            }"

                            data-reverse="true">

                            <div class="percent interper">

                                0%

                            </div>

                          </div>

                            </td>

                           

                          <td>

                            <div

                            class="progress-circle attitude"

                            data-value="0"

                            data-size="50"

                            data-thickness="3"

                            data-animation-start-value="1.0"

                            data-fill="{

                              &quot;color&quot;: &quot;green&quot;

                            }"

                            data-reverse="true">

                            <div class="percent attper">

                                0%

                            </div>

                          </div>

                            </td>

                           

                          <td>

                            <div

                            class="progress-circle focus"

                            data-value="0"

                            data-size="50"

                            data-thickness="3"

                            data-animation-start-value="1.0"

                            data-fill="{

                              &quot;color&quot;: &quot;red&quot;

                            }"

                            data-reverse="true">

                            <div class="percent focusper">

                                0%

                            </div>

                          </div>

                            </td>

                           

                          <td>

                            <div

                            class="progress-circle understand"

                            data-value="0"

                            data-size="50"

                            data-thickness="3"

                            data-animation-start-value="1.0"

                            data-fill="{

                              &quot;color&quot;: &quot;yellow&quot;

                            }"

                            data-reverse="true">

                            <div class="percent understandper">

                                0%

                            </div>

                          </div>

                            </td>

                           

                          <td>

                            <div

                            class="progress-circle total"

                            data-value="0"

                            data-size="50"

                            data-thickness="3"

                            data-animation-start-value="1.0"

                            data-fill="{

                              &quot;color&quot;: &quot;green&quot;

                            }"

                            data-reverse="true">

                            <div class="percent totalper">

                                0%

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
          console.table(data);

          thistr.find('div.attendanceper').text(data.attended + " / " + data.all);

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
          if( data.SessionsDone) {
            thistr.find('div.solveper').text(data.TasksDone + " / " + data.SessionsDone);

// thistr.find('div.attendance').attr('data-value',(parseFloat(data).toFixed(0)/100);

            thistr.find('div.solve').circleProgress({value: parseFloat((data.TasksDone/data.SessionsDone)*100).toFixed(0)/100});
          }else{
            thistr.find('div.solveper').text(0);

// thistr.find('div.attendance').attr('data-value',(parseFloat(data).toFixed(0)/100);

thistr.find('div.solve').circleProgress({value: 0});
          }

          var total = (data.percentage + data.TimeRespect + data.Lecture_Practice + data.Student_Interaction + data.Student_Attitude + data.Student_Focus + data.Understand_Speed + data.Solve_Home_Tasks)/8;
          thistr.find('div.totalper').text(parseFloat(total).toFixed(1));

          // thistr.find('div.attendance').attr('data-value',(parseFloat(data).toFixed(0)/100);

          thistr.find('div.total').circleProgress({value: parseFloat(total).toFixed(0)/100});



        },

        error: function (request, status, error) {

            console.table(request.responseText);

        }

     });

      })

    })

    </script>

@endsection