<?php

declare(strict_types=1);

namespace App;

enum IdeaStatus: string
{
    case PENDING = 'pending';
    case IN_PRORGRESS = 'in_progress';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'pending',
            self::IN_PRORGRESS => 'In Progress',
            self::COMPLETED => 'Completed'
        };
    }
}
