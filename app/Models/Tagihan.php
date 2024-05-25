<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tagihan;
use App\Models\User;


class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pembayaran_id',
        'status',
    ];


    protected $guarded = ['id'];


    public function User()
    {
        return $this->belongsTo(User::class);
    }


    public function Laporan()
    {
        return $this->hasOne(Laporan::class);
    }
}

// Kemudian untuk mengambil nama pengguna dari pembayaran
// $pembayaran = Pembayaran::find($id);
// $namaPengguna = $pembayaran->user->nama;
