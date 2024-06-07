<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatTidakLayak extends Model
{
    use HasFactory;

    protected $fillable = [
        'obat_id',
        'keterangan_tidak_layak',
        'jumlah',
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
