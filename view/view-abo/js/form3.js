const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,286}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	nombrepr: /^[a-zA-ZÀ-ÿ\s]{4,16}$/,
    nombrese: /^[a-zA-ZÀ-ÿ\s]{4,16}$/,
    apellidopr: /^[a-zA-ZÀ-ÿ\s]{4,16}$/,
    apellidose: /^[a-zA-ZÀ-ÿ\s]{4,16}$/,
	//password: /^.{4,20}$/, // 4 a 12 digitos.
	fecha: /^.{4,12}$/, // 4 a 12 digitos.
	pais: /^.{4,12}$/, // 4 a 12 digitos.
	dni: /^.{4,12}$/, // 4 a 12 digitos.
	genero: /^.{4,12}$/, // 4 a 12 digitos.
	tipo: /^.{4,12}$/, // 4 a 12 digitos.
	numeros: /^.{6}$/, // 6 digitos.
	especiali: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefonos: /^\d{8,14}$/, // 7 a 14 numeros.
	identidadh: /^.{4,12}$/,
	identidadc: /^[1-9]-?\d{4}-?\d{4}$/.test('1-2345-6789'),
	celulars: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos = {
	usuario: false,
	nombre: false,
	nombrepr: false,
	nombrese: false,
	apellidopr: false,
	apellidose: false,
	password: false,
	fecha: false,
	pais: false,
	dni: false,
	genero: false,
	tipo: false,
	numeros: false,
	especiali: false,
	correo: false,
	identidadh: false,
	telefonos: false,
	identidadc: false,
	celulars: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "usuario":
			validarCampo(expresiones.usuario, e.target, 'usuario');
		break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
	
        case "nombrepr":
			validarCampo(expresiones.nombrepr, e.target, 'nombrepr');
		break;
        case "nombrese":
			validarCampo(expresiones.nombrese, e.target, 'nombrese');
		break;
        case "apellidopr":
			validarCampo(expresiones.apellidopr, e.target, 'apellidopr');
		break;
        case "apellidose":
			validarCampo(expresiones.apellidose, e.target, 'apellidose');
		break;


		case "fecha":
			validarCampo(expresiones.fecha, e.target, 'fecha');
		break;
		case "pais":
			validarCampo(expresiones.pais, e.target, 'pais');
		break;
		case "identidadh":
			validarCampo(expresiones.identidadh, e.target, 'identidadh');
		break;
		case "identidadc":
			validarCampo(expresiones.identidadc, e.target, 'identidadc');
		break;
		case "genero":
			validarCampo(expresiones.genero, e.target, 'genero');
		break;
		case "tipo":
			validarCampo(expresiones.tipo, e.target, 'tipo');
		break;
		case "numeros":
			validarCampo(expresiones.numeros, e.target, 'numeros');
		break;
		case "especiali":
			validarCampo(expresiones.especiali, e.target, 'especiali');
		break;
		case "password":
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword2();
		break;
		case "password2":
			validarPassword2();
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		case "telefonos":
			validarCampo(expresiones.telefonos, e.target, 'telefonos');
		break;
		case "celulars":
			validarCampo(expresiones.celulars, e.target, 'celulars');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

