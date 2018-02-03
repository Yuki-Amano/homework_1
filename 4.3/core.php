<?php
if (!defined('MAIN')){
//запрет доступа к странице напрямую
http_response_code('403');
die();
}
session_start();
include 'functions.php';