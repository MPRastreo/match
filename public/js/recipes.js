datav = [];
let str = "";
let recipePDF = "";

(() => {
    'use strict'
    const forms = document.querySelectorAll('.validation-add-recipes')
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
            } else {
                event.preventDefault();
                form.classList.remove('was-validated');
                addRecipe();
            }
        }, false)
    });
})()

const addRecipe = () => {

    const nameMedicine = $('#txtNameMedicine').val();
    const quantity = $('#txtQuantity').val();
    const presentation = $('#sltPresent').val();
    const dose = $('#txtDose').val();
    const measure = $('#sltMeasure').val();
    const frequency = $('#txtFrequency').val();
    const frequency_when = $('#sltFrequency').val();
    const duration = $('#txtDuration').val();
    const duration_time = $('#sltLenguaje').val();

    const each = $('#txtEach').text();

    var data = {
        nameMedicine: nameMedicine,
        quantity: quantity,
        presentation: presentation,
        dose: dose,
        measure: measure,
        frequency: frequency,
        frequency_when: frequency_when,
        duration: duration,
        duration_time: duration_time
    }

    datav.push(data);

    Swal.fire({
        icon: 'success',
        title: 'Felicidades!',
        text: 'Medicamento agregado',
    });

    str = '';

    datav.forEach(element => {

        str +=
            `<tr>
            <td>
                <div class="row">
                    <div class="col-12 mb-2">${element.nameMedicine}</div>
                </div>
                <div class="row">
                    <div class="class col-12" style="font-size: 75%">${element.quantity}` + ` ` + `${element.presentation}</div>
                </div>
            </td>
            <td>
                <div class="row">
                    <div class="col-12">${element.dose}` + ` ` + `${element.measure}</div>
                </div>
            </td>
            <td>
                <div class="row">
                    <div class="col-12">${element.frequency} ` + each + ` / ` + `${element.frequency_when}` + ` x ` + `${element.duration}` + ` ` + `${element.duration_time}</div>
                </div>
            </td>
        </tr>`;
    });

    recipePDF = str;

    $('#tbTableRecipes').html(str);

    document.getElementById("formReipes").reset();
}

const printRecipe = () => {

    if (recipePDF == '') {
        Swal.fire({
            title: 'No hay medicamentos',
            text: 'No hay medicamentos registrados para esta receta',
            icon: 'warning'
        })
    } else {

        $('#tbRecetaPDF').html(recipePDF);

        Swal.fire({
            title: 'Cargando...',
            text: 'Espera un momento'
        });
        Swal.showLoading()
        var ventana = window.open('', 'PRINT');
        ventana.document.write(`<html><head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Receta</title>
                <script src="https://code.jquery.com/jquery-3.6.0.js"
                    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
                    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
                    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
                    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                    crossorigin="anonymous"></script>


                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
                    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

                <!-- Optional theme -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
                    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

                <!-- Latest compiled and minified JavaScript -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
                    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                    crossorigin="anonymous"></script>

            </head><body>`);
        ventana.document.write(document.getElementById('divExportPDF').innerHTML);
        ventana.document.write(`</body></html>`);
        ventana.document.close();
        ventana.onload = function () {
            ventana.print();
            ventana.close();
        };
        ventana.focus();
        Swal.fire(
            'Receta generada con exito',
            'Se ha generado la receta',
            'success'
        ).then(() => {
            window.location = '/recipes';
        });
    }
}


