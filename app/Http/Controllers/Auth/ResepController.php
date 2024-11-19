<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\resep_makanan;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_makanan' => 'required|numeric',
            'deskripsi' => 'required',
            'resep' => 'required',
            'cara_buat' => 'required',
            'link_gambar' => 'required',
        ]);
        $user = user::where('username', '=', Auth::user()->username)->first()->id ?? null;

        $cekResep = resep::where(Str::upper('nama_makanan'), Str::upper($request->nama_makanan))->first();
        if($cekResep){
            return redirect('/resep')->with('danger', 'Resep makanan sudah ada, Silahkan gunakan Search dan edit resep dengan nama yang sama!!');
        }else if(!$cekResep){
            $resep = new resep;
            $resep->user_id = $user;
            $resep->nama_makanan = $request->input('nama_makanan');
            $resep->deskripsi = $request->input('deskripsi');
            $resep->resep = $request->input('resep');
            $resep->cara_buat = $request->input('cara_buat');
            if ($request->hasFile('link_gambar')) {
                $image = $request->file('link_gambar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/resep'), $imageName);
                $resep->link_gambar = 'images/resep/' . $imageName;
                $resep->save();
            }else{
                $resep->save();
            }  
        
            return redirect('/resep')->with('success', 'Data resep berhasil ditambahkan!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $resep = resep_makanan::findOrFail($id);
        // $resep_makananjoin = resep_makanan::join('users', 'users.id','=','shipment.staff_id')
        // ->join('gudang', 'gudang.id','=','shipment.gdg_id')
        // ->get(['users.nama_lengkap','users.notelp','shipment.id','shipment.invoice_id','shipment.created_at','gudang.nama_gudang','gudang.alamat']);

        $shipmentDetailJoin = ShipmentDetail::where('shipor_id', $id)
        ->join('shipment','shipment.id','=','shipmentdetails.shipor_id')
        ->join('barangs', 'barangs.id', '=', 'shipmentdetails.brg_id')
        ->get(['barangs.merek','shipmentdetails.shipor_id','shipmentdetails.jumlah','shipmentdetails.penerima','shipmentdetails.notelp_penerima','shipmentdetails.alamat_kirim','shipmentdetails.status']);
        return view ('detailShipment', compact('shipment','shipmentjoin','shipmentDetailJoin'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
