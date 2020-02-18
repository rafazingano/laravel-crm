@extends('meridien::layouts.metronic')
@section('title', trans('meridien.steps'))
@section('content')

    @include('meridien::partials.kt_subheader', [
      'breadcrumb' => [
        route('steps.index') => trans('meridien.steps.list'),
        '#' => trans('meridien.steps.create')
      ],
      'buttons' => [
        route('steps.create') => [
          'label' => trans('meridien.steps.create'),
          'icon' => 'fa fa-plus'
        ],
        route('steps.trashed') => [
          'label' => trans('meridien.steps.trashed'),
          'class' => 'btn-warning',
          'icon' => 'fa fa-trash-alt'
        ],
        route('steps.index') => [
          'label' => trans('meridien.return'),
          'icon' => 'fa fa-return'
        ]
      ]
    ])

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-6">
                {!! Form::open(['route' => 'steps.store', 'class' => 'horizontal-form']) !!}
                @include('steps.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@include('steps.partials.kt_aside')

@push('styles')

@endpush

@push('scripts')
    <script src="{{ asset('vendor/meridienclube/laravel-meridien/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            $('.kt-select2').select2();

            var t;
            t = KTUtil.isRTL() ? {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            } : {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            };
            $('.kt_datepicker').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: !0,
                templates: t,
                format: 'dd/mm/yyyy',
                language: 'pt-BR'
            });
        });
    </script>
@endpush
