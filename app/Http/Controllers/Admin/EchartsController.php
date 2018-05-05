<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class EchartsController extends BaseController
{
    public function bar()
    {
        $record1 = Member::where('record','like','%研究生%')->count();
        $record2 = Member::where('record','like','%本科%')->count();
        $record3 = Member::where('record','like','%专科%')->count();
        $record4 = Member::where('record','like','%高中%')->count();
        $record5 = Member::where('record','like','%初中%')->count();
        $record = Member::count()-$record1-$record2-$record3-$record4-$record5;
        $records = [$record1,$record2,$record3,$record4,$record5,$record];
        $records = json_encode($records);
        return view(getThemeView('echarts.bar'),compact('records'));
    }

    public function pie()
    {
        $res1 = User::where('name','like','%离石市区%')->first(['id']);
        $ids1 = $this->get_adminson([$res1->id],[$res1->id]);
        $arr1 = Member::whereIn('user_id',$ids1)->count();
        $res2 = User::where('name','like','%孝义市%')->first(['id']);
        $ids2 = $this->get_adminson([$res2->id],[$res2->id]);
        $arr2 = Member::whereIn('user_id',$ids2)->count();
        $res3 = User::where('name','like','%汾阳市%')->first(['id']);
        $ids3 = $this->get_adminson([$res3->id],[$res3->id]);
        $arr3 = Member::whereIn('user_id',$ids3)->count();
        $res4 = User::where('name','like','%石楼县%')->first(['id']);
        $ids4 = $this->get_adminson([$res4->id],[$res4->id]);
        $arr4 = Member::whereIn('user_id',$ids4)->count();
        $res5 = User::where('name','like','%方山县%')->first(['id']);
        $ids5 = $this->get_adminson([$res5->id],[$res5->id]);
        $arr5 = Member::whereIn('user_id',$ids5)->count();
        $res6 = User::where('name','like','%柳林县%')->first(['id']);
        $ids6 = $this->get_adminson([$res6->id],[$res6->id]);
        $arr6 = Member::whereIn('user_id',$ids6)->count();
        $res7 = User::where('name','like','%交口县%')->first(['id']);
        $ids7 = $this->get_adminson([$res7->id],[$res7->id]);
        $arr7 = Member::whereIn('user_id',$ids7)->count();
        $res8 = User::where('name','like','%文水县%')->first(['id']);
        $ids8 = $this->get_adminson([$res8->id],[$res8->id]);
        $arr8= Member::whereIn('user_id',$ids8)->count();
        $res9 = User::where('name','like','%交城县%')->first(['id']);
        $ids9 = $this->get_adminson([$res9->id],[$res9->id]);
        $arr9 = Member::whereIn('user_id',$ids9)->count();
        $res10 = User::where('name','like','%兴县%')->first(['id']);
        $ids10 = $this->get_adminson([$res10->id],[$res10->id]);
        $arr10 = Member::whereIn('user_id',$ids10)->count();
        $res11 = User::where('name','like','%临县%')->first(['id']);
        $ids11 = $this->get_adminson([$res11->id],[$res11->id]);
        $arr11 = Member::whereIn('user_id',$ids11)->count();
        $res12 = User::where('name','like','%岚县%')->first(['id']);
        $ids12 = $this->get_adminson([$res12->id],[$res12->id]);
        $arr12 = Member::whereIn('user_id',$ids12)->count();
        $res13 = User::where('name','like','%中阳县%')->first(['id']);
        $ids13 = $this->get_adminson([$res13->id],[$res13->id]);
        $arr13 = Member::whereIn('user_id',$ids13)->count();
        $data = [
          [
              'value'=>$arr13,
              'name'=>'中阳县',
          ],
            [
                'value'=>$arr12,
                'name'=>'岚县',
            ],
            [
                'value'=>$arr11,
                'name'=>'临县',
            ],
            [
                'value'=>$arr10,
                'name'=>'兴县',
            ],
            [
                'value'=>$arr9,
                'name'=>'交城县',
            ],
            [
                'value'=>$arr8,
                'name'=>'文水县',
            ],
            [
                'value'=>$arr7,
                'name'=>'交口县',
            ],
            [
                'value'=>$arr6,
                'name'=>'柳林县',
            ],
            [
                'value'=>$arr5,
                'name'=>'方山县',
            ],
            [
                'value'=>$arr4,
                'name'=>'石楼县',
            ],
            [
                'value'=>$arr3,
                'name'=>'汾阳市',
            ],
            [
                'value'=>$arr2,
                'name'=>'孝义市',
            ],
            [
                'value'=>$arr1,
                'name'=>'离石市区',
            ],
        ];
        //$data = json_encode($data);
        return view(getThemeView('echarts.pie'),compact('data'));
    }
}
