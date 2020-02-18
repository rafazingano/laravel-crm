@extends('meridien::layouts.metronic')
@section('title', trans('meridien.steps'))
@section('content')

    @include('meridien::partials.kt_subheader', [
      'breadcrumb' => [
        route('steps.index') => trans('meridien.steps.list'),
        '#' => trans('meridien.steps.edit')
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
                {!! Form::model($step, ['route' => ['steps.update', $step->id], 'method' => 'put', 'class' => 'horizontal-form']) !!}
                    @include('steps.partials.form')
                {!! Form::close() !!}
            </div>
            <div class="col-6">
                @historics(['historics' => $step->historics])
                    @slot('title')
                        {{ trans('meridien.steps.stage.history', ['name' => $step->name]) }}
                    @endslot

                    Históricos Da Etapa
                @endhistorics
            </div>
        </div>
    </div>

@endsection

@include('steps.partials.kt_aside')
