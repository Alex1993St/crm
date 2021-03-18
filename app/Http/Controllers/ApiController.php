<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    /**
     * Return api_token for test api
     * @param Request $request
     * @return array
     */
    public function update(Request $request)
    {
        $token = Str::random(80);

        $hash_token = hash('sha256', $token);

        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return [
            'token' => $token,
            'api_token' => $hash_token
        ];
    }

    /**
     * @return company with pagination
     */
    public function getCompanies()
    {
        return Company::paginate(20);
    }

    /**
     * @param $id
     * @return company by id with relation client in pagination
     */
    public function getClients($id)
    {
        return Company::where('id', $id)->with('client')->paginate(20);
    }

    /**
     * @param $id
     * @return client by in with relation company in pagination
     */
    public function getClientCompanies($id)
    {
        return Client::where('id', $id)->with('company')->paginate(20);
    }
}
