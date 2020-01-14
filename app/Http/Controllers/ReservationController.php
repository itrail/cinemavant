<?php

namespace App\Http\Controllers;

use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('name')) {
            $user = $request->session()->get('name');
            return view('reservation.index_auth', ['user' => $user]);
        }
        else
            return redirect('/reservation.index');
    }

    public function myReservations(Request $request)
    {
        if($request->session()->has('name')) {
            $user = $request->session()->get('name');
            $reservations = DB::table('reservations')->where('email', $user)->get();
            return view('reservation.reservations', ['user' => $user], ['reservations' => $reservations]);
        }
        else
            return redirect( '/index');
    }

    public function reserve(Request $request){
        $user = $request->session()->get('name');
        DB::table('reservations')->insert(
            array(
                'email'     =>   $user,
                'amount_of_tickets' => implode(request(['amount_of_tickets'])),
                'seance_id' => implode(request(['seance_id'])),
            )
        );

        $seances = DB::table('seanses_times')->where('seance_id', implode(request(['seance_id'])))->get();
        foreach($seances as $seance)
        {
            $free = $seance->amount_of_free;
        }
        $free = $free - intval(implode(request(['amount_of_tickets'])));
        DB::table('seanses_times')
            ->where('seance_id', implode(request(['seance_id'])))
            ->update(['amount_of_free' => $free]);
        return redirect('/index');
    }

    public function resign(Request $request)
    {
        try {
        $checked = $request->input('checked');
        foreach ($checked as $id) {
            $user = $request->session()->get('name');
            $reservations = DB::table('reservations')->where('email', $user)->get();
            foreach ($reservations as $resv) {
                $seances = DB::table('seanses_times')->where('seance_id', $resv->seance_id)->get();
                $seance_id = $resv->seance_id;
                $seats = $resv->amount_of_tickets;
            }
            foreach ($seances as $seance) {
                $free = $seance->amount_of_free;
            }
            $free = $free + $seats;


                    DB::table('reservations')->where('reservation_id', $id)->delete();
                    DB::table('seanses_times')
                        ->where('seance_id', $seance_id)
                        ->update(['amount_of_free' => $free]);

                return redirect()->to('/reservations');
            }
        }
        catch (Exception $e) {
            return redirect()->to('/reservations')->withErrors(['Wystąpił błąd!', 'The Message']);
        }
    }
}
