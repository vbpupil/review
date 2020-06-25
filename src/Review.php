<?php
/**
 * Review.php Class
 *
 * @author    Dean Haines
 * @copyright: Dean Haines, 02/02/19, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

declare(strict_types=1);

namespace vbpupil\Review;

/**
 * Class Review
 * @package Review
 */
class Review
{
    /**
     * @var string $name
     */
    protected ?string $name;

    /**
     * @var string $title
     */
    protected ?string $title;

    /**
     * @var string $description
     */
    protected ?string $description;

    /**
     * @var int $rating
     */
    protected int $rating = 0;

    /**
     * @var int $ratingMin
     */
    protected int $ratingMin = 1;

    /**
     * @var int $ratingMax
     */
    protected int $ratingMax = 5;


    /**
     * Review constructor.
     * @param string $name
     * @param string $title
     * @param string $description
     * @param int $rating
     * @param int|null $min
     * @param int|null $max
     * @throws \Exception
     */
    public function __construct(
        string $name,
        string $title,
        string $description,
        int $rating,
        ?int $min = null,
        ?int $max = null
    ) {
        $this->name = $name;
        $this->title = $title;
        $this->description = $description;

        if (!is_null($min)) {
            $this->setRatingMin($min);
        }

        if (!is_null($max)) {
            $this->setRatingMax($max);
        }

        if ($rating < $this->ratingMin | $rating > $this->ratingMax) {
            throw new \Exception('Minimum/Maximum value exceeded.');
        }

        $this->rating = $rating;
    }

    /**
     * @param int $ratingMin
     */
    public function setRatingMin($ratingMin)
    {
        $this->ratingMin = $ratingMin;
    }

    /**
     * @param int $ratingMax
     */
    public function setRatingMax($ratingMax)
    {
        $this->ratingMax = $ratingMax;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int|string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @return int
     */
    public function getRatingMin()
    {
        return $this->ratingMin;
    }

    /**
     * @return int
     */
    public function getRatingMax()
    {
        return $this->ratingMax;
    }
}
