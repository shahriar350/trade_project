<?php

namespace App\Http\Controllers;

use App\Models\TradeInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BasicController extends Controller
{
    public function index(){
        $data = TradeInfo::all();
        $trade_names= collect($data)->unique('trade_code')->pluck('trade_code');
        return view('welcome',compact('data','trade_names'));
    }
}
