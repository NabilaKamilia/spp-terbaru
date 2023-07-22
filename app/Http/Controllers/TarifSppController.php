<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use App\Http\Requests\TarifSppRequest;
use App\Models\TarifSpp;
use App\Traits\Response;
use Illuminate\Support\Facades\DB;

class TarifSppController extends Controller
{
    use Response;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = TarifSpp::where([
            ['bulan', '!=', null], //ketika form search kosong, maka request akan null. Ambil semua data di database
            [function ($query) use ($request) {
                if (($keyword = $request->keyword)) {
                    $query->orWhere('bulan', 'LIKE', '%' . $keyword . '%')->get(); //ketika form search terisi, request tidak null. Ambil data sesuai keyword
                }
            }]
        ])
            ->orderBy('id', 'asc')->paginate(12);
        return view('pages.admin.tarif_spp.index', compact('items'))->with('i', (request()->input('page', 1) - 1) * 5);

        $paginate = TarifSpp::orderBy('id', 'asc')->paginate(3);
        return view('pages.admin.tarif_spp.index', ['paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarifspp = TarifSpp::all();

        return view('pages.admin.tarif_spp.create', [
            'tarifspp' => $tarifspp
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();

            $spp = TarifSpp::create($data);

            $siswa = DB::table('siswa')->where('status', 'aktif')->get();
            foreach ($siswa as $key => $value) {
                $tr = new TransaksiController();
                $payload= [
                    "tarif_spp_id" => $spp->id,
                    "nisn" => $value->nisn,
                ];
                $tr->storeTr($payload);
                // dd($tr);
            }
            DB::commit();
            return redirect()->route('tarifspp.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
            return redirect()->route('tarifspp.index');
        }
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
        $item = TarifSpp::all()->find($id);

        return view('pages.admin.tarif_spp.edit', [
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
    public function update(TarifSppRequest $request, $id)
    {
        $data = $request->all();
        // $data['image'] = $request->file('image')->store(
        //     'assets/gallery', 'public'
        // );

        $item = TarifSpp::all()->find($id);

        $item->update($data);

        return redirect()->route('tarifspp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function indexApi()
    {
        $items = TarifSpp::all();

        return $this->success($items, 'Data Berhasil Diambil');
    }

    public function storeApi(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();

            $test = TarifSpp::create($data);

            DB::commit();
            return $this->success($test, 'Data Berhasil Disimpan', 201);
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th->getCode());
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }
}
