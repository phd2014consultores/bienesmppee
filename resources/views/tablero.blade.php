@extends('layout') 
@section('content') 


    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">

          <div id="phd-title-app"><h4><strong>SISGEBIP - Sistema de Gestión de Bienes Públicos</strong></h4></div>
          
          <div class="phd-demo-card-dashboard mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title phd-head_with_search">
              <h5 class="phd-title-list">Listado de bienes</h5>

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
                    <td class="mdl-data-table__cell--non-numeric">{{str_limit($bien1->categoria->nombre, 30)}} <p class="phd-table-span-hover">{{$bien1->categoria->nombre}}</p></td>
                    <td class="mdl-data-table__cell--non-numeric">{{str_limit($bien1->subcategoria->nombre, 30)}}<p class="phd-table-span-hover">{{$bien1->subcategoria->nombre}}</p></td>
                    <td class="mdl-data-table__cell--non-numeric">{{str_limit($bien1->categoria_especifica->nombre, 30)}}<p class="phd-table-span-hover">{{$bien1->categoria_especifica->nombre}}</p></td>
                    <td class="mdl-data-table__cell--non-numeric">{{$bien1->tipo_bien->nombre}}</td>
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