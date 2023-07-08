<?php

namespace App\Http\Controllers;

use App\Models\PenempatanKelas;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenempatanKelasController extends Controller
{
    use Response;

    public function index()
    {
        $data = PenempatanKelas::all();
        return $this->success($data, "");
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = PenempatanKelas::create($request->all());

            DB::commit();

            return $this->success($data, "");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error($th->getMessage());
            //throw $th;
        }
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = PenempatanKelas::update(
                $request->all()
            );
            DB::commit();

            return $this->success($data, "");
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $data = PenempatanKelas::find($id)->delete();
            DB::commit();
            return $this->success($data, "Data Berhasil dihapus");
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }
}
