@extends('layout') 
@section('content')

<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">

          <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
          <div id="phd-title-app"><h4><strong>Configuración del sistema</strong></h4></div>
          <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title phd-head_with_search">
              <h5 class="phd-title-list">Listado de items para configurar</h5>
            </div>
            <div class="mdl-card__actions">
              
              <ul class="demo-list-icon mdl-list ">
                  <li class="mdl-list__item" >
                      <a href="/categoria">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Categorías
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/subcategoria">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Subcategorías
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/categoria_especifica">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Categorías específicas
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/tipo_bien">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Tipos de Bienes
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/forma_adquisicion">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Formas de Adquisición
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/estado_bien">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Estado del bien (condiciones físicas)
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/estado_uso_bien">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Estado del uso del bien
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/pais">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Países
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/estado">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Estados
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/municipio">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Municipios
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/parroquia">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Parroquias
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/ciudad">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Ciudades
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/marca">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Marcas
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/modelo">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Modelos
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                  <a href="/color">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Colores
                      </span>
                  </a>
                  </li>
                  <li class="mdl-list__item" >
                  <a href="/compania_aseguradora">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Compañías aseguradoras
                      </span>
                  </a>
                  </li>
                  <li class="mdl-list__item" >
                  <a href="/tipo_cobertura">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Tipos de coberturas
                      </span>
                  </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/proveedor">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Proveedores
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                  <a href="/moneda">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Monedas
                      </span>
                  </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/unidad_medida">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Unidades de medidas
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/tipo_sede">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Tipos de Sede
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/sede">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Sedes
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/ubicacion_administrativa">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Ubicaciones administrativas
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                  <a href="/unidad_administrativa">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Unidades administrativas
                      </span>
                  </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/ente">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Entes
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/maxima_autoridad">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Maximas autoridades
                      </span>
                      </a>
                  </li>
                  <li class="mdl-list__item" >
                      <a href="/responsable_patrimonial">
                      <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-icon">settings</i>
                          Responsables Patrimoniales
                      </span>
                      </a>
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

  @endsection