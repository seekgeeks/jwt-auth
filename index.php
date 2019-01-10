<?php
/**
 * @author Dheeraj jha
 * @email Dheeraj@thedije.com
 * @create date 2019-01-11 01:03:48
 * @modify date 2019-01-11 01:03:48
 * @desc [description]
 */

 require('jwt-auth.php');

 $pay_load  =   array(
                'email'=>'github@example.com',
                'user_id'=>8364
                );

$create_token   =   create_jwt($pay_load);

echo "<h3> JWT Created</h3>";
echo "JWT Created is : ".$create_token;
echo "<br>";


$fetch_payload  =   verify_jwt($create_token);

echo "<h3> JWT Verified</h3>";
echo "<pre>";
print_r($fetch_payload);
echo "</pre>";