<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Investor Create Portfolio - Kenyon Portfolio Database</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Portfolio Database</a> by Stephen Kenyon</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon solid fa-angle-down">User Roles</a>
								<ul>
									<li><a href="investors.php">Investor</a></li>
									<li><a href="portfolio_managers.php">Portfolio Manager</a></li>
									<li><a href="administrator.html">Administrator</a></li>
								</ul>
							</li>
						</ul>
					</nav>
                </header>
                <!-- Main -->
				<section id="main" class="container">
                    <header>
						<?php
						foreach($_POST as $key=>$value) ${$key}=$value;
                        $fname = $_POST['first_name'];
						echo "<h2>$fname,</h2>";
						?>
						<h2>Create a Portfolio</h2>
                        <p>Fill out the form below for the portfolio you would like to create</p>
                        </br></br>
					</header>
                    <div class="box">

                    <!-- Add Position Form -->
                    <form method="post" action="portfolio_create.php">
                        <div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-mobilep">
							<label>Portfolio Name:</label><input type="text" name="portfolio_name" id="portfolio_name" placeholder="" />
							<input type="hidden" name="first_name" id="first_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $fname = $_POST['first_name']; echo $fname;?> />
							<input type="hidden" name="last_name" id="last_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $lname = $_POST['last_name']; echo $lname;?> />
                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Submit" /></li>
									<li><input type="reset" value="Reset" class="alt" /></li>
								</ul>
                            </div>
                        </div>
					</form><br><br>
					<form method="post" action="investor_submission.php">
						<input type="hidden" name="investor_name" id="investor_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $fname = $_POST['first_name']; $lname = $_POST['last_name']; $investor_name = ($fname . '|' . $lname); echo $investor_name;?> />
						<ul class="actions">
							<li><input type="submit" value="Return" class="primary button" /></li>
						</ul>
					</div>
					</form>
                    </div>
        </section>
        <!-- Footer -->
                <footer id="footer">
					<ul class="copyright">
						<li>&copy;2019 Stephen Kenyon. All rights reserved.</li><li>Design Template: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
    </body>
</html>