<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;

    protected $fillable=['name','image', 'description'];

    public function menus(){
        return $this->belongsToMany(Menu::class,'catagory_menu');
    }
}
