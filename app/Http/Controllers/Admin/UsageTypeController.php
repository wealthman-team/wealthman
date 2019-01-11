<?php

namespace App\Http\Controllers\Admin;

use App\UsageType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sources\Page;

class UsageTypeController extends Controller
{
    protected $messages = array(
        'successAdd' => 'Usage type success added',
        'successUpdate' => 'Usage type success updated',
        'errorUpdate' => 'Save error usage type',
        'successDelete' => 'Usage type success delete',
        'errorDelete' => 'Delete error usage type',
    );

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Page::setTitle('Usage Types | Wealthman', $request->input('page'));
        Page::setDescription('Usage Types list', $request->input('page'));

        $usageTypes = UsageType::paginate(10);

        return view('admin.usageTypes.index', [
            'usageTypes' => $usageTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Page::setTitle('Add new Usage Type | Wealthman');
        Page::setDescription('Add new Usage Type | Wealthman');

        return view('admin.usageTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(UsageType::rules(), UsageType::messages(), UsageType::attributes());

        UsageType::create($request->all());

        return redirect()
            ->route('admin.usageTypes.index')
            ->with('statusType', 'success')
            ->with('status', $this->messages['successAdd']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UsageType $usageType
     * @return \Illuminate\Http\Response
     */
    public function show(UsageType $usageType)
    {
        return view('admin.usageTypes.show', [
            'usageType' => $usageType,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UsageType $usageType
     * @return \Illuminate\Http\Response
     */
    public function edit(UsageType $usageType)
    {
        Page::setTitle('Edit Usage Type | Wealthman');
        Page::setDescription('Edit Usage Type | Wealthman');

        return view('admin.usageTypes.edit', [
            'usageType' => $usageType
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UsageType $usageType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsageType $usageType)
    {
        $request->validate(UsageType::rules(), UsageType::messages(), UsageType::attributes());

        $usageType->fill($request->all());
        $usageType->is_active = $request->has('is_active');

        if ($usageType->save()) {
            return redirect()
                ->route('admin.usageTypes.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['successUpdate']);
        } else {
            return back()
                ->withInput()
                ->with('statusType', 'success')
                ->with('status', $this->messages['errorUpdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UsageType $usageType
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(UsageType $usageType)
    {
        if ($usageType->delete()) {
            return redirect()
                ->route('admin.usageTypes.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['successDelete']);
        } else {
            return redirect()
                ->route('admin.usageTypes.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['errorDelete']);
        }
    }
}
