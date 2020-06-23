# Reviews

## How
```php
<?php

include "vendor/autoload.php";

use vbpupil\Review\Review;
use vbpupil\Review\ReviewCalculator;
use vbpupil\Review\ReviewCollection;

//1. create a review collection object
$c = new ReviewCollection();

//2. populate with reviews - (name, title, comment, score out of min/max, key)
$c->addItem(new Review('John', 'love this product', 'well what can i say its awesome', 4), 'John')
    ->addItem(new Review('Gina', 'its okay', 'well it was all right', 2), 'Gina')
    ->addItem(new Review('Adele', 'its okay, i suppose', 'meh', 1), 'Adele')
    ->addItem(new Review('Christina', 'its okay, i suppose', 'meh *2', 3), 'Christina')
    ->addItem(new Review('Paul', 'nice', 'nice one would buy again', 5), 'Paul');

//3. create a review calculator
$rc = new ReviewCalculator();

//4. call the calculate method and pass in the review collection object
var_dump($rc->calculate($c));
```