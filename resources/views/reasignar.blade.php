@extends('layout')
@section('content')

    <main id="bienes-app" class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">

            <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
            <div id="phd-title-app"><h4><strong>Reasignación del bien</strong></h4></div>


            <form method="POST" action="/asignar" id="phd-form" class="phd-form">
                <input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">
                <input type="hidden" name="idBienSeleccionado"  id="idBienSeleccionado">


                <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title phd-head_with_search">
                        <h5 class="phd-title-list">Listado de bienes</h5>

                        <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                            <i class="material-icons">keyboard_arrow_down</i>
                        </button>
                    </div>
                    <div class="mdl-card__actions phdHide">
                        <div class="phd-formMueble phdShow">
                            <table class="phd-table-dashboard mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                                <thead>
                                <tr>
                                    <th class="mdl-data-table__cell--non-numeric">Codigo interno</th>
                                    <th class="mdl-data-table__cell--non-numeric">Categoria</th>
                                    <th class="mdl-data-table__cell--non-numeric">Subcategoria</th>
                                    <th class="mdl-data-table__cell--non-numeric">Categoria especifica</th>
                                    <th class="mdl-data-table__cell--non-numeric">Tipo de bien</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bien as $bien1)
                                    <tr v-on:click="asignacion.tipo_bien ='{{$bien1->tipo_bien->nombre}}'; asignacion.bien_id ='{{(string)$bien1->id}}'; showForm('phd-form{{$bien1->tipo_bien->nombre}}');"  onclick="setIdBienAsignado({{(string)$bien1->id}})">
                                        <td class="mdl-data-table__cell--non-numeric">{{(string)$bien1->id}}</td>
                                        <td class="mdl-data-table__cell--non-numeric">{{str_limit($bien1->categoria->nombre, 30)}} <p class="phd-table-span-hover">{{$bien1->categoria->nombre}}</p></td>
                                        <td class="mdl-data-table__cell--non-numeric">{{str_limit($bien1->subcategoria->nombre, 30)}}<p class="phd-table-span-hover">{{$bien1->subcategoria->nombre}}</p></td>
                                        <td class="mdl-data-table__cell--non-numeric">{{str_limit($bien1->categoria_especifica->nombre, 30)}}<p class="phd-table-span-hover">{{$bien1->categoria_especifica->nombre}}</p></td>
                                        <td class="mdl-data-table__cell--non-numeric">{{$bien1->tipo_bien->nombre}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h5 class="phd-title-list">Datos de Asignación del Bien @{{asignacion.tipo_bien}} @{{asignacion.bien_id}}</h5>
                        <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                            <i class="material-icons phdShow">keyboard_arrow_down</i>
                        </button>
                    </div>

                        <div class="phd-formmueble phdHide" style="height: 400px;">

                            <div class="phd-input-group">
                                <p class="phd-subtitle">Datos de ubicación adminitrativa</p>
                                <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                                    <input class="mdl-textfield__input" type="text" id="phd-asignacion_mueble_ubicacion" name="phd-asignacion_mueble_ubicacion" v-model="asignacion.mueble.ubicacion" readonly tabIndex="-1">
                                    <label for="phd-asignacion_mueble_ubicacion" class="mdl-textfield__label">Ubicación (*)</label>
                                    <ul for="phd-asignacion_mueble_ubicacion" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        @foreach($ubicacion as $ubicacion1)
                                            <li class="mdl-menu__item"  v-on:click="asignacion.mueble.ubicacion = '{{$ubicacion1->ubicacion}}';">{{$ubicacion1->ubicacion}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="phd-input-group">
                                <p class="phd-subtitle">Datos específicos de asignación</p>
                                <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                                    <input v-on:keyup="autoCompleteResponsableAdministrativo(asignacion.mueble.responsable_administrativo);" class="mdl-textfield__input" type="text" id="phd-asignacion_mueble_responsable_administrativo" name="phd-asignacion_mueble_responsable_administrativo" v-model="asignacion.mueble.responsable_administrativo" tabIndex="-1">
                                    <label for="phd-asignacion_mueble_responsable_administrativo" class="mdl-textfield__label">Responsable Administrativo (*)</label>
                                    <ul for="phd-asignacion_mueble_responsable_administrativo" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <li v-for="item in responsables_admin" class="mdl-menu__item" v-on:click="asignacion.mueble.responsable_administrativo = item;">@{{item}}</li>
                                    </ul>
                                </div>

                                <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                                    <input class="mdl-textfield__input" type="text" id="phd-asignacion_mueble_unidad_administrativa" name="phd-asignacion_mueble_unidad_administrativa" v-model="asignacion.mueble.unidad_administrativa" readonly tabIndex="-1">
                                    <label for="phd-asignacion_mueble_unidad_administrativa" class="mdl-textfield__label">Unidad administrativa (*)</label>
                                    <ul for="phd-asignacion_mueble_unidad_administrativa" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        @foreach($unidades as $unidad)
                                            <li class="mdl-menu__item"  v-on:click="asignacion.mueble.unidad_administrativa = '{{$unidad->descripcion}}';">{{$unidad->descripcion}}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                                    <input v-on:keyup="autoCompleteResponsableUsoDirecto(asignacion.mueble.responsable_uso_directo);" class="mdl-textfield__input" type="text" id="phd-asignacion_mueble_responsable_uso_directo" name="phd-asignacion_mueble_responsable_uso_directo" v-model="asignacion.mueble.responsable_uso_directo" tabIndex="-1">
                                    <label for="phd-asignacion_mueble_responsable_uso_directo" class="mdl-textfield__label">Responsable Uso Directo (*)</label>
                                    <ul for="phd-asignacion_mueble_responsable_uso_directo" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <li v-for="item in responsables_uso" class="mdl-menu__item" v-on:click="asignacion.mueble.responsable_uso_directo = item;">@{{item}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <div class="phd-forminmueble phdHide" style="height: 400px;">

                        <div class="phd-input-group">
                            <p class="phd-subtitle">Datos de ubicación geográfica</p>


                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                                <input class="mdl-textfield__input" type="text" id="phd-asignacion_sede" name="phd-asignacion_sede" v-model="asignacion.inmueble.sede" readonly tabIndex="-1">
                                <label for="phd-asignacion_sede" class="mdl-textfield__label">Sede (*)</label>
                                <ul for="phd-asignacion_sede" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    @foreach($sede as $sede1)
                                        <li class="mdl-menu__item"  v-on:click="asignacion.inmueble.sede = '{{$sede1->descripcion}}';">{{$sede1->descripcion}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="phd-input-group">
                            <p class="phd-subtitle">Datos específicos de la asignación</p>
                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                                <input v-on:keyup="autoCompleteResponsableAdministrativo(asignacion.inmueble.responsable_administrativo);" class="mdl-textfield__input" type="text" id="phd-asignacion_inmueble_responsable_administrativo" name="phd-asignacion_inmueble_responsable_administrativo" v-model="asignacion.inmueble.responsable_administrativo" tabIndex="-1">
                                <label for="phd-asignacion_inmueble_responsable_administrativo" class="mdl-textfield__label">Responsable Administrativo (*)</label>
                                <ul for="phd-asignacion_inmueble_responsable_administrativo" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li v-for="item in responsables_admin" class="mdl-menu__item" v-on:click="asignacion.inmueble.responsable_administrativo = item;">@{{item}}</li>
                                </ul>
                            </div>

                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                                <input class="mdl-textfield__input" type="text" id="phd-asignacion_inmueble_unidad_administrativa" name="phd-asignacion_inmueble_unidad_administrativa" v-model="asignacion.mueble.unidad_administrativa" readonly tabIndex="-1">
                                <label for="phd-asignacion_inmueble_unidad_administrativa" class="mdl-textfield__label">Unidad administrativa (*)</label>
                                <ul for="phd-asignacion_inmueble_unidad_administrativa" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    @foreach($unidades as $unidad)
                                        <li class="mdl-menu__item"  v-on:click="asignacion.mueble.unidad_administrativa = '{{$unidad->descripcion}}';">{{$unidad->descripcion}}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                                <input v-on:keyup="autoCompleteResponsableUsoDirecto(asignacion.inmueble.responsable_uso_directo);" class="mdl-textfield__input" type="text" id="phd-asignacion_inmueble_responsable_uso_directo" name="phd-asignacion_inmueble_responsable_uso_directo" v-model="asignacion.inmueble.responsable_uso_directo" tabIndex="-1">
                                <label for="phd-asignacion_inmueble_responsable_uso_directo" class="mdl-textfield__label">Responsable Uso Directo (*)</label>
                                <ul for="phd-asignacion_inmueble_responsable_uso_directo" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li v-for="item in responsables_uso" class="mdl-menu__item" v-on:click="asignacion.inmueble.responsable_uso_directo = item;">@{{item}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="phd-buttons-form">
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" v-on:click="showModal('ALERTA','Se borrarán los datos del formulario. ¿Desea continuar?', borrarDatosFormulario);">
                        Cancelar
                    </button>

                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" v-on:click="showModal('INFORMACIÓN','¿Está seguro de reasignar el bien con los datos suministrados?', submitAsignar);">
                        Asignar
                    </button>

                </div>
            </form>
        </div>

    </main>


    <dialog class="mdl-dialog">
        <h4 class="mdl-dialog__title">@{{dialog.title}}</h4>
        <div class="mdl-dialog__content">
            <p>
                @{{dialog.content}}
            </p>
        </div>
        <div class="mdl-dialog__actions">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent agree">Aceptar</button>
            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored close">Cancelar</button>
        </div>
    </dialog>

    @if($mensaje != "")
        <dialog id="mensaje-satisfactorio" class="mdl-dialog">
            <h4 class="mdl-dialog__title">INFORMACIÓN</h4>
            <div class="mdl-dialog__content">
                <p>
                    {{$mensaje}}
                </p>
            </div>
            <div class="mdl-dialog__actions">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent close" >Aceptar</button>
                <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored close">Cancelar</button>
            </div>
        </dialog>
    @endif

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://unpkg.com/vue@2.3.4"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.3.4"></script>
    <script type="text/javascript">
        function showModalMensaje() {
            var dialog = document.querySelector('#mensaje-satisfactorio');
            if (dialog) {
                if (! dialog.showModal) {
                    dialogPolyfill.registerDialog(dialog);
                }
                dialog.showModal();
                dialog.querySelector('.close').addEventListener('click', function () {
                    dialog.close();
                }, false);
            }

        }
        window.onload = showModalMensaje;
    </script>
@endsection