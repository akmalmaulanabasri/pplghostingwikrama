<?php

namespace Database\Seeders;

use App\Http\Controllers\CyberPanelController;
use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 10;

        for ($i = 1; $i <= $limit; $i++) {
            $result = CyberPanelController::getWebsite($i);

            foreach ($result as $s) {
                $uname = substr(strtolower($s['adminEmail']), 0, 4) . rand(1000, 9999);
                if (Website::where('domain', $s['domain'])->get()->first()) {
                    Website::where('domain', $s['domain'])->get()->first()->update([
                        'domain' => $s['domain'],
                        'adminEmail' => $s['adminEmail'],
                        'ipAddress' => $s['ipAddress'],
                        'admin' => $s['admin'],
                        'package' => $s['package'],
                        'state' => $s['state'],
                        'diskUsed' => $s['diskUsed'],
                        'username' => $s['admin'],
                        'is_verified' => 0
                    ]);
                } else {
                    Website::create([
                        'domain' => $s['domain'],
                        'adminEmail' => $s['adminEmail'],
                        'ipAddress' => $s['ipAddress'],
                        'admin' => $s['admin'],
                        'package' => $s['package'],
                        'state' => $s['state'],
                        'diskUsed' => $s['diskUsed'],
                        'username' => $s['admin'],
                        'is_verified' => 0
                    ]);
                }
            }
        }
    }
}
