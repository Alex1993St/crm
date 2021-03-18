<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CompanyEditRequest;
use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Show the application dashboard.
     * @variable $companies has 20 elements from Company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function companies()
    {
        $companies = Company::paginate(20);

        return view('admin.company.list', compact('companies'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createCompany()
    {
        return view('admin.company.create');
    }

    /**
     * Validate data and create company
     * @param CompanyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CompanyRequest $request)
    {
        $request->validated();

        Company::insert($request->except(['_token']));

        return redirect()->route('page_create_company')->with('success', true);
    }

    /**
     * Delete company by id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        Company::where('id', $request->get('id'))->delete();

        return redirect()->route('companies')->with('delete', true);
    }

    /**
     * Get company data by id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editCompany($id)
    {
        $company = Company::where('id', $id)->first();

        return view('admin.company.edit', compact('company'));
    }

    /**
     * Validate data and update company
     * @param CompanyEditRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(CompanyEditRequest $request)
    {
        $request->validated();
        $id = $request->get('id');
        Company::where('id', $request->get('id'))->update($request->except(['_token', 'id', '_method']));
        return redirect()->route('page_edit_company', ['id' => $id])->with('edit', true);
    }
}
