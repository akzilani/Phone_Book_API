<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone_Book_Detail extends Model
{
    protected $table='phone_book_details';
    protected $primaryKey='id';
    protected $keyType='int';
    public $incrementing='true';
}
