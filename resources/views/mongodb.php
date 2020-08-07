<?php

// Create Functions

use MongoDB\Operation\UpdateOne;

$collection = (new MongoDB\Client)->AWI_MINIPROJECT->Animes;

// Read Functions
$table = $collection->find();

// foreach ($table as $record) {
//     echo "<br />";
//     echo "ID: ".$record["_id"]."<br >";
//     echo "Category:".$record->category."<br />";
//     echo "Description:".$record["description"]."<br />";
// }

// Delete  Functions
// $deleteResult = $collection->deleteOne([
//     "genre" => "Action"
// ]);

// printf("Deleted %d document(s)<br />", $deleteResult->getDeletedCount());

// $collection = (new MongoDB\Client)->AWI_MINIPROJECT->Animes;
//    //$id = "5ee2303a3fe2b512c01af536";
//    $product = $collection->findOne();
//    //$product = $collection->find();

//   var_dump($product);
//   print_r($product);