<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\resep_makanan;

class LoginController extends Controller
{

    public function index()
    {
        return view('/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) { //melakukan autentifikasi 
            // Authentikasi berhasil dilakukan
            $username = Auth::user()->username;
            $name = Auth::user()->name;
            $email = Auth::user()->email;
            $resep = resep_makanan::all();
            session(['id' => Auth::user()->username]);
            session(['resep' => $resep]);
    
            // Hitung jumlah resep yang diposting oleh pengguna dan tentukan title
            $recipeCount = resep_makanan::where('user_id', Auth::user()->id)->count();
            $title = $this->getTitleByRecipeCount($recipeCount);
    
            return redirect()->route('user.profile')->with([
                'success' => "Selamat datang kembali, $name di Karesepan Admin!!",
                'resep' => $resep,
                'title' => $title,
                'recipeCount' => $recipeCount,
            ]);
        } else {
            // Authentikasi gagal dilakukan
            return redirect('/signin')->with('danger', 'Username atau password yang Anda masukkan salah. Silakan coba lagi.');
        }
    }

    public function profile()
    {
        // Ambil data pengguna yang sedang login
        $user = auth()->user();
        
        // Hitung jumlah resep yang diposting oleh pengguna
        $recipeCount = resep_makanan::where('user_id', $user->id)->count();
        
        // Tentukan title berdasarkan jumlah resep
        $title = $this->getTitleByRecipeCount($recipeCount);

        // Ambil daftar resep yang diposting oleh pengguna yang sedang login
        $userRecipes = resep_makanan::where('user_id', $user->id)->get();

        return view('admin/dashboard', compact('user', 'title', 'recipeCount', 'userRecipes'));
    }

    private function getTitleByRecipeCount($count)
    {
        if ($count >= 5) {
            return 'Master Chef';
        } elseif ($count >= 3){
            return 'Experienced Cook';
        } elseif ($count >= 1) {
            return 'Novice Chef';
        } else {
            return 'Newbie';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // hapus session login
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // redirect ke halaman login
        return redirect('/')->with('danger', 'Anda berhasil logout.');
    }
}
