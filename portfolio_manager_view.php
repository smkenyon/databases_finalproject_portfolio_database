<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>PM View - Kenyon Portfolio Database</title>
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
                        $fname = $_POST['fund_name'];
                        echo "<h2>$fname</h2>";
                        ?>
                        <p>Below is information for all of the investors that make up your fund, their portfolios, and trades</p>
                    </header>
<?php
    require_once 'login_stephen.php';

    //Create the connection to the MySQL database
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
		
    foreach($_POST as $key=>$value) ${$key}=$value;

    $fname = $_POST['fund_name'];

    $sql = "SELECT i.first_name, i.last_name, pm.fund_name
            FROM Investors AS i INNER JOIN Portfolio_Managers AS pm
            ON i.pm_id = pm.pm_id
            WHERE pm.fund_name = '$fname'
            ORDER BY i.last_name;";

    $result = mysqli_query($db_server, $sql);

    if($result)
    {
        echo "<section class=\"box\">";
            echo "<p>Your investors working for your fund:</p>";
            echo "<div class=\"table-wrapper\">";
                echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                        echo    "<th>Investor Name</th>";
                    echo "</tr>";

                    echo "<tbody>";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        foreach($row as $key=>$value) ${$key}=$value;
                        echo "<tr>";
                            echo "<td>$first_name $last_name</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                echo "</table>";
            echo "</div>";
        echo "</section>";
    }
    

?>
<?php
    require_once 'login_stephen.php';

    //Create the connection to the MySQL database
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
		
    foreach($_POST as $key=>$value) ${$key}=$value;

    $fname = $_POST['fund_name'];

    $sql = "SELECT i.first_name, i.last_name, pm.fund_name, p.portfolio_name, a.asset_name, a.symbol, t.open_date, t.close_date, t.purchase_price, t.close_price, t.quantity
            FROM Investors AS i INNER JOIN Portfolio_Managers AS pm
            ON i.pm_id = pm.pm_id
                INNER JOIN Portfolios AS p
                ON p.investor_id = i.investor_id
                    INNER JOIN Trades AS t
                    ON t.portfolio_id = p.portfolio_id
                        INNER JOIN Assets AS a
                        ON t.asset_id = a.asset_id
                        WHERE pm.fund_name = '$fname'
                        ORDER BY p.portfolio_name, t.open_date;";

    $result = mysqli_query($db_server, $sql);

    if($result)
    {
        echo "<section class=\"box\">";
        echo "<p>Your investors' positions and portfolios, if they have any:</p>";
            echo "<div class=\"table-wrapper\">";
                echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                        echo    "<th>Investor Name</th>";
                        echo    "<th>Portfolio Name</th>";
                        echo    "<th>Asset</th>";
                        echo    "<th>Symbol</th>";
                        echo    "<th>Open Date</th>";
                        echo    "<th>Close Date</th>";
                        echo    "<th>Purchase Price</th>";
                        echo    "<th>Close Price</th>";
                        echo    "<th>Quantity</th>";
                    echo "</tr>";

                    echo "<tbody>";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        foreach($row as $key=>$value) ${$key}=$value;
                        echo "<tr>";
                            echo "<td>$first_name $last_name</td>";
                            echo "<td>$portfolio_name</td>";
                            echo "<td>$asset_name</td>";
                            echo "<td>$symbol</td>";
                            echo "<td>$open_date</td>";
                            echo "<td>$close_date</td>";
                            echo "<td>$purchase_price</td>";
                            echo "<td>$close_price</td>";
                            echo "<td>$quantity</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                echo "</table>";
            echo "</div>";
        echo "</section>";
    }
    

?>
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