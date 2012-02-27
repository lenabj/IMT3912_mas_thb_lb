<?php
	function gucldapconnect($servers, $userdn, $password)
	{
	$server = split(";", $servers);
	foreach($server as $host) {
	if(!($ds=@ldap_connect("ldaps://$host"))) { continue; }
	if(!($r=@ldap_bind($ds, $userdn, $password))) { continue; }
	return $ds;
	}
	return FALSE;
	}

	function authenticate($username, $password)
	{
	if(!($ds=gucldapconnect("hig1.hig.no", "cn=ldapalias,cn=Users,dc=hig,dc=no", "Gy8a0pnT"))) {
	return FALSE;
	}

	$sr = ldap_search($ds, "ou=Student,dc=hig,dc=no", "sAMAccountName=$username");
	$entries = ldap_get_entries($ds, $sr);
	@ldap_close($ds);

	if(!isset($entries[0]['dn'])) {
	return FALSE;
	}

	if(($ds=gucldapconnect("hig1.hig.no", $entries[0]['dn'], $password))) {
	return TRUE;
	} else {
	return FALSE;
	}
	}

	if(authenticate('<studentnummer>', '<passord>')) {
	echo "Login ok\n";
	} else {
	echo "Login failed\n";
	}
?>