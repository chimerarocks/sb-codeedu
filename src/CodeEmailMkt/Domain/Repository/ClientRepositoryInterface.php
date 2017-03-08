<?php

namespace CodeEmailMkt\Domain\Repository;


interface ClientRepositoryInterface
{
    public function findByTags(array $tags): array;
}