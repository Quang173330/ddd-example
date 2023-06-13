<?php

namespace Shiring\Domain\Post\Entity;

use Shiring\Domain\Post\Enum\PostStatus;
use Shiring\Domain\Post\ValueObject\PostContent;
use Shiring\Domain\Post\ValueObject\PostTitle;

final class Post
{
    private int $id;

    /**
     * @param PostTitle $title
     * @param PostContent $content
     * @param PostStatus $status
     */
    public function __construct(
        private PostTitle   $title,
        private PostContent $content,
        private PostStatus  $status,
    )
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return PostTitle
     */
    public function getTitle(): PostTitle
    {
        return $this->title;
    }

    /**
     * @param PostTitle $title
     */
    public function setTitle(PostTitle $title): void
    {
        $this->title = $title;
    }

    /**
     * @return PostStatus
     */
    public function getStatus(): PostStatus
    {
        return $this->status;
    }

    /**
     * @param PostStatus $status
     */
    public function setStatus(PostStatus $status): void
    {
        $this->status = $status;
    }

    /**
     * @return PostContent
     */
    public function getContent(): PostContent
    {
        return $this->content;
    }

    /**
     * @param PostContent $content
     */
    public function setContent(PostContent $content): void
    {
        $this->content = $content;
    }
}
