
let update_time = function () {
	let date = "";
	let horario = "";

	var fecha = new Date(),
		horas = fecha.getHours(),
		ampm,
		minutos = fecha.getMinutes(),
		segundos = fecha.getSeconds(),
		diaSemana = fecha.getDay(),
		diaSemanaNombre,
		dia = fecha.getDate(),
		mes = fecha.getMonth(),
		mesNombre,
		year = fecha.getFullYear();

	var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
	diaSemanaNombre = semana[diaSemana] + ",";

	var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'];
	mesNombre = meses[mes];

	if (horas >= 12) {
		horas = horas - 12;
		ampm = 'PM'
	} else {
		ampm = 'AM'
	}

	if (horas == 0) {
		horas = 12;
	}

	if (minutos < 10) {
		minutos = "0" + minutos
	}

	if (segundos < 10) {
		segundos = "0" + segundos
	}

	date = diaSemanaNombre + dia + " de " + mesNombre + " del " + year;
	horario = horas + " : " + minutos + " : " + segundos + " " + ampm;

	$(".fecha").text(date);
	$(".reloj").text(horario);

};

update_time();
var intervalo = setInterval(update_time, 1000);
