const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	passwo:/^[a-zA-Z0-9\_\-]{4,286}$/,
	usuario: /^[a-zA-Z0-9\_\-]{4,286}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	nombrep: /^[a-zA-ZÀ-ÿ\s]{4,16}$/, // Letras, pueden llevar acentos.
	nombres: /^[a-zA-ZÀ-ÿ\s]{4,16}$/, // Letras, pueden llevar acentos.
	apellidop: /^[a-zA-ZÀ-ÿ\s]{4,16}$/, // Letras, pueden llevar acentos.
	apellidos: /^[a-zA-ZÀ-ÿ\s]{4,16}$/, // Letras, pueden llevar acentos.
	passw: /^.{4,12}$/, // 4 a 12 digitos.
	fecha: /^.{4,12}$/, // 4 a 12 digitos.
	pais: /^.{4,12}$/, // 4 a 12 digitos.
	dni: /^.{4,12}$/, // 4 a 12 digitos.
	genero: /^.{4,12}$/, // 4 a 12 digitos.
	tipo: /^.{4,12}$/, // 4 a 12 digitos.
	numero: /^.{4,12}$/, // 4 a 12 digitos.
	especiali: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{8,14}$/, // 7 a 14 numeros.
	identidadh: /^.{4,12}$/,
	celular: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos = {
	passwo: false,
	usuario: false,
	nombre: false,
	nombrep: false,
	nombres: false,
	apellidop: false,
	apellidos: false,
	passw: false,
	fecha: false,
	pais: false,
	dni: false,
	genero: false,
	tipo: false,
	numero: false,
	especiali: false,
	correo: false,
	identidadh: false,
	telefono: false,
	celular: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "passwo":
			validarCampo(expresiones.passwo, e.target, 'passwo');
		break;
		case "usuario":
			validarCampo(expresiones.usuario, e.target, 'usuario');
		break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "nombrep":
			validarCampo(expresiones.nombrep, e.target, 'nombrep');
		break;
		case "nombres":
			validarCampo(expresiones.nombres, e.target, 'nombres');
		break;
		case "apellidop":
			validarCampo(expresiones.apellidop, e.target, 'apellidop');
		break;
		case "apellidos":
			validarCampo(expresiones.apellidos, e.target, 'apellidos');
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
		case "genero":
			validarCampo(expresiones.genero, e.target, 'genero');
		break;
		case "tipo":
			validarCampo(expresiones.tipo, e.target, 'tipo');
		break;
		case "numero":
			validarCampo(expresiones.numero, e.target, 'numero');
		break;
		case "especiali":
			validarCampo(expresiones.especiali, e.target, 'especiali');
		break;
		case "passw":
			validarCampo(expresiones.passw, e.target, 'passw');
			//validarPassword2();
		break;
		case "password2":
			validarPassword2();
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		case "telefono":
			//validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
		case "celular":
			//validarCampo(expresiones.celular, e.target, 'celular');
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


/*
inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	const terminos = document.getElementById('terminos');
	if(campos.usuario && campos.nombre && campos.password && campos.correo && campos.telefono && campos.celular && terminos.checked ){
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});*/