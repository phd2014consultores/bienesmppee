@extends('layout') 
@section('content')

        <main id="bienes-app" class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-grid demo-content">

            <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
            <div id="phd-title-app"><h4><strong>Modelo</strong></h4></div>

        <form method="POST" action="modelo" id="phd-form" class="phd-form">
            <input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">



            <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title phd-head_with_search">
                    <h5 class="phd-title-list">Listado de Modelos</h5>

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
                                <th class="mdl-data-table__cell--non-numeric">Marca</th>
                                <th class="mdl-data-table__cell--non-numeric">Nombre del Fabricante</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($modelos as $modelo)
                                <tr v-on:click="obtenerModelo('{{$modelo->id}}',{{$marcas}})">
                                    <td class="mdl-data-table__cell--non-numeric">{{$modelo->codigo}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$modelo->marca->denominacion_comercial}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$modelo->denominacion_fabricante}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $modelos->links() }}
                    </div>
                </div>
            </div>



            <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title">
                    <h5 class="phd-title-list">Datos del Modelo</h5>
                    <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                     <i class="material-icons">keyboard_arrow_down</i>
                    </button>
                  </div>
        <div class="mdl-card__actions phdHide">

                     <div class="phd-input-group">
                         <input v-model="modelo.id" type="hidden" id="phd-it_to_update" name="phd-it_to_update">
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                        <input v-model="modelo.marca" class="mdl-textfield__input" type="text" id="phd-marca" readonly tabIndex="-1" name="phd-marca">
                        <label for="phd-marca" class="mdl-textfield__label">Marca (*)</label>
                        <ul for="phd-marca" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          @foreach ($marcas as $marca)
                            <li class="mdl-menu__item"  v-on:click='modelo.marca ="{{$marca->denominacion_comercial}}"'>{{$marca->denominacion_comercial}}</li>

                          @endforeach

                        </ul>
                      </div>
                      
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="modelo.codigo" class="mdl-textfield__input" type="text" id="phd-codigo" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-codigo">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Código del Modelo(*)</label>
                        </div>

                         <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="modelo.denominacion_fabricante" class="mdl-textfield__input" type="text" id="phd-denominacion_fabricante" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-denominacion_fabricante">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Denominación del Modelo según el fabricante (*)</label>
                        </div>
                      
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="modelo.codigo_bien" class="mdl-textfield__input" type="text" id="phd-codigo_bien" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-codigo_bien">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Código del Bien Mueble (*)</label>

                        </div>

                    </div>
</div>

</div>
</div>

 <div class="phd-buttons-form">
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" v-on:click="showModal('ALERTA','Se borrarán los datos del formulario. ¿Desea continuar?', borrarDatosFormulario);">
                        Cancelar
                    </button>

                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" v-on:click="showModal('INFORMACIÓN','¿Está seguro de agregar el modelo con los datos suministrados?', submitIncorporar);" >
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