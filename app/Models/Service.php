<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'services';

  protected $fillable = ['service_name'];

  public function details()
  {
    return $this->hasOne('App\Models\ServiceDetail');
  }
}
