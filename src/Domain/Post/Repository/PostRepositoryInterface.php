<?php

namespace Shiring\Domain\Post\Repository;

use Shiring\Domain\Post\Entity\Post;

interface PostRepositoryInterface
{
    /**
     * @param Post $post
     * @return Post
     */
    public function save(Post $post): Post;

    /**
     * @param  Post  $post
     * @return void
     */
    public function update(Post $post): void;

    /**
     * @param  int  $id
     * @return  Post
     */
    public function getById(int $id): Post;

    /**
     * @param  Post  $post
     * @return  void
     */
    public function delete(Post $post): void;
}
