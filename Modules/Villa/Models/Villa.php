<?php

namespace Modules\Villa\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Villa extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'villas';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Villa\database\factories\VillaFactory::new();
    }
}
