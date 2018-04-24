<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $ll = User::create([
            'name' => '吕梁市',
            'email' => 'lls@lls.com',
            'pid' => 0,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $ll->assignRole('Administrator');
        $lishi = User::create([
            'name' => '离石市区',
            'email' => 'lsq@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lishi->assignRole('member');
        $lishi_wcz = User::create([
            'name' => '吴城镇',
            'email' => 'lsq_wcz@lls.com',
            'pid' => $lishi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lishi_wcz->assignRole('member');
        $lishi_xyz = User::create([
            'name' => '信义镇',
            'email' => 'lsq_xyz@lls.com',
            'pid' => $lishi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lishi_xyz->assignRole('member');
        $lishi_hycx = User::create([
            'name' => '红眼川乡',
            'email' => 'lsq_wycx@lls.com',
            'pid' => $lishi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lishi_hycx->assignRole('member');
        $lishi_lsq = User::create([
            'name' => '离石区',
            'email' => 'lsq_lsq@lls.com',
            'pid' => $lishi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lishi_lsq->assignRole('member');
        $lishi_zlx = User::create([
            'name' => '枣林乡',
            'email' => 'lsq_zlx@lls.com',
            'pid' => $lishi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lishi_zlx->assignRole('member');
        $lishi_ptx = User::create([
            'name' => '坪头乡',
            'email' => 'lsq_ptx@lls.com',
            'pid' => $lishi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lishi_ptx->assignRole('member');

        $xiaoyi = User::create([
            'name' => '孝义市',
            'email' => 'xys@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xiaoyi->assignRole('member');
        $daxiaobao = User::create([
            'name' => '大孝堡乡',
            'email' => 'xy_dxbx@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $daxiaobao->assignRole('member');
        $xy_xiyi = User::create([
            'name' => '新义',
            'email' => 'xy_xiyi@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_xiyi->assignRole('member');
        $xy_chunwen = User::create([
            'name' => '崇文',
            'email' => 'xy_chunwen@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_chunwen->assignRole('member');
        $xy_zhongyanglou = User::create([
            'name' => '中阳楼',
            'email' => 'xy_zhongyanglou@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_zhongyanglou->assignRole('member');

        $xy_zhenxing = User::create([
            'name' => '振兴',
            'email' => 'xy_zhenxing@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_zhenxing->assignRole('member');

        $xy_dongxu = User::create([
            'name' => '东许',
            'email' => 'xy_dongxu@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_dongxu->assignRole('member');

        $xy_duizhen = User::create([
            'name' => '兑镇镇',
            'email' => 'xy_duizhen@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_duizhen->assignRole('member');

        $xy_yangquanqu = User::create([
            'name' => '阳泉曲镇',
            'email' => 'xy_yangquanqu@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_yangquanqu->assignRole('member');

        $xy_xiabao= User::create([
            'name' => '下堡镇',
            'email' => 'xy_xiabao@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_xiabao->assignRole('member');

        $xy_xixinzhuang = User::create([
            'name' => '西辛庄镇',
            'email' => 'xy_xixinzhuang@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_xixinzhuang->assignRole('member');

        $xy_gaoyang = User::create([
            'name' => '高阳镇',
            'email' => 'xy_gaoyang@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_gaoyang->assignRole('member');

        $xy_wutong = User::create([
            'name' => '梧桐镇',
            'email' => 'xy_wutong@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_wutong->assignRole('member');

        $xy_zhupu = User::create([
            'name' => '柱濮镇',
            'email' => 'xy_zhupu@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_zhupu->assignRole('member');

        $xy_xiace = User::create([
            'name' => '下栅乡',
            'email' => 'xy_xiace@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_xiace->assignRole('member');

        $xy_yima = User::create([
            'name' => '驿马乡',
            'email' => 'xy_yima@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_yima->assignRole('member');

        $xy_nanyang = User::create([
            'name' => '南阳乡',
            'email' => 'xy_nanyang@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_nanyang->assignRole('member');

        $xy_ducun = User::create([
            'name' => '杜村乡',
            'email' => 'xy_ducun@lls.com',
            'pid' => $xiaoyi->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xy_ducun->assignRole('member');


        $fenyang = User::create([
            'name' => '汾阳市',
            'email' => 'fys@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fenyang->assignRole('member');
        $fy_taiheqiao = User::create([
            'name' => '太和桥街道',
            'email' => 'fy_taiheqiao@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_taiheqiao->assignRole('member');

        $fy_wenfeng = User::create([
            'name' => '文峰街道',
            'email' => 'fy_wenfengjiedao@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_wenfeng->assignRole('member');

        $fy_nanxun = User::create([
            'name' => '南薰街道',
            'email' => 'fy_nanxun@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_nanxun->assignRole('member');

        $fy_xihe = User::create([
            'name' => '西河街道',
            'email' => 'fy_xihe@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_xihe->assignRole('member');

        $fy_chenbei = User::create([
            'name' => '辰北街道',
            'email' => 'fy_chenbei@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_chenbei->assignRole('member');

        $fy_xinghuacun = User::create([
            'name' => '杏花村镇',
            'email' => 'fy_xinghuacun@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_xinghuacun->assignRole('member');

        $fy_jiajiazhuang = User::create([
            'name' => '贾家庄镇',
            'email' => 'fy_jiajiazhuang@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_jiajiazhuang->assignRole('member');

        $fy_yangjiazhuang = User::create([
            'name' => '杨家庄镇',
            'email' => 'fy_yangjiazhuang@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_yangjiazhuang->assignRole('member');

        $fy_yudaohe = User::create([
            'name' => '峪道河镇',
            'email' => 'fy_yudaohe@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_yudaohe->assignRole('member');

        $fy_jicun = User::create([
            'name' => '冀村镇',
            'email' => 'fy_jicun@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_jicun->assignRole('member');

        $fy_xiaojiazhuang = User::create([
            'name' => '肖家庄镇',
            'email' => 'fy_xiaojiazhuang@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_xiaojiazhuang->assignRole('member');

        $fy_yanwu = User::create([
            'name' => '演武镇',
            'email' => 'fy_yanwu@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_yanwu->assignRole('member');

        $fy_sanquan = User::create([
            'name' => '三泉镇',
            'email' => 'fy_sanquan@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_sanquan->assignRole('member');

        $fy_shizhuang = User::create([
            'name' => '石庄镇',
            'email' => 'fy_shizhuang@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_shizhuang->assignRole('member');

        $fy_yangcheng = User::create([
            'name' => '阳城乡',
            'email' => 'fy_yangcheng@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_yangcheng->assignRole('member');

        $fy_lijiazhuang = User::create([
            'name' => '栗家庄乡',
            'email' => 'fy_lijiazhuang@lls.com',
            'pid' => $fenyang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fy_lijiazhuang->assignRole('member');



        $shilou = User::create([
            'name' => '石楼县',
            'email' => 'slx@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $shilou->assignRole('member');

        $sl_lingquan = User::create([
            'name' => '灵泉镇',
            'email' => 'sl_lingquan@lls.com',
            'pid' => $shilou->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $sl_lingquan->assignRole('member');

        $sl_xinguan = User::create([
            'name' => '辛关乡',
            'email' => 'sl_xinguan@lls.com',
            'pid' => $shilou->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $sl_xinguan->assignRole('member');

        $sl_luocun = User::create([
            'name' => '罗村镇',
            'email' => 'sl_luocun@lls.com',
            'pid' => $shilou->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $sl_luocun->assignRole('member');


        $sl_yidie = User::create([
            'name' => '义牒镇',
            'email' => 'sl_yidie@lls.com',
            'pid' => $shilou->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $sl_yidie->assignRole('member');


        $sl_xiaosuan = User::create([
            'name' => '小蒜镇',
            'email' => 'sl_xiaosuan@lls.com',
            'pid' => $shilou->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $sl_xiaosuan->assignRole('member');


        $sl_longjiao = User::create([
            'name' => '龙交乡',
            'email' => 'sl_longjiao@lls.com',
            'pid' => $shilou->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $sl_longjiao->assignRole('member');


        $sl_hehe = User::create([
            'name' => '和合乡',
            'email' => 'sl_hehe@lls.com',
            'pid' => $shilou->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $sl_hehe->assignRole('member');


        $sl_qianshan = User::create([
            'name' => '前山乡',
            'email' => 'sl_qianshan@lls.com',
            'pid' => $shilou->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $sl_qianshan->assignRole('member');


        $sl_caojiayuan = User::create([
            'name' => '曹家垣乡',
            'email' => 'sl_caojiayuan@lls.com',
            'pid' => $shilou->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $sl_caojiayuan->assignRole('member');


        $sl_peigou= User::create([
            'name' => '裴沟乡',
            'email' => 'sl_peigou@lls.com',
            'pid' => $shilou->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $sl_peigou->assignRole('member');

        $fanshang = User::create([
            'name' => '方山县',
            'email' => 'fsx@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fanshang->assignRole('member');

       $fs_mafang= User::create([
           'name' => '马坊镇',
           'email' => 'fs_mafang@lls.com',
           'pid' => $fanshang->id,
           'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
           'remember_token' => str_random(10),
           'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
           'created_at' => $now,
           'updated_at' => $now,
       ]);
        $fs_mafang->assignRole('member');

        $fs_jicui= User::create([
            'name' => '积翠乡',
            'email' => 'fs_jicui@lls.com',
            'pid' => $fanshang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fs_jicui->assignRole('member');

        $fs_madihui= User::create([
            'name' => '麻地会乡',
            'email' => 'fs_madihui@lls.com',
            'pid' => $fanshang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fs_madihui->assignRole('member');

        $fs_gedong= User::create([
            'name' => '圪洞镇',
            'email' => 'fs_gedong@lls.com',
            'pid' => $fanshang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fs_gedong->assignRole('member');

        $fs_yukou= User::create([
            'name' => '峪口镇',
            'email' => 'fs_yukou@lls.com',
            'pid' => $fanshang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fs_yukou->assignRole('member');

        $fs_beiwudang= User::create([
            'name' => '北武当镇',
            'email' => 'fs_beiwudang@lls.com',
            'pid' => $fanshang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fs_beiwudang->assignRole('member');

        $fs_dawu= User::create([
            'name' => '大武镇',
            'email' => 'fs_dawu@lls.com',
            'pid' => $fanshang->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $fs_dawu->assignRole('member');

        $liulin = User::create([
            'name' => '柳林县',
            'email' => 'llx@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $liulin->assignRole('member');

         $ll_liulin= User::create([
             'name' => '柳林镇',
             'email' => 'll_liulin@lls.com',
             'pid' => $liulin->id,
             'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
             'remember_token' => str_random(10),
             'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
             'created_at' => $now,
             'updated_at' => $now,
         ]);
        $ll_liulin->assignRole('member');

          $ll_mucun= User::create([
              'name' => '穆村镇',
              'email' => 'll_mucun@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_mucun->assignRole('member');

          $ll_xuecun= User::create([
              'name' => '薛村镇',
              'email' => 'll_xuecun@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_xuecun->assignRole('member');

          $ll_zhuangshang= User::create([
              'name' => '庄上镇',
              'email' => 'll_zhuangshang@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_zhuangshang->assignRole('member');

          $ll_liuyu= User::create([
              'name' => '留誉镇',
              'email' => 'll_liuyu@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_liuyu->assignRole('member');

          $ll_sanjiao= User::create([
              'name' => '三交镇',
              'email' => 'll_sanjiao@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_sanjiao->assignRole('member');

          $ll_chengjiazhuang= User::create([
              'name' => '成家庄镇',
              'email' => 'll_chengjiazhuang@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_chengjiazhuang->assignRole('member');

          $ll_mengmen= User::create([
              'name' => '孟门镇',
              'email' => 'll_mengmen@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_mengmen->assignRole('member');

          $ll_lijiawan= User::create([
              'name' => '李家湾乡',
              'email' => 'll_lijiawan@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_lijiawan->assignRole('member');

          $ll_jiajiayuan= User::create([
              'name' => '贾家垣乡',
              'email' => 'll_jiajiayuan@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_jiajiayuan->assignRole('member');

          $ll_chengjiawan= User::create([
              'name' => '陈家湾乡',
              'email' => 'll_chengjiawan@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_chengjiawan->assignRole('member');

          $ll_jinjiazhuang= User::create([
              'name' => '金家庄乡',
              'email' => 'll_jinjiazhuang@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_jinjiazhuang->assignRole('member');

          $ll_gaojiagou= User::create([
              'name' => '高家沟乡',
              'email' => 'll_gaojiagou@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_gaojiagou->assignRole('member');

          $ll_wangjiagou= User::create([
              'name' => '王家沟乡',
              'email' => 'll_wangjiagou@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_wangjiagou->assignRole('member');

          $ll_shixi= User::create([
              'name' => '石西乡',
              'email' => 'll_shixi@lls.com',
              'pid' => $liulin->id,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
              'remember_token' => str_random(10),
              'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
              'created_at' => $now,
              'updated_at' => $now,
          ]);
        $ll_shixi->assignRole('member');


        $jiaokou = User::create([
            'name' => '交口县',
            'email' => 'jkx@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jiaokou->assignRole('member');

        $jk_wenquan= User::create([
            'name' => '温泉乡',
            'email' => 'jk_wenquan@lls.com',
            'pid' => $jiaokou->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jk_wenquan->assignRole('member');
                $jk_taohongpo= User::create([
                    'name' => '桃红坡镇',
                    'email' => 'jk_taohongpo@lls.com',
                    'pid' => $jiaokou->id,
                    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                    'remember_token' => str_random(10),
                    'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
        $jk_taohongpo->assignRole('member');
                $jk_shuitou= User::create([
                    'name' => '水头镇',
                    'email' => 'jk_shuitou@lls.com',
                    'pid' => $jiaokou->id,
                    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                    'remember_token' => str_random(10),
                    'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
        $jk_shuitou->assignRole('member');
                $jk_shikoui= User::create([
                    'name' => '石口乡',
                    'email' => 'jk_shikoui@lls.com',
                    'pid' => $jiaokou->id,
                    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                    'remember_token' => str_random(10),
                    'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
        $jk_shikoui->assignRole('member');
                $jk_huilong= User::create([
                    'name' => '回龙乡',
                    'email' => 'jk_huilong@lls.com',
                    'pid' => $jiaokou->id,
                    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                    'remember_token' => str_random(10),
                    'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
        $jk_huilong->assignRole('member');
                $jk_shuangchi= User::create([
                    'name' => '双池镇',
                    'email' => 'jk_shuangchi@lls.com',
                    'pid' => $jiaokou->id,
                    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                    'remember_token' => str_random(10),
                    'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
        $jk_shuangchi->assignRole('member');
                $jk_kangcheng= User::create([
                    'name' => '康城镇',
                    'email' => 'jk_kangcheng@lls.com',
                    'pid' => $jiaokou->id,
                    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                    'remember_token' => str_random(10),
                    'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
        $jk_kangcheng->assignRole('member');



        $wenshui = User::create([
            'name' => '文水县',
            'email' => 'wsx@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $wenshui->assignRole('member');

         $ws_fengcheng= User::create([
             'name' => '凤城镇',
             'email' => 'ws_fengcheng@lls.com',
             'pid' => $wenshui->id,
             'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
             'remember_token' => str_random(10),
             'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
             'created_at' => $now,
             'updated_at' => $now,
         ]);
        $ws_fengcheng->assignRole('member');

        $ws_kaice= User::create([
            'name' => '开栅镇',
            'email' => 'ws_kaice@lls.com',
            'pid' => $wenshui->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $ws_kaice->assignRole('member');

        $ws_nanzhuang= User::create([
            'name' => '南庄镇',
            'email' => 'ws_nanzhuang@lls.com',
            'pid' => $wenshui->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $ws_nanzhuang->assignRole('member');

        $ws_nanan= User::create([
            'name' => '南安镇',
            'email' => 'jk_nanan@lls.com',
            'pid' => $wenshui->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $ws_nanan->assignRole('member');

        $ws_liuhulang= User::create([
            'name' => '刘胡兰镇',
            'email' => 'ws_liuhulang@lls.com',
            'pid' => $wenshui->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $ws_liuhulang->assignRole('member');

        $ws_xiaqu= User::create([
            'name' => '下曲镇',
            'email' => 'ws_xiaqu@lls.com',
            'pid' => $wenshui->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $ws_xiaqu->assignRole('member');

        $ws_xiaoyi= User::create([
            'name' => '孝义镇',
            'email' => 'ws_xiaoyi@lls.com',
            'pid' => $wenshui->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $ws_xiaoyi->assignRole('member');

        $ws_nanwu= User::create([
            'name' => '南武乡',
            'email' => 'ws_nanwu@lls.com',
            'pid' => $wenshui->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $ws_nanwu->assignRole('member');

        $ws_xicheng= User::create([
            'name' => '西城乡',
            'email' => 'ws_xicheng@lls.com',
            'pid' => $wenshui->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $ws_xicheng->assignRole('member');

        $ws_beizhang= User::create([
            'name' => '北张乡',
            'email' => 'ws_beizhang@lls.com',
            'pid' => $wenshui->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $ws_beizhang->assignRole('member');

        $ws_maxi= User::create([
            'name' => '马西乡',
            'email' => 'ws_maxi@lls.com',
            'pid' => $wenshui->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $ws_maxi->assignRole('member');

        $ws_xicaotou= User::create([
            'name' => '西槽头乡',
            'email' => 'ws_xicaotou@lls.com',
            'pid' => $wenshui->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $ws_xicaotou->assignRole('member');



        $jiaochen = User::create([
            'name' => '交城县',
            'email' => 'jcx@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jiaochen->assignRole('member');

        $jc_pangquangou= User::create([
             'name' => '庞泉沟镇',
             'email' => 'jc_pangquangou@lls.com',
             'pid' => $jiaochen->id,
             'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
             'remember_token' => str_random(10),
             'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
             'created_at' => $now,
             'updated_at' => $now,
         ]);
        $jc_pangquangou->assignRole('member');

        $jc_dongpodi= User::create([
            'name' => '东坡底乡',
            'email' => 'jc_dongpodi@lls.com',
            'pid' => $jiaochen->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jc_dongpodi->assignRole('member');

        $jc_huili= User::create([
            'name' => '会立乡',
            'email' => 'jc_huili@lls.com',
            'pid' => $jiaochen->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jc_huili->assignRole('member');

        $jc_shuiyuguan= User::create([
            'name' => '水峪贯乡',
            'email' => 'jc_shuiyuguan@lls.com',
            'pid' => $jiaochen->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jc_shuiyuguan->assignRole('member');

        $jc_xishe= User::create([
            'name' => '西社镇',
            'email' => 'jc_xishe@lls.com',
            'pid' => $jiaochen->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jc_xishe->assignRole('member');

        $jc_lingdi= User::create([
            'name' => '岭底乡',
            'email' => 'jc_lingdi@lls.com',
            'pid' => $jiaochen->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jc_lingdi->assignRole('member');

        $jc_hongxiang= User::create([
            'name' => '洪相乡',
            'email' => 'jc_hongxiang@lls.com',
            'pid' => $jiaochen->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jc_hongxiang->assignRole('member');

        $jc_tianning= User::create([
            'name' => '天宁镇',
            'email' => 'jc_tianning@lls.com',
            'pid' => $jiaochen->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jc_tianning->assignRole('member');

        $jc_xiying= User::create([
            'name' => '西营镇',
            'email' => 'jc_xiying@lls.com',
            'pid' => $jiaochen->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jc_xiying->assignRole('member');

        $jc_xiajiaying= User::create([
            'name' => '夏家营镇',
            'email' => 'jc_xiajiaying@lls.com',
            'pid' => $jiaochen->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jc_xiajiaying->assignRole('member');

        $jc_shentai= User::create([
            'name' => '夏家营生态工业园区管委会',
            'email' => 'jc_shentai@lls.com',
            'pid' => $jiaochen->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $jc_shentai->assignRole('member');

        $xingxian = User::create([
            'name' => '兴县',
            'email' => 'xx@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xingxian->assignRole('member');

        $xx_xcaijiaya= User::create([
            'name' => '蔡家崖乡',
            'email' => 'xx_xcaijiaya@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_xcaijiaya->assignRole('member');

        $xx_hejiahui= User::create([
            'name' => '贺家会乡',
            'email' => 'xx_hejiahui@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_hejiahui->assignRole('member');

        $xx_mengjiaping= User::create([
            'name' => '孟家坪乡',
            'email' => 'xx_mengjiaping@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_mengjiaping->assignRole('member');

        $xx_zhaojiaping= User::create([
            'name' => '赵家坪乡',
            'email' => 'xx_zhaojiaping@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_zhaojiaping->assignRole('member');

        $xx_gedasahng= User::create([
            'name' => '圪垯上乡',
            'email' => 'xx_gedasahng@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_gedasahng->assignRole('member');

        $xx_aojiawan= User::create([
            'name' => '奥家湾乡',
            'email' => 'xx_aojiawan@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_aojiawan->assignRole('member');

        $xx_guxian= User::create([
            'name' => '固贤乡',
            'email' => 'xx_guxian@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_guxian->assignRole('member');

        $xx_donghui= User::create([
            'name' => '东会乡',
            'email' => 'xx_donghui@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_donghui->assignRole('member');

        $xx_ehutan= User::create([
            'name' => '恶虎滩乡',
            'email' => 'xx_ehutan@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_ehutan->assignRole('member');

        $xx_jiaoloushen= User::create([
            'name' => '交楼申乡',
            'email' => 'xx_jiaoloushen@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_jiaoloushen->assignRole('member');

        $xx_caijiahui= User::create([
            'name' => '蔡家会镇',
            'email' => 'xx_caijiahui@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_caijiahui->assignRole('member');

        $xx_luoyukou= User::create([
            'name' => '罗峪口镇',
            'email' => 'xx_luoyukou@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_luoyukou->assignRole('member');

        $xx_gaojiacun= User::create([
            'name' => '高家村镇',
            'email' => 'xx_gaojiacun@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_gaojiacun->assignRole('member');

        $xx_kangning= User::create([
            'name' => '康宁镇',
            'email' => 'xx_kangning@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_kangning->assignRole('member');

        $xx_watang= User::create([
            'name' => '瓦塘镇',
            'email' => 'xx_watang@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_watang->assignRole('member');

        $xx_weijiatan= User::create([
            'name' => '魏家滩镇',
            'email' => 'xx_weijiatan@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_weijiatan->assignRole('member');

        $xx_weifen= User::create([
            'name' => '蔚汾镇',
            'email' => 'xx_weifen@lls.com',
            'pid' => $xingxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $xx_weifen->assignRole('member');

        $linxian = User::create([
            'name' => '临县',
            'email' => 'lx@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $linxian->assignRole('member');

        $lx_chengneijiedao= User::create([
            'name' => '城内街道',
            'email' => 'lx_chengneijiedao@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_chengneijiedao->assignRole('member');

        $lx_baiwenjiedao= User::create([
            'name' => '白文街道',
            'email' => 'lx_baiwenjiedao@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_baiwenjiedao->assignRole('member');

        $lx_sanjiaojiedao= User::create([
            'name' => '三交街道',
            'email' => 'lx_sanjiaojiedao@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_sanjiaojiedao->assignRole('member');

        $lx_qikoujiedao= User::create([
            'name' => '碛口街道',
            'email' => 'lx_qikoujiedao@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_qikoujiedao->assignRole('member');

        $lx_linquan= User::create([
            'name' => '临泉镇',
            'email' => 'lx_linquan@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_linquan->assignRole('member');

        $lx_baiwen= User::create([
            'name' => '白文镇',
            'email' => 'lx_baiwen@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_baiwen->assignRole('member');

        $lx_tuban= User::create([
            'name' => '兔板镇',
            'email' => 'lx_tuban@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_tuban->assignRole('member');

        $lx_kehu= User::create([
            'name' => '克虎镇',
            'email' => 'lx_kehu@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_kehu->assignRole('member');

        $lx_sanjiao= User::create([
            'name' => '三交镇',
            'email' => 'lx_sanjiao@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_sanjiao->assignRole('member');

        $lx_tuanshuitou= User::create([
            'name' => '湍水头镇',
            'email' => 'lx_tuanshuitou@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_tuanshuitou->assignRole('member');

        $lx_linjiaping= User::create([
            'name' => '林家坪镇',
            'email' => 'lx_linjiaping@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_linjiaping->assignRole('member');

        $lx_zhaoxian= User::create([
            'name' => '招贤镇',
            'email' => 'lx_zhaoxian@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_zhaoxian->assignRole('member');

        $lx_qikou= User::create([
            'name' => '碛口镇',
            'email' => 'lx_qikou@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_qikou->assignRole('member');

        $lx_liujiahui= User::create([
            'name' => '刘家会镇',
            'email' => 'lx_liujiahui@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_liujiahui->assignRole('member');

        $lx_conluoyu= User::create([
            'name' => '丛罗峪镇',
            'email' => 'lx_conluoyu@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_conluoyu->assignRole('member');

        $lx_quyu= User::create([
            'name' => '曲峪镇',
            'email' => 'lx_quyu@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_quyu->assignRole('member');

        $lx_muguaping= User::create([
            'name' => '木瓜坪镇乡',
            'email' => 'lx_muguaping@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_muguaping->assignRole('member');

        $lx_anye= User::create([
            'name' => '安业乡',
            'email' => 'lx_anye@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_anye->assignRole('member');

        $lx_yuping= User::create([
            'name' => '玉坪乡',
            'email' => 'lx_yuping@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_yuping->assignRole('member');

        $lx_qingliangsi= User::create([
            'name' => '青凉寺乡',
            'email' => 'lx_qingliangsi@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_qingliangsi->assignRole('member');

        $lx_shibaitou= User::create([
            'name' => '石白头乡',
            'email' => 'lx_shibaitou@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_shibaitou->assignRole('member');

        $lx_leijiaqi= User::create([
            'name' => '雷家碛乡',
            'email' => 'lx_leijiaqi@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_leijiaqi->assignRole('member');

        $lx_dibabao= User::create([
            'name' => '第八堡乡',
            'email' => 'lx_dibabao@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_dibabao->assignRole('member');

        $lx_dayu= User::create([
            'name' => '大禹乡',
            'email' => 'lx_dayu@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_dayu->assignRole('member');

        $lx_chegan= User::create([
            'name' => '车赶乡',
            'email' => 'lx_chegan@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_chegan->assignRole('member');

        $lx_anjiazhuang= User::create([
            'name' => '安家庄乡',
            'email' => 'lx_anjiazhuang@lls.com',
            'pid' => $linxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_anjiazhuang->assignRole('member');



        $lanxian = User::create([
            'name' => '岚县',
            'email' => 'lanx@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $lx_jiehekou= User::create([
            'name' => '界河口镇',
            'email' => 'lx_jiehekou@lls.com',
            'pid' => $lanxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_jiehekou->assignRole('member');

        $lx_hekou= User::create([
            'name' => '河口乡',
            'email' => 'lx_hekou@lls.com',
            'pid' => $lanxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_hekou->assignRole('member');

        $lx_dashetou= User::create([
            'name' => '大蛇头乡',
            'email' => 'lx_dashetou@lls.com',
            'pid' => $lanxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_dashetou->assignRole('member');

        $lx_lancheng= User::create([
            'name' => '岚城镇',
            'email' => 'lx_lancheng@lls.com',
            'pid' => $lanxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_lancheng->assignRole('member');

        $lx_shangming= User::create([
            'name' => '上明乡',
            'email' => 'lx_shangming@lls.com',
            'pid' => $lanxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_shangming->assignRole('member');

        $lx_tuyu= User::create([
            'name' => '土峪乡',
            'email' => 'lx_tuyu@lls.com',
            'pid' => $lanxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_tuyu->assignRole('member');

        $lx_shuihui= User::create([
            'name' => '顺会乡',
            'email' => 'lx_shuihui@lls.com',
            'pid' => $lanxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_shuihui->assignRole('member');

        $lx_puming= User::create([
            'name' => '普明镇',
            'email' => 'lx_puming@lls.com',
            'pid' => $lanxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_puming->assignRole('member');

        $lx_dongcum= User::create([
            'name' => '东村镇',
            'email' => 'lx_dongcum@lls.com',
            'pid' => $lanxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_dongcum->assignRole('member');

        $lx_sheke= User::create([
            'name' => '社科乡',
            'email' => 'lx_sheke@lls.com',
            'pid' => $lanxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_sheke->assignRole('member');

        $lx_wangshi= User::create([
            'name' => '王狮乡',
            'email' => 'lx_wangshi@lls.com',
            'pid' => $lanxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_wangshi->assignRole('member');

        $lx_liangjiazhuang= User::create([
            'name' => '梁家庄乡',
            'email' => 'lx_liangjiazhuang@lls.com',
            'pid' => $lanxian->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $lx_liangjiazhuang->assignRole('member');


        $lanxian->assignRole('member');
        $zhongyan = User::create([
            'name' => '中阳县',
            'email' => 'zyx@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $zhongyan->assignRole('member');

        $zy_nuanquan= User::create([
            'name' => '暖泉镇',
            'email' => 'zy_nuanquan@lls.com',
            'pid' => $zhongyan->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $zy_nuanquan->assignRole('member');

        $zy_wujiazhuang= User::create([
            'name' => '武家庄镇',
            'email' => 'zy_wujiazhuang@lls.com',
            'pid' => $zhongyan->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $zy_wujiazhuang->assignRole('member');

        $zy_ningxiang= User::create([
            'name' => '宁乡镇',
            'email' => 'zy_ningxiang@lls.com',
            'pid' => $zhongyan->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $zy_ningxiang->assignRole('member');

        $zy_xiazaolin= User::create([
            'name' => '下枣林镇',
            'email' => 'zy_xiazaolin@lls.com',
            'pid' => $zhongyan->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $zy_xiazaolin->assignRole('member');

        $zy_linluo= User::create([
            'name' => '金罗镇',
            'email' => 'zy_linluo@lls.com',
            'pid' => $zhongyan->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $zy_linluo->assignRole('member');

        $zy_zhangzisahn= User::create([
            'name' => '张子山乡',
            'email' => 'zy_zhangzisahn@lls.com',
            'pid' => $zhongyan->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $zy_zhangzisahn->assignRole('member');

        $zy_zhike= User::create([
            'name' => '枝柯镇',
            'email' => 'zy_zhike@lls.com',
            'pid' => $zhongyan->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $zy_zhike->assignRole('member');




        $shizhige = User::create([
            'name' => '市直各工党委',
            'email' => 'szggdw@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
            'if_zhi' => 1,
        ]);
        $shizhige->assignRole('member');
        $liliujiaomei = User::create([
            'name' => '中国共产党山西离柳焦煤集团有限公司委员会',
            'email' => 'lljm@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
            'if_zhi' => 1,
        ]);
        $liliujiaomei->assignRole('member');
        $lvliangzhufang = User::create([
            'name' => '吕梁市住房公积金管理中心党支部',
            'email' => 'llzf@lls.com',
            'pid' => $ll->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'introduction' => '吕梁智慧党建云平台',//随机生成小段落文本
            'created_at' => $now,
            'updated_at' => $now,
            'if_zhi' => 1,
        ]);
        $lvliangzhufang->assignRole('member');

    }
}
