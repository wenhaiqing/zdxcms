<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class EchartsController extends BaseController
{
    public function bar()
    {
        $record1 = Member::where('record', 'like', '%研究生%')->count();
        $record2 = Member::where('record', 'like', '%本科%')->count();
        $record3 = Member::where('record', 'like', '%专科%')->count();
        $record4 = Member::where('record', 'like', '%高中%')->count();
        $record5 = Member::where('record', 'like', '%初中%')->count();
        $record = Member::count() - $record1 - $record2 - $record3 - $record4 - $record5;
        $records = [$record1, $record2, $record3, $record4, $record5, $record];
        $records = json_encode($records);
        return view(getThemeView('echarts.bar'), compact('records'));
    }

    public function pie()
    {
        $res1 = User::where('name', 'like', '%离石市区%')->first(['id']);
        $ids1 = $this->get_adminson([$res1->id], [$res1->id]);
        $arr1 = Member::whereIn('user_id', $ids1)->count();
        $res2 = User::where('name', 'like', '%孝义市%')->first(['id']);
        $ids2 = $this->get_adminson([$res2->id], [$res2->id]);
        $arr2 = Member::whereIn('user_id', $ids2)->count();
        $res3 = User::where('name', 'like', '%汾阳市%')->first(['id']);
        $ids3 = $this->get_adminson([$res3->id], [$res3->id]);
        $arr3 = Member::whereIn('user_id', $ids3)->count();
        $res4 = User::where('name', 'like', '%石楼县%')->first(['id']);
        $ids4 = $this->get_adminson([$res4->id], [$res4->id]);
        $arr4 = Member::whereIn('user_id', $ids4)->count();
        $res5 = User::where('name', 'like', '%方山县%')->first(['id']);
        $ids5 = $this->get_adminson([$res5->id], [$res5->id]);
        $arr5 = Member::whereIn('user_id', $ids5)->count();
        $res6 = User::where('name', 'like', '%柳林县%')->first(['id']);
        $ids6 = $this->get_adminson([$res6->id], [$res6->id]);
        $arr6 = Member::whereIn('user_id', $ids6)->count();
        $res7 = User::where('name', 'like', '%交口县%')->first(['id']);
        $ids7 = $this->get_adminson([$res7->id], [$res7->id]);
        $arr7 = Member::whereIn('user_id', $ids7)->count();
        $res8 = User::where('name', 'like', '%文水县%')->first(['id']);
        $ids8 = $this->get_adminson([$res8->id], [$res8->id]);
        $arr8 = Member::whereIn('user_id', $ids8)->count();
        $res9 = User::where('name', 'like', '%交城县%')->first(['id']);
        $ids9 = $this->get_adminson([$res9->id], [$res9->id]);
        $arr9 = Member::whereIn('user_id', $ids9)->count();
        $res10 = User::where('name', 'like', '%兴县%')->first(['id']);
        $ids10 = $this->get_adminson([$res10->id], [$res10->id]);
        $arr10 = Member::whereIn('user_id', $ids10)->count();
        $res11 = User::where('name', 'like', '%临县%')->first(['id']);
        $ids11 = $this->get_adminson([$res11->id], [$res11->id]);
        $arr11 = Member::whereIn('user_id', $ids11)->count();
        $res12 = User::where('name', 'like', '%岚县%')->first(['id']);
        $ids12 = $this->get_adminson([$res12->id], [$res12->id]);
        $arr12 = Member::whereIn('user_id', $ids12)->count();
        $res13 = User::where('name', 'like', '%中阳县%')->first(['id']);
        $ids13 = $this->get_adminson([$res13->id], [$res13->id]);
        $arr13 = Member::whereIn('user_id', $ids13)->count();
        $data = [
            [
                'value' => $arr13,
                'name' => '中阳县',
            ],
            [
                'value' => $arr12,
                'name' => '岚县',
            ],
            [
                'value' => $arr11,
                'name' => '临县',
            ],
            [
                'value' => $arr10,
                'name' => '兴县',
            ],
            [
                'value' => $arr9,
                'name' => '交城县',
            ],
            [
                'value' => $arr8,
                'name' => '文水县',
            ],
            [
                'value' => $arr7,
                'name' => '交口县',
            ],
            [
                'value' => $arr6,
                'name' => '柳林县',
            ],
            [
                'value' => $arr5,
                'name' => '方山县',
            ],
            [
                'value' => $arr4,
                'name' => '石楼县',
            ],
            [
                'value' => $arr3,
                'name' => '汾阳市',
            ],
            [
                'value' => $arr2,
                'name' => '孝义市',
            ],
            [
                'value' => $arr1,
                'name' => '离石市区',
            ],
        ];
        //$data = json_encode($data);
        return view(getThemeView('echarts.pie'), compact('data'));
    }


    //正式、预备党员统计分析
    public function zheng()
    {
        $res1 = User::where('name', 'like', '%离石市区%')->first(['id']);
        $ids1 = $this->get_adminson([$res1->id], [$res1->id]);
        $gu1 = Member::whereIn('user_id', $ids1)->where('if_dang', '=', 1)->count();
        $liu1 = Member::whereIn('user_id', $ids1)->where('if_dang', '=', 0)->count();
        $res2 = User::where('name', 'like', '%孝义市%')->first(['id']);
        $ids2 = $this->get_adminson([$res2->id], [$res2->id]);
        $gu2 = Member::whereIn('user_id', $ids2)->where('if_dang', '=', 1)->count();
        $liu2 = Member::whereIn('user_id', $ids2)->where('if_dang', '=', 0)->count();
        $res3 = User::where('name', 'like', '%汾阳市%')->first(['id']);
        $ids3 = $this->get_adminson([$res3->id], [$res3->id]);
        $gu3 = Member::whereIn('user_id', $ids3)->where('if_dang', '=', 1)->count();
        $liu3 = Member::whereIn('user_id', $ids3)->where('if_dang', '=', 0)->count();
        $res4 = User::where('name', 'like', '%石楼县%')->first(['id']);
        $ids4 = $this->get_adminson([$res4->id], [$res4->id]);
        $gu4 = Member::whereIn('user_id', $ids4)->where('if_dang', '=', 1)->count();
        $liu4 = Member::whereIn('user_id', $ids4)->where('if_dang', '=', 0)->count();
        $res5 = User::where('name', 'like', '%方山县%')->first(['id']);
        $ids5 = $this->get_adminson([$res5->id], [$res5->id]);

        $gu5 = Member::whereIn('user_id', $ids5)->where('if_dang', '=', 1)->count();
        $liu5 = Member::whereIn('user_id', $ids5)->where('if_dang', '=', 0)->count();
        $res6 = User::where('name', 'like', '%柳林县%')->first(['id']);
        $ids6 = $this->get_adminson([$res6->id], [$res6->id]);
        //$arr6 = Member::whereIn('user_id',$ids6)->count();
        $gu6 = Member::whereIn('user_id', $ids6)->where('if_dang', '=', 1)->count();
        $liu6 = Member::whereIn('user_id', $ids6)->where('if_dang', '=', 0)->count();
        $res7 = User::where('name', 'like', '%交口县%')->first(['id']);
        $ids7 = $this->get_adminson([$res7->id], [$res7->id]);
        // $arr7 = Member::whereIn('user_id',$ids7)->count();
        $gu7 = Member::whereIn('user_id', $ids7)->where('if_dang', '=', 1)->count();
        $liu7 = Member::whereIn('user_id', $ids7)->where('if_dang', '=', 0)->count();
        $res8 = User::where('name', 'like', '%文水县%')->first(['id']);
        $ids8 = $this->get_adminson([$res8->id], [$res8->id]);
        // $arr8= Member::whereIn('user_id',$ids8)->count();
        $gu8 = Member::whereIn('user_id', $ids8)->where('if_dang', '=', 1)->count();
        $liu8 = Member::whereIn('user_id', $ids8)->where('if_dang', '=', 0)->count();
        $res9 = User::where('name', 'like', '%交城县%')->first(['id']);
        $ids9 = $this->get_adminson([$res9->id], [$res9->id]);
        // $arr9 = Member::whereIn('user_id',$ids9)->count();
        $gu9 = Member::whereIn('user_id', $ids9)->where('if_dang', '=', 1)->count();
        $liu9 = Member::whereIn('user_id', $ids9)->where('if_dang', '=', 0)->count();
        $res10 = User::where('name', 'like', '%兴县%')->first(['id']);
        $ids10 = $this->get_adminson([$res10->id], [$res10->id]);
        // $arr10 = Member::whereIn('user_id',$ids10)->count();
        $gu10 = Member::whereIn('user_id', $ids10)->where('if_dang', '=', 1)->count();
        $liu10 = Member::whereIn('user_id', $ids10)->where('if_dang', '=', 0)->count();
        $res11 = User::where('name', 'like', '%临县%')->first(['id']);
        $ids11 = $this->get_adminson([$res11->id], [$res11->id]);
        // $arr11 = Member::whereIn('user_id',$ids11)->count();
        $gu11 = Member::whereIn('user_id', $ids11)->where('if_dang', '=', 1)->count();
        $liu11 = Member::whereIn('user_id', $ids11)->where('if_dang', '=', 0)->count();
        $res12 = User::where('name', 'like', '%岚县%')->first(['id']);
        $ids12 = $this->get_adminson([$res12->id], [$res12->id]);
        //$arr12 = Member::whereIn('user_id',$ids12)->count();
        $gu12 = Member::whereIn('user_id', $ids12)->where('if_dang', '=', 1)->count();
        $liu12 = Member::whereIn('user_id', $ids12)->where('if_dang', '=', 0)->count();
        $res13 = User::where('name', 'like', '%中阳县%')->first(['id']);
        $ids13 = $this->get_adminson([$res13->id], [$res13->id]);
        // $arr13 = Member::whereIn('user_id',$ids13)->count();
        $gu13 = Member::whereIn('user_id', $ids13)->where('if_dang', '=', 1)->count();
        $liu13 = Member::whereIn('user_id', $ids13)->where('if_dang', '=', 0)->count();
        $records = [$gu1,$gu2,$gu3,$gu4,$gu5,$gu6,$gu7,$gu8,$gu9,$gu10,$gu11,$gu12,$gu13];
        $records1 = [$liu1,$liu2,$liu3,$liu4,$liu5,$liu6,$liu7,$liu8,$liu9,$liu10,$liu11,$liu12,$liu13];
        $records = json_encode($records);
        $records1 = json_encode($records1);
        //$data = json_encode($data);
        return view(getThemeView('echarts.zheng'), compact('records','records1'));



    }
    //党员性别统计分析
    public function sex()
    {
        $res1 = User::where('name', 'like', '%离石市区%')->first(['id']);
        $ids1 = $this->get_adminson([$res1->id], [$res1->id]);
        //$arr1 = Member::whereIn('user_id',$ids1)->count();
        $gir1 = Member::whereIn('user_id', $ids1)->where('sex', '=', 1)->count();
        $boy1 = Member::whereIn('user_id', $ids1)->where('sex', '=', 0)->count();
        $res2 = User::where('name', 'like', '%孝义市%')->first(['id']);
        $ids2 = $this->get_adminson([$res2->id], [$res2->id]);
        // $arr2 = Member::whereIn('user_id',$ids2)->count();
        $gir2 = Member::whereIn('user_id', $ids2)->where('sex', '=', 1)->count();
        $boy2 = Member::whereIn('user_id', $ids2)->where('sex', '=', 0)->count();
        $res3 = User::where('name', 'like', '%汾阳市%')->first(['id']);
        $ids3 = $this->get_adminson([$res3->id], [$res3->id]);
        //$arr3 = Member::whereIn('user_id',$ids3)->count();
        $gir3 = Member::whereIn('user_id', $ids3)->where('sex', '=', 1)->count();
        $boy3 = Member::whereIn('user_id', $ids3)->where('sex', '=', 0)->count();
        $res4 = User::where('name', 'like', '%石楼县%')->first(['id']);
        $ids4 = $this->get_adminson([$res4->id], [$res4->id]);
        // $arr4 = Member::whereIn('user_id',$ids4)->count();
        $gir4 = Member::whereIn('user_id', $ids4)->where('sex', '=', 1)->count();
        $boy4 = Member::whereIn('user_id', $ids4)->where('sex', '=', 0)->count();
        $res5 = User::where('name', 'like', '%方山县%')->first(['id']);
        $ids5 = $this->get_adminson([$res5->id], [$res5->id]);
        // $arr5 = Member::whereIn('user_id',$ids5)->count();
        $gir5 = Member::whereIn('user_id', $ids5)->where('sex', '=', 1)->count();
        $boy5 = Member::whereIn('user_id', $ids5)->where('sex', '=', 0)->count();
        $res6 = User::where('name', 'like', '%柳林县%')->first(['id']);
        $ids6 = $this->get_adminson([$res6->id], [$res6->id]);
        //$arr6 = Member::whereIn('user_id',$ids6)->count();
        $gir6 = Member::whereIn('user_id', $ids6)->where('sex', '=', 1)->count();
        $boy6 = Member::whereIn('user_id', $ids6)->where('sex', '=', 0)->count();
        $res7 = User::where('name', 'like', '%交口县%')->first(['id']);
        $ids7 = $this->get_adminson([$res7->id], [$res7->id]);
        // $arr7 = Member::whereIn('user_id',$ids7)->count();
        $gir7 = Member::whereIn('user_id', $ids7)->where('sex', '=', 1)->count();
        $boy7 = Member::whereIn('user_id', $ids7)->where('sex', '=', 0)->count();
        $res8 = User::where('name', 'like', '%文水县%')->first(['id']);
        $ids8 = $this->get_adminson([$res8->id], [$res8->id]);
        // $arr8= Member::whereIn('user_id',$ids8)->count();
        $gir8 = Member::whereIn('user_id', $ids8)->where('sex', '=', 1)->count();
        $boy8 = Member::whereIn('user_id', $ids8)->where('sex', '=', 0)->count();
        $res9 = User::where('name', 'like', '%交城县%')->first(['id']);
        $ids9 = $this->get_adminson([$res9->id], [$res9->id]);
        // $arr9 = Member::whereIn('user_id',$ids9)->count();
        $gir9 = Member::whereIn('user_id', $ids9)->where('sex', '=', 1)->count();
        $boy9 = Member::whereIn('user_id', $ids9)->where('sex', '=', 0)->count();
        $res10 = User::where('name', 'like', '%兴县%')->first(['id']);
        $ids10 = $this->get_adminson([$res10->id], [$res10->id]);
        // $arr10 = Member::whereIn('user_id',$ids10)->count();
        $gir10 = Member::whereIn('user_id', $ids10)->where('sex', '=', 1)->count();
        $boy10 = Member::whereIn('user_id', $ids10)->where('sex', '=', 0)->count();
        $res11 = User::where('name', 'like', '%临县%')->first(['id']);
        $ids11 = $this->get_adminson([$res11->id], [$res11->id]);
        // $arr11 = Member::whereIn('user_id',$ids11)->count();
        $gir11 = Member::whereIn('user_id', $ids11)->where('sex', '=', 1)->count();
        $boy11 = Member::whereIn('user_id', $ids11)->where('sex', '=', 0)->count();
        $res12 = User::where('name', 'like', '%岚县%')->first(['id']);
        $ids12 = $this->get_adminson([$res12->id], [$res12->id]);
        //$arr12 = Member::whereIn('user_id',$ids12)->count();
        $gir12 = Member::whereIn('user_id', $ids12)->where('sex', '=', 1)->count();
        $boy12 = Member::whereIn('user_id', $ids12)->where('sex', '=', 0)->count();
        $res13 = User::where('name', 'like', '%中阳县%')->first(['id']);
        $ids13 = $this->get_adminson([$res13->id], [$res13->id]);
        // $arr13 = Member::whereIn('user_id',$ids13)->count();
        $gir13 = Member::whereIn('user_id', $ids13)->where('sex', '=', 1)->count();
        $boy13 = Member::whereIn('user_id', $ids13)->where('sex', '=', 0)->count();

        $records = [$gir1,$gir2,$gir3,$gir4,$gir5,$gir6,$gir7,$gir8,$gir9,$gir10,$gir11,$gir12,$gir13];
        $records1 = [$boy1,$boy2,$boy3,$boy4,$boy5,$boy6,$boy7,$boy8,$boy9,$boy10,$boy11,$boy12,$boy13];
        $records = json_encode($records);
        $records1 = json_encode($records1);
        //$data = json_encode($data);
        return view(getThemeView('echarts.sex'), compact('records','records1'));

    }
    //党支部现状分析
    public function current()
    {
        $res1 = User::where('name', 'like', '%离石市区%')->first(['id']);
        $ids1 = $this->get_adminson([$res1->id], [$res1->id]);
        $ruan1 = User::whereIn('pid', $ids1)->where('users_type', '=', 0)->count();
        $gui1 = User::whereIn('pid', $ids1)->where('users_type', '=', 1)->count();
        $chuan1 = User::whereIn('pid', $ids1)->where('users_type', '=', 2)->count();


        $res2 = User::where('name', 'like', '%孝义市%')->first(['id']);
        $ids2 = $this->get_adminson([$res2->id], [$res2->id]);
        $ruan2= User::whereIn('pid', $ids2)->where('users_type', '=', 0)->count();
        $gui2 = User::whereIn('pid', $ids2)->where('users_type', '=', 1)->count();
        $chuan2 = User::whereIn('pid', $ids2)->where('users_type', '=', 2)->count();


        $res3 = User::where('name', 'like', '%汾阳市%')->first(['id']);
        $ids3 = $this->get_adminson([$res3->id], [$res3->id]);
        $ruan3 = User::whereIn('pid', $ids3)->where('users_type', '=', 0)->count();
        $gui3 = User::whereIn('pid', $ids3)->where('users_type', '=', 1)->count();
        $chuan3 = User::whereIn('pid', $ids3)->where('users_type', '=', 2)->count();


        $res4 = User::where('name', 'like', '%石楼县%')->first(['id']);
        $ids4 = $this->get_adminson([$res4->id], [$res4->id]);
        $ruan4 = User::whereIn('pid', $ids4)->where('users_type', '=', 0)->count();
        $gui4 = User::whereIn('pid', $ids4)->where('users_type', '=', 1)->count();
        $chuan4 = User::whereIn('pid', $ids4)->where('users_type', '=', 2)->count();


        $res5 = User::where('name', 'like', '%方山县%')->first(['id']);
        $ids5 = $this->get_adminson([$res5->id], [$res5->id]);
        $ruan5 = User::whereIn('pid', $ids5)->where('users_type', '=', 0)->count();
        $gui5 = User::whereIn('pid', $ids5)->where('users_type', '=', 1)->count();
        $chuan5 = User::whereIn('pid', $ids5)->where('users_type', '=', 2)->count();


        $res6 = User::where('name', 'like', '%柳林县%')->first(['id']);
        $ids6 = $this->get_adminson([$res6->id], [$res6->id]);
        $ruan6 = User::whereIn('pid', $ids6)->where('users_type', '=', 0)->count();
        $gui6 = User::whereIn('pid', $ids6)->where('users_type', '=', 1)->count();
        $chuan6 = User::whereIn('pid', $ids6)->where('users_type', '=', 2)->count();


        $res7 = User::where('name', 'like', '%交口县%')->first(['id']);
        $ids7 = $this->get_adminson([$res7->id], [$res7->id]);
        $ruan7 = User::whereIn('pid', $ids7)->where('users_type', '=', 0)->count();
        $gui7 = User::whereIn('pid', $ids7)->where('users_type', '=', 1)->count();
        $chuan7 = User::whereIn('pid', $ids7)->where('users_type', '=', 2)->count();


        $res8 = User::where('name', 'like', '%文水县%')->first(['id']);
        $ids8 = $this->get_adminson([$res8->id], [$res8->id]);
        $ruan8 = User::whereIn('pid', $ids8)->where('users_type', '=', 0)->count();
        $gui8 = User::whereIn('pid', $ids8)->where('users_type', '=', 1)->count();
        $chuan8 = User::whereIn('pid', $ids8)->where('users_type', '=', 2)->count();


        $res9 = User::where('name', 'like', '%交城县%')->first(['id']);
        $ids9 = $this->get_adminson([$res9->id], [$res9->id]);
        $ruan9 = User::whereIn('pid', $ids9)->where('users_type', '=', 0)->count();
        $gui9 = User::whereIn('pid', $ids9)->where('users_type', '=', 1)->count();
        $chuan9 = User::whereIn('pid', $ids9)->where('users_type', '=', 2)->count();


        $res10 = User::where('name', 'like', '%兴县%')->first(['id']);
        $ids10 = $this->get_adminson([$res10->id], [$res10->id]);
        $ruan10 = User::whereIn('pid', $ids10)->where('users_type', '=', 0)->count();
        $gui10 = User::whereIn('pid', $ids10)->where('users_type', '=', 1)->count();
        $chuan10 = User::whereIn('pid', $ids10)->where('users_type', '=', 2)->count();


        $res11 = User::where('name', 'like', '%临县%')->first(['id']);
        $ids11 = $this->get_adminson([$res11->id], [$res11->id]);
        $ruan11 = User::whereIn('pid', $ids11)->where('users_type', '=', 0)->count();
        $gui11 = User::whereIn('pid', $ids11)->where('users_type', '=', 1)->count();
        $chuan11 = User::whereIn('pid', $ids11)->where('users_type', '=', 2)->count();
        $count11 = count($ids11);


        $res12 = User::where('name', 'like', '%岚县%')->first(['id']);
        $ids12 = $this->get_adminson([$res12->id], [$res12->id]);
        $ruan12 = User::whereIn('pid', $ids12)->where('users_type', '=', 0)->count();
        $gui12 = User::whereIn('pid', $ids12)->where('users_type', '=', 1)->count();
        $chuan12 = User::whereIn('pid', $ids12)->where('users_type', '=', 2)->count();


        $res13 = User::where('name', 'like', '%中阳县%')->first(['id']);
        $ids13 = $this->get_adminson([$res13->id], [$res13->id]);
        $ruan13 = User::whereIn('pid', $ids13)->where('users_type', '=', 0)->count();
        $gui13 = User::whereIn('pid', $ids13)->where('users_type', '=', 1)->count();
        $chuan13 = User::whereIn('pid', $ids13)->where('users_type', '=', 2)->count();


        $ruan = [$ruan1,$ruan2,$ruan3,$ruan4,$ruan5,$ruan6,$ruan7,$ruan8,$ruan9,$ruan10,$ruan11,$ruan12,$ruan13];
       $gui = [$gui1,$gui2,$gui3,$gui4,$gui5,$gui6,$gui7,$gui8,$gui9,$gui10,$gui11,$gui12,$gui13];
       $chuan = [$chuan1,$chuan2,$chuan3,$chuan4,$chuan5,$chuan6,$chuan7,$chuan8,$chuan9,$chuan10,$chuan11,$chuan12,$chuan13];


        $ruan = json_encode($ruan);
        $gui = json_encode($gui);
        $chuan = json_encode($chuan);

        return view(getThemeView('echarts.current'), compact('ruan','gui','chuan'));
    }
}