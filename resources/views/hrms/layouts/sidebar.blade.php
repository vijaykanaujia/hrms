<!-- -------------- Sidebar - Author -------------- -->
<div class="sidebar-widget author-widget">
    <div class="media">
        <a href="{{url('/profile')}}" class="media-left">
            @if(isset(Auth::user()->employee->photo))
                <img src="{{asset('public/photos/'.\Auth::user()->employee->photo)}}" width="40px" height="30px" class="img-responsive">
            @else
                <img src="{{ asset('public/assets/img/avatars/profile_pic.png') }}" class="img-responsive">
            @endif

        </a>

        <div class="media-body">
            <div class="media-author"><a href="{{url('/profile')}}">{{Auth::user()->name}}</a></div>
        </div>
    </div>
</div>

<!-- -------------- Sidebar Menu  -------------- -->
<ul class="nav sidebar-menu scrollable">
    <li class="active">
        <a  href="{{route('dashboard')}}">
            <span class="fa fa-dashboard"></span>
            <span class="sidebar-title">Dashboard</span>
        </a>
    </li>
    @if(Auth::user()->isHR())
        <li>
            <a class="accordion-toggle" href="{{route('dashboard')}}">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Employees</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-employee')}}">
                        <span class="fa fa-tag"></span> Add Employee </a>
                </li>
                <li>
                    <a href="{{route('employee-manager')}}">
                        <span class="fa fa-tag"></span> Employee Listing </a>
                </li>
                <li>
                    <a href="{{route('upload-emp')}}">
                        <span class="fa fa-tag"></span> Upload </a>
                </li>
            </ul>
        </li>

        @if(\Auth::user()->isAdmin() || \Auth::user()->isHR() || \Auth::user()->isManager())
            <li>
                <a class="accordion-toggle" href="{{route('dashboard')}}">
                    <span class="fa fa-user"></span>
                    <span class="sidebar-title">Clients</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{route('add-client')}}">
                            <span class="fa fa-tag"></span> Add Client </a>
                    </li>

                    <li>
                        <a href="{{route('list-client')}}">
                            <span class="fa fa-tag"></span> List Client </a>
                    </li>
                </ul>
            </li>
        @endif

        <li>
            <a class="accordion-toggle" href="{{route('dashboard')}}">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Projects</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-project')}}">
                        <i class="fa fa-tag"></i> Add Project </a>
                </li>

                <li>
                    <a href="{{route('list-project')}}">
                        <i class="fa fa-tag"></i> List Project</a>
                </li>

                <li>
                    <a href="{{route('assign-project')}}">
                        <i class="fa fa-tag"></i> Assign Project</a>
                </li>

                <li>
                    <a href="{{route('project-assignment-listing')}}">
                        <i class="fa fa-tag"></i> Project Assignment Listing</a>
                </li>
            </ul>
        </li>

        <li>

            <a href="{{route('bank-account-details')}}">
                <span class="fa fa-bank"></span>
                <span class="sidebar-title">Bank Account</span>
            </a>
        </li>

        <li>
            <a class="accordion-toggle" href="{{route('dashboard')}}">
                <span class="fa fa-group"></span>
                <span class="sidebar-title">Teams</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-team')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Team </a>
                </li>
                <li>
                    <a href="{{route('team-listing')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Team Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="{{route('dashboard')}}">
                <span class="fa fa-graduation-cap"></span>
                <span class="sidebar-title">Roles</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-role')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Role </a>
                </li>
                <li>
                    <a href="{{route('role-list')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Role Listings </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="accordion-toggle" href="{{route('dashboard')}}">
                <span class="fa fa fa-laptop"></span>
                <span class="sidebar-title">Assets</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-asset')}}">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Add Asset </a>
                </li>
                <li>
                    <a href="{{route('asset-listing')}}">
                        <span class="glyphicon glyphicon-calendar"></span> Asset Listings </a>
                </li>
                <li>
                    <a href="{{route('assign-asset')}}">
                        <span class="fa fa-desktop"></span> Assign Asset </a>
                </li>
                <li>
                    <a href="{{route('assignment-listing')}}">
                        <span class="fa fa-clipboard"></span> Assignment Listings </a>
                </li>
            </ul>
        </li>
    @endif
    <li>
        <a class="accordion-toggle" href="{{route('dashboard')}}">
            <span class="fa fa-envelope"></span>
            <span class="sidebar-title">Leaves</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="{{route('apply-leave')}}">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Apply Leave </a>
            </li>
            <li>
                <a href="{{route('my-leave-list')}}">
                    <span class="glyphicon glyphicon-calendar"></span> My Leave List </a>
            </li>

            @if(\Auth::user()->isHR())
                <li>
                    <a href="{{route('add-leave-type')}}">
                        <span class="fa fa-desktop"></span> Add Leave Type </a>
                </li>
                <li>
                    <a href="{{route('leave-type-listing')}}">
                        <span class="fa fa-clipboard"></span> Leave Type Listings </a>
                </li>
            @endif
            @if(Auth::user()->isHR() || Auth::user()->isCoordinator())
                <li>
                    <a href="{{route('total-leave-list')}}">
                        <span class="fa fa-clipboard"></span> Total Leave Listings </a>
                </li>
            @endif
        </ul>
    </li>

    @if(Auth::user()->isHR())
        <li>
            <a class="accordion-toggle" href="{{route('dashboard')}}">
                <span class="fa fa-arrow-circle-o-up"></span>
                <span class="sidebar-title">Promotions</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{url('/promotion')}}">
                        <span class="glyphicon glyphicon-book"></span> Promote </a>
                </li>
                <li>
                    <a href="{{url('/show-promotion')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Promotion Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="{{route('dashboard')}}">
                <span class="fa fa-money"></span>
                <span class="sidebar-title">Expenses</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-expense')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Expense </a>
                </li>
                <li>
                    <a href="{{route('expense-list')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Expense Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="{{route('dashboard')}}">
                <span class="fa fa fa-trophy"></span>
                <span class="sidebar-title">Awards</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{url('/add-award')}}">
                        <span class="fa fa-adn"></span> Add Award </a>
                </li>
                <li>
                    <a href="{{url('/award-listing')}}">
                        <span class="glyphicon glyphicon-calendar"></span> Award Listings </a>
                </li>
                <li>
                    <a href="{{url('/assign-award')}}">
                        <span class="fa fa-desktop"></span> Awardees </a>
                </li>
                <li>
                    <a href="{{url('/awardees-listing')}}">
                        <span class="fa fa-clipboard"></span> Awardees Listings </a>
                </li>
            </ul>
        </li>
    @endif


    <li>
        <a class="accordion-toggle" href="#">
            <span class="fa fa fa-gavel"></span>
            <span class="sidebar-title">Trainings</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            @if(\Auth::user()->notAnalyst())
                <li>
                    <a href="{{url('/add-training-program')}}">
                        <span class="fa fa-adn"></span> Add Training Program </a>
                </li>
            @endif
            <li>
                <a href="{{url('/show-training-program')}}">
                    <span class="glyphicon glyphicon-calendar"></span> Program Listings </a>
            </li>
            @if(\Auth::user()->notAnalyst())
                <li>
                    <a href="{{url('/add-training-invite')}}">
                        <span class="fa fa-desktop"></span> Training Invite </a>
                </li>
            @endif
            <li>
                <a href="{{url('/show-training-invite')}}">
                    <span class="fa fa-clipboard"></span> Invitation Listings </a>
            </li>
        </ul>
    </li>
    @if(Auth::user()->isHR())
        <li>
            <a class="accordion-toggle" href="#">
                <span class="fa fa-clock-o"></span>
                <span class="sidebar-title"> Attendance </span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('attendance-upload')}}">
                        <span class="glyphicon glyphicon-book"></span> Upload Sheets</a>
                </li>

            </ul>
        </li>

        <li>
            <a class="accordion-toggle" href="#">
                <span class="fa fa-tree"></span>
                <span class="sidebar-title">Holiday</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{url('/add-holidays')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Holiday </a>
                </li>
                <li>
                    <a href="{{url('/holiday-listing')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Holiday Listings </a>
                </li>
            </ul>
        </li>

    @endif

    {{--<li class="sidebar-label pt30"> Extras</li>--}}
    <li>
        <a href="{{url('/create-meeting')}}">
            <span class="fa fa-calendar-o"></span>
            <span class="sidebar-title"> Meeting  &nbsp Invitation </span>
        </a>
    </li>

    @if(Auth::user()->isCoordinator() ||  Auth::user()->isHR())
        <li>
            <a href="{{url('/create-event')}}">
                <span class="fa fa-calendar-o"></span>
                <span class="sidebar-title"> Event  &nbsp Invitation </span>
            </a>
        </li>
    @endif
    <li>

        <a href="{{url('/download-forms')}}">
            <span class="fa fa-book"></span>
            <span class="sidebar-title">Download Forms</span>

        </a>
    </li>

    <li>
        <a href="{{url('/hr-policy')}}">
            <span class="fa fa-gavel"></span>
            <span class="sidebar-title"> Company Policy </span>
        </a>
    </li>
    @if(\Auth::user()->isAdmin())
    <li>
        <a class="accordion-toggle" href="{{route('dashboard')}}">
            <span class="fa fa-cog"></span>
            <span class="sidebar-title">Settings</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="{{route('add-permissions')}}">
                    <span class="fa fa-tag"></span> Add Permission </a>
            </li>
            <li>
                <a href="{{route('get-permissions')}}">
                    <span class="fa fa-tag"></span> List Permission </a>
            </li>
        </ul>
    </li>
    @endif
    <p> &nbsp; </p>
</ul>
<!-- -------------- /Sidebar Menu  -------------- -->