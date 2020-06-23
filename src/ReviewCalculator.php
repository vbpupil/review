<?php
/**
 * ReviewCalculator.php Class
 *
 * @author    Dean Haines
 * @copyright: Dean Haines, 02/02/19, UK
 * @license: GPL V3.0+ See LICENSE.md
 */

namespace vbpupil\Review;


use vbpupil\Collection\Collection;

/**
 * Class ReviewCalculator
 * @package Review
 */
class ReviewCalculator
{

    /**
     * @var array
     */
    protected $result = [];


    /**
     * sets/resets the default
     */
    protected function setDefaults(): void
    {
        $this->result['count'] = 0;
        $this->result['worst'] = [];
        $this->result['best'] = [];
        $this->result['score'] = 0;
    }

    /**
     * @param Collection $items
     * @return array
     */
    public function calculate(Collection $items): array
    {

        $this->setDefaults();

        $tmpScore1 = 0;
        $tmpScore2 = 0;

        /*LOOP THROUGH ALL ITEMS IN THE COLLECTION AND BUILD UP A TALLY AS WELL AS ESTABLISHING BEST/WORST*/
        foreach ($items->getItems() as $item) {
            $this->result['count']++;

            if (empty($this->result['worst']) || $this->result['worst']->getRating() > $item->getRating()) {
                $this->result['worst'] = $item;
            }

            if (empty($this->result['best']) || $this->result['best']->getRAting() < $item->getRating()) {
                $this->result['best'] = $item;
            }


            $this->result['tally'][$item->getRating()]++;
        }


        /*NOW LOOP TALLY AND START BUILDING UP SCORE*/
        foreach ($this->result['tally'] as $k => $v) {
            $tmpScore1 += ($k * $v);
            $tmpScore2 += ($v);
        }

        ksort($this->result['tally']);


        /*NOW WORKOUT THE FINAL SCORE*/
        $this->result['score'] = round($tmpScore1 / $tmpScore2, 1);

        return $this->result;
    }

    /**
     * @return Review
     */
    public function getBest(): Review
    {
        return $this->result['best'];
    }

    /**
     * @return Review
     */
    public function getWorst(): Review
    {
        return $this->result['worst'];
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->result['count'];
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->result['score'];
    }
}
