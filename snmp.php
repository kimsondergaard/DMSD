<?php

{

	$cmd = "sh snmp.sh";


	system($cmd);
	echo getenv("serienummer");
	
        echo getenv("model");

        echo getenv("ialt");

        echo getenv("a3f");

        echo getenv("a3sh");

        echo getenv("a4sh");

        echo getenv("a4f");

        echo getenv("$hostnavn");

        echo getenv("$scan");

}

render();

?>


