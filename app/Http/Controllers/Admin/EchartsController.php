<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class EchartsController extends BaseController
{
    public function bar()
    {
        return view(getThemeView('echarts.bar'));
    }

    public function pie()
    {
        return view(getThemeView('echarts.pie'));
    }
}
