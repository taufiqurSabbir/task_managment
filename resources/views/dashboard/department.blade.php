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
                            <h5 class="card-title">All Department</h5>

                            @if($user_data->role =='admin')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Add Amount
                                </button>





                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addyear">
                                    Add Department
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="addyear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{route('admin.add.dep')}}" method="POST">
                                                {{csrf_field()}}
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Department</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Add Department</h5>
                                                    <hr>
                                                    <form action="">
                                                        <br>
                                                        <span>Department Name:</span>
                                                        <input type="text" name="name" class="form-control" placeholder="Enter Department name">
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


                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Total Members</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                    </thead>
                                    <tbody>




                                @foreach($all_dep as $dep)
                                        <tr>
                                            <th>
                                                    {{$dep->name}}
                                            </th>
                                            <td>


                                                {{ \App\Models\User::where('Department',$dep->id)->count()}}


                                            </td>
                                            <td>


                                                    <span class="badge bg-danger">Due</span>

                                                    <span class="badge bg-success">Paid</span>



                                            </td>
                                            @if($user_data->role =='admin' or $user_data->role == 'cashier')

                                                <td>
                                          <span>



                                              {{--                                              <a class="btn btn-success" href="">Approve</a>--}}
                                              {{--                                              <a class="btn btn-warning" href="">Pending</a>--}}
                                              {{--                                              <a class="btn btn-danger" href="">Reject</a>--}}
                                          </span>
                                                </td>
                                            @endif
                                        </tr>
                                @endforeach
                                    </tbody>
                                </table>
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
