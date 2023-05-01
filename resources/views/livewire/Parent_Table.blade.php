<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('Parent_trans.add_parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('Parent_trans.Email') }}</th>
            <th>{{ trans('Parent_trans.Name_Father') }}</th>
            <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Passport_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Phone_Father') }}</th>
            <th>{{ trans('Parent_trans.Job_Father') }}</th>
            <th>{{ trans('Parent_trans.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($my_parents as $my_parent)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $my_parent->Email }}</td>
                <td>{{ $my_parent->Name_Father }}</td>
                <td>{{ $my_parent->National_ID_Father }}</td>
                <td>{{ $my_parent->Passport_ID_Father }}</td>
                <td>{{ $my_parent->Phone_Father }}</td>
                <td>{{ $my_parent->Job_Father }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('Grades_trans.Edit') }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                    <a class="btn btn-primary btn-sm"  href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                    id="exampleModalLabel">
                    {{ trans('Parent_trans.view_parent') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($my_parents as $my_parent)
                    <ul class="unlist-styled">
                        <h4>{{trans('Parent_trans.Step1')}}</h4>
                        <hr>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Name_Father')}} : <span class="btn btn-sm btn-info">{{ $my_parent->Name_Father }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Job_Father')}} : <span class="btn btn-sm btn-info">{{ $my_parent->Job_Father }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Email')}} : <span class="btn btn-sm btn-info">{{ $my_parent->Email }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Phone_Father')}} : <span class="btn btn-sm btn-info">{{ $my_parent->Phone_Father }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.National_ID_Father')}} : <span class="btn btn-sm btn-info">{{ $my_parent->National_ID_Father }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Passport_ID_Father')}} : <span class="btn btn-sm btn-info">{{ $my_parent->Passport_ID_Father }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Nationality_Father_id')}} : <span class="btn btn-sm btn-info">{{ $my_parent->fatherNationality->Name }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Religion_Father_id')}} : <span class="btn btn-sm btn-info">{{ $my_parent->fatherReligion->Name }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Blood_Type_Father_id')}} : <span class="btn btn-sm btn-info">{{ $my_parent->fatherBloods->Name }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Address_Father')}} : <span class="btn btn-sm btn-info">{{ $my_parent->Address_Father }}</span></li>
                    </ul>
                    <hr>
                    <ul class="unlist-styled">
                        <h4>{{trans('Parent_trans.Step2')}}</h4>
                        <hr>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Name_Mother')}} : <span class="btn btn-sm btn-info">{{ $my_parent->Name_Mother }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Job_Mother')}} : <span class="btn btn-sm btn-info">{{ $my_parent->Job_Mother }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Phone_Mother')}} : <span class="btn btn-sm btn-info">{{ $my_parent->Phone_Mother }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.National_ID_Mother')}} : <span class="btn btn-sm btn-info">{{ $my_parent->National_ID_Mother }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Passport_ID_Mother')}} : <span class="btn btn-sm btn-info">{{ $my_parent->Passport_ID_Mother }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Nationality_Mother_id')}} : <span class="btn btn-sm btn-info">{{ $my_parent->motherNationality->Name }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Religion_Mother_id')}} : <span class="btn btn-sm btn-info">{{ $my_parent->motherReligion->Name }}</span></li>
                        <li class="btn btn-sm btn-secondary mb-2">{{trans('Parent_trans.Blood_Type_Mother_id')}} : <span class="btn btn-sm btn-info">{{ $my_parent->motherBloods->Name }}</span></li>
                    </ul>
                @endforeach
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
