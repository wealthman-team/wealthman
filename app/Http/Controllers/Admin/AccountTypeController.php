<?php

namespace App\Http\Controllers\Admin;

use App\Models\AccountType;
use App\Sources\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    protected $messages = array(
        'successAdd' => 'Account type success added',
        'successUpdate' => 'Account type success updated',
        'errorUpdate' => 'Save error account type',
        'successDelete' => 'Account type success delete',
        'errorDelete' => 'Delete error account type',
    );

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Page::setTitle('Account Types | Wealthman', $request->input('page'));
        Page::setDescription('Account Types list', $request->input('page'));

        $accountTypes = AccountType::paginate(10);

        return view('admin.accountTypes.index', [
            'accountTypes' => $accountTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Page::setTitle('Add new Account Type | Wealthman');
        Page::setDescription('Add new Account Type | Wealthman');

        return view('admin.accountTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(AccountType::rules(), AccountType::messages(), AccountType::attributes());

        AccountType::create($request->all());

        return redirect()
            ->route('admin.accountTypes.index')
            ->with('statusType', 'success')
            ->with('status', $this->messages['successAdd']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     */
    public function show(AccountType $accountType)
    {
        Page::setTitle('Show Account Type | Wealthman');
        Page::setDescription('Show Account Type | Wealthman');

        return view('admin.accountTypes.show', [
            'accountType' => $accountType,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountType $accountType)
    {
        Page::setTitle('Edit Account Type | Wealthman');
        Page::setDescription('Edit Account Type | Wealthman');

        return view('admin.accountTypes.edit', [
            'accountType' => $accountType
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountType $accountType)
    {
        $request->validate(AccountType::rules(), AccountType::messages(), AccountType::attributes());

        $accountType->fill($request->all());
        $accountType->is_active = $request->has('is_active');

        if ($accountType->save()) {
            return redirect()
                ->route('admin.accountTypes.index')
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
     * @param  \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(AccountType $accountType)
    {
        if ($accountType->delete()) {
            return redirect()
                ->route('admin.accountTypes.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['successDelete']);
        } else {
            return redirect()
                ->route('admin.accountTypes.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['errorDelete']);
        }
    }
}
