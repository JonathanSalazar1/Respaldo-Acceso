var audio_beep = new Audio('/sounds/beep.mp3');
var num_registros = 0;
var blink = true;

$(document).ready(function () {

    $('#numero_empleado').on("keypress", function (e) {
        if (e.keyCode == 13) {
            check_entry();
        }
    });

    refresh_table_registro(1);

});


function check_entry(codeqr) {

    let params;
    let numero_empleado;

    if (codeqr == null) {
        numero_empleado = $("#numero_empleado").val();



        params = {
            numero_empleado: numero_empleado,
        };
    } else {
        numero_empleado = codeqr;
        params = {
            numero_empleado: codeqr,
        };
    }

    if (isNaN(numero_empleado)) {

        Swal.fire({
            title: 'Alerta!',
            text: 'El numero de empleado debe ser un numero',
            icon: 'warning',
            position: 'center',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
        });
        return;
    }

    if (numero_empleado === "" || numero_empleado === undefined) {
        return;
    }

    axios.post("check_entry", params).then(function (response) {

      
        let response_code = response.data[0];

        if (response_code == 0) {
            let empleado = response.data[1];
            let vehiculos = response.data[2];

            $("#person_logo").attr("src", "/images/" + numero_empleado + ".jpg");

            let Grado = empleado[0]["Grado"];
            let NombreCompleto = empleado[0]["NombreCompleto"];
            let Adscripcion = empleado[0]["Adscripcion"];
            let Genero = empleado[0]["Genero"];
            let Bloque = empleado[0]["Bloque"];
            let Estatus = empleado[0]["Estatus"];
            let Institucion = empleado[0]["Institucion"];
            let Situacion = empleado[0]["Situacion"];
            let Observaciones = empleado[0]["Observaciones"];

            $("#table_informacion_personal tbody").empty().append(
                "<tr>" +
                "<td>" + numero_empleado + "</td>" +
                "<td>" + Grado + "</td>" +
                "<td>" + NombreCompleto + "</td>" +
                "<td>" + Adscripcion + "</td>" +
                "<td>" + Genero + "</td>" +
                "<td>" + Bloque + "</td>" +
                "<td>" + Estatus + "</td>" +
                "<td>" + Institucion + "</td>" +
                "<td>" + Situacion + "</td>" +
                "<td>" + Observaciones + "</td>" +
                "</tr>"
            );

            if (vehiculos.length == 0) {

                $("#table_vehiculos tbody").empty().append(
                    "<tr>" +
                    "<td colspan='5' align='center'>Usted no posee ningun vehiculo registrado a su nombre</td>" +
                    "</tr>"
                );
            } else {
                vehiculos.forEach(element => {
                    let NoPlacas = element["NoPlacas"];
                    let Marca = element["Marca"];
                    let Modelo = element["Modelo"];
                    let Color = element["Color"];
                    let Vigencia = element["Vigencia"];

                    $("#table_vehiculos tbody").empty().append(
                        "<tr>" +
                        "<td>" + NoPlacas + "</td>" +
                        "<td>" + Marca + "</td>" +
                        "<td>" + Modelo + "</td>" +
                        "<td>" + Color + "</td>" +
                        "<td>" + Vigencia + "</td>" +
                        "</tr>"
                    );
                });

                $("#alert_vehiculos").hide();
                $("#table_vehiculos").show(800);

            }


            Swal.fire({
                title: 'Registrado!',
                text: 'Usted ha sido registrado correctamente',
                icon: 'success',
                position: 'center',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
            });

            $("#numero_empleado").val("");

            refresh_table_registro(1);

        } else if (response_code == 1) {
            $("#person_logo").attr("src", "/images/fc_logo.png");
            $("#table_informacion_personal tbody").empty();
            $("#table_vehiculos tbody").empty();

            Swal.fire({
                title: 'Alerta!',
                text: 'Este numero de empleado no existe en la BD !!!',
                icon: 'warning',
                position: 'center',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
            });
        }

        if (codeqr == null)
            audio_beep.play();

    });
}

function refresh_table_registro(page) {
    let params = { "page": page };

    axios.post("refresh_table_registro", params).then(function (response) {
      
        let asistencias = response.data.data;
        let total_pages = response.data.last_page;

        $("#table_registro tbody").empty();
        let No = 0;
        asistencias.forEach(element => {
            No++;
            let NoEmp = element["NoEmp"];
            let Grado = element["Grado"];
            let NombreCompleto = element["NombreCompleto"];
            let Adscripcion = element["Adscripcion"];
            let estatus = element["estatus"];
            let h_entrada = element["h_entrada"];
            let f_entrada = element["f_entrada"];
            let h_salida = element["h_salida"];
            let f_salida = element["f_salida"];
            let placas_vehiculos = element["placas_vehiculos"];

            if (NoEmp == null)
                NoEmp = "";
            if (Grado == null)
                Grado = "";
            if (NombreCompleto == null)
                NombreCompleto = "";
            if (Adscripcion == null)
                Adscripcion = "";
            if (estatus == null)
                estatus = "";
            if (h_entrada == null)
                h_entrada = "";
            if (f_entrada == null)
                f_entrada = "";
            if (h_salida == null)
                h_salida = "";
            if (f_salida == null)
                f_salida = "";
            if (placas_vehiculos == null)
                placas_vehiculos = "";


            $("#table_registro tbody").append(
                "<tr>" +
                "<td>" + (No + ((page - 1) * 5)) + "</td>" +
                "<td>" + NoEmp + "</td>" +
                "<td>" + Grado + "</td>" +
                "<td>" + NombreCompleto + "</td>" +
                "<td>" + Adscripcion + "</td>" +
                "<td>" + estatus + "</td>" +
                "<td>" + h_entrada + "</td>" +
                "<td>" + f_entrada + "</td>" +
                "<td>" + h_salida + "</td>" +
                "<td>" + f_salida + "</td>" +
                "<td>" + placas_vehiculos + "</td>" +
                "</tr>"
            );
        });

        // Pagination
        $('.nav_pagination').bootpag({
            total: total_pages,
            page: page,
            maxVisible: 10
        }).on('page', function (event, num) {
            console.log("page " + num)
            refresh_table_registro(num);
        });
    });
}
