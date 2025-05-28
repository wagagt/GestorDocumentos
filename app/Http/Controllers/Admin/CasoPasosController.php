<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCasoPasoRequest;
use App\Http\Requests\StoreCasoPasoRequest;
use App\Http\Requests\UpdateCasoPasoRequest;
use App\Models\AgregarCaso;
use App\Models\CasoPaso;
use App\Models\Paso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CasoPasosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('caso_paso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casoPasos = CasoPaso::with(['caso', 'paso'])->get();

        return view('admin.casoPasos.index', compact('casoPasos'));
    }

    public function create()
    {
        abort_if(Gate::denies('caso_paso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casos = AgregarCaso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pasos = Paso::pluck('descripcion', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.casoPasos.create', compact('casos', 'pasos'));
    }

    public function store(StoreCasoPasoRequest $request)
    {
        $casoPaso = CasoPaso::create($request->all());

        return redirect()->route('admin.caso-pasos.index');
    }

    public function edit(CasoPaso $casoPaso)
    {
        abort_if(Gate::denies('caso_paso_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casos = AgregarCaso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pasos = Paso::pluck('descripcion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $casoPaso->load('caso', 'paso');

        return view('admin.casoPasos.edit', compact('casoPaso', 'casos', 'pasos'));
    }

    public function update(UpdateCasoPasoRequest $request, CasoPaso $casoPaso)
    {
        $casoPaso->update($request->all());

        return redirect()->route('admin.caso-pasos.index');
    }

    public function show(CasoPaso $casoPaso)
    {
        abort_if(Gate::denies('caso_paso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casoPaso->load('caso', 'paso');

        return view('admin.casoPasos.show', compact('casoPaso'));
    }

    public function destroy(CasoPaso $casoPaso)
    {
        abort_if(Gate::denies('caso_paso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casoPaso->delete();

        return back();
    }

    public function massDestroy(MassDestroyCasoPasoRequest $request)
    {
        $casoPasos = CasoPaso::find(request('ids'));

        foreach ($casoPasos as $casoPaso) {
            $casoPaso->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
