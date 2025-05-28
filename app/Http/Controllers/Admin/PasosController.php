<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPasoRequest;
use App\Http\Requests\StorePasoRequest;
use App\Http\Requests\UpdatePasoRequest;
use App\Models\AgregarEmpleado;
use App\Models\Flujo;
use App\Models\Paso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('paso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pasos = Paso::with(['flujo', 'empleado'])->get();

        return view('admin.pasos.index', compact('pasos'));
    }

    public function create()
    {
        abort_if(Gate::denies('paso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $flujos = Flujo::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $empleados = AgregarEmpleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pasos.create', compact('empleados', 'flujos'));
    }

    public function store(StorePasoRequest $request)
    {
        $paso = Paso::create($request->all());

        return redirect()->route('admin.pasos.index');
    }

    public function edit(Paso $paso)
    {
        abort_if(Gate::denies('paso_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $flujos = Flujo::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $empleados = AgregarEmpleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $paso->load('flujo', 'empleado');

        return view('admin.pasos.edit', compact('empleados', 'flujos', 'paso'));
    }

    public function update(UpdatePasoRequest $request, Paso $paso)
    {
        $paso->update($request->all());

        return redirect()->route('admin.pasos.index');
    }

    public function show(Paso $paso)
    {
        abort_if(Gate::denies('paso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paso->load('flujo', 'empleado');

        return view('admin.pasos.show', compact('paso'));
    }

    public function destroy(Paso $paso)
    {
        abort_if(Gate::denies('paso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paso->delete();

        return back();
    }

    public function massDestroy(MassDestroyPasoRequest $request)
    {
        $pasos = Paso::find(request('ids'));

        foreach ($pasos as $paso) {
            $paso->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
