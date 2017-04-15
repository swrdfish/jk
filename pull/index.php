<?php
    $output = shell_exec('cd .. && git pull origin master');
    echo "<pre>$output</pre>";
?>
