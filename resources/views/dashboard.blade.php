@extends('layouts.app')
@section('page-title', 'Dashboard')
@section('content')
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">{{ __('messages.sales') }}</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">{{ __('messages.last_7_days') }}</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">{{ __('messages.last_15_days') }}</a>
                                        <a class="dropdown-item" href="#">{{ __('messages.last_30_days') }}</a>
                                        <a class="dropdown-item" href="#">{{ __('messages.last_3_month') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h1 mb-3">75%</div>
                        <div class="d-flex mb-2">
                            <div>{{ __('messages.conversion_rate') }}</div>
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    7%
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon ms-1 icon-2">
                                        <path d="M3 17l6 -6l4 4l8 -8" />
                                        <path d="M14 7l7 0l0 7" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 75%" role="progressbar" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                <span class="visually-hidden">75% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">{{ __('messages.revenue') }}</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">{{ __('messages.last_7_days') }}</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">{{ __('messages.last_15_days') }}</a>
                                        <a class="dropdown-item" href="#">{{ __('messages.last_30_days') }}</a>
                                        <a class="dropdown-item" href="#">{{ __('messages.last_3_month') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <div class="h1 mb-0 me-2">$4,300</div>
                            <div class="me-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    8%
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon ms-1 icon-2">
                                        <path d="M3 17l6 -6l4 4l8 -8" />
                                        <path d="M14 7l7 0l0 7" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="chart-revenue-bg" class="chart-sm"></div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            window.ApexCharts &&
                                new ApexCharts(
                                    document.getElementById("chart-revenue-bg"), {
                                        chart: {
                                            type: "area",
                                            fontFamily: "inherit",
                                            height: 40,
                                            sparkline: {
                                                enabled: true,
                                            },
                                            animations: {
                                                enabled: false,
                                            },
                                        },
                                        dataLabels: {
                                            enabled: false,
                                        },
                                        fill: {
                                            opacity: 0.16,
                                            type: "solid",
                                        },
                                        stroke: {
                                            width: 2,
                                            lineCap: "round",
                                            curve: "smooth",
                                        },
                                        series: [{
                                            name: "Profits",
                                            data: [
                                                37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62,
                                                51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43,
                                                19, 46, 39, 62, 51, 35, 41, 67,
                                            ],
                                        }, ],
                                        tooltip: {
                                            theme: "dark",
                                        },
                                        grid: {
                                            strokeDashArray: 4,
                                        },
                                        xaxis: {
                                            labels: {
                                                padding: 0,
                                            },
                                            tooltip: {
                                                enabled: false,
                                            },
                                            axisBorder: {
                                                show: false,
                                            },
                                            type: "datetime",
                                        },
                                        yaxis: {
                                            labels: {
                                                padding: 4,
                                            },
                                        },
                                        labels: [
                                            "2020-06-20",
                                            "2020-06-21",
                                            "2020-06-22",
                                            "2020-06-23",
                                            "2020-06-24",
                                            "2020-06-25",
                                            "2020-06-26",
                                            "2020-06-27",
                                            "2020-06-28",
                                            "2020-06-29",
                                            "2020-06-30",
                                            "2020-07-01",
                                            "2020-07-02",
                                            "2020-07-03",
                                            "2020-07-04",
                                            "2020-07-05",
                                            "2020-07-06",
                                            "2020-07-07",
                                            "2020-07-08",
                                            "2020-07-09",
                                            "2020-07-10",
                                            "2020-07-11",
                                            "2020-07-12",
                                            "2020-07-13",
                                            "2020-07-14",
                                            "2020-07-15",
                                            "2020-07-16",
                                            "2020-07-17",
                                            "2020-07-18",
                                            "2020-07-19",
                                        ],
                                        colors: [tabler.getColor("primary")],
                                        legend: {
                                            show: false,
                                        },
                                    }
                                ).render();
                        });
                    </script>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">{{ __('messages.new_clients') }}</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">{{ __('messages.last_7_days') }}</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active"
                                            href="#">{{ __('messages.last_15_days') }}</a>
                                        <a class="dropdown-item" href="#">{{ __('messages.last_30_days') }}</a>
                                        <a class="dropdown-item" href="#">{{ __('messages.last_3_month') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <div class="h1 mb-3 me-2">6,782</div>
                            <div class="me-auto">
                                <span class="text-yellow d-inline-flex align-items-center lh-1">
                                    0%
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/minus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon ms-1 icon-2">
                                        <path d="M5 12l14 0" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div id="chart-new-clients" class="chart-sm"></div>
                        <script>
                            document.addEventListener(
                                "DOMContentLoaded",
                                function() {
                                    window.ApexCharts &&
                                        new ApexCharts(
                                            document.getElementById("chart-new-clients"), {
                                                chart: {
                                                    type: "line",
                                                    fontFamily: "inherit",
                                                    height: 40,
                                                    sparkline: {
                                                        enabled: true,
                                                    },
                                                    animations: {
                                                        enabled: false,
                                                    },
                                                },
                                                fill: {
                                                    opacity: 1,
                                                },
                                                stroke: {
                                                    width: [2, 1],
                                                    dashArray: [0, 3],
                                                    lineCap: "round",
                                                    curve: "smooth",
                                                },
                                                series: [{
                                                        name: "May",
                                                        data: [
                                                            37, 35, 44, 28, 36, 24, 65, 31, 37, 39,
                                                            62, 51, 35, 41, 35, 27, 93, 53, 61, 27,
                                                            54, 43, 4, 46, 39, 62, 51, 35, 41, 67,
                                                        ],
                                                    },
                                                    {
                                                        name: "April",
                                                        data: [
                                                            93, 54, 51, 24, 35, 35, 31, 67, 19, 43,
                                                            28, 36, 62, 61, 27, 39, 35, 41, 27, 35,
                                                            51, 46, 62, 37, 44, 53, 41, 65, 39, 37,
                                                        ],
                                                    },
                                                ],
                                                tooltip: {
                                                    theme: "dark",
                                                },
                                                grid: {
                                                    strokeDashArray: 4,
                                                },
                                                xaxis: {
                                                    labels: {
                                                        padding: 0,
                                                    },
                                                    tooltip: {
                                                        enabled: false,
                                                    },
                                                    type: "datetime",
                                                },
                                                yaxis: {
                                                    labels: {
                                                        padding: 4,
                                                    },
                                                },
                                                labels: [
                                                    "2020-06-20",
                                                    "2020-06-21",
                                                    "2020-06-22",
                                                    "2020-06-23",
                                                    "2020-06-24",
                                                    "2020-06-25",
                                                    "2020-06-26",
                                                    "2020-06-27",
                                                    "2020-06-28",
                                                    "2020-06-29",
                                                    "2020-06-30",
                                                    "2020-07-01",
                                                    "2020-07-02",
                                                    "2020-07-03",
                                                    "2020-07-04",
                                                    "2020-07-05",
                                                    "2020-07-06",
                                                    "2020-07-07",
                                                    "2020-07-08",
                                                    "2020-07-09",
                                                    "2020-07-10",
                                                    "2020-07-11",
                                                    "2020-07-12",
                                                    "2020-07-13",
                                                    "2020-07-14",
                                                    "2020-07-15",
                                                    "2020-07-16",
                                                    "2020-07-17",
                                                    "2020-07-18",
                                                    "2020-07-19",
                                                ],
                                                colors: [
                                                    tabler.getColor("primary"),
                                                    tabler.getColor("gray-600"),
                                                ],
                                                legend: {
                                                    show: false,
                                                },
                                            }
                                        ).render();
                                }
                            );
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">{{ __('messages.active_users') }}</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">{{ __('messages.last_7_days') }}</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active"
                                            href="#">{{ __('messages.last_15_days') }}</a>
                                        <a class="dropdown-item" href="#">{{ __('messages.last_30_days') }}</a>
                                        <a class="dropdown-item" href="#">{{ __('messages.last_3_month') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <div class="h1 mb-3 me-2">2,986</div>
                            <div class="me-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    4%
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon ms-1 icon-2">
                                        <path d="M3 17l6 -6l4 4l8 -8" />
                                        <path d="M14 7l7 0l0 7" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div id="chart-active-users" class="chart-sm"></div>
                        <script>
                            document.addEventListener(
                                "DOMContentLoaded",
                                function() {
                                    window.ApexCharts &&
                                        new ApexCharts(
                                            document.getElementById("chart-active-users"), {
                                                chart: {
                                                    type: "bar",
                                                    fontFamily: "inherit",
                                                    height: 40,
                                                    sparkline: {
                                                        enabled: true,
                                                    },
                                                    animations: {
                                                        enabled: false,
                                                    },
                                                },
                                                plotOptions: {
                                                    bar: {
                                                        columnWidth: "50%",
                                                    },
                                                },
                                                dataLabels: {
                                                    enabled: false,
                                                },
                                                fill: {
                                                    opacity: 1,
                                                },
                                                series: [{
                                                    name: "Profits",
                                                    data: [
                                                        37, 35, 44, 28, 36, 24, 65, 31, 37, 39,
                                                        62, 51, 35, 41, 35, 27, 93, 53, 61, 27,
                                                        54, 43, 19, 46, 39, 62, 51, 35, 41, 67,
                                                    ],
                                                }, ],
                                                tooltip: {
                                                    theme: "dark",
                                                },
                                                grid: {
                                                    strokeDashArray: 4,
                                                },
                                                xaxis: {
                                                    labels: {
                                                        padding: 0,
                                                    },
                                                    tooltip: {
                                                        enabled: false,
                                                    },
                                                    axisBorder: {
                                                        show: false,
                                                    },
                                                    type: "datetime",
                                                },
                                                yaxis: {
                                                    labels: {
                                                        padding: 4,
                                                    },
                                                },
                                                labels: [
                                                    "2020-06-20",
                                                    "2020-06-21",
                                                    "2020-06-22",
                                                    "2020-06-23",
                                                    "2020-06-24",
                                                    "2020-06-25",
                                                    "2020-06-26",
                                                    "2020-06-27",
                                                    "2020-06-28",
                                                    "2020-06-29",
                                                    "2020-06-30",
                                                    "2020-07-01",
                                                    "2020-07-02",
                                                    "2020-07-03",
                                                    "2020-07-04",
                                                    "2020-07-05",
                                                    "2020-07-06",
                                                    "2020-07-07",
                                                    "2020-07-08",
                                                    "2020-07-09",
                                                    "2020-07-10",
                                                    "2020-07-11",
                                                    "2020-07-12",
                                                    "2020-07-13",
                                                    "2020-07-14",
                                                    "2020-07-15",
                                                    "2020-07-16",
                                                    "2020-07-17",
                                                    "2020-07-18",
                                                    "2020-07-19",
                                                ],
                                                colors: [tabler.getColor("primary")],
                                                legend: {
                                                    show: false,
                                                },
                                            }
                                        ).render();
                                }
                            );
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-1">
                                                <path
                                                    d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                                <path d="M12 3v3m0 12v3" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">132 Sales</div>
                                        <div class="text-secondary">
                                            12 waiting payments
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/shopping-cart -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-1">
                                                <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M17 17h-11v-14h-2" />
                                                <path d="M6 5l14 1l-1 7h-13" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">78 Orders</div>
                                        <div class="text-secondary">32 shipped</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-x text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/brand-x -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-1">
                                                <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                                <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">623 Shares</div>
                                        <div class="text-secondary">16 today</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-facebook text-white avatar">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/brand-facebook -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-1">
                                                <path
                                                    d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">132 Likes</div>
                                        <div class="text-secondary">21 today</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
