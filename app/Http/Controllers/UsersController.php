<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Company;
use Auth;

class UsersController extends Controller
{

    public function index()
    {

        $user = Auth::user();
        return view('users.index',compact('user'));
    }

    public function companiesIndex($user_id){

        $user = Auth::user();
        $companies = (new Company)->getByUsers($user->id);

        $data=[
            'user' => $user,
            'companies' => $companies,
        ];
        return view('users.companies.index',$data);
    }

    public function companiesCreate($user_id)
    {

        $user = Auth::user();
        $sections = (new Section())->getOrderByName();

        $data=[
            'user' => $user,
            'sections' => $sections,
        ];

        return view('users.companies.create',$data);
    }

    public function companiesStore(Request $request, $user_id)
    {

        $companyArray = $request->all();
        (new Company())->store($companyArray);

        return redirect(route('users.companies.index'));
    }

    public function companiesEdit($user_id, $company_id)
    {

        $company = (new Company())->findCompany($company_id);
        return view('users.companies.edit', companct($company));
    }



    public function companiesUpdate(Request $request, $user_id, $company_id)
    {

        $companyArray = $request->all();
        (new Company())->update($companyArray, $company_id);

        return redirect(route('users.companies.index'));
    }
}
