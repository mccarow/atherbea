<?php
ob_start();

?>
<h1>TITRE 1</h1>
<strong>Bonjour</strong><br />
<div>TEST</div>

<?php

$out = ob_get_contents();

ob_clean();

echo $out;