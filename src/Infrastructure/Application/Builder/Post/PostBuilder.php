<?php

namespace Shiring\Infrastructure\Application\Builder\Post;

use Shiring\Domain\Post\Entity\Post;
use Shiring\Domain\Post\Enum\PostStatus;
use Shiring\Domain\Post\ValueObject\PostContent;
use Shiring\Domain\Post\ValueObject\PostTitle;

class PostBuilder
{
    /**
     * @param  array  $data
     * @return Post
     */
    public function build(array $data): Post
    {
        $post = new Post(
            new PostTitle($data['title']),
            new PostContent($data['content']),
            PostStatus::from($data['status']),
        );

        $post->setId($data['id']);

        return $post;
    }
}
