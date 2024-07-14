@extends('components.admin-layout')
@section('main-admin-content')

<main class="content">

<center>
    @if (session()->has('success'))
        <div class="alert success text-center">

            <p class="inner">
                {{ session()->get('success') }}
            </p>
        </div>
    @endif

    @if (session()->has('failure'))
        <div class="alert error text-center">

            <p class="inner">
                {{ session()->get('failure') }}
            </p>
        </div>
    @endif
</center>

<div class="container-fluid p-0">

<h1 class="h3 mb-3">Staff CV</h1>


<div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h5 class="card-title mb-0">Add Staff </h5>
                    </div> -->
                    <div class="card-body">

                    <form action="add_cv" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table cellspacing="0" cellpadding="5" width="100%">
    <tr>
    <td width="30%">
      @if(($staff_info_cv?->cv_image)=="")
    
           <div class="card-header">
                 <h5 class="card-title mb-0">CV Image</h5>
             </div>
          <div class="card-body">
          <input type="file" value="" name="cv_image"
           class="form-control" placeholder="Enter Logo">
              @error('cv_image')
            <div class="alert error text-center">
                  <p class="inner">{{ $message }}</p>
            </div>
              @enderror
            </div>
      @else
  
      <div class="circle">
      <img src="{{ asset('/storage/app/public/staff_imgs/' . $staff_info_cv->cv_image) }}" style="width: 50%; height: 50%;" alt="Image">
      </div>


          <div class="card-body">
          <input type="file" value="" name="cv_image"
           class="form-control" placeholder="Enter Logo">
              @error('cv_image')
            <div class="alert error text-center">
                  <p class="inner">{{ $message }}</p>
            </div>
              @enderror
            </div>
  

      @endif
    </td>
      <td colspan="2">
        <h1>{{$staff_info->staff_name}}</h1>
        <p>{{$staff_info->staff_position}}</p>
      </td>

    </tr>
    <tr>
      <td width="30%"><h2>About</h2></td>
      <td>

         <div class="card-body col-12 col-lg-12">
         <textarea name="about" class="form-control" id="markdown-editor-about"
         placeholder="">{{$staff_info_cv?->about ?? ''}}</textarea>
         @error('about')
        <div class="alert error text-center">
        <p class="inner">{{ $message }}</p>
        </div>
        @enderror
         </div>
      </td>
    </tr>
    <tr>
      <!--  -->
      <input type="hidden" name="staff_id" value="{{$staff_info->staff_id}}" id="">
      <input type="hidden" name="old_image" value="{{$staff_info->cv_image}}" id="">

      <!--  -->

      <td><h2>Work Experience</h2></td>
      <td>
      <div class="card-body col-12 col-lg-12">
         <textarea name="work_experience" class="form-control" id="markdown-editor-work-experience"
         placeholder="">{{$staff_info_cv?->work_experience ?? ''}}</textarea>
         @error('work_experience')
        <div class="alert error text-center">
        <p class="inner">{{ $message }}</p>
        </div>
        @enderror
         </div>
      </td>
    </tr>
    <tr>
      <td><h2>Education</h2></td>
      <td>
      <div class="card-body col-12 col-lg-12">
         <textarea name="education" class="form-control" id="markdown-Education"
         placeholder="Enter Event Description">{{$staff_info_cv?->education ?? ''}}</textarea>
         @error('education')
        <div class="alert error text-center">
        <p class="inner">{{ $message }}</p>
        </div>
        @enderror
         </div>
        
      
      </td>
    </tr>
    <tr>
      <td><h2>Skills</h2></td>
      <td>

      <div class="card-body col-12 col-lg-12">
         <textarea name="skills" class="form-control" id="markdown-skills"
         placeholder="">{{$staff_info_cv?->skills ?? ''}}</textarea>
         @error('skills')
        <div class="alert error text-center">
        <p class="inner">{{ $message }}</p>
        </div>
        @enderror
         </div>
      </td>
    </tr>


    <!--  -->

    <tr>
      <td><h2>Publication</h2></td>
      <td>

      <div class="card-body col-12 col-lg-12">
         <textarea name="publication" class="form-control" id="markdown-publication"
         placeholder="">{{$staff_info_cv?->publication ?? ''}}</textarea>
         @error('publication')
        <div class="alert error text-center">
        <p class="inner">{{ $message }}</p>
        </div>
        @enderror
         </div>
      </td>
    </tr>

    <!--  -->

    <tr>
      <td><h2>Teaching and Supervision</h2></td>
      <td>

      <div class="card-body col-12 col-lg-12">
         <textarea name="teaching_and_supervision" class="form-control" id="markdown-teaching_and_supervision"
         placeholder="">{{$staff_info_cv?->teaching_and_supervision ?? ''}}</textarea>
         @error('teaching_and_supervision')
        <div class="alert error text-center">
        <p class="inner">{{ $message }}</p>
        </div>
        @enderror
         </div>
      </td>
    </tr>

    <!--  -->


    <tr>
      <td><h2>Academic Recognition and Leadership</h2></td>
      <td>
      <div class="card-body col-12 col-lg-12">
         <textarea name="academic_recognition_and_leadership" class="form-control" id="markdown-academic_recognition_and_leadership"
         placeholder="">{{$staff_info_cv?->academic_recognition_and_leadership	 ?? ''}}</textarea>
         @error('academic_recognition_and_leadership')
        <div class="alert error text-center">
        <p class="inner">{{ $message }}</p>
        </div>
        @enderror
         </div>
      </td>
    </tr>

    <tr>
      <td><h2>Contact</h2></td>
      <td>

      <div class="card-body col-12 col-lg-12">
         <textarea name="contact" class="form-control" id="markdown-contact"
         placeholder="">{{$staff_info_cv?->contact ?? ''}}</textarea>
         @error('contact')
        <div class="alert error text-center">
        <p class="inner">{{ $message }}</p>
        </div>
        @enderror
         </div>
      </td>
    </tr>
  </table>
  <button class="btn btn btn-success">Add CV</button>
  <!-- <input type="submit" name="" value="" class="btn btn btn-info"> -->
                    </form>

</div>
</div>
</div>
</div>
</div>
</main>


@endsection