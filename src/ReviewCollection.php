<?php
/**
 * ReviewCollection.php Class
 *
 * @author    Dean Haines
 * @copyright: Dean Haines, 02/02/19, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace vbpupil\Review;


use Vbpupil\Collection\Collection;

class ReviewCollection extends Collection
{
    /**
     * @var null $ratingMin
     */
    protected $ratingMin;

    /**
     * @var null $ratingMax
     */
    protected $ratingMax;

    /**
     * @param $obj
     * @param null $key
     * @return $this|Collection
     * @throws @import \Vbpupil\Collection\KeyInUseException
     */
    public function addItem($obj, $key = null): Collection
    {
        if (is_null($this->ratingMin) || is_null($this->ratingMax)) {
            $this->ratingMin = $obj->getRatingMin();
            $this->ratingMax = $obj->getRatingMax();
        }

        if (
            ($this->ratingMin <> $obj->getRatingMin()) ||
            ($this->ratingMax <> $obj->getRatingMax())
        ) {
            throw new \Exception("Review should have a min rating of {$this->ratingMin} and a max rating of {$this->ratingMax}. given: {$obj->getRatingMin()}|{$obj->getRatingMax()}");
        }

        parent::addItem($obj, $key);

        return $this;
    }
}
