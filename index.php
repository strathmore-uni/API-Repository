<?php

//require_once "Layouts/layout.php";  
require_once "load.php";
$ObjLayouts->heading();
$ObjMenus->main_menu();
$ObjHeadings->main_banner();
$ObjCont->about_content();
$ObjCont->side_bar();
$ObjLayouts->footer();

    //print $Obj->user_age("Marlyn", 2004);
?>