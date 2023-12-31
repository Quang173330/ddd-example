<?php

namespace Shiring\Application\Post\Command;

class CreatePostCommand
{
    /**
     * @param string $title
     * @param string $content
     * @param int $status
     */
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly int $status,
    ) {
    }
}
