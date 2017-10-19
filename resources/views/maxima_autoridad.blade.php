@extends('layout') 
@section('content')

        <main id="bienes-app" class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-grid demo-content">

            <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
            <div id="phd-title-app"><h4><strong>Máxima Autoridad</strong></h4></div>

				<form method="POST" action="maxima_autoridad" id="phd-form" class="phd-form">
  					<input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">



                    <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title phd-head_with_search">
                            <h5 class="phd-title-list">Listado de Máximas Autoridades</h5>

                            <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                                <i class="material-icons">keyboard_arrow_down</i>
                            </button>
                        </div>
                        <div class="mdl-card__actions phdShow">
                            <div class="phd-formMueble phdShow">
                                <table class="phd-table-dashboard mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                                    <thead>
                                    <tr>
                                        <th class="mdl-data-table__cell--non-numeric">Nombre y Apellido</th>
                                        <th class="mdl-data-table__cell--non-numeric">Cargo</th>
                                        <th class="mdl-data-table__cell--non-numeric">¿Habilitado?</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($maximas_autoridades as $maxima_autoridad)
                                        <tr v-on:click="obtenerMaximaAutoridad('{{$maxima_autoridad->id }}',{{$ente}})">
                                            <td class="mdl-data-table__cell--non-numeric">{{$maxima_autoridad->nombre}} {{$maxima_autoridad->apellido}}</td>
                                            <td class="mdl-data-table__cell--non-numeric">{{$maxima_autoridad->cargo}}</td>
                                            <td class="mdl-data-table__cell--non-numeric">
                                                @if ($maxima_autoridad->habilitado === true)
                                                    SI
                                                @else
                                                    NO
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{ $maximas_autoridades->links() }}
                            </div>
                        </div>
                    </div>



                    <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title">
                    <h5 class="phd-title-list">Datos Máxima Autoridad</h5>
                    <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                     <i class="material-icons">keyboard_arrow_down</i>
                    </button>
                  </div>
 				<div class="mdl-card__actions phdHide" style="height: 375px;">

                     <div class="phd-input-group">
                         <input v-model="maxima.id" type="hidden" id="phd-it_to_update" name="phd-it_to_update">
                       <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                        <input class="mdl-textfield__input" type="text" id="phd-ente" v-model="maxima.ente" readonly tabIndex="-1" name="phd-ente">
                        <label for="phd-ente" class="mdl-textfield__label">Ente (*)</label>
                        <ul for="phd-ente" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          @foreach ($ente as $ente1)
                            <li class="mdl-menu__item"  v-on:click='maxima.ente ="{{$ente1->razon_social}}"'>{{$ente1->razon_social}}</li>

                          @endforeach

                        </ul>
                      </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="maxima.ci" class="mdl-textfield__input" type="text" id="phd-ci" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-ci">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Cédula de Identidad (*)</label>
                        </div>

                         <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="maxima.nombre" class="mdl-textfield__input" type="text" id="phd-nombre" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-nombre">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Nombre (*)</label>
                        </div>
                      


                    </div>

                     <div class="phd-input-group">
                       <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="maxima.apellido" class="mdl-textfield__input" type="text" id="phd-apellido" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-apellido">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Apellido (*)</label>

                        </div>
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="maxima.telefono" class="mdl-textfield__input" type="text" id="phd-telefono" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-telefono">
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Teléfono (*)</label>   
                        </div>

                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="maxima.cargo" class="mdl-textfield__input" type="text" id="phd-cargo" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-cargo">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Cargo (*)</label>

                        </div>
                        
                
                       

                    </div>
                        
                    <div class="phd-input-group">
                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="maxima.correo_electronico" class="mdl-textfield__input" type="text" id="phd-correo_electronico" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-correo_electronico">
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Correo Electrónico (*)</label>   
                        </div>

                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="maxima.numero_gaceta" class="mdl-textfield__input" type="text" id="phd-numero_gaceta" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-numero_gaceta">
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Número Gaceta (*)</label>   
                        </div>
                         <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="maxima.fecha_gaceta" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fecha_gaceta" name="phd-fecha_gaceta" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" >
                          <label class="mdl-textfield__label" >Fecha Gaceta (DD/MM/AAAA) (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="maxima.numero_resolucion_decreto" class="mdl-textfield__input" type="text" id="phd-numero_decreto" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-numero_decreto">
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Número de Resolución ó Decreto (*)</label>   
                        </div>


                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input v-model="maxima.fecha_resolucion_decreto" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fecha_decreto" name="phd-fecha_decreto" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" >
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Fecha de Resolución ó Decreto (DD/MM/AAAA) (*)</label>   
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-habilitado"  v-model="maxima.habilitado" readonly tabIndex="-1" name="phd-habilitado">
                            <label for="phd-habilitado" class="mdl-textfield__label">¿Habilitado? (*)</label>
                            <ul for="phd-habilitado" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item"  v-on:click="maxima.habilitado = 'SI';"> SI </li>
                                <li class="mdl-menu__item"  v-on:click="maxima.habilitado = 'NO';"> NO </li>
                            </ul>
                        </div>
                      

                    </div>

                    
                    </div>

</div>
</div>

 <div class="phd-buttons-form">
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" v-on:click="showModal('ALERTA','Se borrarán los datos del formulario. ¿Desea continuar?', borrarDatosFormulario);">
                        Cancelar
                    </button>

                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" v-on:click="showModal('INFORMACIÓN','¿Está seguro de agregar la maxima autoridad con los datos suministrados?', submitIncorporar);" >
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