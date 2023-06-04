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
            <div class="col-lg-12">
                <div class="row">
                    @include('error')
                    @if(session('success'))
                        <span class="alert alert-success">{{session('success')}}</span>
                    @endif
                    @if(session('failed'))
                        <span class="alert alert-danger">{{session('failed')}}</span>
                    @endif

                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">All Project</h5>

                                @if($user_data->role =='ceo')

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addyear">
                                        Add Department
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addyear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{route('admin.add.project')}}" method="POST">
                                                    {{csrf_field()}}
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Project</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5>Add Projects</h5>
                                                        <hr>
                                                        <form action="">
                                                            <br>
                                                            <span>Project Name:</span>
                                                            <input type="text" name="name" class="form-control" placeholder="Enter Project name">
                                                            <br>
                                                            <label for="cars">Status:</label>

                                                            <select name="status" id="cars" class="form-select">
                                                                <option value="Start_Soon">Start Soon</option>
                                                                <option value="Future_Project">Future Project</option>
                                                                <option value="Running">Running</option>
                                                                <option value="Emergency">Emergency</option>
                                                            </select>
                                                            <br>
                                                            <span>Project Stating date</span>
                                                            <input type="date" name="starting_date" class="form-control" placeholder="starting date">
                                                            <br>
                                                            <span>Project End date</span>
                                                            <input type="date" name="end_date" class="form-control" placeholder="End date">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit"   class="btn btn-primary" value="Submit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!-- Line Chart -->
                                <br>
                                <br>


                                <style>
                                    /*service*/

                                    .services a {
                                        text-decoration: none;
                                    }
                                    .services .service-box {
                                        text-align: center;

                                    }
                                    .services .service-box h2 {
                                        color: #222;
                                        font-size: 20px;
                                        padding-top: 10px;
                                        text-decoration: none;
                                    }
                                    .services a .service-box:hover h2 {
                                        color: #F9F5F6;
                                    }
                                    .services .investor-box {
                                        border-radius: 10px;

                                        color: white;
                                        background-color: #576CBC;
                                        background-position: center center;
                                        padding: 20px;
                                        width: 100%;
                                        min-height: 150px;
                                        display: block;
                                        position: relative;
                                        margin-bottom: 2rem;
                                        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
                                    }
                                    .services .investor-box h2 {
                                        font-size: 20px;
                                    }


                                    .services .investor-box:hover .flip-view {
                                        left: 0;
                                        visibility: visible;
                                        opacity: 1;
                                    }
                                </style>

                                <div class="table-responsive">
                                    <!--services-->
                                    <div class=" services pb-5">
                                        <div class="container">
                                            <div class="pt-5">
                                                <div class="row">
                                                    @foreach($all_project as $project)

                                                    <div class="col-md-3">
                                                        <a href="https://www.w3schools.com">
                                                        <div class="investor-box">
                                                            <h2>{{$project->name}}</h2>

                                                            <span class="badge badge-success">{{$project->status}}</span>
                                                            <br>
                                                           <span>Task: 50</span>
                                                        </div>
                                                        </a>
                                                    </div>

                                                    @endforeach


{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="investor-box">--}}
{{--                                                            <h2>Brand Products made in Bangladesh EPZs</h2>--}}
{{--                                                            <div class="flip-view">--}}
{{--                                                                <a href="#">View Task <i class="fas fa-chevron-circle-right"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="investor-box">--}}
{{--                                                            <h2>Classification of Investors</h2>--}}
{{--                                                            <div class="flip-view">--}}
{{--                                                                <a href="#">View Task <i class="fas fa-chevron-circle-right"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="investor-box">--}}
{{--                                                            <h2>How To Apply</h2>--}}
{{--                                                            <div class="flip-view">--}}
{{--                                                                <a href="#">View Task <i class="fas fa-chevron-circle-right"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end services-->
                                </div>



                            </div>

                        </div>
                    </div><!-- End Reports -->




                </div><!-- End Left side columns -->



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
