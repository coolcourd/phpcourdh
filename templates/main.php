<?php 
$page_title = $matched_page["name"]. " | CourdH";
include_once("partials/head.php");
echo $matched_page["body"];
include_once("partials/foot.php");