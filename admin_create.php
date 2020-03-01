<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Admin Create - Kenyon Portfolio Database</title>
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
						<h2>Admin Create</h2>
                        </br></br>
					</header>
                    <div class="box">

					<!-- Add Investor Form -->
					<p>Create Investor:</p>
                    <form method="post" action="create_investor.php">
                        <div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-mobilep">
							<div class="col-6 col-12-mobilep">
                                <label>First Name:</label><input type="string" name="first_name" id="first_name" />
							</div>
							<div class="col-6 col-12-mobilep">
                                <label>Last Name:</label><input type="string" name="last_name" id="last_name" />
							</div>
							<div class="col-6 col-12-mobilep">
                                <label>Address:</label><input type="string" name="address" id="address"  />
							</div>
							<div class="col-6 col-12-mobilep">
                                <label>City</label><input type="string" name="city" id="city" />
							</div>
							<div class="col-6 col-12-mobilep">
                                <label>State:</label><input name="state" id="state" />
							</div>
							<div class="col-6 col-12-mobilep">
                                <label>Country:</label><input name="country" id="country" />
							</div>
							<div class="col-6 col-12-mobilep">
                                <label>ZIP:</label><input name="zip" step="1" maxlength="5" id="zip" />
							</div>
							<div class="col-6 col-12-mobilep">
							<?php
								require_once 'login_stephen.php';

								//Create the connection to the MySQL database
								$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
								if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

								$sql = "SELECT fund_name FROM Portfolio_Managers;";

								$result = mysqli_query($db_server, $sql);

								if($result)
								{	
									echo "<select name='fund_name' id='fund_name'>";
									while($row=mysqli_fetch_assoc($result))
                    				{
                    				    foreach($row as $key=>$value) ${$key}=$value;
                    				    echo "<option value='$fund_name'>$fund_name</option>";
                    				}
								}
								?>
							</div>
							<div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Submit" /></li>
									<li><input type="reset" value="Reset" class="alt" /></li>
								</ul>
                            </div>
						</div>
						</div>
					</form>
					</div>
					


					<div class="box">

					<!-- Add Fund Form -->
					<p>Create Fund:</p>
                    <form method="post" action="create_fund.php">
                        <div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-mobilep">
							<div class="col-6 col-12-mobilep">
                                <label>Fund Name:</label><input type="string" name="fund_name" id="fund_name" />
							</div>
							<div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Submit" /></li>
									<li><input type="reset" value="Reset" class="alt" /></li>
								</ul>
                            </div>
                        </div>
					</form>
					</div>
					</div>

					<div class="box">

					<!-- Add Category Form -->
					<p>Create Category:</p>
                    <form method="post" action="create_category.php">
                        <div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-mobilep">
							<div class="col-6 col-12-mobilep">
                                <label>Category Name:</label><input type="string" name="category_name" id="category_name" />
							</div>
							<div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Submit" /></li>
									<li><input type="reset" value="Reset" class="alt" /></li>
								</ul>
                            </div>
                        </div>
					</form>
					</div>
					</div>

					<div class="box">

					<!-- Add Asset Form -->
					<p>Create Asset:</p>
                    <form method="post" action="create_asset.php">
                        <div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-mobilep">
							<div class="col-6 col-12-mobilep">
                                <label>Asset Name:</label><input type="string" name="asset_name" id="asset_name" />
							</div>
							<div class="col-6 col-12-mobilep">
                                <label>Symbol:</label><input type="string" name="symbol" id="symbol" />
							</div>
							<div class="col-6 col-12-mobilep">
								<?php
								require_once 'login_stephen.php';

								//Create the connection to the MySQL database
								$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
								if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

								$sql = "SELECT category_name FROM Categories;";

								$result = mysqli_query($db_server, $sql);

								if($result)
								{	
									echo "<select name='category_name' id='category_name'>";
									while($row=mysqli_fetch_assoc($result))
                    				{
                    				    foreach($row as $key=>$value) ${$key}=$value;
                    				    echo "<option value='$category_name'>$category_name</option>";
                    				}
								}
								?>
							</div>
							<div class="col-12">
                                <ul class="actions special">
                                    <li><input type="submit" value="Submit" /></li>
									<li><input type="reset" value="Reset" class="alt" /></li>
								</ul>
                            </div>
                        </div>
					</form>
					</div>
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