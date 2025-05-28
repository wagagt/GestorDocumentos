<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdjuntoRequest;
use App\Http\Requests\StoreAdjuntoRequest;
use App\Http\Requests\UpdateAdjuntoRequest;
use App\Models\Adjunto;
use App\Models\AgregarCaso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdjuntosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('adjunto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adjuntos = Adjunto::with(['caso'])->get();

        return view('admin.adjuntos.index', compact('adjuntos'));
    }

    public function create()
    {
        abort_if(Gate::denies('adjunto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casos = AgregarCaso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.adjuntos.create', compact('casos'));
    }

    public function store(StoreAdjuntoRequest $request)
    {
        $adjunto = Adjunto::create($request->all());

        return redirect()->route('admin.adjuntos.index');
    }

    public function edit(Adjunto $adjunto)
    {
        abort_if(Gate::denies('adjunto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casos = AgregarCaso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $adjunto->load('caso');

        return view('admin.adjuntos.edit', compact('adjunto', 'casos'));
    }

    public function update(UpdateAdjuntoRequest $request, Adjunto $adjunto)
    {
        $adjunto->update($request->all());

        return redirect()->route('admin.adjuntos.index');
    }

    public function show(Adjunto $adjunto)
    {
        abort_if(Gate::denies('adjunto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adjunto->load('caso');

        return view('admin.adjuntos.show', compact('adjunto'));
    }

    public function destroy(Adjunto $adjunto)
    {
        abort_if(Gate::denies('adjunto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adjunto->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdjuntoRequest $request)
    {
        $adjuntos = Adjunto::find(request('ids'));

        foreach ($adjuntos as $adjunto) {
            $adjunto->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
