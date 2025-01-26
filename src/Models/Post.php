<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model\AbstractModel;

class Post extends AbstractModel
{
    protected string $table = 'posts';
}