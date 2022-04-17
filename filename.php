<?php

$package = $_GET['package_select'];

          if ($package == '0') {

              echo "Less Than Zero"; 

            } else if ($package == '1' || $package == '2' || $package == '3' || $package == '4' || $package == '5' || $package == '6' || $package == '7' || $package == '8' || $package == '9' || $package == '10') {

              echo "$package == Greater Than zero";

            } else {

              echo "No Links";

            }



?>