@extends('layout') 
@section('content')

        <main id="bienes-app" class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-grid demo-content">

            <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
            <div id="phd-title-app"><h4><strong>Sedes</strong></h4></div>

        <form method="POST" action="sede" id="phd-form" class="phd-form">
            <input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">



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
                        <input class="mdl-textfield__input" type="text" id="phd-ente" v-model="maxima.ente" readonly tabIndex="-1" name="phd-ente">
                        <label for="phd-categoria" class="mdl-textfield__label">Ente (*)</label>
                        <ul for="phd-ente" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          @foreach ($ente as $ente1)
                            <li class="mdl-menu__item"  v-on:click='maxima.ente ="{{$ente1->razon_social}}"'>{{$ente1->razon_social}}</li>

                          @endforeach

                        </ul>
                      </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input class="mdl-textfield__input" type="text" id="phd-codigo" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-codigo">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Código de la Sede (*)</label>
                        </div>

                         <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input class="mdl-textfield__input" type="text" id="phd-tipo_sede" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-tipo_sede">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Tipo de Sede (*)</label>
                        </div>
                      


                    </div>

                     <div class="phd-input-group">
                       <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input class="mdl-textfield__input" type="text" id="phd-especificacion_tipo_sede" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-especificacion_tipo_sede">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Especifique tipo de sede o lugar (*)</label>

                        </div>
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input class="mdl-textfield__input" type="text" id="phd-descripcion" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-descripcion">
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Descripción de la Sede (*)</label>   
                        </div>

                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input class="mdl-textfield__input" type="text" id="phd-localizacion" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-localizacion">
                          <label class="mdl-textfield__label" for="phd-id_proveedor">Localización (*)</label>

                        </div>
                        
                
                       

                    </div>
                        
                    <div class="phd-input-group">
                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input class="mdl-textfield__input" type="text" id="phd-codigo_pais" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-codigo_pais">
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Código del País donde se ubica la Sede. (*)</label>   
                        </div>

                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input class="mdl-textfield__input" type="text" id="phd-especifique_otro_pais" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-especifique_otro_pais">
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Especifique el otro país (*)</label>   
                        </div>
                         <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-codigo_parroquia_ente" name="phd-codigo_parroquia_ente"  >
                          <label class="mdl-textfield__label" >Código de la parroquia donde se ubica el Órgano o Ente. (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input class="mdl-textfield__input" type="text" id="phd-codigo_ciudad_ente" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)"  name="phd-codigo_ciudad_ente">
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Código de la Ciudad donde se ubica el Órgano o Ente(*)</label>   
                        </div>


                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-nombre_otra_ciudad" name="phd-nombre_otra_ciudad" >
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Especifique el nombre de la otra ciudad (*)</label>   
                        </div>

                         <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-urbanizacion" name="phd-urbanizacion" >
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Urbanización (*)</label>   
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-calle_avenida" name="phd-calle_avenida" >
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Calle / Avenida (*)</label> 
                        </div>

                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-casa_edificio" name="phd-casa_edificio" >
                          <label class="mdl-textfield__label" for="phd-id_proveedor"> Casa / Edificio (*)</label> 
                        </div>

                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-piso" name="phd-piso" >
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