<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\UnitOfWork;

trait RepositoryBaseTrait
{
    public function create($entity)
    {
        // Torna a entidade gerenciável
        $this->getEntityManager()->persist($entity);

        $this->getEntityManager()->flush();
        return $entity;
    }

    public function update($entity)
    {
        //Testa se a entidade está gerenciada, otimiza quando a entitade for buscada anteriormente
        //com find, nesse caso a entidade já estará gerenciada
        if ($this->getEntityManager()->getUnitOfWork()->getEntityState($entity) != UnitOfWork::STATE_MANAGED) {
            //Pega algo que não está gerenciado, verifica o que existe no banco e faz a atualização
            $this->getEntityManager()->merge($entity);
        }
        //propaga a mudança
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