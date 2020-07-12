<?php
namespace App\Http\Controllers;

use Auth;
use DB;
use App\User;
use App\Order;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use DateTime;
use DateTimezone;
use Carbon\Carbon;

class PriorityController extends Controller
{
    
    public function order()
    {
        if (Auth::check()){
            $self_id =  Auth::user()->id; 
            //dd($self_id); 
            $orders = DB::table('orders')->orderBy('updated_at', 'asc')->get();
            return view('priorityDashboard')->with('orders',$orders);
        }
    }
    public function orderList()
    {   
        
        $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $now=DATE_FORMAT($date,'h:i a');
        //dd($now);
        $courses=Course::join('orders', 'orders.nsu_id', '=', 'courses.nsu_id')
             ->select('orders.nsu_id', DB::raw("DATE_FORMAT(MIN(STR_TO_DATE(class_start,'%h:%i %p')), '%h:%i %p') AS class_start"))
             ->where('courses.class_start', '>', $now)
             ->groupBy('orders.nsu_id')
             ->orderBy('class_start', 'ASC')
             ->get();
        return view('orderList',compact('courses'));
    }
    public function delete($nsu_id)
    {   
        $post =Order::where('nsu_id',$nsu_id)->first()->delete();;
        return redirect('/orderList');
    }

}
