<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>
    <h2>This is my first page</h2>
    <h3>This is my last page</h3>
    <h4></h4>
    <?php
    require_once "load.php";
    print $Obj->user_age("Marlyn", 2004);
?>
</body>
</html>