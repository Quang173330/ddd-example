<?php

namespace Shiring\Application\Post\Service;


use Shiring\Application\Post\Repository\PostRepositoryInterface;
use Shiring\Domain\Post\Repository\PostRepositoryInterface as DomainPostRepositoryInterface;

use Shiring\Domain\Post\Entity\Post;

class PostService
{
    /**
     * @param PostRepositoryInterface $postRepository
     * @param DomainPostRepositoryInterface $domainPostRepository
     */
    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
        private readonly DomainPostRepositoryInterface $domainPostRepository
    ) {
    }

    /**
     * @param int $id
     * @return Post
     */
    public function show(int $id): Post
    {
        return $this->domainPostRepository->getById($id);
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->postRepository->getList();
    }
}
