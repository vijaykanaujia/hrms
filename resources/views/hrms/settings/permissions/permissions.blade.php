@extends('hrms.layouts.base')
@section('content')
    <!-- START CONTENT -->
    <div class="content">

        <header id="topbar" class="alt">
            <div class="topbar-left">
                @if(\Route::getFacadeRoot()->current()->uri() == 'edit-permissions/{id}')
                    <ol class="breadcrumb">
                        <li class="breadcrumb-icon">
                            <a href="/dashboard">
                                <span class="fa fa-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-active">
                            <a href="/dashboard"> Dashboard </a>
                        </li>
                        <li class="breadcrumb-link">
                            <a href=""> Role </a>
                        </li>
                        <li class="breadcrumb-current-item"> Edit Permissions</li>
                    </ol>
                @else
                    <ol class="breadcrumb">
                        <li class="breadcrumb-icon">
                            <a href="{{url('/dashboard')}}">
                                <span class="fa fa-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-active">
                            <a href="{{url('/dashboard')}}"> Dashboard </a>
                        </li>
                        <li class="breadcrumb-link">
                            <a href=""> Permissions </a>
                        </li>
                        <li class="breadcrumb-current-item"> Add Permissions</li>
                    </ol>
                @endif
            </div>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- -------------- Column Center -------------- -->
            <div class="chute-affix" data-spy="affix" data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-permissions/{id}')
                                        <span class="panel-title hidden-xs"> Edit Permission </span>
                                    @else
                                        <span class="panel-title hidden-xs"> Add Permission </span>
                                    @endif
                                </div>

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @if(Session::has('flash_message'))
                                                <div class="alert alert-success">
                                                    {{Session::get('flash_message')}}
                                                </div>
                                            @endif
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            {!! Form::open(['class' => 'form-horizontal']) !!}

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Name </label>
                                                <div class="col-md-6">
                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-permissions/{id}')
                                                        <input type="text" class="form-control" name="name" id="name"
                                                               value="{{$update->name}}" required>
                                                    @else
                                                        <input type="text" class="form-control" name="name" id="name">
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Menu </label>
                                                <div class="col-md-6">
                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-permissions/{id}')
                                                        <select name="menu" id="menu" class="form-control"
                                                                required>
                                                            @foreach($menues as $key=>$value)
                                                                @if($key == $update->menu)
                                                                    <option value="{{$update->menu}}" selected>{{$value}}</option>
                                                                @else
                                                                    <option value="{{$key}}">{{$value}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'permissions')
                                                        <select name="menu" id="menu" class="form-control"
                                                                required>
                                                            @foreach($menues as $key=>$value)
                                                                <option value="{{$key}}">{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">

                                                    <input type="submit" class="btn btn-bordered btn-info btn-block"
                                                           value="Submit">
                                                </div>
                                                <div class="col-md-2"><a href="/add-role">
                                                        <input type="button"
                                                               class="btn btn-bordered btn-success btn-block"
                                                               value="Reset"></a></div>
                                            </div>
                                            {!! Form::close() !!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/allcp/forms/css/bootstrap-select.css')}}">
    @endpush
    @push('scripts')
    <script src="{{asset('public/assets/allcp/forms/js/bootstrap-select.js')}}"></script>
    @endpush
@endsection
