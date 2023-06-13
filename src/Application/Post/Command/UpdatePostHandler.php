<?php

namespace Shiring\Application\Post\Command;

use Shiring\Domain\Post\Entity\Post;
use Shiring\Domain\Post\Enum\PostStatus;
use Shiring\Domain\Post\Repository\PostRepositoryInterface;
use Shiring\Domain\Post\ValueObject\PostContent;
use Shiring\Domain\Post\ValueObject\PostTitle;

class UpdatePostHandler
{
    /**
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }

    /**
     * @param UpdatePostCommand $command
     * @return void
     */
    public function handle(UpdatePostCommand $command): void
    {
        $post = $this->postRepository->getById($command->id);

        $this->update($post, $command);
    }

    /**
     * @param Post $post
     * @param UpdatePostCommand $command
     * @return void
     */
    private function update(Post $post, UpdatePostCommand $command): void
    {
        $post->setTitle(new PostTitle($command->title));
        $post->setContent(new PostContent($command->content));
        $post->setStatus(PostStatus::from($command->status));

        $this->postRepository->update($post);
    }
}
