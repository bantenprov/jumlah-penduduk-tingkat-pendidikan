<?php

namespace Bantenprov\JPTingkatPendidikan\Models\Bantenprov\JPTingkatPendidikan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JPTingkatPendidikan extends Model
{

    protected $table = 'jumlah_penduduk_tingkat_pendidikans';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\JPTingkatPendidikan\Models\Bantenprov\JPTingkatPendidikan\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\JPTingkatPendidikan\Models\Bantenprov\JPTingkatPendidikan\Regency','id','regency_id');
    }

}

