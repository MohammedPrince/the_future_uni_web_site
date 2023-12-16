/* =================================
------------------------------------
	Unica - University Template
	Version: 1.0
 ------------------------------------ 
 ====================================*/

'use strict';

if (window.location.href.indexOf("/Fu-Historical-Gallery") > -1) {

var swiper = new Swiper(".mySwiper", {
	cssMode: true,
	navigation: {
	  nextEl: ".swiper-button-next",
	  prevEl: ".swiper-button-prev",
	},
	pagination: {
	  el: ".swiper-pagination",
	},
	mousewheel: true,
	keyboard: true,
  });

  jQuery(document).ready(function($){
    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
        0:{
          items:1
        },
        600:{
          items:3
        },
        1000:{
          items:5
        }
      }
    })
  })

 }


$(document).ready(function() {
	$('#search-input').keyup(function() {
		var searchTerm = $(this).val();
		if (searchTerm !== '') {
		   // alert(searchTerm);
			$.ajax({
				url: '/search',
				type: 'GET',
				data: { term: searchTerm },
				success: function(response) {
					$('#search-results').show();
					$('#search-results').html(response);
				}
			});
		} else {
			$('#search-results').empty();
			$('#search-results').hide();
		}
	});
});

function openModal(modalId) {
	var modal = document.getElementById("myModal");
	var modalTitle = document.getElementById("modalTitle");
	var modalContent = document.getElementById("modalContent");
  
	if (modalId === 1) {
	  modalTitle.textContent = "How To Apply \n\n";
	  modalContent.textContent = "\n Admission to university is according to the terms and conditions issued by the National Council for Higher Education and Scientific Research, in the Ministry of Higher Education and Research, and according to the conditions for each program, as stated in the admission prospectus issued by the General Administration for Admission, Evaluation and Authentication of Certificates in the Ministry of Higher Education and Scientific Research for any specific academic year. There may also be special admission conditions for individual programs. Candidates for admission to the university need to meet special conditions for each of the following university programs: 1. Bachelor Degree (Honors) 2. Diploma.";
	} else if (modalId === 2) {
	  modalTitle.textContent = "Admission To Bachelor \n\n";
	  modalContent.textContent = "\n ADMISSION TO BACHELOR PROGRAMS ▪ General Admission ▪ Direct Admission Applicants need to complete the university application form and submit it to the Admission and Registration Administration in the university along with the following required documents: an original and copy of secondary school certificate, a copy of birth certificate, a copy of Nationality certificate, three passport size photographs and a medical test certificate. Applicants may also use the Electronic Admission Program. Direct Admission students should complete the admission form issued by the Ministry of Higher Education and Scientific Research, ensuring to use the University’s number, and shall deliver it in person or via the internet. Applicants need to complete the special form for Admission of Adult Students, and submit it to the Admission and Registration Administration along with the followin"
  "A report on his performance, and certificate of experience from his previous work."
  "Three letters of recommendation from colleagues in fields related to the specialization. "
  "Any other related certificates. not be final until approved by the General Administration for Admission and Evaluation and Authentication of Certificates in the Ministry of Higher Education and Scientific Research."
  "After submitting all the requirements, a committee will be formed by the Dean of the Faculty concerned to evaluate the application, to hold an interview, and to make recommendations. Any admission shall not be final until approved by the General Administration for Admission and Evaluation and Authentication of Certificates in the Ministry of Higher Education and Scientific Research.";
	} else if (modalId === 3) {
	  modalTitle.textContent = "Admission To Diploma \n \n";
	  modalContent.textContent = "\n  Admission to the first semester of the various Diploma Programs shall be according to the current conditions decided by the National Council for Higher Education. There may also be special conditions decided by the relevant Department Council for admission to a Diploma course. Students should have an interview and a medical fitness test.";
	}
  
	modal.style.display = "block";
  }
  
  function closeModal() {
	document.getElementById("myModal").style.display = "none";
  }

document.addEventListener('DOMContentLoaded', function() {
	var readMoreButtons = document.querySelectorAll('.read-more');
	
	readMoreButtons.forEach(function(button) {
	  button.addEventListener('click', function() {
		var card = button.closest('.card');
		card.classList.toggle('expanded');
		if (card.classList.contains('expanded')) {
		  button.textContent = 'Read Less';
		} else {
		  button.textContent = 'Read More';
		}
	  });
	});
  });

function openTab(evt, tabname) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
	  tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
	  tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(tabname).style.display = "block";
	evt.currentTarget.className += " active";
  }
  



var window_w = $(window).innerWidth();

$(window).on('load', function() {
	/*------------------
		Preloder
	--------------------*/
	$(".loader").fadeOut(); 
	$("#preloder").delay(400).fadeOut("slow");

});

(function($) {

	/*------------------
		Navigation
	--------------------*/
	$('.nav-switch').on('click', function(event) {
		$('.main-menu').slideToggle(400);
		event.preventDefault();
	});


	/*------------------
		Background set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});

	
	/*------------------
		Hero Slider
	--------------------*/
	var window_h = $(window).innerHeight();
	var header_h = $('.header-section').innerHeight();
	var nav_h = $('.nav-section').innerHeight();

	if (window_w > 767) {
		$('.hs-item').height((window_h)-((header_h)+(nav_h)));
	}

	$('.hero-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		mouseDrag: false,
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
		items: 1,
		autoplay: true
	});


	/*------------------
		Counter
	--------------------*/
	$(".counter").countdown("2018/07/01", function(event) {
		$(this).html(event.strftime("<div class='counter-item'><h4>%D</h4>Days</div>" + "<div class='counter-item'><h4>%H</h4>hours</div>" + "<div class='counter-item'><h4>%M</h4>Mins</div>" + "<div class='counter-item'><h4>%S</h4>secs</div>"));
	});


	/*------------------
		Gallery
	--------------------*/
	$('.gallery').find('.gallery-item').each(function() {
		var pi_height1 = $(this).width(),
		pi_height2 = pi_height1/2;
		
		if($(this).hasClass('gi-long') && window_w > 991){
			$(this).css('height', pi_height2);
		}else{
			$(this).css('height', Math.abs(pi_height1));
		}
	});

	$('.gallery').masonry({
		itemSelector: '.gallery-item',
		columnWidth: '.grid-sizer'
	});
	


	/*------------------
		Testimonial
	--------------------*/
	$('.testimonial-slider').owlCarousel({
		loop: true,
		nav: true,
		dots: true,
		animateOut: 'fadeOutUp',
		animateIn: 'fadeInUp',
		navText: ['<i class="fa fa-angle-left"></i>', '</i><i class="fa fa-angle-right"></i>'],
		items: 1,
		autoplay: true
	});
	


	/*------------------
		Popup
	--------------------*/
	$('.img-popup').magnificPopup({
		type: 'image',
		mainClass: 'img-popup-warp',
		removalDelay: 400,
	});



})(jQuery);

