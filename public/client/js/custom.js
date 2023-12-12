

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



