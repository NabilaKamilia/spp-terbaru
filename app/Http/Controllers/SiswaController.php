<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use App\Models\Kelas;
use App\Models\PenempatanKelas;
use App\Models\Siswa;
use App\Models\User;
use App\Traits\Response;

class SiswaController extends Controller
{
    use Response;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $siswas = Siswa::whereHas('user', function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        })
            ->orderBy('nisn', 'asc')->paginate(10);
        return view('pages.admin.siswa.index', compact('siswas'))->with('i', (request()->input('page', 1) - 1) * 5);

        $siswa = Siswa::with('kelas')->get();
        $paginate = Siswa::orderBy('nisn', 'asc')->paginate(3);
        return view('pages.admin.siswa.index', ['siswas' => $siswa, 'paginate' => $paginate]);
    }

    public function indexApi(Request $request)
    {
        # code...
        $siswas = Siswa::with('user')->get();

        return $this->success($siswas, "");
    }

    public function showApi($id)
    {
        # code...
        $siswas = Siswa::with('user', 'penempatan.kelas')->where('nisn', $id)->first();

        return $this->success($siswas, "");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $kelas = Kelas::all();
        $user = User::whereDoesntHave('siswa')->get();
        return view('pages.admin.siswa.create', [
            'kelas' => $kelas,
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaRequest $request)
    {
        $data = $request->all();

        Siswa::create($data);

        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Siswa::find($id);
        $penempatan = PenempatanKelas::where('nisn', $item->nisn)->first();

        $kelas = Kelas::find($penempatan->kelas_id);

        $item["kelas"] = $kelas->kelas;
        $item["kelas_id"] = $kelas->id;

        $class = Kelas::all();
        // dd($item->nisn);
        return view('pages.admin.siswa.edit', [
            'item' => $item,
            'kelas' => $class
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);

        $item = Siswa::find($id);
        $old = PenempatanKelas::where("nisn", $item->nisn)->first();
        PenempatanKelas::where('nisn', $item->nisn)->update([
            'kelas_id' => $request->kelas ?? $old->kelas_id,
            'nisn' => $request->nisn ?? $old->nisn,
            'tahun_ajaran' => $request->tahun_ajaran ?? $old->tahun_ajaran,
        ]);

        $item->update($data);
        // dd($item);

        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Siswa::all()->find($id);
        $item->delete();

        return redirect()->route('siswa.index');
    }
}
