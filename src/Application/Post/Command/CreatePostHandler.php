<?php

namespace Shiring\Application\Post\Command;

use Shiring\Domain\Post\Entity\Post;
use Shiring\Domain\Post\Enum\PostStatus;
use Shiring\Domain\Post\Repository\PostRepositoryInterface;
use Shiring\Domain\Post\ValueObject\PostContent;
use Shiring\Domain\Post\ValueObject\PostTitle;

class CreatePostHandler
{
    /**
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }

    /**
     * @param CreatePostCommand $command
     * @return Post
     */
    public function handle(CreatePostCommand $command): Post
    {
        $post = new Post(
            new PostTitle($command->title),
            new PostContent($command->content),
            PostStatus::from($command->status)
        );

        return $this->postRepository->save($post);
    }
}
