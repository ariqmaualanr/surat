<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anak;
use Validator;
use App\Telepon;
use App\Bidan;
use Storage;

class AnakController extends Controller
{
	public function index(){
        $halaman = 'anak';
        $anak_list = Anak::orderBy('nama_anak', 'asc')->paginate(5);
        $jumlah_anak = Anak::count();
        return view('anak.index',compact('anak_list','jumlah_anak'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'kms' => 'required|string|size:4|unique:anak,kms,',
            'nama_anak'=> 'required|string|max:30',
            'tanggal_lahir'=>'required|date',
            'jenis_kelamin'=>'required|in:L,P',
            'nomor_telepon'=>'sometimes|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon',
            'nama_ibu'=> 'required|string|max:30',
            'id_bidan' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('anak/create')
                    ->withInput()
                    ->withErrors($validator);

        }

        //Foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $ext  = $foto->getClientOriginalExtension();
            if ($request->file('foto')->isValid) {
                $foto_name = date('YmdHis'). ".$ext";
                $upload_path = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                $input['foto'] = $foto_name;
            }
        };


        $anak = Anak::create($input);

        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $anak->telepon()->save($telepon);

        return redirect('anak');
    }

    public function show($id){
            $halaman = 'anak';
            $anak = Anak::findOrFail($id);
            return view('anak.show',compact('halaman','anak'));

    }
   
	public function create(){
        $list_bidan = Bidan::pluck('nama_bidan', 'id');
        return view('anak.create', compact('list_bidan'));
    }

    public function update($id, Request $request){
        $anak = Anak::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'kms' => 'required|string|size:4|unique:anak,kms,'. $request->input('id'),
            'nama_anak'=> 'required|string|max:30',
            'tanggal_lahir'=>'required|date',
            'jenis_kelamin'=>'required|in:L,P',
            'nomor_telepon' => 'sometimes|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon,'
            . $request->input('id') . ',id_anak',
            'nama_ibu'=> 'required|string|max:30',
            'id_kelas'=> 'bidan',
        ]);

        if ($validator-> fails()) {
            return redirect('anak/'. $id. '/edit')
                ->withInput()
                ->withErrors($validator);
    }

    // Jika user mengisi foto.
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada foto baru.
            $exist = Storage::disk('foto')->exists($anak->foto);
            if (isset($anak->foto) && $exist) {
                $delete = Storage::disk('foto')->delete($anak->foto);
            }

            // Upload foto baru.
            $foto = $request->file('foto');
            $ext  = $foto->getClientOriginalExtension();
            if ($request->file('foto')->isValid()) {
                $foto_name   = date('YmdHis'). ".$ext";
                $upload_path = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                return $foto_name;
            }
        }



        $anak->update($request->all());

        // Update nomor telepon, jika sebelumnya sudah ada no telp.
        if ($anak->telepon) {
            // Jika telp diisi,update.
            if ($request->filled('nomor_telepon')) {
                $telepon = $anak->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $anak->Telepon()->save($telepon);
            }
            // Jika telp tidak di isi, hapus.
            else {
                $anak->telepon()->delete();
            }
        }
        // Buat entry baru, jika sebelumnya tidak ada no telp.
        else {
            if ($request->filled('nomor_telepon')) {
                $telepon = new Telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $anak->telepon()->save($telepon);

                }
                 return view('anak.edit', compact('anak','list_bidan'));
        }
           
                }
    public function edit($id){
            $anak = Anak::findOrFail($id);
            $list_bidan = Bidan::pluck('nama_bidan', 'id');
            

            if (!empty($anak->telepon->nomor_telepon)) {
                $anak->nomor_telepon = $anak->telepon->nomor_telepon;
            }

            return view('anak.edit',compact('anak', 'list_bidan'));
    }

    public function destroy($id) {
        $anak = Anak::findOrFail($id);

        $exist = Storage::disk('foto')->exist($anak->foto);
        if (isset($anak->foto) && $exist) {
            $delete = Storage::disk('foto')->delete($anak->foto);
        }
        $anak -> delete();
        return redirect('anak');
    }

    public function datemutator(){
        $anak = Anak::findOrFail(21);
        $nama = $anak->nama_anak;
        $tanggal_lahir = $anak->tanggal_lahir->format('d-m-Y');
        
    }
}