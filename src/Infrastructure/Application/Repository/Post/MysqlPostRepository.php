<?php

namespace Shiring\Infrastructure\Application\Repository\Post;

use App\Models\Post as PostEloquent;
use Shiring\Application\Post\Repository\PostRepositoryInterface;
use Shiring\Infrastructure\Application\Builder\Post\PostBuilder;

class MysqlPostRepository implements PostRepositoryInterface
{
    /**
     * @param PostBuilder $builder
     */
    public function __construct(
        private readonly PostBuilder $builder,
    )
    {
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        $posts = PostEloquent::query()->get()->toArray();
        $data = [];
        foreach ($posts as $post) {
            $data[] = $this->builder->build($post);
        }

        return $data;
    }
}
