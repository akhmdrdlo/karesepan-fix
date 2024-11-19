<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'poto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validation for image upload
        ]);

            
        $ifDuplicate = $request->input('username');
        $user = User::where('username', $ifDuplicate)->first();
        if($user){
            return redirect('/')->with('danger', 'Akun '.$request->input('username').' sudah terpakai!! Coba username yang lain!!');
        }else{
            $user = new User;
            $user->username = $ifDuplicate;
            $user->password = bcrypt($request->input('password'));
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            // Handle image upload
            if ($request->hasFile('poto')) {
                $image = $request->file('poto');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/profiles'), $imageName);
                $user->poto = 'images/profiles/' . $imageName;
                $user->save();
            }else{
                $user->save();
            }          
            return redirect('../')->with('success', 'Akun '.$request->input('name').' berhasil dibuat! Silakan login untuk melanjutkan.');
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
        $admin = User::findOrFail($id); //mencari admin dengan id yang sesuai atau menampilkan 404 jika tidak ditemukan  
        return view('updateAdmin', compact('admin'));
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
        $admin = User::findOrFail($id);
        $admin->username = $request->username;
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password) { // Check if password field is filled
            $admin->password = bcrypt($request->password); // Hash the new password
        }
        $admin->save();
        
        if($id==Auth::user()->id){
            return redirect('/admin')->with('success', 'Data diri kamu berhasil diubah!!');
        }else{
            //bila berhasil diubah, kembali ke page barang dan munculkan alert
            return redirect('/admin')->with('success', 'Data Admin berhasil diubah!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/admin')->with('warning', 'Data Admin berhasil dihapus!!');
    }
}
