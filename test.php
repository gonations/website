<!DOCTYPE html>
<html lang="en">
<head>
    <title>Standard PHP if-else Statement</title>
</head>
<body>
<select name="selectedValue">
<option value="Newest">Newest</option>
<option value="Best Sellers">Best Sellers</option>
<option value="Alphabetical">Alphabetical</option>
</select>
<? php
switch($_GET['selectedValue']){
case 'Newest':
    // do Something for Newest
	echo "0";
break;
case 'Best Sellers':
    // do Something for Best seller
	echo "1";
break;
case 'Alphabetical':
    // do Something for Alphabetical
	echo "2";
break;
default:
    // Something went wrong or form has been tampered.
	echo "999";
}?>
</body>
</html>