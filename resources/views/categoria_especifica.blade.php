@extends('layout')
@section('content')

    <main id="bienes-app" class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">

            <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
            <div id="phd-title-app"><h4><strong>Categoría Específica</strong></h4></div>

            <form method="POST" action="categoria_especifica" id="phd-form" class="phd-form">
                <input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">




                <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title phd-head_with_search">
                        <h5 class="phd-title-list">Listado de Categorías Específicas</h5>

                        <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                            <i class="material-icons">keyboard_arrow_down</i>
                        </button>
                    </div>
                    <div class="mdl-card__actions phdShow">
                        <div class="phd-formMueble phdShow">
                            <table class="phd-table-dashboard mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                                <thead>
                                <tr>
                                    <th class="mdl-data-table__cell--non-numeric">Categoría</th>
                                    <th class="mdl-data-table__cell--non-numeric">Subcategoría</th>
                                    <th class="mdl-data-table__cell--non-numeric">Categoría Específica</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categorias_especificas as $categoria_especifica)
                                    <tr v-on:click="obtenerCategoriaEspecifica({{$categoria_especifica}},'{{$categoria_especifica->subcategoria->subcategoria}}','{{$categoria_especifica->subcategoria->categoria->categoria}}',{{$categoria_especifica->subcategoria->categoria->subcategoria}})">
                                        <td class="mdl-data-table__cell--non-numeric">{{str_limit($categoria_especifica->subcategoria->categoria->categoria, 30)}}<p class="phd-table-span-hover">{{$categoria_especifica->subcategoria->categoria->categoria}}</p></td>
                                        <td class="mdl-data-table__cell--non-numeric">{{str_limit($categoria_especifica->subcategoria->subcategoria, 30)}}<p class="phd-table-span-hover">{{$categoria_especifica->subcategoria->subcategoria}}</p></td>
                                        <td class="mdl-data-table__cell--non-numeric">{{str_limit($categoria_especifica->categoria_especifica, 30)}}<p class="phd-table-span-hover">{{$categoria_especifica->categoria_especifica}}</p></td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $categorias_especificas->links() }}
                        </div>
                    </div>
                </div>




                <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h5 class="phd-title-list">Datos de la Categoría Específica</h5>
                        <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                            <i class="material-icons">keyboard_arrow_down</i>
                        </button>
                    </div>
                    <div class="mdl-card__actions phdHide" style="height: 200px;">

                        <div class="phd-input-group">

                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                                <input class="mdl-textfield__input" type="text" id="phd-categoria" v-model="categoria_especifica.categoria.categoria" readonly tabIndex="-1" name="phd-categoria">
                                <label for="phd-categoria" class="mdl-textfield__label"> Categoría(*)</label>
                                <ul for="phd-categoria" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    @foreach ($categorias as $categoria)
                                        <li class="mdl-menu__item"  v-on:click='categoria_especifica.categoria.categoria ="{{$categoria->categoria}}"; categoria_especifica.categoria.subcategorias = {{$categoria->subcategoria}};'>{{$categoria->categoria}}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                                <input class="mdl-textfield__input" type="text" id="phd-categoria_subcategorias" v-model="categoria_especifica.subcategoria" readonly tabIndex="-1" name="phd-categoria_subcategorias">
                                <label for="phd-categoria_subcategorias" class="mdl-textfield__label"> Subcategoría(*)</label>
                                <ul for="phd-categoria_subcategorias" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li v-for="subcategoria in categoria_especifica.categoria.subcategorias" class="mdl-menu__item"  v-on:click='categoria_especifica.subcategoria = subcategoria.subcategoria;'>@{{subcategoria.subcategoria}}</li>
                                </ul>
                            </div>

                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input v-model="categoria_especifica.codigo"  class="mdl-textfield__input" type="text" id="phd-codigo" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-codigo">
                                <label class="mdl-textfield__label" for="phd-codigo">Código (*)</label>
                            </div>

                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input v-model="categoria_especifica.categoria_especifica"  class="mdl-textfield__input" type="text" id="phd-categoria_especifica" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-categoria_especifica">
                                <label class="mdl-textfield__label" for="phd-categoria_especifica">Categoria Específica (*)</label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="phd-buttons-form">
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" v-on:click="showModal('ALERTA','Se borrarán los datos del formulario. ¿Desea continuar?', borrarDatosFormulario);">
                        Cancelar
                    </button>

                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" v-on:click="showModal('INFORMACIÓN','¿Está seguro de incorporar el ente con los datos suministrados?', submitIncorporar);" >
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