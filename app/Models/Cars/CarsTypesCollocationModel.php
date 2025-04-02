<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsTypesCollocationModel extends Model
{
    use HasFactory;

    protected $table = 'er_cartypes_car_collocation';
	protected $primaryKey = 'ID';

    protected $fillable = [
        'CarID',
        'CarType'
    ];

}