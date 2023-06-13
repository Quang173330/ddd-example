<?php

namespace Shiring\Application\Post\Command;

class DeletePostCommand
{
    /**
     * @param int $id
     */
    public function __construct(
        public readonly int $id,
    ) {
    }
}
