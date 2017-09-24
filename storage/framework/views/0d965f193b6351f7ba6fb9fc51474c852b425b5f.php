 
<?php $__env->startSection('content'); ?> 

        <main id="bienes-app" class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-grid demo-content">

            <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
            <div id="phd-title-app"><h4><strong>Asignación del bien</strong></h4></div>


   			<form method="POST" action="asignacion" id="phd-form" class="phd-form">
  				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="csrf_token">
                <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                    <input class="mdl-textfield__input" type="text" id="phd-tipo_bien"  v-model="asignacion.tipo_bien" readonly tabIndex="-1" name="phd-tipo_bien">
                    <label for="phd-tipo_bien" class="mdl-textfield__label">Tipo del bien (*)</label>
                    <ul for="phd-tipo_bien" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                        <?php $__currentLoopData = $tipo_bien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_bien1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($tipo_bien1->tipo_bien=='Mueble'): ?>
    					<li class="mdl-menu__item"  v-on:click="asignacion.tipo_bien = 'Mueble';showForm('phd-formMueble');"> <?php echo e($tipo_bien1->tipo_bien); ?> </li>
    					<?php else: ?>
    					<li class="mdl-menu__item"  v-on:click="asignacion.tipo_bien = 'Inmueble';showForm('phd-formInmueble');"> <?php echo e($tipo_bien1->tipo_bien); ?> </li>
    					<?php endif; ?>
    					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

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
                        <div class="phd-paginator">
                            <ul class="pagination">
                              <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                              <li class="active"><a href="#!">1</a></li>
                              <li class="waves-effect"><a href="#!">2</a></li>
                              <li class="waves-effect"><a href="#!">3</a></li>
                              <li class="waves-effect"><a href="#!">4</a></li>
                              <li class="waves-effect"><a href="#!">5</a></li>
                              <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                            </ul>
                          </div>
                          <table class="phd-table-dashboard mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                            <thead>
                              <tr>
                                <th class="mdl-data-table__cell--non-numeric">Codigo interno</th>
                                <th class="mdl-data-table__cell--non-numeric">Categoria</th>
                                <th class="mdl-data-table__cell--non-numeric">Subcategoria</th>
                                <th class="mdl-data-table__cell--non-numeric">Categoria especifica</th>
                                <th class="mdl-data-table__cell--non-numeric">Estado del bien</th>
                                <th class="mdl-data-table__cell--non-numeric">Valor total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                              <?php $__currentLoopData = $bien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bien1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo e($bien1->id); ?></td>
                      		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tr>
                              <tr>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                              </tr>
                              <tr>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                              </tr>
                              <tr>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                              </tr>
                              <tr>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                                <td class="mdl-data-table__cell--non-numeric"></td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="phd-paginator">
                            <ul class="pagination">
                              <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                              <li class="active"><a href="#!">1</a></li>
                              <li class="waves-effect"><a href="#!">2</a></li>
                              <li class="waves-effect"><a href="#!">3</a></li>
                              <li class="waves-effect"><a href="#!">4</a></li>
                              <li class="waves-effect"><a href="#!">5</a></li>
                              <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                            </ul>
                          </div>
                      </div>






			</form>
		  </div>
		</main>


	  <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
      <script src="https://unpkg.com/vue@2.3.4"></script>
      <script src="assets/js/scripts.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.3.4"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>