<?php

namespace Modules\Cruise\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cruise extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cruises';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Cruise\database\factories\CruiseFactory::new();
    }
}
