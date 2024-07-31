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
      <td>
        <h1>{{$staff_info?->staff_name}}</h1>
        {{$staff_info?->staff_position}}
      </td>

    </tr>

    @if(($staff_info_cv?->about)!="")

    <tr>
      <td style="vertical-align: top; text-align: left;">About</td>
      <td style="vertical-align: top;">
        {{-- $staff_info_cv?->about --}}
    <div style="text-align: justify;">
        {!! \App\Helpers\MarkdownHelper::render($staff_info_cv?->about) !!}
        </div>

      </td>
    </tr>
    @endif
    @if(($staff_info_cv?->work_experience)!="")
    <tr>
      <td style="vertical-align: top; text-align: left;">Work Experience</td>
      <td style="vertical-align: top;">
          {{-- $staff_info_cv?->work_experience --}}

          <div style="text-align: justify;">
        {!! \App\Helpers\MarkdownHelper::render($staff_info_cv?->work_experience) !!}
          </div>
      </td>
    </tr>
    @endif
    @if(($staff_info_cv?->education)!="")

    <tr>
      <td style="vertical-align: top; text-align: left;">Education</td>
      <td style="vertical-align: top;">
      {{-- $staff_info_cv?->education --}}
      <div style="text-align: justify;">
      {!! \App\Helpers\MarkdownHelper::render($staff_info_cv?->education) !!}
     </div>
      </td>
    </tr>

    @endif
    @if(($staff_info_cv?->skills)!="")


    <tr>
      <td style="vertical-align: top; text-align: left;">Skills</td>
      <td style="vertical-align: top;">
      {{-- $staff_info_cv?->skills --}}
      <div style="text-align: justify;">
      {!! \App\Helpers\MarkdownHelper::render($staff_info_cv?->skills) !!}
      </div>
      </td>
    </tr>
    @endif
    @if(($staff_info_cv?->publication)!="")
     <tr style="vertical-align: top;">
      <td style="vertical-align: top; text-align: left;">Publication</td>
      <td style="vertical-align: top;">
      
      {{-- $staff_info_cv?->publication --}}
      <div style="text-align: justify;">
      {!! \App\Helpers\MarkdownHelper::render($staff_info_cv?->publication) !!}
      </div>

      </td>
    </tr>
    @endif
    <!--  -->
    @if(($staff_info_cv?->teaching_and_supervision)!="")
    <tr>
      
      <td style="vertical-align: top; text-align: left;">Teaching and Supervision</td>
      <td style="vertical-align: top;">
      {{-- $staff_info_cv->teaching_and_supervision --}}
      <div style="text-align: justify;">
      {!! \App\Helpers\MarkdownHelper::render($staff_info_cv->teaching_and_supervision) !!}
      </div>

      </td>
    </tr>
    @endif

    <!--  -->

    @if(($staff_info_cv?->academic_recognition_and_leadership)!="")
    <tr>
      <td style="vertical-align: top; text-align: left;">Academic Recognition</td>
      <td style="vertical-align: top;">
      {{-- $staff_info_cv->academic_recognition_and_leadership --}}
      <div style="text-align: justify;">

      {!! \App\Helpers\MarkdownHelper::render($staff_info_cv->academic_recognition_and_leadership) !!}.
      </div>

      </td>
    </tr>
    @endif
   
    
    @if(($staff_info_cv?->contact)!="")

    <tr>
      <td style="vertical-align: top; text-align: left;">Links</td>
      <td style="vertical-align: top;">

      {{-- $staff_info_cv->contact --}}
      <div style="text-align: justify;">

      {!! \App\Helpers\MarkdownHelper::render($staff_info_cv->contact) !!}
      </div>
     
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
