@extends('users.layouts.app')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i>Companies</a></li>
    <li class="active">Crear</li>
@endsection

@section('content-header')
    <h1>Crear empresa</h1>
@endsection

@section('content')

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">@yield('htmlheader_title')</div>

            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" method="post" enctype="multipart/form-data"
                      action="{{route('users.companies.store',['user_id'=>$user->uuid])}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="default">Nombre</label>
                            <input type="input" name="name" value="{{old('name')}}" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="default">Slogan</label>
                            <input type="input" name="slogan" value="{{old('slogan')}}" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="default">Dirección</label>
                            <input type="input" name="address" value="{{old('address')}}" class="form-control"
                                   placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="default">Subcategoría</label>
                            <select name="category_id" class="form-control">
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="default">Localidad</label>
                            <select name="section_id" class="form-control">
                                @foreach($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Prefijo</label>
                                <input type="number" name="mobile_prefix" value="{{old('mobile_prefix')}}" class="form-control "
                                       placeholder="">
                            </div>
                            <div class="form-group col-md-10">
                                <label>Celular</label>
                                <input type="number" name="mobile_number" value="{{old('mobile_number')}}" class="form-control "
                                       placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="default">Email</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="default">Descripción</label>
                            <textarea name="description" class="form-control" rows="3"
                                      placeholder="">{{old('description')}}</textarea>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label>Imágen/es</label>--}}
                            {{--<input name="photos[]" type="file" multiple>--}}
                        {{--</div>--}}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection