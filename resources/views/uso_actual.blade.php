@extends('layout')
@section('content')

    <main id="bienes-app" class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">

            <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
            <div id="phd-title-app"><h4><strong>Uso actual del bien</strong></h4></div>

            <form method="POST" action="/uso_actual_bien" id="phd-form" class="phd-form">
                <input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">




                <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title phd-head_with_search">
                        <h5 class="phd-title-list">Listado de Usos Actuales del Bien</h5>

                        <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                            <i class="material-icons">keyboard_arrow_down</i>
                        </button>
                    </div>
                    <div class="mdl-card__actions phdShow">
                        <div class="phd-formMueble phdShow">
                            <table class="phd-table-dashboard mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                                <thead>
                                <tr>
                                    <th class="mdl-data-table__cell--non-numeric">Código</th>
                                    <th class="mdl-data-table__cell--non-numeric">Uso actual</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usos_actuales as $uso_actual)
                                    <tr v-on:click="obtenerUsoActualBien({{$uso_actual}})">
                                        <td class="mdl-data-table__cell--non-numeric">{{$uso_actual->id}}</td>
                                        <td class="mdl-data-table__cell--non-numeric">{{$uso_actual->uso_actual}} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $usos_actuales->links() }}
                        </div>
                    </div>
                </div>




                <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h5 class="phd-title-list">Datos del Tipo de Cobertura</h5>
                        <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                            <i class="material-icons">keyboard_arrow_down</i>
                        </button>
                    </div>
                    <div class="mdl-card__actions phdHide" style="height: 200px;">

                        <div class="phd-input-group">
                            <input v-model="uso_actual_bien.id" type="hidden" id="phd-it_to_update" name="phd-it_to_update">
                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input v-model="uso_actual_bien.uso_actual"  class="mdl-textfield__input" type="text" id="phd-uso_actual" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-uso_actual">
                                <label class="mdl-textfield__label" for="phd-uso_actual">Uso actual del bien (*)</label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="phd-buttons-form">
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" v-on:click="showModal('ALERTA','Se borrarán los datos del formulario. ¿Desea continuar?', borrarDatosFormulario);">
                        Cancelar
                    </button>

                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" v-on:click="showModal('INFORMACIÓN','¿Está seguro de incorporar el uso actual del bien con los datos suministrados?', submitIncorporar);" >
                        Agregar
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
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent agree" >Aceptar</button>
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