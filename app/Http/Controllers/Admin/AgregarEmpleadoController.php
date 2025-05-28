<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAgregarEmpleadoRequest;
use App\Http\Requests\StoreAgregarEmpleadoRequest;
use App\Http\Requests\UpdateAgregarEmpleadoRequest;
use App\Models\AgregarEmpleado;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgregarEmpleadoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agregar_empleado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agregarEmpleados = AgregarEmpleado::all();

        return view('admin.agregarEmpleados.index', compact('agregarEmpleados'));
    }

    public function create()
    {
        abort_if(Gate::denies('agregar_empleado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agregarEmpleados.create');
    }

    public function store(StoreAgregarEmpleadoRequest $request)
    {
        $agregarEmpleado = AgregarEmpleado::create($request->all());

        return redirect()->route('admin.agregar-empleados.index');
    }

    public function edit(AgregarEmpleado $agregarEmpleado)
    {
        abort_if(Gate::denies('agregar_empleado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agregarEmpleados.edit', compact('agregarEmpleado'));
    }

    public function update(UpdateAgregarEmpleadoRequest $request, AgregarEmpleado $agregarEmpleado)
    {
        $agregarEmpleado->update($request->all());

        return redirect()->route('admin.agregar-empleados.index');
    }

    public function show(AgregarEmpleado $agregarEmpleado)
    {
        abort_if(Gate::denies('agregar_empleado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agregarEmpleados.show', compact('agregarEmpleado'));
    }

    public function destroy(AgregarEmpleado $agregarEmpleado)
    {
        abort_if(Gate::denies('agregar_empleado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agregarEmpleado->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgregarEmpleadoRequest $request)
    {
        $agregarEmpleados = AgregarEmpleado::find(request('ids'));

        foreach ($agregarEmpleados as $agregarEmpleado) {
            $agregarEmpleado->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
