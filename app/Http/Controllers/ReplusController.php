<?php

namespace App\Http\Controllers;

use App\Models\Replu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RepluRequest;

class ReplusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$replus = Replu::paginate();
		return view('replus.index', compact('replus'));
	}

    public function show(Replu $replu)
    {
        return view('replus.show', compact('replu'));
    }

	public function create(Replu $replu)
	{
		return view('replus.create_and_edit', compact('replu'));
	}

	public function store(RepluRequest $request)
	{
		$replu = Replu::create($request->all());
		return redirect()->route('replus.show', $replu->id)->with('message', 'Created successfully.');
	}

	public function edit(Replu $replu)
	{
        $this->authorize('update', $replu);
		return view('replus.create_and_edit', compact('replu'));
	}

	public function update(RepluRequest $request, Replu $replu)
	{
		$this->authorize('update', $replu);
		$replu->update($request->all());

		return redirect()->route('replus.show', $replu->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Replu $replu)
	{
		$this->authorize('destroy', $replu);
		$replu->delete();

		return redirect()->route('replus.index')->with('message', 'Deleted successfully.');
	}
}