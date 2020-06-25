<?php
/**
 * ReviewCalculatorTest.php Class
 *
 * @author    Dean Haines
 * @copyright: Dean Haines, 04/02/19, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace Test\vbpupil\Review;

use PHPUnit\Framework\TestCase;
use vbpupil\Review\Review;
use vbpupil\Review\ReviewCalculator;
use vbpupil\Review\ReviewCollection;

class ReviewCalculatorTest extends TestCase
{
    protected $sut;

    protected $calculator;

    public function setUp()
    {
        $this->sut = new ReviewCollection();

        $this->sut->addItem(new Review('John G', 'love this product', 'well what can i say its awesome', 5))
            ->addItem(new Review('Gina', 'its okay', 'well it was all right', 4))
            ->addItem(new Review('Adele', 'its okay, i suppose', 'meh', 2))
            ->addItem(new Review('Christina', 'its okay, i suppose', 'meh *2', 2))
            ->addItem(new Review('Paul', 'okay', 'okay, perhaps would not buy again', 1));

        $this->calculator = new ReviewCalculator();
        $this->calculator->calculate($this->sut);
    }

    public function testResponseFromCalulateIsAnArray()
    {
        $this->assertTrue(is_array($this->calculator->calculate($this->sut)));
    }

    public function testingGettingTheBestReview()
    {
        $best = $this->calculator->getBest();

        $this->assertEquals('John G', $best->getName());
        $this->assertEquals('love this product', $best->getTitle());
        $this->assertEquals('well what can i say its awesome', $best->getDescription());
        $this->assertEquals(5, $best->getRating());
    }

    public function testingGettingTheWorstReview()
    {
        $worst = $this->calculator->getWorst();

        $this->assertEquals('Paul', $worst->getName());
        $this->assertEquals('okay', $worst->getTitle());
        $this->assertEquals('okay, perhaps would not buy again', $worst->getDescription());
        $this->assertEquals(1, $worst->getRating());
    }

    public function testGetCount()
    {
        $this->assertEquals(5, $this->calculator->getCount());
    }

    public function testGetScore()
    {
        $this->assertEquals(2.8, $this->calculator->getScore());
    }
}
