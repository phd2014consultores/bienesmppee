@extends('layout') 
@section('content') 


    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">

          <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>

            <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">

                <div class="mdl-card__title phd-head_with_search">

                    <h5 class="phd-title-list">Filtrar</h5>
                    <button type="button" id="phd-filtrar_por" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                        <i class="material-icons">keyboard_arrow_down</i>
                    </button>

                </div>

                <div class="mdl-card__actions phdHide">
                    <form method="POST" action="/tablero" id="phd-form" class="phd-form">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-tipo_bien" name="phd-tipo_bien" v-model="filtros.tipo_bien" readonly tabIndex="-1">
                            <label for="phd-tipo_bien" class="mdl-textfield__label">Tipo del bien</label>
                            <ul for="phd-tipo_bien" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                @foreach ($tipo_bienes as $tipo_bien)
                                    <li class="mdl-menu__item"  v-on:click="filtros.tipo_bien = '{{ $tipo_bien->nombre }}';"> {{ $tipo_bien->nombre }} </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-forma_adquisicion" name="phd-forma_adquisicion" v-model="filtros.forma_adquisicion" readonly tabIndex="-1">
                            <label for="phd-forma_adquisicion" class="mdl-textfield__label">Forma de adquisición</label>
                            <ul for="phd-forma_adquisicion" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                @foreach ($formas_adquisiciones as $forma_adquisicion)
                                    <li class="mdl-menu__item"  v-on:click="filtros.forma_adquisicion = '{{ $forma_adquisicion->nombre }}';"> {{ $forma_adquisicion->nombre }} </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input autocomplete="off" v-on:keyup="autoCompleteResponsableAdministrativo(filtros.responsable_administrativo);" class="mdl-textfield__input" type="text" id="phd-responsable_administrativo" name="phd-responsable_administrativo" v-model="filtros.responsable_administrativo" tabIndex="-1">
                            <label for="phd-responsable_administrativo" class="mdl-textfield__label">Responsable Administrativo</label>
                            <ul for="phd-responsable_administrativo" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li v-for="item in responsables_admin" class="mdl-menu__item" v-on:click="filtros.responsable_administrativo = item;">@{{item}}</li>
                            </ul>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input autocomplete="off" v-on:keyup="autoCompleteResponsableUsoDirecto(filtros.responsable_uso_directo);" class="mdl-textfield__input" type="text" id="phd-responsable_uso_directo" name="phd-responsable_uso_directo" v-model="filtros.responsable_uso_directo" tabIndex="-1">
                            <label for="phd-responsable_uso_directo" class="mdl-textfield__label">Responsable Uso Directo</label>
                            <ul for="phd-responsable_uso_directo" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li v-for="item in responsables_uso" class="mdl-menu__item" v-on:click="filtros.responsable_uso_directo = item;">@{{item}}</li>
                            </ul>
                        </div>

                        <div class="mdl-dialog__actions">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent agree" >Filtrar</button>
                        </div>

                    </form>
                </div>
            </div>

          <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">


              <div class="mdl-card__title phd-head_with_search">

                  <h5 class="phd-title-list">Listado de bienes</h5>

              </div>

              @if($filtro['tipo_bien'] || $filtro['forma_adquisicion'] || $filtro['responsable_administrativo'] || $filtro['responsable_uso_directo'])
              <div class="phd-filtros_aplicados" style="padding: 16px;">
                  <h6><strong>Filtros aplicados:</strong></h6>
                  <ul>
                      @if ($filtro['tipo_bien'])
                          <li><strong>Tipo del bien:</strong> {{$filtro['tipo_bien']}}</li>
                      @endif
                      @if ($filtro['forma_adquisicion'])
                          <li><strong>Forma de adquisición:</strong> {{$filtro['forma_adquisicion']}}</li>
                      @endif
                      @if ($filtro['responsable_administrativo'])
                          <li><strong>Resp. administrativo:</strong> {{$filtro['responsable_administrativo']}}</li>
                      @endif
                      @if ($filtro['responsable_uso_directo'])
                          <li><strong>Resp. de uso directo:</strong> {{$filtro['responsable_uso_directo']}}</li>
                      @endif
                  </ul>

                  <p style="background-color: #00BCD4;width: fit-content;"><strong>Total de bienes encontrados: </strong><span>{{$bien->total()}}</span></p>

              </div>
              @endif

              <table class="phd-table-dashboard mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                <thead>
                  <tr>
                    <th class="mdl-data-table__cell--non-numeric">Codigo interno</th>
                    <th class="mdl-data-table__cell--non-numeric">Tipo del bien</th>
                    <th class="mdl-data-table__cell--non-numeric">Forma de adqusición</th>
                    <th class="mdl-data-table__cell--non-numeric">Responsable administrativo</th>
                    <th class="mdl-data-table__cell--non-numeric">Responsable uso directo</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($bien as $bien1)
                  <tr>
                      <td class="mdl-data-table__cell--non-numeric">{{$bien1->id}}</td>
                      <td class="mdl-data-table__cell--non-numeric">{{$bien1->tipo_bien->nombre}}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{str_limit($bien1->forma_adquisicion->nombre, 30)}} <p class="phd-table-span-hover">{{$bien1->forma_adquisicion->nombre}}</p></td>
                    <td class="mdl-data-table__cell--non-numeric">{{str_limit($bien1->responsable->responsable_administrativo, 30)}}<p class="phd-table-span-hover">{{$bien1->responsable->responsable_administrativo}}</p></td>
                    <td class="mdl-data-table__cell--non-numeric">{{str_limit($bien1->responsable->responsable_uso_directo, 30)}}<p class="phd-table-span-hover">{{$bien1->responsable->responsable_uso_directo}}</p></td>
                 </tr>
                @endforeach              
                </tbody>
              </table>
              {{ $bien->links() }}
        
            </div>
          </div>

        </div>
      </main>
    </div>


    <link rel="stylesheet" href="assets/mdl/css/Material-Icon.css">
    <link rel="stylesheet" href="assets/mdl/css/material.min.css">
    <link rel="stylesheet" href="assets/customer-css/styles.css">
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://unpkg.com/vue@2.3.4"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.3.4"></script>
    <script src="assets/js/scripts.js"></script>

















@endsection