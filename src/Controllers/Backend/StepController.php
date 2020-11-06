<?php

namespace ConfrariaWeb\Crm\Controllers\Backend;

use App\Http\Controllers\Controller;
use ConfrariaWeb\Crm\Requests\StoreStepRequest;
use ConfrariaWeb\Crm\Requests\UpdateStepRequest;
use ConfrariaWeb\Crm\Resources\Select2StepResource;
use Illuminate\Http\Request;

class StepController extends Controller
{
    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function index()
    {
        $this->data['steps'] = resolve('CrmStepService')->all();
        return view('steps.index', $this->data);
    }

    public function trashed()
    {
        $this->data['steps'] = resolve('CrmStepService')->trashed();
        $this->data['title'] = 'steps.trashed.list';
        return view('steps.index', $this->data);
    }

    public function create()
    {
        return view('steps.create', $this->data);
    }

    public function store(StoreStepRequest $request)
    {
        $step = resolve('CrmStepService')->create($request->all());
        return redirect()
            ->route('steps.edit', $step->id)
            ->with('status', 'Etapa criado com sucesso!');
    }

    public function show($id)
    {
        $this->data['step'] = resolve('CrmStepService')->find($id);
        return view('steps.show', $this->data);
    }

    public function edit($id)
    {
        $this->data['step'] = resolve('CrmStepService')->find($id);
        return view('steps.edit', $this->data);
    }

    public function update(UpdateStepRequest $request, $id)
    {
        $step = resolve('CrmStepService')->update($request->all(), $id);
        return redirect()
            ->route('steps.edit', $step->id)
            ->with('status', 'Etapa editada com sucesso!');
    }

    public function destroy($id)
    {
        $step = resolve('CrmStepService')->destroy($id);
        return redirect()
            ->route('steps.index')
            ->with('status', 'Etapa deletada com sucesso!');
    }

    public function select2(Request $request)
    {
        $data = $request->all();
        $data['name'] = isset($data['term'])? $data['term'] : NULL;
        $status = resolve('CrmStepService')->where($data)->get();
        return Select2StepResource::collection($status);
    }
}
