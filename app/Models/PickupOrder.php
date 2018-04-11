<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PickupOrder extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'pickup_orders';

  public function users()
  {
    return $this->belongsTo('App\User');
  }
}
