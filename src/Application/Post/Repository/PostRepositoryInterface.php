<?php

namespace Shiring\Application\Post\Repository;

interface PostRepositoryInterface
{
    /**
     * @return array
     */
    public function getList(): array;
}
