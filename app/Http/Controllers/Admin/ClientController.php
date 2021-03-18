<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientEditRequest;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Services\SearchService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Show client data
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clients()
    {
        $clients = Client::paginate(20);

        return view('admin.client.list', compact('clients'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createClient()
    {
        return view('admin.client.create');
    }

    /**
     * Create client and relation
     * @param ClientRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(ClientRequest $request)
    {
        $request->validated();

        $client = Client::create($request->except(['_token', 'company']));

        $client->company()->attach($request->get('company'));

        return redirect()->route('page_create_client')->with('success', true);
    }

    /**
     * Delete client by id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        Client::where('id', $request->get('id'))->delete();

        return redirect()->route('companies')->with('delete', true);
    }

    /**
     * Show client page for edit by id client
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editClient($id)
    {
        $client = Client::where('id', $id)->with('company')->first();

        return view('admin.client.edit', compact('client'));
    }

    /**
     * @param ClientEditRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(ClientEditRequest $request)
    {
        $request->validated();

        $id = $request->get('id');

        Client::updateClient($request, $id);

        return redirect()->route('page_edit_client', ['id' => $id])->with('edit', true);
    }

    /**
     * Search company by name
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
         $companies = SearchService::searchCompany($request->get('name'));
         return view('admin.client.select', compact('companies'));
    }
}
