<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Catatan extends Model
{
  use HasFactory;

  protected $table = 'catatan';
  protected $primaryKey = 'id_catatan';
  public $timestamps = false;

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'id_user', 'id_user');
  }
}
