<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Order;
use App\Course;
use DB;
use DateTime;
use DateTimezone;
use Carbon\Carbon;

class OrderController extends Controller
{
     protected $redirectTo = '/successOrder';
     public function index()
     {
         return view('home');
     }
    public function order(Request $request)
    {
        $this->validate(request(), [
            'nsu_id' => 'required',
        ]);
        if (Auth::check()){
             $self_id =  Auth::user()->id; 
             //dd($self_id);
            //$user =User::find(1);
            //dd(Auth::user());
            $order= new Order();
            $order->nsu_id=$request->input('nsu_id');
            $order->user_id=$self_id;
            //$order->user_id=$user->id;
            //$user->orders()->save($order);
            $order->save();
            return redirect()->to('/successOrder');
        }
    }
    
    public function success()
    {

        $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        //$now=$date->format('h:i a');
        $now=DATE_FORMAT($date,'h:i a');
        //dd($now);
        $courses = Course::join('orders', 'orders.nsu_id', '=', 'courses.nsu_id')
        // ->select('orders.nsu_id', DB::raw('MIN(courses.class_start) AS class_start'))
        //->select('orders.nsu_id', DB::raw("MIN(STR_TO_DATE(class_start, '%h:%i %p')) AS class_start"))
        ->select('orders.nsu_id', DB::raw("DATE_FORMAT(MIN(STR_TO_DATE(CONCAT('2020-04-05 ', class_start), '%Y-%m-%d %h:%i %p')), '%H:%i %p') AS class_start"))
        ->where('courses.class_start', '>', $now)
        ->groupBy('orders.nsu_id')
        ->orderBy('class_start', 'DESC')
        ->get();
        return view('priorityDashboard',compact('courses'));
    }
    
}