<?php

namespace Modules\Tour\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tours';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Tour\database\factories\TourFactory::new();
    }
}
