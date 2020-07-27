@extends('Layouts/trainerkpi',['Notifications'=>$Notifications,'CountNotifications'=>$CountNotifications,'TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds])
@section('content')
<div class="row">
        <div class="col-xl-3 col-md-6">
                <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
                    <div class="ms-card-body media">
                        <div class="media-body">
                            <h6>Total Trainers</h6>
                            <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> {{$Trainers}}</p>
                            <p class="fs-12">{{$Trainers}} trainers trying their best.</p>
                        </div>
                    </div>
                    <i class="flaticon-statistics"></i>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
                    <div class="ms-card-body media">
                        <div class="media-body">
                            <h6>Rounds</h6>
                            <p class="ms-card-change"> {{$Rounds}}</p>
                            <p class="fs-12">{{$Running}} Courses are running now</p>

                        </div>
                    </div>
                    <i class="flaticon-stats"></i>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="ms-card card-gradient-warning ms-widget ms-infographics-widget">
                    <div class="ms-card-body media">
                        <div class="media-body">
                            <h6>Total Studenst</h6>
                            <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> {{$Students}}</p>
                            <p class="fs-12">{{$Students}} are attending these rounds</p>
                        </div>
                    </div>
                    <i class="flaticon-user"></i>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="ms-card card-gradient-info ms-widget ms-infographics-widget">
                    <div class="ms-card-body media">
                        <div class="media-body">
                            <h6>Branches</h6>
                        <p class="ms-card-change"> {{$Branches}}</p>
                        <p class="fs-12">{{$Branches}} Branches supports {{$Labs}} Labs</p>
                        </div>
                    </div>
                    <i class="flaticon-reuse"></i>
                </div>
            </div>
{{-- 
              <div class="col-xl-6 col-md-12">
                  <div class="ms-panel">
                      <div class="ms-panel-header">
                          <h6>Recent Buyers</h6>
                      </div>
                      <div class="ms-panel-body p-0">
                          <div class="table-responsive">
                              <table class="table table-hover thead-light">
                                  <thead>
                                      <tr>
                                          <th scope="col">User</th>
                                          <th scope="col">Service</th>
                                          <th scope="col">Product ID</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td class="ms-table-f-w"> <img src="https://via.placeholder.com/270x270" alt="people"> Chihoo Hwang </td>
                                          <td>Wordpress Template</td>
                                          <td>67384917</td>
                                      </tr>
                                      <tr>
                                          <td class="ms-table-f-w"> <img src="https://via.placeholder.com/270x270" alt="people"> Ajay Suryavanash </td>
                                          <td>Business Card</td>
                                          <td>789393819</td>
                                      </tr>
                                      <tr>
                                          <td class="ms-table-f-w"> <img src="https://via.placeholder.com/270x270" alt="people"> John Doe </td>
                                          <td>App Customization</td>
                                          <td>137893137</td>
                                      </tr>
                                      <tr>
                                          <td class="ms-table-f-w"> <img src="https://via.placeholder.com/270x270" alt="people"> Alesdro Guitto </td>
                                          <td>Dashboard Design</td>
                                          <td>235193138</td>
                                      </tr>
                                      <tr>
                                          <td class="ms-table-f-w"> <img src="https://via.placeholder.com/270x270" alt="people"> Manbir Sahwny </td>
                                          <td>Theme Development</td>
                                          <td>19938917</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div> --}}

              {{-- <div class="col-xl-6 col-md-12">
                  <div class="ms-panel ms-panel-fh">
                      <div class="ms-panel-header">
                          <h6>Project Timeline</h6>
                      </div>
                      <div class="ms-panel-body">
                          <ul class="ms-activity-log">
                              <li>
                                  <div class="ms-btn-icon btn-pill icon btn-success">
                                      <i class="flaticon-tick-inside-circle"></i>
                                  </div>
                                  <h6>Lorem ipsum dolor sit</h6>
                                  <span> <i class="material-icons">event</i>1 January, 2018</span>
                                  <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
                              </li>
                              <li>
                                  <div class="ms-btn-icon btn-pill icon btn-danger">
                                      <i class="flaticon-alert-1"></i>
                                  </div>
                                  <h6>Lorem ipsum dolor sit</h6>
                                  <span> <i class="material-icons">event</i>1 March, 2020</span>
                                  <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div> --}}

              {{-- <div class="col-xl-7 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h6>most sellings projects</h6>
                    </div>
                    <div class="ms-panel-body">
                        <span class="progress-label">HTML & CSS Projects</span><span class="progress-status">83%</span>
                        <div class="progress progress-tiny">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 83%" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-label">Wordpress Projects</span><span class="progress-status">50%</span>
                        <div class="progress progress-tiny">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-label">PSD Projects</span><span class="progress-status">75%</span>
                        <div class="progress progress-tiny">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-label">Code Snippets</span><span class="progress-status">92%</span>
                        <div class="progress progress-tiny">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="col-xl-5 col-md-12">
                 

                  <div class="ms-panel">
                      <div class="ms-panel-header">
                          <h6>Top Sales</h6>
                          <p>Your highest selling projects</p>
                      </div>
                      <div class="ms-panel-body p-0">
                          <div class="ms-quick-stats">
                              <div class="ms-stats-grid">
                                  <p class="ms-text-success">+47.18%</p>
                                  <p class="ms-text-dark">8,033</p>
                                  <span>Admin Dashboard</span>
                              </div>
                              <div class="ms-stats-grid">
                                  <p class="ms-text-success">+17.24%</p>
                                  <p class="ms-text-dark">6,039</p>
                                  <span>Wordpress Theme</span>
                              </div>
                          </div>
                      </div>
                  </div>

              </div> --}}
              <div class="col-md-12">
                    <div class="ms-panel">
                        <div class="ms-panel-header">
                          <h6>why KPI?</h6>
                        </div>
                        <div class="ms-panel-body">
                            <div class="row no-gutters">
                                    <div class="col-md-12" style="text-align: center;padding:20px 50px 80px;">
                                        <h2>
                                            KPI system tries to improve the educational cycle by detrmining the rate of improving of students through a lot process 
                                        </h2>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="progress-rounded progress-round-tiny">
                                              <div class="progress-value">100%</div>
                                                <svg>
                                                  <circle class="progress-cicle bg-success"
                                                  cx="65"
                                                  cy="65"
                                                  r="57"
                                                  stroke-width="4"
                                                  fill="none"
                                                  aria-valuenow="100"
                                                  aria-orientation="vertical"
                                                  aria-valuemin="0"
                                                  aria-valuemax="100"
                                                  role="slider">
                                                </circle>
                                              </svg>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                                <p>
                                                   It starts by quizes and exams which is required regularly through the course duration
                                                </p>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                    <div class="progress-rounded progress-round-tiny">
                                                      <div class="progress-value">100%</div>
                                                        <svg>
                                                          <circle class="progress-cicle bg-success"
                                                          cx="65"
                                                          cy="65"
                                                          r="57"
                                                          stroke-width="4"
                                                          fill="none"
                                                          aria-valuenow="100"
                                                          aria-orientation="vertical"
                                                          aria-valuemin="0"
                                                          aria-valuemax="100"
                                                          role="slider">
                                                        </circle>
                                                      </svg>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                        <p>
                                                           Second stage is evaluations done upon student to measure his rate of improvement.
                                                        </p>
                                                    </div>
                                                  <div class="col-md-3">
                                                        <div class="progress-rounded progress-round-tiny">
                                                          <div class="progress-value">100%</div>
                                                            <svg>
                                                              <circle class="progress-cicle bg-success"
                                                              cx="65"
                                                              cy="65"
                                                              r="57"
                                                              stroke-width="4"
                                                              fill="none"
                                                              aria-valuenow="100"
                                                              aria-orientation="vertical"
                                                              aria-valuemin="0"
                                                              aria-valuemax="100"
                                                              role="slider">
                                                            </circle>
                                                          </svg>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                            <p>
                                                              Why KPI?
                                                              <br>
                                                              KPI is not just for identifying you level of improvement and your progress, It helps you to evaluate all course factors which helps you to do your course with maximum benifits, these factors are your trainers, center equipments , course and center stuff.
                                                            </p>
                                                        </div>
                                                 
                            </div>
                        </div>
                      </div>
                </div>
            </div>

             @endsection
