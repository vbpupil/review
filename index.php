<?php

include "vendor/autoload.php";

use vbpupil\Review\Review;
use vbpupil\Review\ReviewCalculator;
use vbpupil\Review\ReviewCollection;

//1 create a review collection
$c = new ReviewCollection();

//2 add in items to the collection
$c->addItem(new Review('John G', 'love this product', 'well what can i say its awesome', '2019-10-10', 5))
    ->addItem(new Review('Gina', 'its okay', 'well it was all right', '2014-08-15', 4))
    ->addItem(new Review('Adele', 'its okay, i suppose', 'meh', '1980-10-28', 3))
    ->addItem(new Review('Christina', 'its okay, i suppose', 'meh', '1900-12-20', 2))
    ->addItem(new Review('Paul', 'nice', 'nice one would buy again', '2012-11-01', 1));

//3 create a review calculator
$rc = new ReviewCalculator();

//4 run calculate - this will now generate figures on your collection
var_dump($rc->calculate($c));

//5 now grab the best review
var_dump($rc->getBest());

//6 now grab the best reviewers name
echo "The best reviewer is: {$rc->getBest()->getName()}<br /><br />";

//7 pull out the average star rating
echo 'The average score rating of: ' . number_format($rc->getScore(), 2);

//8 get the total number of reviews
echo '<br /><br />The total number of reviews: ' . $rc->getCount();

//9 loop reviews
foreach ($c->getItems() as $r) {
    echo <<<TXT
    <br><br>
Name: {$r->getName()}<br>
Title: {$r->getTitle()}<br>
Description: {$r->getDescription()}<br>
Date Published: {$r->getDatePublished()}<br>
Rating: {$r->getRating()}<br>
Lowest Score: {$r->getRatingMax()}<br>
Highest Score: {$r->getRatingMin()}<br><br>
***************************************
TXT;
}
