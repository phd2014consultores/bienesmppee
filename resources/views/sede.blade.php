@extends('layout') 
@section('content')

        <main id="bienes-app" class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-grid demo-content">

            <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
            <div id="phd-title-app"><h4><strong>Sedes</strong></h4></div>

        <form method="POST" action="sede" id="phd-form" class="phd-form">
            <input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">



            <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title phd-head_with_search">
                    <h5 class="phd-title-list">Listado de Sedes</h5>

                    <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                        <i class="material-icons">keyboard_arrow_down</i>
                    </button>
                </div>
                <div class="mdl-card__actions phdShow">
                    <div class="phd-formMueble phdShow">
                        <table class="phd-table-dashboard mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                            <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">Descripción</th>
                                <th class="mdl-data-table__cell--non-numeric">Ciudad</th>
                                <th class="mdl-data-table__cell--non-numeric">Localización</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sedes as $sede)
                                <tr v-on:click="obtenerSede('{{$sede->id }}',{{$ente}})">
                                    <td class="mdl-data-table__cell--non-numeric">{{$sede->descripcion}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$sede->codigo_ciudad_ente}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$sede->localizacion}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $sedes->links() }}
                    </div>
                </div>
            </div>





            <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title">
                    <h5 class="phd-title-list">Datos de la Sede</h5>
                    <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                     <i class="material-icons">keyboard_arrow_down</i>
                    </button>
                  </div>
        <div class="mdl-card__actions phdHide">

                     <div class="phd-input-group">
                       <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                        <input class="mdl-textfield__input" type="text" id="phd-ente" v-model="sede.ente" readonly tabIndex="-1" name="phd-ente">
                        <label for="phd-ente" class="mdl-textfield__label">Ente (*)</label>
                        <ul for="phd-ente" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          @foreach ($ente as $ente1)
                            <li class="mdl-menu__item"  v-on:click='sede.ente ="{{$ente1->razon_social}}"'>{{$ente1->razon_social}}</li>
                          @endforeach

                        </ul>
                      </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="sede.codigo" class="mdl-textfield__input" type="text" id="phd-codigo" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-codigo">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Código de la Sede (*)</label>
                        </div>

                         <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                        <input class="mdl-textfield__input" type="text" id="phd-tipo_sede" v-model="sede.tipo_sede" readonly tabIndex="-1" name="phd-tipo_sede">
                        <label for="phd-tipo_sede" class="mdl-textfield__label">Tipo de Sede (*)</label>
                        <ul for="phd-tipo_sede" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          @foreach ($tipo_sede as $tipo_sede1)
                            <li class="mdl-menu__item"  v-on:click='sede.tipo_sede ="{{$tipo_sede1->tipo}}"'>{{$tipo_sede1->tipo}}</li>
                          @endforeach

                        </ul>
                      </div>
                       <div v-if="sede.tipo_sede == 'Otra Tipo de Sede o Lugar'"  class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="sede.especificacion_tipo_sede" class="mdl-textfield__input" type="text" id="phd-especificacion_tipo_sede" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-especificacion_tipo_sede">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Especifique tipo de sede o lugar (*)</label>

                        </div>
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="sede.descripcion" class="mdl-textfield__input" type="text" id="phd-descripcion" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-descripcion">
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Descripción de la Sede (*)</label>   
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                        <input class="mdl-textfield__input" type="text" id="phd-localizacion" v-model="sede.localizacion" readonly tabIndex="-1" name="phd-localizacion">
                        <label for="phd-localizacion" class="mdl-textfield__label">Localización (*)</label>
                        <ul for="phd-localizacion" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            <li class="mdl-menu__item"  v-on:click="sede.localizacion = 'Nacional'">Nacional</li>
                            <li class="mdl-menu__item"  v-on:click="sede.localizacion = 'Internacional'">Internacional</li>
                        </ul>
                      </div>
                
                       
                     <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                        <input class="mdl-textfield__input" type="text" id="phd-pais" v-model="sede.codigo_pais" readonly tabIndex="-1" name="phd-pais">
                        <label for="phd-pais" class="mdl-textfield__label">País donde se ubica
la Sede (*)</label>
                        <ul for="phd-pais" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          @foreach ($pais as $pais1)
                            <li class="mdl-menu__item"  v-on:click='sede.codigo_pais ="{{$pais1->pais}}"'>{{$pais1->pais}}</li>
                          @endforeach

                        </ul>
                      </div>

                      <div v-if="sede.codigo_pais == 'Otro País'" class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="sede.especifique_otro_pais" class="mdl-textfield__input" type="text" id="phd-especifique_otro_pais" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-especifique_otro_pais">
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Especifique el otro país (*)</label>   
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                        <input class="mdl-textfield__input" type="text" id="phd-codigo_ciudad_ente" v-model="sede.codigo_ciudad_ente" readonly tabIndex="-1" name="phd-codigo_ciudad_ente">
                        <label for="phd-codigo_ciudad_ente" class="mdl-textfield__label">Ciudad donde se ubica el Órgano o Ente (*)</label>
                        <ul for="phd-codigo_ciudad_ente" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          @foreach ($ciudad as $ciudad1)
                            <li class="mdl-menu__item"  v-on:click='sede.codigo_parroquia_ente ="{{$ciudad1->ciudad}}"'>{{$ciudad1->ciudad}}</li>
                          @endforeach

                        </ul>
                      </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                        <input class="mdl-textfield__input" type="text" id="phd-codigo_parroquia_ente" v-model="sede.codigo_parroquia_ente" readonly tabIndex="-1" name="phd-codigo_parroquia_ente">
                        <label for="phd-codigo_parroquia_ente" class="mdl-textfield__label">Parroquia donde se ubica el Órgano o Ente (*)</label>
                        <ul for="phd-parroquia" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          @foreach ($parroquia as $parroquia1)
                            <li class="mdl-menu__item"  v-on:click='sede.codigo_parroquia_ente ="{{$parroquia1->parroquia}}"'>{{$parroquia1->parroquia}}</li>
                          @endforeach

                        </ul>
                      </div>
                        

                       

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="sede.nombre_otra_ciudad" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-nombre_otra_ciudad" name="phd-nombre_otra_ciudad" >
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Especifique el nombre de la otra ciudad (*)</label>   
                        </div>

                         <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="sede.urbanizacion" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-urbanizacion" name="phd-urbanizacion" >
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Urbanización (*)</label>   
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="sede.calle_avenida" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-calle_avenida" name="phd-calle_avenida" >
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Calle / Avenida (*)</label> 
                        </div>

                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="sede.casa_edificio" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-casa_edificio" name="phd-casa_edificio" >
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Casa / Edificio (*)</label> 
                        </div>

                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="sede.piso" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-piso" name="phd-piso" >
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Piso (*)</label> 
                        </div>
                      

                    </div>

                    
                    </div>

</div>
</div>

 <div class="phd-buttons-form">
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" v-on:click="showModal('ALERTA','Se borrarán los datos del formulario. ¿Desea continuar?', borrarDatosFormulario);">
                        Cancelar
                    </button>

                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" v-on:click="showModal('INFORMACIÓN','¿Está seguro de agregar la sede con los datos suministrados?', submitIncorporar);" >
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