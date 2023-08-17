<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

use App\Traits\CommonMethods;

class CompanyController extends Controller
{

    use CommonMethods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.pages.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }



    public function login()
    {
        return view('company.login');
    }


    /**
     * https://medium.com/@sagarmaheshwary31/laravel-multiple-guards-authentication-middleware-login-throttle-and-password-reset-a822e26f15ac
     * Store a newly created resource in storage.
     *
     * @param  LoginCustomerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function loginProcess(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::guard('company')->attempt($credentials)) {
            $customer             = $this->guard()->user();
            return redirect(route("company.dashboard"))->withSuccess('You have successfully logged in.');
        } else {

            return redirect("login")->withSuccess('Login details are not valid');
        }
    }

    public function signOut()
    {
        Session::flush();
        $this->guard()->logout();
        return Redirect(route('company-login'));
    }
}
