<?php
  if(isset($_GET['u'])){

    require("../private/db_connection.php");

    $query = "SELECT COUNT(*) FROM users WHERE login=?";
    $req=$cnx->prepare($query);
    $req->execute(array($_GET['u']));
    $data = $req->fetch();

    if ($data[0] > 0) {

?>


<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="mainCtrl">

<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109050715-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109050715-1');
</script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="{{details.fullname}} | {{details.summary}}">
<meta name="keywords" content="resume, CV, personal Vcard, html, {{details.name}}, {{details.surname}}, {{details.fullname}}, {{details.keywords}}">
<meta name="author" content="{{details.fullname}}">
<meta name="google" content="notranslate" />
<meta name="google-site-verification" content="i4Fa4PhaFXb9F8EhOZjDyPf5Zl-HI4ny80yvS6QhbkA" />

<title>{{details.fullname}} | {{details.summaryStripped}}</title>

<!-- Web Fonts -->
<link href='https://fonts.googleapis.com/css?family=Roboto:100,200,300' rel='stylesheet' type='text/css'>
<!-- Bootstrap core CSS -->
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<!-- Font Awesome CSS -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
<!-- Animate css -->
<link href="assets/css/animate.css" rel="stylesheet">
<!-- Magnific css -->
<link href="assets/css/magnific-popup.css" rel="stylesheet">
<!-- Custom styles CSS -->
<link href="assets/css/style.css" rel="stylesheet" media="screen">
<!-- Responsive CSS -->
<link href="assets/css/responsive.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<link rel="shortcut icon" href="assets/images/ico/favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/ico/apple-touch-icon-57-precomposed.png">

<script type="application/ld+json">
{ "@context": "http://schema.org",
  "@type": "Person",
  "name": "Antoine Carossio",
  "url": "http://caross.io",
  "sameAs": [ 
  "https://twitter.com/icarossio",
  "https://www.linkedin.com/in/acarossio/" ]
}
</script>

</head>

<body>
<!-- Preloader -->
<div id="tt-preloader">
  <div id="pre-status">
    <div class="preload-placeholder"></div>
  </div>
</div>

<!-- Home Section -->
<section id="home" class="tt-fullHeight" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2">

  <div class="home-content">

    <div class="intro">
      <div class="intro-center">
        <a href="admin/index.php">
          <?php
            echo "<img class='profile-image center' src='assets/images/profile/".htmlspecialchars($_GET['u']).".png' onerror='this.src=\"../admin/img/profile.png\"' alt='Main Profile Picture'>"
          ?>
        </a>
        <div class="profile-text">
          <div class="intro-sub">{{ details.fullname }}</div>
            <h1 ng-bind-html="details.summary"> </h1>
            <p ng-bind-html="details.description"> </p>
            <!--<span data-ng-init="userid='<?php echo $_GET['u'] ?>'"></span>-->

          <div class="social-icons">
            <ul class="list-inline">
              <li ng-if="details.linkedin.length > 0">
                <a href="{{details.linkedin}}" alt="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>
              </li>
              <li ng-if="details.twitter.length > 0">
                <a href="{{details.twitter}}" alt="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
              </li>
              <li ng-if="details.github.length > 0">
                <a href="{{details.github}}" alt="Github" target="_blank"><i class="fa fa-github"></i></a>
              </li>
              <li>
                <a href="#contact" alt="Contact form"><i class="fa fa-envelope"></i></a>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </div>

    <div class="mouse-icon">
      <div class="wheel"></div>
    </div>
  </div>
</section>

<!-- Navigation -->
<header class="header">
  <nav class="navbar navbar-custom">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">ONLINE<span>CV</span></a>
      </div>

      <div class="collapse navbar-collapse" id="custom-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#home">Home</a></li>
          <li><a href="#resume">Resume</a></li>
          <li><a href="#skills">Skills</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- Resume Section -->
<section id="resume" class="resume-section section-padding">
  <div class="container">

    <h2 class="section-title wow fadeInUp">Resume
      <div class="download-button">
        <a class="btn btn-primary btn-xs" href="{{details.resume_link}}" target="_blank" download><i class="fa fa-download"></i>PDF Version</a>
      </div>
    </h2>

    <div resume="education" userid="<?php echo htmlspecialchars($_GET['u']) ?>";>
    </div>

    <div resume="experiences" userid="<?php echo htmlspecialchars($_GET['u']) ?>";>
    </div>
  </div>

</section>

<!-- Skills Section -->
<section id="skills" class="skills-section section-padding">
  <div class="container">
    <h2 class="section-title wow fadeInUp">Skills</h2>

    <div class="skill-category text-center">
      <h3>Computer science</h3>
    </div>

    <div class="row">
      <div class="col-md-6" ng-repeat="skillInfo in skillsInfo">
        <div class="skill-progress">
          <div class="skill-title"><h3>{{skillInfo.title}}</h3></div> 
          <div class="progress">
            <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="{{skillInfo.percentage}}" aria-valuemin="0" aria-valuemax="100" ><span>{{skillInfo.details}}</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="skill-progress"></div>
      </div>
    </div>

    <div class="skill-category text-center">
      <h3>Communication</h3>
    </div>

    <div class="row communication text-center">
      <div class="col-xs-12 col-sm-4 col-md-4" ng-repeat="skillCom in skillsCom">
        <div class="chart" data-percent="{{skillCom.percentage}}">
          <!-- <span class="percent"></span> -->
          <span class="level">{{skillCom.details}}</span>
          <div class="chart-text">
            <span>{{skillCom.title}}</span>
          </div>
        </div>
      </div>
    </div>

    <div class="skill-category text-center">
      <h3>Professional</h3>
    </div>
      <div class="row more-skills text-center">
        <div class="col-md-12">
          <span class="skill-tag" ng-repeat="skillPro in skillsPro">{{skillPro.title}}</span>
        </div>
      </div>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section section-padding">
  <div class="container">
    <h2 class="section-title wow fadeInUp">Contact</h2>

    <div class="row">
      <div class="col-md-6">
        <div class="contact-form">
          <div class="center-xs">
            <i class="fa fa-envelope"></i>
            <strong>Send me a message</strong>
          </div>
          <form name="contact-form" id="contactForm" action="assets/php/sendemail.php" method="POST">

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" required>
            </div>

            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" name="subject" class="form-control" id="subject" required>
            </div>

            <div class="form-group">
              <label for="message">Message</label>
              <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
            </div>

            <div class="form-group" hidden>
              <label for="tomail">Tomail</label>
              <input type="text" name="tomail" class="form-control" id="tomail" value="{{details.mail}}" required>
            </div>

            <div class="g-recaptcha" data-sitekey="6LeK6UwUAAAAABr7jjaDlRVPhQmk5hJ9O7qgdJXJ"></div>

            <div class="center-xs">
              <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send Message</button>
            </div>
          </form>

            <div class="center-xs">
              <button class="btn btn-warning" id="resend"><i class="fa fa-undo"></i> Send a new message</button>
            </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="row center-xs">
          <div class="col-sm-12">
            <i class="fa fa-map-marker"></i>
            <address id="address">{{details.address}}
            </address>
          </div>

    <!--
          <div class="col-sm-6">
            <i class="fa fa-phone"></i>
            <div class="contact-number">
              <strong>Phone Number</strong>
            <br>
            </div>
          </div>
        -->
        </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="location-map">
            <iframe id="map"></iframe>
          </div>
        </div>
      </div>

      </div>
    </div>
  </div>
</section>


<!-- Footer Section -->
<footer class="footer-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="copyright text-center">
          <p>&copy; {{details.fullname}} {{copyright | date:'yyyy'}}. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>


<!-- Scroll-up -->
<div class="scroll-up">
<a href="#home"><i class="fa fa-angle-up"></i></a>
</div>

<script>
    var _userid = <?php echo "'".htmlspecialchars($_GET['u'])."'"; ?>;
</script>

<!-- AngularJS -->
<script src="assets/angular/angular.min.js"></script>
<script src="assets/angular/angular-sanitize.min.js"></script>
<script src="assets/angular/angular-route.min.js"></script>
<script src="assets/angular/modules/controllers.js"></script>
<script src="assets/angular/modules/directives.js"></script>
<script src="assets/angular/modules/services.js"></script>
<script src="app.js"></script>

<!-- Javascript files -->
<script src="assets/js/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.stellar.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.countTo.js"></script>
<script src="assets/js/jquery.inview.min.js"></script> 
<script src="assets/js/jquery.easypiechart.js"></script>
<script src="assets/js/jquery.shuffle.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
<script src="assets/js/jquery.fitvids.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBn58KqnxCEmKNLR3nNwvVZ-DJZ05hilsM&v=3.exp"></script>
<script src='https://www.google.com/recaptcha/api.js?key=6LeK6UwUAAAAABr7jjaDlRVPhQmk5hJ9O7qgdJXJ'></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>

<?php
    }else{
      header("Location: admin/index.php");
    }
  }else{
      header("Location: admin/index.php");
  }
?>