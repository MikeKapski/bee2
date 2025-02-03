<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsAdvantagesCollModel extends Model
{
    use HasFactory;

    protected $table = 'er_carsadvantagecoll';
	protected $primaryKey = 'ID';

    protected $fillable = [
        'AdvantageID',
        'CarID', 
        'AdvantageValue',
        'IntValue'
    ];

    //связываем с таблицей преимуществ
    public function car_advantage() {
        return $this->hasOne('App\Models\Cars\CarsAdvantagesModel', 'ID', 'AdvantageID')->orderBy('Orders', 'asc');
    }

}