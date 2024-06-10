<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tagihan;
use App\Models\User;


class Laporan extends Model
{
    use HasFactory;

protected $fillable = [
'tagihan_id',
    'tanggal',
];

protected $guarded = ['id'];

// untuk menghubungkan ke database tagihan
public function Tagihan()
{
    return $this->belongsTo(Tagihan::class);
}

// untuk menghubungkan ke database user
public function User()
{
    return $this->belongsTo(User::class);
}

}
