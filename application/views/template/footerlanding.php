<footer>
	<p>De Kemaskeun &copy;2021</p>
</footer>

<script>
	$('button').click(function(){
   		$('.alert').addClass("show");
    	$('.alert').removeClass("hide");
    	$('.alert').addClass("showAlert");
    	
         });
    $('.close-btn').click(function(){
        $('.alert').removeClass("show");
        $('.alert').addClass("hide");
    });

 $(".carousel").owlCarousel({
           margin: 20,
           loop: true,
           autoplay: true,
           autoplayTimeout: 4000,
           autoplayHoverPause: true,
           responsive: {
             0:{
               items:1,
               nav: false
             },
             600:{
               items:2,
               nav: false
             },
             1000:{
               items:3,
               nav: false
             }
           }
         });
	let nav = document.querySelector('nav');
	let dropdown = nav.querySelector('.dropdown');
	let dropdownToggle = nav.querySelector("[data-action='dropdown-toggle']");
	let navToggle = nav.querySelector("[data-action='nav-toggle']");

	dropdownToggle.addEventListener('click', () => {
		if (dropdown.classList.contains('show')) {
			dropdown.classList.remove('show');
		} else {
			dropdown.classList.add('show');
		}
	})

	navToggle.addEventListener('click', () => {
		if (nav.classList.contains('opened')) {
			nav.classList.remove('opened');
		} else {
			nav.classList.add('opened');
		}
	})
</script>
</body>
</html>