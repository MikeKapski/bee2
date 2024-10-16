<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsModel extends Model
{
    use HasFactory;

    protected $table = 'er_cars';
	protected $primaryKey = 'ID';

    protected $fillable = [
        'ComputedName',
        'carplate', 
        'vin',
        'BrandID',
        'ModelID',
        'GenerationID',
        'year',
        'description',
        'CarCode',
        'CarCost',
        'CarDeposit',
        'start_at',
        'start_km',
        'now_km',
        'AvatarImage',
        'car_status_id'
    ];

    //свзязываем с таблицей статусов
    /*public function car_statuses() {
        return $this->hasOne('App\Models\Cars\CarStatusesModel', 'ID', 'car_status_id');
    }*/


}