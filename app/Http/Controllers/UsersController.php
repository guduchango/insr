<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Phone;
use App\Models\Section;
use App\User;
use Illuminate\Http\Request;
use App\Models\Company;
use Auth;

class UsersController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('users.index', compact('user'));
    }

    public function companiesIndex($user_uuid)
    {

        $user = Auth::user();
        $companies = (new Company)->getByUsers($user->id);

        $data = [
            'user' => $user,
            'companies' => $companies,
        ];
        return view('users.companies.index', $data);
    }

    public function companiesCreate($user_uuid)
    {

        $user = Auth::user();
        $sections = (new Section())->getOrderByName();
        $subcategories = (new Category())->getSubcategories();

        $data = [
            'user' => $user,
            'sections' => $sections,
            'subcategories' => $subcategories
        ];

        return view('users.companies.create', $data);
    }

    public function companiesStore(Request $request, $user_uuid)
    {

        $this->validate($request, [
            'name' => 'required|unique:companies',
            'category_id' => 'required|integer',
        ]);

        $user = Auth::user();

        $arrayValues = $request->all();
        $category_id = $arrayValues['category_id'];
        $arrayValues['user_id'] = $user->id;

        $company = new Company();
        $company->fill($arrayValues);
        $company->setUrl();
        $company->save();
        $company->categories()->attach($category_id);

        $phone = new Phone();
        $phone->company_id = $company->id;
        $phone->prefix = $arrayValues['mobile_prefix'];
        $phone->number = $arrayValues['mobile_number'];
        $phone->phone_type = $arrayValues['phone_type'];
        $phone->save();

        return redirect(route('users.companies.index'));
    }

    public function companiesEdit($user_uuid, $company_uuid)
    {

        $company = (new Company())->findUuid($company_uuid);
        return view('users.companies.edit', companct($company));
    }


    public function companiesUpdate(Request $request, $user_uuid, $company_uuid)
    {

        $companyArray = $request->all();
        $company = (new Company())->findUuid($company_uuid);
        $company->fill($companyArray);
        $company->save();

        return redirect(route('users.companies.index'));
    }
}
