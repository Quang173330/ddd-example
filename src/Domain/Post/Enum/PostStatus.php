<?php

namespace Shiring\Domain\Post\Enum;

enum PostStatus: int
{
    case PENDING = 1;
    case APPROVED = 2;

    /**
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->value === self::APPROVED->value;
    }
}
