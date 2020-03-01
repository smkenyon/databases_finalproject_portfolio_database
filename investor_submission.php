<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Investors - Kenyon Portfolio Database</title>
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
                        $base = $_POST['investor_name'];
                        $base_explode = explode('|',$base);
                        $fname = $base_explode[0];
                        echo "<h2>Welcome, $fname!</h2>";
                        ?>
                        <p>Below is information for all of your portfolios and trades</p>
                        </br></br>
                        <p>Feel free to add, edit, or remove a position.</p>
                        
                        <ul class="actions stacked">
                        <form method="post" action="investor_create.php">
                            <input type="hidden" name="first_name" id="first_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $base = $_POST['investor_name']; $base_explode = explode('|', $base); $fname = $base_explode[0]; echo $fname;?> />
                            <input type="hidden" name="last_name" id="last_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $base = $_POST['investor_name']; $base_explode = explode('|', $base); $lname = $base_explode[1]; echo $lname;?> />
						    <li><input type="submit" value="Create Portfolio" class="button primary"/></li>
                        </form><br><br><br><br>
                        <form method="post" action="investor_add.php">
                            <input type="hidden" name="first_name" id="first_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $base = $_POST['investor_name']; $base_explode = explode('|', $base); $fname = $base_explode[0]; echo $fname;?> />
                            <input type="hidden" name="last_name" id="last_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $base = $_POST['investor_name']; $base_explode = explode('|', $base); $lname = $base_explode[1]; echo $lname;?> />
						    <li><input type="submit" value="Add Position" class="button primary"/></li>
                        </form><br><br><br><br>
                        <form method="post" action="investor_edit.php">
                            <input type="hidden" name="first_name" id="first_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $base = $_POST['investor_name']; $base_explode = explode('|', $base); $fname = $base_explode[0]; echo $fname;?> />
                            <input type="hidden" name="last_name" id="last_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $base = $_POST['investor_name']; $base_explode = explode('|', $base); $lname = $base_explode[1]; echo $lname;?> />
                                <label>Edit Position Number:</label>

								<?php
								require_once 'login_stephen.php';

								//Create the connection to the MySQL database
								$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
								if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
									
								foreach($_POST as $key=>$value) ${$key}=$value;
                            
                                $base = $_POST['investor_name'];
								$fullname = explode('|', $base);

								$fname = $fullname[0];
								$lname = $fullname[1];

								$sql = "SELECT t.trade_id
                                        FROM Investors INNER JOIN Portfolios
                                        ON Investors.investor_id = Portfolios.investor_id
                                            INNER JOIN Trades AS t
                                            ON t.portfolio_id = Portfolios.portfolio_id
                                            WHERE ((Investors.first_name) = '$fname' AND (Investors.last_name = '$lname'))
                                            ORDER BY t.trade_id;";

								$result = mysqli_query($db_server, $sql);

								if($result)
								{	
									echo "<select name='trade_id' id='trade_id'>";
									while($row=mysqli_fetch_assoc($result))
                    				{
                    				    foreach($row as $key=>$value) ${$key}=$value;
                    				    echo "<option value='$trade_id'>$trade_id</option>";
                    				}
								}
								?>
								</select>
                            <li><input type="submit" value="Edit Position" class="button" method="post" action="investor_edit.php"></li>
                        </form><br>
                        <form method="post" action="investor_remove.php">
                            <input type="hidden" name="first_name" id="first_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $base = $_POST['investor_name']; $base_explode = explode('|', $base); $fname = $base_explode[0]; echo $fname;?> />
                            <input type="hidden" name="last_name" id="last_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $base = $_POST['investor_name']; $base_explode = explode('|', $base); $lname = $base_explode[1]; echo $lname;?> />
                            <label>Remove Position Number:</label>

								<?php
								require_once 'login_stephen.php';

								//Create the connection to the MySQL database
								$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
								if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
									
								foreach($_POST as $key=>$value) ${$key}=$value;
                            
                                $base = $_POST['investor_name'];
								$fullname = explode('|', $base);

								$fname = $fullname[0];
								$lname = $fullname[1];

								$sql = "SELECT t.trade_id
                                        FROM Investors INNER JOIN Portfolios
                                        ON Investors.investor_id = Portfolios.investor_id
                                            INNER JOIN Trades AS t
                                            ON t.portfolio_id = Portfolios.portfolio_id
                                            WHERE ((Investors.first_name) = '$fname' AND (Investors.last_name = '$lname'))
                                            ORDER BY t.trade_id;";

								$result = mysqli_query($db_server, $sql);

								if($result)
								{	
									echo "<select name='trade_id' id='trade_id' class=small>";
									while($row=mysqli_fetch_assoc($result))
                    				{
                    				    foreach($row as $key=>$value) ${$key}=$value;
                    				    echo "<option value='$trade_id'>$trade_id</option>";
                    				}
								}
								?>
								</select>
                            <li><input type="submit" value="Remove Position" class="button" method="post" action="investor_remove.php"></li>
                        </form>
                            </ul>
					</header>
<?php
    require_once 'login_stephen.php';

    //Create the connection to the MySQL database
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
		
    foreach($_POST as $key=>$value) ${$key}=$value;

    $base = $_POST['investor_name'];
	$fullname = explode('|', $base);

	$fname = $fullname[0];
    $lname = $fullname[1];

    $sql = "SELECT t.trade_id, p.portfolio_name, a.asset_name, a.symbol, t.open_date, t.close_date, t.purchase_price, t.close_price, t.quantity
            FROM Investors INNER JOIN Portfolios AS p
            ON Investors.investor_id = p.investor_id
                INNER JOIN Trades AS t
                ON t.portfolio_id = p.portfolio_id
                    INNER JOIN Assets AS a
                    ON t.asset_id = a.asset_id
                    WHERE ((Investors.first_name) = '$fname' AND (Investors.last_name = '$lname'))
                    ORDER BY p.portfolio_name, t.open_date;";

    $result = mysqli_query($db_server, $sql);

    if($result)
    {
        echo "<section class=\"box\">";
            echo "<div class=\"table-wrapper\">";
                echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                        echo    "<th>Position Number</th>";
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
                            echo "<td>$trade_id</td>";
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