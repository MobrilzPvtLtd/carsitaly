<?php

namespace Modules\CarRental\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarRental extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'carrentals';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\CarRental\database\factories\CarRentalFactory::new();
    }
}
