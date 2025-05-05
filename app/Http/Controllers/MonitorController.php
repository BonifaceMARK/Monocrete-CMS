<?php

namespace App\Http\Controllers;

use App\Models\Signage;
use App\Models\SignageTv;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function showAllTvFiles()
{
    $files = Signage::orderBy('tv')->get(); // You can also group by TV if needed
    return view('monitor', compact('files'));
}
}
