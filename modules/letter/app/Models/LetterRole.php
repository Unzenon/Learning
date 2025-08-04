<?php

namespace Venture\Letter\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class LetterRole extends SpatieRole
{
    protected $table = 'roles'; // pakai tabel default dari spatie
}
