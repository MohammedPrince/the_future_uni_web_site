@extends('components.client-layout')
@section('main-client-content')
    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{ route('Home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #fb8b24;">Fee Structure</span>
        </div>
    </div>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #DDD;
        }

        tr:hover {
            background-color: #D6EEEE;
        }
    </style>


    <section class="service-section spad">
        <div class="container services">
            <div class="section-title text-center">
                <h3>Bachelor (Honorous) Programs</h3>
                <!-- <p>Bachelore Programs</p> -->
            </div>

            <div class="table-container">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Program</th>
                        <th>Tuition Fees - Sudanese (SGD)</th>
                        <th>Registration Fees (SDG)</th>
                        <th>Tuition Fees - Foriegner (USD)</th>
                        <th>Registration Fees (USD)</th>
                    </tr>
                    <tr>
                        <td>Computer Engineering</td>
                        <td>2,000,000</td>
                        <td>700,000</td>
                        <td>5,600</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Electronics Engineering</td>
                        <td>2,000,000</td>
                        <td>700,000</td>
                        <td>5,600</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Mechatronics Engineering</td>
                        <td>3,000,000</td>
                        <td>700,000</td>
                        <td>5,600</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Biomeddical Engineering</td>
                        <td>3,000,000</td>
                        <td>700,000</td>
                        <td>5,600</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Renewable Engineering</td>
                        <td>2,000,000</td>
                        <td>700,000</td>
                        <td>5,600</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Telcommunication Engineering</td>
                        <td>2,200,000</td>
                        <td>700,000</td>
                        <td>6,700</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Architecture Engineering</td>
                        <td>2,200,000</td>
                        <td>700,000</td>
                        <td>6,700</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Computer Science</td>
                        <td>1,800,000</td>
                        <td>700,000</td>
                        <td>3,950</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Software Engineering</td>
                        <td>1,800,000</td>
                        <td>700,000</td>
                        <td>3,950</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>InformationTechnology</td>
                        <td>2,000,000</td>
                        <td>700,000</td>
                        <td>4,500</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Knowledge Management</td>
                        <td>1,800,000</td>
                        <td>700,000</td>
                        <td>3,950</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Knowledge Engineering</td>
                        <td>1,800,000</td>
                        <td>700,000</td>
                        <td>3,950</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Creative Multimedia</td>
                        <td>1,700,000</td>
                        <td>700,000</td>
                        <td>4,500</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Interior Design</td>
                        <td>2,000,000</td>
                        <td>700,000</td>
                        <td>4,500</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Graphics Technology</td>
                        <td>1,700,000</td>
                        <td>700,000</td>
                        <td>4,500</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Geoinformatics</td>
                        <td>1,600,000</td>
                        <td>700,000</td>
                        <td>4,500</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Business Administration</td>
                        <td>2,000,000</td>
                        <td>700,000</td>
                        <td>4,500</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Marketing</td>
                        <td>2,000,000</td>
                        <td>700,000</td>
                        <td>4,500</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Accounting and Finance</td>
                        <td>2,000,000</td>
                        <td>700,000</td>
                        <td>4,500</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Human Resource Management</td>
                        <td>2,000,000</td>
                        <td>700,000</td>
                        <td>4,500</td>
                        <td>300</td>
                    </tr>
                </table>
            </div>


            <section class="service-section spad">
                <div class="container services">
                    <div class="section-title text-center">
                        <h3>Diploma Programs</h3>
                        <!-- <p>Bachelore Programs</p> -->
                    </div>

                    <div class="table-container">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Program</th>
                                <th>Tuition Fees - Sudanese (SGD)</th>
                                <th>Registration Fees (SDG)</th>
                                <th>Tuition Fees - Foriegner (USD)</th>
                                <th>Registration Fees (USD)</th>
                            </tr>
                            <tr>
                                <td>Computer Engineering</td>
                                <td>1,800,000</td>
                                <td>700,000</td>
                                <td>2,850</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>Electronics Engineering</td>
                                <td>1,800,000</td>
                                <td>700,000</td>
                                <td>2,850</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>Networks Engineering</td>
                                <td>1,800,000</td>
                                <td>700,000</td>
                                <td>2,850</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>Telecommunication Engineering</td>
                                <td>1,800,000</td>
                                <td>700,000</td>
                                <td>2,850</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>Information Technology</td>
                                <td>1,800,000</td>
                                <td>700,000</td>
                                <td>1,750</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>E-Commerce</td>
                                <td>1,300,000</td>
                                <td>700,000</td>
                                <td>1,750</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>Information Technology Business and Accounting</td>
                                <td>1,800,000</td>
                                <td>700,000</td>
                                <td>1,750</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>Web Design</td>
                                <td>1,300,000</td>
                                <td>700,000</td>
                                <td>1,750</td>
                                <td>300</td>
                            </tr>
                        </table>
                    </div>

                </div>
        </div>
    </section>
@endsection
