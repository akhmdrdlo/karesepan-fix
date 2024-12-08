<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\resep_makanan;
use App\Models\kategori;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resep = resep_makanan::all();
        return view('admin/tables', compact('resep'));
    }

    /**
     * Show the form for creating a new resource.
     */

     public function pressLike(Request $request)
     {
         $post = resep_makanan::find($request->resep_id);
         if($post->likes->contains('user_id',auth()->id())){
 
             $post->likes()->where('user_id',auth()->id())->delete();
         }else{
             $post->likes()->create(['user_id'=>auth()->id()]);
         }
         $count = $post->likes()->count();
         $pusherData['resep_id'] = $post->id;
         $pusherData['count'] = $count;
         $this->push('likes',$pusherData);
         return response()->json(['likes'=>$count]);
     }

    public function create()
    {
        $kategori = kategori::all();
        $resep = resep_makanan::all();
        return view('admin/tambah_resep', compact('kategori','resep'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_makanan' => 'required',
            'kat_id' => 'required',
            'deskripsi' => 'required',
            'resep' => 'required',
            'cara_buat' => 'required',
        ]);
        $cekResep = resep_makanan::where(Str::upper('nama_makanan'), Str::upper($request->nama_makanan))->first();
        if($cekResep){
            return redirect('/resep')->with('danger', 'Resep makanan sudah ada, Silahkan gunakan Search dan edit resep dengan nama yang sama!!');
        }else if(!$cekResep){
            $resep = new resep_makanan;
            $resep->user_id = Auth::user()->id;
            $resep->nama_makanan = $request->input('nama_makanan');
            $resep->kat_id = $request->input('kat_id');
            $resep->deskripsi = $request->input('deskripsi');
            $resep->resep = $request->input('resep');
            $resep->cara_buat = $request->input('cara_buat');
            if ($request->hasFile('link_gambar')) {
                $image = $request->file('link_gambar');
                $imageName = $request->input('nama_makanan').time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/resep'), $imageName);
                $resep->link_gambar = 'images/resep/' . $imageName;
                $resep->save();
            }else{
                $resep->save();
            }  
        
            return redirect('/resep')->with('success', 'Data resep berhasil ditambahkan!!');
        }
    }

    public function storeKat(Request $request){
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
        ]);
        $Kategori = new kategori;
        $Kategori->nama_kategori = $request->input('nama_kategori');
        $Kategori->save();

        return redirect('/resep')->with('primary', 'Kategori berhasil ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $resep = resep_makanan::findOrFail($id);
        $resepJoin = resep_makanan::where('resep_makanan.id', $resep->id)
        ->join('users','users.id','=','resep_makanan.user_id')
        ->get(['users.name','resep_makanan.nama_makanan','resep_makanan.deskripsi','resep_makanan.resep','resep_makanan.cara_buat','resep_makanan.link_gambar']);
        return view ('admin/detail_resep', compact('resep','resepJoin'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $resep = resep_makanan::findOrFail($id);
        $resepJoin = resep_makanan::where('resep_makanan.id', $resep->id)
        ->join('users','users.id','=','resep_makanan.user_id')
        ->get(['users.name','resep_makanan.nama_makanan','resep_makanan.deskripsi','resep_makanan.resep','resep_makanan.cara_buat','resep_makanan.link_gambar']);
        return view ('admin/edit_resep', compact('resep','resepJoin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $resep = resep_makanan::findOrFail($id);
            $resep->nama_makanan = $request->nama_makanan;
            $resep->kat_id = $request->kat_id;
            $resep->deskripsi = $request->deskripsi;
            $resep->resep = $request->resep;
            $resep->cara_buat = $request->cara_buat;
            if ($request->hasFile('link_gambar')) {
                $image = $request->file('link_gambar');
                $imageName = $request->input('nama_makanan').time(). '.'. $image->getClientOriginalExtension();
                $image->move(public_path('images/resep'), $imageName);
                $resep->link_gambar = 'images/resep/'. $imageName;
            }
            $resep->save();

            return redirect('/resep')->with('success', 'Data resep berhasil diubah!!');
        }
        catch(\Exception $e){
            return redirect('/resep')->with('danger', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(string $id)
    {
        $resep = resep_makanan::findOrFail($id)->delete();
        return redirect('/resep')->with('danger', 'Data resep berhasil dihapus!!');
    }
}
