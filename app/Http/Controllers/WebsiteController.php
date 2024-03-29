<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function index()
    {
        if (!Auth::user()->hasRole('superadmin')) {
            $websites = Website::where('adminEmail', Auth::user()->email)->get();
        } else {
            $websites = Website::all();
        }
        return view('stisla.website.index', compact('websites'));
    }

    function create()
    {
        $package = CyberPanelController::fetchPackage();
        // dd($package);
        return view('stisla.website.create', compact('package'));
    }

    function store(Request $request)
    {
        $request->validate([
            'domain' => 'required|unique:websites,domain',
            'package' => 'required',
            'php' => 'required'
        ]);

        $request->domain = $request->domain . ".sata.host";
        $check = Website::where('domain', $request->domain)->get()->first();
        if ($check) {
            \Log::info("Website sudah ada ==>" . $check);
            return redirect()->route('website.index')->with('errorMessage', 'Domain sudah dipakai, silahkan gunakan domain lainnya');
        }

        // $p = CyberPanelController::createWebsite($request->package, $request->domain, $request->php, Auth::user()->email, Auth::user()->username);
        // laravel log
        // if ($p['createWebSiteStatus'] == 1) {
        $name = explode(" ", $request->domain);
        $username = substr(strtolower($name[0]), 0, 4) . rand(1000, 9999);
        Website::create([
            'domain' => $request->domain,
            'adminEmail' => Auth::user()->email,
            'ipAddress' => 0,
            'admin' => $username,
            'package' => $request->package,
            'state' => "Unpaid",
            'diskUsed' => 0,
            'username' => $username,
        ]);
        //     CyberPanelController::fetchWebsite();
        //     return redirect()->route('website.index')->with('successMessage', 'Website berhasil dibuat, Silahkan tunggu 1-5 menit untuk pembuatan website');
        // } else {
        //     \Log::info($p);
        //     return redirect()->route('website.index')->with('errorMessage', 'gagal dibuat');
        // }

        return redirect()->route('website.index')->with('successMessage', 'Website berhasil dibuat, Silahkan lakukan pembayaran untuk mengaktifkan website');
    }

    static function check()
    {
        $domain = $_GET['domain'];
        $find = Website::where('domain', $domain)->get()->first();
        if ($find) {
            $response = ['domain' => 1];
            return response()->json($response, 200);
        } else {
            $response = ['domain' => 0];
            return response()->json($response, 204);
        }
    }
}
