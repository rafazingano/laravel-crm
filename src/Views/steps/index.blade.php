@extends('meridien::layouts.metronic')
@section('title', trans('meridien.steps'))
@section('content')
    @include('meridien::partials.kt_subheader', [
      'breadcrumb' => [
        '#' => trans('meridien.steps.list')
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
            <div class="col-md-9">
                @include('steps.partials.list')
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
@endsection

@include('steps.partials.kt_aside')
