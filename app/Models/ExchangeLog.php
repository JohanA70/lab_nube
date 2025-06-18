<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExchangeLog extends Model
{
    use HasFactory;

    protected $table = 'exchange_logs';

    protected $fillable = ['user_id', 'consulted_at'];

    public $timestamps = false; // usamos 'consulted_at', no created_at/updated_at

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
