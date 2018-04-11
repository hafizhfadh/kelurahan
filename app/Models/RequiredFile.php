<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequiredFile extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'required_files';

  protected $fillable = ['name'];
}
