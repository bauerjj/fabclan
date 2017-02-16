<?php
$host = 'localhost'; //production

include_once('config.inc.php'); // for db login credentials

if($host == 'localhost'){
	$servername = $config['local']['servername'];
	$username = $config['local']['username'];
	$password = $config['local']['password'];
	$db = $config['local']['db'];
}
else {
	$servername = $config['pro']['servername'];
	$username = $config['pro']['username'];
	$password = $config['pro']['password'];
	$db = $config['pro']['db'];	
}
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$query = "SELECT * FROM stats";

$result = mysqli_query($conn, $query);
if(!$result){
	printf("Errormessage: %s\n", mysqli_error($conn));
}

$totalWins = $totalKills = $totalLosses = $totalRevives = $totalHeals
= $totalTime = $totalHeadshots = $totalSquadScore = $totalLosses = $totalDeaths
= $totalRounds = 0;

// Iterate over the result set
while($row = mysqli_fetch_object($result)){
	//print_r($row);
	if($row->id == 0)
		$justin = $row;
	else if($row->id == 1)
		$rob = $row;
	else if($row->id == 2)
		$anthony = $row;
	else
		$kyle = $row;
	
	if($row->id == 2)
		break; // ignore kyle for now
	
	$totalWins += $row->wins;
	$totalKills += $row->kills;
	$totalRevives += $row->revives;
	$totalHeals += $row->heals;
	$totalTime += ($row->timePlayed/60)/60; //recorded in seconds
	$totalHeadshots += $row->headshots;
	$totalSquadScore += $row->squadScore;
	$totalLosses += $row->losses;
	$totalDeaths += $row->deaths;
	$totalRounds += $row->roundsPlayed;
	
	
}
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>FAB Clan</title>

	<!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,800&amp;subset=cyrillic,latin">

	<!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/app.css">
  <link rel="stylesheet" href="../assets/css/blocks.css">
  <link rel="stylesheet" href="../assets/css/one.style.css">


	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="../assets/plugins/animate.css">
	<link rel="stylesheet" href="../assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	
	<!-- <link rel="stylesheet" href="../assets/plugins/owl-carousel2/assets/owl.carousel.css"> -->
		<link rel="stylesheet" href="../assets/plugins/owl-carousel/owl-carousel/owl.carousel.css"> -->

	
	<link rel="stylesheet" href="../assets/plugins/master-slider/masterslider/style/masterslider.css">
	<link rel="stylesheet" href="../assets/plugins/master-slider/u-styles/testimonials-1.css">

	<!-- REVOLUTION STYLE SHEETS -->
	<link rel="stylesheet" href="../assets/plugins/revolution-slider/revolution/css/settings.css">
	<!-- REVOLUTION LAYERS STYLES -->
	<link rel="stylesheet" href="../assets/plugins/revolution-slider/revolution/css/layers.css">
	<!-- REVOLUTION NAVIGATION STYLES -->
	<link rel="stylesheet" href="../assets/plugins/revolution-slider/revolution/css/navigation.css">

  <!-- CSS Theme -->
  <link rel="stylesheet" href="assets/css/lawyer.style.css">

  <!-- CSS Customization -->
  <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body id="body" data-spy="scroll" data-target=".one-page-header" class="demo-lightbox-gallery lawyer-style">
	<main class="wrapper">
		<!-- Header -->
		<nav class="one-page-header navbar navbar-default navbar-fixed-top one-page-nav-scrolling one-page-nav__fixed" data-role="navigation">
			<div class="container">
				<div class="menu-container page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="#body">
						<img src="assets/img-temp/promo/logo.png" alt="Logo">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<div class="menu-container">
						<ul class="nav navbar-nav">
							<li class="page-scroll">
								<a href="#why-we"><span data-hover="Who Are We">Who Are We</span></a>
							</li>
							<li class="page-scroll">
								<a href="#stats"><span data-hover="Stats">Stats</span></a>
							</li>
							<li class="page-scroll">
								<a href="#team"><span data-hover="Team">Meet The Team</span></a>
							</li>
							<li class="page-scroll">
								<a href="#bf1"><span data-hover="BF1">Battlefield 1</span></a>
							</li>
							<li class="page-scroll">
								<a href="#bf4"><span data-hover="BF4">Battlefield 4</span></a>
							</li>
							<li class="page-scroll">
								<a href="#sponsors"><span data-hover="Sponsors">Sponsors</span></a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>
		<!-- End Header -->

		<!-- Promo Block -->
		<div class="promo g-theme-bg-color-1">
			<div class="rev_slider_wrapper fullwidthbanner-container" data-alias="image-hero20">
				<!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
				<div id="rev_slider_20_1" class="rev_slider fullwidthabanner" style="display: none;" data-version="5.0.7">
					<ul>
						<!-- SLIDE  -->
						<li data-index="rs-68" data-transition="zoomout" data-slotamount="default" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="assets/img-temp/promo/main.jpg" data-rotate="0" data-saveperformance="off" data-title="Intro" data-description="">

							<!-- MAIN IMAGE -->
							<img src="assets/img-temp/promo/main.jpg" alt="" data-bgposition="50% 10%" data-bgfit="cover" data-bgrepeat="no-repeat" class="test-me" data-bgparallax="10" class="rev-slidebg" data-no-retina>

							<!-- LAYERS -->

							<!-- LAYER NR. 1 -->
							<div class="tp-caption tp-shape tp-shapewrapper rs-parallaxlevel-0"
								id="slide-68-layer-10"
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
								data-width="full"
								data-height="full"
								data-whitespace="nowrap"
								data-transform_idle="o:1;"

								data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;"
								data-transform_out="s:300;s:300;"
								data-start="750"
								data-basealign="slide"
								data-responsive_offset="on"
								data-responsive="off"

								style="z-index: 5; background-color: rgba(78,67,83,.4); border-color: rgba(78,67,83,.5);">
							</div>

							<!-- LAYER NR. 3 -->
							<div class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0"
								id="slide-68-layer-1"
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								data-y="['middle','middle','middle','middle']" data-voffset="['-60','-60','-22','-29']"
								data-fontsize="['60','60','60','40']"
								data-lineheight="['64','64','64','44']"
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-transform_idle="o:1;"

								data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
								data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
								data-mask_in="x:0px;y:0px;"
								data-mask_out="x:inherit;y:inherit;"
								data-start="1000"
								data-splitin="none"
								data-splitout="none"
								data-responsive_offset="on"

								style="z-index: 7; white-space: nowrap; text-align: center; text-transform: uppercase;">FAB CLAN<br> (F)RAG (A)ND (B)AG
							</div>

							<!-- LAYER NR. 4 -->
							<div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-0"
								id="slide-68-layer-4"
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								data-y="['middle','middle','middle','middle']" data-voffset="['52','52','28','13']"
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-transform_idle="o:1;"

								data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;"
								data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
								data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
								data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
								data-start="1000"
								data-splitin="none"
								data-splitout="none"
								data-responsive_offset="on"

								style="z-index: 8; white-space: nowrap; text-align: center; text-transform: uppercase;">People don't think it be like it is, but it do<br> 
							</div>

							<!-- LAYER NR. 5 -->
							<div class="tp-caption NotGeneric-CallToAction rev-btn rs-parallaxlevel-0"
								id="slide-68-layer-7"
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								data-y="['middle','middle','middle','middle']" data-voffset="['134','134','80','65']"
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-transform_idle="o:1;"
								data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
								data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);cursor:pointer;"

								data-transform_in="y:50px;opacity:0;s:1500;e:Power4.easeInOut;"
								data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
								data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
								data-start="1250"
								data-splitin="none"
								data-splitout="none"
								data-actions='[{"event":"click","action":"scrollbelow","offset":"0px"}]'
								data-responsive_offset="on"
								data-responsive="off"

								style="z-index: 9; font-weight: bold; white-space: nowrap; outline: none; box-shadow: none; box-sizing: border-box; text-transform: uppercase; border-width: 2px;">Learn More
							</div>
						</li>
					</ul>
					<div class="tp-static-layers"></div>
					<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
				</div>
			</div><!-- END REVOLUTION SLIDER -->
		</div>
		<!-- End Promo Block -->



		<!-- Why we section -->
	<div class="container g-pt-10 g-pb-10">
		<section id="why-we" class=" no-column-space">
			<div class="container-fluid">
				<div class="row equal-height-columns">
					<div class="g-theme-bg-color-1 g-text-color-2 col-sm-6 equal-height-column g-dp-table g-va-middle">
						<div class="g-pl-20 g-pr-20 g-pl-15--xs g-pr-15--xs g-dp-table-cell g-va-middle">
							<div class="g-pt-20 g-pb-20">
								<div class="g-heading-v9 g-mb-10">
									<h2><strong>Why Join Us</strong></h2>
								</div>
								<p class="g-fs-16 g-mb-10">Here at the FAB clan we strive to win. We will do whatever it takes. We will also do whatever it takes to give money to charity. More money than most people. </p>
								<ul class="list-unstyled marked-list-v1">
									<li data-mark="+">
										<h5 class="text-uppercase"><strong>Professional Staff</strong></h5>
										<p>We treat (most) people with respect and love.</p>
									</li>
									<li data-mark="+">
										<h5 class="text-uppercase"><strong>Great Experience</strong></h5>
										<p>We  will go above and beyond to help you understand why your stats just plain suck. We can help you out and improve your game! Our professional staff have gone through it all while increasing the K/D. Pneumonia, degenerate cartilage, and dental issues are only a few examples of what haven't stopped us.</p>
									</li>
									<li data-mark="+">
										<h5 class="text-uppercase"><strong>Charity Events</strong></h5>
										<p>We provide a broad spectrum of monies and goods to charities while also having a blast!</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
					<div class="g-pl-10 g-pr-10 ">
							<div class="g-pt-20 g-pb-20">
								<div class="g-heading-v9 g-mb-10">
									<h2><strong>Apply Today</strong></h2>
								</div>
								<p class="g-fs-16 g-mb-10">Let us know if you have what it takes below:</p>
								
								
								</div>
								
								
						<!-- Start HTML Code --><iframe WIDTH="400" HEIGHT="500" title="Shoutbox" src="https://shoutbox.widget.me/start.html?uid=lmuns1ak" frameborder="0" scrolling="auto"></iframe><script src="https://shoutbox.widget.me/v1.js" type="text/javascript"></script><br><a href="http://shoutbox.widget.me" title="Shoutbox Widget">Shout</a><a href="http://shoutbox-tutorials.blogspot.com" title="Shoutbox Tutorials">bo</a><a href="http://www.youtube.com/watch?v=4IBqLxtAbs0" title="Shoutbox Video">x</a><br><!-- End HTML Code -->
					</div>
					</div>
				</div>
			</div>
		</section>
		</div>
		
		<!-- Team section -->
		<section id="stats">
			<div class="container g-pt-30 g-pb-10">
			<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<div class="g-heading-v9 text-center g-mb-30">
							<h2><strong>Combined Stats</strong></h2>
						</div>
						
						
						<div class="row margin-bottom-10">
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counter"><?php echo number_format($totalKills/$totalDeaths,4) ?></span>
							<h4>K/D</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counter"><?php echo number_format($totalSquadScore/1000,0) ?></span> <span class="big-text">K</span>
							<h4>Squad Score</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counter"><?php echo number_format(($totalWins/($totalRounds)) * 100,0) ?></span> <span class="big-text">%</span>
							<h4>Win Percentage</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counter"><?php echo number_format($totalKills,0) ?></span>
							<h4>Kills</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counter"><?php echo number_format($totalTime,0) ?></span> <span class="big-text">hrs</span>
							<h4>Playing Time</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counter"><?php echo number_format($totalRevives,0) ?></span>
							<h4>Revives</h4>
						</div>
					</div>
				</div>
						
						
					</div>
					
			</div>
			</div>
		</section>

		
		

		<!-- Team section -->
		<section id="team">
			<div class="container g-pt-10 g-pb-40">
			<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<div class="g-heading-v9 text-center g-mb-30">
							<h2><strong>Our Team</strong></h2>
						</div>
						<p class="g-fs-16 g-mb-20">Our team is built upon a strong unity of individuality and team collaboration. No one man can do it alone. </p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-6 col-3xs-12">
						<div class="team-v-8">
							<a href="https://battlefieldtracker.com/bf1/profile/xbl/gnarama">
							<img class="img-responsive" src="assets/img-temp/promo/kyle.png" alt="">
							</a>
							<p class="post text-uppercase g-theme-text-color-1 g-mb-10"><strong>Medic</strong></p>
							<h4 class="text-uppercase"><strong>Gnarama</strong></h4>
							<p> "Battlefield ruined my marriage, but my k/d has reached new heights. It's a trade off I not only accepted, but invited"</p>
							<p class="g-mb-5"><strong>Interests:</strong> Volleyball, Chopping Wood, arts and crafts, liquor</p>
							<p class="g-mb-5"><strong>Once Cool Fact:</strong> Ate a man</p>

							<hr>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-3xs-12">
						<div class="team-v-8">
							<a href="https://battlefieldtracker.com/bf1/profile/xbl/JBmtk">
							<img class="img-responsive" src="assets/img-temp/promo/justin.png" alt="">
							</a>
							<p class="post text-uppercase g-theme-text-color-1 g-mb-10"><strong>Medic</strong></p>
							<h4 class="text-uppercase"><strong>JBmtk</strong></h4>
							<p> "Battlefield ruined my marriage, but my k/d has reached new heights. It's a trade off I not only accepted, but invited"</p>
							<p class="g-mb-5"><strong>Interests:</strong> Volleyball, Chopping Wood, arts and crafts, liquor</p>
							<p class="g-mb-5"><strong>Once Cool Fact:</strong> Ate a man</p>

							
							<hr>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-3xs-12">
						<div class="team-v-8">
							<a href="https://battlefieldtracker.com/bf1/profile/xbl/tulsarob">
							<img class="img-responsive" src="assets/img-temp/promo/rob.png" alt="">
							</a>
							<p class="post text-uppercase g-theme-text-color-1 g-mb-10"><strong>Medic</strong></p>
							<h4 class="text-uppercase"><strong>tulsrob</strong></h4>
							<p> "Battlefield ruined my marriage, but my k/d has reached new heights. It's a trade off I not only accepted, but invited"</p>
							<p class="g-mb-5"><strong>Interests:</strong> Volleyball, Chopping Wood, arts and crafts, liquor</p>
							<p class="g-mb-5"><strong>Once Cool Fact:</strong> Ate a man</p>

							<hr>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-3xs-12">
						<div class="team-v-8">
							<a href="https://battlefieldtracker.com/bf1/profile/xbl/i+have+two+ears">
							<img class="img-responsive" src="assets/img-temp/promo/anthony.png" alt="">
							</a>
							<p class="post text-uppercase g-theme-text-color-1 g-mb-10"><strong>Support</strong></p>
							<h4 class="text-uppercase"><strong>I have 2 ears</strong></h4>
							<p> "Battlefield ruined my marriage, but my k/d has reached new heights. It's a trade off I not only accepted, but invited"</p>
							<p class="g-mb-5"><strong>Interests:</strong> Volleyball, Chopping Wood, arts and crafts, liquor</p>
							<p class="g-mb-5"><strong>Once Cool Fact:</strong> Ate a man</p>

							<hr>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Team section -->
		
		
		<!-- Team section -->
		<section class="bf1-stats" id="bf1">
			<div class="container g-pt-10 g-pb-40">
			<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<div class="g-heading-v9 text-center g-mb-30">
							<h2><strong>Battlefield 1</strong></h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 col-3xs-12">
						<h4 class="text-uppercase g-theme-text-color-1"><strong>tulsarob</strong></h4>
							
							<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($rob->kills/$rob->deaths,4) ?></span>
							<h4>K/D</h4>
						</div>
					</div>
							<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($rob->squadScore,0) ?></span>
							<h4>Squad Points</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format(($rob->wins / $rob->roundsPlayed) * 100,0) ?></span><span class="big-text"> %</span>
							<h4>Win Percentage</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($rob->kills,0) ?></span>
							<h4>Kills</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($rob->timePlayed/60/60,0) ?></span><span class="big-text"> hrs</span>
							<h4>Playing Time</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($rob->revives,0) ?></span>
							<h4>Revives</h4>
						</div>
					</div>

						<hr>
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12 col-3xs-12 stats-bg">
						<h4 class="text-uppercase g-theme-text-color-1"><strong>I Have 2 Ears</strong></h4>
							
							<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($anthony->kills/$anthony->deaths,4) ?></span>
							<h4>K/D</h4>
						</div>
					</div>
							<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($anthony->squadScore,0) ?></span>
							<h4>Squad Points</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format(($anthony->wins / $anthony->roundsPlayed) * 100,0) ?></span><span class="big-text"> %</span>
							<h4>Win Percentage</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($anthony->kills,0) ?></span>
							<h4>Kills</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($anthony->timePlayed/60/60,0) ?></span><span class="big-text"> hrs</span>
							<h4>Playing Time</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($anthony->revives,0) ?></span>
							<h4>Revives</h4>
						</div>
					</div>

						<hr>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 col-3xs-12">
						<h4 class="text-uppercase g-theme-text-color-1"><strong>JBmtk</strong></h4>
							
							<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($justin->kills/$justin->deaths,4) ?></span>
							<h4>K/D</h4>
						</div>
					</div>
							<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($justin->squadScore,0) ?></span>
							<h4>Squad Points</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format(($justin->wins / $justin->roundsPlayed) * 100,0) ?></span><span class="big-text"> %</span>
							<h4>Win Percentage</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($justin->kills,0) ?></span>
							<h4>Kills</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($justin->timePlayed/60/60,0) ?></span><span class="big-text"> hrs</span>
							<h4>Playing Time</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo number_format($justin->revives,0) ?></span>
							<h4>Revives</h4>
						</div>
					</div>

						<hr>
					</div>
					
					
					<div class="col-md-12 col-sm-12 col-xs-12 col-3xs-12 stats-bg">
						<h4 class="text-uppercase g-theme-text-color-1"><strong>Gnarama</strong></h4>
							
							<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo 'NA'//number_format($justin->kills/$justin->deaths,4) ?></span>
							<h4>K/D</h4>
						</div>
					</div>
							<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo 'NA'//number_format($justin->squadScore,0) ?></span>
							<h4>Squad Points</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo 'NA'//number_format(($justin->wins / $justin->roundsPlayed) * 100,0) ?></span><span class="big-text"> %</span>
							<h4>Win Percentage</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo 'NA'//number_format($justin->kills,0) ?></span>
							<h4>Kills</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo 'NA'//number_format($justin->timePlayed/60/60,0) ?></span><span class="big-text"> hrs</span>
							<h4>Playing Time</h4>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<div class="counters">
							<span class="counterr"><?php echo 'NA'//number_format($justin->revives,0) ?></span>
							<h4>Revives</h4>
						</div>
					</div>

						<hr>
					</div>

				</div>
			</div>
		</section>
		<!-- End Team section -->

		
		<!-- Team section -->
		<section id="bf4">
			<div class="container g-pt-10 g-pb-40">
			<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<div class="g-heading-v9 text-center g-mb-30">
							<h2><strong>Battlefield 4</strong></h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 col-3xs-12">
						<div class="team-v-8">
							<img class="img-responsive center-block" src="assets/img-temp/promo/tulsarob.png" alt="">

							
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 col-3xs-12">
						<div class="team-v-8">
							<!-- <a href="https://battlefieldtracker.com/bf1/profile/xbl/JBmtk"> -->
							<img class="img-responsive center-block" src="assets/img-temp/promo/Ihave2ears.png" alt="">
							<!-- </a> -->
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 col-3xs-12">
						<div class="team-v-8">
							<img class="img-responsive center-block" src="assets/img-temp/promo/jbmtk.png" alt="">

							
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- End Team section -->
		
		<section id="sponsors">
			<div class="container g-pt-10 g-pb-40">
			<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<div class="g-heading-v9 text-center g-mb-30">
							<h2><strong>Sponsors</strong></h2>
						</div>
					</div>
				</div>
			<div class="row">
		

		<div class="owl-carousel-v2 margin-bottom-50">
						<br>

						<div class="owl-slider-v3">
							<div class="item">
								<img class="img-responsive" src="assets\img-temp\promo\sponsors\ea-canada.png" alt="">
							</div>
							<div class="item">
								<img class="img-responsive" src="assets\img-temp\promo\sponsors\emirates.png" alt="">
							</div>
							<div class="item">
								<img class="img-responsive" src="assets\img-temp\promo\sponsors\baderbrau.png" alt="">
							</div>
							
							<div class="item">
								<img class="img-responsive" src="assets\img-temp\promo\sponsors\inspiring.png" alt="">
							</div>
							<div class="item">
								<img class="img-responsive" src="assets\img-temp\promo\sponsors\marianos.png" alt="">
							</div>
							<div class="item">
								<img class="img-responsive" src="assets\img-temp\promo\sponsors\bellfield.png" alt="">
							</div>
							<div class="item">
								<img class="img-responsive" src="assets\img-temp\promo\sponsors\national-geographic.png" alt="">
							</div>
						</div>

					</div>  
		
			</div>
			</div>
		</section>

		<!-- Footer -->
		<footer>
			<!-- Contact section -->
						<div class="container g-pt-10 g-pb-10">

			<section id="contact" class="g-theme-bg-color-1 g-text-color-2">
				<div class="container-fluid">
					<div class="footer-me row no-column-space equal-height-columns">
						<div class=" col-sm-12 g-pt-10 g-ml-10 g-dp-table g-va-middle equal-height-column">
							<div class="">
								<div class="g-heading-v10 g-mb-10">
									<h3 class="text-uppercase"><strong>"I want people to be afraid of how much I love them"</strong></h3>
								</div>
								<p class="g-fs-16 g-mb-20">- FAB</p>
							</div>
						</div>
					</div>
				</div>
				</div>
			</section>
			<!-- End Contact section -->

			
		</footer>
		<!-- End Footer -->
	</main>

	<!-- JS Global Compulsory -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<script src="../assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- JS Implementing Plugins -->
	<script src="../assets/plugins/smoothScroll.js"></script>
	<script src="../assets/plugins/jquery.easing.min.js"></script>
	<!-- <script src="../assets/plugins/owl-carousel2/owl.carousel.min.js"></script> -->
		<script src="../assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>

	<script src="../assets/plugins/master-slider/masterslider/masterslider.min.js"></script>
	
	<script src="../assets/plugins/revolution-slider/revolution/js/jquery.themepunch.tools.min.js"></script>
	<script src="../assets/plugins/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js"></script>


	<!-- SLIDER REVOLUTION 5.0 EXTENSIONS (Load Extensions only on Local File Systems! The following part can be removed on Server for On Demand Loading) -->
	<script src="../assets/plugins/revolution-slider/revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="../assets/plugins/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
	<script src="../assets/plugins/revolution-slider/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="../assets/plugins/revolution-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="../assets/plugins/revolution-slider/revolution/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="../assets/plugins/revolution-slider/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="../assets/plugins/revolution-slider/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="../assets/plugins/revolution-slider/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="../assets/plugins/revolution-slider/revolution/js/extensions/revolution.extension.video.min.js"></script>

	<!-- JS Page Level-->
	<script src="../assets/js/one.app.js"></script>
	<!-- <script src="assets/js/plugins/owl-carousel2.js"></script> -->
		<script type="text/javascript" src="../assets/js/plugins/owl-carousel.js"></script>

	<script src="assets/js/plugins/promo.js"></script>
	<script src="assets/js/plugins/testimonials.js"></script>
	
	<script type="text/javascript" src="assets/plugins/counter/waypoints.min.js"></script>
	<script type="text/javascript" src="assets/plugins/counter/jquery.counterup.min.js"></script>


	<script>
	$(function() {
		App.init();
		App.initCounter();
		OwlCarousel.initOwlCarousel();
		
		
		
		
	});
	</script>
	
	<script>
	/*var saveData = $.ajax({
      type: 'POST',
      url: "https://api.bf4stats.com/api/playerInfo?plat=pc&name=1ApRiL",
      dataType: "json",
	  contentType: "application/json; charset=utf-8",
      success: function(data) { 
	  //var json = $.parseJSON(resultData);
	  //alert("Save Complete" + resultData)

	  alert(data.player.name)

	  

	  }
	}); */
	
	/*var saveData = $.ajax({
      type: 'GET',
	  headers:
        {
            'TRN-Api-Key' : '48b0c75e-5cd7-4e47-bd78-48dbb3392783'
        },
      url: "https://battlefieldtracker.com/bf1/api/Stats/BasicStats?platform=1&displayName=jbmtk",
      dataType: "json",
	  contentType: "application/json; charset=utf-8",
      success: function(data) { 
		  //var json = $.parseJSON(data);
		  alert("Save Complete" + data)

		  //alert(data.player.name)

		  

		  }
	}); */


//TRN-Api-Key: 48b0c75e-5cd7-4e47-bd78-48dbb3392783
	  // User: jollyjelly


	//saveData.error(function(data) { alert("Something went wrong" + data); });


		</script>
	


	<!--[if lt IE 10]>
		<script src="../assets/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
	<![endif]-->
</body>
</html>
