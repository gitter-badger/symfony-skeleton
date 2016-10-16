<?php

namespace ApiBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait Timestampable
{
    /**
     * Created date
     *
     * @var \DateTime
     *
     * @ORM\Column(name="create_at", type="datetime")
     */
    protected $createdAt;

    /**
     * Updated date
     *
     * @var \DateTime
     *
     * @ORM\Column(name="update_at", type="datetime")
     */
    protected $updatedAt;

    /**
     * @param \Datetime $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param  \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return \Datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Método que se ejecutará cuando se actualiza el objeto (hay que mapear el evento)
     */
    public function doOnPreUpdate()
    {
        $this->setUpdatedAt(new \DateTime('now'));
    }

    /**
     * Método que se ejecutará cuando se crea el objeto (hay que mapear el evento)
     */
    public function doOnPrePersist()
    {
        $this->setUpdatedAt(new \DateTime('now'));
        $this->setCreatedAt(new \DateTime('now'));
    }
}