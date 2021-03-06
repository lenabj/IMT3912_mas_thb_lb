<!DOCTYPE html>
<html>
	<head>
		<title>Omnomnom</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css" type="text/css"/>

		<!-- html5.js for IE less than 9 -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- css3-mediaqueries.js for IE less than 9 -->
		<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<![endif]-->

	</head>

	<body>
	
		<header id="header"> <!--start header-->
			<a href="index.html"><h1> Omnomnom </h1></a>
		</header> <!--end header-->
		
			
		<div id="container"> <!--start container-->
		
			<nav id="navigation"> <!--start nav-->
				<ul id="main-nav">
					<li><a href="video.html">Opptak</a></li>
					<li><a href="stream.html">Stream</a></li>
				</ul>
			</nav> <!--end nav-->	
			
			<div id="content"> <!--start content-->
				<p id="ja"><label for="search">Search</label><input type="text" id="search" /> 
			
				<h3>Forelesningsopptak</h3>
				<div id="video">
				<a href="login.php"><p>Logg inn</p></a>
				<?php

$student = '090912';

$ldapds = @ldap_connect("ldap://ldap.hig.no");
if(!$ldapds) {
echo "Can't connect to LDAP server!\n";
exit(1);
}

$sr = ldap_search($ldapds, "ou=students,ou=courses,ou=groups,dc=hig,dc=no", "memberUid=$student", array('cn', 'description', 'memberuid'));
$entries = ldap_get_entries($ldapds, $sr);

echo "$student tar f�lgende fag:\n";
for($i = 0; $i < $entries['count']; $i++) {
echo "\tFagkode: ".$entries[$i]['cn'][0]." Beskrivelse: ".$entries[$i]['description'][0]."\n";
}

@ldap_close($ldapds);

?>
				</div>
			</div> <!--end content-->
			
		</div> <!--end container-->
		
		<footer id="footer"> <!--start footer-->
			<p>her kommer det kontaktinfo</p>
		</footer> <!--end footer-->
		
	</body>

</html> 