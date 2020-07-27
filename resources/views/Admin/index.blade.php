@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds,'Notifications'=>$Notifications,'CountNotifications'=>$CountNotifications])
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

              <div class="col-xl-6 col-md-12">
                  <div class="ms-panel">
                      <div class="ms-panel-header">
                          <h6>Recent Students</h6>
                      </div>
                      <div class="ms-panel-body p-0">
                          <div class="table-responsive">
                              <table class="table table-hover thead-light">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th scope="col">Student name</th>
                                          <th scope="col">Phone</th>
                                          <th scope="col">Email</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @php
                                          $i = 1
                                      @endphp
                                      @foreach ($Recent as $r)
                                          <tr>
                                          <td>{{$i}}</td>
                                          <td class="ms-table-f-w"> {{$r->FullnameEn}} </td>
                                          <td>{{$r->Phone}}</td>
                                          <td>{{$r->Email}}</td>
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

              <div class="col-xl-6 col-md-12">
                  <div class="ms-panel ms-panel-fh">
                      <div class="ms-panel-header">
                          <h6>KPI Timeline</h6>
                      </div>
                      <div class="ms-panel-body" style="overflow-y:scroll;max-height:500px;">
                          <ul class="ms-activity-log">
                              @foreach ($Notifications as $Notification)
                                  
                                  <li>
                                  <a href="{{$Notification->NotificationLink}}" style="display:inline-block;">
                                  
                                  <div class="ms-btn-icon btn-pill icon btn-success">
                                      <i class="flaticon-tick-inside-circle"></i>
                                  </div>
                                  <h6>Submitting task</h6>
                                  <span> <i class="material-icons">event</i>{{date('d-m-Y', strtotime($Notification->NotificationDate))}}</span>
                                <p class="fs-14">{{$Notification->Notification}}</p>
                                </a>
                              </li>
                                  
                              @endforeach

                          </ul>
                      </div>
                  </div>
              </div>
{{-- 
              <div class="col-xl-7 col-md-12">
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

             

          </div>
     @endsection