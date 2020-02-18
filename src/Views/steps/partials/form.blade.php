<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                {{ trans('meridien.steps.form') }}
            </h3>
        </div>
    </div>

    <div class="kt-portlet__body">
        <div class="form-group">
            <label class="control-label">{{ trans('meridien.steps.name') }}<span class="required"> * </span></label>
            {!! Form::text('name', isset($step)? $step->name : null, ['class' => 'form-control', 'placeholder' => 'Digite o nome de display da etapa', 'required']) !!}
        </div>
        <div class="form-group">
            <label class="control-label">{{ trans('meridien.steps.slug') }}<span class="required"> * </span></label>
            {!! Form::text('slug', isset($step)? $step->slug : null, ['class' => 'form-control', 'placeholder' => 'Digite o slug da etapa', 'required']) !!}
        </div>
        <div class="form-group">
            <label class="control-label">{{ trans('meridien.steps.order') }}<span class="required"> * </span></label>
            {!! Form::selectRange('order', 1, 10, isset($step)? $step->order : null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
    @include('meridien::partials.portlet_footer_form_actions', ['cancel' => route('steps.index')])
</div>
