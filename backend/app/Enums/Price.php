<?php

namespace App\Enums;

enum Price implements \JsonSerializable
{
    case Cheap;
    case Regular;
    case Expensive;

    /**
     * @return mixed
     */
    public function jsonSerialize(): string {
        return match($this) {
            Price::Cheap => 'Cheap',
            Price::Regular => 'Regular',
            Price::Expensive => 'Expensive'
        };
    }
}
