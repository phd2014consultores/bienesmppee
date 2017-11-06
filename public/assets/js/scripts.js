
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
var responsableInstance = {
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
	'estados' : '',
    'codigo_pais' : '',
    'pais' : '',
    'especifique_otro_pais' : '',
	'municipio' : '',
	'municipios' : '',
    'codigo_parroquia_ente' : '',
	'parroquias' : '',
    'codigo_ciudad_ente' : {},
	'ciudades' : '',
    'nombre_otra_ciudad' : '',
    'urbanizacion' : '',
    'calle_avenida' : '',
    'casa_edificio' : '',
    'piso' : '',
    'ente_id' : '',
	'ente' : '',
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
var estadoInstance = {
	'id' : '',
	'estado' : '',
	'codigo' : '',
	'pais_id' : '',
	'pais' : ''
};
var municipioInstance = {
	'id': '',
	'estado_id': '',
	'codigo' : '',
	'municipio': '',
	'estado': ''
};
var paisInstance = {
    'id': '',
    'pais': ''
};
var parroquiaInstance = {
    'id' : '',
	'codigo' : '',
	'parroquia' : '',
	'municipio_id' : '',
	'municipio' : '',
	'estado': {
    	'estado' : '',
		'municipios' : []
	}
};
var ciudadInstance = {
    'id' : '',
    'codigo' : '',
    'ciudad' : '',
    'municipio_id' : '',
    'municipio' : '',
    'estado': {
        'estado' : '',
        'municipios' : []
    }
};
var categoriaInstance = {
    'id' : '',
	'nombre' : '',
	'codigo' : ''
};
var subcategoriaInstance = {
    'id' : '',
    'nombre' : '',
    'subcategoria' : '',
    'categoria_id' : '',
    'categoria' : ''
};
var categoriaEspecificaInstance = {
    'id' : '',
    'codigo' : '',
    'nombre' : '',
    'subcategoria_id' : '',
    'subcategoria' : '',
    'categoria': {
        'categoria' : '',
        'subcategorias' : []
    }
};
var colorInstance = {
    'id': '',
    'color': ''
};
var unidadMedidaInstance = {
    'id': '',
    'unidad': '',
    'simbolo': '',
    'tipo': ''
};
var estadoBienInstance = {
    'id': '',
    'estado_bien': '',
};
var companiaAseguradoraInstance = {
    'id': '',
    'nombre': '',
};
var tipoCoberturaInstance = {
    'id': '',
    'cobertura': '',
};
var monedaInstance = {
    'id': '',
    'moneda': '',
};
var monedaInstance = {
    'id': '',
    'moneda': '',
};
var tipoBienInstance = {
    'id': '',
    'nombre': '',
};
var formaAdquisicionInstance = {
    'id': '',
    'nombre': '',
};
var estadoUsoBienInstance = {
    'id': '',
    'estado_uso': '',
};
var usoActualBienInstance = {
    'id': '',
    'uso_actual': '',
};
var tipoSedeInstance = {
    'id': '',
    'tipo': '',
};
var ubicacionAdministrativaInstance = {
    'id': '',
    'ubicacion': '',
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
String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
}
var showFormImpl = function (cls) {
    cls = cls.toLowerCase()
		.replaceAll(" ","_")
        .replaceAll(/á/gi,"a")
        .replaceAll(/é/gi,"e")
        .replaceAll(/í/gi,"i")
        .replaceAll(/ó/gi,"o")
        .replaceAll(/ú/gi,"u");
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
	};
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
    vm.responsable = {
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
        'estados' : '',
        'codigo_pais' : '',
        'pais' : '',
        'especifique_otro_pais' : '',
        'municipio' : '',
        'municipios' : '',
        'codigo_parroquia_ente' : '',
        'parroquias' : '',
        'codigo_ciudad_ente' : {},
        'ciudades' : '',
        'nombre_otra_ciudad' : '',
        'urbanizacion' : '',
        'calle_avenida' : '',
        'casa_edificio' : '',
        'piso' : '',
        'ente_id' : '',
        'ente' : '',
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
    vm.estado = {
	'id' : '',
	'estado' : '',
	'codigo' : '',
	'pais_id' : '',
	'pais' : ''
	};
	vm.municipio = {
	'id': '',
	'estado_id': '',
	'codigo' : '',
	'municipio': '',
	'estado': ''
	};
    vm.pais = {
        'id': '',
        'pais': ''
    };
    vm.parroquia = {
        'id' : '',
        'codigo' : '',
        'parroquia' : '',
        'municipio_id' : '',
        'municipio' : '',
        'estado': {
            'estado' : '',
            'municipios' : []
        }
    };
    vm.ciudad = {
        'id' : '',
        'codigo' : '',
        'ciudad' : '',
        'municipio_id' : '',
        'municipio' : '',
        'estado': {
            'estado' : '',
            'municipios' : []
        }
    };
    vm.categoria = {
        'id' : '',
        'nombre' : '',
        'codigo' : ''
    };
    vm.subcategoria = {
        'id' : '',
        'codigo' : '',
        'nombre' : '',
        'categoria_id' : '',
        'categoria' : ''
    };
    vm.categoria_especifica = {
        'id' : '',
        'codigo' : '',
        'nombre' : '',
        'subcategoria_id' : '',
        'subcategoria' : '',
        'categoria': {
            'categoria' : '',
            'subcategorias' : []
        }
    };
    vm.color = {
        'id': '',
        'color': ''
    };
    vm.unidad_medida = {
        'id': '',
        'unidad': '',
        'simbolo': '',
        'tipo': ''
    };
    vm.estado_bien = {
        'id': '',
        'estado_bien': '',
    };
    vm.compania_aseguradora = {
        'id': '',
        'nombre': '',
    };
    vm.tipo_cobertura = {
        'id': '',
        'cobertura': '',
    };
    vm.moneda = {
        'id': '',
        'moneda': '',
    };
    vm.tipo_bien = {
        'id': '',
        'nombre': '',
    };
    vm.forma_adquisicion = {
        'id': '',
        'nombre': '',
    };
    vm.estado_uso_bien = {
        'id': '',
        'estado_uso': '',
    };
    vm.uso_actual_bien = {
        'id': '',
        'uso_actual': '',
    };
    vm.tipo_sede = {
        'id': '',
        'tipo': '',
    };
    vm.ubicacion_administrativa = {
        'id': '',
        'ubicacion': '',
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
        estado: estadoInstance,
        municipio: municipioInstance,
		pais: paisInstance,
		parroquia: parroquiaInstance,
		ciudad: ciudadInstance,
		categoria: categoriaInstance,
		subcategoria: subcategoriaInstance,
		categoria_especifica: categoriaEspecificaInstance,
		color: colorInstance,
        unidad_medida: unidadMedidaInstance,
        estado_bien: estadoBienInstance,
        compania_aseguradora: companiaAseguradoraInstance,
		tipo_cobertura : tipoCoberturaInstance,
		moneda : monedaInstance,
		tipo_bien : tipoBienInstance,
		forma_adquisicion : formaAdquisicionInstance,
		estado_uso_bien : estadoUsoBienInstance,
		uso_actual_bien : usoActualBienInstance,
		tipo_sede : tipoSedeInstance,
		responsable : responsableInstance,
		ubicacion_administrativa : ubicacionAdministrativaInstance,
		responsables_admin : [],
        responsables_uso : [],
		dateFrom : '',
		dateTo: '',
        filtros: {
		    tipo_bien : '',
            forma_adquisicion : '',
            responsable_administrativo : '',
            responsable_uso_directo : '',
        }
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
        obtenerSubcategorias(subcategorias){
            this.subcategorias =subcategorias;
            this.bien.subcategoria = '';
		},

		obtenerCategoriasEspecificas(id){
        	console.log(id);
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
                this.responsable =response.body;
                this.responsable.habilitado = (this.responsable.habilitado) ? "SI" : "NO";
                for (var i = 0; i < entes.length; i++) {
                    if (entes[i].id === this.responsable.ente_id) {
                        this.responsable.ente = entes[i].razon_social;
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
        obtenerModelo(id,marcas){
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
        obtenerEstado(id,paises){
            this.$http.post('/obtenerEstado', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.estado =response.body;
                console.log(JSON.stringify(this.estado));
                console.log(JSON.stringify(this.estado.pais));
                for (var i = 0; i < paises.length; i++) {
                    if (paises[i].id === this.estado.pais_id) {
                        this.estado.pais = paises[i].pais;
                        break;
                    }
                }
            }, function() {
                alert('Error');
            });
        },
        obtenerMunicipio(id,estados){
            this.$http.post('/obtenerMunicipio', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.municipio =response.body;
                for (var i = 0; i < estados.length; i++) {
                    if (estados[i].id === this.municipio.estado_id) {
                        this.municipio.estado = estados[i].estado;
                        break;
                    }
                }
            }, function() {
                alert('Error');
            });
        },
        obtenerPais(id){
            this.$http.post('/obtenerPais', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.pais =response.body;
            }, function() {
                alert('Error');
            });
        },
        obtenerParroquia(parroquia, municipio, estado, municipios){
        	this.parroquia.id = parroquia.id;
        	this.parroquia.codigo = parroquia.codigo;
        	this.parroquia.parroquia = parroquia.parroquia;
        	this.parroquia.municipio_id = parroquia.municipio_id;
        	this.parroquia.municipio = municipio;
        	this.parroquia.estado.estado = estado;
        	this.parroquia.estado.municipios = municipios;
        },
        obtenerCiudad(ciudad, municipio, estado, municipios){
            this.ciudad.id = ciudad.id;
            this.ciudad.codigo = ciudad.codigo;
            this.ciudad.ciudad = ciudad.ciudad;
            this.ciudad.municipio_id = ciudad.municipio_id;
            this.ciudad.municipio = municipio;
            this.ciudad.estado.estado = estado;
            this.ciudad.estado.municipios = municipios;
        },
        obtenerCategoria(categoria){
            this.categoria = categoria;
        },
        obtenerSubcategoria(subcategoria, categoria){
            this.subcategoria.id = subcategoria.id;
            this.subcategoria.codigo = subcategoria.codigo;
            this.subcategoria.subcategoria = subcategoria.nombre;
            this.subcategoria.categoria_id = subcategoria.categoria_id;
            this.subcategoria.categoria = categoria;
        },
        obtenerCategoriaEspecifica(categoria_especifica, subcategoria, categoria, subcategorias){
            this.categoria_especifica.id = categoria_especifica.id;
            this.categoria_especifica.codigo = categoria_especifica.codigo;
            this.categoria_especifica.nombre = categoria_especifica.nombre;
            this.categoria_especifica.subcategoria_id = categoria_especifica.subcategoria_id;
            this.categoria_especifica.subcategoria = subcategoria;
            this.categoria_especifica.categoria.nombre = categoria;
            this.categoria_especifica.categoria.subcategorias = subcategorias;
        },
        obtenerColor(color){
            this.color = color;
        },
        obtenerUnidadMedida(unidad_medida){
            this.unidad_medida = unidad_medida;
        },
        obtenerEstadoBien(estado_bien){
            this.estado_bien = estado_bien;
        },
        obtenerCompaniaAseguradora(compania_aseguradora){
            this.compania_aseguradora = compania_aseguradora;
        },
        obtenerTipoCobertura(tipo_cobertura){
            this.tipo_cobertura = tipo_cobertura;
        },
        obtenerMoneda(moneda){
            this.moneda = moneda;
        },
        obtenerTipoBien(tipo_bien){
            this.tipo_bien = tipo_bien;
        },
        obtenerFormaAdquisicion(forma_adquisicion){
            this.forma_adquisicion = forma_adquisicion;
        },
        obtenerEstadoUsoBien(estado_uso_bien){
            this.estado_uso_bien = estado_uso_bien;
        },
        obtenerUsoActualBien(uso_actual_bien){
            this.uso_actual_bien = uso_actual_bien;
        },
        obtenerUbicacionAdministrativa(ubicacion_administrativa){
            this.ubicacion_administrativa = ubicacion_administrativa;
        },
        obtenerEstadosByPais(estados){
            this.sede.estados = estados;
        },
        obtenerTipoSede(tipo_sede){
            this.tipo_sede = tipo_sede;
        },
        obtenerEstadosPorPais(id){
            this.$http.post('/obtenerEstadosPorPais', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.sede.estados = response.body;
            }, function() {
                alert('Error');
            });
        },
        obtenerMunicipiosPorEstado(id){
            this.$http.post('/obtenerMunicipiosPorEstado', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.sede.municipios = response.body;
            }, function() {
                alert('Error');
            });
        },
        obtenerParroquiasPorMunicipios(id){
            this.$http.post('/obtenerParroquiasPorMunicipios', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.sede.parroquias = response.body;
            }, function() {
                alert('Error');
            });
        },
        obtenerCiudadesPorMunicipio(id){
            this.$http.post('/obtenerCiudadesPorMunicipio', {
                _token: document.getElementById('csrf_token').value,
                id: id
            }).then(function(response) {
                this.sede.ciudades = response.body;
            }, function() {
                alert('Error');
            });
        },
        autoCompleteResponsableAdministrativo(responsable){

            this.$http.post('/obtenerResponsables', {
                _token: document.getElementById('csrf_token').value,
                key_search: responsable
            }).then(function(response) {
                this.responsables_admin = [];
            	response.body.forEach(
                	function(item, index) {
                        vm.responsables_admin.push(item.cn);
					}
				);
            }, function() {
                //this.responsables_admin = ['luiscarl','jordan'];
                console.log('Error');
            });
        },
        autoCompleteResponsableUsoDirecto(responsable){

            this.$http.post('/obtenerResponsables', {
                _token: document.getElementById('csrf_token').value,
                key_search: responsable
            }).then(function(response) {
            	this.responsables_uso = [];
                response.body.forEach(
                    function(item, index) {
                        vm.responsables_uso.push(item.cn);
                    }
                );
            }, function() {
                //this.responsables_uso = ['luiscarl','jordan'];
                console.log('Error');
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

