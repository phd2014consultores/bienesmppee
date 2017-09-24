  <!doctype html>
  <!--
    Material Design Lite
    Copyright 2015 Google Inc. All rights reserved.

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        https://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License
  -->
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Tablero administrativo de una aplicación web para la gestión de bienes nacionales del Ministerio para el Poder Popular de la Energía Eléctrica">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
      <title> SISGEBIP</title>



   

      <!-- Add to homescreen for Chrome on Android -->
      <meta name="mobile-web-app-capable" content="yes">
     <!-- <link rel="icon" sizes="192x192" href="assets/images/android-desktop.png"> --!>


      <!-- Add to homescreen for Safari on iOS -->
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
      <meta name="apple-mobile-web-app-title" content="Material Design Lite">
      <link rel="apple-touch-icon-precomposed" href="assets/images/ios-desktop.png">

      <!-- Tile icon for Win8 (144x144 + tile color) -->
      <meta name="msapplication-TileImage" content="assets/images/touch/ms-touch-icon-144x144-precomposed.png">
      <meta name="msapplication-TileColor" content="#3372DF">

      <link rel="shortcut icon" href="assets/images/favicon.png">

      <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
      <!--
      <link rel="canonical" href="http://www.example.com/">
      -->
      
     
 
    <link rel="stylesheet" href="assets/mdl/css/Material-Icon.css">
      <link rel="stylesheet" href="assets/mdl/css/material.min.css">
      <link rel="stylesheet" href="assets/customer-css/styles.css">
      <link rel="stylesheet" href="assets/dialog/dialog.css">
    
    </head>
    <body>
      <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
          <div class="mdl-layout__header-row">
            <img src="assets/images/cintillo.jpg" />
          </div>
        </header>
        <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
          <header class="demo-drawer-header">
            <img src="assets/images/user.jpg" class="demo-avatar">
            <div class="demo-avatar-dropdown">
              <span>funcionario@mppee.gob.ve</span>
              <div class="mdl-layout-spacer"></div>
              <button type="button" id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">arrow_drop_down</i>
                <span class="visuallyhidden">Accounts</span>
              </button>
              <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                
                <li class="mdl-menu__item"><i class="material-icons">power_settings_new</i>Salir</li>
              </ul>
            </div>
          </header>
          <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <a class="mdl-navigation__link" href="/tablero"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">toc</i>Tablero</a>
            <a class="mdl-navigation__link" href="/incorporar"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">add_box</i>Incorporar</a>
            <a class="mdl-navigation__link" href="/asignar"><i class="mdl-color-text--blue-grey-400 material-icons phd-invert-element" role="presentation">reply</i>Asignar</a>
            <a class="mdl-navigation__link" href="/reasignar"><i class="mdl-color-text--blue-grey-400 material-icons  phd-invert-element" role="presentation">reply_all</i>Reasignar</a>
            <a class="mdl-navigation__link" href="/desincorporar"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">backspace</i>Desincorporar</a>
            <a class="mdl-navigation__link" href="#!"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">attach_file</i>Archivos</a>
          </nav>
        </div>
        @yield('content')
      </div>

    </body>
  </html>
