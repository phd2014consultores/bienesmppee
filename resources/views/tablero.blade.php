@extends('layout') 
@section('content') 


    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">

          <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
          
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
            </div>
         

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
                @foreach($bien as $bien1)
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">{{$bien1->id}}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{str_limit($bien1->categoria->categoria, 30)}} <p class="phd-table-span-hover">{{$bien1->categoria->categoria}}</p></td>
                    <td class="mdl-data-table__cell--non-numeric">{{str_limit($bien1->subcategoria->subcategoria, 30)}}<p class="phd-table-span-hover">{{$bien1->subcategoria->subcategoria}}</p></td>
                    <td class="mdl-data-table__cell--non-numeric">{{str_limit($bien1->categoria_especifica->categoria_especifica, 30)}}<p class="phd-table-span-hover">{{$bien1->categoria_especifica->categoria_especifica}}</p></td>
                    <td class="mdl-data-table__cell--non-numeric">{{$bien1->tipo_bien->tipo_bien}}</td>
                 </tr>
                @endforeach              
                </tbody>
              </table>
        
            </div>
          </div>

        </div>
      </main>
    </div>


    <link rel="stylesheet" href="assets/mdl/css/Material-Icon.css">
    <link rel="stylesheet" href="assets/mdl/css/material.min.css">
    <link rel="stylesheet" href="assets/customer-css/styles.css">
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>

















@endsection