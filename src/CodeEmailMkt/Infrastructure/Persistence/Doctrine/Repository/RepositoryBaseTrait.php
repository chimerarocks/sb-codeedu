<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\UnitOfWork;

trait RepositoryBaseTrait
{
    public function create($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function update($entity)
    {
        if ($this->getEntityManager()->getUnitOfWork()->getEntityState($entity) != UnitOfWork::STATE_MANAGED) {
            $this->getEntityManager()->merge($entity);
        }
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function remove($entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    public function find($id)
    {
        return parent::find($id);
    }

    public function findAll()
    {
        return parent::findAll();
    }
}