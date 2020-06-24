<?php

/**
 * ReviewCollectionTest.php Class
 *
 * @author    Dean Haines
 * @copyright: Dean Haines, 04/02/19, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace Test\vbpupil;


use Exception;
use PHPUnit\Framework\TestCase;
use vbpupil\Review\Review;
use vbpupil\Review\ReviewCollection;

/**
 * Class ReviewCollectionTest
 * @package Test\vbpupil
 */
class ReviewCollectionTest extends TestCase
{

    protected $sut;

    public function setUp()
    {
        $this->sut = new ReviewCollection();
        $this->sut->addItem(
            new Review(
                'Dean H',
                'What an Awesome Product!',
                'I have since bought 2 of these, they are simply the best.',
                4,
                1,
                5
            )
        );
    }

    public function testReturnType()
    {
        $this->assertTrue($this->sut instanceof \vbpupil\Review\ReviewCollection);
    }

    /**
     * @throws \Exception
     * @import \Exception
     */
    public function testAddingItemThatExceedsRatingMinumum()
    {
        try {
            $this->sut->addItem(
                new Review(
                    'John S',
                    'What an Discrace!',
                    'Im returning this item imediatly.',
                    2,
                    0,
                    5
                )
            );
        } catch (Exception $e) {
            $this->assertEquals(
                'Review should have a min rating of 1 and a max rating of 5. given: 0|5',
                $e->getMessage()
            );
        }
    }

    /**
     * @throws \Exception
     * @import \Exception
     */
    public function testAddingItemThatExceedsRatingMaximum()
    {
        try {
            $this->sut->addItem(
                new Review(
                    'John S',
                    'What an Discrace!',
                    'Im returning this item imediatly.',
                    2,
                    1,
                    6
                )
            );
        } catch (Exception $e) {
            $this->assertEquals(
                'Review should have a min rating of 1 and a max rating of 5. given: 1|6',
                $e->getMessage()
            );
        }
    }
}
