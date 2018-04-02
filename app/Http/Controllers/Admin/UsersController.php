<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Hash;
class UsersController extends BaseController
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,User $user)
    {
        $this->authorize('view',$this->user);
        // 关键字过滤
        if($keyword = $request->keyword ?? ''){
            $user = $user->where('name', 'like', "%{$keyword}%");
        }

        // 开始时间过滤
        if($begin_time = $request->begin_time ?? ''){
            $user = $user->where('created_at','>',$begin_time);
        }

        // 结束时间过滤
        if($end_time = $request->end_time ?? ''){
            $user = $user->where('created_at','<',$end_time);
        }
        $users = $user->paginate(config('admin.global.paginate'));
        return view(getThemeView('users.index'),compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->user;
        $this->authorize('create',$user);
        $roles = Role::get()->pluck('name', 'remarks')->toArray();
        $userRoles = [];
        return view(getThemeView('users.create_and_edit'), compact('user','roles', 'userRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',$this->user);
        $data = $request->only(['name','email','password','introduction','status']);
        $user = $this->user->create($data);
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('users.index')->with('success', trans('global.stored'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,Role $role)
    {
        $this->authorize('update',$user);
        $roles = Role::get()->pluck('name', 'remarks')->toArray();
        $userRoles = $user->roles()->pluck('name', 'name')->toArray();
        return view(getThemeView('users.create_and_edit'), compact('user','roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update',$user);
        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);
        return redirect()->route('users.index')->with('success', trans('global.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete',$user);
        $user->delete();
        return redirect()->route('users.index')->with('success', trans('global.destoried'));
    }

    /**
     * 修改密码
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPassword(Request $request)
    {
        $this->authorize('update',$this->user);
        return view(getThemeView('users.editPassword'));
    }

    public function updatePassword(Request $request,User $user)
    {
        $this->authorize('update',$user);
        $this->passwordValidator($data = $request->all());

        if( $request->password == $request->old_password ){
            return redirect()->back()->withInput()->withErrors(trans('passwords.new_password_error'));
        }

        if( !$this->confirmedOldPassword($user, $request->old_password) ){
            return redirect()->back()->withInput()->withErrors(trans('passwords.old_password_error'));
        }


        $user->update(['password'=>$request->password]);
        return redirect()->route('users.edit', $user->id)->with('success', trans('global.updated'));
    }

    /**
     * 更新密码验证
     *
     * @param $data
     */
    protected function passwordValidator($data){
        Validator::make($data, [
            'old_password' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ],[
            'password.min' => trans('passwords.password'),
            'password.confirmed' => trans('passwords.new_password_error'),
        ])->validate();
    }

    /**
     * 检查原密码是否正确
     *
     * @param User $user
     * @param $old_password
     * @return mixed
     */
    protected function confirmedOldPassword(User $user, $old_password){
        return Hash::check($old_password, $user->password);
    }
}
