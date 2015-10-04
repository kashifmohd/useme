<?php

/*
 * Following code will list all the product
 */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all product from product table
$result = mysql_query("SELECT * FROM product") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // product node
    $response["product"] = array();

    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["pid"] = $row["pid"];
        $product["plat"] = $row["plat"];
        $product["plong"] = $row["plong"];
        $product["pcat"] = $row["pcat"];
        

        // push single product into final response array
        array_push($response["product"], $product);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no product found
    $response["success"] = 0;
    $response["message"] = "No product found";

    // echo no users JSON
    echo json_encode($response);
}
?>