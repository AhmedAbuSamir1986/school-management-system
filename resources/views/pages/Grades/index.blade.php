@extends('layouts.master')
@section('css')
    @toastr_css

@section('title')
{{trans('main_trans.Grades')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('main_trans.Grades')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('schoolgrade_trans.Add_grade') }}
                </button>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('schoolgrade_trans.Name')}}</th>
                            <th>{{trans('schoolgrade_trans.Notes')}}</th>
                            <th>{{trans('schoolgrade_trans.Processes')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach($grades as $grade)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $i  }}</td>
                                <td>{{ $grade->Name  }}</td>
                                <td>{{ $grade->Notes }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm"
                                            data-toggle="modal"
                                            data-target="#edit{{ $grade->id }}"
                                            title="{{trans('schoolgrade_trans.Edit')}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#delete{{ $grade->id }}"
                                            title="{{trans('schoolgrade_trans.Delete')}}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('schoolgrade_trans.Edit_grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('Grades.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('schoolgrade_trans.Stage_name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="Name"
                                                               class="form-control"
                                                               value="{{ $grade->getTranslation('Name', 'ar') }}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $grade->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                               class="mr-sm-2">{{ trans('schoolgrade_trans.Stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{ $grade->getTranslation('Name', 'en') }}"
                                                               name="Name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('schoolgrade_trans.Notes') }}
                                                        :</label>
                                                    <textarea class="form-control" name="Notes"
                                                              id="exampleFormControlTextarea1"
                                                              rows="3">{{ $grade->Notes }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('schoolgrade_trans.Close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{ trans('schoolgrade_trans.Submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('schoolgrade_trans.Delete_grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('Grades.destroy','test')}}" method="post">
                                                {{method_field('Delete')}}
                                                @csrf
                                                {{ trans('schoolgrade_trans.Warning_grade') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                       value="{{ $grade->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('schoolgrade_trans.Close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('schoolgrade_trans.Submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        {{ trans('schoolgrade_trans.Add_grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('Grades.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name"
                                       class="mr-sm-2">{{ trans('schoolgrade_trans.Stage_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="Name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="Name_en"
                                       class="mr-sm-2">{{ trans('schoolgrade_trans.Stage_name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="Name_en" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label
                                for="exampleFormControlTextarea1">{{ trans('schoolgrade_trans.Notes_ar') }}
                                :</label>
                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('schoolgrade_trans.Close') }}</button>
                    <button type="submit"
                            class="btn btn-success">{{ trans('schoolgrade_trans.Submit') }}</button>
                </div>
                </form>

            </div>
        </div>
    </div>


</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
