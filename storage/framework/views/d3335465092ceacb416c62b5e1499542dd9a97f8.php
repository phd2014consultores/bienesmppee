 
<?php $__env->startSection('content'); ?>




 <main id="bienes-app" class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-grid demo-content">

            <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
            <div id="phd-title-app"><h4><strong>Desincorporación del bien</strong></h4></div>


   			<form method="POST" action="/desincorporar" id="phd-form" class="phd-form" enctype="multipart/form-data">
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
                              <tr v-on:click="asignacion.tipo_bien ='<?php echo e($bien1->tipo_bien->tipo_bien); ?>';asignacion.bien_id ='<?php echo e($bien1->id); ?>'; showForm('phd-form<?php echo e($bien1->tipo_bien->tipo_bien); ?>');"  onclick="setIdBienAsignado(<?php echo e($bien1->id); ?>)">
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
                    <h5 class="phd-title-list">Datos de desincorporación del Bien {{asignacion.tipo_bien}} {{asignacion.bien_id}} </h5>
                    <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                      <i class="material-icons phdShow">keyboard_arrow_down</i>
                    </button>
                  </div>
                  <div class="mdl-card__actions phdHide">
                    

                      <div class="phd-input-group">
                        <p class="phd-subtitle">Datos de las condiciones</p>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-desincorporacion_estado_uso" value="" v-model="desincorporacion.estado_uso" readonly tabIndex="-1" name="phd-desincorporacion_estado_uso">
                            <label for="phd-desincorporacion_estado_uso" class="mdl-textfield__label">Estado del uso (*)</label>
                            <ul for="phd-desincorporacion_estado_uso" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            <?php $__currentLoopData = $estado_uso; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado_uso1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mdl-menu__item"  v-on:click="desincorporacion.estado_uso = '<?php echo e($estado_uso1->estado_uso); ?>';"><?php echo e($estado_uso1->estado_uso); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                      </div>

                      <div class="phd-input-group">
                    <input style="display:none!important;" type="file" id="phd-desincorporacion_files" onchange="setFiles(this);" accept="image/*" name="phd-desincorporacion_files[]" multiple >


                        <!-- Icon List -->
                          
                        <p v-if="desincorporacion.files.length > 0" class="phd-subtitle">Lista de fotos agregadas</p>
                          <ul class="demo-list-icon mdl-list phd-listFile">
                            <li v-for="(item,indice) of desincorporacion.img" class="mdl-list__item">
                              <span class="deleteImage" v-on:click="eliminarFoto(indice)">X</span>
                              <span class="itemImage" class="mdl-list__item-primary-content">
                                  <div class="contenedorImg">
                                  <img :src="item.data"> </div>
                                  <span class="file-name">
                                  {{item.name}}</span>
                              </span>
                            </li>
                          </ul>


                        <button type="button" onclick="document.getElementById('phd-desincorporacion_files').click();" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent phd-right phd-m16">
                          + {{string_fotos}} fotos
                        </button>

                      </div>

                  </div>
                </div>


                <div class="phd-buttons-form">
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" v-on:click="showModal('ALERTA','Se borrarán los datos del formulario. ¿Desea continuar?', borrarDatosFormulario);">
                        Cancelar
                    </button>

                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" v-on:click="showModal('INFORMACIÓN','¿Está seguro de desincorporar el bien con los datos suministrados?', submitAsignar);" v-bind:disabled="!isFormValidDesin()">
                        Desincorporar
                    </button>
                    
                </div>
                    
            </form>

          </div>
        </main>
      </div>


      <dialog class="mdl-dialog">
        <h4 class="mdl-dialog__title">{{dialog.title}}</h4>
        <div class="mdl-dialog__content">
          <p>
            {{dialog.content}}
          </p>
        </div>
        <div class="mdl-dialog__actions">
          <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent agree">Aceptar</button>
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
      <script src="assets/dialog/dialog.js"></script>
      <script src="assets/js/scripts.js"></script>
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