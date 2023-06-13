<?php

namespace Shiring\Domain\Post\ValueObject;

use Webmozart\Assert\Assert;

class PostTitle
{
    public function __construct(
        private readonly string $value
    ) {
        Assert::maxLength($this->value, 100, 'The content field must not be greater than :max characters.');
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
