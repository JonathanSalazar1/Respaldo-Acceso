var audio_beep = new Audio('/sounds/beep.mp3');
var num_registros = 0;
var blink = true;

var intervalo = setInterval(switch_title_properties, 1000);

function switch_title_properties(){
  

    if(blink){
        $("#blink").removeClass().addClass("luz_on");        
    }else{
        $("#blink").removeClass().addClass("luz");
    }

    blink = !blink;
    
}

function check_entry() {
    let numero_empleado = $("#numero_empleado").val();
    
    let params = {
        numero_empleado: numero_empleado,
    };

    axios.post("check_entry", params).then(function (response) {
        console.log(response);
        let response_code = response.data[0];
        let response_data = response.data[1];

        if (response_code == 0) {
            $("#person_logo").attr("src", "/images/" + numero_empleado + ".jpg");

            num_registros++;
            let grado = response_data["Grado"];
            let NombreCompleto = response_data["NombreCompleto"];
            let Adscripcion = response_data["Adscripcion"];
            let h_entrada = response_data["h_entrada"];
            let h_salida = response_data["h_salida"];
            let fecha = response_data["fecha"];

            $("#table_registro tbody").append(
                "<tr>" +
                "<td>" + num_registros + "</td>" +
                "<td>" + numero_empleado + "</td>" +
                "<td>" + grado + "</td>" +
                "<td>" + NombreCompleto + "</td>" +
                "<td>" + Adscripcion + "</td>" +
                "<td>" + h_entrada + "</td>" +
                "<td>" + h_salida + "</td>" +
                "<td>" + fecha + "</td>" +
                "</tr>"
            );

        } else if (response_code == 1) {
            $("#person_logo").attr("src", "/images/person_logo.jpg");
        }

        audio_beep.play();




        //  load_grid();
    });
}


// var toastElList = [].slice.call(document.querySelectorAll('.toast'))
// var toastList = toastElList.map(function (toastEl) {
//   return new bootstrap.Toast(toastEl, option)
// });

//$("#toast").show();
// var toast = document.getElementById('liveToast')
// toast.show();