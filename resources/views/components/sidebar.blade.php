@php
$links = [
    [
        "href" => "dashboard",
        "text" => "Dashboard",
        "is_multi" => false,
    ],
    [
        "href" => [
            [
                "section_text" => "User",
                "section_list" => [
                    ["href" => "user", "text" => "Data User"],
                    ["href" => "user.new", "text" => "Buat User"]
                ]
            ]
        ],
        "text" => "User",
        "is_multi" => true,
    ],
];
$navigation_links = array_to_object($links);


$role = auth()->user()->role;
#echo request();

@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="./img/serbaDK.png" alt="">
            </a>
        </div>
        
        <ul class="sidebar-menu">
            <li class="menu-header">Main Task</li>
            
            <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fab fa-stack-overflow"></i><span>Main Task</span></a>
            </li>
            @if ($role != "printer")
            <li class="{{ Request::routeIs('new_job') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('new_job') }}"><i class="fas fa-id-badge"></i><span>Request New Job</span></a>
            </li>
            @endif

            @if ($role =="superadmin" || $role ==  "admin")
            <li class="{{ Request::routeIs('inventory') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('inventory') }}"><i class="fas fa-warehouse"></i><span>Inventory</span></a>
            </li>

            <li class="{{ Request::routeIs('approve_meeting') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('approve_meeting') }}"><i class="fas fa-clipboard"></i><span>Approve Meeting</span></a>
            </li>

            <li class="{{ Request::routeIs('register_leaves') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('register_leaves') }}"><i class="fas fa-hiking"></i><span>Register Leaves</span></a>
            </li>

            <li class="{{ Request::routeIs('user.new') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.new') }}"><i class="fas fa-user-plus"></i><span>Create User</span></a>
            </li>


            @endif
            @if ($role =="user")

            <li class="{{ Request::routeIs('request_meeting') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('request_meeting') }}"><i class="fas fa-tasks"></i><span>Request Meeting</span></a>
            </li>

            
            @endif

            <li class="{{ Request::routeIs('help_center') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('help_center') }}"><i class="fas fa-question-circle"></i><span>Help Center</span></a>
            </li>


            {{-- <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-calendar-plus"></i><span>Book Meeting Slot</span></a>
            </li> --}}

        </ul>



    </aside>
</div>
