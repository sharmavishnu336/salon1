<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\UserServices;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        $services = UserServices::all();
        return view('welcome',compact('services'));
    }
    public function login(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $rules = [
                'email' => 'required',
                'password' => 'required'
            ];

            $requestData = $request->all();
            $validator = Validator::make($requestData, $rules);

            if ($validator->fails()) {
                return view('login');
            }
            $email = $request->input('email');
            $password = $request->input('password');
            $user = User::where('email',$email)->first();
            if (!empty($user) && !Hash::check($password, $user->password)) {
                return view('login');
            }
            else{
                $credentials = $request->only('email', 'password');

                Auth::attempt($credentials);
                return redirect('dashboard');

            }


            }
        return view('login');

    }

    public function dashboard(Request $request)
    {
        $services = UserServices::all();
        return view('welcome',compact('services'));
    }

    public function bookservice($id)
    {

        $service = UserServices::find($id);
        if($service) {
            return view('service_book', compact('service'));
        }
        else
        {
            return redirect('dashboard');
        }
    }

    public function book(Request $request)
    {
        $data = array('bookdate' =>$request->bookdate,'booktime'=> $request->booktime,'address' =>$request->address,'service'=>$request->service,'user_id' =>Auth::user()->id,'status'=>0);
        $result = Booking::create($data);
        return \redirect('dashboard');
    }

    public function booklist()
    {
        $booking = Booking::where('user_id',Auth::user()->id)->with('servicedata')->get();
        return view('booking_list',compact('booking'));

    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');

    }
}
