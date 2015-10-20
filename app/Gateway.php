<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'gateways';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name','gateway'];
}
