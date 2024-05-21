<?php

namespace Modules\Hotel\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'hotels';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Hotel\database\factories\HotelFactory::new();
    }
}
