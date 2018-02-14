<?php namespace Bantenprov\JPTingkatPendidikan\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\JPTingkatPendidikan\Facades\JPTingkatPendidikan;

/* Models */
use Bantenprov\JPTingkatPendidikan\Models\Bantenprov\JPTingkatPendidikan\JPTingkatPendidikan as JPTingkatPendidikanModel;
use Bantenprov\JPTingkatPendidikan\Models\Bantenprov\JPTingkatPendidikan\Province;
use Bantenprov\JPTingkatPendidikan\Models\Bantenprov\JPTingkatPendidikan\Regency;

/* etc */
use Validator;

/**
 * The JPTingkatPendidikanController class.
 *
 * @package Bantenprov\JPTingkatPendidikan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPTingkatPendidikanController extends Controller
{

    protected $province;

    protected $regency;

    protected $jumlah_penduduk_tingkat_pendidikan;

    public function __construct(Regency $regency, Province $province, JPTingkatPendidikanModel $jumlah_penduduk_tingkat_pendidikan)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->jumlah_penduduk_tingkat_pendidikan     = $jumlah_penduduk_tingkat_pendidikan;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $jumlah_penduduk_tingkat_pendidikan = $this->jumlah_penduduk_tingkat_pendidikan->find($id);

        return response()->json([
            'negara'    => $jumlah_penduduk_tingkat_pendidikan->negara,
            'province'  => $jumlah_penduduk_tingkat_pendidikan->getProvince->name,
            'regencies' => $jumlah_penduduk_tingkat_pendidikan->getRegency->name,
            'tahun'     => $jumlah_penduduk_tingkat_pendidikan->tahun,
            'data'      => $jumlah_penduduk_tingkat_pendidikan->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->jumlah_penduduk_tingkat_pendidikan->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->jumlah_penduduk_tingkat_pendidikan->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'Jumlah Penduduk '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

