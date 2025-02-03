<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsAdvantagesModel extends Model
{
    use HasFactory;

    protected $table = 'er_carsadvantage';
	protected $primaryKey = 'ID';

    protected $fillable = [
        'Name',
        'GroupID', 
        'Orders',
        'Price_1',
        'Price_2',
        'Price_3',
        'Price_4'
    ];

}