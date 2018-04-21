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
