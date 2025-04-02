<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsTypesModel extends Model
{
    use HasFactory;

    protected $table = 'er_cartypes';
	protected $primaryKey = 'ID';

    protected $fillable = [
        'TypeName',
        'Orders'
    ];

    //свзязываем с таблицей статусов
    /*public function car_statuses() {
        return $this->hasOne('App\Models\Cars\CarStatusesModel', 'ID', 'car_status_id');
    }*/

}