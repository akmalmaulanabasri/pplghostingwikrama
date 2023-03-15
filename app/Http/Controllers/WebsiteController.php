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
        if (!Auth::user()->hasRole('user')) {
            $websites = Website::all();
        } else {
            $websites = Website::where('adminEmail', Auth::user()->email)->get();
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
        $website = $request->validate([
            'domain' => 'required|unique:websites,domain',
            'package' => 'required',
            'php' => 'required'
        ]);
        $p = CyberPanelController::createWebsite($request->package, $request->domain, $request->php, Auth::user()->email, Auth::user()->username);
        // laravel log
        \Log::info($p);
        if ($p['createWebSiteStatus'] == 1) {
            Website::create([
                'domain' => $request->domain . ".pplgwikrama.my.id",
                'adminEmail' => Auth::user()->email,
                'ipAddress' => 0,
                'admin' => Auth::user()->username,
                'package' => $request->package,
                'state' => 1,
                'diskUsed' => 0,
                'username' => Auth::user()->username,
            ]);
            $user = User::findOrfail(Auth::user()->id);
            $user->update([
                'website_limit' => $user->website_limit - 1
            ]);
            return redirect()->route('website.index')->with('successMessage', 'Website created successfully');
            CyberPanelController::fetchWebsite();
        } else {
            return redirect()->route('website.index')->with('errorMessage', 'Website created failed');
        }

        return redirect()->route('website.index')->with('successMessage', 'Website created successfully');
    }

    static function check()
    {
        // Header('Content-type: Application/json');
        $domain = $_GET['domain'];
        $find = Website::where('domain', $domain)->get()->first();
        if ($find) {
            $response = ['domain' => 1];
            return response()->json($response, 200);
        } else {
            $response = ['domain' => 0];
            // response 404
            return response()->json($response, 204);
        }
    }
}