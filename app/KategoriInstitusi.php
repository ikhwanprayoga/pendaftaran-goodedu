<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriInstitusi extends Model
{
    protected $table = 'kategori_institusis';
    protected $primaryKey = 'id';
    protected $fillable = ['nama'];
    protected $timesstamps = true;
}
