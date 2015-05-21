<?php

namespace LaFourchette\Manager;
use LaFourchette\Entity\Integ;
use LaFourchette\Entity\Vm;
use LaFourchette\Service\DataAccessService;

/**
 * Description of VmManager
 *
 * @author gcavana
 */
class IntegManager extends AbstractManager
{
    private $collection = array();

    public function __construct(DataAccessService $dataAccessService, $configuration, $class)
    {
        parent::__construct($dataAccessService);

        foreach ($configuration['integs'] as $i) {
            array_push($this->collection, $class::makeFromArray($i));
        }
    }

    public function hasAvailableInteg()
    {
        $vmAvailable = $this->loadAllAvailable();

        if (empty($vmAvailable)) {
            return false;
        }

        return true;
    }

    public function loadAllAvailable()
    {
        $unavailables = array_map(function ($item) {
            return $item;
        }, $this->dataAccessService->getVmsWhereStatusNotIn(Vm::$freeStatus, true));

        $available = array();
        foreach ($this->collection as $integ) {
            if (!in_array($integ->getIdInteg(), $unavailables) && $integ->getIsActived()) {
                array_push($available, $integ);
            }
        }

        return $available;
    }

    /**
     * {@inheritDoc}
     */
    public function load($id)
    {
        $res = null;
        /** @var Integ $integ */
        foreach ($this->collection as $integ) {
            if ($integ->getIdInteg() == $id) {
                $res = $integ;
                break;
            }
        }

        return $res;
    }

    /**
     * {@inheritDoc}
     */
    public function loadOneBy(array $criteria)
    {
        throw new \Exception();
    }

    /**
     * {@inheritDoc}
     */
    public function loadBy(array $criteria, array $order = null)
    {
        throw new \Exception();
    }

    /**
     * {@inheritDoc}
     */
    public function loadAll()
    {
        throw new \Exception();
    }

    /**
     * {@inheritDoc}
     */
    public function flush($entity)
    {
        throw new \Exception();
    }

    public function save($entity)
    {
        throw new \Exception();
    }
}
