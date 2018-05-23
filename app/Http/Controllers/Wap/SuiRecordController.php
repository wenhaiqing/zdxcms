<?php

namespace App\Http\Controllers\Wap;

use App\Models\Member;
use App\Models\SuiRecord;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuiRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,SuiRecord $suiRecord)
    {
        $model = $request->model_title;
        $model_id = $request->model_id;
        $id = \Auth::guard('wap')->user()->user_id;
        $user = User::where('id',$id)->first();
        $ids = $this->get_adminson([$user->id],[$user->id]);
        $members = Member::whereIn('user_id',$ids)->pluck('id')->toArray();
        $records = $suiRecord->whereIn('member_id',$members)->where(['model_title'=>$model,'model_id'=>$model_id])->paginate(config('wap.global.paginate'));
        return view('wap.suirecord.recordlist',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $model_id = $request->model_id;
        $model_title = $request->model_title;
        return view('wap.suirecord.record',compact('model_id','model_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = SuiRecord::create($request->all());
        return redirect()->route('wap_suirecords.index',['model_id'=>$res->model_id,'model_title'=>$res->model_title]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuiRecord  $suiRecord
     * @return \Illuminate\Http\Response
     */
    public function show(SuiRecord $suiRecord,$id)
    {
        $lists = $suiRecord->where('id',$id)->first();
        return view('wap.suirecord.recorddetail',compact('lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuiRecord  $suiRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(SuiRecord $suiRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuiRecord  $suiRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuiRecord $suiRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuiRecord  $suiRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuiRecord $suiRecord,$id)
    {
        $res = $suiRecord->where('id',$id)->first();
        $res->delete();
        return back();

    }
}
