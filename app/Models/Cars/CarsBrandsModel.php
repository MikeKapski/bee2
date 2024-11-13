<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsBrandsModel extends Model
{
    use HasFactory;

    protected $table = 'er_carbrands';
	protected $primaryKey = 'ID';

    protected $fillable = [
        'Orders',
        'BrandName', 
        'BrandLogo'
    ];

}