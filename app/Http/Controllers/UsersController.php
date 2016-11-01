<?php

namespace App\Http\Controllers;

use App\Exceptions\InException;
use App\Models\Category;
use App\Models\Phone;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Company;
use Auth;
use DB;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'mobile_number' => 'required|integer',
            'mobile_prefix' => 'required|integer'
        ]);

        $user = Auth::user();
        $arrayValues = $request->all();

        try {
            DB::beginTransaction();
            $category_id = $arrayValues['category_id'];
            $arrayValues['user_id'] = $user->id;
            $company = new Company();
            $company->fill($arrayValues);
            $company->setUrl();
            $company->save();
            $company->categories()->sync([$category_id]);
            $phone = new Phone();
            $phone->company_id = $company->id;
            $phone->prefix = $arrayValues['mobile_prefix'];
            $phone->number = $arrayValues['mobile_number'];
            $phone->save();
            DB::commit();
        } catch (InException $e) {
            DB::rollBack();
            $e->getMsj();
        }

        return redirect(route('users.companies.index', ['user_uuid' => $user->uuid]));
    }

    public function companiesEdit($user_uuid, $company_uuid)
    {
        $user = Auth::user();
        $sections = (new Section())->getOrderByName();
        $subcategories = (new Category())->getSubcategories();
        $company = (new Company())->findUuid($company_uuid);

        $data = [
            'user' => $user,
            'sections' => $sections,
            'subcategories' => $subcategories,
            'company' => $company
        ];


        return view('users.companies.edit', $data);
    }


    public function companiesUpdate(Request $request, $user_uuid, $company_uuid)
    {

        $user = Auth::user();
        $arrayValues = $request->all();

        $category_id = $arrayValues['category_id'];
        $arrayValues['user_id'] = $user->id;

        $companyArray = $request->all();

        try {
            DB::beginTransaction();
            $company = (new Company())->findUuid($company_uuid);
            $phoneArray['prefix'] = $companyArray['mobile_prefix'];
            $phoneArray['number'] = $companyArray['mobile_number'];
            $phoneArray['company_id'] = $company->id;
            $company->fill($companyArray);
            $company->save();
            $company->categories()->sync([$category_id]);
            $company->phones()->create($phoneArray);
            DB::commit();
        } catch (InException $e) {
            DB::rollBack();
            $e->getMsj();
        }

        return redirect(route('users.companies.index', ['user_uuid' => $user->uuid]));
    }
}
