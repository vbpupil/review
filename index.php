<?php

include "vendor/autoload.php";

use vbpupil\Review\Review;
use vbpupil\Review\ReviewCalculator;
use vbpupil\Review\ReviewCollection;

//1 create a review collection
$c = new ReviewCollection();

//2 add in items to the collection
$c->addItem(new Review('John G', 'love this product', 'well what can i say its awesome', 5))
    ->addItem(new Review('Gina', 'its okay', 'well it was all right', 4))
    ->addItem(new Review('Adele', 'its okay, i suppose', 'meh', 3))
    ->addItem(new Review('Christina', 'its okay, i suppose', 'meh *2', 2))
    ->addItem(new Review('Paul', 'nice', 'nice one would buy again', 1));

//3 create a review calculator
$rc = new ReviewCalculator();

//4 run calculate - this will now generate figures on your collection
var_dump($rc->calculate($c));

//5 now grab the best review
var_dump($rc->getBest());

//6 now grab the best reviewers name
var_dump($rc->getBest()->getName());
