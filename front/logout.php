<?php
require_once '../include.php';

$_SESSION = array();
session_destroy();
alertMes("注销成功，跳转中~", "index.php");
