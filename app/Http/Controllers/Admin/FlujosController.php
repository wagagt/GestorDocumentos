<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFlujoRequest;
use App\Http\Requests\StoreFlujoRequest;
use App\Http\Requests\UpdateFlujoRequest;
use App\Models\Flujo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FlujosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('flujo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $flujos = Flujo::all();

        return view('admin.flujos.index', compact('flujos'));
    }

    public function create()
    {
        abort_if(Gate::denies('flujo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.flujos.create');
    }

    public function store(StoreFlujoRequest $request)
    {
        $flujo = Flujo::create($request->all());

        return redirect()->route('admin.flujos.index');
    }

    public function edit(Flujo $flujo)
    {
        abort_if(Gate::denies('flujo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.flujos.edit', compact('flujo'));
    }

    public function update(UpdateFlujoRequest $request, Flujo $flujo)
    {
        $flujo->update($request->all());

        return redirect()->route('admin.flujos.index');
    }

    public function show(Flujo $flujo)
    {
        abort_if(Gate::denies('flujo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.flujos.show', compact('flujo'));
    }

    public function destroy(Flujo $flujo)
    {
        abort_if(Gate::denies('flujo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $flujo->delete();

        return back();
    }

    public function massDestroy(MassDestroyFlujoRequest $request)
    {
        $flujos = Flujo::find(request('ids'));

        foreach ($flujos as $flujo) {
            $flujo->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
