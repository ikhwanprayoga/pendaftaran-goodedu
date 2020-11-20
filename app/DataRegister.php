<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataRegister extends Model
{
    protected $table = 'data_registers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_hp',
        'email',
        'alamat',
        'master_institusi_id',
        'kategori_pendaftar_id',
    ];
    protected $timesstamps = true;

    public function kategori_pendaftar()
    {
        return $this->belongsTo('App\KategoriPendaftar');
    }

    public function institusi()
    {
        return $this->belongsTo('App\MasterInstitusi');
    }
}
