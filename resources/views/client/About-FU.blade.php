@extends('components.client-layout')
@section('main-client-content')

    <div class="site-breadcrumb">
        <div class="container">
            <a href="/Home"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #d1291f;">About Future University</span>
        </div>
    </div>

    <section class="about-section spad pt-0" >

        <div class="container">
            <div class="section-title text-center">
                <h4>History of FU From 1990 - Now</h4>
            </div>

            <div class="row">

                <div class="col-lg-6 about-text">
                    <h5>About us</h5>
                    <blockquote>The Future University is an institution of higher learning committed in producing well - rounded
                        professionals who will be responsible in providing quality of life in the society. Over the past 25
                        years, the Future University, as an institution of higher learning, continues to realize its mission
                        and vision; fulfills its commitment to contribute to
                        the development of the well-being of the youth in Sudan, in particular and in other countries in
                        Africa in general.</blockquote>
                    <h5 class="pt-4">Our history</h5>

                    <ul class="about-list">
                        <li><i class="fa fa-check-square-o" style="font-size: 25px;"></i> <strong>1990</strong> Formerly
                            known as Computer Man College, founded in 1990.</li>
                        <li><i class="fa fa-check-square-o" style="font-size: 25px;"></i> <strong>2010</strong> Future
                            University was elevated to full university status in 2010 by the Parliament and signed by the
                            President of the Republic.</li>
                        <li><i class="fa fa-check-square-o" style="font-size: 25px;"></i> <strong>2017</strong> FU is a
                            leading ICT academic institution in the region.</li>
                        <li><i class="fa fa-check-square-o" style="font-size: 25px;"></i> <strong>2030</strong> First
                            Research University in the region</li>

                    </ul>
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0">
                    <img src="/client/img/main_imgs/general/fu.jpg" alt>
                </div>
            </div>

            <div class="row" style="padding: 20px;" id="WhyFutureUniversiy">
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>MISSION</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                The Future University creates an atmosphere conducive to academic activities by providing
                                scientific and
                                technological programs; and to equip the students, parents,
                                the academic community and the society with the ability to contribute to the innovation and
                                research in the sciences and technology.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>VISION</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                The Future University shall be a technology-driven institution dedicated in the development
                                of responsible intellectuals who are empowered,
                                technologically equipped, life-long learners and morally-upright to face the challenges of
                                the dynamic world.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>About Future University</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                The Future University is an institution of higher learning committed in producing well -
                                rounded professionals who
                                will be responsible in providing quality of life in the society. Over the past 25 years,
                                the Future University, as an institution of higher learning, continues to realize its
                                mission and vision; fulfills its commitment to contribute
                                to the development of the well-being of the youth in Sudan, in particular and in other
                                countries in Africa in general.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section spad">
        <div class="container">


            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'FU Board Of Trustees')">FU Board Of Trustees</button>
                <button class="tablinks" onclick="openTab(event, 'FU President')">FU President</button>
                <button class="tablinks" onclick="openTab(event, 'FU People')">Fu People</button>
            </div>

            <div id="FU Board Of Trustees" class="tabcontent">
                <!-- <h3>FU Board Of Trustees</h3> -->

                <div class="row">

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/dr_abubaker.png" alt="Board of Trustees">
                                <p class="additional-text text-center">The Founder and Investor 
                                    The Founder and Investor Chairman of the Board of Trustees
                                    The Founoard of Trustees</p>
                            </div>
                            <div>
                                <h6>Dr. Abubaker Mustafa M. Khair</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/azeb.png" alt="Board of Trustees">
                                <p class="additional-text text-center">The Former First Lady of The Republic of Ethiopia Vice President of Organization of African First Ladies Against 
                                    HIV/AIDS Founder and Patron of Ethiopia's National Initiative for Mental Health.</p>
                            </div>
                            <div>
                                <h6>H.E. Madam Azeb Mesfin -Honorary Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/madam_francine.png" alt="Board of Trustees">
                                <p class="additional-text">
                                    Chairperson of Cousteau Society, Paris France.
                                </p>
                            </div>
                            <div>
                                <h6>Madam Francine Cousteau -Honorary Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/dr_Bruce.png" alt="Board of Trustees">
                                <p class="additional-text">
                                    Chancellors Leadership Chair in Biochemistry & Biophysics for Science & 
                                    Education of California & Education of California, San Francisco USA Former Editor-in-Chief of Science Magazine Former 
                                    US Science Envoy to the Islamic World President Emeritus, US National Academy of Sciences
                                </p>
                            </div>
                            <div>
                                <h6>Dr. Bruce Alberts-Honorary Member</h6>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/dr_ElTayeb.png" alt="Board of Trustees">
                                <p class="additional-text">Dr. El Tayeb Mustafa-The President</p>
                            </div>
                            <div>
                                <h6>Dr. El Tayeb Mustafa - The President</h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/pro_adnan.png" alt="Board of Trustees">
                                <p class="additional-text">Chairman of the Board of Trustees, 
                                    University of Jordan President of Arab Academy of Sciences Former President of 
                                    Petra University Former Prime Minister of Jordan Former Deputy Director General of UNESCO</p>
                            </div>
                            <div>
                                <h6>Prof. Adnan Badran - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/pro_maged.png" alt="Board of Trustees">
                                <p class="additional-text">Senior Advisor to Kuwait Institute for Scientific Research, 
                                    Kuwait Former President of the Academy of the Scientific Research and 
                                    Technology (ASRT), EGYPT Former Assistant Minister of Higher Education and Scientific Research</p>
                            </div>
                            <div>
                                <h6>Prof. Maged El Sherbiny - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/prof_abdul.png" alt="Board of Trustees">
                                <p class="additional-text">Chair, The Intergovernmental Panel for Biodiversity Ecosystem (IPBES) Co-Chair of the International Scientific 
                                    Advisory Board to United nation Secretary General Science Advisor to the Prime Minister of Malaysia</p>
                            </div>
                            <div>
                                <h6>Prof. Abdul Hamid Zakri - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/prof_farouk.png" alt="Board of Trustees">
                                <p class="additional-text">Research Professor and Director for Centre of Remote Sensing Boston University, 
                                    USA Former Principal Investigator for Earth Observations & Photography on 
                                    the Apollo Soyuz Test Project (NASA) Science Advisor (1978-1981) to the late Anwar Sadat, President of Egypt</p>
                            </div>
                            <div>
                                <h6>Prof . Farouk El - Baz</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/prof_firouz.png" alt="Board of Trustees">
                                <p class="additional-text">President, Technology Development Corporation, USA Former Science advisor to NATO, US-State Dept. 
                                    Advisor to the two former US Presidents (President Richard Nixon and President Ronald Reagan.)</p>
                            </div>
                            <div>
                                <h6>Prof. Firouz Shahrokhi - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/dato_lee.png" alt="Board of Trustees">
                                <p class="additional-text">Former Dean, Faculty of Law in University of Khartoum Member of the Board of 
                                    Directors of the Central Bank of Sudan. Former Legal Advisor of Islamic Development Bank, Jeddah</p>
                            </div>
                            <div>
                                <h6>Dato Lee Yee-Cheong - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/prof_mohamed.png" alt="Board of Trustees">
                                <p class="additional-text">C0-Chairman of IAP, The Global Network of Science Academies Chairman of the Council of the United Nations University, 
                                    Tokyo Former Secretary General of Islamic World Academy of Science Former Executive Director of the Third World Academy of Sciences (TWAS)</p>
                            </div>
                            <div>
                                <h6>Prof . Mohamed Haj Ali - Member</h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/prof_elias.png" alt="Board of Trustees">
                                <p class="additional-text">Professor of Biology Department, American University Beirut Secretary General of 
                                    Arab Academy of Sciences- Beirut.</p>
                            </div>
                            <div>
                                <h6>Prof. Elias Baydoun - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/dr_gilbert.png" alt="Board of Trustees">
                                <p class="additional-text">Senior Advisor at International Companies in Mining and Energy Engineering, Paris. 
                                    Advisor to Several Governments : France, Morocco, South Africa, Chile, etc. Former Director of Paris, School of Mining (Grande Ecole).</p>
                            </div>
                            <div>
                                <h6>Dr. Gilbert Frade - Member</h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/prof_abdelhafiz.png" alt="Board of Trustees">
                                <p class="additional-text">Director – General of the Private and Foreign Higher Education.</p>
                            </div>
                            <div>
                                <h6>Prof. Abdelhafiz Eltahir Ahmed - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/ust_dafa_alla.png" alt="Board of Trustees">
                                <p class="additional-text">Former Minister of Education and Minister of Justice Former Chairman, 
                                    Computer Man College Former Chief of the Judiciary.</p>
                            </div>
                            <div>
                                <h6>Uzt. Dafa Alla Elhaj Yousif - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/ust_abdel_basit.png" alt="Board of Trustees">
                                <p class="additional-text">Former Minister of Justice, Federal Governance, Parliamentary Affairs, Culture and Information 
                                    and Education Former Legal Affairs Advisor to the President of the Republic of Sudan.</p>
                            </div>
                            <div>
                                <h6>Uzt. Abdel Basit Sabdrat - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/dr_sabir.png" alt="Board of Trustees">
                                <p class="additional-text">Chairman of the Board, Omdurman National Bank Former Governor of 
                                    Central Bank of Sudan Former State Minister of Finance Former Chairman, Bank of Khartoum.</p>
                            </div>
                            <div>
                                <h6>Dr. Sabir Mohammed Elhassan - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/dr_eltayeb_murkaz.png" alt="Board of Trustees">
                                <p class="additional-text">The Dean , Faculty of Law, University of Khartoum Director of Intellectual Property 
                                    Academy Head of Commercial Department, Faculty of Law, Khartoum, University.</p>
                            </div>
                            <div>
                                <h6>Dr. Eltayeb Murkaz - Member</h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/prof_ali_shomo.png" alt="Board of Trustees">
                                <p class="additional-text">Former Minister of Information Media Expert and University Lecturer Head National Council 
                                    for Press and Publications.</p>
                            </div>
                            <div>
                                <h6>Prof. Ali Shomo -Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/eng_osman.png" alt="Board of Trustees">
                                <p class="additional-text">Advisor at Future University Former President, Engineering Society Former 
                                    Deputy Dean for Administrative and Finance, Computer Man College 
                                    Former Director/Chairman, Excavation and Irrigation Foundation, Ministry of Irrigation.</p>
                            </div>
                            <div>
                                <h6>Eng. Osman Mustafa - Member</h6>
                            </div>
                        </div>
                    </div>


                    <div class="hr-sect new4"><span>FOUNDERS, INVESTORS, AND REPRESENTATIVES</span></div>

               

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/dr_ghasan.png" alt="FOUNDERS, INVESTORS, AND REPRESENTATIVES">
                              
                            </div>
                            <div>
                                <h6>Dr. Ghassan Abubaker Mustafa</h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/mrs_dahlia.png" alt="FOUNDERS, INVESTORS, AND REPRESENTATIVES">
                              
                            </div>
                            <div>
                                <h6>Mrs. Dahlia Abubaker Mustafa</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="/client/img/main_imgs/trustee/madam_mona.png" alt="FOUNDERS, INVESTORS, AND REPRESENTATIVES">
                             
                            </div>
                            <div>
                                <h6>Madam Mona Ali Hassan Karrar</h6>
                            </div>
                        </div>
                    </div>


                    <p></p><div class="hr-sect new4"><span>OTHER MEMBERS</span></div><p></p>


                    <div class="row">

                        <div class="col">
                            <div class="single-feature">
                                <div class="desc-wrap">
                                    <img src="/client/img/main_imgs/trustee/dr_isam.png" alt="OTHER MEMBERS">
                                    <p class="additional-text">Vice President of Academic Affairs</p>
                                </div>
                                <div>
                                    <h6>Dr. Isameldeen M. Khair</h6>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="single-feature">
                                <div class="desc-wrap">
                                    <img src="/client/img/main_imgs/trustee/dr_tarig.png" alt="OTHER MEMBERS">
                                    <p class="additional-text">Medical Specialist, UK</p>
                                </div>
                                <div>
                                    <h6>Dr. Tarig Babiker Ali Eltom</h6>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="single-feature">
                                <div class="desc-wrap">
                                    <img src="/client/img/main_imgs/trustee/dr_salih.png" alt="OTHER MEMBERS">
                                    <p class="additional-text">The Librarian</p>
                                </div>
                                <div>
                                    <h6>Dr. Salih Dafa Alla</h6>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="single-feature">
                                <div class="desc-wrap">
                                    <img src="/client/img/main_imgs/trustee/ust_kawther.png" alt="OTHER MEMBERS">
                                    <p class="additional-text">The Director for Admission and Registration</p>
                                </div>
                                <div>
                                    <h6>Utz. Kawther Abu El Naja</h6>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="single-feature">
                                <div class="desc-wrap">
                                    <img src="/client/img/main_imgs/trustee/prof_abdelhafiz.png" alt="OTHER MEMBERS">
                                    <p class="additional-text">Director – General of the Private and Foreign Higher Education</p>
                                </div>
                                <div>
                                    <h6>Prof. Abdelhafiz Eltahir Ahmed</h6>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>

            </div>

            <div id="FU President" class="tabcontent">

                <div class="feature">
                    <div class="circle" style="width: 50%; height: 50%; ">
                        <img src="/client/img/main_imgs/trustee/altayeb.png" alt="Image">
                    </div>
                    <div>
                        <p></p>
                        <p>As the present academic year comes to an end, we start the preparation to welcome the new
                            students for the new academic year 2016/2017.</p>
                        <p>This occasion gives me the opportunity to congratulate the graduates of all departments and wish
                            them a successful career in their professional life.
                            I also welcome those who decided to continue with their postgraduate studies at the University.
                        </p>

                        <p>The past academic year witnessed an amazing International cooperation, visiting professors from
                            Italy, France, Bulgaria,
                            Malaysia and the UK enriched our academic life.</p>

                        <p>The programmes offering are increasing as we are about to launch undergraduate new programmes in
                            Business Administration,
                            Journalism and Media as well as Master Programmes in GIS and Architecture.</p>

                        <p>The University service to the community reached new heights! A major cooperation with the
                            Ministry of Urban Planning permitted
                            the University to contribute to the planning and design of Omdurman Frontline and Omdurman
                            Central Market, and culminated with
                            the signing of an MOU between the University and the Ministry.</p>

                        <p>Lastly, our research activities, although modest, started to yield results and the University
                            ranking among the Sudanese Universities kept progressing,
                            our aim is to be among the ten top sudanese university by the end of the next academic year.</p>

                        <p>GOOD LUCK!</br>
                            Dr. El Tayeb Mustafa</br>
                            The President</p>
                    </div>
                </div>
            </div>


            <div id="FU People" class="tabcontent">
                <p></p>
                <table style="height: 100%;" border="0" width="100%" cellspacing="1" cellpadding="0">
                    <tbody>
                        <tr>
                            <td style="text-align: center;" colspan="2" bgcolor="#c3c3c3" width="40%"><span
                                    style="color: #000000;"><b>Top Officials</b></span></td>
                        </tr>
                        <tr>
                            <td style="text-align: left;" bgcolor="#e4e4e4" width="50%"><span
                                    style="color: #000000;"><b>Dr. Abubaker
                                        Mustafa Khair</b></span></td>
                            <td style="text-align: left;" bgcolor="#e4e4e4" width="50%"><span
                                    style="color: #000000;"><b>Chairman of the
                                        Board of Trustees</b></span></td>
                        </tr>
                        <tr>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#e2e2e2"><span style="color: #000000;"><b>Dr. Abubaker Mustafa Khair</b></span>
                            </td>
                            <td bgcolor="#e2e2e2"><span style="color: #000000;"><b>Acting President</b></span></td>
                        </tr>
                        <tr>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#e2e2e2"><span style="color: #000000;"><b>Mr. Ghassan Abubaker Mustafa</b></span>
                            </td>
                            <td bgcolor="#e2e2e2"><span style="color: #000000;"><b>Vice President / Deputy
                                        President</b></span></td>
                        </tr>
                        <tr>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#e2e2e2"><span style="color: #000000;"><b>Dr. Isam Moh. Khair</b></span></td>
                            <td bgcolor="#e2e2e2"><span style="color: #000000;"><b>Assistant President for Academic
                                        Affairs</b></span>
                            </td>
                        </tr>
                        <tr>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#e2e2e2"><span style="color: #000000;"><b>Mr. Akif Mihaimeed</b></span></td>
                            <td bgcolor="#e2e2e2"><span style="color: #000000;"><b>Assistant President for Administration
                                        and
                                        Finance</b></span></td>
                        </tr>
                        <tr>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="2" bgcolor="#c3c3c3"><span
                                    style="color: #000000;"><b>The Academic
                                        Department</b></span></td>
                        </tr>
                        <tr>
                            <td style="text-align: left;" bgcolor="#eeeeee"><span style="color: #000000;">Ust. Kawther
                                    Abu Alnaja</span>
                            </td>
                            <td style="text-align: left;" bgcolor="#eeeeee"><span style="color: #000000;">Director for
                                    Admission and
                                    Registration</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dr. Salih Dafa Alla</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Librarian</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Mr. Abdel Galel Moh. Khair</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Director for Public Relation</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">&nbsp;Mr. Taha Fatih</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Director for Marketing</span></td>
                        </tr>
                        <tr>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="2" bgcolor="#c3c3c3"><span
                                    style="color: #000000;"><b>Deans
                                    </b></span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Prof. Eltayeb Idriss</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dean, Faculty of Engineering</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Prof. Hassan Hilmi</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dean, Faculty of Post Graduates</span>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Prof. Abdelrahman Hassan</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dean, Faculty of Basic Studies and
                                    Continuing</span><br>
                                <span style="color: #000000;"> Studies</span>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dr. Eltayeb Elgoni</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dean, Faculty of Architecture</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dr. Mubarak Hussein</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dean, Faculty of Computer Science</span>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dr. Eltayeb Ganawa</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dean, Faculty of GIS</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dr. Emmalyn Capuno</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dean, Faculty of Information
                                    Technology</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dr. Ashraf Gasim Elsid</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dean, Faculty of Telecommunication</span>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dr. Hamid Elfaig</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dean, Faculty of Business
                                    Administration</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Ust. Armin Aragoncillo</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Acting Dean, Faculty of Art &amp;
                                    Design</span></td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dr. Nafisa</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dean, of Students Affairs</span></td>
                        </tr>
                        <tr>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                            <td><span style="color: #000000;">&nbsp;</span></td>
                        </tr>
                        <tr>
                            <th style="text-align: center;" colspan="2" bgcolor="#c3c3c3"><span
                                    style="color: #000000;"><b>The Heads of
                                        Departments</b></span></th>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td style="text-align: left;"><span style="color: #000000;">Dr. Salah Hassan Malik</span></td>
                            <td style="text-align: left;"><span style="color: #000000;">Head of Knowledge
                                    Management</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td><span style="color: #000000;">Dr. Salah Hassan Malik</span></td>
                            <td><span style="color: #000000;">Head of Knowledge Engineering</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td><span style="color: #000000;">Dr. Abdalla Awad Allah</span></td>
                            <td><span style="color: #000000;">Head of Architecture</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td><span style="color: #000000;">Dr. Mohammed Atta</span></td>
                            <td><span style="color: #000000;">Head of Interior Design</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td><span style="color: #000000;">Dr. Atif</span></td>
                            <td><span style="color: #000000;">Head Of Telecommunications</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td><span style="color: #000000;">Ust. Zainab</span></td>
                            <td><span style="color: #000000;">Head of Computer Science</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td><span style="color: #000000;">Ust. Haitham Abdelmoniem</span></td>
                            <td><span style="color: #000000;">Head of Information Technology</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td><span style="color: #000000;">Dr. Eltayeb Saeed</span></td>
                            <td><span style="color: #000000;">Head of Geoinformatics</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td><span style="color: #000000;">&nbsp;Dr. Julito Evangelista</span></td>
                            <td><span style="color: #000000;">Head of Electronics Engineering&nbsp;</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#eeeeee"><span style="color: #000000;">&nbsp;</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Head of Business Administration</span>
                            </td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#eeeeee"><span style="color: #000000;">&nbsp;</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Head of Creative Multimedia</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dr. Abdul Khatim</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Head of Graphic Design</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Prof. El tayeb Idriss</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Head of Mechatronics Engineering</span>
                            </td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dr. Elias&nbsp;Siddig</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Head of Biomedical Engineering</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dr. Reylen Garcia</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Head of Computer Engineering</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Dr. Eltayeb Ganawa</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Head of KIST</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td style="text-align: center;" colspan="2" bgcolor="#c3c3c3"><span
                                    style="color: #000000;"><b>The Centers
                                        and Units of Department</b></span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Engr. Banan Yahia Mursi</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Director, Center for E-Learning and
                                    Software
                                    Development</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Engr. Mutaz Hamad</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Director, Center of Technical
                                    Support</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Mr. Waleed Jaffar Mustafa</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Director, ICDL</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Engr. Ahmed Ashri</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Director, Project Unit</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Ms. Malaz Ibrahim</span></td>
                            <td bgcolor="#eeeeee"><span style="color: #000000;">Statistic and information
                                    Department</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Mr. Muhammad Ali</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Network Unit</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td style="text-align: center;" colspan="2" bgcolor="#c3c3c3"><span
                                    style="color: #000000;"><b>The
                                        Advisors</b></span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Amb. Sayed Sharief</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">&nbsp;</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Prof. Eltayeb Idriss</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">&nbsp;</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Mr. Mohammad Issa</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">&nbsp;</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Engr. Osman Mustafa Khair</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">&nbsp;</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">General ElSheikh</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">&nbsp;</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td style="text-align: center;" colspan="2" bgcolor="#c3c3c3"><span
                                    style="color: #000000;"><b>The Admin and
                                        Finance</b></span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Mr. Abdel Rahim Al Badri</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Finance Manager</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Ms. Fatima Hassan</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Internal Auditor</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Mr. El Nour</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Accounting Manager</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Mr. Albaguer Elagab</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Director of Human Resources</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Mr. Mohammad issa</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">General Director For Admin and
                                    Finance</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Mr. Yousif Omer</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Director for Admin and Services</span>
                            </td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Mr. Khalid</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Supervisor for Services</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Lieutenant Hussein</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Commander, University Guard</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Dr. Mohamad Ashraf</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Medical Doctor</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td style="text-align: center;" colspan="2" bgcolor="#c3c3c3"><span
                                    style="color: #000000;"><b>The Central
                                        Units</b></span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Mr. Ghassan Abubaker Mustafa</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">International Relations
                                    Administration</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Dr. Nafisa</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Deanship of Students Affairs</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Mr. Taha Fatih</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Academic Marketing Unit</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Mr. Abdel Galel Moh. Khair</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Media and Public Relations
                                    Administration</span></td>
                        </tr>
                        <tr bgcolor="#eeeeee">
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Mr. Bahaeldin Elsayed Ali</span></td>
                            <td bgcolor="#EEEEEE"><span style="color: #000000;">Executive Office of the President</span>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
    </section>
@endsection
