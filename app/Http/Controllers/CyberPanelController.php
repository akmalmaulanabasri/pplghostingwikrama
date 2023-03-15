<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class CyberPanelController extends Controller
{
    static function getWebsite($page)
    {
        $curl = curl_init();
        $websites = '{
                "serverUserName": "admin",
                "controller": "fetchWebsites",
                "websiteName": "",
                "page": ' . $page . '
            }';

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => env('CYBERPANEL_URL'),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $websites,
                CURLOPT_HTTPHEADER => array(
                    'Authorization: ' . env('CYBERPANEL_API_KEY')
                ),
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        $data = (json_decode($response, true));
        $replace = [
            '[',
            ']',
            ',{',
            '{',
        ];
        $array = str_replace($replace, '', $data['data']);
        $array = explode('}', $array);

        foreach ($array as $key => $a) {
            if ($a == null) {
                unset($array[$key]);
            }
        }

        $new_arr = [];
        foreach ($array as $key_utama => $a) {
            $a = str_replace(['"', ' '], '', $a);
            $a = explode(',', $a);
            foreach ($a as $key => $a) {
                $a = explode(':', $a);
                $new_arr[$key_utama][$a[0]] = $a[1];
            }
            // $new_arr[$key_utama]['password'] = md5(md5('helloWorld') . md5(rand(10000, 99999)) . md5('helloWorld'));
        }
        return $new_arr;
    }

    static function fetchWebsite()
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
                        'is_verified' => 1
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
                        'is_verified' => 1
                    ]);
                }
            }
        }
    }

    static function register($name, $email, $password, $username)
    {
        $curl = curl_init();
        $name = explode(" ", $name);
        $websites = '{
            "serverUserName": "admin",
            "controller": "submitUserCreation",
            "firstName": "' . $name[0] . '",
            "lastName": "' . $name[0] . '",
            "email": "' . $email . '",
            "userName": "' . $username . '",
            "password": "' . $password . '",
            "websitesLimit": 1,
            "selectedACL": "user"
        }';

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => env('CYBERPANEL_URL'),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $websites,
                CURLOPT_HTTPHEADER => array(
                    'Authorization: ' . env('CYBERPANEL_API_KEY')
                ),
            )
        );


        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    static function fetchPackage()
    {
        $curl = curl_init();
        $packages = '
        {
            "serverUserName": "admin",
            "controller": "fetchPackages"
        }';

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => env('CYBERPANEL_URL'),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $packages,
                CURLOPT_HTTPHEADER => array(
                    'Authorization: ' . env('CYBERPANEL_API_KEY')
                ),
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        $data = (json_decode($response, true));
        $replace = [
            '[',
            ']',
            ',{',
            '{',
        ];
        $array = str_replace($replace, '', $data['data']);
        $array = explode('}', $array);

        foreach ($array as $key => $a) {
            if ($a == null) {
                unset($array[$key]);
            }
        }

        $new_arr = [];
        foreach ($array as $key_utama => $a) {
            $a = str_replace(['"', ' '], '', $a);
            $a = explode(',', $a);
            foreach ($a as $key => $a) {
                $a = explode(':', $a);
                $new_arr[$key_utama][$a[0]] = $a[1];
            }
            // $new_arr[$key_utama]['password'] = md5(md5('helloWorld') . md5(rand(10000, 99999)) . md5('helloWorld'));
        }
        $json = json_encode($new_arr, JSON_PRETTY_PRINT);
        return $new_arr;
    }
    static function createWebsite($package, $domain, $php, $email, $username)
    {
        $curl = curl_init();
        $web = '
        {
            "serverUserName": "admin",
            "controller": "submitWebsiteCreation",
            "domainName": "'.$domain.'.pplgwikrama.my.id",
            "package": "'.$package.'",
            "adminEmail": "'.$email.'" ,
            "phpSelection": "PHP '.$php.'",
            "websiteOwner": "'.$username.'",
            "ssl": 1,
            "dkimCheck": 1,
            "openBasedir": 1
        }';

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => env('CYBERPANEL_URL'),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $web,
                CURLOPT_HTTPHEADER => array(
                    'Authorization: ' . env('CYBERPANEL_API_KEY')
                ),
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        $data = (json_decode($response, true));
        $replace = [
            '[',
            ']',
            ',{',
            '{',
        ];

        return $data;
    }

}