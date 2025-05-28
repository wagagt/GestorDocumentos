<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyComentarioRequest;
use App\Http\Requests\StoreComentarioRequest;
use App\Http\Requests\UpdateComentarioRequest;
use App\Models\AgregarCaso;
use App\Models\AgregarEmpleado;
use App\Models\Comentario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComentariosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('comentario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comentarios = Comentario::with(['caso', 'propietario'])->get();

        return view('admin.comentarios.index', compact('comentarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('comentario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casos = AgregarCaso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $propietarios = AgregarEmpleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.comentarios.create', compact('casos', 'propietarios'));
    }

    public function store(StoreComentarioRequest $request)
    {
        $comentario = Comentario::create($request->all());

        return redirect()->route('admin.comentarios.index');
    }

    public function edit(Comentario $comentario)
    {
        abort_if(Gate::denies('comentario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casos = AgregarCaso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $propietarios = AgregarEmpleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comentario->load('caso', 'propietario');

        return view('admin.comentarios.edit', compact('casos', 'comentario', 'propietarios'));
    }

    public function update(UpdateComentarioRequest $request, Comentario $comentario)
    {
        $comentario->update($request->all());

        return redirect()->route('admin.comentarios.index');
    }

    public function show(Comentario $comentario)
    {
        abort_if(Gate::denies('comentario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comentario->load('caso', 'propietario');

        return view('admin.comentarios.show', compact('comentario'));
    }

    public function destroy(Comentario $comentario)
    {
        abort_if(Gate::denies('comentario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comentario->delete();

        return back();
    }

    public function massDestroy(MassDestroyComentarioRequest $request)
    {
        $comentarios = Comentario::find(request('ids'));

        foreach ($comentarios as $comentario) {
            $comentario->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
