<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAgregarCasoRequest;
use App\Http\Requests\StoreAgregarCasoRequest;
use App\Http\Requests\UpdateAgregarCasoRequest;
use App\Models\AgregarCaso;
use App\Models\AgregarEmpleado;
use App\Models\Flujo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgregarCasoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agregar_caso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agregarCasos = AgregarCaso::with(['flujo', 'encargado'])->get();

        return view('admin.agregarCasos.index', compact('agregarCasos'));
    }

    public function create()
    {
        abort_if(Gate::denies('agregar_caso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $flujos = Flujo::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $encargados = AgregarEmpleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.agregarCasos.create', compact('encargados', 'flujos'));
    }

    public function store(StoreAgregarCasoRequest $request)
    {
        $agregarCaso = AgregarCaso::create($request->all());

        return redirect()->route('admin.agregar-casos.index');
    }

    public function edit(AgregarCaso $agregarCaso)
    {
        abort_if(Gate::denies('agregar_caso_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $flujos = Flujo::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $encargados = AgregarEmpleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agregarCaso->load('flujo', 'encargado');

        return view('admin.agregarCasos.edit', compact('agregarCaso', 'encargados', 'flujos'));
    }

    public function update(UpdateAgregarCasoRequest $request, AgregarCaso $agregarCaso)
    {
        $agregarCaso->update($request->all());

        return redirect()->route('admin.agregar-casos.index');
    }

    public function show(AgregarCaso $agregarCaso)
    {
        abort_if(Gate::denies('agregar_caso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agregarCaso->load('flujo', 'encargado');

        return view('admin.agregarCasos.show', compact('agregarCaso'));
    }

    public function destroy(AgregarCaso $agregarCaso)
    {
        abort_if(Gate::denies('agregar_caso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agregarCaso->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgregarCasoRequest $request)
    {
        $agregarCasos = AgregarCaso::find(request('ids'));

        foreach ($agregarCasos as $agregarCaso) {
            $agregarCaso->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
