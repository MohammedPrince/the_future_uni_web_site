@extends('components.client-layout')
@section('main-client-content')

<div class="site-breadcrumb">
        <div class="container">
            <a href="/Home"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #d1291f;">Staff Directory</span>
        </div>
    </div>

    <section class="about-section">

        <div class="container">

            <div class="post-item post-details" style="padding-top: 0px;">
                <div class="section-title ">
                    <div class="post-content">
                        <p></p>

                        <p></p>

                        <div class="container">


                            <div class="hr-sect new4"><span>Information of Expertise</span></div>

                            <p>
                            <blockquote class="text-center" style="background-color: whitesmoke;">
                                <span style="font-size: 18px;">

                                <section class="contact-page spad pt-0" >
<div class="container" >

<table cellspacing="0" cellpadding="20" >
    <tr>
    <td width="10%">
   
    @if(($staff_info_cv?->cv_image)=="")

    <div class="circle" >
<img src="{{ asset('/storage/app/public/' . 'test57992.jpg') }}"  alt="Image">
</div>
    
  
@else

<div class="circle" >
<img src="{{ asset('/storage/app/public/staff_imgs/' . $staff_info_cv->cv_image) }}"  alt="Image">
</div>

@endif



    </td>
      <td colspan="2">
        <h1>{{$staff_info?->staff_name}}</h1>
        {{$staff_info?->staff_position}}
      </td>

    </tr>

    @if(($staff_info_cv?->about)!="")

    <tr>
      <td colspan="1">About</td>
      <td>
        {{-- $staff_info_cv?->about --}}
    
        {!! \App\Helpers\MarkdownHelper::render($staff_info_cv?->about) !!}
      </td>
    </tr>
    @endif
    @if(($staff_info_cv?->work_experience)!="")
    <tr>
      <td><h2>Work Experience</h2></td>
      <td>
          {{-- $staff_info_cv?->work_experience --}}


        {!! \App\Helpers\MarkdownHelper::render($staff_info_cv?->work_experience) !!}

      </td>
    </tr>
    @endif
    @if(($staff_info_cv?->education)!="")

    <tr>
      <td><h2>Education</h2></td>
      <td>
      {{-- $staff_info_cv?->education --}}
      {!! \App\Helpers\MarkdownHelper::render($staff_info_cv?->education) !!}

      </td>
    </tr>

    @endif
    @if(($staff_info_cv?->skills)!="")


    <tr>
      <td><h2>Skills</h2></td>
      <td>
      {{-- $staff_info_cv?->skills --}}
      {!! \App\Helpers\MarkdownHelper::render($staff_info_cv?->skills) !!}
      </td>
    </tr>
    @endif
    @if(($staff_info_cv?->publication)!="")
     <tr>
      <td><h2>Publication</h2></td>
      <td>
      
      {{-- $staff_info_cv?->publication --}}
      {!! \App\Helpers\MarkdownHelper::render($staff_info_cv?->publication) !!}

      </td>
    </tr>
    @endif
    <!--  -->
    @if(($staff_info_cv?->teaching_and_supervision)!="")
    <tr>
      
      <td><h2>Teaching and Supervision</h2></td>
      <td>
      {{-- $staff_info_cv->teaching_and_supervision --}}
      {!! \App\Helpers\MarkdownHelper::render($staff_info_cv->teaching_and_supervision) !!}

      </td>
    </tr>
    @endif

    <!--  -->

    @if(($staff_info_cv?->academic_recognition_and_leadership)!="")
    <tr>
      <td><h2>Academic Recognition and Leadership</h2></td>
      <td>
      {{-- $staff_info_cv->academic_recognition_and_leadership --}}
      {!! \App\Helpers\MarkdownHelper::render($staff_info_cv->academic_recognition_and_leadership) !!}

      </td>
    </tr>
    @endif
   
    
    @if(($staff_info_cv?->contact)!="")

    <tr>
      <td><h2>Contact</h2></td>
      <td>

      {{-- $staff_info_cv->contact --}}
      {!! \App\Helpers\MarkdownHelper::render($staff_info_cv->contact) !!}
     
      </td>
    </tr>
    @endif
  </table>


</div>
</section>
                                    
                                    
                  
                                </span>
                            </blockquote>
                            </p>

                            <div class="hr-sect new4"><span></span></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
