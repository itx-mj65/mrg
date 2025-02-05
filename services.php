<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>القائم ازدواج سروس &#10084;</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Link to Font Awesome for icons -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />
	<link rel="icon" href="images/logo.png" type="image/x-icon">



	<!-- AOS Animation -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<!-- <link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css"> -->

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>


</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">

		<nav class="fh5co-nav" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="./index.html"> القائم ازدواج سروس<strong></strong></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="./index.html">Home</a></li>
							<li><a href="./login/login.html">Login</a></li>
							<li class="has-dropdown">
								<a href="./register/register.html">Registeration</a>

							</li>
							<!-- <li class="has-dropdown">
							<a href="#fh5co-services">Login</a>
							
						</li> -->
							<li class="has-dropdown">
								<a href="./services.html">Services</a>

							</li>
							<li><a href="./contact.html">Contact</a></li>
						</ul>
					</div>
				</div>

			</div>
		</nav>

		<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/imagee.PNG);" data-stellar-background-ratio="0.5">

			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeIn">
								<!-- <h1>Farah &amp; Farhan</h1> -->
								<h1>Services</h1>
								<h2>We Are Getting Married</h2>
								<!-- <div class="simply-countdown simply-countdown-one"></div> -->
								<p><a href="#cards-container" class="btn btn-default btn-sm">Save the date</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>
	<style>
		.cards-container {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			padding: 50px 10px;
			margin-top: 50px;
			width: 100%;
		}

		.cards-main {
			width: 300px;
			margin: 10px;
			display: flex;
			background: linear-gradient(#f27fb1, #ee3d89);
			justify-content: center;
			align-items: center;
			flex-direction: column;
			padding: 20px;
			text-align: center;
		
			height: 380px;
			border-radius: 5px;
		}

		.card-image {
			width: 150px;
			height: 150px;
			border-radius: 50%;
			border: 3px solid white;
			padding: px;
			overflow: hidden;

		}

		.card-image img {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}

		.card-name {
			font-size: 20px;
			margin-top: 10px;
			color: white;
			margin-bottom: 10px;
			font-weight: bold;
		}

		.card-para {
			font-size: 16px;
			color: white;
		}

		.cards-main .btns button {
			display: flex;
			justify-content: space-around;
			align-items: center;
			padding: 8px 18px;
			font-size: 16px;
			background-color: #fff;
			border: none;
			border-radius: 5px;
		}

		@media print {

			html,
			body {
				display: none;
				/* hide whole page */
			}
		}

		.profile-heading {
			font-size: clamp(20px, 40px, 45px);
			margin-top: 30px;
			text-align: center;
		}
	</style>


	<!-- thses are cards  -->
	<h1 class="profile-heading">All Avaible Profiles</h1>
	<div class="cards-container" id="cards-container">
		<?php
		include "./admin/config.php";

		// Fetch active and warning status records
		$fetch = $conn->query("SELECT * FROM `registrations` WHERE `status` = 'open' OR `status` = 'warning'");

		while ($row = $fetch->fetch_assoc()):
		?>
			<div class="cards-main">
				<div class="card-image">
					<img src="<?= !empty($row['image']) ? './register/' . $row['image'] : './register/default.jpeg'; ?>"
						alt="<?= htmlspecialchars($row['name']) ?>">
				</div>
				<div class="card-name"><?= htmlspecialchars($row['name']) ?></div>
				<p class="card-para"><?= htmlspecialchars($row['description']) ?></p>
				<div class="btns">
					<button><a href="./view.php?id=<?php echo $row['id'] ?>">Read More</a></button>
				</div>
			</div>
		<?php endwhile; ?>


	

	</div>
	</div>


	<!-- <div id="fh5co-event" class="fh5co-bg" style="background-image:url(images/venue.PNG);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>Our Special Events</span>
					<h2>Wedding Events</h2>
				</div>
			</div> -->
	<!-- <div class="row">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-10 col-md-offset-1">
							<div class="col-md-6 col-sm-6 text-center">
								<div class="event-wrap animate-box">
									<h3>Main Ceremony</h3>
									<div class="event-col">
										<i class="icon-clock"></i>
										<span>4:00 PM</span>
										<span>6:00 PM</span>
									</div> -->
	<!-- <div class="event-col">
										<i class="icon-calendar"></i>
										<span>Monday 28</span>
										<span>November, 2024</span>
									</div> -->
	<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p> -->
	<!-- </div>
							</div>
							<div class="col-md-6 col-sm-6 text-center">
								<div class="event-wrap animate-box">
									<h3>Wedding Party</h3>
									<div class="event-col">
										<i class="icon-clock"></i>
										<span>7:00 PM</span>
										<span>12:00 AM</span>
									</div> -->
	<!-- <div class="event-col">
										<i class="icon-calendar"></i>
										<span>Monday 28</span>
										<span>November, 2024</span>
									</div> -->
	<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p> -->
	<!-- </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- 
	<div id="fh5co-couple-story">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>We Love Each Other</span>
					<h2>Our Story</h2>
					<p>"From our first glance to our shared laughter, our story unfolded with each moment. Through dates and dreams, our love grew, leading us to this joyous day where we say 'I do,' sealing our journey in love's embrace.".</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-md-offset-0">
					<ul class="timeline animate-box">
						<li class="animate-box">
							<div class="timeline-badge" style="background-image:url(images/image7.PNG);"></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">First We Meet</h3>
									<span class="date">December 25, 2020</span>
								</div>
								<div class="timeline-body">
									<p>In a crowded room, our eyes met, sparking a connection beyond words.
										A serendipitous encounter, a fleeting moment that changed our lives forever.
										From that first hello, a sense of familiarity, as if we had known each other for eternity.
										The beginning of a beautiful journey, guided by destiny's gentle hand.</p>
								</div>
							</div>
						</li>
						<li class="timeline-inverted animate-box">
							<div class="timeline-badge" style="background-image:url(images/image8.PNG);"></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">First Date</h3>
									<span class="date">December 28, 2020</span>
								</div>
								<div class="timeline-body">
									<p>With each shared laugh and stolen glance, our bond deepened.
										Romantic walks hand in hand, under the starlit sky, our hearts intertwined.
										From shy smiles to whispered confessions, our love blossomed with each passing day.</p>
								</div>
							</div>
						</li>
						<li class="animate-box">
							<div class="timeline-badge" style="background-image:url(images/image9.PNG);"></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">In A Relationship</h3>
									<span class="date">January 1, 2021</span>
								</div>
								<div class="timeline-body">
									<p>"As we navigated life's challenges together, our love only grew stronger, rooted in trust and mutual respect.
										With unwavering support and endless laughter, we built a foundation of love that stood the test of time."</p>
								</div>
							</div>
						</li>
			    	</ul>
				</div>
			</div>
		</div>
	</div> -->

	<!-- ////////////////////// hidayat ///////////  -->

	<!-- Main div containing the title and child divs -->
	<div class="main-div">

		<!-- Title of the main div in Urdu -->
		<h1>ہدایت</h1> <!-- "Hidayat" in Urdu -->

		<!-- Container for child divs (using grid layout) -->
		<div class="child-container">

			<!-- First instruction div -->
			<div data-aos="fade-down-right" class="child-div">
				<h2>ارکان </h2>
				<p>
					القائم ازدواج سروس شادی کے خواہشمند افراد کو بہترین اور موزوں رشتے تلاش کرنے میں مدد فراہم کرتی ہے۔ ہمارا مقصد یہ ہے کہ ہم اپنے صارفین کو ایک آسان، محفوظ، اور قابل اعتماد پلیٹ فارم مہیا کریں جہاں وہ اپنی ضروریات کے مطابق مناسب زندگی ساتھی تلاش کر سکیں۔ ہم مکمل رازداری، دیانت داری اور اعتماد کے ساتھ اپنی خدمات پیش کرتے ہیں تاکہ آپ کو ایک بہترین تجربہ فراہم کیا جا سکے۔<۔< /p>
			</div>

			<!-- Second instruction div -->
			<div class="child-div">
				<h2>اخلاقی ذمہ داری</h2>
				<p>
					القائم ازدواج سروس شادی کے خواہشمند افراد کو بہترین اور موزوں رشتے تلاش کرنے میں مدد فراہم کرتی ہے۔ ہمارا مقصد یہ ہے کہ ہم اپنے صارفین کو ایک آسان، محفوظ، اور قابل اعتماد پلیٹ فارم مہیا کریں جہاں وہ اپنی ضروریات کے مطابق مناسب زندگی ساتھی تلاش کر سکیں۔ ہم مکمل رازداری، دیانت داری اور اعتماد کے ساتھ اپنی خدمات پیش کرتے ہیں تاکہ آپ کو ایک بہترین تجربہ فراہم کیا جا سکے۔<۔< /p>
			</div>

			<!-- Third instruction div -->
			<div class="child-div">
				<h2>پوسٹ لگانا</h2>
				<p>
					القائم ازدواج سروس شادی کے خواہشمند افراد کو بہترین اور موزوں رشتے تلاش کرنے میں مدد فراہم کرتی ہے۔ ہمارا مقصد یہ ہے کہ ہم اپنے صارفین کو ایک آسان، محفوظ، اور قابل اعتماد پلیٹ فارم مہیا کریں جہاں وہ اپنی ضروریات کے مطابق مناسب زندگی ساتھی تلاش کر سکیں۔ ہم مکمل رازداری، دیانت داری اور اعتماد کے ساتھ اپنی خدمات پیش کرتے ہیں تاکہ آپ کو ایک بہترین تجربہ فراہم کیا جا سکے۔<۔< /p>
			</div>

			<!-- Fourth instruction div -->
			<div class="child-div">
				<h2>شکایت پر عمل درآمد</h2>
				<p>
					القائم ازدواج سروس شادی کے خواہشمند افراد کو بہترین اور موزوں رشتے تلاش کرنے میں مدد فراہم کرتی ہے۔ ہمارا مقصد یہ ہے کہ ہم اپنے صارفین کو ایک آسان، محفوظ، اور قابل اعتماد پلیٹ فارم مہیا کریں جہاں وہ اپنی ضروریات کے مطابق مناسب زندگی ساتھی تلاش کر سکیں۔ ہم مکمل رازداری، دیانت داری اور اعتماد کے ساتھ اپنی خدمات پیش کرتے ہیں تاکہ آپ کو ایک بہترین تجربہ فراہم کیا جا سکے۔<۔< /p>
			</div>

		</div> <!-- End of child-container -->

	</div> <!-- End of main-div -->







	<div id="fh5co-started" class="fh5co-bg" style="background-image:url(images/venue.PNG);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Are You Attending?</h2>
					<p>Please Fill-up the form to notify you that you're attending. Thanks.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-10 col-md-offset-1">
					<form class="form-inline">
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="name" class="sr-only">Name</label>
								<input type="name" class="form-control" id="name" placeholder="Name">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<button type="submit" class="btn btn-default btn-block">I am Attending</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>




	<!-- ////////////////////  -->

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row copyright">
				<div class="col-md-12 text-center">
					<h2 class="site-text">Al-Qaim Azdwaj Service</h2> <!-- Site Name -->
					<p>
						<small class="block">&copy; All Rights Reserved.</small>
						<small class="block">Designed by <a href="#" target="_blank">kaneez zainab</a></small>
					</p>
					<p class="footer-info">
						<small>Contact: <a href="mailto:example@example.com"><i class="fas fa-envelope"></i> example@example.com</a> | Phone: <i class="fas fa-phone"></i> +123 456 7890</small>
					</p>
					<ul class="fh5co-social-icons">
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li><a href="#"><i class="fab fa-dribbble"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	</div>



	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
	<script src="js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	<script>
		var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

		// default example
		simplyCountdown('.simply-countdown-one', {
			year: d.getFullYear(),
			month: d.getMonth() + 1,
			day: d.getDate()
		});

		//jQuery example
		$('#simply-countdown-losange').simplyCountdown({
			year: d.getFullYear(),
			month: d.getMonth() + 1,
			day: d.getDate(),
			enableUtc: false
		});
	</script>
	<!-- AOS Animation JS -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>


</body>

</html>