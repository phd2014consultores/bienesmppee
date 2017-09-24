@extends('layout') 
@section('content') 

        <main id="bienes-app" class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-grid demo-content">

            <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
            <div id="phd-title-app"><h4><strong>Incorporación del bien</strong></h4></div>

				<form method="POST" action="incorporar" id="phd-form" class="phd-form">
  					<input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">
            <input type="hidden" name="phd-incorporarBien" value="SI" id="phd-incorporarBien">

                    <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                    <input class="mdl-textfield__input" type="text" id="phd-tipo_bien"  v-model="bien.tipo_bien" readonly tabIndex="-1" name="phd-tipo_bien">
                    <label for="phd-tipo_bien" class="mdl-textfield__label">Tipo del bien (*)</label>
                    <ul for="phd-tipo_bien" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                        @foreach ($tipo_bien as $tipo_bien1)
                        @if($tipo_bien1->tipo_bien=='Mueble')
    					<li class="mdl-menu__item"  v-on:click="bien.tipo_bien = 'Mueble';showForm('phd-formMueble');"> {{ $tipo_bien1->tipo_bien }} </li>
    					@else
    					<li class="mdl-menu__item"  v-on:click="bien.tipo_bien = 'Inmueble';showForm('phd-formInmueble');"> {{ $tipo_bien1->tipo_bien }} </li>
    					@endif
    					@endforeach
                    </ul>
                </div>

                <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title">
                    <h5 class="phd-title-list">Datos Generales</h5>
                    <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                     <i class="material-icons">keyboard_arrow_down</i>
                    </button>
                  </div>


                  <div class="mdl-card__actions phdHide">
                    <div class="phd-input-group">
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height getmdl-select__fullwidth">
                        <input class="mdl-textfield__input" type="text" id="phd-forma_adqusicion"  v-model="bien.forma_adquisicion" readonly tabIndex="-1" name="phd-forma_adqusicion">
                        <label for="phd-forma_adqusicion" class="mdl-textfield__label">Forma de Adquisición</label>

                        <ul for="phd-forma_adqusicion" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            @foreach ($forma_adquisicion as $forma_adquisicion1)
                        	@if($forma_adquisicion1->forma_adquisicion=='Adjudicación')
                            <li class="mdl-menu__item"  v-on:click="showForm('phd-fa_adjudicacion',{{ $forma_adquisicion1->id }});bien.forma_adquisicion = 'Adjudicación'">  {{ $forma_adquisicion1->forma_adquisicion }}</li>
                            @endif
                            @if($forma_adquisicion1->forma_adquisicion=='Compra concurso abierto')
                            <li class="mdl-menu__item" v-on:click="showForm('phd-fa_compra_concurso_abierto');bien.forma_adquisicion = 'Compra concurso abierto'">{{ $forma_adquisicion1->forma_adquisicion }}</li>
                            @endif
                            @if($forma_adquisicion1->forma_adquisicion=='Compra concurso cerrado')
                            <li class="mdl-menu__item" v-on:click="showForm('phd-fa_compra_concurso_cerrado');bien.forma_adquisicion = 'Compra concurso cerrado'">{{ $forma_adquisicion1->forma_adquisicion }}</li>
                            @endif
                            @if($forma_adquisicion1->forma_adquisicion=='Compra directa')
                            <li class="mdl-menu__item" v-on:click="showForm('phd-fa_compra_directa');bien.forma_adquisicion = 'Compra directa'">{{ $forma_adquisicion1->forma_adquisicion }}</li>
                            @endif
                            @if($forma_adquisicion1->forma_adquisicion=='Confiscación')
                            <li class="mdl-menu__item" v-on:click="showForm('phd-fa_confiscacion');bien.forma_adquisicion = 'Confiscación'">{{ $forma_adquisicion1->forma_adquisicion }}</li>
                            @endif
                            @if($forma_adquisicion1->forma_adquisicion=='Dación de pago')
                            <li class="mdl-menu__item" v-on:click="showForm('phd-fa_dacion_pago');bien.forma_adquisicion = 'Dación de pago'">{{ $forma_adquisicion1->forma_adquisicion }}</li>
                            @endif
                            @if($forma_adquisicion1->forma_adquisicion=='Donación')
                            <li class="mdl-menu__item" v-on:click="showForm('phd-fa_donacion');bien.forma_adquisicion = 'Donación'">{{ $forma_adquisicion1->forma_adquisicion }}</li>
                            @endif
                            @if($forma_adquisicion1->forma_adquisicion=='Expropiación')
                            <li class="mdl-menu__item" v-on:click="showForm('phd-fa_expropiacion');bien.forma_adquisicion = 'Expropiación'">{{ $forma_adquisicion1->forma_adquisicion }}</li>
                            @endif
                            @if($forma_adquisicion1->forma_adquisicion=='Permuta')
                            <li class="mdl-menu__item" v-on:click="showForm('phd-fa_permuta');bien.forma_adquisicion = 'Permuta'">{{ $forma_adquisicion1->forma_adquisicion }}</li>
                            @endif
                            @if($forma_adquisicion1->forma_adquisicion=='Transferencia')
                            <li class="mdl-menu__item" v-on:click="showForm('phd-fa_transferencia');bien.forma_adquisicion = 'Transferencia'">{{ $forma_adquisicion1->forma_adquisicion }}</li>
                            @endif
                            @endforeach
                        </ul>
                      </div>
                    </div>
                    <div class="phd-input-group">
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                        <input class="mdl-textfield__input" type="text" id="phd-categoria" v-model="bien.categoria" readonly tabIndex="-1" name="phd-categoria">
                        <label for="phd-categoria" class="mdl-textfield__label">Categoría</label>
                        <ul for="phd-categoria" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                        	@foreach ($categoria as $categoria1)
                            <li class="mdl-menu__item"  v-on:click='enviarIdCategoria("{{$categoria1->id }}"); bien.categoria ="{{$categoria1->categoria}}"'>{{$categoria1->categoria }} </li>

                          @endforeach

                        </ul>
                      </div>
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                          <input class="mdl-textfield__input" type="text" id="phd-subcategoria"  v-model="bien.subcategoria" readonly tabIndex="-1" name="phd-subcategoria">
                          <label for="phd-subcategoria" class="mdl-textfield__label">Subcategoría</label>
                          <ul for="phd-subcategoria" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                              		<li class="mdl-menu__item" v-for="item of subcategorias" v-on:click="enviarIdSubcategoria(item.id);bien.subcategoria = item.subcategoria"> @{{item.subcategoria }}</li>
                          </ul>
                      </div>
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                          <input class="mdl-textfield__input" type="text" id="phd-categoria_especifica"  v-model="bien.categoria_especifica" readonly tabIndex="-1" name="phd-categoria_especifica">
                          <label for="phd-categoria_especifica" class="mdl-textfield__label">Categoría específica</label>
                          <ul for="phd-categoria_especifica" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                              
                              <li class="mdl-menu__item"  v-for="item of categorias_especificas" v-on:click="bien.categoria_especifica =item.categoria_especifica">@{{item.categoria_especifica}}</li>
                              
                          </ul>
                      </div>
                    </div>
                    <p class="phd-subtitle"><strong>Datos según la Forma de Adquisición: @{{bien.forma_adquisicion}}</strong></p>


                    <div  class="phd-fa_adjudicacion phd-fa_confiscacion phd-fa_expropiacion phdHide">
                      <div class="phd-input-group">
                        <p class="phd-subtitle">Datos de los participantes</p>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input class="mdl-textfield__input" type="text" id="phd-fa_adju_conf_expr_propietario" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" v-model="bien.fa_adju_conf_expr.propietario" name="phd-fa_adju_conf_expr_propietario">
                          <label class="mdl-textfield__label" for="phd-fa_adju_conf_expr_propietario">Propietario (*)</label>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_adju_conf_expr_beneficiario" v-model="bien.fa_adju_conf_expr.beneficiario" name="phd-fa_adju_conf_expr_beneficiario">
                          <label class="mdl-textfield__label" for="phd-fa_adju_conf_expr_beneficiario">Beneficiario (*)</label>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_adju_conf_expr_autoridad" v-model="bien.fa_adju_conf_expr.autoridad" name="phd-fa_adju_conf_expr_autoridad">
                          <label class="mdl-textfield__label" for="phd-fa_adju_conf_expr_autoridad">Autoridad (*)</label>
                        </div>
                      </div>
                      <div class="phd-input-group">
                        <p class="phd-subtitle">Datos de la sentencia</p>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_adju_conf_expr_num_sentencia" v-model="bien.fa_adju_conf_expr.numero_sentencia" name="phd-fa_adju_conf_expr_num_sentencia">
                          <label class="mdl-textfield__label" for="phd-fa_adju_conf_expr_num_sentencia">Número de la sentencia (*)</label>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_adju_conf_expr_fecha_sentencia" name="phd-fa_adju_conf_expr_fecha_sentencia" v-model="bien.fa_adju_conf_expr.fecha_sentencia" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" >
                          <label class="mdl-textfield__label" for="phd-fa_adju_conf_expr_fecha_sentencia">Fecha de la sentencia (DD/MM/AAAA) (*)</label>
                        </div>
                      </div>
                      <div class="phd-input-group">
                        <p class="phd-subtitle">Datos del registro</p>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_adju_conf_expr_nombre_registro" v-model="bien.fa_adju_conf_expr.nombre_registro" name="phd-fa_adju_conf_expr_nombre_registro">
                          <label class="mdl-textfield__label" for="phd-fa_adju_conf_expr_nombre_registro">Nombre del registro o notaría (*)</label>
                        </div>
                      </div>
                      <div class="phd-input-group">
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_adju_conf_expr_tomo" v-model="bien.fa_adju_conf_expr.tomo" name="phd-fa_adju_conf_expr_tomo">
                          <label class="mdl-textfield__label" for="phd-fa_adju_conf_expr_tomo">Tomo (*)</label>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_adju_conf_expr_folio" v-model="bien.fa_adju_conf_expr.folio" name="phd-fa_adju_conf_expr_folio">
                          <label class="mdl-textfield__label" for="phd-fa_adju_conf_expr_folio">Folio(*)</label>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_adju_conf_expr_fecha_registro" v-model="bien.fa_adju_conf_expr.fecha_registro" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_adju_conf_expr_fecha_registro">
                          <label class="mdl-textfield__label" for="phd-fa_adju_conf_expr_fecha_registro">Fecha del registro (DD/MM/AAAA) (*)</label>
                        </div>
                      </div>
                   </div>



                      <div  class="phd-fa_compra_concurso_abierto phd-fa_compra_concurso_cerrado phdHide">
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos básicos del concurso</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_concurso_abierto_cerrado_num_concurso" v-model="bien.fa_concurso_abierto_cerrado.numero_concurso" name="phd-fa_concurso_abierto_cerrado_numero_concurso">
                            <label class="mdl-textfield__label" for="phd-fa_concurso_abierto_cerrado_num_concurso">Número del concurso (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_concurso_abierto_cerrado_nombre_concurso" v-model="bien.fa_concurso_abierto_cerrado.nombre_concurso" name="phd-fa_concurso_abierto_cerrado_nombre_concurso">
                            <label class="mdl-textfield__label" for="phd-fa_concurso_abierto_cerrado_nombre_concurso">Nombre del concurso (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_concurso_abierto_cerrado_fecha_concurso" v-model="bien.fa_concurso_abierto_cerrado.fecha_concurso" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_concurso_abierto_cerrado_fecha_concurso">
                            <label class="mdl-textfield__label" for="phd-fa_concurso_abierto_cerrado_fecha_concurso">Fecha del concurso (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos del contrato</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_concurso_abierto_cerrado_num_contrato" v-model="bien.fa_concurso_abierto_cerrado.numero_contrato" name="phd-fa_concurso_abierto_cerrado_num_contrato">
                            <label class="mdl-textfield__label" for="phd-fa_concurso_abierto_cerrado_num_contrato">Número del contrato (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_concurso_abierto_cerrado_fecha_contrato" v-model="bien.fa_concurso_abierto_cerrado.fecha_contrato" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_concurso_abierto_cerrado_fecha_contrato">
                            <label class="mdl-textfield__label" for="phd-fa_concurso_abierto_cerrado_fecha_contrato">Fecha del contrato (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos de la nota de entrega</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_concurso_abierto_cerrado_num_nota_entrega" v-model="bien.fa_concurso_abierto_cerrado.numero_nota_entrega" name="phd-fa_concurso_abierto_cerrado_num_nota_entrega">
                            <label class="mdl-textfield__label" for="phd-fa_concurso_abierto_cerrado_num_nota_entrega">Número de la nota de entrega (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_concurso_abierto_cerrado_fecha_nota_entrega" v-model="bien.fa_concurso_abierto_cerrado.fecha_nota_entrega" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_concurso_abierto_cerrado_fecha_nota_entrega">
                            <label class="mdl-textfield__label" for="phd-fa_concurso_abierto_cerrado_fecha_nota_entrega">Fecha de la nota de entrega (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos de la factura</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_concurso_abierto_cerrado_num_factura" v-model="bien.fa_concurso_abierto_cerrado.numero_factura" name="phd-fa_concurso_abierto_cerrado_num_factura">
                            <label class="mdl-textfield__label" for="phd-fa_concurso_abierto_cerrado_num_factura">Número de la factura (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_concurso_abierto_cerrado_fecha_factura" v-model="bien.fa_concurso_abierto_cerrado.fecha_factura" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_concurso_abierto_cerrado_fecha_factura">
                            <label class="mdl-textfield__label" for="phd-fa_concurso_abierto_cerrado_fecha_factura">Fecha de la factura (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                      </div>




                      <div  class="phd-fa_compra_directa phdHide">

                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos del proveedor</p>
                          <div id="phd-proveedorSelect" class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                              <input class="mdl-textfield__input" type="text" id="phd-fa_compra_directaproveedor"  v-model="bien.fa_compra_directa.proveedor" readonly tabIndex="-1" name="phd-fa_compra_directaproveedor">
                              <label for="phd-proveedor" class="mdl-textfield__label">Proveedor</label>
                              <ul for="phd-fa_compra_directaproveedor" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                              @foreach ($proveedor as $proveedor1)
                                  <li class="mdl-menu__item"  v-on:click="bien.fa_compra_directa.proveedor = '{{$proveedor1->descripcion}}'">{{$proveedor1->descripcion}}</li>
                              @endforeach   
                              </ul>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos de la orden de compra</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_compra_directa_num_orden_compra" v-model="bien.fa_compra_directa.numero_orden_compra" name="phd-fa_compra_directa_num_orden_compra">
                            <label class="mdl-textfield__label" for="phd-fa_compra_directa_num_orden_compra">Número de la orden de compra (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_compra_directa_fecha_orden_compra" v-model="bien.fa_compra_directa.fecha_orden_compra" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_compra_directa_fecha_orden_compra">
                            <label class="mdl-textfield__label" for="phd-fa_compra_directa_fecha_orden_compra">Fecha de la orden de compra (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos de la nota de entrega</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_compra_directa_num_nota_entrega" v-model="bien.fa_compra_directa.numero_nota_entrega" name="phd-fa_compra_directa_num_nota_entrega">
                            <label class="mdl-textfield__label" for="phd-fa_compra_directa_num_nota_entrega">Número de la nota de entrega (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_compra_directa_fecha_nota_entrega" v-model="bien.fa_compra_directa.fecha_nota_entrega" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_compra_directa_fecha_nota_entrega">
                            <label class="mdl-textfield__label" for="phd-fa_compra_directa_fecha_nota_entrega">Fecha de la nota de entrega (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos de la factura</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_compra_directa_num_factura" v-model="bien.fa_compra_directa.numero_factura" name="phd-fa_compra_directa_num_factura">
                            <label class="mdl-textfield__label" for="phd-fa_compra_directa_num_factura">Número de la factura (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_compra_directa_fecha_factura" v-model="bien.fa_compra_directa.fecha_factura" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$">
                            <label class="mdl-textfield__label" for="phd-fa_compra_directa_fecha_factura" name="phd-fa_compra_directa_fecha_factura">Fecha de la factura (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                      </div>



                      <div  class="phd-fa_dacion_pago phdHide">
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos de los participantes</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_dacion_pago_nombre_cedente" v-model="bien.fa_dacion_pago.nombre_cedente" name="phd-fa_dacion_pago_nombre_cedente">
                            <label class="mdl-textfield__label" for="phd-fa_dacion_pago_nombre_cedente">Nombre del cedente (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_dacion_pago_nombre_beneficiario" v-model="bien.fa_dacion_pago.nombre_beneficiario" name="phd-fa_dacion_pago_nombre_beneficiario">
                            <label class="mdl-textfield__label" for="phd-fa_dacion_pago_nombre_beneficiario">Nombre del beneficiario (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos del finiquito</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_dacion_pago_num_finiquito" v-model="bien.fa_dacion_pago.numero_finiquito" name="phd-fa_dacion_pago_num_finiquito">
                            <label class="mdl-textfield__label" for="phd-fa_dacion_pago_num_finiquito">Número de finiquito (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_dacion_pago_fecha_finiquito" v-model="bien.fa_dacion_pago.fecha_finiquito" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_dacion_pago_fecha_finiquito">
                            <label class="mdl-textfield__label" for="phd-fa_dacion_pago_fecha_finiquito">Fecha de finiquito (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos del registro</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_dacion_pago_nombre_registro" v-model="bien.fa_dacion_pago.nombre_registro" name="phd-fa_dacion_pago_nombre_registro">
                            <label class="mdl-textfield__label" for="phd-fa_dacion_pago_nombre_registro">Nombre del registro (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_dacion_pago_tomo" v-model="bien.fa_dacion_pago.tomo" name="phd-fa_dacion_pago_tomo">
                            <label class="mdl-textfield__label" for="phd-fa_dacion_pago_tomo">Tomo (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_dacion_pago_folio" v-model="bien.fa_dacion_pago.folio" name="phd-fa_dacion_pago_folio">
                            <label class="mdl-textfield__label" for="phd-fa_dacion_pago_folio">Folio (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_dacion_pago_fecha_registro" v-model="bien.fa_dacion_pago.fecha_registro" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_dacion_pago_fecha_registro">
                            <label class="mdl-textfield__label" for="phd-fa_dacion_pago_fecha_registro">Fecha de registro (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                      </div>



                      <div  class="phd-fa_donacion phdHide">
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos de los participantes</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_donacion_nombre_donante" v-model="bien.fa_donacion.nombre_donante" name="phd-fa_donacion_nombre_donante">
                            <label class="mdl-textfield__label" for="phd-fa_donacion_nombre_donante">Nombre del donante (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_donacion_nombre_beneficiario" v-model="bien.fa_donacion.nombre_beneficiario" name="phd-fa_donacion_nombre_beneficiario">
                            <label class="mdl-textfield__label" for="phd-fa_donacion_nombre_beneficiario">Nombre del beneficiario (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos del contrato</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_donacion_num_contrato" v-model="bien.fa_donacion.numero_contrato" name="phd-fa_donacion_num_contrato">
                            <label class="mdl-textfield__label" for="phd-fa_donacion_num_contrato">Número de contrato o acta (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_donacion_fecha_contrato" v-model="bien.fa_donacion.fecha_contrato" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_donacion_fecha_contrato">
                            <label class="mdl-textfield__label" for="phd-fa_donacion_fecha_contrato">Fecha de contrato o acta (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos del registro</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_donacion_nombre_registro" v-model="bien.fa_donacion.nombre_registro" name="phd-fa_donacion_nombre_registro">
                            <label class="mdl-textfield__label" for="phd-fa_donacion_nombre_registro">Nombre del registro (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_donacion_tomo" v-model="bien.fa_donacion.tomo" name="phd-fa_donacion_tomo">
                            <label class="mdl-textfield__label" for="phd-fa_donacion_tomo">Tomo (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_donacion_folio" v-model="bien.fa_donacion.folio" name="phd-fa_donacion_folio">
                            <label class="mdl-textfield__label" for="phd-fa_donacion_folio">Folio (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_donacion_fecha_registro" v-model="bien.fa_donacion.fecha_registro" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_donacion_fecha_registro">
                            <label class="mdl-textfield__label" for="phd-fa_donacion_fecha_registro">Fecha de registro (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                      </div>



                      <div  class="phd-fa_permuta phdHide">
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos de los participantes</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_permuta_nombre_copermutante" v-model="bien.fa_permuta.nombre_copermutante" name="phd-fa_permuta_nombre_copermutante">
                            <label class="mdl-textfield__label" for="phd-fa_permuta_nombre_copermutante">Nombre del copermutante (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_permuta_nombre_beneficiario" v-model="bien.fa_permuta.nombre_beneficiario" name="phd-fa_permuta_nombre_beneficiario">
                            <label class="mdl-textfield__label" for="fa_donacion_phd-nombre_beneficiario">Nombre del beneficiario (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos de la licitación</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_permuta_num_licitacion" v-model="bien.fa_permuta.numero_licitacion" name="phd-fa_permuta_num_licitacion">
                            <label class="mdl-textfield__label" for="phd-fa_permuta_num_licitacion">Número de la licitación (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_permuta_nombre_licitacion" v-model="bien.fa_permuta.nombre_licitacion" name="phd-fa_permuta_nombre_licitacion">
                            <label class="mdl-textfield__label" for="phd-fa_permuta_nombre_licitacion">Nombre de la licitación (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_permuta_fecha_licitacion" v-model="bien.fa_permuta.fecha_licitacion" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_permuta_fecha_licitacion">
                            <label class="mdl-textfield__label" for="phd-fa_permuta_fecha_licitacion">Fecha de la licitación (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos del contrato</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_permuta_num_contrato" v-model="bien.fa_permuta.numero_contrato" name="phd-fa_permuta_num_contrato">
                            <label class="mdl-textfield__label" for="phd-fa_permuta_num_contrato">Número del contrato o acta (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_permuta_fecha_contrato" v-model="bien.fa_permuta.fecha_contrato" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_permuta_fecha_contrato">
                            <label class="mdl-textfield__label" for="phd-fa_permuta_fecha_contrato">Fecha del contrato o acta (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos del registro</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_permuta_nombre_registro" v-model="bien.fa_permuta.nombre_registro" name="phd-fa_permuta_nombre_registro">
                            <label class="mdl-textfield__label" for="phd-fa_permuta_nombre_registro">Nombre del registro (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_permuta_tomo" v-model="bien.fa_permuta.tomo" name="phd-fa_permuta_tomo">
                            <label class="mdl-textfield__label" for="phd-fa_permuta_tomo">Tomo (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_permuta_folio" v-model="bien.fa_permuta.folio" name="phd-fa_permuta_folio">
                            <label class="mdl-textfield__label" for="phd-fa_permuta_folio">Folio (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_permuta_fecha_registro" v-model="bien.fa_permuta.fecha_registro" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_permuta_fecha_registro">
                            <label class="mdl-textfield__label" for="phd-fecha_registro">Fecha de registro (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                      </div>



                      <div  class="phd-fa_transferencia phdHide">
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos de los participantes</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_transferencia_nombre_quien_transfiere" v-model="bien.fa_transferencia.nombre_quien_transfiere" name="phd-fa_transferencia_nombre_quien_transfiere">
                            <label class="mdl-textfield__label" for="phd-nombre_quien_transfiere">Nombre de quién transfiere (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_transferencia_nombre_beneficiario" v-model="bien.fa_transferencia.nombre_beneficiario" name="phd-fa_transferencia_nombre_beneficiario">
                            <label class="mdl-textfield__label" for="phd-nombre_beneficiario">Nombre del beneficiario (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos dela autorización</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_transferencia_num_autorizacion" v-model="bien.fa_transferencia.numero_autorizacion" name="phd-fa_transferencia_num_autorizacion">
                            <label class="mdl-textfield__label" for="phd-fa_transferencia_num_autorizacion">Número de la autorización (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_transferencia_fecha_autorizacion" v-model="bien.fa_transferencia.fecha_autorizacion" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_transferencia_fecha_autorizacion">
                            <label class="mdl-textfield__label" for="phd-fa_transferencia_fecha_autorizacion">Fecha de la autorización (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <p class="phd-subtitle">Datos del registro</p>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_transferencia_nombre_registro"  v-model="bien.fa_transferencia.nombre_registro" name="phd-fa_transferencia_nombre_registro">
                            <label class="mdl-textfield__label" for="phd-fa_transferencia_nombre_registro">Nombre del registro (*)</label>
                          </div>
                        </div>
                        <div class="phd-input-group">
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_transferencia_tomo" v-model="bien.fa_transferencia.tomo" name="phd-fa_transferencia_tomo">
                            <label class="mdl-textfield__label" for="phd-fa_transferencia_tomo">Tomo (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_transferencia_folio" v-model="bien.fa_transferencia.folio" name="phd-fa_transferencia_folio">
                            <label class="mdl-textfield__label" for="phd-fa_transferencia_folio">Folio (*)</label>
                          </div>
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fa_transferencia_fecha_registro" v-model="bien.fa_transferencia.fecha_registro" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fa_transferencia_fecha_registro">
                            <label class="mdl-textfield__label" for="phd-fa_transferencia_fecha_registro">Fecha de registro (DD/MM/AAAA) (*)</label>
                          </div>
                        </div>
                      </div>                      
                  </div>
                </div>



                <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title">
                    <h5 class="phd-title-list">Datos Básicos</h5>
                    <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                      <i class="material-icons phdShow">keyboard_arrow_down</i>
                    </button>
                  </div>
                  <div class="mdl-card__actions phdHide">
                    
                    <div class="phd-input-group">
                        
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-codigo_interno" v-model="bien.codigo_interno" name="phd-codigo_interno">
                        <label class="mdl-textfield__label" for="phd-codigo_interno">Código interno del bien (*)</label>
                      </div>
                    </div>


                    <div class="phd-input-group">
                        
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-valor_adquisicion" v-model="bien.valor_adquisicion" name="phd-valor_adquisicion">
                        <label class="mdl-textfield__label" for="phd-valor_adquisicion">Valor de adquisición (*)</label>
                      </div>
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fecha_adquisicion" v-model="bien.fecha_adquisicion" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fecha_adquisicion">
                        <label class="mdl-textfield__label" for="phd-fecha_adquisicion">Fecha de adquisición (DD/MM/AAAA) (*)</label>
                      </div>
                    </div>
                    <div class="phd-input-group">
                        
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                          <input class="mdl-textfield__input" type="text" id="phd-estado"  v-model="bien.estado" readonly tabIndex="-1" name="phd-estado" >
                          <label for="phd-estado" class="mdl-textfield__label">Estado del bien</label>
                          <ul for="phd-estado" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          @foreach($estado_bien as $estado_bien1)
                              <li class="mdl-menu__item"  v-on:click="bien.estado = '{{$estado_bien1->estado}}';">{{$estado_bien1->estado}}</li>
                              @endforeach
                          </ul>

                      </div>
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                          <input class="mdl-textfield__input" type="text" id="phd-estado_uso"  v-model="bien.estado_uso" readonly tabIndex="-1" name="phd-estado_uso">
                          <label for="phd-estado_uso" class="mdl-textfield__label">Estado del uso del bien</label>
                          <ul for="phd-estado_uso" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          @foreach($estado_uso as $estado_uso1)
                              <li class="mdl-menu__item"  v-on:click="bien.estado_uso = '{{$estado_uso1->estado_uso}}';">{{$estado_uso1->estado_uso}}</li>
                          @endforeach
                          </ul>
                      </div>
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                          <input class="mdl-textfield__input" type="text" id="phd-uso_actual"  v-model="bien.uso_actual" readonly tabIndex="-1" name="phd-uso_actual">
                          <label for="phd-uso_actual" class="mdl-textfield__label">Uso actual del bien</label>
                          <ul for="phd-uso_actual" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          @foreach($uso_actual as $uso_actual1)
                              <li class="mdl-menu__item"  v-on:click="bien.uso_actual = '{{$uso_actual1->uso_actual}}';">{{$uso_actual1->uso_actual}}</li>
                          @endforeach
                          </ul>
                      </div>
                    </div>
                    <div class="phd-input-group">
                        
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                          <input class="mdl-textfield__input" type="text" id="phd-moneda"  v-model="bien.moneda" readonly tabIndex="-1" name="phd-moneda">
                          <label for="phd-moneda" class="mdl-textfield__label">Moneda</label>
                          <ul for="phd-moneda" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            @foreach($moneda as $moneda1)
                              <li class="mdl-menu__item"  v-on:click="bien.moneda = '{{$moneda1->moneda}}';">{{$moneda1->moneda}}</li>
                            @endforeach
                          </ul>
                      </div>
                      <div v-if="bien.moneda == 'Otra Moneda'" class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                        <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-otra_moneda" v-model="bien.otra_moneda" name="phd-otra_moneda">
                        <label class="mdl-textfield__label" for="phd-otra_moneda">Especifíque moneda (*)</label>
                      </div>
                      <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                        <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-fecha_ingreso_organo" v-model="bien.fecha_ingreso_organo" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-fecha_ingreso_organo">
                        <label class="mdl-textfield__label" for="phd-fecha_ingreso_organo">Fecha de ingreso del bien en el órgano (DD/MM/AAAA) (*)</label>
                      </div>
                    </div>

                    <div class="phd-input-group">
                        
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <textarea class="mdl-textfield__input" type="text" id="phd-descripcion_estado" v-model="bien.descripcion_estado" name="phd-descripcion_estado"></textarea>
                        <label class="mdl-textfield__label" for="phd-descripcion_estado">Descripción del estado del bien (*)</label>
                      </div>
                    </div>
                  </div>
                </div>

                    


                <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title">
                    <h5 class="phd-title-list">Datos Particulares Bien @{{bien.tipo_bien}}</h5>
                    <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                      <i class="material-icons phdShow">keyboard_arrow_down</i>
                    </button>
                  </div>
                  <div class="mdl-card__actions phdHide">
                    
                    <div class="phd-formMueble phdShow">
                      <div class="phd-input-group">
                          
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_particulares_mueble_serial" v-model="bien.datos_particulares_mueble.serial" name="phd-datos_particulares_mueble_serial">
                          <label class="mdl-textfield__label" for="phd-datos_particulares_mueble_serial">Serial (*)</label>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-datos_particulares_mueble_marca"  v-model="bien.datos_particulares_mueble.marca" readonly tabIndex="-1" name="phd-datos_particulares_mueble_marca">
                            <label for="phd-datos_particulares_mueble_marca" class="mdl-textfield__label">Marca (*)</label>
                            <ul for="phd-datos_particulares_mueble_marca" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                             @foreach($marca as $marca1)
                                <li class="mdl-menu__item"  v-on:click="bien.datos_particulares_mueble.marca = '{{$marca1->marca}}';">{{$marca1->marca}}</li>
                              @endforeach
                            </ul>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-datos_particulares_mueble_modelo" v-model="bien.datos_particulares_mueble.modelo" readonly tabIndex="-1" name="phd-datos_particulares_mueble_modelo">
                            <label for="phd-datos_particulares_mueble_modelo" class="mdl-textfield__label">Modelo (*)</label>
                            <ul for="phd-datos_particulares_mueble_modelo" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            @foreach($modelo as $modelo1)
                                <li class="mdl-menu__item"  v-on:click="bien.datos_particulares_mueble.modelo = '{{$modelo1->modelo}}';">{{$modelo1->modelo}}</li>
                            @endforeach
                            </ul>
                        </div>
                      </div>

                      <div class="phd-input-group">

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-datos_particulares_mueble_color"  v-model="bien.datos_particulares_mueble.color" readonly tabIndex="-1" name="phd-datos_particulares_mueble_color">
                            <label for="phd-datos_particulares_mueble_color" class="mdl-textfield__label">Color (*)</label>
                            <ul for="phd-datos_particulares_mueble_color" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                              @foreach($color as $color1)
                                <li class="mdl-menu__item"  v-on:click="bien.datos_particulares_mueble.color = '{{$color1->color}}';">{{$color1->color}}</li>
                              @endforeach
                            </ul>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_particulares_mueble_anio_fabricacion" v-model="bien.datos_particulares_mueble.anio_fabricacion"  name="phd-datos_particulares_mueble_anio_fabricacion">
                          <label class="mdl-textfield__label" for="phd-datos_particulares_mueble_anio_fabricacion">Año de fabricación (*)</label>
                        </div>
                      </div>

                      <div class="phd-input-group">
                        
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <textarea class="mdl-textfield__input" type="text" id="phd-bien_datos_particulares_mueble_especificaciones_tecnicas" v-model="bien.datos_particulares_mueble.especificaciones_tecnicas" name="phd-bien_datos_particulares_mueble_especificaciones_tecnicas"></textarea>
                          <label class="mdl-textfield__label" for="phd-bien_datos_particulares_mueble_especificaciones_tecnicas">Especificaciones técnicas (*)</label>
                        </div>
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <textarea class="mdl-textfield__input" type="text" id="phd-bien_datos_particulares_mueble_otras_especificaciones_tecnicas" v-model="bien.datos_particulares_mueble.otras_especificaciones_tecnicas" name="phd-bien_datos_particulares_mueble_otras_especificaciones_tecnicas"></textarea>
                          <label class="mdl-textfield__label" for="phd-bien_datos_particulares_mueble_otras_especificaciones_tecnicas">Otras especificaciones técnicas (*)</label>
                        </div>
                      </div>




                      <div class="phd-input-group">
                      <input type="hidden" id="phd-datos_particulares_mueble_componente_size" name="datos_particulares_mueble_componente_size" v-model="bien.datos_particulares_mueble.componentes.length"> 
                        <div v-for="(componente, indice) of bien.datos_particulares_mueble.componentes" class="phd-componente-bien-mueble">
                          <p class="phd-subtitle">Componente #@{{indice+1}}: @{{componente.codigo}}</p>
                          <div class="phd-input-group_interno">
                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                              <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" :id="'phd-datos_particulares_mueble_componente_'+indice+'_codigo'" v-model="componente.codigo" :name="'datos_particulares_mueble_componente_'+indice+'_codigo'" >
                              <label class="mdl-textfield__label" for="'phd-datos_particulares_mueble_componente_'+indice+'_codigo'">Código (*)</label>
                            </div>

                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                              <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" :id="'phd-datos_particulares_mueble_componente_'+indice+'_marca'" v-model="componente.marca" :name="'datos_particulares_mueble_componente_'+indice+'_marca'">
                              <label class="mdl-textfield__label" for="'phd-datos_particulares_mueble_componente_'+indice+'_marca'">Marca (*)</label>
                            </div>

                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                              <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" :id="'phd-datos_particulares_mueble_componente_'+indice+'_modelo'" v-model="componente.modelo" :name="'datos_particulares_mueble_componente_'+indice+'_modelo'" >
                              <label class="mdl-textfield__label" for="'phd-datos_particulares_mueble_componente_'+indice+'_modelo'">Modelo (*)</label>
                            </div>
                          </div>

                          <div class="phd-input-group_interno">
                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                              <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" :id="'phd-datos_particulares_mueble_componente_'+indice+'_serial'" v-model="componente.serial" :name="'datos_particulares_mueble_componente_'+indice+'_serial'">
                              <label class="mdl-textfield__label" for="'phd-datos_particulares_mueble_componente_'+indice+'_serial'">Serial (*)</label>
                            </div>

                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                              <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" :id="'phd-datos_particulares_mueble_componente_'+indice+'_tipo'" :name="'datos_particulares_mueble_componente_'+indice+'_tipo'" v-model="componente.tipo">
                              <label class="mdl-textfield__label" for="'phd-datos_particulares_mueble_componente_'+indice+'_tipo'">Tipo (*)</label>
                            </div>
                        </div>
                            <div class="phd-input-group_interno">
                            
                            <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                              <textarea class="mdl-textfield__input" type="text" :id="'phd-datos_particulares_mueble_componente_'+indice+'_descripcion'" v-model="componente.descripcion"  :name="'datos_particulares_mueble_componente_'+indice+'_descripcion'"></textarea>
                              <label class="mdl-textfield__label" for="'phd-datos_particulares_mueble_componente_'+indice+'_descripcion'">Descripción (*)</label>
                            </div>
                          </div>

                          <div class="phd-input-group_interno phd-align_right">

                              <button type="button" v-on:click="removeComponent(indice)" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                X Eliminar componente
                              </button>
                          </div>
                        </div>
                        
                        <button type="button" v-on:click="addComponent" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent phd-right phd-m16">
                          + Agregar componente
                        </button>

                      </div>
                    </div>



                    <div class="phd-formInmueble phdHide">
                      
                      <div class="phd-input-group">
                        <p class="phd-subtitle">Datos del registro</p>  
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_oficina_registro_notaria" v-model="bien.datos_particulares_inmueble.oficina_registro_notaria" name="phd-datos_particulares_inmueble_oficina_registro_notaria">
                          <label class="mdl-textfield__label" for="phd-datos_particulares_inmueble_oficina_registro_notaria">Oficina de registro o notaría (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_referencia_registro" v-model="bien.datos_particulares_inmueble.referencia_registro" name="phd-datos_particulares_inmueble_referencia_registro">
                          <label class="mdl-textfield__label" for="phd-datos_particulares_inmueble_referencia_registro">Referencia del registro (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_numero_registro" v-model="bien.datos_particulares_inmueble.numero_registro" name="phd-datos_particulares_inmueble_numero_registro">
                          <label class="mdl-textfield__label" for="phd-datos_particulares_inmueble_numero_registro">Número de registro (*)</label>
                        </div>
                      </div>

                      <div class="phd-input-group">
                        
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_tomo" v-model="bien.datos_particulares_inmueble.tomo" name="phd-datos_particulares_inmueble_tomo">
                          <label class="mdl-textfield__label" for="phd-datos_particulares_inmueble_tomo">Tomo (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_folio" v-model="bien.datos_particulares_inmueble.folio" name="phd-datos_particulares_inmueble_folio">
                          <label class="mdl-textfield__label" for="phd-datos_particulares_inmueble_folio">Folio (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_protocolo" v-model="bien.datos_particulares_inmueble.protocolo" name="phd-datos_particulares_inmueble_protocolo">
                          <label class="mdl-textfield__label" for="phd-datos_particulares_inmueble_protocolo">Protocolo (*)</label>
                        </div>
                      </div>


                      <div class="phd-input-group">
                        
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_fecha_registro" v-model="bien.datos_particulares_inmueble.fecha_registro" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-datos_particulares_inmueble_fecha_registro">
                          <label class="mdl-textfield__label" for="phd-datos_particulares_inmueble_fecha_registro">Fecha del registro (DD/MM/AAAA) (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_nombre_propietario_anterior" v-model="bien.datos_particulares_inmueble.nombre_propietario_anterior" name="phd-datos_particulares_inmueble_nombre_propietario_anterior">
                          <label class="mdl-textfield__label" for="phd-datos_particulares_inmueble_nombre_propietario_anterior">Nombre del propietario anterior (*)</label>
                        </div>
                      </div>


                      <div class="phd-input-group">
                        <p class="phd-subtitle">Datos de construcción</p> 
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_area_construccion" v-model="bien.datos_particulares_inmueble.area_construccion" name="phd-datos_particulares_inmueble_area_construccion">
                          <label class="mdl-textfield__label" for="phd-datos_particulares_inmueble_area_construccion">Área (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_unidad_medida_area_construccion" v-model="bien.datos_particulares_inmueble.unidad_medida_area_construccion" readonly tabIndex="-1" name="phd-datos_particulares_inmueble_unidad_medida_area_construccion">
                            <label for="phd-datos_particulares_inmueble_unidad_medida_area_construccion" class="mdl-textfield__label">Unidad de Medida</label>
                            <ul for="phd-datos_particulares_inmueble_unidad_medida_area_construccion" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            @foreach($unidad as $unidad2)
                                <li class="mdl-menu__item"  v-on:click="bien.datos_particulares_inmueble.unidad_medida_area_construccion = '{{$unidad2->unidad}}';">{{$unidad2->unidad}} </li>
                             @endforeach
                            </ul>
                        </div>
                      </div>

                      <div class="phd-input-group">
                        <p class="phd-subtitle">Datos del terreno</p> 
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_area_terreno" v-model="bien.datos_particulares_inmueble.area_terreno" name="phd-datos_particulares_inmueble_area_terreno">
                          <label class="mdl-textfield__label" for="phd-datos_particulares_inmueble_area_terreno">Área (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_unidad_medida_area_terreno"  v-model="bien.datos_particulares_inmueble.unidad_medida_area_terreno" readonly tabIndex="-1" name="phd-datos_particulares_inmueble_unidad_medida_area_terreno">
                            <label for="phd-datos_particulares_inmueble_unidad_medida_area_terreno" class="mdl-textfield__label">Unidad de Medida</label>
                            <ul for="phd-datos_particulares_inmueble_unidad_medida_area_terreno" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            @foreach($unidad as $unidad1)
                                <li class="mdl-menu__item"  v-on:click="bien.datos_particulares_inmueble.unidad_medida_area_terreno = '{{$unidad1->unidad}}';">{{$unidad1->unidad}}  {{$unidad1->simbolo}} </li>
                            @endforeach
                            </ul>
                        </div>
                      </div>


                      <div class="phd-input-group">
                        <p class="phd-subtitle">Otros datos</p> 
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_dependencias_integran" v-model="bien.datos_particulares_inmueble.dependencias_integran" name="phd-datos_particulares_inmueble_dependencias_integran"></textarea>
                            <label class="mdl-textfield__label" for="phd-datos_particulares_inmueble_dependencias_integran">Dependencias que lo integran (*)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea class="mdl-textfield__input" type="text" id="phd-datos_particulares_inmueble_otras_especificaciones" v-model="bien.datos_particulares_inmueble.otras_especificaciones" name="phd-datos_particulares_inmueble_otras_especificaciones"></textarea>
                            <label class="mdl-textfield__label" for="phd-datos_particulares_inmueble_otras_especificaciones">Otras especificaciones (*)</label>
                        </div>
                      </div>

                    </div>

                  </div>
                </div>



                <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title">
                    <h5 class="phd-title-list">Datos del seguro</h5>
                    <button type="button" id="phd-datos_generales" ref="phd_button_toggel" v-on:click="arrowToggle" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                      <i class="material-icons phdShow">keyboard_arrow_down</i>
                    </button>
                  </div>
                  <div class="mdl-card__actions phdHide">

                      
                      <div class="phd-input-group">
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-datos_seguro_nombre_compania" v-model="bien.datos_seguro.nombre_compania" readonly tabIndex="-1" name="phd-datos_seguro_nombre_compania">
                            <label for="phd-datos_seguro_nombre_compania" class="mdl-textfield__label">Nombre de la compañía</label>
                            <ul for="phd-datos_seguro_nombre_compania" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            @foreach($compañia_aseguradora as $compañia_aseguradora1)
                                <li class="mdl-menu__item"  v-on:click="bien.datos_seguro.nombre_compania = '{{$compañia_aseguradora1->nombre}}'">{{$compañia_aseguradora1->nombre}}</li>
                            @endforeach
                            </ul>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_seguro_registro_seguro" v-model="bien.datos_seguro.registro_seguro" name="phd-datos_seguro_registro_seguro">
                          <label class="mdl-textfield__label" for="phd-datos_seguro_registro_seguro">Registro de seguro</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_seguro_numero_poliza" v-model="bien.datos_seguro.numero_poliza" name="phd-datos_seguro_numero_poliza">
                          <label class="mdl-textfield__label" for="phd-datos_seguro_numero_poliza">Número de póliza</label>
                        </div>
                      </div>

                      <div class="phd-input-group">
                        
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_seguro_fecha_inicio_poliza" v-model="bien.datos_seguro.fecha_inicio_poliza" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-datos_seguro_fecha_inicio_poliza">
                          <label class="mdl-textfield__label" for="phd-datos_seguro_fecha_inicio_poliza">Fecha de inicio de la póliza (DD/MM/AAAA)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_seguro_fecha_fin_poliza" v-model="bien.datos_seguro.fecha_fin_poliza" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" name="phd-datos_seguro_fecha_fin_poliza">
                          <label class="mdl-textfield__label" for="phd-datos_seguro_fecha_fin_poliza">Fecha de finalización de la póliza (DD/MM/AAAA)</label>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_seguro_monto_asegurado" v-model="bien.datos_seguro.monto_asegurado" name="phd-datos_seguro_monto_asegurado">
                          <label class="mdl-textfield__label" for="phd-datos_seguro_monto_asegurado">Monto asegurado</label>
                        </div>
                      </div>


                      <div class="phd-input-group">
                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-datos_seguro_cobertura"  v-model="bien.datos_seguro.cobertura" readonly tabIndex="-1" name="phd-datos_seguro_cobertura">
                            <label for="phd-datos_seguro_cobertura" class="mdl-textfield__label">Cobertura</label>
                            <ul for="phd-datos_seguro_cobertura" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            @foreach($cobertura as $cobertura1)
                                <li class="mdl-menu__item"  v-on:click="bien.datos_seguro.cobertura = '{{$cobertura1->cobertura}}'">{{$cobertura1->cobertura}}</li>
                            @endforeach
                            </ul>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                            <input class="mdl-textfield__input" type="text" id="phd-datos_seguro_posee_responsabilidad_civil" v-model="bien.datos_seguro.posee_responsabilidad_civil" readonly tabIndex="-1" name="phd-datos_seguro_posee_responsabilidad_civil">
                            <label for="phd-datos_seguro_posee_responsabilidad_civil" class="mdl-textfield__label">Posee responsabilidad civil</label>
                            <ul for="phd-datos_seguro_posee_responsabilidad_civil" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item"  v-on:click="bien.datos_seguro.posee_responsabilidad_civil = 'Si'">Si</li>
                                <li class="mdl-menu__item"  v-on:click="bien.datos_seguro.posee_responsabilidad_civil = 'No'">No</li>
                            </ul>
                        </div>

                        <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="phd-datos_seguro_otro_nombre_compania" v-model="bien.datos_seguro.otro_nombre_compania" name="phd-datos_seguro_otro_nombre_compania">
                          <label class="mdl-textfield__label" for="phd-datos_seguro_otro_nombre_compania">Nombre de otra compañía aseguradora</label>
                        </div>
                      </div>

                      <div class="phd-input-group">
                        
                          <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <textarea class="mdl-textfield__input" type="text" id="phd-datos_seguro_descripcion_cobertura" v-model="bien.datos_seguro.descripcion_cobertura" name="phd-datos_seguro_descripcion_cobertura"></textarea>
                          <label class="mdl-textfield__label" for="phd-datos_seguro_descripcion_cobertura">Descripción de la cobertura</label>
                        </div>
                      </div>

                  </div>
                </div>
            
                
                <div class="phd-buttons-form">
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" v-on:click="showModal('ALERTA','Se borrarán los datos del formulario. ¿Desea continuar?', borrarDatosFormulario);">
                        Cancelar
                    </button>

                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" v-on:click="showModal('INFORMACIÓN','¿Está seguro de incorporar el bien con los datos suministrados?', submitIncorporar);" v-bind:disabled="!isFormValid()" >
                        Incorporar
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