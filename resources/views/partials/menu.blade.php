<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('empleado_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-user">

                        </i>
                        <span>{{ trans('cruds.empleado.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('agregar_empleado_access')
                            <li class="{{ request()->is("admin/agregar-empleados") || request()->is("admin/agregar-empleados/*") ? "active" : "" }}">
                                <a href="{{ route("admin.agregar-empleados.index") }}">
                                    <i class="fa-fw fas fa-users">

                                    </i>
                                    <span>{{ trans('cruds.agregarEmpleado.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('caso_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.caso.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('flujo_access')
                            <li class="{{ request()->is("admin/flujos") || request()->is("admin/flujos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.flujos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.flujo.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('paso_access')
                            <li class="{{ request()->is("admin/pasos") || request()->is("admin/pasos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.pasos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.paso.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('agregar_caso_access')
                            <li class="{{ request()->is("admin/agregar-casos") || request()->is("admin/agregar-casos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.agregar-casos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.agregarCaso.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('caso_paso_access')
                            <li class="{{ request()->is("admin/caso-pasos") || request()->is("admin/caso-pasos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.caso-pasos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.casoPaso.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('documento_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-file-alt">

                        </i>
                        <span>{{ trans('cruds.documento.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('agregar_documento_access')
                            <li class="{{ request()->is("admin/agregar-documentos") || request()->is("admin/agregar-documentos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.agregar-documentos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.agregarDocumento.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('adjunto_access')
                            <li class="{{ request()->is("admin/adjuntos") || request()->is("admin/adjuntos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.adjuntos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.adjunto.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('comentario_access')
                            <li class="{{ request()->is("admin/comentarios") || request()->is("admin/comentarios/*") ? "active" : "" }}">
                                <a href="{{ route("admin.comentarios.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.comentario.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>