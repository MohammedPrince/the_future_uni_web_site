<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo-basic.adminkit.io/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2023 11:29:01 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="The Future University-Admin Panel">
    <meta name="author" content="The Future University-Admin Panel">
    <meta name="keywords" content="">
        

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="shortcut icon" href="{{asset('./public/admin/img/logos/logo.png')}}" />

    <link rel="stylesheet" href="{{asset('./public/admin/css/easymde.min.css')}}">
    <!-- easymde.min.css -->

    <title>Fu Website Managment</title>
    <link href="{{asset('./public/admin/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('./public/admin/css/light.css')}}" rel="stylesheet">
    <link href="{{asset('./public/admin/css/alerts.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class='sidebar-brand text-center' href='add_user'>
                   <span class="align-middle">Fu-Website<br>Content Managment</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header"></li>

                    <li class="sidebar-item '@if ( (Request::is('profile')) ) active @endif ' ">
                        <a class='sidebar-link' href='{{route("profile")}}'>
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">My Profile</span>
                        </a>
                    </li>

                    <li class="sidebar-item '@if ( (Request::is('add_user')) || (Request::is('edit_user'))  ) active  @endif' ">
                        <a class='sidebar-link' href='{{route("add_user")}}'>
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manage Users</span>
                        </a>
                    </li>
                 

                    <li class="sidebar-item '@if ( (Request::is('add_event')) || (Request::is('edit_event'))  ) active @endif ' ">
                        <a class='sidebar-link' href='{{route("add_event")}}'>
                        {{--<!-- {{route("add_event")}} --> --}}
                            <i class="align-middle" data-feather="globe"></i> <span class="align-middle">Manage Events</span>
                        </a>
                    </li>

                    <li class="sidebar-item '@if ( (Request::is('add_news')) || (Request::is('edit_news'))  ) active @endif ' ">
                        <a class='sidebar-link' href='{{route("add_news")}}'>
                            {{-- {{route("add_news")}} --}}
                            <i class="align-middle" data-feather="paperclip"></i> <span class="align-middle">Manage News</span>
                        </a>
                    </li>
                    <li class="sidebar-item '@if ( (Request::is('linkage')) || (Request::is('edit_linkage'))  ) active @endif ' ">
                        <a class='sidebar-link' href='{{route("linkage")}}'>
                            <i class="align-middle" data-feather="link"></i> <span class="align-middle">Manage Linkage</span>
                        </a>
                    </li>

                    <li class="sidebar-item '@if ( (Request::is('fee_structure')) || (Request::is('edit_fee_structure'))  ) active @endif ' ">
                        <a class='sidebar-link' href='{{route("fee_structure")}}'>
                            <i class="align-middle" data-feather="slack"></i> <span class="align-middle">Fee Structure</span>
                        </a>
                    </li>

                    <li class="sidebar-item '@if ( (Request::is('staff')) || (Request::is('edit_staff_information'))  ) active @endif ' ">
                        <a class='sidebar-link' href='{{route("staff")}}'>
                            <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Staff Information</span>
                        </a>
                    </li>
                  
                    <!-- <li class="sidebar-header">
                        page divider
                    </li>

                    <li class="sidebar-item">
                        <a class='sidebar-link' href='#'>
                            <i class="align-middle" data-feather="cart"></i> <span class="align-middle">Test</span>
                        </a>
                    </li> -->
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">


                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                       
                       
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="{{asset('./public/admin/img/logos/logo.png')}}" class="avatar img-fluid rounded me-1"
                                    alt="Charles Hall" /> <span class="text-dark">{{ auth()->user()->user_fullname }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class='dropdown-item' href='profile'><i class="align-middle me-1"
                                        data-feather="user"></i> Profile</a>
                               
                               
                                <div class="dropdown-divider"></div>
                               
                                <a class="dropdown-item" href="logout">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>


            @yield('main-admin-content')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" href="{{route('CESD')}}"
                                    target="_blank"><strong>Designed and Developed by CESD <?php  echo date("Y");  ?></strong></a> 
                            </p>
                        </div>
                        <!-- <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
        <script>
            // const easyMDE = new EasyMDE({
            //     showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
            //     element: document.getElementById('markdown-editor'),
            // });

            const aboutMDE = new EasyMDE({
  showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
  element: document.getElementById('markdown-editor-about'),
});

const educationMDE = new EasyMDE({
  showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
  element: document.getElementById('markdown-Education'),
});

const skillsMDE = new EasyMDE({
  showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
  element: document.getElementById('markdown-skills'),
});

const publicationMDE = new EasyMDE({
  showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
  element: document.getElementById('markdown-publication'),
});

const workExperienceMDE = new EasyMDE({
  showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
  element: document.getElementById('markdown-editor-work-experience'),
});

const teaching_and_supervisionMDE = new EasyMDE({
  showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
  element: document.getElementById('markdown-teaching_and_supervision'),
});

const academic_recognition_and_leadershipMDE = new EasyMDE({
  showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
  element: document.getElementById('markdown-academic_recognition_and_leadership'),
});

const contactMDE = new EasyMDE({
  showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
  element: document.getElementById('markdown-contact'),
});
        </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" ></script>
    <script src="{{asset('./public/admin/js/app.js')}}"></script>
    <script src="{{asset('./public/admin/js/datatables.js')}}"></script>
    
   
    <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables with Buttons
			var datatablesButtons = $("#datatables-buttons").DataTable({
				responsive: true,
				lengthChange: !1,
				buttons: ["copy", "print"]
			});
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
		});
	</script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pie chart
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: "pie",
                data: {
                    labels: ["Chrome", "Firefox", "IE"],
                    datasets: [{
                        data: [4306, 3801, 1689],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning,
                            window.theme.danger
                        ],
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar chart
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ],
                    datasets: [{
                        label: "This year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var markers = [{
                    coords: [31.230391, 121.473701],
                    name: "Shanghai"
                },
                {
                    coords: [28.704060, 77.102493],
                    name: "Delhi"
                },
                {
                    coords: [6.524379, 3.379206],
                    name: "Lagos"
                },
                {
                    coords: [35.689487, 139.691711],
                    name: "Tokyo"
                },
                {
                    coords: [23.129110, 113.264381],
                    name: "Guangzhou"
                },
                {
                    coords: [40.7127837, -74.0059413],
                    name: "New York"
                },
                {
                    coords: [34.052235, -118.243683],
                    name: "Los Angeles"
                },
                {
                    coords: [41.878113, -87.629799],
                    name: "Chicago"
                },
                {
                    coords: [51.507351, -0.127758],
                    name: "London"
                },
                {
                    coords: [40.416775, -3.703790],
                    name: "Madrid "
                }
            ];
            var map = new jsVectorMap({
                map: "world",
                selector: "#world_map",
                zoomButtons: true,
                markers: markers,
                markerStyle: {
                    initial: {
                        r: 9,
                        strokeWidth: 7,
                        stokeOpacity: .4,
                        fill: window.theme.primary
                    },
                    hover: {
                        fill: window.theme.primary,
                        stroke: window.theme.primary
                    }
                },
                zoomOnScroll: false
            });
            window.addEventListener("resize", () => {
                map.updateSize();
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate
            });
        });
    </script>

</body>

</html>
