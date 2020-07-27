@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Attendence & Evaluations</li>
            </ol>
          </nav>
      
      <div class="row">

        <div class="col-md-12">
         


            <div class="ms-panel">
                <div class="ms-panel-header">
                  <h6>ُCourse Evaluation Per Track</h6>
                </div>
                <div class="ms-panel-body">
                  <div class="table-responsive">
                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                <thead>
                                  <th>Topic</th>
                                  <th>Knowledge Experience</th>
                                  <th>Training Qualified</th>
                                  <th>Topics Preparation</th>
                                  <th>Trainer Attitude </th>
                                  <th>Time Respect</th>
                                  <th>Students Interaction</th>
                                  <th>Overall Evaluation</th>
                                  <th>Total</th>
                                  <th>note </th>
                                </thead>
                                <tbody>
                                  
                                  <tr>
                                    <td>HTML</td>
              
                                      <td>
                                        <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                                      </td>
                                      <td>
                                        <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                                      </td>
                                      <td>
                                        <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                                      </td>
                                      <td>
                                        <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                                      </td>
                                      <td>
                                        <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                                      </td>
                                      <td>
                                        <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                                      </td>
                                      <td>
                                        <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                                      </td>
                                     
                                      
                                      <td>
                                          <div
                                          class="progress-circle"
                                          data-value="0.70"
                                          data-size="50"
                                          data-thickness="3"
                                          data-animation-start-value="1.0"
                                          data-fill="{
                                            &quot;color&quot;: &quot;green&quot;
                                          }"
                                          data-reverse="true">
                                          <div class="percent">
                                              70%
                                          </div>
                                        </div>
                                      </td>
                                      <td class="note">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus fugit nos
                                      </td>
                                  </tr>
              
                                </tbody>
                              </table>
                  </div>
                </div>
              </div>
            
              <div class="ms-panel">
                    <div class="ms-panel-header">
                      <h6>ُCourse Evaluation</h6>
                    </div>
                    <div class="ms-panel-body">
                      <div class="mb-3 ">
                      </div>
                      <div class="table-responsive">
                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                          <thead>
                            <th>Topic</th>
                            <th> Course Wealthy </th>
                            <th> Suitable Hours </th>
                            <th>Suitable Practice</th>
                            <th>Materials Evaluation</th>
                            <th>Overall Evaluation</th>
                            <th>Total</th>
                            <th>note </th>
                          </thead>
                          <tbody>
        
                            <tr>
                              <td>HTML</td>
        
                                <td>
                                 <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                                </td>
                                <td>
                                 <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                                </td>
                                <td>
                                 <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                                </td>
                                <td>
                                 <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                                </td>
                                <td>
                                 <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>                                       <i class="fa fa-star" aria-hidden="true"></i>
                                </td>
                              
                               
                                <td>
                                    <div
                                    class="progress-circle"
                                    data-value="0.70"
                                    data-size="50"
                                    data-thickness="3"
                                    data-animation-start-value="1.0"
                                    data-fill="{
                                      &quot;color&quot;: &quot;green&quot;
                                    }"
                                    data-reverse="true">
                                    <div class="percent">
                                        70%
                                    </div>
                                  </div>
                                </td>
                                <td class="note">
                                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, ea cupiditate perferendis magni alias praesentium totam natus culpa
                                 </td>
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
          </div>
        
        </div>

      </div>
@endsection