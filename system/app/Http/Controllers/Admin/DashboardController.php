<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DashboardController extends Controller
{
    function index(){
        $data['list'] = Pengguna::get();

        return view('admin.dashboard', $data);
    }

    function loadMarker(){
        $list = Pengguna::get();

        return response()->json($list);
    }


    public function streamEmergencyEvents()
    {
        return new StreamedResponse(function () {
            while (true) {
                // Simulasi data kejadian darurat
                $data = [
                    'labels' => ['Fire', 'Accident', 'Medical', 'Other'],
                    'counts' => [
                        rand(10, 100), // Fire
                        rand(10, 100), // Accident
                        rand(10, 100), // Medical
                        rand(10, 100), // Other
                    ]
                ];

                echo "data: " . json_encode($data) . "\n\n";
                ob_flush();
                flush();
                sleep(5); // Update setiap 5 detik
            }
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache',
            'Connection' => 'keep-alive',
        ]);
    }
}
