<?php
function classAutoLoad($classname){


$directories = ["contents", "layouts", "menus"];

foreach($directories AS $dir)
{
    $filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir .  DIRECTORY_SEPARATOR . $classname . ".php";
    if(file_exists($filename) AND is_readable($filename)){
        require_once $filename;
    }
}
}
spl_autoload_register('classAutoLoad');
//Create instance of all classes
$ObjLayouts = new layout();
$ObjMenus = new menus();
$ObjHeadings = new headings();
  
?>

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
