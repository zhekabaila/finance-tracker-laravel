<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'transaksi';

    protected $keyType = 'string';

    protected $guarded = [
        'id'
    ];
    
    protected $fillable = [
        'jumlah',
        'keterangan',
        'jenis',
        'user_id'
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
