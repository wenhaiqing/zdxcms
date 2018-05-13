<?php

namespace App\Http\Controllers\Wap;

use App\Models\Diaoyan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiaoyanController extends Controller
{
    public function index()
    {
        return view('wap.diaoyan.index');
    }

    public function create()
    {
        return view('wap.diaoyan.add');
    }

    public function store(Request $request)
    {
        $res = Diaoyan::create($request->all());
        return redirect()->route('wap.diaoyan.add');
    }
}
