<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('name')) {
            $user = $request->session()->get('name');
            return view('pages.index_auth', ['user' => $user]);
        }
        else
            return view( 'pages.index');
    }

    public function modify_data(Request $request)
    {
        if($request->session()->has('name')) {
            $user = $request->session()->get('name');
            $users = DB::table('users')->where('email', $user)->get();
            return view('pages.modify_data', ['users' => $users]);
        }
        else{
            return redirect('/');
        }
    }

    public function modify(Request $request)
    {
       try{
            if ($request->session()->has('name'))
            {
                $user = $request->session()->get('name');
                if (strlen(implode(request(['firstname']))) > 0 && $this->validate(request(), ['firstname' => 'min:2',])) {
                    $this->update_data($user, 'firstname', implode(request(['firstname'])));
                }
                if (strlen(implode(request(['surname']))) > 0 && $this->validate(request(), ['surname' => 'min:2',])) {
                    $this->update_data($user, 'surname', implode(request(['surname'])));
                }
                if (strlen(implode(request(['email']))) > 0 && $this->validate(request(), ['email' => 'email',])) {
                    $this->update_data($user, 'email', implode(request(['email'])));
                    $request->session()->put('name',implode(request(['email'])));
                }
                return redirect()->to('/modify_data')->withErrors(['Poprawnie zaaktualizowano Twoje dane!', 'The Message']);
            }
       }
       catch (Exception $e) {
           return redirect()->to('/modify_data')->withErrors(['Podano niepoprawne dane rejestracji. Spróbuj ponownie!', 'The Message']);
       }
    }

    public function update_data($user, $field, $data)
    {
        DB::table('users')
            ->where('email', $user)
            ->update([$field => $data]);
    }

    public function change_password(Request $request)
    {
        if($request->session()->has('name')) {
            $user = $request->session()->get('name');
            $users = DB::table('users')->where('email', $user)->get();
            return view('pages.change_password', ['users' => $users]);
        }
        else{
            return redirect('/');
        }
    }

    public function change(Request $request)
    {
        try {
            if ($request->session()->has('name')) {
                $user = $request->session()->get('name');
                $pass = DB::table('users')->select('password')->where('email', $user)->get();
                $rules = [
                    'password' => 'required',
                    'new_password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                    'new_confirm_password' => 'same:new_password',
                ];

                if (Auth::attempt(array('email' => $user, 'password' => implode(request(['password'])))) && $this->validate(request(), $rules)) {
                    $this->update_data($user, 'password', Hash::make(implode(request(['new_password']))));
                    return redirect()->to('/change_password')->withErrors(['Poprawnie zaaktualizowano Twoje hasło!', 'The Message']);
                } else
                    return redirect()->to('/change_password')->withErrors(['Podaj poprawne, dotychczasowe hasło!', 'The Message']);
            }
        }
        catch (Exception $e)
        {
            return redirect()->to('/change_password')->withErrors(['Podano hasło niespełniające wymagań. Spróbuj ponownie z bezpieczniejszym hasłem!', 'The Message']);
        }
    }

    public function hall(Request $request){
        if ($request->session()->has('name')) {
            $user = $request->session()->get('name');
            $admins = DB::table('users')->select('admin')->where('email', $user)->get();
            foreach($admins as $admin) {
                if ($admin->admin == 1) {
                    $halls = DB::table('halls')->get();
                    return view('pages.add_hall', ['halls' => $halls]);
                }
                else return "Brak dostępu";
            }
        }
        else return "Brak dostępu";
    }

    public function add_hall(Request $request)
    {
        try{
            if(intval(implode(request(['seats'])))>0)
            DB::table('halls')->insert(
                array(
                    'amount_of_seats'   =>   implode(request(['seats']))
                )
            );
            else{
                return redirect()->to('/add_hall')->withErrors(['Podano niepoprawną wartość. Spróbuj ponownie!', 'The Message']);
            }


                return redirect()->to('/add_hall')->withErrors(['Poprawnie zaaktualizowano ', 'The Message']);

        }
        catch (Exception $e) {
            return redirect()->to('/add_hall')->withErrors(['Podano niepoprawną wartość. Spróbuj ponownie!', 'The Message']);
        }
    }

    public function movie(Request $request){
        if ($request->session()->has('name')) {
            $user = $request->session()->get('name');
            $admins = DB::table('users')->select('admin')->where('email', $user)->get();
            foreach($admins as $admin) {
                if ($admin->admin == 1) {
                    $movies = DB::table('movies')->get();
                    return view('pages.add_movie', ['movies' => $movies]);
                }
                else return "Brak dostępu";
            }
        }
        else return "Brak dostępu";
    }

    public function add_movie(Request $request){
        try{
            if(strlen(implode(request(['titlee'])))>0)
                DB::table('movies')->insert(
                    array(
                        'title'   =>   implode(request(['titlee'])),
                        'poster' => implode(request(['poster'])),
                        'description' => implode(request(['description'])),
                        'age_category' => implode(request(['age_category'])),
                        'genre' => implode(request(['genre'])),
                        'release_date' => implode(request(['release_date'])),
                    )
                );
            else{
                return redirect()->to('/add_movie')->withErrors(['Podano niepoprawną wartość. Spróbuj ponownie!', 'The Message']);
            }


            return redirect()->to('/add_movie')->withErrors(['Poprawnie zaaktualizowano ', 'The Message']);

        }
        catch (Exception $e) {
            return redirect()->to('/add_movie')->withErrors(['Podano niepoprawną wartość. Spróbuj ponownie!', 'The Message']);
        }
    }

    public function remove_movie(Request $request){
        try{
            $checked = $request->input('checked');
            foreach ($checked as $id) {
                DB::table('movies')->where('movie_id', $id)->delete();
            }
            return redirect()->to('/add_movie');
        }
        catch (Exception $e) {
            return redirect()->to('/add_movie')->withErrors(['Próbujesz usunąć film, do którego przypisane są seanse!', 'The Message']);
        }

    }

    public function seance(Request $request){
        if ($request->session()->has('name')) {
            $user = $request->session()->get('name');
            $admins = DB::table('users')->select('admin')->where('email', $user)->get();
            foreach($admins as $admin) {
                if ($admin->admin == 1) {
                    return view('pages.add_seance');
                } else
                    return "Brak dostępu";
            }
        }
        else return "Brak dostępu";

    }

    public function add_seance(Request $request){
        try{
            $seances = DB::table('seanses_times')->get();
                DB::table('seanses_times')->insert(
                    array(
                        'seance_time'   =>   implode(request(['seance_time'])),
                        'movie_id' => implode(request(['movie_id'])),
                        'hall_id' => implode(request(['hall_id'])),
                        'amount_of_reserved' => 0,
                    ));
            return redirect()->to('/add_seance')->withErrors(['Poprawnie zaaktualizowano ', 'The Message']);
        }
        catch (Exception $e) {
            return redirect()->to('/add_seance')->withErrors(['Podano niepoprawną wartość. Spróbuj ponownie!', 'The Message']);
        }
    }

    public function remove_seance(Request $request){
        $checked =$request->input('checked');
        foreach ($checked as $id) {
            DB::table('seanses_times')->where('seance_id', $id)->delete();
        }
        return redirect()->to('/add_seance');
    }

    public function show()
    {
        return view('pages.create');
    }

    public function login()
    {
        return 'it works';
    }
}
