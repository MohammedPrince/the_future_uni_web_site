@extends('components.client-layout')
@section('main-client-content')

    <div class="site-breadcrumb">
        <div class="container">
            <a href="/Home"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #d1291f;">Fu Facts & Figures</span>
        </div>
    </div>


    <div class="container">

        <div class="post-item post-details" style="padding-top: 0px;">
            <div class="section-title ">
                <div class="post-content">
                    <p></p>

                    <p>
                    <blockquote class="text-center" style="background-color: whitesmoke;">
                        <span style="font-size: 18px;">
                            The Fact & Figures shows the admission and enrollment trend from 2010 to 2022.
                        </span>
                    </blockquote>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="about-section">
        {{-- container-wrapper  --}}
        <div class="container text-center" style="display: flex;">
            <div class="container" style="flex: 1;">
              <div class="row">
                <div class="col" >

                    <div class="hr-sect new4"><span>New Intake from 2010 to 2022</span></div>
                        <p></p>
                    <strong>Freshman Admission</strong><br> <p></p>

                    <canvas id="barChart01"></canvas>

                </div>
              </div>
            </div>
            
            <div class="container" style="flex: 1;">
              <div class="row">
                <div class="col">
                    <div class="hr-sect new4"><span>Total Enrolment from 2010 to 2022</span></div>
                    <p></p>
                    <strong>Total Enrollment</strong><br> <p></p>

                    <canvas id="barChart02"></canvas>

                </div>
              </div>
            </div>
          </div>
    

          <hr class="new4"><p></p>

          <div class="container text-center" style="display: flex;">
            <div class="container" style="flex: 1;">
              <div class="row">
                <div class="col" >

                    <div class="hr-sect new4"><span>Foreign Students New Intake 2022</span></div>
                        <p></p>
                    <strong>Countries</strong><br> <p></p>

                    <canvas id="pieChart01"></canvas>

                </div>
              </div>
            </div>
            
            <div class="container" style="flex: 1;">
              <div class="row">
                <div class="col">
                    <div class="hr-sect new4"><span>Foreign Students Faculty Wise 2022</span></div>
                    <p></p>
                    <strong>Total Enrollment</strong><br> <p></p>

                    <canvas id="pieChart02"></canvas>

                </div>
              </div>
            </div>
          </div>

          <p></p><hr class="new4"><p></p>

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
      labels: ['2011', '2012', '2013', '2014', '2015','2016','2017','2018'],
      datasets: [{
        label: 'Total enrollment',
        data: [1080, 1822, 2020, 2157, 2504, 2624],
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
      labels: ['Nigeria', 'South Sudan', 'Somalia', 'Tanzania', 'Iraq', 'United Kingdom','United States of America','Morocco','India','Others'],
      datasets: [{
        label: 'Intake: ',
        data: [21, 3, 3, 1, 1, 1,1,1,1,3],
        backgroundColor: ['rgba( 255, 99, 71, 0.9)', 'rgba(54, 162, 235, 0.9)', 'rgba(255, 205, 86, 0.9)', 'rgba(75, 192, 192, 0.9)', 'rgba(153, 102, 255, 0.9)', 'rgba(255, 159, 64, 0.9)'],
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
      labels: ['Faculty of Engineering', 'Faculty ofTelecommunication', 'Faculty of Architecture', 'Faculty of Information Technology', 
      'Faculty of Computer Science', 'Faculty of Art & Design','Faculty of Geoinformatics','Faculty of Postgraduate Studies'],
      datasets: [{
        label: 'Faculty: ',
        data: [21, 2, 9, 40, 9, 4,5,3],
        backgroundColor: ['rgba( 255, 99, 71, 0.9)', 'rgba(54, 162, 235, 0.9)', 'rgba(255, 205, 86, 0.9)', 'rgba(75, 192, 192, 0.9)', 'rgba(153, 102, 255, 0.9)', 'rgba(255, 159, 64, 0.9)'],
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