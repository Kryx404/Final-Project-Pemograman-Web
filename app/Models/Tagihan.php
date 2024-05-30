<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tagihan
 *
 * Model untuk tagihan pembayaran
 */
class Tagihan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'pembayaran_id',
        'status',
    ];

    /**
     * The attributes that are guarded.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The events to listen for.
     *
     * @var array
     */
    // protected static function boot()
    // {
    //     parent::boot();

    //     // Set default value laporan_id if laporan_id is not set
    //     static::creating(function ($tagihan) {
    //         if ($tagihan->laporan_id === null) {
    //             $tagihan->laporan_id = $tagihan->laporan ? $tagihan->laporan->id : null;
    //         }
    //     });
    // }

    /**
     * Get the user that owns the Tagihan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the laporan that owns the Tagihan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function laporan()
    {
        return $this->hasOne(Laporan::class);
    }
}
// $namaPengguna = $pembayaran->user->nama;

