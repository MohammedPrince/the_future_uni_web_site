@extends('components.client-layout')
@section('main-client-content')

    <div class="site-breadcrumb">
        <div class="container">
            <a href="Home"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #d1291f;">History</span>
        </div>
    </div>

    <section class="about-section spad pt-0" >

        <div class="container">
            <div class="section-title text-center">
                <h4>From 1990 - Now</h4>
            </div>

            <div class="row">

                <div class="col-lg-12 about-text" style="text-align: justify;">
                    <h5>About us</h5>
                 The Future University is an institution of higher learning committed in producing well - rounded
                        professionals who will be responsible in providing quality of life in the society. Over the past 33
                        years, the Future University, as an institution of higher learning, continues to realize its mission
                        and vision; fulfills its commitment to contribute to
                        the development of the well-being of the youth in Sudan, in particular and in other countries in
                        Africa in general.
                    <h5 class="pt-4">Our history</h5>

                    <ul class="about-list">
                        <li><i class="fa fa-check-square-o" style="font-size: 25px;"></i> <strong>1990</strong> Foubded
                            as Computer Man College in 1990.</li>
                        <li><i class="fa fa-check-square-o" style="font-size: 25px;"></i> <strong>2010</strong> Elevated
                            to The Future University in 2010 by the Parliament.</li>
                            
                        <li><i class="fa fa-check-square-o" style="font-size: 25px;"></i> <strong>2017</strong> Recognized as
                            a leading ICT academic institution in the region.</li>
                        <!-- <li><i class="fa fa-check-square-o" style="font-size: 25px;"></i> <strong>2030</strong> First
                            Research University in the region</li> -->

                    </ul>
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0">
                    <img src="./public/client/img/main_imgs/general/fu.jpg" alt>
                </div>
            </div>

            <div class="row" style="padding: 20px;" id="WhyFutureUniversiy">
            
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>MISSION</h4>
                        </div>
                        <div class="desc-wrap" style="text-align: justify;" >
                            <p>
                            Our university is committed to fostering an inclusive, innovative, and intellectually vibrant community dedicated to the pursuit of knowledge, the advancement of research, and the cultivation of future leaders. By empowering students to think critically, collaborate effectively, and impact the world positively, we strive to be a transformative force for progress and positive change.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>VISION</h4>
                        </div>
                        <div class="desc-wrap" style="text-align: justify;">
                            <p>
                            Driven by a steadfast commitment to excellence, our university seeks to empower the next generation of global citizens. By cultivating an interdisciplinary learning environment that celebrates diversity, nurtures creativity, and fosters critical thinking, we aim to equip our students with the knowledge, skills, and ethical principles to lead positive change in an ever-evolving world.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>About Future University</h4>
                        </div>
                        <div class="desc-wrap" style="text-align: justify;">
                            <p>
                            At the core of our institution are the guiding principles of academic excellence, ethical integrity, and social responsibility. We are committed to fostering an inclusive, collaborative environment that celebrates diversity, encourages innovation, and empowers our community to make a meaningful impact on the world around them.
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
                <button class="tablinks" onclick="openTab(event, 'Board Of Trustees')">Board Of Trustees</button>
                <button class="tablinks" onclick="openTab(event, 'President')">President</button>
                <button class="tablinks" onclick="openTab(event, 'Deputy President')">Deputy President</button>
            </div>

            <div id="Board Of Trustees" class="tabcontent">
                <!-- <h3>FU Board Of Trustees</h3> -->

                <div class="row">

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/dr_abubaker.png" alt="Board of Trustees">
                                <p class="additional-text text-center">Chairman of the Board of Trustees; Founder; Investor</p>
                            </div>
                            <div>
                                <h6>Dr. Abubaker Mustafa M. Khair</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/azeb.png" alt="Board of Trustees">
                                <p class="additional-text text-center" >The Former First Lady of The Republic of Ethiopia; Vice President of Organization of African First Ladies Against 
                                    HIV/AIDS; Founder and Patron of Ethiopia's National Initiative for Mental Health.</p>
                            </div>
                            <div>
                                <h6>H.E. Madam Azeb Mesfin - Honorary Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/madam_francine.png" alt="Board of Trustees">
                                <p class="additional-text">
                                    Chairperson of Cousteau Society, Paris France.
                                </p>
                            </div>
                            <div>
                                <h6>Madam Francine Cousteau - Honorary Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/dr_Bruce.png" alt="Board of Trustees">
                                <p class="additional-text">
                                    Chancellors Leadership Chair in Biochemistry & Biophysics for Science & 
                                    Education of California & Education of California, San Francisco USA; Former Editor-in-Chief of Science Magazine; Former 
                                    US Science Envoy to the Islamic World; President Emeritus, US National Academy of Sciences
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
                                <img src="./public/client/img/main_imgs/trustee/dr_ghassan.png" alt="Board of Trustees">
                                <p class="additional-text">Dr. Ghassan Abubaker Mustafa</p>
                            </div>
                            <div>
                                <h6>Dr. Ghassan Abubaker Mustafa - The President</h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/pro_adnan.png" alt="Board of Trustees">
                                <p class="additional-text">Chairman of the Board of Trustees, 
                                    University of Jordan; President of Arab Academy of Sciences; Former President of 
                                    Petra University; Former Prime Minister of Jordan; Former Deputy Director General of UNESCO</p>
                            </div>
                            <div>
                                <h6>Prof. Adnan Badran - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/pro_maged.png" alt="Board of Trustees">
                                <p class="additional-text">Senior Advisor to Kuwait Institute for Scientific Research, 
                                    Kuwait; Former President of the Academy of the Scientific Research and 
                                    Technology (ASRT), EGYPT; Former Assistant Minister of Higher Education and Scientific Research</p>
                            </div>
                            <div>
                                <h6>Prof. Maged El Sherbiny - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/prof_abdul.png" alt="Board of Trustees">
                                <p class="additional-text">Co-Chair of the International Scientific Advisory Board to United 
                                Nation Secretary General; Science Advisor to the Prime Minister, Malaysia; Chairman of Centre for Global Sustainability Studies (CGSS) 
                                International Advisory Panel.</p>
                            </div>
                            <div>
                                <h6>Prof. Abdul Hamid Zakri - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/prof_farouk.png" alt="Board of Trustees">
                                <p class="additional-text">President, Technology Development Corporation, USA; Former Science Advisor to NATO, US-State Dept.; Advisor to the two Former US Presidents (President Richard Nixon 
                                and President Reagan)</p>
                            </div>
                            <div>
                                <h6>Prof. Farouk El - Baz</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/prof_firouz.png" alt="Board of Trustees">
                                <p class="additional-text">President, Technology Development Corporation, USA; Former Science advisor to NATO, US-State Dept.; 
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
                                <img src="./public/client/img/main_imgs/trustee/dato_lee.png" alt="Board of Trustees">
                                <p class="additional-text">Chairman, Governing Board, ISTIC KL, Malaysia; Chairman of the Global Committee for Science Education (IAP)</p>
                            </div>
                            <div>
                                <h6>Dato Lee Yee-Cheong - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/prof_mohamed.png" alt="Board of Trustees">
                                <p class="additional-text">Member of Pontifical Academy of Sciences in Vatican City; Co-Chairman of IAP, The Global Network of Science Academies;
                                Chairman of the Sudan National Academy of Science (SNAS); Chairman of the Council of the United Nations University (UNU); Secretary General of Islamic Academy of Science;
                                Former President of African Academy of Science.
                                </p>
                            </div>
                            <div>
                                <h6>Prof. Mohamed Haj Ali - Member</h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/prof_elias.png" alt="Board of Trustees">
                                <p class="additional-text">Professor of Biology Department, American University Beirut; Secretary General of 
                                    Arab Academy of Sciences- Beirut; Member of Third World Academy of Sciences (TWAS)</p>
                            </div>
                            <div>
                                <h6>Prof. Elias Baydoun - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/dr_gilbert.png" alt="Board of Trustees">
                                <p class="additional-text">International Consultant; Former Director at Paris School of Mining (GRANDE ECOLE);
                                Adviser to several International Companies; Adviser to several Countries.
                                </p>
                            </div>
                            <div>
                                <h6>Dr. Gilbert Frade - Member</h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/prof_abdelhafiz.png" alt="Board of Trustees">
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
                                <img src="./public/client/img/main_imgs/trustee/ust_dafa_alla.png" alt="Board of Trustees">
                                <p class="additional-text">Former Chief of the Judiciary; Former Chairman, Computer Man College; Former Minister of Justice</p>
                            </div>
                            <div>
                                <h6>Mr. Dafa Alla Elhaj Yousif - Member (Passed away, November 2020)</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/ust_abdel_basit.png" alt="Board of Trustees">
                                <p class="additional-text">Former Minister of Justice, Federal Governance, Parliamentary Affairs, Culture and Information 
                                    and Education; Former Legal Affairs Advisor to the President of the Republic of Sudan.</p>
                            </div>
                            <div>
                                <h6>Mr. Abdel Basit Sabdrat - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/prof_alec.png" alt="Board of Trustees">
                                <p class="additional-text">Prof. Alec Boksenberg 
                                </p>
                            </div>
                            <div>
                                <h6> Professor, Astronomy, Cambridge University, U.K. - Member</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/dr_eltayeb_murkaz.png" alt="Board of Trustees">
                                <p class="additional-text">Former Dean of the Faculty of Law, Khartoum University.</p>
                            </div>
                            <div>
                                <h6>Dr. Eltayeb Murkaz - Member</h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/prof_ali_shomo.png" alt="Board of Trustees">
                                <p class="additional-text">Former Minister of Information Media Expert and University Lecturer Head National Council 
                                    for Press and Publications.</p>
                            </div>
                            <div>
                                <h6>Prof. Ali Shomo -Member</h6>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/eng_osman.png" alt="Board of Trustees">
                                <p class="additional-text">Advisor at Future University Former President, Engineering Society Former 
                                    Deputy Dean for Administrative and Finance, Computer Man College 
                                    Former Director/Chairman, Excavation and Irrigation Foundation, Ministry of Irrigation.</p>
                            </div>
                            <div>
                                <h6>Eng. Osman Mustafa - Member</h6>
                            </div>
                        </div>
                    </div> -->


                    <div class="hr-sect new4"><span>FOUNDERS, INVESTORS, AND REPRESENTATIVES</span></div>

               

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/dr_abubaker.png" alt="FOUNDERS, INVESTORS, AND REPRESENTATIVES">
                              
                            </div>
                            <div>
                                <h6>Dr. Abubaker Mustafa Mohamed</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/dr_ghassan.png" alt="FOUNDERS, INVESTORS, AND REPRESENTATIVES">
                              
                            </div>
                            <div>
                                <h6>Dr. Ghassan Abubaker Mustafa</h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/mrs_dahlia.png" alt="FOUNDERS, INVESTORS, AND REPRESENTATIVES">
                              
                            </div>
                            <div>
                                <h6>Mrs. Dahlia Abubaker Mustafa</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="single-feature">
                            <div class="desc-wrap">
                                <img src="./public/client/img/main_imgs/trustee/madam_mona.png" alt="FOUNDERS, INVESTORS, AND REPRESENTATIVES">
                             
                            </div>
                            <div>
                                <h6>Mrs. Mona Ali Hassan Karrar</h6>
                            </div>
                        </div>
                    </div>


                    <p></p><div class="hr-sect new4"><span>OTHER MEMBERS</span></div><p></p>


                    <div class="row">

                        <div class="col">
                            <div class="single-feature">
                                <div class="desc-wrap">
                                    <img src="./public/client/img/main_imgs/trustee/dr_isam.png" alt="OTHER MEMBERS">
                                    <p class="additional-text">Deputy President of Academic Affairs</p>
                                </div>
                                <div>
                                    <h6>Dr. Isameldeen Mohamed Khair</h6>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="single-feature">
                                <div class="desc-wrap">
                                    <img src="./public/client/img/main_imgs/trustee/dr_tarig.png" alt="OTHER MEMBERS">
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
                                    <img src="./public/client/img/main_imgs/trustee/dr_salih.png" alt="OTHER MEMBERS">
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
                                    <img src="./public/client/img/main_imgs/trustee/ust_kawther.png" alt="OTHER MEMBERS">
                                    <p class="additional-text">The Director for Admission and Registration</p>
                                </div>
                                <div>
                                    <h6>Mrs. Kawther Abu El Naja</h6>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="single-feature">
                                <div class="desc-wrap">
                                    <img src="./public/client/img/main_imgs/trustee/prof_abdelhafiz.png" alt="OTHER MEMBERS">
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

            <div id="President" class="tabcontent">

                <div class="feature">
                    <div class="circle" style="width: 120%; height: 120%; ">
                        <img src="./public/client/img/main_imgs/trustee/dr_ghassan.png" width= "50%" height= "50%" alt="Image">
                    </div>
                    <div>
                        <p></p>
                        <p style="text-align: center;">A Message from the University President</p>

                        <p >Dear Future University Community,</p>

                        <p style="text-align: justify;">It is my honor to welcome you all to the start of a new academic year. As your university president, I am profoundly grateful for the resilience and dedication that our students, faculty, and staff members have demonstrated over the past tough year.
                            Despite the unprecedented challenges we have faced, our community has come together to ensure the continuity of our academic mission and to support one another. For that, I express my sincere appreciation. Moving forward, I assure you that this university remains steadfast in its commitment to providing a transformative educational experience and cultivating a vibrant campus life. The Future University is here to support the growth and development of our future generations, as well as to foster innovation and excellence across all our endeavors.</p>
                            
                            <p style="text-align: justify;">To our students, I urge you to embrace the opportunities that lie ahead and to engage actively in your academic and extracurricular pursuits. Your education is not just about acquiring knowledge, but also about developing the skills and resilience that will serve you well in the future. To our faculty and staff, I am deeply appreciative of your unconditioned dedication and your commitment to our students and our shared mission.</p>
                            
                            <p style="text-align: justify;">Together, we will continue to navigate these uncertain times with courage, compassion, and a steadfast determination to succeed.
                            I look forward to witness the remarkable achievements of our university community.</p>

                        <p>Good Luck!</br>
                            DR. GHASSAN ABUBAKER MUSTAFA</br>
                            The University President</p>
                    </div>
                </div>
            </div>


            <div id="Deputy President" class="tabcontent">
            <div class="feature">
                    <div class="circle" style="width: 50%; height: 50%; ">
                        <img src="./public/client/img/main_imgs/trustee/dr_isam.png" alt="Image">
                    </div>
                    <div>
                    <p></p>
                        <p style="text-align: center;">A Message from the University Deputy President</p>

                        <p style="text-align: justify;">It is with great pride and enthusiasm that I welcome you all to the start of a new academic year here at Future University. 
                            I am humbled by the unwavering resilience and dedication that our students, academicians, and 
                            staff have demonstrated over the past challenging course of time.</p>
                            
                            <p style="text-align: justify;">Despite the unprecedented obstacles we have faced as a community, 
                                I have been truly inspired by the way our university has come together to support one another and ensure the 
                                continuity of our academic mission. Your commitment to excellence, innovation, and compassion is a testament to 
                                the strength and character of our university.</p>
                            
                            <p style="text-align: justify;">The university administration 
                                remains steadfastly committed to providing a transformative educational experience for our students. 
                                We are dedicated to cultivating a vibrant campus life that fosters personal and professional growth, 
                                as well as to supporting the innovative research and scholarship that has long been the hallmark of this institution.</p>

                            <p style="text-align: justify;"> To our students, I urge you to embrace the countless opportunities that 
                                lie before you. Engage actively in your studies, participate in extracurricular activities, and seek out new experiences 
                                that will broaden your perspectives and enrich your personal and intellectual development. Remember, your education is 
                                about so much more than just acquiring knowledge.</p>

                                <p style="text-align: justify;">  To our esteemed faculty and staff, I offer my heartfelt gratitude for your unwavering dedication to our students and 
                                our journey. Your passion, expertise, and tireless efforts are the driving force behind the excellence that defines 
                                Future University. Together, as a united community, we will continue to navigate these uncertain times with courage, compassion, and a 
                                steadfast determination to succeed. </p>

                        <p>GOOD LUCK!</br>
                            Dr. ISAMELDEEN MOHAMED KHAIR</br>
                            Deputy President for Academic Affairs</p>
                    </div>
                </div>
            </div>
    </section>
@endsection
