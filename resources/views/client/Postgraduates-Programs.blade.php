@extends('components.client-layout')
@section('main-client-content')
    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{route('Home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #fb8b24;">Postgraduates Programs</span>
        </div>
    </div>
    <section class="about-section">

        <div class="container">

            <div class="post-item post-details" style="padding-top: 0px;">
                <div class="section-title ">
                    <div class="post-content">

                        <div class="container">

                            <div class="container text-center">
                                <div class="tab-container">
                                    <div class="tab">
                                        <button class="tablinks active"
                                            onclick="openTab(event, 'Business Administration')">Business
                                            Administration</button>
                                        <button class="tablinks"
                                            onclick="openTab(event, 'Information Technology')">Information
                                            Technology</button>
                                        <button class="tablinks"
                                            onclick="openTab(event, 'Engineering')">Engineering</button>
                                        <button class="tablinks"
                                            onclick="openTab(event, 'Telecommunication & Space Technology')">Telecommunication
                                            &
                                            Space Technology</button>
                                        <button class="tablinks" onclick="openTab(event, 'Computer Science')">Computer
                                            Science</button>
                                        <button class="tablinks"
                                            onclick="openTab(event, 'Architecture')">Architecture</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51); display: block;"
                                id="Business Administration">

                                <p class="text-center"><strong>Master of Business Administration (MBA)</strong></p>
                                <b>Description: </b>
                                <p style="color: black; text-align: justify;">
                                    In today's business world, the need to incorporate information technology into the
                                    organization is a must in order to survive and succeed. The Future University recognizes
                                    the need to be responsive according to these changes and demands, both locally and
                                    internationally. It is hereby the mission of the Faculty of Postgraduate Studies in
                                    collaboration with the Faculty of Information Technology through Master of Business
                                    Administration (MBA) program to assist and prepare students to meet the challenges that
                                    lay ahead as they embark on the challenge of managing the ever changing business world.
                                    The MBA program seeks to provide valuable knowledge to the students in business and
                                    administration and all its related aspects. It seeks to extend both the knowledge of
                                    students and their ability to effectively utilize their knowledge in a collaborative
                                    business work environment. The Faculty of Information Technology has developed a
                                    diversified portfolio of MBA programs to tailor every business organization needs:

                                </p>
                                <p>
                                    <li>With specialization courses in General Management</li>
                                    <li>With specialization courses in Engineering Management</li>
                                    <li>With specialization courses in Telecommunication Management</li><br>
                                <p style="color: black; text-align: justify;">
                                    The MBA program gives such an advantage by preparing the graduate students to
                                    manage their business needs. The MBA program will provide graduate students with a
                                    unique blend of managerial,
                                    technological and communications skills essential for success in the exciting field
                                    of business,
                                    marketing and telecommunication world. Whether the student is looking to advance
                                    one's career in the business,
                                    nonprofit, or government sector, the program can help prepare to successfully manage
                                    business projects and processes and
                                    direct people, gain the knowledge, skills, and confidence to become a more effective
                                    manager by learning to integrate and
                                    align organizational processes and systems, and motivate people to meet today's
                                    critical challenges and goals.
                                </p>
                                <hr>
                                <b>Phlosophy Of The Program</b><br>
                                <p style="color: black; text-align: justify;">
                                    The Master of Business Administration (MBA) of Future University is distinctive in
                                    design.
                                    The curriculum sequence is carefully crafted to create classes grounded in
                                    traditional management
                                    theory as well as relevant to problems and trends facing business leaders today.
                                    It offers an integrated course sequence that promotes understanding of the whole
                                    organization rather than the traditional, discipline-specific method.
                                    Because the latest management techniques quickly become obsolete, the program
                                    focuses on developing versatility through critical thinking, intellectual
                                    flexibility,
                                    analytical and applied research skills, creativity, and high standards for
                                    professional
                                    integrity and ethics. The courses include communication, leadership, organizational
                                    behavior,
                                    and project management to develop the specific social skills needed in a team-based
                                    organizational environment.
                                </p>
                                <hr>
                                <b>Aims Of The Program</b><br>
                                The MBA degree at Future University is designed to cultivate the leadership and the
                                decision making skills necessary
                                to tackle the challenges of today's global businesses. More importantly, it aims for
                                the following: <br>
                                <p style="color: black; text-align: justify;">
                                    <li>To provide students with the required tools for decision-making and data
                                        analysis and to teach students how to use statistical methodology in applying
                                        these techniques to actual business situations.</li>
                                    <li>To improve students' marketing skills through the use of case studies which help
                                        students identify and evaluate the diversity of marketing strategies employed by
                                        successful firms.</li>
                                    <li>To teach students the techniques and tools useful for financial analysis and
                                        control in today's business climate.</li>
                                    <li>To give students the skills and the knowledge set necessary to ethically manage
                                        today's business operations for productivity and performance.</li>
                                    <li>To engender a global perspective in all students.</li>
                                    <li>To develop each student's strategic thinking.</li>
                                </p>
                                <hr>
                                <b>Career Opportunities</b><br>
                                <p style="color: black; text-align: justify;">
                                    The MBA prepares career-oriented adults and professionals in the wide areas of
                                    business and administration. The degree program equips students with the skills and
                                    knowledge and practical experience needed to facilitate these changes and to build a
                                    solid foundation for their career development.
                                    After satisfactorily completing all the requirements leading to a MBA degree,
                                    students may qualify for but not limited to the following fields: <br>
                                </p>
                                <li>Management Consulting</li>
                                <li>Financial Services</li>
                                <li>Marketing</li>
                                <li>Advertising</li>
                                <li>Public Relations</li>
                                <li>Investment Banking</li>
                                <li>Investment Management</li>
                                <li>Non-profit Management</li>
                                <li>Engineering Management</li>
                                <li>Production Management</li>
                                <li>Telecommunications Management</li>
                                <li>E-commerce</li>
                                <li>Retail</li>
                                <li>Consumer Goods</li>
                                <li>Global Marketing</li>
                                <li>Multimedia Marketing</li>
                                <li>Project manager Liaison between IT and Business Functions</li>
                                <li>Entrepreneur Ph.D. program leading to teaching/research</li>
                                <li>Graduates with a BS degree with a major in Information Technology, Computer
                                    Science or Engineering</li>

                                <hr>
                                <b>Program Structure</b><br>
                                <p style="color: black; text-align: justify;">
                                    The MBA program is structured into 3 components where the core part is comprised of
                                    eight (8) courses,
                                    the specialization part is comprised of five (5) courses and the last semester
                                    devoted solely to the
                                    capstone project part. The courses are designed over a semester basis. A total of
                                    four (4) semesters is
                                    required for the graduation of MBA program with specialization in General Management
                                    or Telecommunications Management
                                    or Engineering Management. The required 36 credit hours are distributed over 4
                                    semesters. However,
                                    for the non-business undergraduate takers, an additional of five (5) courses are
                                    required to be taken prior to
                                    taking the above mentioned course types. The additional 5 courses will be
                                    distributed over the first two (2) semesters. <br><br>
                                </p>

                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td><strong>Code of Block</strong></td>
                                            <td><strong>Course Nature</strong></td>
                                            <td><strong>No. of Courses</strong></td>
                                            <td><strong>Total No of Credits Required</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>MBACO</strong></td>
                                            <td>Core Courses</td>
                                            <td>8</td>
                                            <td>24</td>
                                        </tr>
                                        <tr>
                                            <td><strong>MBAGM/ MBAEM/ MBATC</strong></td>
                                            <td>General Management/ Engineering Management/ Telecommunication Management
                                                Specialization Courses</td>
                                            <td>5</td>
                                            <td>15</td>
                                        </tr>
                                        <tr>
                                            <td><strong>MBACP</strong></td>
                                            <td>Capstone Project</td>
                                            <td>1</td>
                                            <td>6</td>
                                        </tr>
                                        <tr>
                                            <td><strong>&nbsp;</strong></td>
                                            <td><strong>Total</strong></td>
                                            <td><strong>14</strong></td>
                                            <td><strong>45</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>

                                For non-business majors, additional 15 units would be required for the students to
                                undertake.<br><br>

                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th><strong>Code of Block</strong></th>
                                            <th><strong>Course Nature</strong></th>
                                            <th><strong>No. of Courses</strong></th>
                                            <th><strong>Total No of Credits Required</strong></th>
                                        </tr>
                                        <tr>
                                            <td><strong>MBAFO</strong></td>
                                            <td>Foundation Courses</td>
                                            <td>(5)</td>
                                            <td>(15)</td>
                                        </tr>
                                        <tr>
                                            <td><strong>MBACO</strong></td>
                                            <td>Core Courses</td>
                                            <td>8</td>
                                            <td>24</td>
                                        </tr>
                                        <tr>
                                            <td><strong>MBAGM/ MBAEM/ MBATC</strong></td>
                                            <td>General Management/ Engineering Management/ Telecommunication Management
                                                Specialization Courses</td>
                                            <td>5</td>
                                            <td>15</td>
                                        </tr>
                                        <tr>
                                            <td><strong>MBACP</strong></td>
                                            <td>Capstone Project</td>
                                            <td>1</td>
                                            <td>6</td>
                                        </tr>
                                        <tr>
                                            <td><strong>&nbsp;</strong></td>
                                            <td><strong>Total</strong></td>
                                            <td><strong>14 (19)</strong></td>
                                            <td><strong>45 (60)</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                </p>
                            </div>

                            <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                id="Information Technology">

                                <p style="color: black; text-align: justify;">
                                <p class="text-center"><strong>Master of Science in Information Systems (MSIS)</strong>
                                </p>
                                <b>Description: </b>
                                <p style="color: black; text-align: justify;">
                                    The 21st century is characterized by exciting new opportunities provided by information
                                    technology and by the myriad of changes that
                                    information technology is bringing to organizations. The Future University recognizes
                                    the need to be responsive according to these
                                    changes and demands, both locally and internationally. Hence, it is essential and
                                    important that the country's IS capability should be continually developed and
                                    strengthened to be at par globally. It is hereby the mission of the Faculty of
                                    Information Technology through Master of Science in Information Systems (MSIS) program
                                    to assist and prepare students to meet the challenges that lay ahead as they embark on
                                    the challenge of managing the ever changing technology. The Master of Science in
                                    Information Systems (MSIS) program gives such an advantage by preparing the graduate
                                    students to manage information technology and information systems needs. The program
                                    combines new technologies and information systems to develop graduates who effectively
                                    confront the many complex issues of applying information technology successfully within
                                    organizations. In addition, emphasis is placed on problem-solving activities,
                                    multi-functional group decision making, and communication skills. The MSIS program seeks
                                    to extend both the knowledge of students and their ability to effectively utilize their
                                    knowledge in a collaborative work environment. The MSIS program trains business leaders
                                    who are successful project managers familiar with modern programming, application
                                    development, database, and data mining abilities. MSIS program will provide graduate
                                    students with a unique blend of managerial, technological and communications skills
                                    essential for success in the exciting field of Information Technology. Whether the
                                    student is looking to advance one's career in the business, nonprofit, or government
                                    sector, the program can help prepare you to successfully manage projects and processes
                                    and direct people, gain the knowledge, skills, and confidence to become a more effective
                                    manager by learning to integrate and align organizational processes and systems, and
                                    motivate people to meet today's critical challenges and goals. The Faculty of
                                    Information Technology blends a solid business education with both the practical and
                                    theoretical
                                    skills to the students need to succeed in their careers and to be a leader in IT-related
                                    research.

                                </p>
                                </p>

                                <p>

                                    <hr>
                                    <b>Phlosophy Of The Program</b><br>
                                <p style="color: black; text-align: justify;">
                                    The Master of Science in Information Systems(MSIS) is an interdisciplinary degree
                                    program designed to provide studies in
                                    strategic information management, knowledge management, usability, business
                                    administration, information systems,
                                    information architecture, information design, computer sciences, policy, ethics, and
                                    project management.
                                    The degree is relatively new and has typically been developed alongside other, more
                                    established programs
                                    for the Graduate School of Future University. The MSIS degree has emerged to address
                                    the growing and unique need
                                    for information professionals who understand the conflux of multiple organizational
                                    issues across several disciplines.
                                    The MSIS degree is a two-year or less professional degree program that takes a
                                    multidisciplinary approach to the management
                                    of information systems and policy, drawing on computer science, business,
                                    information science, philosophy, design,
                                    and law to inform its curriculum. The classroom-based and/or online MSIS degree
                                    program suits the busy professional,
                                    offering flexibility and convenience. It's designed for adult students who aspire to
                                    move into technical
                                    leadership positions and expand their impact on the business operations,
                                    bringing together the components for a successful leadership position within today's
                                    organizations.
                                </p>
                                <hr>
                                <b>Aims Of The Program</b><br>
                                <p style="color: black; text-align: justify;">
                                    The Master of Science in Information Systems (MSIS) program aims to educate IS
                                    managers and professionals who possess technical and management knowledge for
                                    designing, developing and managing systems. It provides a transformational
                                    experience
                                    in integrating the technological and managerial sides of IS. On completion of this
                                    program, students will acquire: <br>
                                </p>
                                <li>The current knowledge in selected areas of IS management (namely, IS enterprise
                                    management, knowledge and information management, Internet and Web technologies,
                                    business analytics, and/or health informatics).</li>
                                <li>The technical and management knowledge in an integrated manner for designing,
                                    developing and managing IS systems.</li>
                                <li>The sense and creativity of identifying business needs and the capability of
                                    transforming them into IS systems.</li>
                                <li>The learning capability and solid foundations for sustainable self-development
                                    in the rapidly changing IS field.</li>
                                <li>The learning expertise to align organizational needs with technology solutions
                                    and identify new applications for technology.</li>
                                <li>The learning techniques to manage technology and supporting processes to enhance
                                    organization's competitive position.</li>

                                <hr>
                                <b>Career Opportunities</b><br>
                                <p style="color: black; text-align: justify;">
                                    The MSIS prepares career-oriented adults and professionals in the areas of IS
                                    leadership, programming, development, and engineering. The degree program equips
                                    students with the skills and knowledge and practical experience needed to facilitate
                                    these changes and to build a solid foundation for their career development. The use
                                    of electronic commerce and the emergence of new mobile and Internet technologies are
                                    expected to continue their current strong growth trend for many years to come. The
                                    role of the information technology manager will also evolve, as his IS skills and
                                    expertise become more vital to the operations of private enterprises and government
                                    entities. The MSIS equips you to play a significant role in the strategic success of
                                    21st Century business and technology operations, preparing to take full advantage of
                                    this in-demand profession and growing job market. As MSIS graduate, he or she will
                                    be prepared to manage the convergence of digital challenges, align technology with
                                    key business functions, and have a keen sense of how the evolution of technology
                                    tools and concepts can contribute to the success of your organization. After
                                    satisfactorily completing all the requirements leading to a MSIS degree,
                                    students may qualify for but not limited to the following entry level positions:
                                    <br>
                                </p>

                                <li>Advancement in current job Systems integrator.</li>
                                <li>Promotion within IS management Specialist (Technical, Web).</li>
                                <li>Management consultant Systems analyst/designer.</li>
                                <li>Internal consultant IT Infrastructure Specialist.</li>
                                <li>Chief Information Officer Network manager/analyst.</li>
                                <li>Chief Technical Officer Business analyst.</li>
                                <li>Sourcing manager Database Administrator.</li>
                                <li>Project manager Liaison between IT and Business Functions.</li>
                                <li>Entrepreneur Ph.D. program leading to teaching/research.</li>


                                <hr>
                                <b>Program Structure</b><br>
                                The MSIS degree combines both business and information technology to develop
                                graduates ready to function in e-business arena,
                                possessing the necessary skills and attitudes required for success in the
                                workplace.<br>

                                <hr>
                                <b>Summary of Requirements Structure</b><br>
                                <li>The courses are designed over a semester basis. A total of 4 semesters is
                                    required for the MSIS graduation.</li>
                                <li>The required 36 credit hours are distributed over 4 semesters.</li>

                                <hr>
                                <b>For IS Technology Specialization:</b><br>


                                <table class="table table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>Code of Block</th>
                                            <th>Course Nature</th>
                                            <th>No. of Courses</th>
                                            <th>Total No of Credits Required</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ISCO</td>
                                            <td>IS Core Courses</td>
                                            <td>4</td>
                                            <td>12</td>
                                        </tr>
                                        <tr>
                                            <td>ISSC</td>
                                            <td>IS Specialization Courses</td>
                                            <td>3</td>
                                            <td>9</td>
                                        </tr>
                                        <tr>
                                            <td>ISTS</td>
                                            <td>IS Technology Specialization Courses</td>
                                            <td>3</td>
                                            <td>9</td>
                                        </tr>
                                        <tr>
                                            <td>ISCP</td>
                                            <td>IS Capstone Project</td>
                                            <td>1</td>
                                            <td>6</td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>Total</th>
                                            <th>11</th>
                                            <th>36</th>
                                        </tr>
                                    </tbody>

                                </table>
                                <hr>

                                <b>For IS Management Specialization:</b><br>

                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Code of Block</th>
                                            <th>Course Nature</th>
                                            <th>No. of Courses</th>
                                            <th>Total No of Credits Required</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ISCO</td>
                                            <td>IS Core Courses</td>
                                            <td>4</td>
                                            <td>12</td>
                                        </tr>
                                        <tr>
                                            <td>ISSC</td>
                                            <td>IS Specialization Courses</td>
                                            <td>3</td>
                                            <td>9</td>
                                        </tr>
                                        <tr>
                                            <td>ISMS</td>
                                            <td>IS Management Specialization Courses</td>
                                            <td>3</td>
                                            <td>9</td>
                                        </tr>
                                        <tr>
                                            <td>ISCP</td>
                                            <td>IS Capstone Project</td>
                                            <td>1</td>
                                            <td>6</td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>Total</th>
                                            <th>11</th>
                                            <th>36</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr><br>

                                Students graduating from the MSIS program should be prepared to provide leadership in
                                the Information Systems field. Graduates will have the following skills, knowledge, and
                                values: <br>

                                <li>A core of IS management and technology knowledge.</li>
                                <li>Integration of IS and business foundations.</li>
                                <li>Broad business and real world perspective.</li>
                                <li>Communication, interpersonal, and team skills.</li>
                                <li>Analytical and critical thinking skills.</li>
                                <li>Specific skills leading to a career.</li>

                                </p>
                            </div>


                            <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                id="Engineering">

                                <p style="color: black; text-align: justify;">
                                <p class="text-center"><strong>Master of Science in Computer Engineering</strong>
                                </p>
                                <b>Description: </b>

                                The Master of Science in Computer Engineering program of the Future University is a
                                4-semester (33 credit hours) curriculum aimed at developing effective engineering
                                leaders in the industry and in the academe. The curricular program is distinctive from
                                traditional masters program since it harnesses information and communication
                                technologies (ICT) and innovative education to achieve the objectives. The MSc in
                                ComputerEngineering aims at providing opportunities to students to acquire appropriate
                                skills and expertise necessary to lead a team and to undertake research and development
                                in the different fields of computer engineering.

                                </p>
                                <p>
                                    <hr>
                                    <b>Aims Of The Program</b><br>
                                <p style="color: black; text-align: justify;">
                                    The aims of the program are to provide opportunities for suitably qualified persons
                                    to acquire skills and expertise necessary to undertake research and development in
                                    the field of computer engineering. The courses in the MSc Computer Engineering with
                                    specialization in Networking(MSc CpE-N), Embedded System (MSc CpE-ES), and VLSI
                                    Design ((MSc CpE-VD), enable students to acquire expertise, and enhance their
                                    communication skills to elucidate complex technical problems, and solutions in
                                    network engineering, embedded system and VLSI Design. This program prepares the
                                    graduate student to successfully handle problems
                                    requiring in-depth knowledge principles and processes in the these fields.
                                    Specifically, the graduate student is expected to: <br>

                                    <li>Possess a specialized knowledge in one of the primary sub-disciplines of
                                        computer engineering, or to achieve a broader familiarity
                                        across a number of sub-disciplines.</li>
                                    <li>Possess the analytical and technical skills capable of designing both general
                                        purpose and application-specific computer hardware.</li>
                                    <li>Have been exposed to state-of-the-art computer engineering techniques and
                                        technologies, including the latest computer architectures and design styles.
                                    </li>
                                    <li>The learning capability and solid foundations for sustainable self-development
                                    <li>Continue on a path of lifelong learning in the computer engineering field.</li>

                                    <hr>

                                    <b>Learning Outcomes</b><br>
                                    Upon the completion of the program, the student is expected to acquire intellectual
                                    and transferrable skills.
                                    It is expected that the graduate student will be able to: <br>

                                    <b>MSc Computer Engineering – Networking Track: </b><br>

                                    <li>Develop, construct and analyze complex network systems , processes and products
                                        using scientific and engineering principles.</li>
                                    <li>Demonstrate the ability to innovate designs of network systems including new
                                        processes and products.</li>
                                    <li>Understand the capabilities of experimental methods for problem solving.</li>
                                    <li>Integrate knowledge in mathematics, science, information technology, design,
                                        management principles and engineering principles to solve a variety of problems
                                        in networking.</li>
                                    <li>Have a thorough understanding and knowledge of management practices and ethical
                                        issues on the field of networking and their limitations.</li>
                                    <li>Design sustainable, efficient and cost effective network systems, processes and
                                        products.</li>
                                    <li>Effectively use available resources in the conduct of project development and
                                        research.</li>
                                    <li>Work effectively as an individual, member of a group and can take on leadership
                                        roles.</li>
                                    <li>Employ a systematic process in gathering, analyzing, interpreting, and
                                        communicating knowledge.</li>
                                    <li>Generate ideas that contribute to the advancement of network engineering.</li>

                                    <hr><br>
                                    <b>MSc Computer Engineering – VLSI Design Track: </b><br>

                                    <li>Knowledge mastery of semiconductor material properties and how they relate to
                                        their atomic
                                        structure and how they can be utilized to make useful devices(Diodes and MOS
                                        switches).</li>
                                    <li>Demonstrate a deep understanding of the operation of MOS transistors under
                                        different conditions(voltage, temperature and scaling)
                                        using adequate models while realizing the limitations of these models.</li>
                                    <li>Ability to use MOS transistors to construct useful circuits that achieve the
                                        required functionality.</li>
                                    <li>Ability to Design, Verify, Analyze and Evaluate the performance (speed, Power,
                                        Area, Noise margins) of different MOS digital circuits under different operating
                                        conditions.</li>
                                    <li>Demonstrate deep knowledge of the basic CMOS manufacturing process.</li>
                                    <li>Ability to produce an efficient mask design (layout, or blue print) of a CMOS IC
                                        for certain specifications (functional, speed, constraints ...etc.).
                                        This would involves such skills as design segmentation, simple floor planning,
                                        layout and post layout verification.</li>
                                    <li>Ability to use CAD tools relevant to IC design.</li>
                                    <li>Effectively use available resources in the conduct of project development and
                                        research.</li>
                                    <li>Work effectively as an individual, member of a group and can take on leadership
                                        roles.</li>
                                    <li>Employ a systematic process in gathering, analyzing, interpreting, and
                                        communicating knowledge.</li>
                                    <li>Generate ideas that contribute to the advancement of VLSI Design.</li>

                                    <hr><br>
                                    <b>MSc Computer Engineering – Embedded System Track: </b><br>

                                    <li>Analyze problems, develop solutions and implement solutions on several embedded
                                        systems platforms.</li>
                                    <li>Develop and build an embedded operating systems on a variety of platforms.</li>
                                    <li>Design and implement digital systems solutions in CPLDs and FPGAs.</li>
                                    <li>Demonstrate deep understanding of the operational principles and technological
                                        advancement of embedded computer systems and their components.</li>
                                    <li>Developing an ability to integrate embedded software, hardware, and operating
                                        systems to meet functional and performance requirements of embedded
                                        applications.</li>
                                    <li>Developing the ability to use modern design methodologies and tools for
                                        developing and testing complex HW/SW systems.</li>
                                    <li>Demonstrate expertise with system-level design concepts.</li>
                                    <li>Demonstrate expertise in the application of techniques and tools for performance
                                        analysis.</li>
                                    <li>Work within a design team in the development of digital solutions.</li>
                                    <li>Independently undertake the design and implementation of sub-sections of a
                                        development project.</li>
                                    <li>Design and implement software solutions to a high standard.</li>
                                    <li>Document and present design solutions in a team environment.</li>
                                    <li>Employ a systematic process in gathering, analyzing, interpreting, and
                                        communicating knowledge.</li>
                                    <li>Generate ideas that contribute to the advancement of Embedded System.</li>
                                </p>
                                <hr><br>


                                <b>Career Opportunities</b><br>
                                Computer Engineering is widely considered to be one of the most dynamic fields in
                                terms of market growth,
                                and accordingly, job prospects for Computer Engineering graduates are excellent. A
                                master degree in Computer Engineering is
                                held in high regard in industry and is an important asset for launching a successful
                                international career. As a graduate in Master of Science in Computer
                                Engineering with specialization in Networking (MSc CpE-N), he/she is qualified to
                                compete in the following:
                                <br>

                                <li>Senior Network Manager.</li>
                                <li>Network Team Leader.</li>
                                <li>Network Administrator.</li>
                                <li>Computer Network Engineer.</li>
                                <li>Research and Development Specialist.</li>
                                <li>Academician.</li>
                                <br>

                                As a graduate in Master of Science in
                                Computer Engineering with specialization in VLSI Design
                                (MSc CpE- VD), he/she is qualified to compete in the following:
                                <br>

                                <li>VLSI Design Team Leader.</li>
                                <li>VLSI Design Researcher.</li>
                                <li>Semiconductor Design Manager.</li>
                                <li>Semiconductor Manufacturing Manager.</li>
                                <li>Academician.</li>
                                <li>Electronic Circuit Development Consultant.</li>
                                <br>

                                As a graduate in Master of Science in Computer Engineering with
                                specialization in Embedded System (MSc CpE- ES), he/she is qualified to compete in
                                the following:
                                <br>

                                <li>Embedded Design Team Leader.</li>
                                <li>Embedded Design Researcher.</li>
                                <li>Embedded Design Developer.</li>
                                <li>Semiconductor Manufacturing Manager.</li>
                                <li>Academician.</li>
                                <br>

                                <hr>
                                <b>Entry Requirments</b><br>
                                Enrollees for the proposed Master in Science in Computer Engineering are bachelor
                                degree holders in Computer Engineering,
                                Electronics Engineering, Telecommunications Engineering, Electrical Engineering and
                                Computer Science. The applicant for the program should present an
                                authenticated Official Transcript of Records (OTR) from the institution granting
                                him/her the baccalaureate degree.<br>

                                <br>
                                </p>
                            </div>



                            <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                id="Telecommunication & Space Technology">

                                <p class="text-center"><strong>Masters on Communication Networks Engineering
                                        (MCNE)</strong></p>
                                <b>Description: </b>
                                <p style="color: black; text-align: justify;">
                                    Masters on Communication Networks Engineering (MCNE) is focused on the provisioning of
                                    competence across Telecommunications Engineering and Computer Science, taking into
                                    account tecno-economic aspects and services supported by the networks. In the first
                                    semester the students will build solid grounds in basic disciplines of information
                                    engineering. In the second and third semester they will acquire strong competence in the
                                    area of: software for telecommunication, design of wired and wireless networks, network
                                    architectures and tecno-economic aspects, network components. In the last semester, they
                                    will develop and original Master thesis in Future University Laboratories or in one of
                                    the sponsor companies. At the end of the Master program they will be able to design,
                                    plan and manage
                                    complex telecommunication infrastructures with heterogeneous network segments both from
                                    the hardware and software point of view.

                                </p>
                                <p>
                                    <hr>
                                    <b>Aims Of The Program</b><br>

                                    This program equips students with advanced skills in communication networks and its
                                    equipments design.
                                    It is an intensive theoretical-practical taught post graduate program,
                                    intended for Engineers with a high skill in electronics application and design.
                                    Specifically, this program aims to: <br>

                                    <li>Offering expert opinion and consultation in the field of Communication networks
                                        and its equipments to the community.</li>
                                    <li>The course is designed to enable the students to contribute the solution of
                                        technical
                                        problems related to communication network engineering such as optimization and
                                        performance enhancement.</li>
                                    <li>To provide the Engineers with the necessary knowledge and skills in dealing with
                                        the various systems
                                        and sub- system in the field of Communication network Engineering and its
                                        developments.</li>

                                    <hr> <br>
                                    <b>Learning Outcomes</b><br>
                                <p style="color: black; text-align: justify;">
                                    We prepare our post graduates for a professional career and for academic research.
                                    The emphasis of the program is on both theoretical and practical techniques for the
                                    design and development of Communication Networks, enabling the post graduates to
                                    apply their knowledge and skills in a variety of settings and applications. The
                                    Communication network engineering program allows our graduate students to gain
                                    knowledge and experience at the forefront of communication network technology.
                                    Future university is only Sudanese university to design and build real educational
                                    network with a multimedia delivery capability. You will gain first-hand experience
                                    of the technologies which go into networking and the planning of a various network
                                    such as VSAT, Broadband and wireless network. Design and implementation of
                                    communication network require a diverse range of
                                    knowledge, from Electronics and computing systems through to communication
                                    engineering for broadband communication. <br>

                                </p>
                                <hr>
                                <b>Career Opportunities</b><br>
                                A wide range of career opportunities in the post graduate Doctorate that specialized
                                in
                                Communication Engineering. Among the career opportunities are listed below. As a
                                graduate in Master of Science in
                                Computer Engineering with specialization in Networking (MSc CpE-N),
                                he/she is qualified to compete in the following: <br>

                                <li>Network Engineer.</li>
                                <li>VSAT Network Consultant.</li>
                                <li>Telecommunication Engineer.</li>
                                <li>Research and Development Specialist.</li>
                                <li>Academician.</li>

                                <hr>
                                <b>Entry Requirements</b><br>
                                B.Sc or B. Eng in related area such as Electronics Engineering,
                                Computer Engineering, Electrical Engineering or Telecommunication Engineering with
                                the following pre requisite subjects: <br>

                                <li>Digital Communication.</li>
                                <li>Analogue Communication.</li>
                                <li>Communication Theory.</li>
                                <li>Data Communication.</li>
                                <li>Electromagnetic.</li>

                                </p>
                            </div>


                            <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                id="Computer Science">

                                <p style="color: black; text-align: justify;">
                                <p class="text-center"><strong>Master of Science in Computer Science Degree
                                        Program</strong></p>
                                <b>Description: </b>

                                Master of Science in Computer Science Degree Program of Future University provides the
                                students with an opportunity to enhance their knowledge, skills, and experience to
                                become successful practitioners and leaders in the field of Computer Science. The
                                Program is designed to prepare the students to pursue their careers as Computer Science
                                professionals. It is suitable for students with a background in computing. The Program
                                is organized to enhance students' understanding of the theories, concepts and practices
                                of computer science, enabling them to develop new skills and competencies.

                                </p>

                                <p>
                                    <hr>
                                    <b>Aims Of The Program</b><br>
                                <p style="color: black; text-align: justify;">
                                    The aims of the program are to provide opportunities for suitably qualified persons
                                    to acquire skills and expertise necessary to undertake research and development in
                                    the field of computer science. The courses in the MSc Computer Science with
                                    specialization in Computer Graphics, Artificial Intelligence and Software
                                    Engineering, enable students to acquire expertise, and enhance their technical
                                    skills in these fields. This program prepares the graduate student to successfully
                                    handle problems requiring in-depth knowledge principles and processes in these
                                    fields. Students who successfully complete this Program will be qualified to assume
                                    responsible positions in industry and government at the research, planning and
                                    development levels. This program is planned to achieve the following goals: <br>

                                    <li>To develop an understanding of the theoretical concepts and principles,
                                        underlying the science of computing technology.</li>
                                    <li>Application of the theories to the practices of Computing. Assume responsible
                                        positions and apply computing skills in industry and government at the research,
                                        planning, and development levels.</li>
                                    <li>To develop a strong foundation and enthusiasm in students for the growth of
                                        their skills and knowledge in Computer Science through independent research and
                                        study.</li>

                                    <hr> <br>
                                    <b>Learning Outcomes</b><br>
                                    Upon the completion of the program, the student is expected to
                                    acquire intellectual and transferrable skills. It is expected that the graduate
                                    student will be able to: <br>

                                    <b>MSc Computer Science - Computer Graphics Track: </b><br>

                                    The emphasis of the program is on both theoretical and practical techniques for the
                                    design and development of computer graphics applications,
                                    enabling graduates to apply their knowledge and skills in a variety of computer
                                    graphics fields. <br>

                                    <b>MSc Computer Science - Artificial Intelligence Track: </b><br>

                                    The emphasis of the program is on both theoretical and practical techniques for the
                                    design and development of intelligent software,
                                    enabling graduates to apply their knowledge and skills in a variety of Artificial
                                    Intelligence fields.<br>

                                    <b>MSc Computer Science - Software Engineering Track: </b><br>

                                    The emphasis of the program is on both theoretical and practical techniques for the
                                    design and development of software projects,
                                    enabling graduates to apply their knowledge and skills in a variety of software
                                    development processes. <br>

                                    <hr>
                                    <b>Career Opportunities</b><br>

                                    Computer Science is widely considered to be one of the most dynamic fields in terms
                                    of market growth, and accordingly, job prospects for Computer graduates are
                                    excellent. A master degree in Computer Science is held in high regard in industry
                                    and is an important asset for launching a successful international career. As a
                                    graduate in Master of Science in Computer Science with specialization in Computer
                                    Graphics, he/she is qualified to compete in the following: <br>

                                    <li>2D and 3D Animator.</li>
                                    <li>3D Modeler.</li>
                                    <li>Film Special Effects.</li>
                                    <li>Interactive Designer.</li>
                                    <li>Multimedia Producer.</li>
                                    <li>Production Graphic Artist.</li>
                                    <li>Publishing Design and Production.</li>
                                    <li>Special Effects Artist.</li>
                                    <li>Video Game Designer.</li>
                                    <li>Visual Design.</li>
                                    <li>Academia.</li>

                                    <br>

                                    As a graduate in <b> Master of Science in Computer Science with specialization in
                                        Artificial Intelligence</b> he/she is qualified to compete in the following:
                                    <br>
                                    <li>Knowledge Engineer.</li>
                                    <li>Intelligent Systems or Expert Systems Developer.</li>
                                    <li>Systems Analyst.</li>
                                    <li>Systems Programmer.</li>
                                    <li>Systems Designer.</li>
                                    <li>Software Developer.</li>
                                    <li>Software Consultant.</li>
                                    <li>Computer Scientist.</li>
                                    <li>Researcher.</li>
                                    <li>Academia.</li>
                                    <br>
                                    As a graduate in <b>Master of Science in Computer Science with specialization in
                                        Software Engineering</b> he/she is qualified to compete in the following:
                                    <br>
                                    <li>Systems Programmer.</li>
                                    <li>Systems Analyst.</li>
                                    <li>Systems Designer.</li>
                                    <li>Software Developer.</li>
                                    <li>Software Consultant.</li>
                                    <li>Researcher.</li>
                                    <li>Academia.</li>


                                    <hr>
                                    <b>Entry Requirements</b><br>
                                    Admission Requirements for Master Program in Computer Sciences. Bachelor Degree
                                    Honors in Computer Science or another equivalent. Obtain a bachelor's degree in
                                    Computer Sciences from the Faculty of Computer Sciences and Information Technology
                                    or any college and experience with a similar field. Access to Higher Diploma in
                                    Computer Science from the Faculty of Computer Science and Information Technology or
                                    any similar field. Obtain a bachelor degree in a related area of Computer Science
                                    Cognitive such as: Information Technology, Information Systems, Computer Engineering
                                    and Mathematics. The applicant for the program should present an authenticated
                                    Official Transcript of Records (OTR) from the institution granting him/her the
                                    bachelor degree.<br>

                                </p>
                            </div>

                            <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                id="Architecture">

                                <p style="color: black; text-align: justify;">
                                <p class="text-center"><strong>Master of Landscape Architecture</strong></p>
                                <b>Description: </b>

                                The mission of the MLA Program in Landscape Architecture is to educate for ultimate
                                leadership in the landscape architecture profession. This mission requires fostering
                                rigorous scholarly inquiry of the discipline, and the preparation of knowledgeable
                                practitioners. The Program in Landscape Architecture has the dual objectives of
                                providing students with a core of design and technical skills in combination with
                                experiences in pure and applied research. This duality prepares students for identifying
                                and solving problems in the profession through design and research, and it is a Program
                                focus. The MLA Program in Landscape Architecture also prepares students to enter
                                practice in private, public, academic, and research organizations. Student preparation
                                is enhanced by specialized coursework taken inside landscape architecture and by the
                                topic of one's thesis. Specialized thesis committee members are selected to help
                                students choose areas of primary interest in their MLA Program landscape architecture.
                                The MLA Program in Landscape Architecture should fully be approved by expert committee
                                members from the Ministry of Higher Education before commencement and continues
                                upgrading should be done to help raise educational standard. Graduates from the MLA
                                Program should be ready for any future evaluation when successfully pass and qualifies
                                individuals are expected to practice as landscape architects in the Sudan and anywhere
                                in the world.

                                </p>

                                <p>
                                    <hr>
                                    <b>Career Opportunities</b><br>
                                <p style="color: black; text-align: justify;">
                                    Employment opportunities for Landscape Architects are expected to grow at a faster
                                    than average rate for all occupations through coming years. Public interest in
                                    improving quality of life, historic preservation, and conservation-oriented
                                    development will help keep Landscape Architects in demand. Landscape Architects can
                                    work on several different projects at the same time, which means they are buffered
                                    to some degree from the cyclical employment in the construction and real estate
                                    industries. Employers generally prefer hiring entry-level Landscape Architects who
                                    have some internship experience, which significantly reduces the amount of
                                    on-the-job training required. New graduates may find the best opportunities are for
                                    Landscape Architects who have strong technical skills such as computer design, good
                                    communication skills, and some knowledge of environmental codes and regulations.<br>

                                </p>

                                <hr> <br>
                                <b>Advance Prospects</b><br>
                                <p style="color: black; text-align: justify;">
                                    Landscape Architects begin their careers as junior designers or apprentice
                                    designers. The typical advancement path, after several years experience, is to
                                    intermediate designer, senior designer, or project manager. Some Landscape
                                    Architects will become principals in the firms where they work. Others start their
                                    own landscape design and consulting firms. Nearly one in four Landscape Architects
                                    are self-employed.
                                </p>

                                <br>

                                <hr>

                                <b>Entry Requirements</b><br>
                                Admission decisions for the 4 semesters MLA program are based on the strength of the
                                applicant's undergraduate degree and/or professional portfolio, academic and
                                professional references and/or on the basis of on-site or telephone interviews.
                                General criteria for admission to MLA studies are:<br>

                                <li>Completion of an undergraduate degree in architecture, landscape architecture or
                                    a closely related design field with an undergraduate a reasonable GPA.</li>
                                <li>Letters of recommendation and supporting application materials that indicate the
                                    applicant is prepared to succeed in the program.</li>
                                <li>Application materials indicating an educational focus area that relates strongly
                                    to the research/scholarly interests of the faculty.</li>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
