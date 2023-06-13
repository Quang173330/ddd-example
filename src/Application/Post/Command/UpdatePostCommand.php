<?php

namespace Shiring\Application\Post\Command;

class UpdatePostCommand
{
    /**
     * @param int $id
     * @param string $title
     * @param string $content
     * @param int $status
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly string $content,
        public readonly int $status,
    ) {
    }
}
