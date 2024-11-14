<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsPhotosModel extends Model
{
    use HasFactory;

    protected $table = 'er_photoscars';
	protected $primaryKey = 'ID';

    protected $fillable = [
	    'CategoryID',
		'ImageName',	
		'SitePachImage',	
		'FullPachImage',
		'Extention'	
    ];

}