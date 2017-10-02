
var bienInstance = {
	tipo_bien: 'Mueble',
	forma_adquisicion: '',
	categoria: '',
	subcategoria: '',
	categoria_especifica: '',
	fa_adju_conf_expr: {
		propietario: '',
		beneficiario: '',
		autoridad: '',
		numero_sentencia: '',
		fecha_sentencia: '',
		nombre_registro: '',
		tomo: '',
		folio: '',
		fecha_registro: '',
	},
	fa_concurso_abierto_cerrado: {
		numero_concurso: '',
		nombre_concurso: '',
		fecha_concurso: '',
		numero_contrato: '',
		fecha_contrato: '',
		numero_nota_entrega: '',
		fecha_nota_entrega: '',
		numero_factura: '',
		fecha_factura: '',
	},
	fa_compra_directa: {
		proveedor: '',
		numero_orden_compra: '',
		fecha_orden_compra: '',
		numero_nota_entrega: '',
		fecha_nota_entrega: '',
		numero_factura: '',
		fecha_factura: '',
	},
	fa_dacion_pago: {
		nombre_cedente: '',
		nombre_beneficiario: '',
		numero_finiquito: '',
		fecha_finiquito: '',
		nombre_registro: '',
		tomo: '',
		folio: '',
		fecha_registro: '',
	},
	fa_donacion: {
		nombre_donante: '',
		nombre_beneficiario: '',
		numero_contrato: '',
		fecha_contrato: '',
		nombre_registro: '',
		tomo: '',
		folio: '',
		fecha_registro: '',
	},
	fa_permuta: {
		nombre_copermutante: '',
		nombre_beneficiario: '',
		nombre_licitacion: '',
		numero_licitacion: '',
		fecha_licitacion: '',
		numero_contrato: '',
		fecha_contrato: '',
		nombre_registro: '',
		tomo: '',
		folio: '',
		fecha_registro: '',
	},
	fa_transferencia: {
		nombre_quien_transfiere: '',
		nombre_beneficiario: '',
		numero_autorizacion: '',
		fecha_autorizacion: '',
		nombre_registro: '',
		tomo: '',
		folio: '',
		fecha_registro: '',
	},
	codigo_interno: '',
	valor_adquisicion: '',
	fecha_adquisicion: '',
	estado: '',
	estado_uso: '',
	uso_actual: '',
	moneda: '',
	otra_moneda: '',
	fecha_ingreso_organo: '',
	descripcion_estado: '',
	datos_particulares_mueble: {
		serial: '',
		marca: '',
		modelo: '',
		color: '',
		anio_fabricacion: '',
		especificaciones_tecnicas: '',
		otras_especificaciones_tecnicas: '',
		componentes: [],
	},
	datos_particulares_inmueble: {
		oficina_registro_notaria: '',
		referencia_registro: '',
		numero_registro: '',
		tomo: '',
		folio: '',
		protocolo: '',
		fecha_registro: '',
		nombre_propietario_anterior: '',
		area_construccion: '',
		unidad_medida_area_construccion: '',
		area_terreno: '',
		unidad_medida_area_terreno: '',
		dependencias_integran: '',
		otras_especificaciones: '',
	},
	datos_seguro: {
		nombre_compania: '',
		registro_seguro: '',
		numero_poliza: '',
		monto_asegurado: '',
		fecha_inicio_poliza: '',
		fecha_fin_poliza: '',
		cobertura: '',
		posee_responsabilidad_civil: '',
		otro_nombre_compania: '',
		descripcion_cobertura: '',
	},
};
var maximaInstance = {
	'ente' : '',
    'id' : '',
	'ci' : '',
	'nombre' : '',
	'apellido' : '',
	'telefono' : '',
	'cargo' : '',
	'correo_electronico' : '',
	'numero_gaceta' : '',
	'fecha_gaceta' : '',
	'numero_resolucion_decreto' : '',
	'fecha_resolucion_decreto' : '',
	'ente_id' : '',
	'habilitado' : '',
};
var asignacionInstance = {
	tipo_bien : '',
	bien_id: '',
	inmueble : {
		ubicacion: '',
		pais: '',
		localizacion: '',
		parroquia: '',
		calle_av: '',
		urbanizacion: '',
		casa_edificio: '',
		posee_sede: '',
		sede: '',
		unidad_administrativa: '',
		responsable_administrativo: '',
		responsable_uso_directo: '',
	},
	mueble : {
		unidad_administrativa: '',
		responsable_administrativo: '',
		responsable_uso_directo: '',
		ubicacion: '',
	},		
};
var desincorporacionInstance = {
	estado_uso: '',
	files: [],
	img: [],
};
var dialogInstance = {
	title: '',
	content: '',
};
var proveedorInstance = {
	"id": "",
	"rif" : "",
	"descripcion": "",
	"tipo_proveedor": "",
	"otra_descripcion": "",
};
var enteInstance = {
    'id' : '',
	'codigo_rgbp' : '',
	'codigo_sicegof' : '',
	'siglas' : '',
	'rif' : '',
	'razon_social' : '',
	'telefono' : '',
	'direccion_web' : '',
	'correo_electronico' : '',
	'fecha_gaceta' : '',
	'numero_gaceta' : '',
	'habilitado' : ''
};
var sedeInstance = {
    'id' : '',
    'codigo' : '',
    'tipo_sede' : '',
    'especificacion_tipo_sede' : '',
    'descripcion' : '',
    'localizacion' : '',
    'codigo_pais' : '',
    'especifique_otro_pais' : '',
    'codigo_parroquia_ente' : '',
    'codigo_ciudad_ente' : '',
    'nombre_otra_ciudad' : '',
    'urbanizacion' : '',
    'calle_avenida' : '',
    'casa_edificio' : '',
    'piso' : '',
    'ente_id' : ''
};
var unidadAdministrativaInstance = {
    'id' : '',
    'codigo' : '',
    'descripcion' : '',
    'codigo_categoria' : '',
    'denominacion' : '',
    'codigo_unidad_adscrita' : ''
};
var marcaInstance = {
    'id' : '',
    'denominacion_comercial' : '',
    'nombre_fabricante' : '',
    'codigo' : ''
};
var modeloInstance = {
    'id' : '',
    'denominacion_fabricante' : '',
    'marca_id' : '',
    'codigo' : '',
    'codigo_bien' : '',
    'marca' : '',
};

var arrowToggleImpl = function (el) {
	var CLS_TO_TOGGLE_PARENT = "phd-demo-card-dashboard";
	var CLS_TO_TOGGLE_CHILDRE = "mdl-card__actions";

	while ((el = el.parentElement) && !el.classList.contains(CLS_TO_TOGGLE_PARENT));
	
	for (var i = 0; i < el.childNodes.length; i++) {
	    if (el.childNodes[i].className == CLS_TO_TOGGLE_CHILDRE + " phdShow") {
	      el.childNodes[i].className = CLS_TO_TOGGLE_CHILDRE +" phdHide";
	      break;
	    } 
	    if (el.childNodes[i].className == CLS_TO_TOGGLE_CHILDRE + " phdHide") {
	      el.childNodes[i].className = CLS_TO_TOGGLE_CHILDRE + " phdShow";
	      break;
	    }        
	}
};
var setIsFocusedImpl = function (el) {
	if (!el.parentElement.classList.contains("is-focused")) {
		el.parentElement.classList.add("is-focused");
	}
};
var removeIsFocusedImpl = function (el) {
	el.parentElement.classList.remove("is-focused");
};
var getSiblingsList = function (children) {
	var siblingList = [];
	for (var n = children.length - 1; n >= 0; n--) {
        if (children[n] != el) {
            siblingList.push(children[n]);
        }  
    }
    return siblingList;
}
var setIsVisibleMenuContainerImpl = function (el) {
	var siblingList = getSiblingsList(el.childNodes);

	for (var i = 0; i < siblingList.length; i++) {
	    if (siblingList[i].classList.contains("mdl-menu__container")) {
	      siblingList[i].classList.add("is-visible");
	      break;
	    }       
	}
};
var removeIsFocusedSelectInputImpl = function (el) {
	var siblingList = getSiblingsList(el.childNodes);

	for (var i = 0; i < siblingList.length; i++) {
	    if (siblingList[i].classList.contains("is-visible")) {
	      siblingList[i].classList.remove("is-visible");
	      break;
	    }       
	}
};
var showFormImpl = function (cls) {
	var el = document.getElementsByClassName(cls);
	for (var i=0; i < el.length; i++) {
		var children = el[i].parentNode.children;
	    for (var n = children.length - 1; n >= 0; n--) {
	        if (children[n] != el[i]) {
	        	if (children[n].classList.contains("phdShow")) {
	        		children[n].classList.add("phdHide");
					children[n].classList.remove("phdShow");
	        	}
	        }  
	    }
	    if (!el[i].classList.contains("phdShow")) {
			el[i].classList.add("phdShow");
			el[i].classList.remove("phdHide");
		}
	}


	
};



var addComponentImpl = function () {
	var componenteBienMueble = {
		codigo: '',
		marca: '',
		modelo: '',
		serial: '',
		tipo: '',
		descripcion: '',
	}
	vm.bien.datos_particulares_mueble.componentes.push(componenteBienMueble);
};
var removeComponentImpl = function (indice) {
	vm.bien.datos_particulares_mueble.componentes.splice(indice,1);
};
var setImages = function (file) {
	//vm.desincorporacion.img = [];

	var reader = new FileReader();
	var item = {};
	item.name = file.name;
    reader.onload = function (e) {
    	item.data = e.target.result;
    	vm.desincorporacion.img.push(item);
    }
    reader.readAsDataURL(file);
	
};
var setFiles = function (val) {

		for (var i=0; i<val.files.length; i++) {
			setImages(val.files[i]);
		}
	
};
var addFileImpl = function (val) {
	vm.desincorporacion.files.push(val);
};
var removeFileImpl = function (indice) {
	vm.desincorporacion.files.splice(indice,1);
};
var borrarDatosFormularioImpl = function () {
	vm.bien = {
		tipo_bien: 'Mueble',
		forma_adquisicion: '',
		categoria: '',
		subcategoria: '',
		categoria_especifica: '',
		fa_adju_conf_expr: {
			propietario: '',
			beneficiario: '',
			autoridad: '',
			numero_sentencia: '',
			fecha_sentencia: '',
			nombre_registro: '',
			tomo: '',
			folio: '',
			fecha_registro: '',
		},
		fa_concurso_abierto_cerrado: {
			numero_concurso: '',
			nombre_concurso: '',
			fecha_concurso: '',
			numero_contrato: '',
			fecha_contrato: '',
			numero_nota_entrega: '',
			fecha_nota_entrega: '',
			numero_factura: '',
			fecha_factura: '',
		},
		fa_compra_directa: {
			proveedor: '',
			numero_orden_compra: '',
			fecha_orden_compra: '',
			numero_nota_entrega: '',
			fecha_nota_entrega: '',
			numero_factura: '',
			fecha_factura: '',
		},
		fa_dacion_pago: {
			nombre_cedente: '',
			nombre_beneficiario: '',
			numero_finiquito: '',
			fecha_finiquito: '',
			nombre_registro: '',
			tomo: '',
			folio: '',
			fecha_registro: '',
		},
		fa_donacion: {
			nombre_donante: '',
			nombre_beneficiario: '',
			numero_contrato: '',
			fecha_contrato: '',
			nombre_registro: '',
			tomo: '',
			folio: '',
			fecha_registro: '',
		},
		fa_permuta: {
			nombre_copermutante: '',
			nombre_beneficiario: '',
			nombre_licitacion: '',
			numero_licitacion: '',
			fecha_licitacion: '',
			numero_contrato: '',
			fecha_contrato: '',
			nombre_registro: '',
			tomo: '',
			folio: '',
			fecha_registro: '',
		},
		fa_transferencia: {
			nombre_quien_transfiere: '',
			nombre_beneficiario: '',
			numero_autorizacion: '',
			fecha_autorizacion: '',
			nombre_registro: '',
			tomo: '',
			folio: '',
			fecha_registro: '',
		},
		codigo_interno: '',
		valor_adquisicion: '',
		fecha_adquisicion: '',
		estado: '',
		estado_uso: '',
		uso_actual: '',
		moneda: '',
		otra_moneda: '',
		fecha_ingreso_organo: '',
		descripcion_estado: '',
		datos_particulares_mueble: {
			serial: '',
			marca: '',
			modelo: '',
			color: '',
			anio_fabricacion: '',
			especificaciones_tecnicas: '',
			otras_especificaciones_tecnicas: '',
			componentes: [],
		},
		datos_particulares_inmueble: {
			oficina_registro_notaria: '',
			referencia_registro: '',
			numero_registro: '',
			tomo: '',
			folio: '',
			protocolo: '',
			fecha_registro: '',
			nombre_propietario_anterior: '',
			area_construccion: '',
			unidad_medida_area_construccion: '',
			area_terreno: '',
			unidad_medida_area_terreno: '',
			dependencias_integran: '',
			otras_especificaciones: '',
		},
		datos_seguro: {
			nombre_compania: '',
			registro_seguro: '',
			numero_poliza: '',
			monto_asegurado: '',
			fecha_inicio_poliza: '',
			fecha_fin_poliza: '',
			cobertura: '',
			posee_responsabilidad_civil: '',
			otro_nombre_compania: '',
			descripcion_cobertura: '',
		},
	};
	vm.asignacion = {
		tipo_bien : 'Mueble',
		inmueble : {
			ubicacion: '',
			pais: '',
			localizacion: '',
			parroquia: '',
			calle_av: '',
			urbanizacion: '',
			casa_edificio: '',
			posee_sede: '',
			sede: '',
			unidad_administrativa: '',
			responsable_administrativo: '',
			responsable_uso_directo: '',
		},
		mueble : {
			unidad_administrativa: '',
			responsable_administrativo: '',
			responsable_uso_directo: '',
			ubicacion: '',
		},		
	};
	vm.desincorporacion = {
		estado_uso: '',
		files: [],
		img: [],
	};
    vm.proveedor = {
        "id": "",
        "rif" : "",
        "descripcion": "",
        "tipo_proveedor": "",
        "otra_descripcion": "",
    };
    vm.ente = {
        'id' : '',
        'codigo_rgbp' : '',
        'codigo_sicegof' : '',
        'siglas' : '',
        'rif' : '',
        'razon_social' : '',
        'telefono' : '',
        'direccion_web' : '',
        'correo_electronico' : '',
        'fecha_gaceta' : '',
        'numero_gaceta' : '',
        'habilitado' : ''
    };
    vm.maxima = {
        'ente' : '',
        'id' : '',
        'ci' : '',
        'nombre' : '',
        'apellido' : '',
        'telefono' : '',
        'cargo' : '',
        'correo_electronico' : '',
        'numero_gaceta' : '',
        'fecha_gaceta' : '',
        'numero_resolucion_decreto' : '',
        'fecha_resolucion_decreto' : '',
        'ente_id' : '',
        'habilitado' : '',
    };
    vm.sede = {
        'id' : '',
        'codigo' : '',
        'tipo_sede' : '',
        'especificacion_tipo_sede' : '',
        'descripcion' : '',
        'localizacion' : '',
        'codigo_pais' : '',
        'especifique_otro_pais' : '',
        'codigo_parroquia_ente' : '',
        'codigo_ciudad_ente' : '',
        'nombre_otra_ciudad' : '',
        'urbanizacion' : '',
        'calle_avenida' : '',
        'casa_edificio' : '',
        'piso' : '',
        'ente_id' : ''
    };
    vm.unidadAdministrativa = {
        'id' : '',
        'codigo' : '',
        'descripcion' : '',
        'codigo_categoria' : '',
        'denominacion' : '',
        'codigo_unidad_adscrita' : ''
    };
    vm.marca = {
        'id' : '',
        'denominacion_comercial' : '',
        'nombre_fabricante' : '',
        'codigo' : ''
    };
    vm.modelo = {
        'id' : '',
        'denominacion_fabricante' : '',
        'marca_id' : '',
        'codigo' : '',
        'codigo_bien' : '',
        'marca' : '',
    };
	vm.string_fotos = 'Agregar';
};
var validarFormIncorporarImpl = function () {
	var result = true;
	var changeColorToError = function (id) {
		document.querySelector("#phd-"+id).style.color = '#d50000';
	}

	var validarTipoBien = function () {
		var result = (vm.bien.tipo_bien === "Mueble" || vm.bien.tipo_bien === "Inmueble");
		if (!result) changeColorToError("tipo_bien");
		return result;
	};

	/*PENDIENTE*/
	


	return result;
};
var validarFormAsignarImpl = function () {
	/*PENDIENTE*/
	return true;
}
var callbackPostFormImpl = function () {
	document.getElementById("phd-form").submit();
	return false;
};
var submitIncorporarImpl = function () {
	if (validarFormIncorporarImpl()) {
		callbackPostFormImpl();
	} else {
		showModalImpl ("ALERTA", "Existen errores en el formulario, por favor verifique e intente nuevamente.");
	}
};
var submitAsignarImpl = function () {
	if (validarFormAsignarImpl()) {
		callbackPostFormImpl();
	} else {
		showModalImpl ("ALERTA", "Existen errores en el formulario, por favor verifique e intente nuevamente.");
	}
};

var showModalImpl = function (title, content, callback) {
	vmDialog.dialog.title = title;
	vmDialog.dialog.content = content;


	var dialog = document.querySelector('dialog');
    
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialog.showModal();

    var clickClose = function () {
    	dialog.close();
    	dialog.querySelector('.close').removeEventListener('click',clickClose, false );
    	dialog.querySelector('.agree').removeEventListener('click',clickAgree, false );
    };
    var clickAgree = function () {
    	dialog.close();
    	if (callback !== undefined) {
    		callback();
    	}
    	dialog.querySelector('.agree').removeEventListener('click',clickAgree, false );
    	dialog.querySelector('.close').removeEventListener('click',clickClose, false );
    };
    
    
    dialog.querySelector('.close').addEventListener('click', clickClose, false);
    
    dialog.querySelector('.agree').addEventListener('click', clickAgree, false);
};

var setIdBienAsignado= function(id){
document.getElementById('idBienSeleccionado').value = id;
};


/*AUXILIAR INPUTS FORMULARIOS*/
document.addEventListener('DOMContentLoaded',function(){
	var inputs = document.querySelectorAll("input");
	for (var i = 0; i < inputs.length; i++) {
	    inputs[i].addEventListener('click', function(event) {
	        this.style.color = "inherit";
	    });
	}
},false);


var vm = new Vue({
	el: 'main',
	data: {
		maxima : maximaInstance,
		bien: bienInstance,
		asignacion: asignacionInstance,
		desincorporacion: desincorporacionInstance,
		string_fotos: 'Agregar',
		subcategorias: [],
		categorias_especificas: [],
		proveedor: proveedorInstance,
		ente: enteInstance,
        sede: sedeInstance,
        unidad_administrativa: unidadAdministrativaInstance,
        marca: marcaInstance,
        modelo: modeloInstance,
	},
	methods: {
		arrowToggle(event) {
			arrowToggleImpl(event.target);
		},
		setIsFocused(event) {
			setIsFocusedImpl(event.target);
		},
		removeIsFocused(event) {
			removeIsFocusedImpl(event.target);
		},
		setIsFocusedSelectInput(event) {
			setIsFocusedImpl(event.target);
			setIsVisibleMenuContainerImpl(event.target);
		},
		removeIsFocusedSelectInput(event) {
			removeIsFocusedImpl(event.target);
			removeIsVisibleMenuContainerImpl(event.target);
		},
		showForm(cls) {
			showFormImpl(cls);
		},
		addComponent() {
			addComponentImpl();
		},
		removeComponent(indice) {
			removeComponentImpl(indice);
		},
		showModal(title, content, callback) {
			showModalImpl(title, content, callback);
		},
		borrarDatosFormulario() {
			borrarDatosFormularioImpl();
		},
		submitIncorporar() {
			submitIncorporarImpl();
		},
		submitAsignar() {
			submitAsignarImpl();
		},
		addFile(val) {
			addFileImpl(val);
		},
		removeFile(indice) {
			removeFileImpl(indice);
		},
		isFormValid () {
			if (this.bien.tipo_bien!=""){
				if (this.bien.tipo_bien == "Mueble"){
					if (this.bien.datos_particulares_mueble.serial!="" && this.bien.datos_particulares_mueble.marca != "" && this.bien.datos_particulares_mueble.modelo != "" && this.bien.datos_particulares_mueble.color != "" && this.bien.datos_particulares_mueble.anio_fabricacion !="" && this.bien.datos_particulares_mueble.especificaciones_tecnicas !="" && this.bien.datos_particulares_mueble.otras_especificaciones_tecnicas != "" ){
					}else {return false;}

					if (this.bien.forma_adquisicion == "Adjudicación"  || this.bien.forma_adquisicion == "Confiscación"  || this.bien.forma_adquisicion == "Expropiación" ){
							if (this.bien.fa_adju_conf_expr.propietario != "" && this.bien.fa_adju_conf_expr.beneficiario != "" && this.bien.fa_adju_conf_expr.autoridad != "" && this.bien.fa_adju_conf_expr.numero_sentencia != "" && this.bien.fa_adju_conf_expr.fecha_sentencia != "" && this.bien.fa_adju_conf_expr.nombre_registro != "" && this.bien.fa_adju_conf_expr.tomo != "" && this.bien.fa_adju_conf_expr.folio != "" && this.bien.fa_adju_conf_expr.fecha_registro != "" ){
							}else {	return false;}
						}else {

						if (this.bien.forma_adquisicion == "Compra concurso abierto" || this.bien.forma_adquisicion == "Compra concurso cerrado"){
								if ( this.bien.fa_concurso_abierto_cerrado.numero_concurso != "" && this.bien.fa_concurso_abierto_cerrado.nombre_concurso != "" && this.bien.fa_concurso_abierto_cerrado.fecha_concurso != "" && this.bien.fa_concurso_abierto_cerrado.numero_contrato != "" && this.bien.fa_concurso_abierto_cerrado.fecha_contrato != "" && this.bien.fa_concurso_abierto_cerrado.numero_nota_entrega != "" && this.bien.fa_concurso_abierto_cerrado.fecha_nota_entrega != "" && this.bien.fa_concurso_abierto_cerrado.numero_factura != "" && this.bien.fa_concurso_abierto_cerrado.fecha_factura != ""){

								}else{return false;}
								
						} else {

						if (this.bien.forma_adquisicion == "Compra directa"){
							if (this.bien.fa_compra_directa.proveedor != "" && this.bien.fa_compra_directa.numero_orden_compra != "" && this.bien.fa_compra_directa.fecha_orden_compra != "" && this.bien.fa_compra_directa.numero_nota_entrega != "" && this.bien.fa_compra_directa.fecha_nota_entrega != "" && this.bien.fa_compra_directa.numero_factura != "" && this.bien.fa_compra_directa.fecha_factura !=""){

							} else {return false;}

						}else{

						if (this.bien.forma_adquisicion == "Dación de pago"){
							if ( this.bien.fa_dacion_pago.nombre_cedente != "" && this.bien.fa_dacion_pago.nombre_beneficiario != "" && this.bien.fa_dacion_pago.numero_finiquito != "" && this.bien.fa_dacion_pago.fecha_finiquito != "" && this.bien.fa_dacion_pago.nombre_registro != "" && this.bien.fa_dacion_pago.tomo != "" && this.bien.fa_dacion_pago.folio != "" && this.bien.fa_dacion_pago.fecha_registro != ""){

							} else{return false;}

						}else{

						if (this.bien.forma_adquisicion == "Donación"){
							if (this.bien.fa_donacion.nombre_donante != "" && this.bien.fa_donacion.nombre_beneficiario != "" && this.bien.fa_donacion.numero_contrato != "" && this.bien.fa_donacion.fecha_contrato != "" && this.bien.fa_donacion.nombre_registro != "" && this.bien.fa_donacion.tomo != "" && this.bien.fa_donacion.folio != "" && this.bien.fa_donacion.fecha_registro != ""){

							}else {return false;}

						}else {

						if (this.bien.forma_adquisicion == "Permuta" ){
							if (this.bien.fa_permuta.nombre_copermutante != "" && this.bien.fa_permuta.nombre_beneficiario != "" && this.bien.fa_permuta.nombre_licitacion != "" && this.bien.fa_permuta.numero_licitacion != "" && this.bien.fa_permuta.fecha_licitacion != "" && this.bien.fa_permuta.numero_contrato != "" && this.bien.fa_permuta.fecha_contrato != "" && this.bien.fa_permuta.nombre_registro != "" && this.bien.fa_permuta.tomo != "" && this.bien.fa_permuta.folio != "" && this.bien.fa_permuta.fecha_registro != "") {
							}else{return false;}

						}else{

						if (this.bien.forma_adquisicion == "Transferencia" ){
							if (this.bien.fa_transferencia.nombre_quien_transfiere != "" && this.bien.fa_transferencia.nombre_beneficiario != "" && this.bien.fa_transferencia.numero_autorizacion != "" && this.bien.fa_transferencia.fecha_autorizacion != "" && this.bien.fa_transferencia.nombre_registro != "" && this.bien.fa_transferencia.tomo != "" && this.bien.fa_transferencia.folio != "" && this.bien.fa_transferencia.fecha_registro != ""){

							}else { return false;}
						}else {return false;}

						}
						}
						}
						}
						}
						}

						if (this.bien.datos_seguro.nombre_compania != "" && this.bien.datos_seguro.registro_seguro != "" && this.bien.datos_seguro.numero_poliza != "" && this.bien.datos_seguro.monto_asegurado != "" && this.bien.datos_seguro.fecha_inicio_poliza != "" && this.bien.datos_seguro.fecha_fin_poliza != "" && this.bien.datos_seguro.cobertura != "" && this.bien.datos_seguro.posee_responsabilidad_civil != "" && this.bien.datos_seguro.otro_nombre_compania != "" && this.bien.datos_seguro.descripcion_cobertura != ""){

							}else {return false;}

						if (this.bien.codigo_interno != "" && this.bien.valor_adquisicion != "" && this.bien.fecha_adquisicion != "" && this.bien.estado != "" && this.bien.estado_uso != "" && this.bien.uso_actual != "" && this.bien.moneda != "" && this.bien.fecha_ingreso_organo != "" && this.bien.descripcion != ""){
								if (this.bien.moneda == "Otra moneda"){
									if (this.bien.otra_moneda != ""){

									}else {return false;}
								}
						} else {return false;}
				}else{



				if (this.bien.tipo_bien == "Inmueble") {
					if (this.bien.datos_particulares_inmueble.oficina_registro_notaria != "" && this.bien.datos_particulares_inmueble.referencia_registro != "" && this.bien.datos_particulares_inmueble.numero_registro != "" && this.bien.datos_particulares_inmueble.tomo != "" && this.bien.datos_particulares_inmueble.folio != "" && this.bien.datos_particulares_inmueble.protocolo != "" && this.bien.datos_particulares_inmueble.fecha_registro != "" && this.bien.datos_particulares_inmueble.nombre_propietario_anterior != "" && this.bien.datos_particulares_inmueble.area_construccion != "" && this.bien.datos_particulares_inmueble.unidad_medida_area_construccion != "" && this.bien.datos_particulares_inmueble.area_terreno != "" && this.bien.datos_particulares_inmueble.unidad_medida_area_terreno != "" && this.bien.datos_particulares_inmueble.dependencias_integran != "" && this.bien.datos_particulares_inmueble.otras_especificaciones != "") {
						
					}else {return false;}

					if (this.bien.forma_adquisicion == "Adjudicación"  || this.bien.forma_adquisicion == "Confiscación"  || this.bien.forma_adquisicion == "Expropiación" ){
							if (this.bien.fa_adju_conf_expr.propietario != "" && this.bien.fa_adju_conf_expr.beneficiario != "" && this.bien.fa_adju_conf_expr.autoridad != "" && this.bien.fa_adju_conf_expr.numero_sentencia != "" && this.bien.fa_adju_conf_expr.fecha_sentencia != "" && this.bien.fa_adju_conf_expr.nombre_registro != "" && this.bien.fa_adju_conf_expr.tomo != "" && this.bien.fa_adju_conf_expr.folio != "" && this.bien.fa_adju_conf_expr.fecha_registro != "" ){
							}else {	return false;}
						}else {

						if (this.bien.forma_adquisicion == "Compra concurso abierto" || this.bien.forma_adquisicion == "Compra concurso cerrado"){
								if ( this.bien.fa_concurso_abierto_cerrado.numero_concurso != "" && this.bien.fa_concurso_abierto_cerrado.nombre_concurso != "" && this.bien.fa_concurso_abierto_cerrado.fecha_concurso != "" && this.bien.fa_concurso_abierto_cerrado.numero_contrato != "" && this.bien.fa_concurso_abierto_cerrado.fecha_contrato != "" && this.bien.fa_concurso_abierto_cerrado.numero_nota_entrega != "" && this.bien.fa_concurso_abierto_cerrado.fecha_nota_entrega != "" && this.bien.fa_concurso_abierto_cerrado.numero_factura != "" && this.bien.fa_concurso_abierto_cerrado.fecha_factura != ""){

								}else{return false;}
								
						} else {

						if (this.bien.forma_adquisicion == "Compra directa"){
							if (this.bien.fa_compra_directa.proveedor != "" && this.bien.fa_compra_directa.numero_orden_compra != "" && this.bien.fa_compra_directa.fecha_orden_compra != "" && this.bien.fa_compra_directa.numero_nota_entrega != "" && this.bien.fa_compra_directa.fecha_nota_entrega != "" && this.bien.fa_compra_directa.numero_factura != "" && this.bien.fa_compra_directa.fecha_factura !=""){

							} else {return false;}

						}else{

						if (this.bien.forma_adquisicion == "Dación de pago"){
							if ( this.bien.fa_dacion_pago.nombre_cedente != "" && this.bien.fa_dacion_pago.nombre_beneficiario != "" && this.bien.fa_dacion_pago.numero_finiquito != "" && this.bien.fa_dacion_pago.fecha_finiquito != "" && this.bien.fa_dacion_pago.nombre_registro != "" && this.bien.fa_dacion_pago.tomo != "" && this.bien.fa_dacion_pago.folio != "" && this.bien.fa_dacion_pago.fecha_registro != ""){

							} else{return false;}

						}else{

						if (this.bien.forma_adquisicion == "Donación"){
							if (this.bien.fa_donacion.nombre_donante != "" && this.bien.fa_donacion.nombre_beneficiario != "" && this.bien.fa_donacion.numero_contrato != "" && this.bien.fa_donacion.fecha_contrato != "" && this.bien.fa_donacion.nombre_registro != "" && this.bien.fa_donacion.tomo != "" && this.bien.fa_donacion.folio != "" && this.bien.fa_donacion.fecha_registro != ""){

							}else {return false;}

						}else {

						if (this.bien.forma_adquisicion == "Permuta" ){
							if (this.bien.fa_permuta.nombre_copermutante != "" && this.bien.fa_permuta.nombre_beneficiario != "" && this.bien.fa_permuta.nombre_licitacion != "" && this.bien.fa_permuta.numero_licitacion != "" && this.bien.fa_permuta.fecha_licitacion != "" && this.bien.fa_permuta.numero_contrato != "" && this.bien.fa_permuta.fecha_contrato != "" && this.bien.fa_permuta.nombre_registro != "" && this.bien.fa_permuta.tomo != "" && this.bien.fa_permuta.folio != "" && this.bien.fa_permuta.fecha_registro != "") {
							}else{return false;}

						}else{

						if (this.bien.forma_adquisicion == "Transferencia" ){
							if (this.bien.fa_transferencia.nombre_quien_transfiere != "" && this.bien.fa_transferencia.nombre_beneficiario != "" && this.bien.fa_transferencia.numero_autorizacion != "" && this.bien.fa_transferencia.fecha_autorizacion != "" && this.bien.fa_transferencia.nombre_registro != "" && this.bien.fa_transferencia.tomo != "" && this.bien.fa_transferencia.folio != "" && this.bien.fa_transferencia.fecha_registro != ""){

							}else { return false;}
						}else {return false;}

						}
						}
						}
						}
						}
						}

						if (this.bien.datos_seguro.nombre_compania != "" && this.bien.datos_seguro.registro_seguro != "" && this.bien.datos_seguro.numero_poliza != "" && this.bien.datos_seguro.monto_asegurado != "" && this.bien.datos_seguro.fecha_inicio_poliza != "" && this.bien.datos_seguro.fecha_fin_poliza != "" && this.bien.datos_seguro.cobertura != "" && this.bien.datos_seguro.posee_responsabilidad_civil != "" && this.bien.datos_seguro.otro_nombre_compania != "" && this.bien.datos_seguro.descripcion_cobertura != ""){

							}else {return false;}

						if (this.bien.codigo_interno != "" && this.bien.valor_adquisicion != "" && this.bien.fecha_adquisicion != "" && this.bien.estado != "" && this.bien.estado_uso != "" && this.bien.uso_actual != "" && this.bien.moneda != "" && this.bien.fecha_ingreso_organo != "" && this.bien.descripcion != ""){
								if (this.bien.moneda == "Otra moneda"){
									if (this.bien.otra_moneda != ""){

									}else {return false;}
								}
						} else {return false;}


				}else {return false;}
				}

				return true;
			}else {
				return false;
			}
		},
		isFormValidAsig (){
			if (this.asigancion != ""){
			if (this.asignacion.tipo_bien == "Mueble" ) {
				if (this.asignacion.mueble.unidad_administrativa != "" && this.asignacion.mueble.responsable_administrativo != "" && this.asignacion.mueble.responsable_uso_directo != "" && this.asignacion.mueble.ubicacion != ""){
				}else {return false;}
			}else{

				if (this.asignacion.tipo_bien == "Inmueble") {
					if (this.asignacion.inmueble.ubicacion != "" && this.asignacion.inmueble.pais != "" && this.asignacion.inmueble.localizacion != "" && this.asignacion.inmueble.parroquia != "" && this.asignacion.inmueble.calle_av != "" && this.asignacion.inmueble.urbanizacion != "" && this.asignacion.inmueble.casa_edificio != "" && this.asignacion.inmueble.posee_sede != "" && this.asignacion.inmueble.sede != "" && this.asignacion.inmueble.unidad_administrativa != "" && this.asignacion.inmueble.responsable_administrativo != "" && this.asignacion.inmueble.responsable_uso_directo != "" ){
					
					}else{return false;}

				}else {return false;}
			}

			return true;
		}
		else {return false;}
		},
		isFormValidDesin(){
			if (this.desincorporacion.estado_uso != ""){
				return true;
			}else {return false;}
		},
		enviarIdCategoria(id){
	
			this.$http.post('/obtenerSubcategoria', {
			 _token: document.getElementById('csrf_token').value,
				id: id
          }).then(function(response) { 
             this.subcategorias =response.body;
             this.bien.subcategoria = '';
          }, function() { 
             alert('Error');
          });
		},

		enviarIdSubcategoria(id){
			this.$http.post('/obtenerCategoriaEspecifica', {
			 _token: document.getElementById('csrf_token').value,
             id: id 
          }).then(function(response) { 
             this.categorias_especificas =response.body;
             this.bien.categoria_especifica = '';

          }, function() { 
             alert('Error'); 
      
          });
		},

		eliminarFoto(indice){
			this.desincorporacion.img.splice(indice,1);
		},
        obtenerProveedor(id){
            this.$http.post('/obtenerProveedor', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.proveedor =response.body;
            }, function() {
                alert('Error');
            });
        },
        obtenerEnte(id){
            console.log(id);
            this.$http.post('/obtenerEnte', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.ente =response.body;
                this.ente.habilitado = (this.ente.habilitado) ? "SI" : "NO";
            }, function() {
                alert('Error');
            });
        },
        obtenerMaximaAutoridad(id,entes){
            this.$http.post('/obtenerMaximaAutoridad', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.maxima =response.body;
                this.maxima.habilitado = (this.maxima.habilitado) ? "SI" : "NO";
                for (var i = 0; i < entes.length; i++) {
                    if (entes[i].id === this.maxima.ente_id) {
                        this.maxima.ente = entes[i].razon_social;
                    }
                }


            }, function() {
                alert('Error');
            });
        },
        obtenerResponsablePatrimonial(id,entes){
            this.$http.post('/obtenerResponsablePatrimonial', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.maxima =response.body;
                this.maxima.habilitado = (this.maxima.habilitado) ? "SI" : "NO";
                for (var i = 0; i < entes.length; i++) {
                    if (entes[i].id === this.maxima.ente_id) {
                        this.maxima.ente = entes[i].razon_social;
                    }
                }


            }, function() {
                alert('Error');
            });
        },
        obtenerSede(id,entes){
            this.$http.post('/obtenerSede', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.sede =response.body;
                for (var i = 0; i < entes.length; i++) {
                    if (entes[i].id === this.sede.ente_id) {
                        this.sede.ente = entes[i].razon_social;
                    }
                }


            }, function() {
                alert('Error');
            });
        },
        obtenerUnidadAdministrativa(id,entes){
            this.$http.post('/obtenerUnidadAdministrativa', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.unidad_administrativa =response.body;
            }, function() {
                alert('Error');
            });
        },
        obtenerMarca(id){
            this.$http.post('/obtenerMarca', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.marca =response.body;
            }, function() {
                alert('Error');
            });
        },
        obtenerMarca(id,marcas){
            this.$http.post('/obtenerModelo', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.modelo =response.body;
                for (var i = 0; i < marcas.length; i++) {
                    if (marcas[i].id === this.modelo.marca_id) {
                        this.modelo.marca = marcas[i].denominacion_comercial;
                    }
                }
            }, function() {
                alert('Error');
            });
        },
	},


});

var vmDialog = new Vue({
	el: 'dialog',
	data: {
		dialog: dialogInstance,
	},
	methods: {
		callback(){

		}
	}
});

