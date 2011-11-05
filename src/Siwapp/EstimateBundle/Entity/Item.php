<?php

namespace Siwapp\EstimateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Siwapp\CoreBundle\Entity\CoreItem;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Siwapp\EstimateBundle\Entity\Item
 *
 * @ORM\Entity
 * @ORM\Table(indexes={
 *    @ORM\index(name="desc_idx", columns={"description"})
 * }, name="EstimateItem")
 */
class Item extends CoreItem
{
  /**
   * @ORM\ManyToOne(targetEntity="Estimate", inversedBy="items")
   *
   */
  private $estimate;


    /**
     * Set invoice
     *
     * @param Siwapp\EstimateBundle\Entity\Estimate $estimate
     */
    public function setEstimate(\Siwapp\EstimateBundle\Entity\Estimate $estimate)
    {
        $this->estimate = $estimate;
    }

    /**
     * Get invoice
     *
     * @return Siwapp\EstimateBundle\Entity\Estimate
     */
    public function getEstimate()
    {
        return $this->estimate;
    }
}