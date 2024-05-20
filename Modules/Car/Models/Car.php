<?php

namespace Modules\Car\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cars';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Car\database\factories\CarFactory::new();
    }
}
