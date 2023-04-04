<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        // $items = UserData::all();

        // return view('pages.admin.user_data.index',[
        //     'items' => $items,

        // ]);
        //fungsi eloquent menampilkan data menggunakan pagination        
        $items = Kelas::where([
            ['kelas', '!=', null], //ketika form search kosong, maka request akan null. Ambil semua data di database
            [function ($query) use ($request) {
                if (($keyword = $request->keyword)) {
                    $query->orWhere('kelas', 'LIKE', '%' . $keyword . '%')->get(); //ketika form search terisi, request tidak null. Ambil data sesuai keyword
                }
            }]
        ])
            ->orderBy('id', 'asc')->paginate(10);
        return view('pages.admin.kelas.index', compact('items'))->with('i', (request()->input('page', 1) - 1) * 5);

        $paginate = Kelas::orderBy('id', 'asc')->paginate(3);
        return view('pages.admin.kelas.index', ['paginate' => $paginate]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('pages.admin.kelas.create', [
            'kelas' => $kelas
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelasRequest $request)
    {
        $data = $request->all();

        Kelas::create($data);

        return redirect()->route('kelas.index');
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
        $item = Kelas::all()->find($id);

        return view('pages.admin.kelas.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KelasRequest $request, $id)
    {
        $data = $request->all();

        $item = Kelas::find($id);

        $item->kelas = $request->kelas;

        $item->update();

        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kelas::all()->find($id);
        $item->delete();

        return redirect()->route('kelas.index');
    }
}
