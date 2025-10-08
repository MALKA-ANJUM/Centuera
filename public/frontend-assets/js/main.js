
(function () {
	"use strict";

	window.onload = function () {

		// Header Sticky JS
		const getHeaderId = document.querySelector(".navbar-area");
		if (getHeaderId) {
			window.addEventListener('scroll', event => {
				const height = 150;
				const { scrollTop } = event.target.scrollingElement;
				document.querySelector('#navbar').classList.toggle('sticky', scrollTop >= height);
			});
		}
		// Back to Top
		const getId = document.getElementById("backtotop");
		if (getId) {
			const topbutton = document.getElementById("backtotop");
			topbutton.onclick = function (e) {
				window.scrollTo({ top: 0, behavior: "smooth" });
			};
			window.onscroll = function () {
				if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
					topbutton.style.opacity = "1";
				} else {
					topbutton.style.opacity = "0";
				}
			};
		}
	};

	// Price Range slider JS
	$(function () {
		$("#slider-range").slider({
			range: true,
			min: 130,
			max: 500,
			values: [130, 250],
			slide: function (event, ui) {
				$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
			}
		});
		$("#amount").val("$" + $("#slider-range").slider("values", 0) +
			" - $" + $("#slider-range").slider("values", 1));
	});


	// Hero Slider JS
	$('.hero-slider').owlCarousel({
		loop: true,
		autoplayTimeout: 5000,
		autoplay: false,
		dots: true,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn', // add this
		items: 1,
	});

	// Testimonial Slider JS
	$('.testimonial-cards').owlCarousel({
		nav: true,
		loop: true,
		dots: false,
		margin: 20,
		autoplay: false,
		center: true,
		autoplayHoverPause: true,
		navText: [$('.benefits-next'), $('.benefits-prev')],
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 1
			},
			768: {
				items: 2
			},
			992: {
				items: 1
			},
			1200: {
				items: 2
			}
		}
	});
	$('.testimonial-slider-2').owlCarousel({
		nav: false,
		loop: true,
		dots: true,
		margin: 25,
		autoplay: false,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 1
			},
			768: {
				items: 2
			},
			992: {
				items: 2
			},
			1200: {
				items: 2
			}
		}
	});
	$('.testimonial-slider-3').owlCarousel({   
		nav: false,
		loop: true,
		dots: false,
		margin: 20,
		autoplay: false,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 1
			},
			768: {
				items: 2
			},
			992: {
				items: 3
			},
			1200: {
				items: 3
			}
		}
	});

	// Course Slider JS
	$('.course-slider').owlCarousel({
		nav: true,
		loop: true,
		dots: false,
		margin: 25,
		autoplay: false,
		autoplayHoverPause: true,
		navText: [$('.benefits-next'), $('.benefits-prev')],
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 1
			},
			768: {
				items: 2
			},
			992: {
				items: 2
			},
			1200: {
				items: 3
			}
		}
	});


	// Timer Js

	document.addEventListener('DOMContentLoaded', function () {
		const forms = document.querySelectorAll('.real-cohort-form');

		forms.forEach(form => {
			const startDate = new Date(form.getAttribute('data-start-date')).getTime();
			const daysElement = form.querySelector('.days');
			const hoursElement = form.querySelector('.hours');
			const minutesElement = form.querySelector('.minutes');
			const secondsElement = form.querySelector('.seconds');

			const x = setInterval(function () {
				const now = new Date().getTime();
				const distance = startDate - now;

				const days = Math.floor(distance / (1000 * 60 * 60 * 24));
				const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				const seconds = Math.floor((distance % (1000 * 60)) / 1000);

				daysElement.innerHTML = days;
				hoursElement.innerHTML = hours;
				minutesElement.innerHTML = minutes;
				secondsElement.innerHTML = seconds;

				if (distance < 0) {
					clearInterval(x);
					form.querySelector('.countdown').innerHTML = "EXPIRED";
				}
			}, 1000);
		});
	});




	// Benefits Slider JS
	$('.benefits-wapper').owlCarousel({
		nav: true,
		loop: true,
		dots: false,
		margin: 10,
		autoplay: true,
		autoplayHoverPause: true,
		navText: [$('.benefits-next'), $('.benefits-prev')],
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 1
			},
			768: {
				items: 1
			},
			992: {
				items: 2
			},
			1200: {
				items: 3
			}
		}
	});

	// Product Slider JS
	$('.product-wapper').owlCarousel({
		nav: true,
		loop: true,
		dots: false,
		margin: 10,
		autoplay: true,
		autoplayHoverPause: true,
		navText: [$('.benefits-next'), $('.benefits-prev')],
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 1
			},
			768: {
				items: 1
			},
			992: {
				items: 2
			},
			1200: {
				items: 3
			}
		}
	});

	// Partner Slider JS
	$(".partner-slider").owlCarousel({
		dots: false,
		loop: true,
		nav: false,
		margin: 25,
		autoplay: true,
		autoplayTimeout: 2000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 2,
			},
			576: {
				items: 3,
			},
			768: {
				items: 3,
			},
			992: {
				items: 4,
			},
			1200: {
				items: 6,
			}
		}
	});

	// Partner Slider Four JS
	$(".partner-slider-four").owlCarousel({
		dots: false,
		loop: true,
		nav: false,
		margin: 25,
		autoplay: true,
		autoplayTimeout: 2000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 2,
			},
			576: {
				items: 3,
			},
			768: {
				items: 3,
			},
			992: {
				items: 4,
			},
			1200: {
				items: 6,
			}
		}
	});

	// Banner Slide Four JS
	$(".banner-slide-four").owlCarousel({
		dots: false,
		loop: true,
		nav: true,
		margin: 0,
		autoplay: false,
		autoplayTimeout: 2000,
		autoplayHoverPause: true,
		items: 1,
		navText: [
			"<i class='ri-arrow-left-line'></i>",
			"<i class='ri-arrow-right-line'></i>",
		],
	});

	// Banner Slider Five JS
	$(".banner-slide-five").owlCarousel({
		dots: false,
		loop: true,
		nav: false,
		margin: 25,
		autoplay: true,
		autoplayTimeout: 2000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1,
			},
			576: {
				items: 2,
			},
			768: {
				items: 2,
			},
			992: {
				items: 3,
				stagePadding: 50,
			},
			1200: {
				items: 3,
				stagePadding: 100,
			}
		}
	});

	// Courses Plan Slider JS
	$(".courses-plan-slide").owlCarousel({
		dots: false,
		loop: true,
		nav: false,
		margin: 25,
		autoplay: true,
		autoplayTimeout: 2000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1,
			},
			576: {
				items: 1,
			},
			768: {
				items: 2,
			},
			992: {
				items: 3,
			},
			1200: {
				items: 4,
			}
		}
	});

	// Gallery Slider JS
	$(".gallery-slide").owlCarousel({
		dots: false,
		loop: true,
		nav: false,
		margin: 25,
		autoplay: true,
		autoplayTimeout: 2000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1,
			},
			576: {
				items: 2,
			},
			768: {
				items: 3,
			},
			992: {
				items: 4,
			},
			1200: {
				items: 5,
			}
		}
	});

	// Testimonial Slide Five
	$('.testimonial-slide-five').owlCarousel({
		loop: true,
		margin: 0,
		nav: true,
		mouseDrag: true,
		thumbs: true,
		thumbsPrerendered: true,
		items: 1,
		dots: false,
		autoHeight: true,
		autoplay: true,
		smartSpeed: 1500,
		autoplayHoverPause: true,
		navText: [
			"<i class='ri-arrow-left-line'></i>",
			"<i class='ri-arrow-right-line'></i>",
		],
	});

	// Mixitup JS
	$('#mix-wrapper').mixItUp({
		selectors: {
			target: '.mix-target'
		}
	});
	try {
		var elements = document.querySelectorAll("[id^='my-element']");
		elements.forEach(function (element) {
			element.addEventListener("click", function () {
				elements.forEach(function (el) {
					el.classList.remove("active");
				});
				element.classList.add("active");
			});
		});
	} catch (err) { }

	// Counter JS
	if ("IntersectionObserver" in window) {
		let counterObserver = new IntersectionObserver(function (entries, observer) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					let counter = entry.target;
					let target = parseInt(counter.innerText);
					let step = target / 200;
					let current = 0;
					let timer = setInterval(function () {
						current += step;
						counter.innerText = Math.floor(current);
						if (parseInt(counter.innerText) >= target) {
							clearInterval(timer);
						}
					}, 10);
					counterObserver.unobserve(counter);
				}
			});
		});
		let counters = document.querySelectorAll(".count");
		counters.forEach(function (counter) {
			counterObserver.observe(counter);
		});
	}

	// Magnific Popup JS
	$('.popup-youtube').magnificPopup({
		disableOn: 320,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});

	// Gallery Popup JS
	$('.gallery-popup').each(function () {
		$(this).magnificPopup({
			delegate: 'a',
			type: 'image',
			gallery: {
				enabled: true
			}
		});
	});

	var selector = '.accordion .accordion-item';
	$(selector).on('click', function () {
		$(selector).removeClass('active');
		$(this).addClass('active');
	});


	$(".switcher input[type='checkbox']").click(function () {
		if ($(this).is(":checked")) {
			$("#equity").addClass("show");
			$("#cash").removeClass("show");
		} else if ($(this).is(":not(:checked)")) {
			$("#cash").addClass("show");
			$("#equity").removeClass("show");
		}
	});

})();



// Offcanvas Responsive Menu
const list = document.querySelectorAll('.responsive-menu-list');
function accordion(e) {
	e.stopPropagation();
	if (this.classList.contains('active')) {
		this.classList.remove('active');
	}
	else if (this.parentElement.parentElement.classList.contains('active')) {
		this.classList.add('active');
	}
	else {
		for (i = 0; i < list.length; i++) {
			list[i].classList.remove('active');
		}
		this.classList.add('active');
	}
}
for (i = 0; i < list.length; i++) {
	list[i].addEventListener('click', accordion);
}


// Input Plus & Minus Number JS
$('.input-counter').each(function () {
	var spinner = jQuery(this),
		input = spinner.find('input[type="text"]'),
		btnUp = spinner.find('.plus-btn'),
		btnDown = spinner.find('.minus-btn'),
		min = input.attr('min'),
		max = input.attr('max');

	btnUp.on('click', function () {
		var oldValue = parseFloat(input.val());
		if (oldValue >= max) {
			var newVal = oldValue;
		} else {
			var newVal = oldValue + 1;
		}
		spinner.find("input").val(newVal);
		spinner.find("input").trigger("change");
	});
	btnDown.on('click', function () {
		var oldValue = parseFloat(input.val());
		if (oldValue <= min) {
			var newVal = oldValue;
		} else {
			var newVal = oldValue - 1;
		}
		spinner.find("input").val(newVal);
		spinner.find("input").trigger("change");
	});
});


/*-----------benefits-section----------*/
var salaryChart;

var data = {
	softwareEngineer: {
		salaries: [20000, 35000, 80000, 55000, 30000],
		companies: [
			'layout/img/all-img/cmp-log-1.png',
			'layout/img/all-img/cmp-log-2.png',
			'layout/img/all-img/cmp-log-3.png',
			'layout/img/all-img/cmp-log-4.png',
			'layout/img/all-img/cmp-log-5.png'
		]
	},
	softwareDeveloper: {
		salaries: [10000, 65000, 20000, 55000, 30000],
		companies: [
			'layout/img/all-img/cmp-log-12.png',
			'layout/img/all-img/cmp-log-9.png',
			'layout/img/all-img/cmp-log-5.png',
			'layout/img/all-img/cmp-log-3.png',
			'layout/img/all-img/cmp-log-8.png'
		]
	},
	projectManager: {
		salaries: [40000, 85000, 40000, 35000, 20000],
		companies: [
			'layout/img/all-img/cmp-log-6.png',
			'layout/img/all-img/cmp-log-7.png',
			'layout/img/all-img/cmp-log-8.png',
			'layout/img/all-img/cmp-log-9.png',
			'layout/img/all-img/cmp-log-10.png'
		]
	},
	dataScientist: {
		salaries: [90000, 35000, 50000, 95000, 40000],
		companies: [
			'layout/img/all-img/cmp-log-11.png',
			'layout/img/all-img/cmp-log-12.png',
			'layout/img/all-img/cmp-log-1.png',
			'layout/img/all-img/cmp-log-2.png',
			'layout/img/all-img/cmp-log-3.png'
		]
	}
};


// function updateData(role) {
// 	updateChart(data[role].salaries);
// 	updateCompanies(data[role].companies);
// }

// function updateChart(salaries) {
// 	if (salaryChart) {
// 		salaryChart.destroy();
// 	}
// 	var ctx = document.getElementById('salaryChart').getContext('2d');
// 	salaryChart = new Chart(ctx, {
// 		type: 'bar',
// 		data: {
// 			labels: ['2019', '2020', '2021', '2022', '2023'],
// 			datasets: [{
// 				label: 'Annual Salary',
// 				data: salaries,
// 				backgroundColor: 'rgba(54, 162, 235, 0.6)',
// 				borderColor: 'rgba(54, 162, 235, 1)',
// 				borderWidth: 1
// 			}]
// 		},
// 		options: {
// 			scales: {
// 				y: {
// 					beginAtZero: true
// 				}
// 			}
// 		}
// 	});
// }

function updateCompanies(companies) {
	var companyLogosDiv = document.getElementById('companyLogos');
	companyLogosDiv.innerHTML = '';
	companies.forEach(function (company) {
		var img = document.createElement('img');
		img.src = company;
		img.alt = 'Company Logo';
		companyLogosDiv.appendChild(img);
	});
}

document.querySelectorAll('.designation-list li').forEach(function (item) {
	item.addEventListener('click', function () {
		var role = this.getAttribute('data-role');
		updateData(role);
	});
});

// Initialize with the first designation
// updateData('softwareEngineer');
// document.addEventListener('DOMContentLoaded', function() {
//     updateData('softwareEngineer'); // Initialize with the firstdesignation
// });

/*---------------------footer-bar------------------


// JavaScript to handle showing/hiding the sticky footer based on scroll position
// script.js
document.addEventListener('scroll', function () {
	const homeSection = document.getElementById('course-section-start');
	const stickyFooter = document.getElementById('sticky-footer');
	const footerSection = document.getElementById('footer-area');

	const homeRect = homeSection.getBoundingClientRect();
	const stickyFooterRect = stickyFooter.getBoundingClientRect();
	const footerSectionRect = footerSection.getBoundingClientRect();

	// Hide sticky footer when home section is in view or footer section is in view
	if (homeRect.bottom <= stickyFooterRect.height || footerSectionRect.top <= window.innerHeight) {
		stickyFooter.style.display = 'block';
	} else {
		stickyFooter.style.display = 'none';
	}
});---*/


/*-------------------dropdown-functionality-------------------------*/

document.querySelectorAll('.dropdown-item .dropdown-link').forEach(item => {
	item.addEventListener('click', event => {
		if (window.innerWidth <= 768) {
			event.preventDefault();
			const parentItem = item.parentElement;

			// Toggle active class for the clicked item
			parentItem.classList.toggle('active');

			// Close other open submenus
			document.querySelectorAll('.dropdown-item').forEach(dropdownItem => {
				if (dropdownItem !== parentItem && dropdownItem.classList.contains('active')) {
					dropdownItem.classList.remove('active');
				}
			});
		}
	});
});



/*---------------------accordion-functionality--------------------------*/


// JavaScript to handle the accordion functionality
const accordionButtons = document.querySelectorAll('.accordion-button');

accordionButtons.forEach(button => {
	button.addEventListener('click', () => {
		const content = button.nextElementSibling;
		button.classList.toggle('active');
		content.style.display = content.style.display === 'block' ? 'none' : 'block';
	});
});



/*--------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
	const tabs = document.querySelectorAll('.custom-nav-link');
	const contents = document.querySelectorAll('.tab-content > div');

	tabs.forEach(tab => {
		tab.addEventListener('click', function (event) {
			event.preventDefault();

			tabs.forEach(t => t.classList.remove('active'));
			tab.classList.add('active');

			contents.forEach(content => {
				if (content.id === tab.getAttribute('href').substring(1)) {
					content.style.display = 'block';
				} else {
					content.style.display = 'none';
				}
			});
		});
	});
});



/*------------------schedule-btn-click-----------------*/

var button = document.getElementById('viewSchedulesBtn');

// Add an event listener for the click event
// button.addEventListener('click', function () {
// 	// Redirect to schedule.html
// 	window.location.href = 'schedule';
// });



/*-----------------for modal enqiry-----------*/

document.addEventListener('DOMContentLoaded', (event) => {
	const enquiryForRadios = document.querySelectorAll('input[name="enquiryFor"]');
	const companyMembersField = document.getElementById('companyMembers');

	enquiryForRadios.forEach(radio => {
		radio.addEventListener('change', function () {
			if (this.value === 'company') {
				companyMembersField.style.display = 'block';
			} else {
				companyMembersField.style.display = 'none';
			}
		});
	});
});

