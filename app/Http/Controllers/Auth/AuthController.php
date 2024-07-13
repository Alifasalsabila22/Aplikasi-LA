<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\KategoriController;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display login view
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Display registration view
     *
     * @return \Illuminate\View\View
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Handle login request
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboards')
                ->withSuccess('You have successfully logged in');
        }

        return redirect("/")->withError('Oops! You have entered invalid credentials');
    }

    /**
     * Handle registration request
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = $this->create($data);

        Auth::login($user);

        return redirect()->route('dashboard')->withSuccess('Great! You have successfully registered and logged in');
    }

    /**
     * Display dashboard view
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        if (Auth::check()) {
            $bukusd = Barang::where('id_kategori', '=', 1)->count();
            $bukusmp = Barang::where('id_kategori', '=', 2)->count();
            $bukusma = Barang::where('id_kategori', '=', 3)->count();
            $bukusmk = Barang::where('id_kategori', '=', 4)->count();
            $bukupendamping = Barang::where('id_kategori', '=', 5)->count();
            $kategori = Kategori::count();
            $transaksimasuk = Transaksi::where('status', '=', 'in')->count();
            $transaksikeluar = Transaksi::where('status', '=', 'out')->count();
            // dd($transaksikeluar);
            $transactions = Transaksi::where('status', 'in')->get();

            $transaksikeluardata = Transaksi::where('status', '=', 'out')->get();

            // Prepare data for Chart.js
            $labelstransaction = $transactions->pluck('tanggal_masuk')->toArray();
            $datatransaction = $transactions->pluck('jumlah_masuk')->toArray();

            // preapare data for chart js
            $labelstransactionkeluar = $transaksikeluardata->pluck('tanggal_keluar')->toArray();
            $datatransactionkeluar = $transaksikeluardata->pluck('jumlah_keluar')->toArray();


            // dd($datatransactionkeluar);

            return view('auth.dashboard', compact('bukusd', 'bukusmp', 'bukusma', 'bukusmk', 'bukupendamping', 'kategori', 'transaksimasuk', 'transaksikeluar', 'labelstransaction', 'datatransaction', 'labelstransactionkeluar', 'datatransactionkeluar'));
        }

        return redirect("/")->withError('Oops! You do not have access');
    }

    /**
     * Create a new user instance after a valid registration
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Logout the user and invalidate the session
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
