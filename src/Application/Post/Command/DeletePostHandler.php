<?php

namespace Shiring\Application\Post\Command;

use Shiring\Domain\Post\Entity\Post;
use Shiring\Domain\Post\Repository\PostRepositoryInterface;

class DeletePostHandler
{
    /**
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }

    /**
     * @param DeletePostCommand $command
     * @return void
     */
    public function handle(DeletePostCommand $command): void
    {
        $post = $this->postRepository->getById($command->id);

        $this->delete($post);
    }

    /**
     * @param Post $post
     * @return void
     */
    private function delete(Post $post): void
    {
        $this->postRepository->delete($post);
    }
}
