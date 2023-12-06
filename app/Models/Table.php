<?php

namespace App\Models;

use App\Enum\TableLocationEnum;
use App\Enum\TableStatus;
use App\Enum\TableStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable=['name','guest_number','status','location'];
    protected $casts=[
        'status'=>TableStatusEnum::class,
        'location'=>TableLocationEnum::class
    ];
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
