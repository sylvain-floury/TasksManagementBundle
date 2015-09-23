<?php

namespace Flosy\Bundle\TasksManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Task
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Flosy\Bundle\TasksManagementBundle\Entity\TaskRepository")
 */
class Task
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

    /**
     * @var integer
     *
     * @ORM\Column(name="priority", type="integer")
     */
    private $priority;
    
    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="tasks")
     * @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @ORM\ManyToMany(targetEntity="Task", mappedBy="predecessors")
     **/
    private $successors;

    /**
     * @ORM\ManyToMany(targetEntity="Task", inversedBy="successors")
     * @ORM\JoinTable(name="tasks_successors",
     *      joinColumns={@ORM\JoinColumn(name="task_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="task_successor_id", referencedColumnName="id")}
     *      )
     **/
    private $predecessors;
    
    public function __construct() {
        $this->successors = new ArrayCollection();
        $this->predecessors = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Task
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Task
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Task
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Task
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return Task
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }
    

    /**
     * Add successor
     *
     * @param \Flosy\Bundle\TasksManagementBundle\Entity\Task $successor
     *
     * @return Task
     */
    public function addSuccessor(\Flosy\Bundle\TasksManagementBundle\Entity\Task $successor)
    {
        $this->successors[] = $successor;

        return $this;
    }

    /**
     * Remove successor
     *
     * @param \Flosy\Bundle\TasksManagementBundle\Entity\Task $successor
     */
    public function removeSuccessor(\Flosy\Bundle\TasksManagementBundle\Entity\Task $successor)
    {
        $this->successors->removeElement($successor);
    }

    /**
     * Get successors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSuccessors()
    {
        return $this->successors;
    }

    /**
     * Add predecessor
     *
     * @param \Flosy\Bundle\TasksManagementBundle\Entity\Task $predecessor
     *
     * @return Task
     */
    public function addPredecessor(\Flosy\Bundle\TasksManagementBundle\Entity\Task $predecessor)
    {
        $this->predecessors[] = $predecessor;

        return $this;
    }

    /**
     * Remove predecessor
     *
     * @param \Flosy\Bundle\TasksManagementBundle\Entity\Task $predecessor
     */
    public function removePredecessor(\Flosy\Bundle\TasksManagementBundle\Entity\Task $predecessor)
    {
        $this->predecessors->removeElement($predecessor);
    }

    /**
     * Get predecessors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPredecessors()
    {
        return $this->predecessors;
    }
    
    public function __toString() {
        return $this->name;
    }


    /**
     * Set project
     *
     * @param \Flosy\Bundle\TasksManagementBundle\Entity\Project $project
     *
     * @return Task
     */
    public function setProject(\Flosy\Bundle\TasksManagementBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \Flosy\Bundle\TasksManagementBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }
}
