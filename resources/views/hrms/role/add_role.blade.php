@extends('hrms.layouts.base')

@section('content')
    <!-- START CONTENT -->
    <div class="content">

        <header id="topbar" class="alt">
            <div class="topbar-left">
                @if(\Route::getFacadeRoot()->current()->uri() == 'edit-role/{id}')
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
                        <li class="breadcrumb-current-item"> Edit {{$result->name}} </li>
                    </ol>
                @else
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
                        <li class="breadcrumb-current-item"> Add Role</li>
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
                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-role/{id}')
                                        <span class="panel-title hidden-xs"> Edit Role </span>
                                    @else
                                        <span class="panel-title hidden-xs"> Add Role </span>
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
                                            {!! Form::open(['class' => 'form-horizontal']) !!}

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Role </label>
                                                <div class="col-md-6">
                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-role/{id}')
                                                        <input type="text" name="name" id="input002"
                                                               class="select2-single form-control"
                                                               value="@if($result && $result->name){{$result->name}}@endif"
                                                               required>
                                                    @else
                                                        <input type="text" name="name" id="input002"
                                                               class="select2-single form-control" placeholder="Role"
                                                               required>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Description </label>
                                                <div class="col-md-6">

                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-role/{id}')
                                                        <textarea class="select2-single form-control" rows="3"
                                                                  id="textarea1" name="description"
                                                                  required>@if($result && $result->description){{$result->description}}@endif</textarea>
                                                    @else
                                                        <textarea class="select2-single form-control" rows="3"
                                                                  id="textarea1" placeholder="Role Description"
                                                                  name="description" required></textarea>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Permission </label>
                                                <div class="col-md-6">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <label><input type="checkbox" id="checkall"
                                                                                  style="position: relative;bottom: -2px;">
                                                                        Check All</label>
                                                                </td>
                                                            </tr>
                                                            @foreach($permissions as $key=>$value)
                                                                <tr>
                                                                    <td class="text-capitalize">{{$key}}</td>
                                                                    <td>
                                                                        <ul class="list-unstyled"
                                                                            style="margin-bottom: 0px;">
                                                                            @foreach($value as $submenu)
                                                                                <li>
                                                                                    <label>
                                                                                        <input type="checkbox"
                                                                                               name="permissions[]"
                                                                                               value="{{$submenu['id']}}"
                                                                                               @if(\Route::getFacadeRoot()->current()->uri() == 'edit-role/{id}')
                                                                                               @if($result && in_array($submenu['id'],$result->getPermissions->pluck('permission_id')->toArray()))checked
                                                                                               @endif
                                                                                               @endif
                                                                                               style="position: relative;bottom: -3px;"> {{$submenu['name']}}
                                                                                    </label>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
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
    <script>
        window.onload = function () {
            $(document).on('click', '#checkall', function () {
                $('input[name*="permission"]').prop('checked', $(this).is(':checked'));
            });
        }
    </script>
@endsection