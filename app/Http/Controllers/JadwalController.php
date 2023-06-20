<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Positions;
use App\Models\Detail;
use App\Models\JadwalDetail;
use Illuminate\Http\Request;
use App\Charts\RakLineChart;

class JadwalController extends Controller
{
    public function index()
    {
        $title = "Data Jadwal";
        $jadwals = Jadwal::orderBy('id', 'asc')->paginate(5);
        return view('jadwals.index', compact(['jadwals', 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Jadwal";
        $managers = User::where('Positions', '1')->orderBy('id', 'asc')->get();
        return view('jadwals.create', compact('title', 'managers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_boking' => 'required'
        ]);

        $jadwal = [
            'no_boking' => $request->no_boking,
            'tribun' => $request->tribun,
            'kelas' => $request->kelas,
            'tanggal' => $request->tanggal,
        ];
        if ($result = Jadwal ::create($jadwal)) {
            for ($i = 1; $i <= $request->jml; $i++) {
                $details = [
                    'no_boking' => $request->no_boking,
                    'id_penonton' => $request['id_penonton' . $i],
                    'jumlah' => $request['jumlah' . $i],
                    'sub_total' => $request['sub_total' . $i],
                ];
                JadwalDetail::create($details);
            }
        }
        return redirect()->route('jadwals.index')->with('success', 'Position has been created successfully.');
    }

    public function show(Jadwal $jadwal)
    {
        return view('jadwals.show', compact('Departement'));
    }

    public function edit(Jadwal $jadwal)
    {
        $title = "Edit Data RAK";
        $managers = User::where('positions', '1')->orderBy('id', 'asc')->get();
        $detail = Jadwal::where('no_boking', $jadwal->no_boking)->orderBy('id', 'asc')->get();
        return view('jadwals.edit', compact('jadwal', 'title', 'managers', 'detail'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $jadwal->no_boking = $request->no_boking;
        $jadwal->tribun = $request->tribun;
        $jadwal->kelas = $request->kelas;
        $jadwal->tanggal = $request->tanggal;
        
        if ($jadwal->save()) {
            JadwalDetail::where('no_boking', $jadwal->no_boking)->delete();
            
            for ($i = 1; $i <= $request->jml; $i++) {
                $detail = [
                    'no_boking' => $request->no_boking,
                    'id_penonton' => $request['id_penonton' . $i],
                    'jumlah' => $request['jumlah' . $i],
                    'sub_total' => $request['sub_total' . $i],
                ];
                
                JadwalDetail::create($detail);
            }
        }
    
        return redirect()->route('jadwals.index')->with('success', 'Departement Has Been updated successfully');
    }
    

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwals.index')->with('success', 'Departement has been deleted successfully');
    }





    public function chartLine()
    {
        $api = url(route('jadwals.chartLineAjax'));

        $chart = new JadwalLineChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($api);
        $title = "Chart Ajax";
        return view('home', compact('chart', 'title'));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function chartLineAjax(Request $request)
    {
        $year = $request->has('year') ? $request->year : date('Y');
        $raks = Jadwal::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('tanggal', $year)
            ->groupBy(\DB::raw("Month(tanggal)"))
            ->pluck('count');

        $chart = new JadwalLineChart;

        $chart->dataset('New RAK Register Chart', 'bar', $raks)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        return $chart->api();
    }
}
