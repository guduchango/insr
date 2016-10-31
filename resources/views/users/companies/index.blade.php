@extends('users.layouts.app')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i>Companies</a></li>
    <li class="active">Crear</li>
@endsection

@section('content-header')
    <h1>Empresas</h1>
@endsection

@section('content')

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">@yield('htmlheader_title')</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-sm-3 col-md-2 col-xs-5 col-lg-2 pull-right">
                            <a href="{{route('users.companies.create',['user_id'=>$user->uuid])}}" type="button" class="btn btn-block btn-success"><i
                                        class="fa  fa-plus"></i> Crear</a>
                        </div>
                    </div>
                </div>
                <br>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Subcategoría</th>
                        <th>Sector</th>
                        <th>Acción</th>
                    </tr>
                    @foreach($companies as $company)

                        <tr>
                            <td>{{$company->id}}</td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->categories->first()->parent->name}}</td>
                            <td>{{$company->categories->first()->name}}</td>
                            <td>{{$company->section->name}}</td>
                            <td>
                                <div class="col-sm-1 col-md-1 col-xs-2 col-lg-1">
                                    <a title="Actualizar"
                                       href="{{route('users.companies.edit',['user'=>$user->uuid,'company'=>$company->uuid])}}">
                                        <span class="badge bg-blue"><i class="fa fa-pencil"></i></span>
                                    </a>
                                </div>
                                <div class="col-sm-1 col-md-1 col-xs-2 col-lg-1">
                                    <form class="form-inline" method="post" id="form-delete-{{$company->uuid}}"
                                          action="{{route('users.companies.destroy',['user_id'=>$user->uuid,'company_id'=>$company->uuid])}}">
                                        <a class="gdelete" title="Eliminar" href="#" data-id="{{$company->uuid}}"
                                           data-route="{{route('users.companies.destroy',['user_id'=>$user->uuid,'company_id'=>$company->uuid])}}">
                                            <span class="badge bg-red"><i class="fa fa-remove"></i></span></a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>

@endsection