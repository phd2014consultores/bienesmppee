 
<?php $__env->startSection('content'); ?> 

        <main id="bienes-app" class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-grid demo-content">

            <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
            <div id="phd-title-app"><h4><strong>Asignación del bien</strong></h4></div>


   			<form method="POST" action="/asignar" id="phd-form" class="phd-form">
  				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="csrf_token">
          <input type="hidden" name="idBienSeleccionado"  id="idBienSeleccionado">
                

			           <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title phd-head_with_search">
                      <h5 class="phd-title-list">Listado de bienes</h5>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                                  mdl-textfield--floating-label mdl-textfield--align-right">
                        <label class="mdl-button mdl-js-button mdl-button--icon"
                               for="phd-search">
                          <i class="material-icons">search</i>
                        </label>
                        <div class="mdl-textfield__expandable-holder">
                          <input class="mdl-textfield__input" type="text" name="sample"
                                 id="phd-search">
                        </div>
                      </div>
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
                            <?php $__currentLoopData = $bien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bien1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr v-on:click="asignacion.tipo_bien ='<?php echo e($bien1->tipo_bien->tipo_bien); ?>'; asignacion.bien_id ='<?php echo e($bien1->id); ?>'; showForm('phd-form<?php echo e($bien1->tipo_bien->tipo_bien); ?>');"  onclick="setIdBienAsignado(<?php echo e($bien1->id); ?>)">
                                <td class="mdl-data-table__cell--non-numeric"><?php echo e($bien1->id); ?></td>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo e(str_limit($bien1->categoria->categoria, 30)); ?> <p class="phd-table-span-hover"><?php echo e($bien1->categoria->categoria); ?></p></td>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo e(str_limit($bien1->subcategoria->subcategoria, 30)); ?><p class="phd-table-span-hover"><?php echo e($bien1->subcategoria->subcategoria); ?></p></td>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo e(str_limit($bien1->categoria_especifica->categoria_especifica, 30)); ?><p class="phd-table-span-hover"><?php echo e($bien1->categoria_especifica->categoria_especifica); ?></p></td>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo e($bien1->tipo_bien->tipo_bien); ?></td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                          </table>
                      </div>
                    </div>
                </div>
                <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title">
                    <h5 class="phd-title-list">Datos de Asignación del Bien {{asignacion.tipo_bien}} {{asignacion.bien_id}}</h5>
                    <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                      <i class="material-icons phdShow">keyboard_arrow_down</i>
                    </button>
                  </div>
                  <div class="mdl-card__actions phdHide">
                    
                    <div class="phd-formMueble phdShow">

                      <div class="phd-input-group">
                        <p class="phd-subtitle">Datos de ubicación adminitrativa</p>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-asignacion_mueble_ubicacion" name="phd-asignacion_mueble_ubicacion" v-model="asignacion.mueble.ubicacion" readonly tabIndex="-1">
                            <label for="phd-asignacion_mueble_ubicacion" class="mdl-textfield__label">Ubicación (*)</label>
                            <ul for="phd-asignacion_mueble_ubicacion" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            <?php $__currentLoopData = $ubicacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ubicacion1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mdl-menu__item"  v-on:click="asignacion.mueble.ubicacion = '<?php echo e($ubicacion1->ubicacion); ?>';"><?php echo e($ubicacion1->ubicacion); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                      </div>

                      <div class="phd-input-group">
                        <p class="phd-subtitle">Datos específicos de asignación</p>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-asignacion_mueble_unidad_administrativa" v-model="asignacion.mueble.unidad_administrativa" name="phd-asignacion_mueble_unidad_administrativa">
                          <label class="mdl-textfield__label" for="'phd-asignacion_mueble_unidad_administrativa">Unidad administrativa (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-asignacion_mueble_responsable_administrativo" v-model="asignacion.mueble.responsable_administrativo" name="phd-asignacion_mueble_responsable_administrativo">
                          <label class="mdl-textfield__label" for="'phd-asignacion_mueble_responsable_administrativo">Responsable administrativo (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-asignacion_mueble_responsable_uso_directo" v-model="asignacion.mueble.responsable_uso_directo" name="phd-asignacion_mueble_responsable_uso_directo">
                          <label class="mdl-textfield__label" for="'phd-asignacion_mueble_responsable_uso_directo">Responsable de uso directo (*)</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="phd-formInmueble phdHide">
                      
                      <div class="phd-input-group">
                        <p class="phd-subtitle">Datos de ubicación geográfica</p>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-asignacion_ubicacion" v-model="asignacion.inmueble.ubicacion" name="phd-asignacion_ubicacion">
                          <label class="mdl-textfield__label" for="phd-asignacion_ubicacion">Ubicación (*)</label>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-asignacion_pais" v-model="asignacion.inmueble.pais" readonly tabIndex="-1" name="phd-asignacion_pais">
                            <label for="phd-asignacion_pais" class="mdl-textfield__label">País (*)</label>
                            <ul for="phd-asignacion_pais" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            <?php $__currentLoopData = $pais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mdl-menu__item"  v-on:click="asignacion.inmueble.pais = '<?php echo e($pais1->pais); ?>';"><?php echo e($pais1->pais); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-asignacion_localizacion" v-model="asignacion.inmueble.localizacion" readonly tabIndex="-1" name="phd-asignacion_localizacion">
                            <label for="phd-asignacion_localizacion" class="mdl-textfield__label">Localización (*)</label>
                            <ul for="phd-asignacion_localizacion" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item"  v-on:click="asignacion.inmueble.localizacion = 'Nacional';">Nacional</li>
                                <li class="mdl-menu__item"  v-on:click="asignacion.inmueble.localizacion = 'Internacional';">Internacional</li>
                            </ul>
                        </div>
                      </div>
                      <div class="phd-input-group">
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-asignacion_parroquia" name="phd-asignacion_parroquia" v-model="asignacion.inmueble.parroquia" readonly tabIndex="-1">
                            <label for="phd-asignacion_parroquia" class="mdl-textfield__label">Parroquia (*)</label>
                            <ul for="phd-asignacion_parroquia" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            <?php $__currentLoopData = $parroquia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parroquia1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mdl-menu__item"  v-on:click="asignacion.inmueble.parroquia = '<?php echo e($parroquia1->parroquia); ?>';"><?php echo e($parroquia1->parroquia); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-asignacion_calle_av" v-model="asignacion.inmueble.calle_av" name="phd-asignacion_calle_av">
                          <label class="mdl-textfield__label" for="phd-asignacion_calle_av">Calle o Av. (*)</label>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-asignacion_urbanizacion" v-model="asignacion.inmueble.urbanizacion" name="phd-asignacion_urbanizacion">
                          <label class="mdl-textfield__label" for="phd-asignacion_urbanizacion">Urbanización (*)</label>
                        </div>
                      </div>

                      <div class="phd-input-group">

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-asignacion_casa_edificio" v-model="asignacion.inmueble.casa_edificio" name="phd-asignacion_casa_edificio">
                          <label class="mdl-textfield__label" for="phd-asignacion_casa_edificio">Casa o edificio (*)</label>
                        </div>


                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-asignacion_posee_sede"  v-model="asignacion.inmueble.posee_sede" readonly tabIndex="-1" name="phd-asignacion_posee_sede">
                            <label for="phd-asignacion_posee_sede" class="mdl-textfield__label">Posee sede (*)</label>
                            <ul for="phd-asignacion_posee_sede" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item"  v-on:click="asignacion.inmueble.posee_sede = 'Si';">Si</li>
                                <li class="mdl-menu__item"  v-on:click="asignacion.inmueble.posee_sede = 'No';">No</li>
                            </ul>
                        </div>
                        
                       <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-asignacion_sede" name="phd-asignacion_sede" v-model="asignacion.inmueble.sede" readonly tabIndex="-1">
                            <label for="phd-asignacion_sede" class="mdl-textfield__label">Sede (*)</label>
                            <ul for="phd-asignacion_sede" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            <?php $__currentLoopData = $sede; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sede1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mdl-menu__item"  v-on:click="asignacion.inmueble.sede = '<?php echo e($sede1->sede); ?>';"><?php echo e($sede1->sede); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                      </div>
                      

                      <div class="phd-input-group">
                        <p class="phd-subtitle">Datos específicos de la asignación</p>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-asignacion_inmueble_unidad_administrativa" v-model="asignacion.inmueble.unidad_administrativa" name="phd-asignacion_inmueble_unidad_administrativa">
                          <label class="mdl-textfield__label" for="'phd-asignacion_inmueble_unidad_administrativa">Unidad administrativa (*)</label>
                        </div>
                       
                        
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-asignacion_inmueble_responsable_administrativo" v-model="asignacion.inmueble.responsable_administrativo" name="phd-asignacion_inmueble_responsable_administrativo">
                          <label class="mdl-textfield__label" for="'phd-asignacion_inmueble_responsable_administrativo">Responsable administrativo (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-asignacion_inmueble_responsable_uso_directo" v-model="asignacion.inmueble.responsable_uso_directo" name="phd-asignacion_inmueble_responsable_uso_directo">
                          <label class="mdl-textfield__label" for="'phd-asignacion_inmueble_responsable_uso_directo">Responsable de uso directo (*)</label>
                        </div>
                      </div>
                  </div>
                </div>


                <div class="phd-buttons-form">
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" v-on:click="showModal('ALERTA','Se borrarán los datos del formulario. ¿Desea continuar?', borrarDatosFormulario);">
                        Cancelar
                    </button>

                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" v-on:click="showModal('INFORMACIÓN','¿Está seguro de asignar el bien con los datos suministrados?', submitAsignar);" v-bind:disabled="!isFormValidAsig()">
                        Asignar
                    </button>
                    
                </div>
			</form>
		  </div>

		</main>


      <dialog class="mdl-dialog">
        <h4 class="mdl-dialog__title">{{dialog.title}}</h4>
        <div class="mdl-dialog__content">
          <p>
            {{dialog.content}}
          </p>
        </div>
        <div class="mdl-dialog__actions">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent agree">Aceptar</button>
          <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored close">Cancelar</button>
        </div>
      </dialog>

          <?php if($mensaje != ""): ?>
          <dialog id="mensaje-satisfactorio" class="mdl-dialog">
            <h4 class="mdl-dialog__title">INFORMACIÓN</h4>
            <div class="mdl-dialog__content">
              <p>
                <?php echo e($mensaje); ?> 
              </p>
            </div>
            <div class="mdl-dialog__actions">
              <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent close" >Aceptar</button>
              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored close">Cancelar</button>
            </div>
          </dialog>
          <?php endif; ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>