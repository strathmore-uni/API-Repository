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
$ObjCont = new contents();


require "includes/constants.php;
require "includes/dbConnection.php;
  
$conn = new dbConnection($DBTYPE, $HOSTNAME, $DBPORT, $HOSTUSER, $HOSTPASS, $DBNAME);
?>

<?php

/*<!-- print date("1");
if(date("1")== "Friday"){
    print "Yes";
}else{
    print "No";
}

print "<br>";
switch (date("1")){
    case 'Friday': print "Yes";
    break;
    case 'Monday': print "No";
    break;
} -->*/



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
