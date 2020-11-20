<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterInstitusi extends Model
{
    protected $table = 'master_institusis';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'kategori_institusi_id'];
    protected $timesstamps = true;

    public function kategori_institusi()
    {
        return $this->belongsTo('App\KategoriInstitusi');
    }
}
