<?php

namespace Shiring\Infrastructure\Persistence\Mysql\Post;

use App\Models\Post as PostEloquent;
use RuntimeException;
use Shiring\Domain\Post\Entity\Post;
use Shiring\Domain\Post\Repository\PostRepositoryInterface;
use Shiring\Infrastructure\Application\Builder\Post\PostBuilder;

class MysqlPostRepository implements PostRepositoryInterface
{
    /**
     * @param  PostBuilder  $builder
     */
    public function __construct(
        private readonly PostBuilder $builder
    ) {
    }

    /**
     * @param Post $post
     * @return Post
     */
    public function save(Post $post): Post
    {
        $data = PostEloquent::query()->create([
            'title' => $post->getTitle()->getValue(),
            'content' => $post->getContent()->getValue(),
            'status' => $post->getStatus()->value,
        ]);

        $post->setId($data->id);

        return $post;

    }

    /**
     * @param Post $post
     * @return void
     */
    public function update(Post $post): void
    {
        PostEloquent::query()
            ->where('id', $post->getId())
            ->update([
                'title' => $post->getTitle()->getValue(),
                'content' => $post->getContent()->getValue(),
                'status' => $post->getStatus()->value,
            ]);
    }

    /**
     * @param int $id
     * @return Post
     */
    public function getById(int $id): Post
    {
        $data = PostEloquent::query()->where('id', $id)->first()?->toArray();

        if (is_null($data)) {
            throw new RuntimeException('Loi roi check lai di');
        }

        return $this->builder->build($data);
    }

    /**
     * @param Post $post
     * @return void
     */
    public function delete(Post $post): void
    {
        PostEloquent::query()->where('id', $post->getId())->delete();
    }
}
