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

            <li class="{{ Request::routeIs('new_job') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('new_job') }}"><i class="fas fa-id-badge"></i><span>Request New Job</span></a>
            </li>

            <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-calendar-plus"></i><span>Book Meeting Slot</span></a>
            </li>

        </ul>

    </aside>
</div>
