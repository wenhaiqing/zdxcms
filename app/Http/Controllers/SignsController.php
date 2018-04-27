<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignRequest;

class SignsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$signs = Sign::paginate();
		return view('signs.index', compact('signs'));
	}

    public function show(Sign $sign)
    {
        return view('signs.show', compact('sign'));
    }

	public function create(Sign $sign)
	{
		return view('signs.create_and_edit', compact('sign'));
	}

	public function store(SignRequest $request)
	{
		$sign = Sign::create($request->all());
		return redirect()->route('signs.show', $sign->id)->with('message', 'Created successfully.');
	}

	public function edit(Sign $sign)
	{
        $this->authorize('update', $sign);
		return view('signs.create_and_edit', compact('sign'));
	}

	public function update(SignRequest $request, Sign $sign)
	{
		$this->authorize('update', $sign);
		$sign->update($request->all());

		return redirect()->route('signs.show', $sign->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Sign $sign)
	{
		$this->authorize('destroy', $sign);
		$sign->delete();

		return redirect()->route('signs.index')->with('message', 'Deleted successfully.');
	}
}