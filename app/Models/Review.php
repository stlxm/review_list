<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = ['review_text','review_star','isbn','user_id'];

   protected $table = 'reviews';

   //protected $dates = ['review_date'];

   protected $primaryKey = 'review_no';

   protected $foreignkey = ['isbn','user_id'];

   public $incrementing = true;
}