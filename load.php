<?php

require_once "menus/menus.php";

$ObjMenus = new menus();

require_once "layouts/layout.php";  
$ObjLayouts = new layouts();


  
?>
<h1>Today is Wednesday</h1>

<?php

/*$arr = ["black", "white", "green", "red"];

foreach($arr AS $color){
    print $color . "<br>";

}

print dirname(__FILE__);
print "<br>";
print "<br>";
print $_SERVER["PHP_SELF"];
print "<br>";
print "<br>";
print basename($_SERVER["PHP_SELF"]);
print "<br>";
print "<br>";

if(file_exists("index.php")AND is_readable("index.php")){
    print "yes";
}else {
        print "no";
    }*/

?>
