<?php
/**
 * ReviewTest.php Class
 *
 * @author    Dean Haines
 * @copyright: Dean Haines, 04/02/19, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace Test\vbpupil;


use Exception;
use PHPUnit\Framework\TestCase;
use vbpupil\Review\Review;

class ReviewTest extends TestCase
{

    protected $sut;

    public function setUp()
    {
        $this->sut = new Review(
            'Dean H',
            'What an Awesome Product!',
            'I have since bought 2 of these, they are simply the best.',
            4,
            1,
            5
        );
    }

    /**
     * @throws \Exception
     * @import \Exception
     */
    public function testRetrievalOfReviewAttributes()
    {
        $this->assertEquals('Dean H', $this->sut->getName());
        $this->assertEquals('What an Awesome Product!', $this->sut->getTitle());
        $this->assertEquals('I have since bought 2 of these, they are simply the best.', $this->sut->getDescription());
        $this->assertEquals(4, $this->sut->getRating());
        $this->assertEquals(1, $this->sut->getRatingMin());
        $this->assertEquals(5, $this->sut->getRatingMax());
    }

    public function testMinumumValueExceeded()
    {
        try {
            $this->sut = new Review(
                'Dean H',
                'What an Awesome Product!',
                'I have since bought 2 of these, they are simply the best.',
                1,
                2,
                5
            );
        } catch (Exception $e) {
            $this->assertEquals('Minimum/Maximum value exceeded.', $e->getMessage());
        }
    }

    public function testMaximumValueExceeded()
    {
        try {
            $this->sut = new Review(
                'Dean H',
                'What an Awesome Product!',
                'I have since bought 2 of these, they are simply the best.',
                6,
                1,
                5
            );
        } catch (Exception $e) {
            $this->assertEquals('Minimum/Maximum value exceeded.', $e->getMessage());
        }
    }
}
