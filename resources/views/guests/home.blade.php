@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>InSanRafael</h1>
                <p>La guía digital definitiva</p>
            </div>
            <div class="col-md-12 text-center">
                <form class="form-inline">
                    <div class="form-group">
                        <input class=" form-control input-lg" type="text" placeholder="Los Gallegos">
                    </div>
                    <button type="submit" class=" btn btn-default btn-lg">Buscar</button>
                </form>
            </div>
            <div>
                <h3>Lo más búscado</h3>
                <table class="table">
                    @foreach($companies as $company)
                        <tr>
                            <td>{{$company->name}}</td>
                            <td>
                                @foreach($company->categories as $category)
                                    <button type="button" class="btn btn-xs btn-info">{{$category->name}}</button>
                                @endforeach
                            </td>
                            <td>{{$company->address}}</td>
                            <td><a class="btn btn-primary">Ver >></a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
