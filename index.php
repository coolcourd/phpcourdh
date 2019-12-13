<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$salt = "9&Gtfsd8f6(&^8kh"; // should pull this into a git ignored config file later on
@$apiquery = $_GET['q'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' or $apiquery) {
    include_once("./rest.php");
} else {
    @preg_match("/[a-z0-9\-]+/", $_GET['p'], $matches);
    @$page = $matches[0];
        $all_pages = json_decode(file_get_contents(".data/pages.json"), 1);
        $matched_page = "";
        foreach ($all_pages as $single_page) {
            if ($single_page['id'] == $page or $single_page['slug'] == $page){
                $matched_page = $single_page;
            }
            if ($single_page['name'] == "Not Found"){
                $nf_page = $single_page;
            }
            if ($single_page['name'] == "Home"){
                $home_page = $single_page;
            }            
          }
        if ($matched_page) {
            include_once("templates/".$matched_page["template"].".php");
        } else if (!$page) {
            $matched_page = $home_page;
            include_once("templates/".$matched_page["template"].".php");
        } else {
            $matched_page = $nf_page;
            include_once("templates/".$nf_page["template"].".php");
                }
}
// echo md5('Pa$$word123!' . $salt);