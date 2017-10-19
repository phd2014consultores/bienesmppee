@extends('layout') 
@section('content')

<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">

          <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
          <div id="phd-title-app"><h4><strong>Descarga de archivos</strong></h4></div>
          <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title phd-head_with_search">
              <h5 class="phd-title-list">Listado de archivos para generar</h5>
            </div>
            <div class="mdl-card__actions">

                <div class="phd-input-group">
                    <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input v-model="dateFrom"  class="mdl-textfield__input" type="text" id="phd-dateForm" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)">
                        <label class="mdl-textfield__label" for="phd-dateForm">Fecha inicio: (*)</label>
                    </div>
                    <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input v-model="dateTo"  class="mdl-textfield__input" type="text" id="phd-dateTo" @focus="setIsFocused" onblur="removeIsFocusedImpl(this)">
                        <label class="mdl-textfield__label" for="phd-dateTo">Fecha fin: (*)</label>
                    </div>

                </div>

                <ul class="demo-list-icon mdl-list ">
                <li class="mdl-list__item" onclick="document.getElementById('datos-basicos').click();">
                  <span class="mdl-list__item-primary-content">
                  <form method="POST" action="/archivos/datos_basicos" id="phd-form" class="phd-form">
                  <input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">


                  <button id="datos-basicos" type="submit" style="display: none;"></button>
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Datos Básicos del Órgano o Ente
              </span>
                </li> 
                </form>
                <li class="mdl-list__item" onclick="document.getElementById('datos-maxima-autoridad').click();">
                  <span class="mdl-list__item-primary-content">
                  <form method="POST" action="/archivos/maxima_autoridad" id="phd-form" class="phd-form">
                  <input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">
                  <button id="datos-maxima-autoridad" type="submit" style="display: none;"></button>
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Datos de la Máxima Autoridad del Órgano o Ente
                </span>
                </li>
                </form>
                <li class="mdl-list__item" onclick="document.getElementById('datos-responsable-patrimonial').click();">
                  <span class="mdl-list__item-primary-content">
                  <form method="POST" action="/archivos/responsable_patrimonial" id="phd-form" class="phd-form">
                  <input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">
                  <button id="datos-responsable-patrimonial" type="submit" style="display: none;"></button>
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Datos del Responsable Patrimonial del Órgano o Ente
                </span>
                </li>
                </form>
                <li class="mdl-list__item" onclick="document.getElementById('datos-sedes').click();">
                  <span class="mdl-list__item-primary-content">
                  <form method="POST" action="/archivos/datos_sede" id="phd-form" class="phd-form">
                  <input type="hidden" name="_token" value="{{ csrf_token()}}" id="csrf_token">
                      <input v-model="dateFrom" type="hidden" name="phd-dateFrom" id="phd-dateFrom">
                      <input v-model="dateTo" type="hidden" name="phd-dateTo" id="phd-dateTo">
                  <button id="datos-sedes" type="submit" style="display: none;"></button>
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Datos de las Sedes y Similares del Órgano o Ente
                </span>
                </li>
                </form>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Datos de las Unidades Administrativas del Órgano o Ente
                </span>
                </li>
                 </form>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Datos de Ubicación de las Unidades Administrativas del Órgano o Ente
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listado de los Proveedores de los Bienes Públicos del Órgano o Ente
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listados de los Orígenes (Formas de Adquisición) de los Bienes Muebles e
Inmuebles del Órgano o Ente (A)
                </span>
                </li>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listados de los Orígenes (Formas de Adquisición) de los Bienes Muebles e
Inmuebles del Órgano o Ente (B)
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listados de los Orígenes (Formas de Adquisición) de los Bienes Muebles e
Inmuebles del Órgano o Ente (C)
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listados de los Orígenes (Formas de Adquisición) de los Bienes Muebles e
Inmuebles del Órgano o Ente (D)
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listados de los Orígenes (Formas de Adquisición) de los Bienes Muebles e
Inmuebles del Órgano o Ente (E)
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listados de los Orígenes (Formas de Adquisición) de los Bienes Muebles e
Inmuebles del Órgano o Ente (F)
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listados de los Orígenes (Formas de Adquisición) de los Bienes Muebles e
Inmuebles del Órgano o Ente (G)
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listados de los Orígenes (Formas de Adquisición) de los Bienes Muebles e
Inmuebles del Órgano o Ente (H)
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listados de los Orígenes (Formas de Adquisición) de los Bienes Muebles e
Inmuebles del Órgano o Ente (I)
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listados de los Seguros de los Bienes Muebles e Inmuebles del Órgano o Ente
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listado de los Responsables de los Bienes Muebles e Inmuebles del Órgano
o Ente
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listado de las Marcas de los Bienes Muebles del Órgano o Ente
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listado de las Modelos de los Bienes Muebles del Órgano o Ente
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Listado de los Tipos de los Componentes de los Bienes Muebles del Órgano o
Ente
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Inventario de los Bienes Muebles del Órgano o Ente (A)
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Inventario de los Bienes Muebles del Órgano o Ente (B)
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Inventario de los Bienes Muebles del Órgano o Ente (C)
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Inventario de los Componentes de los Bienes Muebles del
Órgano o Ente
                </span>
                </li>
                <li class="mdl-list__item">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">file_download</i>
                  Inventario de los Bienes Inmuebles del Órgano o
Ente
                </span>
                </li>
              </ul>

            </div>
          </div>

        </div>
      </main>
    </div>

<link rel="shortcut icon" href="assets/images/favicon.png">
<link rel="stylesheet" href="assets/mdl/css/Material-Icon.css">
    <link rel="stylesheet" href="assets/mdl/css/material.min.css">
    <link rel="stylesheet" href="assets/customer-css/styles.css">
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="https://unpkg.com/vue@2.3.4"></script>
<script src="assets/js/scripts.js"></script>

  @endsection