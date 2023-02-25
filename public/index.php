<?php

require('../app/config.php');

function dumpdie($dumpData){
    echo '<br> <div style =" 
    display :inline-block;
    border: 1px solid #555;
    border-radius: 5px;
    padding: 5px 10px;
    background:#999;
    ">';
    echo'<pre>';
    print_r($dumpData);  
    echo'</pre>'; '</div>';
   die();
}






