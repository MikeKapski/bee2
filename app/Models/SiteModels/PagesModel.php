<?php

namespace App\Models\SiteModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesModel extends Model
{
    use HasFactory;

    protected $table = 'er_pages';
	protected $primaryKey = 'ID';

    protected $fillable = [
        'Name',
        'URL', 
        'ParentID',
        'PageID'
    ];

    //свзязываем с таблицей статусов
    /*public function car_statuses() {
        return $this->hasOne('App\Models\Cars\CarStatusesModel', 'ID', 'car_status_id');
    }*/


}