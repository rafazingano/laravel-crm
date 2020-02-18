<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                {{ __($title ?? 'steps.list') }}
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-section">
            <div class="kt-section__content">

                <table class="table table-striped table-hover" id="steps_datatable">
                    <thead>
                    <tr>
                        <th width="">{{ trans('meridien.steps.name') }}</th>
                        <th width="">{{ trans('meridien.steps.slug') }}</th>
                        <th width="">{{ trans('meridien.steps.order') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($steps as $step)
                        <tr>
                            <td>{{ $step->name }}</td>
                            <td>{{ $step->slug }}</td>
                            <td>{{ $step->order }}</td>
                            <td>
                                @if (Route::current()->getName() != 'steps.trashed')
                                    <div class="btn-group btn-group-sm float-right" step="group" aria-label="...">
                                        @permission('steps.show')
                                        <a href="{{ route('steps.show', $step->id) }}"
                                           class="btn btn-clean btn-icon btn-label-primary btn-icon-md " title="View">
                                            <i class="la la-eye"></i>
                                        </a>
                                        @endpermission
                                        @permission('steps.edit')
                                        <a href="{{ route('steps.edit', $step->id) }}"
                                           class="btn btn-clean btn-icon btn-label-success btn-icon-md " title="Edit">
                                            <i class="la la-edit"></i>
                                        </a>
                                        @endpermission
                                        @permission('steps.destroy')
                                        <a href="javascript:void(0);"
                                           onclick="event.preventDefault();
                                               if(!confirm('Tem certeza que deseja deletar este item?')){ return false; }
                                               document.getElementById('delete-step-{{ $step->id }}').submit();"
                                           class="btn btn-clean btn-icon btn-label-danger btn-icon-md "
                                           title="Deletar">
                                            <i class="la la-remove"></i>
                                        </a>
                                        <form
                                            action="{{ route('steps.destroy', $step->id) }}"
                                            method="POST" id="delete-step-{{ $step->id }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                        </form>
                                        @endpermission
                                    </div>
                                @else
                                    Deletado em @datetime($step->deleted_at)
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#steps_datatable').DataTable();
        });
    </script>
@endpush
