@extends('components.client-layout')
@section('main-client-content')
    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{ route('Home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #fb8b24;">Fu Facts & Figures</span>
        </div>
    </div>

    <div class="container">

        <div class="post-item post-details" style="padding-top: 0px;">
            <div class="section-title ">
                <div class="post-content">
                    <p>
                    <blockquote class="text-center" style="background-color: whitesmoke;">
                        <span style="font-size: 18px;">
                            The Fact & Figures shows the admission and enrollment
                        </span>
                    </blockquote>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="about-section">

        <div class="container text-center" style="display: flex;">

            <div class="container" style="flex: 1;">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="hr-sect new4"><span>New Intake from 2015</span></div>
                        <p></p>
                        <strong>Freshman Admission</strong><br>
                        <p></p>
                        <canvas id="barChart01"></canvas>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="hr-sect new4"><span>Total Enrolment from 2015</span></div>
                        <p></p>
                        <strong>Total Enrollment</strong><br>
                        <p></p>

                        <canvas id="barChart02"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <hr class="new4">
        <p></p>

        <div class="container text-center" style="display: flex;">
            <div class="container" style="flex: 1;">
                <div class="row">
                    <div class="col">

                        <div class="hr-sect new4"><span>Foreign Students Intakes</span></div>
                        <p></p>
                        <strong>Countries</strong><br>
                        <p></p>  
                        <p></p>
                        <canvas id="pieChart01"></canvas>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="hr-sect new4"><span>Foreign Students Faculty Wise</span></div>
                        <p></p>
                        <strong>Total enrolment by faculty</strong><br>
                        <p></p>
                        <p></p>
                        <canvas id="pieChart02"></canvas>

                    </div>
                </div>
            </div>
        </div>

        <hr class="new4">
     
    </section>

    <script>
        // Get the canvas element for barChart01 -- BarCharts --
        var ctx = document.getElementById('barChart01').getContext('2d');
        var barChart01 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'New Intake',
                    data: @json($data['data']),
                    backgroundColor: 'rgba(8, 14, 44, 0.2)',
                    borderColor: 'rgba(8, 14, 44, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        // Get the canvas element for barChart02
        var ctx = document.getElementById('barChart02').getContext('2d');
        // Define the chart data
        var chartData = {
            labels: ['2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022'],
            datasets: [{
                label: 'Total enrollment',
                data: [513,516,594, 541, 690, 686, 1122, 1008],
                backgroundColor: 'rgba(255, 0, 0, 0.2)',
                borderColor: 'rgba(255, 0, 0, 1)',
                borderWidth: 1,
            }]
        };

        // Create the chart
        var barChart02 = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                responsive: true
            }
        });

        // Get the canvas element for pieChart01
        var ctx = document.getElementById('pieChart01').getContext('2d');
        // Define the chart data
        var chartData = {
            labels: ['Nigeria', 'South Sudan', 'Somalia', 'Tanzania', 'Iraq', 'United Kingdom',
                'United States of America', 'Morocco', 'India', 'Others'
            ],
            datasets: [{
                label: 'Intake: ',
                data: [21, 3, 3, 1, 1, 1, 1, 1, 1, 3],
                backgroundColor: ['rgba( 255, 99, 71, 0.9)', 'rgba(54, 162, 235, 0.9)',
                    'rgba(255, 205, 86, 0.9)', 'rgba(75, 192, 192, 0.9)', 'rgba(153, 102, 255, 0.9)',
                    'rgba(255, 159, 64, 0.9)'
                ],
            }]
        };
        // Create the chart
        var pieChart01 = new Chart(ctx, {
            type: 'pie',
            data: chartData,
            options: {
                responsive: true
            }
        });

        // Get the canvas element for pieChart02
        var ctx = document.getElementById('pieChart02').getContext('2d');
        // Define the chart data
        var chartData = {
            labels: ['Faculty of Engineering', 'Faculty of Telecommunication', 'Faculty of Architecture',
                'Faculty of Information Technology',
                'Faculty of Computer Science', 'Faculty of Art & Design', 'Faculty of Geoinformatics',
                'Faculty of Business Administration'
            ],
            datasets: [{
                label: 'Faculty: ',
                data: [246, 42, 59, 292, 58, 104, 10, 197],
                backgroundColor: ['rgba( 255, 99, 71, 0.9)', 'rgba(54, 162, 235, 0.9)',
                    'rgba(255, 205, 86, 0.9)', 'rgba(75, 192, 192, 0.9)', 'rgba(153, 102, 255, 0.9)',
                    'rgba(255, 159, 64, 0.9)'
                ],
            }]
        };
        // Create the chart
        var pieChart02 = new Chart(ctx, {
            type: 'pie',
            data: chartData,
            options: {
                responsive: true
            }
        });
    </script>
@endsection
