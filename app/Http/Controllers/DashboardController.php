<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    function getIndex()
    {
        $lastWeekStart = Carbon::today()->subDays(13);
        $lastWeekEnd = Carbon::today()->subDays(6);
        $date = Carbon::today()->subDays(6);
        return view('admin.dashboard.index');
    }
}
