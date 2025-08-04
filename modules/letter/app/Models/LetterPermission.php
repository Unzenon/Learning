<?php

namespace Venture\Letter\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class LetterPermission extends SpatiePermission
{
    protected $table = 'permissions';
}
