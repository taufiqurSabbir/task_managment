@extends('dashboard.layouts.usermaster')

@section('user_name',$user_data->name)
@section('phone',$user_data->phone)
@section('profile_image',$user_data->profile_picture)

@if($user_data->user_status =='Approved'):

@section('collapsed1','');
@section('sidebar_name1','Dashboard')
@section('link1',route('admin.dashboard'))
@section('icon1','bi bi-grid')

@section('page_title','Dashboard')

@section('collapsed2','collapsed');
@section('sidebar_name2','My Task')
@section('link2',route('all.user'))
@section('icon2','bi bi-person-workspace')


@section('collapsed3','collapsed');
@section('sidebar_name3','Projects')
@section('link3',)
@section('icon3','bi bi-clipboard-check-fill')

@section('collapsed4','collapsed');
@section('sidebar_name4','Payment')
@section('link4',route('loan'))
@section('icon4','bi bi-cash-coin')



@section('collapsed5','collapsed');
@section('sidebar_name5','Notice')
@section('link5',route('notice'))
@section('icon5','bi bi-bell')


@section('collapsed6','collapsed');
@section('sidebar_name6','Logout')
@section('link6',route('logout'))
@section('icon6','bi bi-box-arrow-left')



@section('content')
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">


                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">


                        <div class="card-body">
                            <h5 class="card-title">Total Earn <span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cash-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <h6></h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                    <!-- Your Total -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">


                            <div class="card-body">
                                <h5 class="card-title">Paid</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cash-stack"></i>
                                    </div>
                                    <div class="ps-3">

                                        <h6>৳</h6>
                                        <span><p>Adjest amount <b style="color:#b01602">৳</b></p></span>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Your Total -->


                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card due">


                            <div class="card-body">
                                <h5 class="card-title">Amount Due</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-question-octagon"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>৳</h6>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">


                        <div class="card-body">
                            <h5 class="card-title">Total Task</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6></h6>


                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->


                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card due">


                        <div class="card-body">
                            <h5 class="card-title">Completed Task</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-question-octagon"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>৳</h6>


                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card asset">


                        <div class="card-body">
                            <h5 class="card-title">Running Task</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-shield-fill-plus"></i>
                                </div>
                                <div class="ps-3">
                                    <h6></h6>


                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->





                <!-- Reports -->
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Running Task</h5>

                            <!-- Line Chart -->
                            <div id="reportsChart" class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">phone</th>
                                        <th scope="col">amount</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">Purpose</th>
                                        <th scope="col">status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>

                                                <span class="badge bg-warning">Due</span>

                                                <span class="badge bg-success">Paid</span>

                                                <span class="badge bg-danger">Rejected</span>

                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>



                        </div>

                    </div>
                </div><!-- End Reports -->

                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Your Last Transaction</h5>

                            <!-- Line Chart -->

                            <div id="reportsChart" class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">phone</th>
                                        <th scope="col">amount</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">Purpose</th>
                                        <th scope="col">status</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>

                                                <span class="badge bg-warning">Due</span>

                                                <span class="badge bg-success">Paid</span>

                                                <span class="badge bg-danger">Rejected</span>

                                        </td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>



                        </div>

                    </div>
                </div><!-- End Reports --><!-- End Recent Sales -->

                <!-- Top Selling -->


            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

            <div class="card">
            <div class="card-body pb-0">
                <h5 class="card-title">Notice </h5>


                <div class="news">
                    @foreach ($notice as $notices)
                        @php
                            $push_date = Illuminate\Support\Carbon::parse($notices->created_at);
                            $notice_user = \App\Models\User::where('id',$notices->user_id)->first();
                        @endphp
                    <div class="post-item clearfix">
                        <h4><a href="{{route('single.notice',$notices->id)}}">{{$notices->title}}</a></h4>
                        <div class="col-sm">
                            <span>Notice By: <b>{{$notice_user->name}}</b> </span>

                            <span>Publish at: <b>{{$push_date->isoFormat('Do MMM YY')}}</b> </span>
                        </div>
                    </div>

                        <hr>

                    @endforeach
                </div><!-- End sidebar recent posts-->

            </div>
        </div><!-- End News & Updates -->


            <!-- Recent Activity -->


            <!-- News & Updates Traffic -->

        </div><!-- End Right side columns -->

    </div>

@endsection
@elseif($user_data->user_status =='pending')
@section('content')

    <div class="row">


        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">

                <h4 style="text-align:center">Your Account is <b style="color:darkred">pending</b> </h4>
                <h5 style="text-align:center">We are checking your Information. <br> We'll inform you soon</h5>

                <img src="{{asset('image/frontend/98723-search-users.gif')}}" alt="">



            </div>
        </div>
    </div>
@endsection

@elseif($user_data->user_status =='Rejected')
@section('content')

    <div class="row">


        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">
                <h4 style="text-align:center">Your Account is <b style="color:darkred">Rejected</b> </h4>
                <h5 style="text-align:center">We are sorry to inform. <br> You unable to became our member</h5>

                <img src="{{asset('image/frontend/80164-reject-document-files.gif')}}" style="height:50%; width:70%; margin: 0 auto" alt="">
            </div>
        </div>
    </div>
@endsection



@endif
