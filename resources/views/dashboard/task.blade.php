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




                                <div class="table-responsive">
                                    <div id="DOM_CONTAINER" style="position:fixed;top:0;left:0;right:0;bottom:0;overflow:hidden;z-index:0;">
                                        <div class="kr-view print-hide" style="width: 100%; height: 100%;">
                                            <div class="kr-view fd100">
                                                <div class="kr-view" style="width: 100%; height: 100%;">
                                                    <div class="kr-view fd100">
                                                        <div class="kr-view page-head">
                                                            <div class="kr-view page-head-left">
                                                                <div class="kr-view">
                                                                    <div class="kr-view w24"></div>
                                                                    <div class="kr-view br18">
                                                                        <div class="kr-view gr36">
                                                                            <div class="kr-view h36-br18">
                                                                                <div class="kr-view gray24-ml0"><i class="fa fa-home-alt"></i></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="kr-view w24"></div>
                                                                    <div class="kr-view w1h24"></div>
                                                                </div>
                                                                <div class="kr-view   mr-lf16">
                                                                    <div class="kr-view h34">
                                                                        <div class="kr-view" style="flex-grow: 1; flex-shrink: 1; align-items: center;">
                                                                            <div class="kr-view" style="width: 24px;height: 24px;border-radius: 100%;background-size: cover;background-repeat: no-repeat;background-image: url(&quot;https://www.meistertask.com/production/assets/a28d414b034083194f6b4c3a2fae878b.png&quot;);"></div>
                                                                            <div class="kr-text grf17">My first project</div>
                                                                            <i class="fal fa-chevron-down"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="kr-view">
                                                                    <div class="kr-view w1h24"></div>
                                                                    <div class="kr-view w24"></div>
                                                                    <div class="kr-view   br18">
                                                                        <div class="kr-view br18 imenu">
                                                                            <div class="kr-view gr36 dropdown" data-project-info="">
                                                                                <div class="kr-view h36-br18">
                                                                                    <div class="kr-view gray24"><i class="fal fa-info-circle"></i></div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="projectinfo" class="dropdown-menu carousel slide box" style="background: transparent; border: none; display: none;">
                                                                                <div class="carousel-inner">
                                                                                    <div class="carousel-item active">
                                                                                        <a class="dropdown-item fal fa-info-circle" href="javascript: void(0);" data-project-action="properties">Project Properties</a>
                                                                                        <a class="dropdown-item imore fal fa-image" href="#projectinfo" data-slide-to="1">Change Background</a>
                                                                                        <a class="dropdown-item fal fa-user-plus" href="javascript: void(0);">Invite Person...</a>
                                                                                        <div class="dropdown-divider"></div>
                                                                                        <a class="dropdown-item fal fa-archive" href="javascript: void(0);">Archived Tasks</a>
                                                                                        <a class="dropdown-item fal fa-trash-alt" href="javascript: void(0);">Trashed Tasks</a>
                                                                                        <div class="dropdown-divider"></div>
                                                                                        <a class="dropdown-item imore fal fa-ellipsis-h" href="javascript: void(0);">More</a>
                                                                                    </div>
                                                                                    <div class="carousel-item">
                                                                                        <a class="dropdown-item iback" href="#projectinfo" data-slide-to="0">Backgrounds</a>
                                                                                        <div class="dropdown-item trans">
                                                                                            <div class="row col-sm-12">Colors</div>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4 p-1">
                                                                                                    <div class="fl-item bg-cloud-sky active"></div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 p-1">
                                                                                                    <div class="fl-item bg-grey-joy"></div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 p-1">
                                                                                                    <div class="fl-item bg-darko"></div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 p-1">
                                                                                                    <div class="fl-item bg-pinky"></div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 p-1">
                                                                                                    <div class="fl-item bg-purple-rain"></div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 p-1">
                                                                                                    <div class="fl-item bg-true-blue"></div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 p-1">
                                                                                                    <div class="fl-item bg-toothpatse"></div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 p-1">
                                                                                                    <div class="fl-item bg-minty"></div>
                                                                                                </div>
                                                                                                <div class="col-sm-4 p-1">
                                                                                                    <div class="fl-item bg-rainbow">
                                                                                                        <div class="kr-view col-sm-4" style="background-color: rgb(161, 121, 242);flex-grow: 1;height: 100%;float: left;border-bottom-left-radius: 5px;border-top-left-radius: 5px;"></div>
                                                                                                        <div class="kr-view col-sm-4" style="background-color: rgb(64, 112, 255);flex-grow: 1;height: 100%;float: left;"></div>
                                                                                                        <div class="kr-view col-sm-4" style="background-color: rgb(43, 217, 217);flex-grow: 1;height: 100%;border-top-right-radius: 5px;border-bottom-right-radius: 5px;"></div>
                                                                                                        <div class="kr-view" style="position: absolute; top: 0px; left: 0px; right: 0px; height: 10px; background-color: rgba(255, 255, 255, 0.3);"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="kr-view page-head-right">
                                                                <div class="kr-view">
                                                                    <div class="kr-view w24"></div>
                                                                    <div class="kr-view br7">
                                                                        <div class="kr-text h36-wt">Share</div>
                                                                    </div>
                                                                </div>
                                                                <div class="kr-view w24"></div>
                                                                <div class="kr-view br18">
                                                                    <div class="kr-view gr36" data-user-action="create-task">
                                                                        <div class="kr-view h36-br18">
                                                                            <div class="kr-view gray24-ml0"><i class="fal fa-plus-circle"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="kr-view">
                                                                    <div class="kr-view w24"></div>
                                                                    <div class="kr-view w1h24"></div>
                                                                    <div class="kr-view w24"></div>
                                                                </div>
                                                                <div class="kr-view">
                                                                    <div class="kr-view br18">
                                                                        <div class="kr-view gr36">
                                                                            <div class="kr-view h36-br18">
                                                                                <div class="kr-view gray24-ml0">
                                                                                    <svg width="100%" height="100%" viewBox="0 0 24 24">
                                                                                        <path fill="currentColor" fill-rule="evenodd" d="M11 16a3 3 0 0 1 0 6H7a3 3 0 0 1 0-6h4zm0 2H7a1 1 0 0 0-.117 1.993L7 20h4a1 1 0 0 0 0-2zm10-9a3 3 0 0 1 0 6h-9a3 3 0 0 1 0-6h9zm-6-7a3 3 0 0 1 0 6H4a3 3 0 1 1 0-6h11zm0 2H4a1 1 0 0 0-.117 1.993L4 6h11a1 1 0 0 0 0-2z"></path>
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="kr-view">
                                                                        <div class="kr-view w24"></div>
                                                                        <div class="kr-view w1h24"></div>
                                                                        <div class="kr-view w24"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="kr-view   br18">
                                                                    <div class="kr-view br18">
                                                                        <div class="kr-view gr36" data-user-action="tasks" data-placement="bottom" data-toggle="popover" data-container="body" data-html="true" data-original-title="" title="">
                                                                            <div class="kr-view h36-br18">
                                                                                <div class="kr-view gray24"><i class="fal fa-check-circle"></i></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="kr-view w24"></div>
                                                                <div class="kr-view   br18">
                                                                    <div class="kr-view br18">
                                                                        <div class="kr-view gr36" data-user-action="notifications">
                                                                            <div class="kr-view h36-br18">
                                                                                <div class="kr-view">
                                                                                    <div class="kr-view gray24"><i class="fal fa-bell"></i></div>
                                                                                    <div class="kr-view" style="position: absolute; cursor: pointer; right: -12px; top: -12px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="kr-view">
                                                                    <div class="kr-view w24"></div>
                                                                    <div class="kr-view w1h24"></div>
                                                                    <div class="kr-view w24"></div>
                                                                </div>
                                                                <div class="kr-view br18">
                                                                    <div class="kr-view gr36" data-user-action="search">
                                                                        <div class="kr-view h36-br18">
                                                                            <div class="kr-view gray24-ml0"><i class="fal fa-search"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="kr-view w80-c">
                                                                    <div class="kr-view">
                                                                        <div class="kr-view p8-cp" data-user-action="user-info">
                                                                            <div class="kr-view wh32-brf100">
                                                                                <div class="kr-view t0-l0">
                                                                                    <div class="kr-view hf100-sxy">
                                                                                        <div class="kr-text">MH</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kr-view page-content">
                                                            <div class="kr-view i080">
                                                                <div class="  h-f100">
                                                                    <div class=" i0-fl-dr-row">
                                                                        <div class=" flg1-fls0">
                                                                            <div class="kr-view hf100-mwf100" id="sections">
                                                                                <div class="kr-view section-c-item" draggable="false">
                                                                                    <div class="kr-view hf100-w320">
                                                                                        <div class="kr-view bgc-trans">
                                                                                            <div class="kr-view h60-aic section-c-item-header" style="background-color: rgb(48, 191, 191);">
                                                                                                <div class="kr-view fl-dr-row-hf100">
                                                                                                    <div class="kr-view fl-dr-row-hf100">
                                                                                                        <div class="kr-view wh24-icon">
                                                                                                            <svg width="100%" height="100%" viewBox="0 0 25 25">
                                                                                                                <g fill="none" fill-rule="evenodd">
                                                                                                                    <path fill="currentColor" d="M18 10.417C18 7.425 15.538 5 12.5 5S7 7.425 7 10.417c0 2.8 3 4.433 3 5.583v1h5v-1c0-1.153 3-2.783 3-5.583z"></path>
                                                                                                                    <path stroke="currentColor" stroke-linecap="round" d="M14.5 18v1.75c0 .966-.79 1.75-1.743 1.75h-.514a1.742 1.742 0 0 1-1.743-1.75V18"></path>
                                                                                                                    <path fill="currentColor" d="M11 21h3v1c0 .552-.443 1-.999 1h-1.002A.997.997 0 0 1 11 22v-1z"></path>
                                                                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M12.5 1.5v2M3.5 10.5h2M19.5 10.5h2M18 6l1.5-1.5M18 15l1.5 1.5M7 6L5.5 4.5M7 15l-1.5 1.5"></path>
                                                                                                                </g>
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                        <div class="kr-text fl10f0">Open</div>
                                                                                                        <div class="kr-view">
                                                                                                            <div class="kr-view ai-c">
                                                                                                                <div class="kr-view w30-hf100-c">
                                                                                                                    <div class="kr-view" style="color: rgb(255, 255, 255); width: 16px; height: 16px;"><i class="fa fa-angle-down"></i></div>
                                                                                                                </div>
                                                                                                                <div class="kr-view p310-br12">
                                                                                                                    <div class="kr-text p310-br12-text">8</div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="kr-view tf50-lf50"></div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="kr-view section-c-item" draggable="false">
                                                                                    <div class="kr-view hf100-w320">
                                                                                        <div class="kr-view bg-bl-whf100">
                                                                                            <div class="kr-view h60-aic section-c-item-header" style="background-color: rgb(0, 170, 255);">
                                                                                                <div class="kr-view fl-dr-row-hf100">
                                                                                                    <div class="kr-view fl-dr-row-hf100">
                                                                                                        <div class="kr-view wh24-icon">
                                                                                                            <svg width="100%" height="100%" viewBox="0 0 25 25">
                                                                                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M2.5 12.5h4l4-7 4 14 4-7h4"></path>
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                        <div class="kr-text fl10f0">In Progress</div>
                                                                                                        <div class="kr-view">
                                                                                                            <div class="kr-view ai-c">
                                                                                                                <div class="kr-view w30-hf100-c" data-user-action="section">
                                                                                                                    <div class="kr-view" style="color: rgb(255, 255, 255); width: 16px; height: 16px;"><i class="fa fa-angle-down"></i></div>
                                                                                                                </div>
                                                                                                                <div class="kr-view p310-br12">
                                                                                                                    <div class="kr-text p310-br12-text">1</div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="kr-view w320">
                                                                                                <div class="h-f100">
                                                                                                    <div class=" infl-col">

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="kr-view section-c-item">
                                                                                    <div class="kr-view hf100-w320">
                                                                                        <div class="kr-view bgc-trans">
                                                                                            <div class="kr-view h60-aic section-c-item-header" style="background-color: rgb(217, 54, 81);">
                                                                                                <div class="kr-view fl-dr-row-hf100">
                                                                                                    <div class="kr-view fl-dr-row-hf100">
                                                                                                        <div class="kr-view wh24-icon">
                                                                                                            <svg width="100%" height="100%" viewBox="0 0 25 25">
                                                                                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M2.5 12.5h4l4-7 4 14 4-7h4"></path>
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                        <div class="kr-text fl10f0">ts</div>
                                                                                                        <div class="kr-view">
                                                                                                            <div class="kr-view ai-c">
                                                                                                                <div class="kr-view w30-hf100-c">
                                                                                                                    <div class="kr-view" style="color: rgb(255, 255, 255); width: 16px; height: 16px;"><i class="fa fa-angle-down"></i></div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="kr-view l0-h28">
                                                                                                    <div class="kr-view">
                                                                                                        <div class="kr-view w28">
                                                                                                            <div class="kr-view bgc-w-brf100"></div>
                                                                                                            <div class="kr-view wh16-bvh"><i class="fal fa-plus" style="padding: 0 2px;"></i></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="kr-view flg1-usn">
                                                                                                <div class="kr-view wf100-tcalc">
                                                                                                    <div class="kr-view" style="color: rgb(138, 148, 153); margin-bottom: 10px; width: 64px; height: 64px; font-size: 64px;"><i class="fal fa-check-circle"></i></div>
                                                                                                    <div class="kr-text" style="color: rgb(138, 148, 153); cursor: default; font-size: 17px; font-weight: 500; line-height: 25px; letter-spacing: normal; margin-bottom: 4px; flex-shrink: 0;">No Tasks</div>
                                                                                                    <div class="kr-text" style="color: rgb(138, 148, 153); font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; text-align: center; margin-top: 5px; margin-bottom: 10px; width: 200px;">Drag tasks here<br>or click + to add new tasks.</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="kr-view section-c-item">
                                                                                    <div class="kr-view hf100-w320">
                                                                                        <div class="kr-view bg-bl-whf100">
                                                                                            <div class="kr-view h60-aic section-c-item-header" style="background-color: rgb(143, 126, 230);">
                                                                                                <div class="kr-view fl-dr-row-hf100">
                                                                                                    <div class="kr-view fl-dr-row-hf100">
                                                                                                        <div class="kr-view wh24-icon"><i class="fa fa-check-circle"></i></div>
                                                                                                        <div class="kr-text fl10f0">Done</div>
                                                                                                        <div class="kr-view">
                                                                                                            <div class="kr-view ai-c">
                                                                                                                <div class="kr-view w30-hf100-c">
                                                                                                                    <div class="kr-view" style="color: rgb(255, 255, 255); width: 16px; height: 16px;"><i class="fa fa-angle-down"></i></div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="kr-view l0-h28">
                                                                                                    <div class="kr-view">
                                                                                                        <div class="kr-view w28">
                                                                                                            <div class="kr-view bgc-w-brf100"></div>
                                                                                                            <div class="kr-view wh16-bvh"><i class="fal fa-plus" style="padding: 0 2px;"></i></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="kr-view flg1-usn">
                                                                                                <div class="kr-view wf100-tcalc">
                                                                                                    <div class="kr-view" style="color: rgb(138, 148, 153); margin-bottom: 10px; width: 64px; height: 64px; font-size: 64px;"><i class="fal fa-check-circle"></i></div>
                                                                                                    <div class="kr-text" style="color: rgb(138, 148, 153); cursor: default; font-size: 17px; font-weight: 500; line-height: 25px; letter-spacing: normal; margin-bottom: 4px; flex-shrink: 0;">No Tasks</div>
                                                                                                    <div class="kr-text" style="color: rgb(138, 148, 153); font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; text-align: center; margin-top: 5px; margin-bottom: 10px; width: 200px;">Drag tasks here<br>or click + to add new tasks.</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="kr-view bgc-t-w320">
                                                                                    <div class="kr-view h60-pl14-pr22">
                                                                                        <div class="kr-view mlr12-wh16">
                                                                                            <svg width="100%" height="100%" viewBox="0 0 16 16">
                                                                                                <path fill="currentColor" fill-rule="evenodd" d="M8 2c.552 0 1 .456 1 1.002V7h3.998c.514 0 .937.383.995.883L14 8c0 .552-.456 1-1.002 1H9v3.998a.999.999 0 0 1-.883.995L8 14c-.552 0-1-.456-1-1.002V9H3.002a.999.999 0 1 1 0-2H7V3.002c0-.514.383-.937.883-.995L8 2z"></path>
                                                                                            </svg>
                                                                                        </div>
                                                                                        <div class="kr-text" style="color: rgb(0, 170, 255); font-size: 15px; line-height: 22px; font-weight: 500; letter-spacing: normal;">Add Section</div>
                                                                                    </div>
                                                                                    <div class="kr-view flg1-usn">
                                                                                        <div class="kr-view wf100-tcalc">
                                                                                            <div class="kr-view" style="margin-bottom: 12px;">
                                                                                                <div class="kr-view wh64-mlr6">
                                                                                                    <svg width="100%" height="100%" viewBox="0 0 100 100">
                                                                                                        <defs>
                                                                                                            <circle id="a3680761921" cx="50" cy="50" r="50"></circle>
                                                                                                            <circle id="c3680761921" cx="33" cy="44" r="32"></circle>
                                                                                                            <filter id="d3680761921" width="109.4%" height="109.4%" x="-4.7%" y="-4.7%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.501960784 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <path id="e3680761921" d="M8 38c0-2.761 2.246-5 5-5h40c2.761 0 5 2.244 5 5 0 2.761-2.246 5-5 5H13c-2.761 0-5-2.244-5-5z"></path>
                                                                                                            <filter id="f3680761921" width="112%" height="160%" x="-6%" y="-30%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.6 0 0 0 0 0 0 0 0 0 0 0 0 0 0.4 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <path id="g3680761921" d="M43.822 22.176C41.712 21.526 40 19.21 40 17.001V0H26v17c0 2.21-1.706 4.525-3.822 5.176L0 29v16h66V29l-22.178-6.824z"></path>
                                                                                                            <filter id="h3680761921" width="109.1%" height="113.3%" x="-4.5%" y="-6.7%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.6 0 0 0 0 0 0 0 0 0 0 0 0 0 0.4 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <path id="i3680761921" d="M44.803 22.268c-2.1-.7-2.53.005-.98 1.556L65 45V29l-20.197-6.732z"></path>
                                                                                                            <path id="k3680761921" d="M8.893 25.11C8.4 11.796 18.803 1 32.121 1h1.758C47.2 1 57.6 11.788 57.107 25.11L57 28l-2.603 17.177c-1.324 8.739-9.122 18.3-17.414 21.356l-2.11.777c-1.034.38-2.714.38-3.747 0l-2.109-.777c-8.294-3.056-16.09-12.612-17.414-21.356L9 28l-.107-2.89z"></path>
                                                                                                            <filter id="l3680761921" width="112.4%" height="109%" x="-6.2%" y="-4.5%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.6 0 0 0 0 0 0 0 0 0 0 0 0 0 0.4 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <path id="m3680761921" d="M58 34.924c-.494.05-.994.076-1.5.076-6.873 0-12.765-4.745-15.246-11.492-6.6 6.404-15.703 10.363-25.754 10.363-2.57 0-5.08-.259-7.5-.752v-8.114C8 11.195 19.19 0 33 0c13.807 0 25 11.2 25 25.005v9.92z"></path>
                                                                                                            <filter id="n3680761921" width="112%" height="117.1%" x="-6%" y="-8.6%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.501960784 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                        </defs>
                                                                                                        <g fill="none" fill-rule="evenodd">
                                                                                                            <mask id="b3680761921" fill="#fff">
                                                                                                                <use xlink:href="#a3680761921"></use>
                                                                                                            </mask>
                                                                                                            <use fill="#94F7C6" xlink:href="#a3680761921"></use>
                                                                                                            <g mask="url(#b3680761921)">
                                                                                                                <g transform="translate(17 6)">
                                                                                                                    <use fill="#1E2326" xlink:href="#c3680761921"></use>
                                                                                                                    <use fill="#000" filter="url(#d3680761921)" xlink:href="#c3680761921"></use>
                                                                                                                    <use stroke="#000" xlink:href="#c3680761921"></use>
                                                                                                                    <use fill="#FFF0E0" xlink:href="#e3680761921"></use>
                                                                                                                    <use fill="#000" filter="url(#f3680761921)" xlink:href="#e3680761921"></use>
                                                                                                                    <use stroke="#000" xlink:href="#e3680761921"></use>
                                                                                                                    <g transform="translate(0 54)">
                                                                                                                        <use fill="#FFF0E0" xlink:href="#g3680761921"></use>
                                                                                                                        <use fill="#000" filter="url(#h3680761921)" xlink:href="#g3680761921"></use>
                                                                                                                        <use stroke="#1E2326" xlink:href="#g3680761921"></use>
                                                                                                                        <mask id="j3680761921" fill="#fff">
                                                                                                                            <use xlink:href="#i3680761921"></use>
                                                                                                                        </mask>
                                                                                                                        <use fill="#C40" opacity=".12" xlink:href="#i3680761921"></use>
                                                                                                                        <path fill="#C40" d="M8.893-25.89C8.4-39.204 18.803-50 32.121-50h1.758C47.2-50 57.6-39.212 57.107-25.89L57-23 54.397-5.823c-1.324 8.739-9.122 18.3-17.414 21.356l-2.11.777c-1.034.38-2.714.38-3.747 0l-2.109-.777C20.723 12.477 12.927 2.92 11.603-5.823L9-23l-.107-2.89z" mask="url(#j3680761921)" opacity=".12"></path>
                                                                                                                    </g>
                                                                                                                    <path fill="#FE4D6B" stroke="#B8374D" stroke-linecap="round" stroke-linejoin="round" d="M14 77l2-.5s-2.5 22 17 22S50 77 50 77l2 .5 5 22.5H9l5-23z"></path>
                                                                                                                    <path fill="#C40" d="M8.893 29.11C8.4 15.796 18.803 5 32.121 5h1.758C47.2 5 57.6 15.788 57.107 29.11L57 32l-2.603 17.177c-1.324 8.739-9.122 18.3-17.414 21.356l-2.11.777c-1.034.38-2.714.38-3.747 0l-2.109-.777c-8.294-3.056-16.09-12.612-17.414-21.356L9 32l-.107-2.89z" opacity=".12"></path>
                                                                                                                    <use fill="#FFF0E0" xlink:href="#k3680761921"></use>
                                                                                                                    <use fill="#000" filter="url(#l3680761921)" xlink:href="#k3680761921"></use>
                                                                                                                    <use stroke="#1E2326" xlink:href="#k3680761921"></use>
                                                                                                                    <path stroke="#71432C" d="M31 48c.453.492 1 1 2 1s1.547-.508 2-1" opacity=".2"></path>
                                                                                                                    <path fill="#C40" d="M57.032 22.092C55.987 10.196 46.178 1 33.879 1H32.12c-.143 0-.285.001-.428.004 6.463.119 12.139 3.074 15.87 7.676A24.88 24.88 0 0 0 33 4C19.19 4 8 15.195 8 29.005v8.114c2.42.493 4.93.752 7.5.752 10.051 0 19.153-3.959 25.754-10.363 1.742 4.736 5.164 8.486 9.427 10.3l-.998 7.344c-1.188 8.753-8.785 18.574-16.956 21.933l-.372.153a3.929 3.929 0 0 1-.74.214c1.02.23 2.375.183 3.259-.142l2.109-.777c8.292-3.055 16.09-12.617 17.414-21.356l.943-6.222a14.836 14.836 0 0 0 2.66-.03v-9.92c0-2.398-.338-4.717-.968-6.913z" opacity=".12"></path>
                                                                                                                    <g>
                                                                                                                        <use fill="#1E2326" xlink:href="#m3680761921"></use>
                                                                                                                        <use fill="#000" filter="url(#n3680761921)" xlink:href="#m3680761921"></use>
                                                                                                                        <use stroke="#000" xlink:href="#m3680761921"></use>
                                                                                                                    </g>
                                                                                                                    <circle cx="21" cy="50" r="3" fill="#FE4D6B" opacity=".1"></circle>
                                                                                                                    <circle cx="45" cy="50" r="3" fill="#FE4D6B" opacity=".1"></circle>
                                                                                                                    <path fill="#FFF" stroke="#D47F8D" stroke-linecap="round" stroke-linejoin="round" d="M26 55c1.99 2.523 4.402 4 7 4s5.01-1.477 7-4H26z"></path>
                                                                                                                    <g>
                                                                                                                        <g transform="translate(16 37)">
                                                                                                                            <circle cx="5" cy="3" r="3" fill="#1E2326"></circle>
                                                                                                                            <path fill="#1E2326" d="M3 1.333L0 0l3 4"></path>
                                                                                                                            <circle cx="4" cy="2" r="1" fill="#FFF"></circle>
                                                                                                                        </g>
                                                                                                                        <g transform="translate(42 37)">
                                                                                                                            <circle cx="3" cy="3" r="3" fill="#1E2326"></circle>
                                                                                                                            <path fill="#1E2326" d="M5 1.333L8 0 5 4"></path>
                                                                                                                            <circle cx="2" cy="2" r="1" fill="#FFF"></circle>
                                                                                                                        </g>
                                                                                                                    </g>
                                                                                                                </g>
                                                                                                            </g>
                                                                                                        </g>
                                                                                                    </svg>
                                                                                                </div>
                                                                                                <div class="kr-view wh64-mlr6">
                                                                                                    <svg width="100%" height="100%" viewBox="0 0 100 100">
                                                                                                        <defs>
                                                                                                            <circle id="a3974951203" cx="50" cy="50" r="50"></circle>
                                                                                                            <circle id="c3974951203" cx="38" cy="12" r="12"></circle>
                                                                                                            <filter id="d3974951203" width="125%" height="125%" x="-12.5%" y="-12.5%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.501960784 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <rect id="e3974951203" width="52" height="10" x="13" y="37" rx="5"></rect>
                                                                                                            <filter id="f3974951203" width="111.5%" height="160%" x="-5.8%" y="-30%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.4 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <path id="g3974951203" d="M55.87 19.258c-3.242-.695-5.87-3.953-5.87-7.252V0H28v12.006c0 3.31-2.634 6.558-5.87 7.252L0 24v14h78V24l-22.13-4.742z"></path>
                                                                                                            <filter id="h3974951203" width="107.7%" height="115.8%" x="-3.8%" y="-7.9%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.4 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <path id="j3974951203" d="M1 23l21.059-5.494c1.072-.28 2.32.303 2.843 1.274 0 0 3.598 9.22 14.098 9.22s14.105-9.233 14.105-9.233c.494-.976 1.769-1.54 2.836-1.26L77 23v16H1V23z"></path>
                                                                                                            <filter id="k3974951203" width="107.9%" height="127.8%" x="-3.9%" y="-13.9%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.501960784 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <path id="m3974951203" d="M15.388 27.591C14.62 14.562 24.573 4 37.628 4h2.745c13.049 0 23.005 10.571 22.24 23.591L62 38l-1.965 15.069c-.572 4.38-4.237 9.532-8.199 11.513L44.36 68.32c-2.96 1.48-7.763 1.479-10.72 0l-7.476-3.738c-3.957-1.978-7.626-7.125-8.199-11.513L16 38l-.612-10.409z"></path>
                                                                                                            <filter id="n3974951203" width="112.7%" height="109.2%" x="-6.3%" y="-4.6%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.4 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <path id="o3974951203" d="M12.796 19.625C17.348 10.682 27.014 4 38.5 4c14.924 0 27.214 11.366 28.822 24.978.734 2.154 1.96 4.736 3.678 5.022-.39 1.561-2.517 2.176-4.48 2.406C65.442 39.37 63.519 42.797 61 45c2-14.5-8.5-28-16-19s-16.316 6.601-20.5 2.5c-3.76 6.503-8 9.5-8 15C12 39.5 10 33.997 10 31c0-2.359.354-4.689 1.02-6.933C10.015 23.565 9.223 22.893 9 22c1.6-.267 2.917-1.388 3.796-2.375z"></path>
                                                                                                            <filter id="p3974951203" width="110.1%" height="116.5%" x="-5%" y="-7.3%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.501960784 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                        </defs>
                                                                                                        <g fill="none" fill-rule="evenodd">
                                                                                                            <mask id="b3974951203" fill="#fff">
                                                                                                                <use xlink:href="#a3974951203"></use>
                                                                                                            </mask>
                                                                                                            <use fill="#B8E65C" xlink:href="#a3974951203"></use>
                                                                                                            <g mask="url(#b3974951203)">
                                                                                                                <g transform="translate(11 3)">
                                                                                                                    <use fill="#664738" xlink:href="#c3974951203"></use>
                                                                                                                    <use fill="#000" filter="url(#d3974951203)" xlink:href="#c3974951203"></use>
                                                                                                                    <use stroke="#33201A" xlink:href="#c3974951203"></use>
                                                                                                                </g>
                                                                                                                <g transform="translate(11 3)">
                                                                                                                    <use fill="#F0C295" xlink:href="#e3974951203"></use>
                                                                                                                    <use fill="#000" filter="url(#f3974951203)" xlink:href="#e3974951203"></use>
                                                                                                                    <use stroke="#643" xlink:href="#e3974951203"></use>
                                                                                                                </g>
                                                                                                                <g transform="translate(11 63)">
                                                                                                                    <mask id="i3974951203" fill="#fff">
                                                                                                                        <use xlink:href="#g3974951203"></use>
                                                                                                                    </mask>
                                                                                                                    <use fill="#F0C295" xlink:href="#g3974951203"></use>
                                                                                                                    <use fill="#000" filter="url(#h3974951203)" xlink:href="#g3974951203"></use>
                                                                                                                    <use stroke="#643" xlink:href="#g3974951203"></use>
                                                                                                                    <path fill="#C40" d="M14-28c0-13.807 11.19-25 25-25 13.807 0 25 11.192 25 25v9L60.912-4.794C59.856.063 55.402 5.8 50.952 8.024L44.36 11.32c-2.96 1.48-7.763 1.479-10.72 0l-6.592-3.296c-4.445-2.222-8.902-7.952-9.96-12.818L14-19v-9z" mask="url(#i3974951203)" opacity=".12"></path>
                                                                                                                    <mask id="l3974951203" fill="#fff">
                                                                                                                        <use xlink:href="#j3974951203"></use>
                                                                                                                    </mask>
                                                                                                                    <g>
                                                                                                                        <use fill="#50585C" xlink:href="#j3974951203"></use>
                                                                                                                        <use fill="#000" filter="url(#k3974951203)" xlink:href="#j3974951203"></use>
                                                                                                                        <use stroke="#323B40" xlink:href="#j3974951203"></use>
                                                                                                                    </g>
                                                                                                                    <path fill="#323B40" d="M39 28c10.5 0 14.105-9.233 14.105-9.233.494-.976 1.769-1.54 2.836-1.26L77 23v16S28.5 28 39 28z" mask="url(#l3974951203)" opacity=".2"></path>
                                                                                                                    <circle cx="39" cy="12" r="19" stroke="#323B40" mask="url(#l3974951203)"></circle>
                                                                                                                </g>
                                                                                                                <g transform="translate(11 3)">
                                                                                                                    <use fill="#F0C295" xlink:href="#m3974951203"></use>
                                                                                                                    <use fill="#000" filter="url(#n3974951203)" xlink:href="#m3974951203"></use>
                                                                                                                    <use stroke="#643" xlink:href="#m3974951203"></use>
                                                                                                                </g>
                                                                                                                <path stroke="#71432C" d="M48 52c.364.492.95.81 1.608.81.66 0 1.244-.318 1.609-.81" opacity=".2"></path>
                                                                                                                <path fill="#643" d="M42.286 62.143l-8.494-4.247c-.99-.495-2.01-1.765-2.279-2.843l-4.82-19.284L27 41l1.836 14.075c.643 4.932 4.767 10.727 9.212 12.95l6.592 3.295c2.957 1.479 7.76 1.48 10.72 0l6.592-3.296c4.45-2.225 8.57-8.02 9.212-12.95L73 41l.308-5.23-4.821 19.283c-.27 1.075-1.284 2.345-2.279 2.843l-8.494 4.247-.448-1.346C56.565 58.694 54.21 57 52.004 57h-4.008c-2.2 0-4.563 1.7-5.262 3.797l-.448 1.346z" opacity=".2"></path>
                                                                                                                <g transform="translate(11 3)">
                                                                                                                    <use fill="#664738" xlink:href="#o3974951203"></use>
                                                                                                                    <use fill="#000" filter="url(#p3974951203)" xlink:href="#o3974951203"></use>
                                                                                                                    <use stroke="#33201A" xlink:href="#o3974951203"></use>
                                                                                                                </g>
                                                                                                                <g transform="translate(36 41)">
                                                                                                                    <circle cx="3" cy="3" r="3" fill="#33201A" opacity=".89"></circle>
                                                                                                                    <circle cx="25" cy="3" r="3" fill="#33201A" opacity=".89"></circle>
                                                                                                                    <circle cx="2" cy="2" r="1" fill="#FFF"></circle>
                                                                                                                    <circle cx="24" cy="2" r="1" fill="#FFF"></circle>
                                                                                                                </g>
                                                                                                                <g fill="#23292B">
                                                                                                                    <path d="M52.894 41.884c.236-1.578 4.518-2.224 8.503-2.427 3.985-.203 7.795.364 8.15 1.577.354 1.214-.119 5.46-1.536 8.009-1.417 2.548-9.448 2.433-11.456 1.341-2.008-1.092-3.898-6.923-3.661-8.5zm-5.459 0c.237 1.577-1.653 7.408-3.66 8.5-2.009 1.092-10.04 1.207-11.457-1.341-1.417-2.548-1.89-6.795-1.535-8.009.354-1.213 4.164-1.78 8.149-1.577 3.985.203 8.267.85 8.503 2.427z" opacity=".2"></path>
                                                                                                                    <path d="M51.16 40.677c.487-.243.854-1.214 1.83-1.578.976-.364 3.332-.996 8.542-1.092 5.21-.097 9.816.845 9.816.845.375.07.666.452.652.837l-.069 1.854c-.015.393-.224.957-.469 1.26l-.091.114a3.31 3.31 0 0 0-.573 1.246s-.846 4.886-1.822 5.978c-.976 1.092-3.197 1.643-6.59 1.82-3.392.178-6.101-.242-7.566-1.577-1.464-1.335-3.055-5.91-3.417-6.431-.134-.194-.769-.406-1.403-.406s-1.269.212-1.403.406c-.362.52-1.953 5.096-3.417 6.431-1.465 1.335-4.174 1.755-7.566 1.577-3.393-.177-5.614-.728-6.59-1.82s-1.822-5.978-1.822-5.978a3.321 3.321 0 0 0-.573-1.246l-.091-.113c-.244-.304-.455-.876-.469-1.26l-.07-1.855a.849.849 0 0 1 .677-.841s4.582-.938 9.792-.841c5.21.096 7.566.728 8.542 1.092.976.364 1.343 1.335 1.83 1.578.396.196 1.924.196 2.32 0zm1.871 1.042c-.236 1.577 1.654 6.845 3.661 7.937 2.008 1.092 9.902 1.517 11.319-1.031 1.417-2.548 1.89-6.377 1.535-7.59-.354-1.214-4.164-1.781-8.149-1.578-3.985.203-8.13.684-8.366 2.262zm-5.968 0c-.237-1.578-4.146-2.059-8.131-2.262-3.985-.203-7.795.364-8.15 1.577-.354 1.214.119 5.043 1.536 7.591s9.075 2.123 11.083 1.031c2.008-1.092 3.898-6.36 3.661-7.937z"></path>
                                                                                                                </g>
                                                                                                                <path stroke="#664637" stroke-linecap="round" stroke-linejoin="round" d="M44.643 60.72c1.523 1.047 3.369 1.66 5.357 1.66s3.834-.613 5.357-1.66" opacity=".4"></path>
                                                                                                            </g>
                                                                                                        </g>
                                                                                                    </svg>
                                                                                                </div>
                                                                                                <div class="kr-view wh64-mlr6">
                                                                                                    <svg width="100%" height="100%" viewBox="0 0 100 100">
                                                                                                        <defs>
                                                                                                            <circle id="a2656457667" cx="50" cy="50" r="50"></circle>
                                                                                                            <path id="c2656457667" d="M12.03 26.16c9.414-16.96 45.347-18.96 55.87 0C78.426 45.12 59.904 98 39.967 98 20.028 98 2.617 43.12 12.03 26.16z"></path>
                                                                                                            <filter id="d2656457667" width="109.7%" height="107%" x="-4.9%" y="-3.5%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.501960784 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <rect id="e2656457667" width="56" height="12" x="12" y="33" rx="6"></rect>
                                                                                                            <filter id="f2656457667" width="110.7%" height="150%" x="-5.4%" y="-25%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.4 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <path id="g2656457667" d="M44.787 69.095C43.247 68.49 42 66.647 42 65.007V50H28v15.007c0 1.653-1.257 3.487-2.787 4.088L0 79v9h70v-9l-25.213-9.905z"></path>
                                                                                                            <filter id="h2656457667" width="108.6%" height="115.8%" x="-4.3%" y="-7.9%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.4 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <path id="i2656457667" d="M6 84l51-10 17 6v16H6z"></path>
                                                                                                            <filter id="j2656457667" width="108.8%" height="127.3%" x="-4.4%" y="-13.6%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.501960784 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <path id="k2656457667" d="M15 26C15 12.193 26.19 1 40 1c13.807 0 25 11.202 25 25v16c0 8.836-6.65 18.66-14.85 21.94l-7.367 2.947c-1.537.615-4.023.617-5.566 0L29.85 63.94C21.648 60.66 15 50.836 15 42V26z"></path>
                                                                                                            <filter id="l2656457667" width="112%" height="109.4%" x="-6%" y="-4.5%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.4 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                            <path id="m2656457667" d="M41.86 30.583C47.988 34.41 55.538 36.721 64 35.5c-3.41-5-1.741-7.37-3.41-13.362C57.719 11.817 50.735 0 32 0 13.122 0 6.175 12 3.343 22.377 1.733 28.275 2.667 31.5 0 34.5c15.627 1.953 24.354-4.184 31.492-12.013.46 4.466 7.058 9.548 11.175 10.513-.487-.89-.738-1.694-.806-2.417z"></path>
                                                                                                            <filter id="n2656457667" width="109.4%" height="116.7%" x="-4.7%" y="-8.4%" filterUnits="objectBoundingBox">
                                                                                                                <feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="2.5"></feGaussianBlur>
                                                                                                                <feOffset in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset>
                                                                                                                <feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"></feComposite>
                                                                                                                <feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0.501960784 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"></feColorMatrix>
                                                                                                            </filter>
                                                                                                        </defs>
                                                                                                        <g fill="none" fill-rule="evenodd">
                                                                                                            <mask id="b2656457667" fill="#fff">
                                                                                                                <use xlink:href="#a2656457667"></use>
                                                                                                            </mask>
                                                                                                            <use fill="#94F7E7" xlink:href="#a2656457667"></use>
                                                                                                            <g mask="url(#b2656457667)">
                                                                                                                <g transform="translate(10 6)">
                                                                                                                    <use fill="#F0C060" xlink:href="#c2656457667"></use>
                                                                                                                    <use fill="#000" filter="url(#d2656457667)" xlink:href="#c2656457667"></use>
                                                                                                                    <use stroke="#BD9139" xlink:href="#c2656457667"></use>
                                                                                                                    <use fill="#FFE0C2" xlink:href="#e2656457667"></use>
                                                                                                                    <use fill="#000" filter="url(#f2656457667)" xlink:href="#e2656457667"></use>
                                                                                                                    <use stroke="#B3836B" xlink:href="#e2656457667"></use>
                                                                                                                    <circle cx="13.5" cy="43.5" r="1.5" fill="#FFF" stroke="#D4829F"></circle>
                                                                                                                    <circle cx="66.5" cy="43.5" r="1.5" fill="#FFF" stroke="#D4829F"></circle>
                                                                                                                    <g transform="translate(5 4)">
                                                                                                                        <use fill="#FFE0C2" xlink:href="#g2656457667"></use>
                                                                                                                        <use fill="#000" filter="url(#h2656457667)" xlink:href="#g2656457667"></use>
                                                                                                                        <use stroke="#B3836B" xlink:href="#g2656457667"></use>
                                                                                                                    </g>
                                                                                                                    <path fill="#C40" d="M15 29C15 15.193 26.19 4 40 4c13.807 0 25 11.202 25 25v16c0 8.836-6.65 18.66-14.85 21.94l-7.367 2.947c-1.537.615-4.023.617-5.566 0L29.85 66.94C21.648 63.66 15 53.836 15 45V29zM0 83l51-10 17 6v16H0" opacity=".12"></path>
                                                                                                                    <g stroke-linecap="round" stroke-linejoin="round">
                                                                                                                        <use fill="#FE4D6B" xlink:href="#i2656457667"></use>
                                                                                                                        <use fill="#000" filter="url(#j2656457667)" xlink:href="#i2656457667"></use>
                                                                                                                        <use stroke="#B8374D" xlink:href="#i2656457667"></use>
                                                                                                                    </g>
                                                                                                                    <path fill="#B8374D" d="M57 74l17 6v16" opacity=".2"></path>
                                                                                                                    <use fill="#FFE0C2" xlink:href="#k2656457667"></use>
                                                                                                                    <use fill="#000" filter="url(#l2656457667)" xlink:href="#k2656457667"></use>
                                                                                                                    <use stroke="#B3836B" xlink:href="#k2656457667"></use>
                                                                                                                    <path stroke="#71432C" d="M38 47c.364.492.95.81 1.608.81.66 0 1.244-.318 1.609-.81" opacity=".2"></path>
                                                                                                                    <path fill="#C40" d="M56.697 7.396A24.904 24.904 0 0 0 40 1c-.703 0-1.4.029-2.088.086a20.86 20.86 0 0 1 7.87 2.328A38.794 38.794 0 0 0 40 3C21.122 3 14.175 15 11.343 25.377 9.733 31.275 11.667 33.5 9 36.5c15.627 1.953 23-2.917 30.492-13.013.46 4.466 8.198 12.048 12.314 13.013-.486-.89-1.237-3.777-1.306-4.5 0 0 2.729 1.79 6.5 3.575v6.424c0 8.837-6.472 19.083-14.442 22.878l-3.856 1.836a5.01 5.01 0 0 1-.993.341c1.541.443 3.691.386 5.074-.167l7.367-2.947C58.35 60.66 65 50.836 65 42v-3.492c2.248.539 4.49.782 6.5.492-1.5-6-1.241-7.87-2.91-13.862-1.78-6.396-5.138-13.365-11.893-17.742z" opacity=".1"></path>
                                                                                                                    <g>
                                                                                                                        <g stroke-linecap="round" stroke-linejoin="round" transform="translate(8)">
                                                                                                                            <use fill="#FCD27E" xlink:href="#m2656457667"></use>
                                                                                                                            <use fill="#000" filter="url(#n2656457667)" xlink:href="#m2656457667"></use>
                                                                                                                            <use stroke="#BD9139" xlink:href="#m2656457667"></use>
                                                                                                                        </g>
                                                                                                                    </g>
                                                                                                                    <g>
                                                                                                                        <g transform="translate(24 36)">
                                                                                                                            <circle cx="4" cy="3" r="3" fill="#573A2B" opacity=".89"></circle>
                                                                                                                            <path fill="#694B3C" d="M3 2L0 1l3 3"></path>
                                                                                                                            <circle cx="3" cy="2" r="1" fill="#FFF"></circle>
                                                                                                                        </g>
                                                                                                                        <g transform="translate(49 36)">
                                                                                                                            <circle cx="3" cy="3" r="3" fill="#573A2B" opacity=".89"></circle>
                                                                                                                            <path fill="#694B3C" d="M4 2l3-1-3 3"></path>
                                                                                                                            <circle cx="2" cy="2" r="1" fill="#FFF"></circle>
                                                                                                                        </g>
                                                                                                                    </g>
                                                                                                                    <path fill="#F47EA8" d="M35 53.684c1.18-.783 8.68-.875 10 0 1.32.875-2.5 3.316-5 3.316s-6.18-2.533-5-3.316z"></path>
                                                                                                                    <path stroke="#97284F" stroke-linecap="round" stroke-linejoin="round" d="M32.643 52.72C34.735 54.157 37.269 55 40 55s5.265-.842 7.357-2.28" opacity=".2"></path>
                                                                                                                </g>
                                                                                                            </g>
                                                                                                        </g>
                                                                                                    </svg>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="kr-text" style="text-align: center; color: rgb(138, 148, 153); font-size: 15px; line-height: 22px; font-weight: 700; letter-spacing: normal; margin-bottom: 2px;">Add Members</div>
                                                                                            <div class="kr-text" style="text-align: center; color: rgb(138, 148, 153); font-size: 15px; line-height: 22px; font-weight: 400; letter-spacing: normal; max-width: 220px; margin-bottom: 20px;">Bring your productivity to the next level and collaborate with colleagues and friends.</div>
                                                                                            <a class="btn btn-light-blue no-shadow" href="javascript: void(0);" data-assigned-id="invite">Invite</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="kr-view"></div>
                                                            </div>
                                                            <div class="kr-view" style="top: 0px; right: 0px; bottom: 0px; z-index: 1; position: absolute;">
                                                                <div class="kr-view" style="height: 100%; position: relative;">
                                                                    <div class="kr-view selection-dark" style="width: 320px; background-color: rgb(51, 60, 64); border-right-width: 1px; border-color: black; flex-direction: column; position: absolute; top: 0px; left: 0px; bottom: 0px; transform: translateX(0px);" data-ref-form="filter-activities">
                                                                        <div class="kr-view" style="height: 60px; padding-left: 20px; padding-right: 20px; flex-direction: row; align-items: center; background-color: rgb(61, 71, 77); box-shadow: rgba(255, 255, 255, 0.1) -1px 1px 3px 0px;">
                                                                            <div class="kr-text" style="flex-grow: 1; color: white; font-size: 21px; font-weight: 500; line-height: 31px; letter-spacing: normal;">Filter</div>
                                                                            <div class="kr-view" style="cursor: pointer; margin-left: 24px; border-radius: 100%; color: rgb(255, 255, 255); width: 24px; height: 24px; font-size: 24px;"><i class="fal fa-heart-rate"></i></div>
                                                                            <div class="kr-view" style="cursor: pointer; margin-left: 24px; border-radius: 100%; color: rgb(0, 170, 255); width: 24px; height: 24px;font-size: 24px;"><i class="fal fa-filter"></i></div>
                                                                        </div>
                                                                        <div class="knightrider-scrollview-root " style="flex-grow: 1; flex-shrink: 1; width: 100%; overflow: hidden; position: relative; max-height: 100%; min-height: 0px; height: 100%;">
                                                                            <div class="knightrider-scrollview-scrollelement" style="inset: 0px; min-width: 0px; min-height: 0px; display: flex; overflow: hidden scroll; position: absolute; box-sizing: content-box; margin-bottom: 0px; margin-right: 0px; flex-direction: column;">
                                                                                <div class="knightrider-scrollview-contentelement" style="flex-grow: 1; flex-shrink: 0; min-height: 0px; width: 100%; box-sizing: border-box; padding-right: 0px; position: relative;">
                                                                                    <div class="kr-view" style="flex-direction: column; padding: 20px; flex-grow: 1; flex-shrink: 1;">
                                                                                        <div class="kr-text" style="background-color: rgb(61, 71, 77); height: 36px; border-width: 0px; border-color: rgb(0, 170, 255); border-style: solid; color: rgb(61, 71, 77); border-radius: 5px; padding: 0px 10px; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; resize: none; width: 100%; outline: 0px; display: flex;">
                                                                                            <div class="kr-view" style="margin-right: 8px; align-items: center;">
                                                                                                <div class="kr-view f24" style="width: 24px; height: 24px; color: white;"><i class="fal fa-search"></i></div>
                                                                                            </div>
                                                                                            <input placeholder="Search Tasks" maxlength="100" tabindex="0" class="kr-view mousetrap" data-gramm_editor="false" value="" style="color: white; background-color: rgb(61, 71, 77); font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; flex-grow: 1; flex-shrink: 1; width: 100%;">
                                                                                        </div>
                                                                                        <div class="kr-view" style="margin-left: 3px; margin-right: 3px; align-items: center; margin-top: 20px;">
                                                                                            <div class="kr-view" style="display: inline-flex; max-width: 100%; flex-grow: 1; flex-shrink: 1;">
                                                                                                <div class="kr-view" style="align-items: center; flex-grow: 1; flex-shrink: 1;">
                                                                                                    <div class="kr-view f24" style="color: white; margin-right: 9px; width: 24px; height: 24px;"><i class="fal fa-eye"></i></div>
                                                                                                    <div class="kr-text" style="cursor: default; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; color: white; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Watched by</div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="kr-view react-popover-trigger react-popover-trigger-popover-filterfollower">
                                                                                                <div class="kr-view" style="cursor: pointer; width: 150px; height: 36px; border-radius: 5px; margin-left: 10px; align-items: center; padding-left: 10px; padding-right: 10px; background-color: rgb(61, 71, 77);">
                                                                                                    <div class="kr-view" style="flex-grow: 1; flex-shrink: 1; align-items: center;">
                                                                                                        <div class="kr-text" style="flex-grow: 1; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; color: rgb(138, 148, 153); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Edit…</div>
                                                                                                    </div>
                                                                                                    <div class="kr-view" style="margin-left: 10px; color: rgb(138, 148, 153); width: 16px; height: 16px;">
                                                                                                        <svg width="100%" height="100%" viewBox="0 0 16 16">
                                                                                                            <path fill="currentColor" fill-rule="evenodd" d="M10.36 6.232a1 1 0 0 1 1.28 1.536l-3 2.5a1 1 0 0 1-1.28 0l-3-2.5a1 1 0 1 1 1.28-1.536L8 8.198l2.36-1.966z"></path>
                                                                                                        </svg>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="kr-view" style="margin-left: 3px; margin-right: 3px; align-items: center; margin-top: 20px;">
                                                                                            <div class="kr-view" style="display: inline-flex; max-width: 100%; flex-grow: 1; flex-shrink: 1;">
                                                                                                <div class="kr-view" style="align-items: center; flex-grow: 1; flex-shrink: 1;">
                                                                                                    <div class="kr-view f24" style="color: white; margin-right: 9px; width: 24px; height: 24px;"><i class="fal fa-calendar-alt"></i></div>
                                                                                                    <div class="kr-text" style="cursor: default; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; color: white; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Due date</div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="kr-view react-popover-trigger react-popover-trigger-popover-filterdue">
                                                                                                <div class="kr-view" style="cursor: pointer; width: 150px; height: 36px; border-radius: 5px; margin-left: 10px; align-items: center; padding-left: 10px; padding-right: 10px; background-color: rgb(61, 71, 77);">
                                                                                                    <div class="kr-text" style="flex-grow: 1; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; color: rgb(138, 148, 153); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Edit…</div>
                                                                                                    <div class="kr-view" style="margin-left: 10px; color: rgb(138, 148, 153); width: 16px; height: 16px;">
                                                                                                        <svg width="100%" height="100%" viewBox="0 0 16 16">
                                                                                                            <path fill="currentColor" fill-rule="evenodd" d="M10.36 6.232a1 1 0 0 1 1.28 1.536l-3 2.5a1 1 0 0 1-1.28 0l-3-2.5a1 1 0 1 1 1.28-1.536L8 8.198l2.36-1.966z"></path>
                                                                                                        </svg>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="kr-view" style="margin-left: 3px; margin-right: 3px; align-items: center; margin-top: 20px;">
                                                                                            <div class="kr-view" style="display: inline-flex; max-width: 100%; flex-grow: 1; flex-shrink: 1;">
                                                                                                <div class="kr-view" style="align-items: center; flex-grow: 1; flex-shrink: 1;">
                                                                                                    <div class="kr-view f24" style="color: white; margin-right: 9px; width: 24px; height: 24px;"><i class="fal fa-check-circle"></i></div>
                                                                                                    <div class="kr-text" style="cursor: default; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; color: white; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Status</div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="kr-view react-popover-trigger react-popover-trigger-popover-filterstatus">
                                                                                                <div class="kr-view" style="cursor: pointer; width: 150px; height: 36px; border-radius: 5px; margin-left: 10px; align-items: center; padding-left: 10px; padding-right: 10px; background-color: rgb(61, 71, 77);">
                                                                                                    <div class="kr-text" style="flex-grow: 1; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; color: rgb(138, 148, 153); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Edit…</div>
                                                                                                    <div class="kr-view" style="margin-left: 10px; color: rgb(138, 148, 153); width: 16px; height: 16px;">
                                                                                                        <svg width="100%" height="100%" viewBox="0 0 16 16">
                                                                                                            <path fill="currentColor" fill-rule="evenodd" d="M10.36 6.232a1 1 0 0 1 1.28 1.536l-3 2.5a1 1 0 0 1-1.28 0l-3-2.5a1 1 0 1 1 1.28-1.536L8 8.198l2.36-1.966z"></path>
                                                                                                        </svg>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="kr-view" style="margin-left: 3px; margin-right: 3px; align-items: center; margin-top: 20px;">
                                                                                            <div class="kr-view" style="display: inline-flex; max-width: 100%; flex-grow: 1; flex-shrink: 1;">
                                                                                                <div class="kr-view" style="align-items: center; flex-grow: 1; flex-shrink: 1;">
                                                                                                    <div class="kr-view" style="color: white; margin-right: 9px; width: 24px; height: 24px;">
                                                                                                        <svg width="100%" height="100%" viewBox="0 0 24 24">
                                                                                                            <path fill="currentColor" fill-rule="evenodd" d="M11 16a3 3 0 0 1 0 6H7a3 3 0 0 1 0-6h4zm0 2H7a1 1 0 0 0-.117 1.993L7 20h4a1 1 0 0 0 0-2zm10-9a3 3 0 0 1 0 6h-9a3 3 0 0 1 0-6h9zm-6-7a3 3 0 0 1 0 6H4a3 3 0 1 1 0-6h11zm0 2H4a1 1 0 0 0-.117 1.993L4 6h11a1 1 0 0 0 0-2z"></path>
                                                                                                        </svg>
                                                                                                    </div>
                                                                                                    <div class="kr-text" style="cursor: default; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; color: white; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Schedule</div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="kr-view react-popover-trigger react-popover-trigger-popover-filterschedule">
                                                                                                <div class="kr-view" style="cursor: pointer; width: 150px; height: 36px; border-radius: 5px; margin-left: 10px; align-items: center; padding-left: 10px; padding-right: 10px; background-color: rgb(61, 71, 77);">
                                                                                                    <div class="kr-text" style="flex-grow: 1; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; color: rgb(138, 148, 153); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Edit…</div>
                                                                                                    <div class="kr-view" style="margin-left: 10px; color: rgb(138, 148, 153); width: 16px; height: 16px;">
                                                                                                        <svg width="100%" height="100%" viewBox="0 0 16 16">
                                                                                                            <path fill="currentColor" fill-rule="evenodd" d="M10.36 6.232a1 1 0 0 1 1.28 1.536l-3 2.5a1 1 0 0 1-1.28 0l-3-2.5a1 1 0 1 1 1.28-1.536L8 8.198l2.36-1.966z"></path>
                                                                                                        </svg>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="kr-view" style="margin: 10px 5px;">
                                                                                            <div class="kr-text" style="cursor: pointer; text-decoration: underline; color: rgb(0, 170, 255); font-size: 13px; font-weight: 400; line-height: 18px; letter-spacing: normal;">Reset all filters</div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="knightrider-scrollview-top-element" style="height: 1px; width: 100%; position: absolute; top: 0px; pointer-events: none;"></div>
                                                                                    <div class="knightrider-scrollview-bottom-element" style="height: 1px; width: 100%; position: absolute; bottom: 0px; pointer-events: none;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="modal" class="modal fadeIn" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div><!-- End Reports -->


                    <style>
                        .text-color-blue{color: #007bff !important;}
                        .text-color-indigo{color: #6610f2 !important;}
                        .text-color-purple{color: #6f42c1 !important;}
                        .text-color-pink{color: #e83e8c !important;}
                        .text-color-red{color: #dc3545 !important;}
                        .text-color-orange{color: #fd7e14 !important;}
                        .text-color-yellow{color: #ffc107 !important;}
                        .text-color-green{color: #28a745 !important;}
                        .text-color-teal{color: #20c997 !important;}
                        .text-color-cyan{color: #17a2b8 !important;}
                        .text-color-white{color: #fff !important;}
                        .text-color-gray{color: #6c757d !important;}
                        .text-color-gray-dark{color: #343a40 !important;}
                        .text-color-primary{color: #007bff !important;}
                        .text-color-secondary{color: #6c757d !important;}
                        .text-color-success{color: #28a745 !important;}
                        .text-color-info{color: #17a2b8 !important;}
                        .text-color-warning{color: #ffc107 !important;}
                        .text-color-danger{color: #dc3545 !important;}
                        .text-color-light{color: #f8f9fa !important;}
                        .text-color-dark{color: #343a40 !important;}
                        .text-color-amber{color: #ffc107 !important;}
                        .text-color-blue-grey{color: #607d8b !important;}
                        .text-color-brown{color: #795548 !important;}
                        .text-color-deep-orange{color: #ff5722 !important;}
                        .text-color-deep-purple{color: #673ab7 !important;}
                        .text-color-grey{color: #9e9e9e !important;}
                        .text-color-light-blue{color: #03a9f4 !important;}
                        .text-color-light-green{color: #8bc34a !important;}
                        .text-color-lime{color: #cddc39 !important;}
                        .bgc-blue{background-color: #007bff !important;}
                        .bgc-indigo{background-color: #6610f2 !important;}
                        .bgc-purple{background-color: #6f42c1 !important;}
                        .bgc-pink{background-color: #e83e8c !important;}
                        .bgc-red{background-color: #dc3545 !important;}
                        .bgc-orange{background-color: #fd7e14 !important;}
                        .bgc-yellow{background-color: #ffc107 !important;}
                        .bgc-green{background-color: #28a745 !important;}
                        .bgc-teal{background-color: #20c997 !important;}
                        .bgc-cyan{background-color: #17a2b8 !important;}
                        .bgc-white{background-color: #fff !important;}
                        .bgc-gray{background-color: #6c757d !important;}
                        .bgc-gray-dark{background-color: #343a40 !important;}
                        .bgc-primary{background-color: #007bff !important;}
                        .bgc-secondary{background-color: #6c757d !important;}
                        .bgc-success{background-color: #28a745 !important;}
                        .bgc-info{background-color: #17a2b8 !important;}
                        .bgc-warning{background-color: #ffc107 !important;}
                        .bgc-danger{background-color: #dc3545 !important;}
                        .bgc-light{background-color: #f8f9fa !important;}
                        .bgc-dark{background-color: #343a40 !important;}
                        .bgc-amber{background-color: #ffc107 !important;}
                        .bgc-blue-grey{background-color: #607d8b !important;}
                        .bgc-brown{background-color: #795548 !important;}
                        .bgc-deep-orange{background-color: #ff5722 !important;}
                        .bgc-deep-purple{background-color: #673ab7 !important;}
                        .bgc-grey{background-color: #9e9e9e !important;}
                        .bgc-light-blue{background-color: #03a9f4 !important;}
                        .bgc-light-green{background-color: #8bc34a !important;}
                        .bgc-lime{background-color: #cddc39 !important;}

                        [data-list-type="dropdown"]{width: 100%;}
                        .ui.image{position:relative;display:inline-block;vertical-align:middle;max-width:100%;background-color:transparent;}
                        img.ui.image{display:block;}
                        .ui.avatar.image{margin-right:.25em;display:inline-block;width:2em;height:2em;border-radius:500rem;}
                        .ui.mini.image{width:35px;height:35px;font-size:.78571429rem;}
                        .ui.dropdown{cursor:pointer;position:relative;display:inline-block;outline:0;text-align:left;-webkit-transition:width .1s ease,-webkit-box-shadow .1s ease;transition:width .1s ease,-webkit-box-shadow .1s ease;transition:box-shadow .1s ease,width .1s ease;transition:box-shadow .1s ease,width .1s ease,-webkit-box-shadow .1s ease;-webkit-tap-highlight-color:transparent;}
                        .ui.dropdown .menu{cursor:auto;position:absolute;display:none;outline:0;top:100%;min-width:-webkit-max-content;min-width:-moz-max-content;min-width:max-content;margin:0;padding:0 0;background:#fff;font-size:1em;text-shadow:none;text-align:left;-webkit-box-shadow:0 2px 3px 0 rgba(34,36,38,.15);box-shadow:0 2px 3px 0 rgba(34,36,38,.15);border:1px solid rgba(34,36,38,.15);border-radius:.28571429rem;-webkit-transition:opacity .1s ease;transition:opacity .1s ease;z-index:11;will-change:transform,opacity;}
                        .ui.dropdown .menu>*{white-space:nowrap;}
                        .ui.dropdown>input:not(.search):first-child{display:none!important;}
                        .ui.dropdown>.dropdown.icon{position:relative;width:auto;font-size:.85714286em;margin:0 0 0 1em;}
                        .ui.dropdown>.text{display:inline-block;-webkit-transition:none;transition:none;}
                        .ui.dropdown .menu>.item{position:relative;cursor:pointer;display:block;border:none;height:auto;text-align:left;border-top:none;line-height:1em;color:rgba(0,0,0,.87);padding:.78571429rem 1.14285714rem!important;font-size:1rem;text-transform:none;font-weight:400;-webkit-box-shadow:none;box-shadow:none;-webkit-touch-callout:none;overflow: hidden;text-overflow: ellipsis;white-space: nowrap !important;}
                        .ui.dropdown .menu>.item:first-child{border-top-width:0;}
                        .ui.dropdown .menu>.item>.image,.ui.dropdown .menu>.item>img{margin-top:0;}
                        .ui.dropdown .menu>.item>.image,.ui.dropdown .menu>.item>img{margin-left:0;float:none;margin-right:.78571429rem;}
                        .ui.dropdown .menu>.item>.image,.ui.dropdown .menu>.item>img{display:inline-block;vertical-align:top;width:auto;margin-top:-.5em;margin-bottom:-.5em;max-height:2em;}
                        .ui.selection.dropdown{cursor:pointer;word-wrap:break-word;line-height:1em;white-space:normal;outline:0;-webkit-transform:rotateZ(0);transform:rotateZ(0);min-width:14em;min-height:2.71428571em;background:#fff;display:inline-block;padding:.78571429em 2.1em .78571429em 1em;color:rgba(0,0,0,.87);-webkit-box-shadow:none;box-shadow:none;border:1px solid rgba(34,36,38,.15);border-radius: 5px;-webkit-transition:width .1s ease,-webkit-box-shadow .1s ease;transition:width .1s ease,-webkit-box-shadow .1s ease;transition:box-shadow .1s ease,width .1s ease;transition:box-shadow .1s ease,width .1s ease,-webkit-box-shadow .1s ease;}
                        .ui.selection.dropdown.active,.ui.selection.dropdown.visible{z-index:10;}
                        .ui.selection.dropdown>.dropdown.icon{cursor:pointer;position:absolute;width:auto;height:auto;line-height:1.21428571em;top:1.35em;right:1em;z-index:3;margin:-.78571429em;padding:.91666667em;opacity:.8;-webkit-transition:opacity .1s ease;transition:opacity .1s ease;}
                        .ui.selection.dropdown .menu{overflow-x:hidden;overflow-y:auto;-webkit-backface-visibility:hidden;backface-visibility:hidden;-webkit-overflow-scrolling:touch;border-top-width:0!important;width:auto;outline:0;margin:0 -1px;min-width:calc(100% + 2px);width:calc(100% + 2px);border-radius:0 0 .28571429rem .28571429rem;-webkit-box-shadow:0 2px 3px 0 rgba(34,36,38,.15);box-shadow:0 2px 3px 0 rgba(34,36,38,.15);-webkit-transition:opacity .1s ease;transition:opacity .1s ease;}
                        .ui.selection.dropdown .menu:after,.ui.selection.dropdown .menu:before{display:none;}
                        @media only screen and (max-width:767px){
                            .ui.selection.dropdown .menu{max-height:8.01428571rem;}
                        }
                        @media only screen and (min-width:992px){
                            .ui.selection.dropdown .menu{max-height:16.02857143rem;}
                        }
                        @media only screen and (min-width:1920px){
                            .ui.selection.dropdown .menu{max-height:21.37142857rem;}
                        }
                        .ui.selection.dropdown .menu>.item{border-top:1px solid #fafafa;padding:.78571429rem 1.14285714rem!important;white-space:normal;word-wrap:normal;}
                        .ui.selection.dropdown:hover{border-color:rgba(34,36,38,.35);-webkit-box-shadow:none;box-shadow:none;}
                        .ui.selection.active.dropdown{border-color:#96c8da;-webkit-box-shadow:0 2px 3px 0 rgba(34,36,38,.15);box-shadow:0 2px 3px 0 rgba(34,36,38,.15);}
                        .ui.selection.active.dropdown .menu{border-color:#96c8da;-webkit-box-shadow:0 2px 3px 0 rgba(34,36,38,.15);box-shadow:0 2px 3px 0 rgba(34,36,38,.15);}
                        .ui.selection.dropdown:focus{border-color:#96c8da;-webkit-box-shadow:none;box-shadow:none;}
                        .ui.selection.dropdown:focus .menu{border-color:#96c8da;-webkit-box-shadow:0 2px 3px 0 rgba(34,36,38,.15);box-shadow:0 2px 3px 0 rgba(34,36,38,.15);}
                        .ui.selection.active.dropdown:hover{border-color:#96c8da;-webkit-box-shadow:0 2px 3px 0 rgba(34,36,38,.15);box-shadow:0 2px 3px 0 rgba(34,36,38,.15);}
                        .ui.selection.active.dropdown:hover .menu{border-color:#96c8da;-webkit-box-shadow:0 2px 3px 0 rgba(34,36,38,.15);box-shadow:0 2px 3px 0 rgba(34,36,38,.15);}
                        .ui.active.selection.dropdown>.dropdown.icon,.ui.visible.selection.dropdown>.dropdown.icon{opacity:'';z-index:3;}
                        .ui.active.selection.dropdown{border-bottom-left-radius:0!important;border-bottom-right-radius:0!important;}
                        .ui.dropdown .menu>.item:hover{background:rgba(0,0,0,.05);color:rgba(0,0,0,.95);z-index:13;}
                        .ui.dropdown:not(.button)>.default.text{color:rgba(191,191,191,.87);}
                        .ui.dropdown:not(.button)>input:focus~.default.text{color:rgba(115,115,115,.87);}
                        .ui.dropdown .menu{left:0;}
                        .ui.fluid.dropdown{display:block;min-width:0;}
                        .ui.fluid.dropdown>.dropdown.icon{float:right;}
                        .ui.dropdown>.dropdown.icon{line-height:1;height:1em;width:1.23em;-webkit-backface-visibility:hidden;backface-visibility:hidden;font-weight:400;font-style:normal;text-align:center;}
                        .ui.dropdown>.dropdown.icon{width:auto;}
                        .transition{-webkit-animation-iteration-count:1;animation-iteration-count:1;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-timing-function:ease;animation-timing-function:ease;-webkit-animation-fill-mode:both;animation-fill-mode:both;}
                        .visible.transition{display:block!important;visibility:visible!important;}


                        .kr-view {display: flex;flex-shrink: 0;}
                        .kr-text {flex-shrink: 1;max-width: 100%;display: inline-block;}

                        .kr-text, .kr-view {background-color: initial;border-style: solid;border-width: 0;color: initial;flex-basis: auto;font-size: medium;font-weight: 400;line-height: normal;list-style: none;margin: 0;min-height: 0;min-width: 0;padding: 0;position: relative;text-align: initial;text-decoration: initial;word-wrap: break-word;word-break: break-word;font-family: Avenir, Avenir Next, Segoe UI, Helvetica, Arial, sans-serif;font-size: 15px;color: #3d474d;}

                        * {-webkit-tap-highlight-color: rgba(0, 0, 0, 0);box-sizing: border-box;}

                        :focus {outline-color: transparent;outline-style: none;}

                        ::-webkit-input-placeholder {color: #8a9499;}

                        ::-ms-clear {display: none;height: 0;width: 0;}

                        :-ms-input-placeholder {color: #8a9499;}

                        ::placeholder {color: #8a9499;}

                        body:not(.react-modals-disable-events) .knightrider-scrollview-root:not(.gecko):hover {will-change: transform;transform: translateZ(0);}

                        body:not(.react-modals-disable-events) .knightrider-scrollview-root:hover .knightrider-scrollview-scrollelement {will-change: scroll-position;}

                        body:not(.react-modals-disable-events) .knightrider-scrollview-root:hover .knightrider-lazyscrollview-item {will-change: contents;}

                        .selection-dark ::selection {color: #3d474d;background-color: rgba(220, 226, 230, .99);}

                        @media print {
                            .print-hide, body>div>div>div:not(.print-root) {display: none;}
                        }
                        .page-head {user-select: none; align-items: center; background-color: white; height: 60px; box-shadow: rgba(0, 0, 0, 0.05) 0px 2px 5px 0px; z-index: 1;}
                        .page-head-left{align-items: center; justify-content: flex-start; flex-grow: 1;}
                        .page-head-right{align-items: center; justify-content: flex-end;}
                        .w24{width: 24px;}
                        .fd100{flex-direction: column; height: 100%; width: 100%;}
                        .br18{border-radius: 18px;}
                        .br7{border-radius: 7px;}
                        .i080{position: absolute; inset: 0px 80px 0px 0px; z-index: 0;}
                        .i0-fl-dr-row{inset: 0px; min-width: 0px; min-height: 0px; display: flex; overflow: scroll hidden; position: absolute; box-sizing: content-box; margin-bottom: 0px; margin-right: 0px; flex-direction: row;}
                        .fl-dr-row-hf100{flex-direction: row; flex-grow: 1; flex-shrink: 1; align-items: center; height: 100%; cursor: -webkit-grab;}
                        .wh24-icon{width: 24px; height: 24px; font-size: 24px;; color: white; margin-right: 15px; cursor: -webkit-grab;}
                        .bg-bl-whf100{background-color: rgba(0, 0, 0, 0.02); width: 100%; height: 100%; opacity: 1; flex-direction: column; flex-grow: 0; flex-shrink: 0; position: absolute; top: 0px; left: 0px; overflow: hidden;}
                        .d-fl-mw100{display: inline-flex; max-width: 100%; top: 30px; position: absolute; right: 0px; transform: translateY(-50%) translateX(100%);}
                        .fldr{flex-direction: column; width: 100%;}
                        .w28{width: 28px; height: 28px; cursor: pointer; justify-content: center; align-items: center;}
                        .w16{width: 16px; height: 16px; font-size: 16px; color: rgb(138, 148, 153); backface-visibility: hidden; transform: scaleX(0) scaleY(0);}
                        .pd-tb12{flex-direction: column; align-items: center; width: 100%; height: 280px; padding-top: 12px; padding-bottom: 12px;}
                        .w100-c{width: 100%; justify-content: center;}
                        .w80-c{width: 80px; justify-content: center;}
                        .t0-l0{top: 0px; left: 0px; width: 100%; height: 100%; border-radius: 100%; align-items: center; position: absolute; transform: scaleX(1) scaleY(1); justify-content: center; overflow: hidden; background-color: rgb(138, 148, 153);}
                        .bg-w-brf100{background-color: white; border-radius: 100%; box-shadow: rgba(0, 0, 0, 0.02) 0px 0px 0px 1px, rgba(0, 0, 0, 0.05) 0px 1px 2px 0px, rgba(0, 0, 0, 0.05) 0px 2px 8px 0px; height: 100%; left: 0px; position: absolute; top: 0px; width: 100%; transform: scaleX(0) scaleY(0);}
                        .flg1-fls0{flex-grow: 1; flex-shrink: 0; min-height: 0px; height: 100%; box-sizing: border-box; padding-bottom: 0px; position: relative;}
                        .flg1-usn{flex-grow: 1; flex-shrink: 1; user-select: none; overflow: hidden;}
                        .bgc-w-brf100{background-color: white; border-radius: 100%; box-shadow: rgba(0, 0, 0, 0.02) 0px 0px 0px 1px, rgba(0, 0, 0, 0.05) 0px 1px 2px 0px, rgba(0, 0, 0, 0.05) 0px 2px 8px 0px; height: 100%; left: 0px; position: absolute; top: 0px; width: 100%;}
                        .ofl-h-pb15{overflow: hidden; flex-grow: 1; flex-shrink: 1; flex-direction: column; align-items: center; padding-top: 10px; padding-bottom: 15px;}
                        .h28-tf100{left: 0px; z-index: 1; height: 28px; top: 100%; margin-top: 5px; width: 100%; position: absolute; justify-content: center; transform: translateY(-50%);}
                        .p310-br12{padding: 3px 10px; border-radius: 12px; background-color: rgba(0, 0, 0, 0.05);}
                        .p310-br12-text{color: rgb(255, 255, 255); font-size: 13px; line-height: 18px; font-weight: 500; letter-spacing: normal;}
                        .tf50-lf50{position: absolute; top: 50%; left: 50%; transform: translateY(-50%) translateX(-50%);}
                        .mhf100{max-height: 100%; overflow: hidden; flex-direction: column;}
                        .pd1720{padding: 17px 20px; flex-direction: column;}
                        .fls1-wf100{flex-shrink: 1; flex-grow: 1; width: 100%; font-size: 17px; line-height: 23px; font-weight: 500; letter-spacing: normal; padding-right: 10px; text-decoration: none;}
                        .mb10-wf100{margin-bottom: 10px; width: 100%; display: block;}
                        .bgc-w-mb0-fls1{background-color: white; margin-bottom: 0px; flex-shrink: 1; flex-grow: 1; flex-direction: column; width: 100%; box-shadow: rgba(0, 0, 0, 0.02) 0px 0px 0px 1px, rgba(0, 0, 0, 0.05) 0px 1px 2px 0px, rgba(0, 0, 0, 0.05) 0px 2px 8px 0px; border-radius: 10px; position: relative; user-select: none; cursor: pointer;}
                        .o1-fld-col{opacity: 1; flex-direction: column;}
                        .btlr10{overflow: hidden; border-top-left-radius: 10px; border-top-right-radius: 10px;}
                        .br10-bw2{border-color: rgba(0, 170, 255, 0); border-radius: 10px; border-width: 2px; position: absolute; inset: 0px;}
                        .dn-br10{background-color: rgba(0, 170, 255, 0); display: none; border-radius: 10px; z-index: 2; position: absolute; inset: 0px;}
                        .l0-zi1{left: 0px; z-index: 1; height: 28px; top: 100%; width: 100%; cursor: default; position: absolute; justify-content: center; margin-top: 10px;}
                        .wh20{width: 20px; height: 20px; color: rgb(138, 148, 153);}
                        .wh20-brf100{width: 20px; height: 20px; border-radius: 100%; align-items: center; justify-content: center; box-shadow: rgb(0, 170, 255) 0px 0px 0px -1px inset;}
                        .hf100-c-sxy1{height: 100%; align-items: center; transform: scaleX(1) scaleY(1);}
                        .hf100-c-sxy1>div{color: white; font-size: 8px; font-weight: 500;}
                        .mrt10-c{margin-right: 10px; margin-top: 10px; align-items: center;}
                        .c-brf100{justify-content: center; align-items: center; border-radius: 100%; width: 20px; height: 20px; margin-right: 10px; align-self: flex-start; background-color: rgb(255, 170, 0);}
                        .w14{width: 14px; height: 14px; color: white;}
                        .fs12-lh31{cursor: default; font-size: 21px; line-height: 31px; font-weight: 500; letter-spacing: normal; white-space: nowrap; color: rgb(255, 255, 255); max-width: 160px; overflow: hidden; text-overflow: ellipsis; user-select: none;}
                        .h160{height: 160px; width: 100%; margin-top: 12px; margin-bottom: 18px;}
                        .bgc-t-w320{background-color: transparent; width: 320px; height: 100%; opacity: 1; flex-direction: column; flex-grow: 0; flex-shrink: 0; position: relative; top: 0px; left: 0px; overflow: hidden;}
                        .mlr12-wh16{color: rgb(0, 170, 255); margin-left: 12px; margin-right: 12px; width: 16px; height: 16px; font-size: 16px;}
                        .wh64-mlr6{width: 64px; height: 64px; margin-left: 6px; margin-right: 6px; border-radius: 100%; border-color: white; border-width: 3px;}
                        .wh16-bvh{width: 16px; height: 16px; font-size: 16px; color: rgb(138, 148, 153); backface-visibility: hidden;}
                        .l0-zi1-h28{left: 0px; z-index: 1; height: 28px; top: 100%; width: 100%; cursor: default; position: absolute; justify-content: center; margin-top: 5px; transform: translateY(-50%);}
                        .l0-zi1-h28:hover .bg-w-brf100{transform: scaleX(1) scaleY(1);-webkit-transition: transform 100ms ease-in-out;-moz-transition:transform 100ms ease-in-out;-ms-transition:transform 100ms ease-in-out;}
                        .l0-zi1-h28:hover .w16{transform: scaleX(1) scaleY(1);-webkit-transition: transform 100ms ease-in-out;-moz-transition:transform 100ms ease-in-out;-ms-transition:transform 100ms ease-in-out;}
                        .r15-bt23{right: 15px; bottom: 23px; position: absolute;}
                        .wf100-tcalc{width: 100%; align-items: center; flex-direction: column; padding-left: 40px; padding-right: 40px; position: absolute; top: calc(40% - 81px);}
                        .hf100-w320{height: 100%; width: 320px;}
                        .hf100-mwf100{height: 100%; min-width: 100%;}
                        .hf100-sxy{height: 100%; align-items: center; transform: scaleX(1.6) scaleY(1.6);}
                        .h1-t0{height: 1px; width: 100%; position: absolute; top: 0px; pointer-events: none;}
                        .h1-b0{height: 1px; width: 100%; position: absolute; bottom: 0px; pointer-events: none;}
                        .w60-h0{width: 60px; height: 0px; opacity: 0; overflow: hidden; flex-grow: 0; flex-shrink: 0; position: relative; cursor: -webkit-grab;}
                        w280-h60 {width: 280px; height: 60px; padding-left: 60px; align-items: center; position: absolute; top: 0px; left: 0px; transform-origin: 30px center; transform: rotate(90deg) translateY(0px);}
                        .whcw{height: 36px; width: 24px; color: white;}
                        .t30-l0{display: inline-flex; max-width: 100%; top: 30px; position: absolute; left: 0px; transform: translateY(-50%) translateX(-50%);}
                        .w16-sxy {width: 16px; height: 16px; font-size: 16px; backface-visibility: hidden; transform: scaleX(0) scaleY(0);}
                        .fl10f0{flex: 1 0 0%; font-size: 21px; font-weight: 500; line-height: 31px; letter-spacing: normal; cursor: text; color: white; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;}
                        .w30-hf100-c{width: 30px; height: 100%; align-items: center; flex-direction: column; justify-content: center; opacity: 0;}
                        .w30-hf100-c.active{opacity: 1 !important;}
                        .section-c-item-header:hover .w30-hf100-c{opacity: 1;}
                        .ai-c{align-items: center; cursor: pointer;}
                        .l0-h28{left: 0px; z-index: 1; height: 28px; top: 100%; margin-top: 19px; width: 100%; position: absolute; justify-content: center;}
                        .bgc-trans{background-color: transparent; width: 100%; height: 100%; opacity: 1; flex-direction: column; flex-grow: 0; flex-shrink: 0; position: absolute; top: 0px; left: 0px; overflow: hidden;}
                        .h60-aic{height: 60px; align-items: center; padding-left: 22px; padding-right: 22px; box-shadow: rgba(0, 0, 0, 0.05) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;}
                        .h60-pl14-pr22{height: 60px; align-items: center; padding-left: 14px; padding-right: 22px; box-shadow: rgba(0, 0, 0, 0.05) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; cursor: pointer;}
                        .h36-wt{color: rgb(255, 255, 255); border-color: rgb(0, 170, 255); background-color: rgb(0, 170, 255); box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px; resize: none; border-width: 1px; flex-direction: row; white-space: nowrap; align-items: center; text-decoration: none; display: inline-flex; justify-content: center; user-select: none; border-radius: 18px; padding-left: 20px; padding-right: 20px; font-size: 15px; line-height: 22px; font-weight: 500; letter-spacing: normal; height: 36px;}
                        .w1h24{width: 1px; height: 24px; align-self: center; background-color: rgb(220, 226, 230);}
                        .f24{font-size: 24px;}
                        .gray24{color: rgb(61, 71, 77); width: 24px; height: 24px; font-size: 24px;}
                        .gray24-ml0{color: rgb(61, 71, 77); width: 24px; height: 24px; font-size: 24px; margin-left: 0px;}
                        .gr36{display: inline-flex; justify-content: center; align-items: center; width: 100%; height: 36px; padding: 6px; border-radius: 18px; cursor: pointer; white-space: nowrap; border-width: 0px; border-color: rgb(61, 71, 77); background-color: rgba(0, 0, 0, 0); opacity: 1; transform: scaleX(1) scaleY(1);}
                        .h36-br18{width: 100%; height: 36px; align-items: center; border-radius: 18px;}
                        .h34{height: 34px; border-width: 1px; border-radius: 5px; align-items: center; padding-left: 8px; padding-right: 8px; border-color: transparent; cursor: pointer; opacity: 1;}
                        .grf17{font-size: 17px; line-height: 25px; font-weight: 500; letter-spacing: normal; max-width: 300px; overflow: hidden; color: rgb(61, 71, 77); margin-left: 10px; margin-right: 10px; white-space: nowrap; text-overflow: ellipsis;}
                        .mr-lr16{margin-left: 16px; margin-right: 16px;}
                        .w320{flex-direction: column; height: 100%; flex: 1 1 320px; width: 320px; max-width: 320px;}
                        .h-f100{flex-grow: 1; flex-shrink: 1; width: 100%; overflow: hidden; position: relative; max-height: 100%; min-height: 0px; height: 100%;}
                        .w-f100{flex-grow: 1; flex-shrink: 0; min-height: 0px; width: 100%; box-sizing: border-box; padding-right: 0px; position: relative;}
                        .infl-col{inset: 0px; min-width: 0px; min-height: 0px; display: flex; overflow: hidden scroll; position: absolute; box-sizing: content-box; margin-bottom: 0px; margin-right: 0px; flex-direction: column;}

                        .dif-mwf100{display: inline-flex; max-width: 100%;}
                        .asfs{align-self: flex-start;}
                        .p8-cp{padding: 8px; cursor: pointer;}
                        .fdc-p114{flex-direction: column; padding: 10px 10px 0px; height: 100%;}
                        .to100{transition: opacity 100ms ease-in-out 0s; opacity: 1;}
                        .page-content {position: relative; background: linear-gradient(-45deg, rgb(245, 247, 248), rgb(237, 241, 242) 100%); width: 100%; flex-grow: 1; flex-shrink: 1;}
                        .section-item {background-color: transparent;width: 100%; height: 100%; opacity: 1; flex-direction: column; flex-grow: 0; flex-shrink: 0; position: absolute; top: 0px; left: 0px; overflow: hidden;}
                        .task-items-sub{font-size: 13px; font-weight: 500; line-height: 18px; letter-spacing: normal; padding-left: 6px; white-space: nowrap; color: rgb(138, 148, 153);}
                        .fdc-p114 + .flg1-usn {display: none;}

                        .fdc-p114:empty + .flg1-usn {display: block;}
                        [data-task-target] + [data-task-action]{display: none;}
                        [data-task-target]:empty + [data-task-action]{display: block;}
                        [data-task-target] {display: block;position: absolute;inset: 0px;border-width: 2px;border-color: rgb(0, 170, 255);margin-bottom: 10px;background-color: white;overflow: hidden;width: 100%;flex-shrink: 1;flex-grow: 1;flex-direction: column;box-shadow: rgba(0, 0, 0, 0.02) 0px 0px 0px 1px, rgba(0, 0, 0, 0.05) 0px 1px 2px 0px, rgba(0, 0, 0, 0.05) 0px 2px 8px 0px;border-radius: 10px;cursor: pointer;padding: 10px 20px;height: 43px;}
                        [data-task-target]:empty{display:none;}
                        [data-task-target]>input {background-color: white;border-width: 0px;border-color: rgb(0, 170, 255);border-style: solid;color: rgb(61, 71, 77);border-radius: 10px;padding: 1px;font-size: 17px;font-weight: 500;line-height: 23px;letter-spacing: normal;resize: none;width: 100%;outline: 0px;overflow-y: hidden;height: 23px;}
                        .bg-color1{background-color: rgb(217, 54, 81);}
                        .bg-color2{background-color: rgb(255, 159, 26);}
                        .bg-color3{background-color: rgb(255, 213, 0);}
                        .bg-color4{background-color: rgb(138, 204, 71);}
                        .bg-color5{background-color: rgb(71, 204, 138);}
                        .bg-color6{background-color: rgb(48, 191, 191);}
                        .bg-color7{background-color: rgb(0, 170, 255);}
                        .bg-color8{background-color: rgb(143, 126, 230);}
                        .bg-color9{background-color: rgb(152, 170, 179);}
                        .bg-color10{background-color: rgb(23, 162, 184);}
                        .bg-color11{background-color: rgb(255, 255, 255);}
                        .bg-color12{background-color: rgb(0, 0, 0);}
                        .text-color1{color: rgb(217, 54, 81) !important;}
                        .text-color2{color: rgb(255, 159, 26) !important;}
                        .text-color3{color: rgb(255, 213, 0) !important;}
                        .text-color4{color: rgb(138, 204, 71) !important;}
                        .text-color5{color: rgb(71, 204, 138) !important;}
                        .text-color6{color: rgb(48, 191, 191) !important;}
                        .text-color7{color: rgb(0, 170, 255) !important;}
                        .text-color8{color: rgb(143, 126, 230) !important;}
                        .text-color9{color: rgb(152, 170, 179) !important;}
                        .text-color10{color: rgb(23, 162, 184) !important;}
                        .text-color11{color: rgb(255, 255, 255) !important;}
                        .text-color12{color: rgb(0, 0, 0) !important;}
                        .unassigned{transition: opacity 100ms ease-in-out 0s; opacity: 0;}
                        .pd1720:hover .unassigned{opacity: 1;}
                        .dropdown-menu{min-width: 320px;}
                        #projectinfo{max-width: 320px;}
                        .dropdown-menu:before{border-radius: 10px;}
                        .fl-item{height: 60px;border-radius: 5px;}
                        :root{--cloud-sky: linear-gradient(-45deg, rgb(245, 247, 248), rgb(237, 241, 242) 100%);--grey-joy: linear-gradient(-45deg, rgb(163, 190, 204), rgb(122, 143, 153) 100%);--darko: linear-gradient(-45deg, rgb(61, 71, 77), rgb(26, 9, 0) 100%);--pinky: linear-gradient(-45deg, rgb(255, 102, 204), rgb(230, 46, 77) 100%);--purple-rain: linear-gradient(-45deg, rgb(230, 92, 230), rgb(122, 82, 204) 100%);--true-blue: linear-gradient(-45deg, rgb(161, 126, 230), rgb(0, 170, 255) 100%);--toothpatse: linear-gradient(-45deg, rgb(0, 170, 255), rgb(36, 242, 225) 100%);--minty: linear-gradient(-45deg, rgb(85, 242, 137), rgb(0, 191, 230) 100%);--rainbow: transparent;}
                        .bg-cloud-sky{background: var(--cloud-sky);}
                        .bg-grey-joy{background: var(--grey-joy);}
                        .bg-darko{background: var(--darko);}
                        .bg-pinky{background: var(--pinky);}
                        .bg-purple-rain{background: var(--purple-rain);}
                        .bg-true-blue{background: var(--true-blue);}
                        .bg-toothpatse{background: var(--toothpatse);}
                        .bg-minty{background: var(--minty);}
                        .fl-item.active {box-shadow: white 0px 0px 0px 2px, rgb(0, 170, 255) 0px 0px 0px 4px;}
                        .dropdown-item{line-height: 32px !important;}
                        .dropdown-item:hover{background-color: rgb(230, 247, 255);}
                        .dropdown-item:hover.trans{background-color: transparent;}
                        #projectinfo .dropdown-item.trans{max-height: calc(100vh - 80px);overflow-y: scroll;}
                        .dropdown-menu.carousel{position: absolute;}
                        .dropdown-item.fa::before, .dropdown-item.fal::before, .dropdown-item.far::before{padding-right: 10px;font-size: 1.2em;}

                        .imore::after {content: "\f105";float: right;display: inline-block;font-family: "Font Awesome 5 Pro";font-size: inherit;text-rendering: auto;-webkit-font-smoothing: antialiased;line-height: inherit;}
                        .iback{font-weight: bold;}
                        .iback::before {content: "\f104";float: left;padding-right: 20px;display: inline-block;font-family: "Font Awesome 5 Pro";font-size: inherit;font-weight: bold;text-rendering: auto;-webkit-font-smoothing: antialiased;line-height: inherit;}
                        [data-ref-btn]{color: white;}
                        [data-ref-btn].active{color: rgb(0, 170, 255);}
                        .project-avatar{width: 48px;height: 48px;border-radius: 100%;background-size: cover;background-position: center center;}
                        .project-more{text-align: center;transform: translate3d(0,25px,0) scale(2.5);}
                        .project-more i{cursor: pointer;}
                        .task-meta{margin-top: 1rem;}
                        .task-meta>div{margin-right: 0.75rem;}
                        .task-meta i {padding-right: 5px;}
                        .task-due{}
                        .task-comment{}
                        .task-checklist{}
                        .task-attachment{}
                        @media (min-width: 1200px){
                            .modal-lg {max-width: 1000px;}
                        }
                        .nav-tabs .nav-link{border: 0;text-transform: capitalize;}
                        .nav-tabs .nav-link:hover{background: none;}
                        .nav-tabs .nav-link.active{color: #007bff;}
                        .nav-tabs .nav-link:before, .nav-tabs-material .nav-tabs-indicator{background-color: #007bff;}
                        .tab-pane.fade {transition: all 0.3s;transform: translateX(30rem);}
                        .tab-pane.fade.show {transform: translateX(0rem);}
                        #modal .tab-content{padding: 5px 20px;width: 100%;height: 450px;overflow-y: scroll;}
                        .modal a:not(.btn):not(.nav-link){color: #007bff;text-decoration: none;}
                        .modal a:not(.btn):not(.nav-link):hover{
                            filter: brightness(85%);}
                        .switch {position: absolute;display: inline-block;width: 32px;height: 20px;margin: 3px;}

                        .switch input {
                            opacity: 0;width: 0;height: 0;}

                        .slider {position: absolute;cursor: pointer;top: 0;left: 0;right: 0;bottom: 0;background-color: #ccc;-webkit-transition: .2s;transition: .2s;}

                        .slider:before {position: absolute;content: "";height: 12px;width: 12px;left: 4px;bottom: 4px;background-color: white;-webkit-transition: .2s;transition: .2s;}

                        input:checked + .slider {background-color: #2196F3;}

                        input:focus + .slider {box-shadow: 0 0 1px #2196F3;}

                        input:checked + .slider:before {-webkit-transform: translateX(12px);-ms-transform: translateX(12px);transform: translateX(12px);}

                        .slider.round {border-radius: 12px;}

                        .slider.round:before {border-radius: 50%;}
                        .user-item{display: inline-flex;line-height: 25px;}
                        .user-item .icon{position: absolute;width: 30px;height: 30px;border-radius: 100%;background-size: cover;background-position: center center;margin-top: -3px;}
                        .user-item .email{flex-grow: 1;flex-shrink: 1;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;margin-right: 20px;cursor: default;color: rgb(138, 148, 153);}
                        .user-item .name{flex-grow: 1;flex-shrink: 1;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;margin-right: 20px;cursor: default;}
                        .list-group-item .close{margin-right: -1rem;padding-left: 0.5rem;opacity: 1;width: 24px;}
                        .list-group-item .close i{display: none;}
                        .list-group-item:hover .close i{display: block;}
                        .ckl{background-color: #f5f5f5;padding-top: .5rem;padding-bottom: .5rem;margin-left: .25rem;margin-right: .25rem;border-radius: .5rem
                        }
                        .ckl>div {height: 400px;overflow-y: scroll;}
                        .ckl .checklist-item{min-height: 40px;align-items: center;padding: 8px 20px;}
                        .ckl .checklist-item.active {background-color: rgb(0, 170, 255);color: white;}
                        .ckl .ck-item {padding: 5px 10px;border-radius: 5px;flex-grow: 1;flex-shrink: 1;align-items: center;pointer-events: all;}
                        .ckl .ck-item>.fal{font-size: 23px;color: rgb(0, 170, 255);}
                        .ckl .ck-item a {padding: 0 5px;}
                        .ckl .ck-item a i{padding-right: 10px;}
                        .ckl .ck-title {width: 100%; flex-grow: 1; flex-shrink: 1; white-space: pre-wrap; padding-left: 10px; padding-right: 10px; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; cursor: text;}
                        .ckl .ck-action {align-items: center; align-self: flex-start; opacity: 0;}
                        .ckl .ck-item:hover .ck-action{opacity: 1;}
                        .task-modal-title{width: 100%;margin: 10px 0;padding: 0 1rem;flex-grow: 1;font-size: 17px;font-weight: 400;line-height: 25px;letter-spacing: normal;}
                        .task-modal-input{width: 100%;margin: 10px 0;padding: 0 1rem;color: rgb(138, 148, 153);}
                        .task-modal-input input, .task-modal-input textarea{background-color: white; height: 36px; border-width: 1px; border-color: rgb(220, 226, 230); border-style: solid; color: rgb(61, 71, 77); border-radius: 5px; padding: 0px 10px; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; resize: none; width: 100%; outline: 0px;}
                        .task-modal-input textarea{height: auto;padding: 10px;}
                        .task-modal-input input:focus, .task-modal-input textarea:focus{border-color: rgb(0, 170, 255);}
                        .task-modal-input.row{margin-top: 20px;margin-bottom: 30px;padding: 0;}
                        .task-modal-input>div{display: inline-flex;}
                        .task-modal-input>div>i{padding-top: 3px;}
                        .task-modal-input .pri{line-height: 22px;font-size: 18px;}
                        .task-modal-input .sub{font-size: 15px;line-height: 20px;}
                        .task-modal-input .ico{width: 24px;height: 24px;padding: 12px;align-items: center;justify-content: center;box-shadow: rgb(0, 170, 255) 0px 0px 0px -1px inset;border-radius: 100%;background-size: cover;background-position: center center;}
                        .task-modal-input .inf {width: 100%;padding-left: 10px;}
                        .create-task{min-width: 140px;text-transform: capitalize;}
                        .task-detail{flex-direction: column;background-color: white;width: 100%;border-radius: 10px;}
                        .task-detail .task-header{min-height: 80px; padding: 30px; border-bottom-width: 1px; border-color: rgb(220, 226, 230); width: 100%; flex-shrink: 1;}
                        .task-detail .task-header .l{width: 100%; align-items: center; flex-shrink: 1;}
                        .task-detail .task-header .l>div{margin-right: 30px;}
                        .assigned{opacity: 1;cursor: pointer;width: 30px;height: 30px;position: relative;}
                        .assigned-icon img{width: 30px;height: 30px;border-radius: 100%;align-items: center;justify-content: center;box-shadow: rgb(0, 170, 255) 0px 0px 0px -1px inset;}
                        .assigned-text{width: 100%;height: 100%;border-radius: 100%;align-items: center;position: absolute;transform: scaleX(1) scaleY(1);justify-content: center;overflow: hidden;opacity:0;color: white;background-color: rgb(138, 148, 153);}
                        .assigned-text:empty{background-color: transparent;}
                        .assigned-icon:empty + .assigned-text{opacity:1;}
                        .assigned-empty{opacity: 0;width: 30px;height: 30px;position: absolute;}
                        [data-item-id]:hover .assigned-text:empty + .assigned-empty{opacity: 1;}

                        .assigned-to{width: 100%; flex-direction: column; padding-left: 15px; flex-shrink: 1;}
                        .assigned-to>span{font-size: 13px; line-height: 18px; font-weight: 400; letter-spacing: normal; color: rgb(138, 148, 153); position: absolute; white-space: nowrap; width: 100px; opacity: 0.8; transform: translateY(-7px);}
                        .assigned-users{display: flex; align-items: center;}
                        .assigned-users>span{white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 17px; line-height: 25px; font-weight: 500; letter-spacing: normal; align-items: center; margin-top: 0px; transform: translateY(8px);}
                        .assigned-users>span:nth-child(n+4){display: none;}
                        .assigned-users>span:before{content: ', '
                        }
                        .assigned-users>span:first-child:before{content: ''
                        }
                        .assigned-users>i{padding-top: 12px;padding-left: 10px;}
                        .task-actions a>i{font-size: 26px;line-height: 1;padding: 4px 10px;}
                        .task-pinned{border-radius: 18px;margin-right: 10px;color: #ffffff !important;width: 120px;}
                        .task-pinned>i{font-size: 1rem !important;}
                        .task-col-left{padding-top: 20px;padding-bottom: 20px;width: calc(100% - 260px);flex-direction: column;}
                        .task-col-right{width: 260px;flex-direction: column;border-left-width: 1px;border-bottom-right-radius: 10px;border-color: rgb(220, 226, 230);background-color: rgb(247, 249, 250);}
                        .task-col-right>div{flex-direction: column;box-shadow: rgb(220, 226, 230) 0px 1px 0px 0px;}
                        .task-col-right>div:last-child{padding: 20px;cursor: default;box-shadow: none;}
                        .task-col-right a{font-size: 13px; font-weight: 500; line-height: 18px; letter-spacing: normal; cursor: pointer; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: rgb(138, 148, 153) !important;}
                        .task-col-right .t-icon{width: 20px; height: 20px; color: rgb(138, 148, 153);font-size: 20px;}
                        .task-col-right .t-content{width: 100%; flex-grow: 1; flex-shrink: 1; padding-left: 12px; flex-direction: column;}
                        .task-col-right .t-content>div{font-size: 13px; font-weight: 500; line-height: 18px; letter-spacing: normal; color: rgb(138, 148, 153);}
                        .task-col-right .t-title{font-size: 15px; line-height: 22px; font-weight: 500; letter-spacing: normal; padding-left: 10px; padding-right: 10px; color: rgb(138, 148, 153);}
                        .task-col-right .t-line{padding: 20px; align-items: center; justify-content: space-between; cursor: pointer;}
                        .task-col-right .t-d-line{flex-wrap: wrap; margin-top: -10px; padding-bottom: 20px; padding-left: 40px; padding-right: 20px; cursor: pointer;}
                        .task-col-right .t-d-line>div{display: inline-flex; max-width: 100%;}
                        .task-col-right .t-d-line>div>img{width: 24px;height: 24px;border-radius: 50%;margin-right: 10px;}
                        .task-col-right .t-line>div:first-child{flex-grow: 1; flex-shrink: 1; align-items: center;}
                        .task-col-right .t-line>div:last-child{height: 24px; align-items: center;}
                        .task-col-left>div{flex-direction: column; padding-left: 20px; padding-right: 20px;margin-top: 20px;}
                        .task-col-left .l-title{padding: 5px 10px;flex-grow: 1;flex-shrink: 1;border-radius: 5px;cursor: text;width: 100%;font-size: 21px;font-weight: 500;line-height: 29px;letter-spacing: normal;}
                        .task-col-left .l-desc{padding: 5px 10px;flex-grow: 1;flex-shrink: 1;border-radius: 5px;cursor: text;font-size: 15px;font-weight: 400;line-height: 22px;letter-spacing: normal;width: 100%;color: rgb(138, 148, 153);}
                        .task-col-left .l-check{width: 100%;flex-grow: 1; flex-shrink: 1; flex-direction: column; box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 1px 0px 0px, rgba(0, 0, 0, 0) 0px 2px 0px 0px;}
                        .task-col-left .l-check .l-title{height: 42px; align-items: center; width: 100%;flex-grow: 1; flex-shrink: 1;}
                        .task-col-left .l-check .l-title .inline-editor{font-size: 17px; font-weight: 500; line-height: 25px; letter-spacing: normal; border-width: 0px; padding-top: 10px; padding-bottom: 10px; flex-grow: 1; background-color: transparent; text-overflow: ellipsis;}
                        .task-col-left .l-check .l-item{width: 100%; flex-direction: column;flex-grow: 1; flex-shrink: 1; margin-top: 5px; margin-bottom: 5px; border-radius: 5px; box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 1px 0px 0px, rgba(0, 0, 0, 0) 0px 2px 0px 0px;padding: 5px 10px;}
                        .task-col-left .l-check .l-add{align-items: center;height: 42px;padding: 0 15px;flex-grow: 1;flex-shrink: 1;color: rgb(0, 170, 255);cursor: pointer;font-size: 15px;font-weight: 500;line-height: 22px;letter-spacing: normal;}
                        .task-col-left .l-check .l-add>span{padding-left: 20px;}
                        .task-attachment{padding: 5px 10px;flex-direction: column;color: #3d474d;}
                        .task-attachment .t-title{height: 45px;align-items: center;font-size: 17px; font-weight: 500; line-height: 1; letter-spacing: normal; cursor: default;}
                        .task-attachment .t-title>i{margin-left: 10px;cursor: pointer;align-items: center;width: 16px;height: 16px;}
                        .task-attachment .t-files{flex-direction: column;width: 100%;}
                        .task-attachment .t-files .t-item{width: 88px;height: 88px;margin-right: 16px;border-radius: 10px;flex-direction: column;overflow: hidden;background-color: rgba(0, 0, 0, 0.05);display: inline-flex;align-items: center;justify-content: center;}
                        .no-bgc{background-color: transparent !important;}
                        .task-attachment .t-files .t-item .t-img{width: 88px;height: 88px;overflow: hidden;background-position: center center;background-size: contain;background-repeat: no-repeat;display: inline-block;text-align: center;}
                        .task-attachment .t-files .t-item .t-img>i{font-size: 88px;align-items: center;color: rgb(138, 148, 153);opacity: 0.4;}
                        .task-attachment .t-files .t-item .t-img:hover>i{opacity: .8;}
                        .task-attachment .t-files .t-item .t-fav{position: absolute; left: 4px; top: 4px; width: 22px; height: 22px; border-color: white; border-width: 2px; border-radius: 100%; color: rgb(255, 170, 0);font-size: 16px;}
                        .task-attachment .t-files .t-item .t-more{top: 5px; right: 5px; position: absolute;cursor: pointer;color: rgb(138, 148, 153);display: none;}
                        .task-attachment .t-files .t-item:hover .t-more{display: block;}
                        .task-attachment .t-add{align-items: center;height: 42px;padding: 0 5px;flex-grow: 1;flex-shrink: 1;color: rgb(0, 170, 255);cursor: pointer;font-size: 15px;font-weight: 500;line-height: 22px;letter-spacing: normal;}
                        .task-attachment .t-add>span{padding-left: 20px;}
                        .task-activity{padding: 5px 10px;flex-direction: column;color: #3d474d;}

                        .task-activity .t-title{height: 45px;align-items: center;font-size: 17px; font-weight: 500; line-height: 1; letter-spacing: normal; cursor: default;}
                        .task-activity .t-title>i{margin-left: 10px;cursor: pointer;align-items: center;width: 16px;height: 16px;}
                        .task-activity .t-form{flex-direction: column;color: rgb(220, 226, 230);}
                        .task-activity .t-form>div{flex-grow: 1; flex-direction: row;z-index: 0; border-radius: 5px; width: 100%; min-width: 0px; max-width: none; background-color: transparent; user-select: text; border-width: 1px; border-color: rgb(220, 226, 230);}
                        .task-activity .t-form>div:last-child{align-items: flex-start;flex-grow: 1;flex-direction: row;margin-top: 10px;margin-bottom: 10px;border: none;color: rgb(138, 148, 153); display: inline-block;}
                        .task-activity .t-form textarea{z-index: 1;color: rgb(61, 71, 77);position: relative;overflow-wrap: break-word;white-space: pre-wrap;word-break: break-word;box-sizing: border-box;font-size: 15px;padding: 8px 12px;line-height: 22px;min-height: 104px;font-weight: 400;width: 100%;border: none;resize: none;border-radius: 10px;}
                        .t-smile{width: 24px;height: 24px;color: rgb(138, 148, 153);font-size: 24px; float: left;}
                        .t-send{color: rgb(138, 148, 153);width: 36px;height: 36px;margin-left: 0px;font-size: 36px;float:right;}

                        .t-smile:hover, .t-send:hover{color: rgb(0, 170, 255);}
                        .t-detail{flex-direction: column; width: 100%;flex-grow: 1; flex-shrink: 1;}
                        .t-detail .t-item{width: 100%; justify-content: center; flex-direction: row; padding-top: 14px; padding-bottom: 14px;}
                        .t-detail .t-item>div.fa, .t-detail .t-item>div.fal{width: 32px;height: 32px;color: rgb(0, 170, 255);font-size: 32px;flex-direction: column;margin-right: 10px;}
                        .t-detail .t-item>div.with-bg{width: 32px;height: 32px;color: #ffffff;padding: 6px;font-size: 20px;border-radius: 50%;background-color: rgb(0, 170, 255);}
                        .t-detail .t-item>div:last-child{flex-direction: column; width: 100%; flex-grow: 1; flex-shrink: 1;}
                        .t-detail .t-item>div.t-info{flex-direction: column; width: 100%; flex-grow: 1; flex-shrink: 1;}
                        .t-react{flex-direction: row;justify-content: center;align-items: center;padding-left: 10px;font-size: 24px;}
                        .task-activity .t-info>div:first-child{flex-direction: row; width: 100%;}
                        .t-act{flex-direction: column; width: 100%; flex-grow: 1; flex-shrink: 1;}
                        .t-act .t-l1{color: rgb(138, 148, 153); text-transform: uppercase; font-size: 13px; font-weight: 700; line-height: 18px; letter-spacing: normal;flex-direction: row; padding-left: 6px;}
                        .t-act .t-l2{color: rgb(61, 71, 77); flex-shrink: 1; max-width: 100%; padding-left: 6px; padding-right: 6px; border-radius: 4px; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; overflow: hidden;}
                        .t-act .t-l2>span{font-size: 15px; font-weight: 500; line-height: 22px; letter-spacing: normal;padding-right: 5px;}
                        .t-act-sub{padding-left: 6px;color: rgb(138, 148, 153); font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal;}
                        .l-check .l-item>div{flex-grow: 1;flex-shrink: 1;align-items: center;pointer-events: all;}
                        .l-check .l-item .l-ico{align-self: flex-start;cursor: pointer;color: rgb(0, 170, 255);font-size: 22px;}
                        .l-check .l-item .l-t{width: 100%; flex-grow: 1; flex-shrink: 1; white-space: pre-wrap; padding-left: 10px; padding-right: 10px; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; cursor: text;font-size: 15px;font-weight: 400;line-height: 22px;letter-spacing: normal;white-space: pre-wrap;}
                        .l-check .l-item .l-a{align-items: center;align-self: flex-start;opacity: 1;}
                        .l-check .l-item .l-a>div{width: 16px; height: 16px; cursor: pointer; margin-right: 10px; color: rgb(138, 148, 153);}
                        .l-check .l-item .l-a>div:first-child{cursor: -webkit-grab;}

                        .l-check .l-item .l-a>div:last-child{margin-right: 0;}
                        .text-line-throught{text-decoration: line-through;}
                        .t-act-sub .t-attach-files{width: 100%; height: 100%; border-radius: 10px; flex-direction: column; overflow: hidden; background-color: rgba(0, 0, 0, 0.05);}
                        .t-attach-thumb{width: calc(100% - 42px); overflow: hidden; cursor: pointer; align-self: center; flex-grow: 1; justify-content: center; border-radius: 10px; border-width: 1px; border-color: rgba(51, 60, 64, 0.1);}
                        .t-attach-thumb>img{max-width: 100%;max-height: 100%;border-radius: 10px;}
                        .t-attach-info{width: 100%;max-height: 230px;border-radius: 0px 0px 10px 10px;overflow: hidden;flex-direction: row;cursor: pointer;align-items: center;padding: 10px 15px; font-size: 24px;}
                        .task-status{overflow: hidden;width: 100%;height: 40px;flex-grow: 1;align-items: center;border-top-left-radius: 10px;border-top-right-radius: 10px;padding: 0 20px;font-weight: 500;letter-spacing: normal;line-height: 22px;}
                        .task-status.complete{background-color: rgba(61, 204, 61, 0.2);color: rgb(61, 204, 61);}
                        .task-status.due{background-color: rgba(255, 170, 0, 0.2);color: rgb(255, 170, 0);}
                        .task-status.complete:before{font-family: "Font Awesome 5 Pro";content: "\f058";font-size: 20px;padding-right: 10px;}
                        .task-status.complete:after{font-family: Avenir,Avenir Next,Segoe UI,Helvetica,Arial,sans-serif;content: 'Completed';font-size: 15px;}
                        .task-status.due:before{font-family: "Font Awesome 5 Pro";content: "\f073";font-size: 20px;padding-right: 10px;}
                        .task-status.due:after{font-family: Avenir,Avenir Next,Segoe UI,Helvetica,Arial,sans-serif;content: 'Overdue';font-size: 15px;}
                        .task-coll-item{display: flex; flex-grow: 1; flex-shrink: 1; width: 100%;cursor: pointer;min-height: 64px;padding-top: 10px;flex-direction: column;align-items: center;opacity: 1;}
                        .task-coll-item>div{display: inline-flex; max-width: 100%; align-items: center; flex-direction: column;}
                        .task-coll-item .it-line{min-height: 0px !important;}
                        .task-coll-item .it-invite{width: 32px;height: 32px;border-radius: 100%;background-color: rgb(0, 170, 255);margin-top: 10px;margin-bottom: 10px;align-items: center;justify-content: center;cursor: pointer;padding: 0 3px;color: white;font-size: 24px;}
                        .task-coll-item .it-name{width: 80px; color: rgb(255, 255, 255); font-size: 13px; font-weight: 500; line-height: 18px; letter-spacing: normal; margin-top: 3px; margin-bottom: 1px; padding-left: 10px; padding-right: 10px; white-space: nowrap; overflow: hidden; text-align: center; text-overflow: ellipsis;}
                        .task-coll-item .it-num{font-size: 17px; font-weight: 400; line-height: 25px; letter-spacing: normal; color: rgb(138, 148, 153);}
                        .task-coll-item .it-user-avatar{width: 32px; height: 32px; border-radius: 100%; align-items: center; justify-content: center; box-shadow: rgb(0, 170, 255) 0px 0px 0px -1px inset;}
                        .task-coll-item .it-user-avatar>div{top: 0px; left: 0px; width: 100%; height: 100%; border-radius: 100%; align-items: center; position: absolute; transform: scaleX(1) scaleY(1); justify-content: center; overflow: hidden;}
                        .task-coll-item.active .it-user-avatar{box-shadow: rgb(0, 170, 255) 0px 0px 0px 2px inset !important;}
                        .task-coll-item.active .it-user-avatar>div{transform: scaleX(0.75) scaleY(0.75) !important;}
                        .btn-light-blue{color: white;border-radius: 38px;text-transform: capitalize;background-color: rgb(0, 170, 255);border-color: rgb(0, 170, 255);}
                        .btn-light-blue:hover{color: white !important;}
                        .no-shadow{box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px !important;}
                        .section-properties{z-index: 2;display: flex;flex-grow: 1;flex-shrink: 1;width: 380px;min-height: 64px;padding-top: 10px;flex-direction: column;align-items: center;opacity: 1;}
                        .section-properties>div{padding: 5px 0;flex-direction: column;width: 100%;background-color:#ffffff;border-radius: 10px;}
                        .section-properties>div>i{position: absolute;top: 22px;right: 10px;font-size: 25px;padding: 5px;cursor: pointer;}
                        .section-properties .tab-content{padding: 0 15px 15px;overflow-y: scroll;}
                        .popover{border: none;border-radius: 10px;margin-top: 0;max-width: 380px;}

                        .popover-body{padding: 0;min-width: 280px;max-width: 380px;}
                        .idivider{border-bottom: 1px solid #e9ecef;padding-bottom: 1rem;margin-bottom: 0.5rem;}

                        .pop-item{-webkit-box-align: center;-ms-flex-align: center;align-items: center;width: 280px;transition: -webkit-transform .6s ease;transition: transform .6s ease;transition: transform .6s ease,-webkit-transform .6s ease;-webkit-backface-visibility: hidden;}
                        .pop-item a:first-child{border-radius: 10px 10px 0 0;}
                        .pop-item a:last-child{border-radius: 0 0 10px 10px;}

                        .section-ls-icons{display: flex;flex-flow: row wrap;max-width: 350px;margin-bottom: 10px;}
                        .section-ls-icons .item-icon{width: 40px;height: 40px;cursor: pointer;background-color: rgb(237, 241, 242);align-items: center;justify-content: center;overflow: hidden;border-radius: 100%;margin-right: 10px;margin-bottom: 10px;}
                        .section-ls-icons .item-icon>div{width: 24px;height: 24px;color: rgb(138, 148, 153);}
                        .section-ls-icons .item-icon.active {background-color: rgb(0, 170, 255);}
                        .section-ls-icons .item-icon.active>div{color: white;}
                        .section-ls-icons .item-icon:hover>div{color: rgb(0, 170, 255) !important;}
                        .section-ls-icons .item-more{font-size: 16px;padding: 17px;cursor: pointer;}
                        .section-ls-colors{justify-content: space-around;max-width: 350px;display: flex;flex-flow: row wrap;margin: 10px 0;}
                        .section-ls-colors .item-color{justify-content: center; align-items: center; width: 30px; height: 30px; cursor: pointer;}
                        .section-ls-colors .item-color>div{border-radius: 10px; width: 10px; height: 10px;}
                        .section-ls-colors .item-color.active>div{border-radius: 30px; width: 30px; height: 30px;}
                        .tab-content hr{margin: 0 -15px;}
                        .section-desc{font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal;color: rgb(138, 148, 153);padding: 20px 0;}
                        .section-desc:empty:before{content: "Add description";color: rgb(0, 170, 255);cursor: pointer;text-decoration: underline;}
                        .section-properties-basic{display:block;}
                        .advance .section-properties-basic{display:none;}
                        .section-properties-advance{display:none;}
                        .advance .section-properties-advance{display:block;}
                        .item-back{padding: 10px 20px 20px;box-shadow: rgb(230 233 235) 0px -2px 0px 0px inset;}
                        .item-back>i:before{padding-right: 10px;}
                        .item-back>i{cursor: pointer;}
                        .section-item-info{flex-grow: 1;flex-shrink: 1;width: 100%;position: relative;max-height: 300px;min-height: 300px;inset: 0px;overflow: hidden scroll;box-sizing: content-box;margin-bottom: 0px;margin-right: 0px;flex-direction: column;}
                        .section-item-info>div{padding: 15px;flex-direction: column;}
                        .section-item-info .section-scope{flex-direction: column;}
                        .section-item-info .section-scope>.kr-text{color: rgb(138, 148, 153); padding-bottom: 15px;}
                        .assigned-items{width: 100%; flex-direction: column;}
                        .assigned-title{flex-grow: 1; flex-shrink: 1; align-items: center; min-height: 40px; margin: 10px 0px; padding-left: 20px; padding-right: 20px;}
                        .assigned-title>div{flex-grow: 1; font-size: 17px; line-height: 25px; font-weight: 700; letter-spacing: normal; color: rgb(61, 71, 77); user-select: none; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;}
                        .assigned-title>a{color: rgb(0, 170, 255); cursor: pointer; text-decoration: underline; font-size: inherit; margin-left: 10px;}
                        .assigned-detail{flex-direction: column; width: 100%; flex-grow: 1; flex-shrink: 1; cursor: default; user-select: none;}
                        .assigned-detail .search-box{margin-bottom: 10px; padding-left: 20px; padding-right: 20px;}
                        .assigned-detail .search-box>div{background-color: white; height: 36px; border-width: 1px; border-color: rgb(0, 170, 255); border-style: solid; color: rgb(61, 71, 77); border-radius: 5px; padding: 0px 10px; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; resize: none; width: 100%; outline: 0px; display: flex;}
                        .assigned-detail .search-box>div>i{margin-right: 10px;padding: 10px 0;}
                        .assigned-detail .search-box>div>input{color: rgb(61, 71, 77); background-color: transparent; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; flex-grow: 1; flex-shrink: 1; width: 100%;}
                        .assigned-users-box{flex-grow: 1; flex-shrink: 1; width: 100%; overflow: hidden; position: relative; max-height: 260px; min-height: 0px; height: 139px;}
                        .assigned-ls-users{inset: 0px; min-width: 0px; min-height: 0px; display: flex; overflow: hidden scroll; height: 100%; box-sizing: content-box; margin-bottom: 0px; margin-right: 0px; flex-direction: column;}
                        .assigned-ls-users .user-item{display: flex; flex-grow: 1; flex-shrink: 1; width: 100%;align-items: center;}
                        .assigned-ls-users .user-item>.break-line{height: 1px;background-color: rgb(237, 241, 242);flex-grow: 1;margin-top: 4px;margin-bottom: 4px;}
                        .assigned-ls-users .user-item:hover{background-color: rgb(230, 247, 255);}
                        .assigned-ls-users .user-item>div:not(.break-line){flex-grow: 1;flex-shrink: 1;border-radius: 5px;cursor: pointer;padding: 8px 10px;align-items: center;min-height: 40px;margin-left: 10px;margin-right: 10px;}
                        .assigned-ls-users .user-item .user-item-icon{margin-right: 10px;width: 24px;height: 24px;border-radius: 100%;align-items: center;justify-content: center;box-shadow: rgb(0, 170, 255) 0px 0px 0px -1px inset;}
                        .assigned-ls-users .user-item .user-item-icon>div{top: 0px; left: 0px; width: 100%; height: 100%; border-radius: 100%; align-items: center; position: absolute; transform: scaleX(1) scaleY(1); justify-content: center; overflow: hidden; background-size: cover; background-position: center center;background-color: rgb(138, 148, 153);color: white;font-size: 12px;}
                        .assigned-ls-users .user-item .user-item-name{flex-grow: 1; flex-shrink: 1; font-size: 15px; font-weight: 400; line-height: 22px; letter-spacing: normal; align-items: center; width: 100%; color: rgb(61, 71, 77);}
                        .user-item-check{padding-left: 10px; align-items: flex-end;}
                    </style>

                </div><!-- End Left side columns -->

<script>
    $(document).on('click', '[data-list-type="dropdown"]', function(e){
        var item = $(e.target).closest('.item');
        var menu = $('.menu', $(this));
        var items = $('.item', $(this));
        var selectedItem = $('.text', $(this));
        var dr = $(this).children('.dropdown');
        if(menu.is(':visible')){
            if(item.length > 0){
                items.removeClass('active');
                selectedItem.html(item.html());
                item.addClass('active');
            }
            dr.removeClass('active').removeClass('visible');
            menu.removeClass('visible').addClass('hidden');
        }else{
            dr.addClass('active').addClass('visible');
            menu.addClass('visible').removeClass('hidden');
        }
    });

    $(function () {
        $(document).tooltip({ selector: '[data-toggle=tooltip]' });
    })
    Sortable.create(sections, {
        animation: 100,
        group: 'sections',
        draggable: '.section-c-item',
        handle: '.section-c-item-header',
        sort: true,
        filter: '.sortable-disabled',
        chosenClass: 'active',
        onStart: function(evt){
            console.log('start');
            console.log(evt);
        },
        onEnd: function(evt){
            console.log('end');
            console.log(evt);
        }
    });
    Sortable.create(sectionOpen, {
        animation: 100,
        group: 'tasks',
        draggable: '.task-item',
        handle: '.task-item',
        sort: true,
        onStart: function(evt){
            console.log('start');
            console.log(evt);
        },
        onEnd: function(evt){
            console.log('end');
            console.log(evt);
        }
    });

    Sortable.create(sectionInProgress, {
        group: 'tasks',
        handle: '.task-item',
        onStart: function(evt){
            console.log('start');
            console.log(evt);
        },
        onEnd: function(evt){
            console.log('end');
            console.log(evt);
        }
    });

    $(document).on('click', '[data-task-action="add"]',function(){
        if($.trim($('[data-task-target]', $(this).closest('.l0-zi1')).html()) === ''){
            $('[data-task-target]', $(this).closest('.l0-zi1')).append($('<input data-task-new type="text">'));
            $('input[data-task-new]', $(this).closest('.l0-zi1')).focus();
        }
    });


    $(document).on('focusout', 'input[data-task-new]', function(e) {
        var data = $('input[data-task-new]').val();
        console.log(data);
        $(this).remove();
    });
    $(document).click(function(event) {
        var $target = $(event.target);
        if(!$target.closest('#clickoutside').length &&
            $target.closest('#clickoutside').is(":visible")) {
            $target.closest('#clickoutside').hide();
        }
        if(($target.closest('.close').length > 0 || $target.closest('.dismiss').length > 0) && $target.closest('#modal').length > 0){
            $('#modal').modal('hide');
        }
    });

    $(document).on('click', '.imenu>.dropdown', function(e){
        $('.dropdown-menu', $(e.target).closest(".imenu")).show();
    });
    $(document).on({
        "click": function(e){
            if($('[data-list-type="dropdown"] .menu').is(':visible') ){
                var ut = $(e.target).closest('[data-list-type="dropdown"]');
                $('[data-list-type="dropdown"] .menu:visible').each(function(){
                    var ref = $(this).closest('[data-list-type="dropdown"]');
                    if(!ref.is(ut)){
                        var dr = $(this).closest('.dropdown');
                        dr.removeClass('active').removeClass('visible');
                        $(this).removeClass('visible').addClass('hidden');
                    }
                });

                console.log('selection visible');
            }
            if($('.popover-body').is(':visible')){
                $('.popover-body:visible').each(function(){
                    if(!$(this).is($(e.target).closest('.popover-body'))){
                        var refId = $(this).closest('div.popover').attr('id');
                        var aria = $(e.target).closest('[aria-describedby]');
                        if(refId !== aria.attr('aria-describedby')){
                            $(this).closest('div.popover').popover('hide');
                        }
                    }
                });
            }
            if(!$(e.target).closest(".imenu").length){
                if($(".dropdown-menu:visible").hasClass('carousel')){
                    $(".dropdown-menu:visible").carousel(0).carousel('pause');
                }
                $(".dropdown-menu").hide();
            }else{
                var ci = $(e.target).closest(".dropdown-item");
                if(ci.length>0){
                    if(!ci.hasClass('imore') && !ci.hasClass('iback')){
                        if($(".dropdown-menu:visible").hasClass('carousel')){
                            $(".dropdown-menu:visible").carousel(0).carousel('pause');
                        }
                        $(".dropdown-menu").hide();
                    }
                }
            }
        }
    });
    $(document).on('click', '[data-project-action]', function(){
        var action = $(this).attr('data-project-action');
        switch(action){
            case 'properties':{
                if(!$('#modal .modal-dialog').hasClass('modal-lg')){
                    $('#modal .modal-dialog').addClass('modal-lg');
                }
                $('#modal .modal-body').html(' <div class="row"><div class="col-md-1"><div class="project-avatar" style="background-image: url(https://www.meistertask.com/production/assets/a28d414b034083194f6b4c3a2fae878b.png);"></div></div><div class="col-md-10"><div class="project-modal-title" style="font-size: 21px;font-weight: 500;line-height: 25px;letter-spacing: normal;padding: 3px 10px;">My First Project</div><div class="project-modal-desc" style="padding: 0 10px;flex-grow: 1;flex-shrink: 1;border-radius: 5px;cursor: text;font-size: 15px;font-weight: 400;line-height: 22px;letter-spacing: normal;width: 100%;color: rgb(138, 148, 153);">description</div></div><div class="col-md-1 project-more"><i class="fal fa-ellipsis-h"></i></div></div><div class="row"><ul class="nav nav-tabs w-100 mb-3" id="myTab" role="tablist" style="padding: 0 25px;"><li class="nav-item" role="presentation"><a class="nav-link active show" data-bs-toggle="tab" data-toggle="tab" href="#members" role="tab" aria-controls="members" aria-selected="true">Members</a></li><li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" data-toggle="tab" href="#requests" role="tab" aria-controls="requests" aria-selected="false">Requests</a></li><li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" data-toggle="tab" href="#automations" role="tab" aria-controls="automations" aria-selected="false">Automations</a></li><li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" data-toggle="tab" href="#checklists" role="tab" aria-controls="checklists" aria-selected="false">Checklists</a></li><li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" data-toggle="tab" href="#tags" role="tab" aria-controls="tags" aria-selected="false">Tags</a></li><li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" data-toggle="tab" href="#customfields" role="tab" aria-controls="customfields" aria-selected="false">Custom Fields</a></li><div class="nav-tabs-indicator" style="left: 304.094px; right: 399.047px;"></div><div class="nav-tabs-indicator" style="left: 25px; right: 885.031px;"></div><div class="nav-tabs-indicator" style="left: 25px; right: 885.031px;"></div></ul><div class="tab-content"><div class="tab-pane fade active show" id="members" role="tabpanel" aria-labelledby="members-tab"><ul class="list-group-flush p-0" style="height: 300px;overflow-y: scroll;"><li class="list-group-item d-flex justify-content-between align-items-center"><div class="user-item w-100"><div class="col-md-1 p-0"><label data-toggle="tooltip" title="" class="switch" data-original-title="Toglge admin mode"><input type="checkbox" checked=""><span class="slider round"></span></label></div><div class="col-md-1 p-0"><div class="icon" style="background-image: url(https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c);"></div></div><div class="name col-md-4 p-0">Hoang Minh Tue</div><div class="email col-md-6 p-0">Hoang Minh Tue</div></div><span class="badge badge-primary badge-pill">14</span><a class="close" href="javascript: void(0);"><i class="fal fa-times"></i></a></li><li class="list-group-item d-flex justify-content-between align-items-center"><div class="user-item w-100"><div class="col-md-1 p-0"><label data-toggle="tooltip" title="" class="switch" data-original-title="Toglge admin mode"><input type="checkbox" checked=""><span class="slider round"></span></label></div><div class="col-md-1 p-0"><div class="icon" style="background-image: url(https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c);"></div></div><div class="name col-md-4 p-0">Hoang Minh Tue</div><div class="email col-md-6 p-0">Hoang Minh Tue</div></div><span class="badge badge-primary badge-pill">14</span><a class="close" href="javascript: void(0);"><i class="fal fa-times"></i></a></li><li class="list-group-item d-flex justify-content-between align-items-center"><div class="user-item w-100"><div class="col-md-1 p-0"><label data-toggle="tooltip" title="" class="switch" data-original-title="Toglge admin mode"><input type="checkbox" checked=""><span class="slider round"></span></label></div><div class="col-md-1 p-0"><div class="icon" style="background-image: url(https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c);"></div></div><div class="name col-md-4 p-0">Hoang Minh Tue</div><div class="email col-md-6 p-0">Hoang Minh Tue</div></div><span class="badge badge-primary badge-pill">14</span><a class="close" href="javascript: void(0);"><i class="fal fa-times"></i></a></li><li class="list-group-item d-flex justify-content-between align-items-center"><div class="user-item w-100"><div class="col-md-1 p-0"><label data-toggle="tooltip" title="" class="switch" data-original-title="Toglge admin mode"><input type="checkbox" checked=""><span class="slider round"></span></label></div><div class="col-md-1 p-0"><div class="icon" style="background-image: url(https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c);"></div></div><div class="name col-md-4 p-0">Hoang Minh Tue</div><div class="email col-md-6 p-0">Hoang Minh Tue</div></div><span class="badge badge-primary badge-pill">14</span><a class="close" href="javascript: void(0);"><i class="fal fa-times"></i></a></li><li class="list-group-item d-flex justify-content-between align-items-center"><div class="user-item w-100"><div class="col-md-1 p-0"><label data-toggle="tooltip" title="" class="switch" data-original-title="Toglge admin mode"><input type="checkbox" checked=""><span class="slider round"></span></label></div><div class="col-md-1 p-0"><div class="icon" style="background-image: url(https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c);"></div></div><div class="name col-md-4 p-0">Hoang Minh Tue</div><div class="email col-md-6 p-0">Hoang Minh Tue</div></div><span class="badge badge-primary badge-pill">14</span><a class="close" href="javascript: void(0);"><i class="fal fa-times"></i></a></li></ul><a href="javascript: void(0);"><i class="fal fa-plus"></i> Add Member </a></div><div class="tab-pane fade" id="requests" role="tabpanel" aria-labelledby="requests-tab"><ul class="list-group-flush p-0" style="height: 300px;overflow-y: scroll;"><li class="list-group-item d-flex pl-0 pr-0"><div class="user-item w-100"><div class="col-md-1 p-0"><div class="icon" style="background-image: url(https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c);"></div></div><div class="name col-md-5 p-0">Hoang Minh Tue</div><div class="email col-md-6 p-0">Hoang Minh Tue</div></div><div style="display: inherit; margin-top: -6px;"><a class="btn btn-primary mr-2" href="javascript: void(0);">Confirm</a><a class="btn btn-muted mr-1" href="javascript: void(0);">Delete</a></div></li></ul></div><div class="tab-pane fade" id="automations" role="tabpanel" aria-labelledby="automations-tab">automations</div><div class="tab-pane fade" id="checklists" role="tabpanel" aria-labelledby="checklists-tab"><div class="row ckl"><div class="col-md-4 border-right p-0"><div class="checklist-item">checklist name</div><div class="checklist-item active">checklist name</div><div class="checklist-item"><a href="javascript: void(0)"><i class="fal fa-plus"></i> Add Checklist</a></div></div><div class="col-md-8"><div class="kr-view ck-item"><i class="fal fa-circle"></i><div class="kr-text ck-title"><div>first test check list item</div></div><div class="kr-view ck-action"><i class="fal fa-times"></i></div></div><div class="kr-view ck-item"><a href="javascript: void(0);"><i class="fal fa-plus"></i> Add Checklist Item</a></div></div></div></div><div class="tab-pane fade" id="tags" role="tabpanel" aria-labelledby="tags-tab">tags</div><div class="tab-pane fade" id="customfields" role="tabpanel" aria-labelledby="customfields-tab">Custom Fields</div></div></div><div class="row"><div class="col-md-9"></div><div class="col-md-3"><a data-dismiss="modal" class="btn btn-primary float-right" href="javascript:void(0)">Done</a></div></div>');
            }
                break;
        }
        $('#modal').modal();
    });
    $(document).on('click', '[data-user-action]', function(){
        var action = $(this).attr('data-user-action');
        var showModal = false;
        switch(action){
            case 'create-task':{
                showModal = true;
                $('#modal .modal-dialog').removeClass('modal-lg');
                $('#modal .modal-body').html('<div class="row"><div class="task-modal-title">Add Task</div></div><div class="row"><div class="task-modal-input"><input placeholder="Task Title" type="text"></div></div><div class="row task-modal-input"><div class="col-md-6 pl-0 pr-1"><div data-list-type="dropdown" class="dropdown"><div class="ui fluid selection dropdown" tabindex="0"><i class="dropdown icon fal fa-chevron-down"></i><div class="text"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/jenny.jpg"> Jenny Hess</div><div class="menu transition hidden" tabindex="-1"><div class="item" data-value="jenny"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/jenny.jpg"> Jenny Hess </div><div class="item" data-value="elliot"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/elliot.jpg"> Elliot Fu </div><div class="item" data-value="stevie"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/stevie.jpg"> Stevie Feliciano </div><div class="item" data-value="christian"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/christian.jpg"> Christian </div><div class="item" data-value="matt"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/matt.jpg"> Matt </div><div class="item" data-value="justen"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/justen.jpg"> Justen Kitsune </div></div></div></div></div><div class="col-md-6 pl-1 pr-0"><div data-list-type="dropdown" class="dropdown"><div class="ui fluid selection dropdown" tabindex="0"><i class="dropdown icon fal fa-chevron-down"></i><div class="text"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/jenny.jpg"> Jenny Hess</div><div class="menu transition hidden" tabindex="-1"><div class="item" data-value="jenny"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/jenny.jpg"> Jenny Hess </div><div class="item" data-value="elliot"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/elliot.jpg"> Elliot Fu </div><div class="item" data-value="stevie"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/stevie.jpg"> Stevie Feliciano </div><div class="item" data-value="christian"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/christian.jpg"> Christian </div><div class="item" data-value="matt"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/matt.jpg"> Matt </div><div class="item" data-value="justen"><img class="ui mini avatar image" src="https://semantic-ui.com/images/avatar/small/justen.jpg"> Justen Kitsune </div></div></div></div></div></div><div class="row"><div class="col-md-9"></div><div class="col-md-3"><a class="btn btn-primary float-right create-task" href="javascript:void(0)">Create Task</a></div></div>');
            }
                break;
            case 'search':{
                showModal = true;
            }
                break;
            case "tasks":{
                $(this).popover({
                    html: true,
                    placement: 'bottom',
                    content: function() {
                        return '<h1>Hello</h1><i> Every one</i>';
                    }
                });
            }
                break;
            case "section":{
                $(this).popover({
                    html: true,
                    placement: 'bottom',
                    content: function() {
                        return '<div class="section-properties"><div class="section-properties-basic"><ul class="nav nav-tabs w-100 mb-3" role="tablist" style="padding: 0 10px;"><li class="nav-item" role="presentation"><a class="nav-link active show" data-bs-toggle="tab" data-toggle="tab" href="#appearance" role="tab" aria-controls="members" aria-selected="true">Appearance</a></li><li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" data-toggle="tab" href="#automations" role="tab" aria-controls="automations" aria-selected="false">Automations</a></li><div class="nav-tabs-indicator"></div></ul><i class="fal fa-ellipsis-h" data-user-action="section-more" data-original-title="" title=""></i><div class="tab-content"><div class="tab-pane fade active show" id="appearance" role="tabpanel" aria-labelledby="appearance-tab"><div class="section-ls-icons"><div class="kr-view item-icon active"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#wave"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#email"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#question"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#issue"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#home"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#computer"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#photo"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#music"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#tv"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#choice"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#design"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#cloud"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#travel"></use></svg></div></div><div class="kr-view item-more"><i class="fal fa-arrow-right"></i></div></div><div class="kr-view section-ls-colors"><div class="kr-view item-color"><div class="kr-view" style="background-color: rgb(217, 54, 81);"></div></div><div class="kr-view item-color"><div class="kr-view" style="background-color: rgb(255, 159, 26);"></div></div><div class="kr-view item-color"><div class="kr-view" style="background-color: rgb(255, 213, 0);"></div></div><div class="kr-view item-color"><div class="kr-view" style="background-color: rgb(138, 204, 71);"></div></div><div class="kr-view item-color"><div class="kr-view" style="background-color: rgb(71, 204, 138);"></div></div><div class="kr-view item-color"><div class="kr-view" style="background-color: rgb(48, 191, 191);"></div></div><div class="kr-view item-color active"><div class="kr-view" style="background-color: rgb(0, 170, 255);"></div></div><div class="kr-view item-color"><div class="kr-view" style="background-color: rgb(143, 126, 230);"></div></div><div class="kr-view item-color"><div class="kr-view" style="background-color: rgb(152, 170, 179);"></div></div></div><hr><div class="section-desc"></div></div><div class="tab-pane fade" id="automations" role="tabpanel" aria-labelledby="automations-tab"> automations </div></div></div><div class="section-properties-advance"><div class="kr-view item-back"><i class="fa fa-chevron-left"> Icons</i></div><div class="section-item-info"><div class="kr-view"><div class="kr-view section-scope"><div class="kr-text"> Productivity &amp; Workflow</div><div class="kr-view"><div class="section-ls-icons"><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#completed"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#diagram"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#document"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#inbox"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#backlog"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#idea"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#design"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#write"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#discussion"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#calendar"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#clock"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#goal"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#review"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#danger"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#postponed"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#delayed"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#feedback"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#agenda"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#bug"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#gear"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#improvement"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#choice"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#next"></use></svg></div></div><div class="kr-view item-icon active"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#wave"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#decision"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#paused"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#in_progress"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#website"></use></svg></div></div></div></div></div><div class="kr-view section-scope"><div class="kr-text"> Technology</div><div class="kr-view"><div class="section-ls-icons"><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#video"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#desktop"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#floppy"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#folder"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#game"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#phone"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#tablet"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#wearable"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#computer"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#photo"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#tv"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#email"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#ios"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#android"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#windows"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#cloud"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#call"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#application"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#atsign"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#wifi"></use></svg></div></div></div></div></div><div class="kr-view section-scope"><div class="kr-text"> Activities &amp; Nature</div><div class="kr-view"><div class="section-ls-icons"><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#bike"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#hike"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#car"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#travel"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#shopping"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#train"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#snowman"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#swim"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#run"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#weights"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#pumpkin"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#snowflake"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#bat"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#spider"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#development"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#cooking"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#read"></use></svg></div></div></div></div></div><div class="kr-view section-scope .last"><div class="kr-text"> Miscellaneous</div><div class="kr-view"><div class="section-ls-icons"><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#happy"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#sad"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#heart"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#thumbsup"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#issue"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#question"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#star"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#flag"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#book"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#gift"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#music"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#home"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#experiment"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#location"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#money"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#education"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#urgent"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#ticket"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#office"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#milestone"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#annoucement"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#dollasign"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#listen"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#see"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#ghost"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#skull"></use></svg></div></div><div class="kr-view item-icon"><div class="kr-view"><svg width="25" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink"><use xlink:href="#business"></use></svg></div></div></div></div></div></div></div></div></div>';
                    }
                });
            }
                break;
            case "section-more":{
                $(this).popover({
                    html: true,
                    placement: 'bottom',
                    content: function() {
                        return '<div class="pop-item active"><a class="dropdown-item fal fa-info-circle" href="javascript: void(0);" data-section-action="collapse">Collapse</a><a class="dropdown-item fal fa-image" href="#projectinfo" data-section-action="move">Move...</a><a class="dropdown-item fal fa-user-plus idivider" href="javascript: void(0);" data-section-action="del">Delete</a><a class="dropdown-item fal fa-archive" href="javascript: void(0);" data-section-action="complete">Complete Tasks</a><a class="dropdown-item fal fa-trash-alt idivider" href="javascript: void(0);" data-section-action="archive">Archive Completed Tasks</a><a class="dropdown-item fal fa-ellipsis-h" href="javascript: void(0);" data-section-action="print">Print...</a></div>';
                    }
                });
            }
                break;
        }
        if(showModal){
            $('#modal').modal();
        }else{
            console.log('show dropdown: ' + action);
        }

    });

    $(document).on('click', '[data-ref-btn="filter-activities"]', function(){
        var ref = $(this).attr('data-ref-btn');
        if($(this).hasClass('active')){
            $(this).removeClass('active')
            $('[data-ref-form=' + ref + ']').css('transform','translateX(0px)');
        }else{
            $(this).addClass('active');
            $('[data-ref-form=' + ref + ']').css('transform','translateX(-320px)');
        }
    });
    $(document).on('click', '[data-task-action]', function(e){
        var type = $(this).attr('data-task-action');
        switch(type){
            case 'assigned':{
                $(this).popover({
                    html: true,
                    placement: 'bottom',
                    content: function() {
                        return '<div class="kr-view assigned-items"><div class="kr-view assigned-title"><div class="kr-text">Assign</div><a class="kr-text" href="javascript:void(0);">Manage</a></div><div class="kr-view assigned-detail"><div class="kr-view search-box"><div class="kr-text"><i class="fal fa-search"></i><input placeholder="Find Person" tabindex="0" class="kr-view" value=""></div></div><div class="assigned-users-box"><div class="assigned-ls-users"><div class="user-item" data-item-id="64184931"><div class="kr-view"><div class="kr-view user-item-icon"><div class="kr-view">MB</div></div><div class="kr-text user-item-name">mediabox</div><div class="kr-view user-item-check"><i class="fal fa-check"></i></div></div></div><div class="user-item" data-item-id="64184931"><div class="kr-view"><div class="kr-view user-item-icon"><div class="kr-view" style="background-image: url(&quot;https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c&quot;);"></div></div><div class="kr-text user-item-name">mediabox</div><div class="kr-view user-item-check"><i class="fal fa-check"></i></div></div></div><div class="user-item" data-item-id="64184931"><div class="kr-view"><div class="kr-view user-item-icon"><div class="kr-view" style="background-image: url(&quot;https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c&quot;);"></div></div><div class="kr-text user-item-name">mediabox</div><div class="kr-view user-item-check"><i class="fal fa-check"></i></div></div></div><div class="user-item" data-item-id="line1"><div class="break-line"></div></div><div class="user-item" data-item-id="64184931"><div class="kr-view"><div class="kr-view user-item-icon"><div class="kr-view" style="background-image: url(&quot;https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c&quot;);"></div></div><div class="kr-text user-item-name">mediabox</div><div class="kr-view user-item-check"></div></div></div><div class="user-item" data-item-id="64184931"><div class="kr-view"><div class="kr-view user-item-icon"><div class="kr-view">MB</div></div><div class="kr-text user-item-name">mediabox</div><div class="kr-view user-item-check"></div></div></div></div></div></div></div>';
                    }
                });
            }
                break;
        }
    });
    $(document).on('click', '[data-item-id]', function(e){
        var refCheck = $(e.target).closest('[data-task-action="assigned"],.popover-body');
        if(refCheck.length === 0){
            $('#modal .modal-body').html('<div class="row" style="margin: -1rem;"><div class="kr-view task-detail"><div class="kr-view"><div class="kr-view task-header"><div class="kr-view l"><div class="kr-view"><a class="btn btn-outline-primary" href="javascript: void(0);">Complete</a></div><div style="flex-shrink: 1;"><div class="kr-view assigned"><div class="kr-view assigned-icon"><img src="https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c"></div><div class="kr-view assigned-to"><span class="kr-text">Assigned to</span><div class="kr-view assigned-users"><span>Minh Tuệ</span><span>MediaXox</span><i class="fal fa-chevron-down" style="padding-top: 12px;"></i></div></div></div></div></div><div class="kr-view"><div class="kr-view task-actions"><a class="btn btn-warning task-pinned"><i class="fa fa-thumbtack"></i>Focus</a><a href="javascript: void(0)"><i class="fal fa-ellipsis-h"></i></a><a href="javascript: void(0)" class="close"><i class="fal fa-times"></i></a></div></div></div></div><div class="kr-view"><div class="kr-view task-col-left"><div class="kr-view"><div class="kr-view l-title">test add other task</div><div class="kr-view l-desc">This task has no notes.</div></div><div class="kr-view"><div class="kr-view l-check"><div class="kr-view l-title"><div class="inline-editor">test check list</div><div class="kr-view"><i class="fal fa-chevron-down"></i></div></div><div class="kr-view l-item"><div class="kr-view"><div class="kr-view l-ico"><i class="fal fa-check-circle"></i></div><div class="kr-text l-t text-line-throught">First test check list item</div><div class="kr-view l-a"><div class="kr-view"><i class="fal fa-bars"></i></div><div class="kr-view"><i class="fal fa-times"></i></div><div class="kr-view"><i class="fal fa-chevron-down"></i></div></div></div></div><div class="kr-view l-item"><div class="kr-view"><div class="kr-view l-ico"><i class="fal fa-circle"></i></div><div class="kr-text l-t">second test check list item</div><div class="kr-view l-a"><div class="kr-view"><i class="fal fa-bars"></i></div><div class="kr-view"><i class="fal fa-times"></i></div><div class="kr-view"><i class="fal fa-chevron-down"></i></div></div></div></div><div class="kr-view l-add"><i class="fal fa-plus"></i><span>Add Checklist Item</span></div></div></div><div class="kr-view"><div class="kr-view task-attachment"><div class="kr-view t-title"><span>Attachments</span><i class="fal fa-chevron-down"></i></div><div class="kr-view t-files" style="flex-direction: column;width: 100%;"><div class="kr-view"><div class="kr-view t-item" data-toggle="tooltip" title="test filename.jpg" data-placement="bottom"><div class="kr-view t-img" style="background-image: url(&quot;https://www.meistertask.com/embed/at/25693329/thumb/b8f18992ebbdf7974cf23cbe320af38a9211b64a.png&quot;);"></div><div class="kr-view t-more"><i class="fal fa-chevron-circle-down"></i></div></div><div class="kr-view t-item"><div class="kr-view t-img" style="background-image: url(&quot;https://www.meistertask.com/embed/at/25693224/thumb/c7e7723b7119be578ba6e0007ed7cf07509b2405.png&quot;);"></div><div class="kr-view t-more"><i class="fal fa-chevron-circle-down"></i></div><div class="kr-view t-fav"><i class="far fa-star"></i></div></div><div class="kr-view t-item no-bgc"><div class="kr-view t-img"><i class="fal fa-file-archive"></i></div><div class="kr-view t-more"><i class="fal fa-chevron-circle-down"></i></div></div></div></div><div class="kr-view t-add"><i class="fal fa-plus"></i><span>Add Attachment</span></div></div></div><div class="kr-view"><div class="task-activity"><div class="kr-view t-title"><span>Activity</span><i class="fal fa-chevron-down"></i></div><div class="kr-view t-form"><div class="kr-view"><textarea placeholder="Add Comment" row="4"></textarea></div><div class="kr-view"><div class="kr-view t-smile"><i class="fal fa-smile"></i></div><div class="kr-view t-send"><i class="fa fa-arrow-circle-right"></i></div></div></div><div class="kr-view t-detail"><div class="kr-view t-item"><div class="fa fa-check-circle"></div><div class="kr-view t-info"><div class="kr-view"><div class="kr-view t-act" style="flex-direction: column; width: 100%; flex-grow: 1; flex-shrink: 1;"><div class="kr-text t-l1" title="January 18, 2021 3:45 PM">14 days ago</div><div class="kr-view t-l2"><span>Minh</span> completed the task</div></div><div class="kr-view t-react"><i class="fal fa-smile-plus"></i></div></div><div class="kr-view t-act-sub"></div></div></div><div class="kr-view t-item"><div class="fa fa-tasks with-bg bgc-teal"></div><div class="kr-view t-info"><div class="kr-view"><div class="kr-view t-act"><div class="kr-text t-l1" title="January 18, 2021 3:45 PM">14 days ago</div><div class="kr-text t-l2"><span>Minh</span> completed a checklist item</div></div><div class="kr-view t-react"><i class="fal fa-smile-plus"></i></div></div><div class="kr-view t-act-sub">second test check list item</div></div></div><div class="kr-view t-item"><div class="fal fa-calendar-alt with-bg bgc-warning"></div><div class="kr-view t-info"><div class="kr-view"><div class="kr-view t-act" style="flex-direction: column; width: 100%; flex-grow: 1; flex-shrink: 1;"><div class="kr-text t-l1" title="January 18, 2021 3:45 PM">14 days ago</div><div class="kr-view t-l2"><span>Minh</span> set a due date</div></div><div class="kr-view t-react"><i class="fal fa-smile-plus"></i></div></div><div class="kr-view t-act-sub text-color-warning">January 13, 2021 12:00 PM</div></div></div><div class="kr-view t-item"><div class="fa fa-list-ul with-bg bgc-green"></div><div class="kr-view t-info"><div class="kr-view"><div class="kr-view t-act" style="flex-direction: column; width: 100%; flex-grow: 1; flex-shrink: 1;"><div class="kr-text t-l1" title="January 18, 2021 3:45 PM">14 days ago</div><div class="kr-view t-l2"><span>Minh</span> added a checklist item</div></div><div class="kr-view t-react"><i class="fal fa-smile-plus"></i></div></div><div class="kr-view t-act-sub">first test check list item</div></div></div><div class="kr-view t-item"><div class="fa fa-paperclip with-bg bgc-cyan"></div><div class="kr-view t-info"><div class="kr-view"><div class="kr-view t-act" style="flex-direction: column; width: 100%; flex-grow: 1; flex-shrink: 1;"><div class="kr-text t-l1" title="January 18, 2021 3:45 PM">14 days ago</div><div class="kr-view t-l2"><span>Minh</span> attached a file</div></div><div class="kr-view t-react"><i class="fal fa-smile-plus"></i></div></div><div class="kr-view t-act-sub"><div class="kr-view t-attach-files"><div class="kr-view t-attach-thumb"><img src="https://www.meistertask.com/embed/at/25693329/medium/9823614e872b31458edb3ac5536c61ee4bd179ec.png"></div><div class="kr-view t-attach-info"><i class="fal fa-image text-color-purple"></i><div class="kr-view" style="flex-grow: 1; flex-shrink: 1;"><div class="kr-view" style="flex-grow: 1; flex-shrink: 1;"><div class="kr-text" style="font-size: 15px; line-height: 22px; font-weight: 400; letter-spacing: normal; padding-left: 10px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">1</div></div><div class="kr-view" style="align-items: center;"><div class="kr-text" style="font-size: 13px; line-height: 18px; font-weight: 700; letter-spacing: normal; padding-left: 10px; color: rgb(138, 148, 153); white-space: nowrap; text-transform: uppercase;">jpg</div></div></div></div></div></div></div></div><div class="kr-view t-item"><div class="fa fa-arrow-circle-right"></div><div class="kr-view t-info"><div class="kr-view"><div class="kr-view t-act"><div class="kr-text t-l1" title="January 18, 2021 3:45 PM">14 days ago</div><div class="kr-view t-l2"><span>Minh</span> → <span>Minh</span></div></div><div class="kr-view t-react"><i class="fal fa-smile-plus"></i></div></div><div class="kr-view t-act-sub"></div></div></div><div class="kr-view t-item"><div class="kr-view" style="flex-direction: column; padding-right: 10px;"><div class="kr-view" style="width: 32px; height: 32px; border-radius: 100%; align-items: center; justify-content: center; box-shadow: rgb(0, 170, 255) 0px 0px 0px -1px inset;"><img src="https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c" style="width: 32px;height: 32px;border-radius: 100%;align-items: center;justify-content: center;box-shadow: rgb(0, 170, 255) 0px 0px 0px -1px inset;"></div></div><div class="kr-view t-info"><div class="kr-view"><div class="kr-view t-act"><div class="kr-text t-l1" title="January 18, 2021 3:45 PM">14 days ago</div><div class="kr-view t-l2"><span>mediabox</span> moved the task to "Open"</div></div><div class="kr-view t-react"><i class="fal fa-smile-plus"></i></div></div><div class="kr-view t-act-sub"></div></div></div><div class="kr-view t-item"><div class="fa fa-plus-circle"></div><div class="kr-view t-info"><div class="kr-view"><div class="kr-view t-act"><div class="kr-text t-l1" title="January 18, 2021 3:45 PM">14 days ago</div><div class="kr-view t-l2"><span>mediabox</span> created the task</div></div><div class="kr-view t-react"><i class="fal fa-smile-plus"></i></div></div><div class="kr-view t-act-sub"></div></div></div></div></div></div></div><div class="kr-view task-col-right"><div class="kr-view"><div class="kr-view t-line"><div class="kr-view"><i class="fal fa-calendar-alt"></i><div class="kr-text t-title">Due Date</div></div><div class="kr-view"><i class="fal fa-chevron-down"></i></div></div></div><div class="kr-view"><div class="kr-view t-line"><div class="kr-view"><div class="kr-view" style="align-self: flex-start; width: 24px; height: 24px; color: rgb(138, 148, 153);"><svg width="100%" height="100%" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M11 16a3 3 0 0 1 0 6H7a3 3 0 0 1 0-6h4zm0 2H7a1 1 0 0 0-.117 1.993L7 20h4a1 1 0 0 0 0-2zm10-9a3 3 0 0 1 0 6h-9a3 3 0 0 1 0-6h9zm-6-7a3 3 0 0 1 0 6H4a3 3 0 1 1 0-6h11zm0 2H4a1 1 0 0 0-.117 1.993L4 6h11a1 1 0 0 0 0-2z"></path></svg></div><div class="kr-text t-title">Not Scheduled</div></div></div><div class="kr-view t-d-line"><div class="kr-view" style="border-radius: 10px;"><div class="kr-view" style="display: inline-flex; justify-content: center; align-items: center; width: 100%; height: 20px; padding: 6px 8px; border-radius: 5px; cursor: pointer; white-space: nowrap; border-width: 0px; border-color: rgb(61, 71, 77); background-color: rgb(255, 170, 0);"><div class="kr-view" style="width: 100%; height: 20px; align-items: center; border-radius: 10px;"><div class="kr-view" style="color: rgb(255, 255, 255); width: 12px; height: 12px; margin-left: 0px; margin-right: 4px;"><svg width="100%" height="100%" viewBox="0 0 16 16"><defs><path id="a3495267784" d="M8.401.782l2.443 4.124 4.743 1.01c.43.091.544.425.248.75l-3.234 3.56.49 4.747c.044.431-.244.64-.65.465L8 13.513l-4.44 1.925c-.404.174-.695-.03-.65-.465l.488-4.748L.165 6.667c-.294-.323-.186-.659.248-.751l4.743-1.01L7.599.782c.221-.374.579-.378.802 0zM8 4.98L5.089 7.366a.778.778 0 0 0-.103 1.107.809.809 0 0 0 1.127.101L7.2 7.682v3.432c0 .435.358.787.8.787.442 0 .8-.352.8-.787l-.001-3.431 1.088.891a.809.809 0 0 0 1.126-.1.778.778 0 0 0-.102-1.108L8 4.98z"></path></defs><use fill="currentColor" fill-rule="evenodd" xlink:href="#a3495267784"></use></svg></div><div class="kr-text" style="flex-grow: 1; text-align: center; color: rgb(255, 255, 255); font-size: 11px; line-height: 17px; font-weight: 500; letter-spacing: normal; user-select: none; pointer-events: none; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin: 0px; text-transform: uppercase;">Upgrade</div></div></div></div></div></div><div class="kr-view"><div class="kr-view t-line"><div class="kr-view"><i class="fal fa-tags"></i><div class="kr-text t-title">Tags</div></div><div class="kr-view"><i class="fal fa-chevron-down"></i></div></div></div><div class="kr-view"><div class="kr-view t-line"><div class="kr-view"><i class="far fa-eye"></i><div class="kr-text t-title">Watching</div></div><div class="kr-view"><i class="fal fa-chevron-down"></i></div></div><div class="kr-view t-d-line"><div class="kr-view"><img src="https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c"><img src="https://lh3.googleusercontent.com/a-/AOh14GgEf5vbVDV08X610Do7MyAmKPfIJ3qU6qeOmLtXuw=s96-c"></div></div></div><div class="kr-view"><div class="kr-view" style="flex-direction: column; align-items: flex-start;"><div class="kr-view"><a class="kr-text" href="/app/project/6FpvHDuF/my-first-project">My first project</a></div><div class="kr-view"><a class="kr-text" href="/app/project/6FpvHDuF/my-first-project?section=21765772">Open</a></div></div><div class="kr-view mt-3"><div class="kr-view t-icon"><i class="fal fa-plus-circle"></i></div><div class="kr-view t-content"><div class="kr-text">Created</div><div class="kr-text">January 12, 2021<br>4:21 PM</div></div></div><div class="kr-view mt-3"><div class="kr-view t-icon"><i class="fal fa-pen"></i></div><div class="kr-view t-content"><div class="kr-text">Updated</div><div class="kr-text">January 18, 2021<br>3:45 PM</div></div></div><div class="kr-view mt-3"><div class="kr-view"><a class="kr-view" href="javascript: void(0);"><div class="kr-view t-icon"><i class="fal fa-link"></i></div><div class="kr-view t-content"><div class="kr-text">Task ID</div><div class="kr-text">1HWP3r2b</div></div></a></div></div></div></div></div></div></div>');
            if(!$('#modal .modal-dialog').hasClass('modal-lg')){
                $('#modal>.modal-dialog').addClass('modal-lg');
            }
            $('#modal').modal();
        }
    });$('#modal').on('hidden.bs.modal', function (e) {
        $('#modal .modal-body').html('');
    })

    $(document).on('click', '[data-assigned-id]', function(){
        var id= $(this).attr('data-assigned-id');
        if(id === 'invite'){
            var html = '<div class="row mb-5"><div class="col-md-2 pr-0 "><div class="project-avatar float-right" style="background-image: url(https://www.meistertask.com/production/assets/a28d414b034083194f6b4c3a2fae878b.png);"></div></div><div class="col-md-10"><div class="project-modal-title" style="font-size: 21px;font-weight: 500;line-height: 25px;letter-spacing: normal;padding: 3px 10px;">My First Project</div><div class="project-modal-desc" style="padding: 0 10px;flex-grow: 1;flex-shrink: 1;border-radius: 5px;cursor: text;font-size: 15px;font-weight: 400;line-height: 22px;letter-spacing: normal;width: 100%;color: rgb(138, 148, 153);">description</div></div></div><div class="row"><div class="col-md-12" style="color: grey;font-size: 15px;line-height: 32px;font-weight: 500;letter-spacing: normal;">Share the project with others</div><div class="task-modal-input mt-0"><input placeholder="Enter email address or username" type="text"></div></div><div class="row mt-3"><div class="col-md-12" style="color: grey;font-size: 15px;line-height: 32px;font-weight: 500;letter-spacing: normal;">Include a personal message with your invitation</div><div class="task-modal-input mt-0 mb-4"><textarea placeholder="This is optional" rows="7"></textarea></div></div><div class="row"><div class="col-md-12"><a class="btn btn-primary float-right" href="javascript:void(0)">Invite</a><a data-dismiss="modal" class="btn btn-outline-secondary float-right mr-3" href="javascript:void(0)">Cancel</a></div></div>';
            if($('#modal .modal-dialog').hasClass('modal-lg')){
                $('#modal>.modal-dialog').removeClass('modal-lg');
            }
            $('#modal .modal-body').html(html);
            $('#modal').modal();
        }else{
            if($(this).hasClass('active')){
                console.log('clear filter');
                $(this).removeClass('active');
            }else{
                console.log('clear other filter');
                console.log('apply filter: ' + id);
                $(this).addClass('active');
            }
        }
    });
    $(document).on('click', '.section-properties .item-more', function(e){
        e.preventDefault();
        $('.section-properties').addClass('advance');
    });
    $(document).on('click', '.section-properties .item-back', function(e){
        e.preventDefault();
        $('.section-properties').removeClass('advance');
    });
</script>

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
