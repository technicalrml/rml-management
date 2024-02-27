<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Ticket;

final class TicketController extends Controller
{
    function getTicket() {
        $getdata = (new Ticket())->getDataLicense();
        $respon = [
            'status_code' => 200,
            'success' => true,
            'data' => $getdata
        ];
        return response()->json($respon, 200);
    }
}


?>