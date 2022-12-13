let clinicalHistory = {};
let current_fs, next_fs, previous_fs;
let opacity;
let current = 1;
let steps = $("fieldset").length;
let idFamilyM = null;
let edit = false;
const selectFMember = document.getElementById("selectFamilyM");

$(() =>
{
    const requiredCheckboxes = $('.alcoholismchk :checkbox[required]');

    const setProgressBar = (curStep) =>
    {
        let percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%");
    }

    requiredCheckboxes.change(function()
    {
        if(requiredCheckboxes.is(':checked'))
        {
            requiredCheckboxes.removeAttr('required');
        }
        else
        {
            requiredCheckboxes.attr('required', 'required');
        }
    });

    setProgressBar(current);

    $(".next").click(function ()
    {
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        next_fs.show();
        current_fs.animate({
            opacity: 0
        },
        {
            step: (now) =>
            {
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
        });
        setProgressBar(++current);
    });

    $(".previous").click(function ()
    {
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        previous_fs.show();

        current_fs.animate({
            opacity: 0
        },
        {
            step: (now) =>
            {
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    $(".submit").click(function ()
    {
        return false;
    })


    $('.bootstrap-select > button').removeClass('bs-placeholder');
    $('.bootstrap-select > button').removeClass('btn-light');
    $('.bootstrap-select > button').removeClass('btn')
    $('.bootstrap-select > button').addClass('form-control');
});

(() =>
{
    'use strict'

    const forms = document.querySelectorAll('.validation');
    const formsNonPathAnt = document.querySelectorAll('.validationNonPathAnt');
    const formsPersonalPathHis = document.querySelectorAll('.validationPersonalPathHis');

    Array.from(forms).forEach(form =>
    {
        form.addEventListener('submit', event =>
        {
            if (!form.checkValidity())
            {
                event.preventDefault()
                event.stopPropagation()
                translateAlert(translateAlertAttention, 'Attention', 'There are incorrect fields', 'warning');
            }
            else
            {
                event.preventDefault();
                if(document.getElementById('selectFamilyM').value != "")
                {
                    saveHereditaryDiseases();
                }
                else
                {
                    translateAlert(translateAlertAttention, 'Attention', 'Select a family member', 'warning');
                }
            }

            form.classList.add('was-validated')
        }, false)
    });


    Array.from(formsNonPathAnt).forEach(form =>
    {
        form.addEventListener('submit', event =>
        {
            if (!form.checkValidity())
            {
                event.preventDefault()
                event.stopPropagation()
                translateAlert(translateAlertAttention, 'Attention', 'There are incorrect fields', 'warning');
            }
            else
            {
                event.preventDefault();
                if(document.getElementById('selectFamilyM').value != "")
                {
                    saveNonPathAnt();
                }
                else
                {
                    translateAlert(translateAlertAttention, 'Attention', 'Select a family member', 'warning');
                }
            }

            form.classList.add('was-validated')
        }, false)
    });

    Array.from(formsPersonalPathHis).forEach(form =>
    {
        form.addEventListener('submit', event =>
        {
            if (!form.checkValidity())
            {
                event.preventDefault()
                event.stopPropagation()

            }
            else
            {
                event.preventDefault();
                if(document.getElementById('selectFamilyM').value != "")
                {
                    savePersonalPathHis();
                }
                else
                {
                    translateAlert(translateAlertAttention, 'Attention', 'There are incorrect fields', 'warning');
                }
            }

            form.classList.add('was-validated')
        }, false)
    });
})();

const translateAlertAttention = (title, text, alert) =>
{
    Swal.fire({
        icon: alert,
        title: title,
        text: text
    })
}

$('#modalNew').on('hidden.bs.modal', function ()
{
    $(this).find('form').trigger('reset');
    $('.selectpicker').prop('disabled', true);
    $('.selectpicker').selectpicker('refresh');
    edit = false;

    if(idFamilyM != null)
    {
        for (let i = 0; i < selectFMember.length; i++)
        {
            if (selectFMember.options[i].value == idFamilyM)
            {
                selectFMember.remove(i);
                selectFMember.disabled = false;
                selectFMember.value = "";
                idFamilyM = null;
            }
        }
    }
});

const checkStepsValidity = () =>
{
    const validityFirst = $('#formHereditaryD')[0].checkValidity();
    const validitySecond = $('#formNonPathAnt')[0].checkValidity();

    if(validityFirst)
    {
        document.getElementById('btnFirstStep').style.display = 'block';
    }
    else
    {
        document.getElementById('btnFirstStep').style.display = 'none';
    }

    if(validitySecond)
    {
        document.getElementById('btnSecondStep').style.display = 'block';
    }
    else
    {
        document.getElementById('btnSecondStep').style.display = 'none';
    }
}

const disableField = (id) =>
{
    const switchT = document.getElementById(id);
    if (switchT.checked)
    {
        document.getElementById('txt' + id.substring(6)).disabled = false;
        document.getElementById('txt' + id.substring(6)).required = true;
    }
    else
    {
        document.getElementById('txt' + id.substring(6)).disabled = true;
        document.getElementById('txt' + id.substring(6)).value = null;
        document.getElementById('txt' + id.substring(6)).required = false;
    }
    $('.selectpicker').selectpicker('refresh');
}

const validateSteps = () =>
{
    if(edit == false)
    {
        if(current == 1)
        {
            const event = new Event('submit',
            {
                'bubbles': true,
                'cancelable': true
            });
            document.querySelector('.validation').dispatchEvent(event);
        }
        else if(current == 2)
        {
            const event = new Event('submit',
            {
                'bubbles': true,
                'cancelable': true
            });
            document.querySelector('.validationNonPathAnt').dispatchEvent(event);
        }
        else
        {
            const event = new Event('submit',
            {
                'bubbles': true,
                'cancelable': true
            });
            document.querySelector('.validationPersonalPathHis').dispatchEvent(event);
        }
    }
    else
    {
        const event = new Event('submit',
        {
            'bubbles': true,
            'cancelable': true
        });
        document.querySelector('.validation').dispatchEvent(event);
        document.querySelector('.validationNonPathAnt').dispatchEvent(event);
        document.querySelector('.validationPersonalPathHis').dispatchEvent(event);
    }
}

const enableFieldsAlch = (id) =>
{
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
}

const disableFieldsAlch = (id) =>
{
    document.getElementById('txt' + id.substring(5, 15)).disabled = true;
    document.getElementById('txt' + id.substring(5, 15)).required = false;
    document.getElementById('txt' + id.substring(5, 15)).value = "";
    document.getElementById('select' + id.substring(5, 15)).disabled = true;
    document.getElementById('select' + id.substring(5, 15)).required = false;
    document.getElementById('select' + id.substring(5, 15)).value = "";
}

const enableFieldsSmok = (id) =>
{
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
}

const disableFieldsSmok = (id) =>
{
    document.getElementById('txt' + id.substring(5, 12)).disabled = true;
    document.getElementById('txt' + id.substring(5, 12)).required = false;
    document.getElementById('txt' + id.substring(5, 12)).value = "";
    document.getElementById('select' + id.substring(5, 12)).disabled = true;
    document.getElementById('select' + id.substring(5, 12)).required = false;
    document.getElementById('select' + id.substring(5, 12)).value = "";
}

const enableFieldsDrugAd = (id) =>
{
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
}

const disableFieldsDrugAd = (id) =>
{
    document.getElementById('txt' + id.substring(5, 11)).disabled = true;
    document.getElementById('txt' + id.substring(5, 11)).required = false;
    document.getElementById('txt' + id.substring(5, 11)).value = "";
    document.getElementById('select' + id.substring(5, 11)).disabled = true;
    document.getElementById('select' + id.substring(5, 11)).required = false;
    document.getElementById('select' + id.substring(5, 11)).value = "";
}

const enableFieldImm = () =>
{
    const immunizations = document.getElementById('txtImmunizations')
    immunizations.disabled = false;
    immunizations.required = true;
}

const disableFieldImm = () =>
{
    const immunizations = document.getElementById('txtImmunizations')
    immunizations.disabled = true;
    immunizations.value = "";
    immunizations.required = false;
}

const enableFieldImmCV = () =>
{
    const immunizations = document.getElementById('txtImmunizationsCV')
    immunizations.disabled = false;
    immunizations.required = true;
}

const disableFieldImmCV = () =>
{
    const immunizations = document.getElementById('txtImmunizationsCV')
    immunizations.disabled = true;
    immunizations.value = "";
    immunizations.required = false;
}

const enableFieldsAllergySF = (id) =>
{
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
    document.getElementById('tx' + id.substring(5)).disabled = false;
    document.getElementById('tx' + id.substring(5)).required = true;
}

const disableFieldsAllergySF = (id) =>
{
    document.getElementById('txt' + id.substring(5, 15)).disabled = true;
    document.getElementById('txt' + id.substring(5, 15)).required = false;
    document.getElementById('txt' + id.substring(5, 15)).value = "";
    document.getElementById('tx' + id.substring(5, 15)).disabled = true;
    document.getElementById('tx' + id.substring(5, 15)).required = false;
    document.getElementById('tx' + id.substring(5, 15)).value = "";
}

const enableFieldsDiabetes = (id) =>
{
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
}

const disableFieldsDiabetes = (id) =>
{
    document.getElementById('select' + id.substring(5, 16)).disabled = true;
    document.getElementById('select' + id.substring(5, 16)).required = false;
    document.getElementById('select' + id.substring(5, 16)).value = "";
    document.getElementById('txt' + id.substring(5, 16)).disabled = true;
    document.getElementById('txt' + id.substring(5, 16)).required = false;
    document.getElementById('txt' + id.substring(5, 16)).value = "";
}

const enableFieldsHyper = (id) =>
{
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
}

const disableFieldsHyper = (id) =>
{
    document.getElementById('select' + id.substring(5, 13)).disabled = true;
    document.getElementById('select' + id.substring(5, 13)).required = false;
    document.getElementById('select' + id.substring(5, 13)).value = "";
    document.getElementById('txt' + id.substring(5, 13)).disabled = true;
    document.getElementById('txt' + id.substring(5, 13)).required = false;
    document.getElementById('txt' + id.substring(5, 13)).value = "";
}

const enableFieldsSurg = (id) =>
{
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
    document.getElementById('tx' + id.substring(5)).disabled = false;
    document.getElementById('tx' + id.substring(5)).required = true;
}

const disableFieldsSurg = (id) =>
{
    document.getElementById('tx' + id.substring(5, 14)).disabled = true;
    document.getElementById('tx' + id.substring(5, 14)).required = false;
    document.getElementById('tx' + id.substring(5, 14)).value = "";
    document.getElementById('txt' + id.substring(5, 14)).disabled = true;
    document.getElementById('txt' + id.substring(5, 14)).required = false;
    document.getElementById('txt' + id.substring(5, 14)).value = "";
}

const enableFieldsFractures = (id) =>
{
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
    document.getElementById('tx' + id.substring(5)).disabled = false;
    document.getElementById('tx' + id.substring(5)).required = true;
}

const disableFieldsFractures = (id) =>
{
    document.getElementById('tx' + id.substring(5, 16)).disabled = true;
    document.getElementById('tx' + id.substring(5, 16)).required = false;
    document.getElementById('tx' + id.substring(5, 16)).value = "";
    document.getElementById('txt' + id.substring(5, 16)).disabled = true;
    document.getElementById('txt' + id.substring(5, 16)).required = false;
    document.getElementById('txt' + id.substring(5, 16)).value = "";
}

const enableFieldsSeizures = (id) =>
{
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
}

const disableFieldsSeizures = (id) =>
{
    document.getElementById('select' + id.substring(5, 12)).disabled = true;
    document.getElementById('select' + id.substring(5, 12)).required = false;
    document.getElementById('select' + id.substring(5, 12)).value = "";
    document.getElementById('txt' + id.substring(5, 12)).disabled = true;
    document.getElementById('txt' + id.substring(5, 12)).required = false;
    document.getElementById('txt' + id.substring(5, 12)).value = "";
}

const enableFieldsPulmonary = (id) =>
{
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
}

const disableFieldsPulmonary = (id) =>
{
    document.getElementById('select' + id.substring(5, 14)).disabled = true;
    document.getElementById('select' + id.substring(5, 14)).required = false;
    document.getElementById('select' + id.substring(5, 14)).value = "";
    document.getElementById('txt' + id.substring(5, 14)).disabled = true;
    document.getElementById('txt' + id.substring(5, 14)).required = false;
    document.getElementById('txt' + id.substring(5, 14)).value = "";
}

const enableFieldsCardiacal = (id) =>
{
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
}

const disableFieldsCardiacal = (id) =>
{
    document.getElementById('select' + id.substring(5, 12)).disabled = true;
    document.getElementById('select' + id.substring(5, 12)).required = false;
    document.getElementById('select' + id.substring(5, 12)).value = "";
    document.getElementById('txt' + id.substring(5, 12)).disabled = true;
    document.getElementById('txt' + id.substring(5, 12)).required = false;
    document.getElementById('txt' + id.substring(5, 12)).value = "";
}

const enableFieldsKidney = (id) =>
{
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
}

const disableFieldsKidney = (id) =>
{
    document.getElementById('select' + id.substring(5, 14)).disabled = true;
    document.getElementById('select' + id.substring(5, 14)).required = false;
    document.getElementById('select' + id.substring(5, 14)).value = "";
    document.getElementById('txt' + id.substring(5, 14)).disabled = true;
    document.getElementById('txt' + id.substring(5, 14)).required = false;
    document.getElementById('txt' + id.substring(5, 14)).value = "";
}

const enableFieldsPsych = (id) =>
{
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
}

const disableFieldsPsych = (id) =>
{
    document.getElementById('select' + id.substring(5, 13)).disabled = true;
    document.getElementById('select' + id.substring(5, 13)).required = false;
    document.getElementById('select' + id.substring(5, 13)).value = "";
    document.getElementById('txt' + id.substring(5, 13)).disabled = true;
    document.getElementById('txt' + id.substring(5, 13)).required = false;
    document.getElementById('txt' + id.substring(5, 13)).value = "";
}

const enableFieldsTrans = (id) =>
{
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
}

const disableFieldsTrans = (id) =>
{
    document.getElementById('select' + id.substring(5, 13)).disabled = true;
    document.getElementById('select' + id.substring(5, 13)).required = false;
    document.getElementById('select' + id.substring(5, 13)).value = "";
    document.getElementById('txt' + id.substring(5, 13)).disabled = true;
    document.getElementById('txt' + id.substring(5, 13)).required = false;
    document.getElementById('txt' + id.substring(5, 13)).value = "";
}

const enableFieldsHematic = (id) =>
{
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
}

const disableFieldsHematic = (id) =>
{
    document.getElementById('select' + id.substring(5, 13)).disabled = true;
    document.getElementById('select' + id.substring(5, 13)).required = false;
    document.getElementById('select' + id.substring(5, 13)).value = "";
    document.getElementById('txt' + id.substring(5, 13)).disabled = true;
    document.getElementById('txt' + id.substring(5, 13)).required = false;
    document.getElementById('txt' + id.substring(5, 13)).value = "";
}

const enableFieldsRheum = (id) =>
{
    document.getElementById('select' + id.substring(5)).disabled = false;
    document.getElementById('select' + id.substring(5)).required = true;
    document.getElementById('txt' + id.substring(5)).disabled = false;
    document.getElementById('txt' + id.substring(5)).required = true;
}

const disableFieldsRheum = (id) =>
{
    document.getElementById('select' + id.substring(5, 13)).disabled = true;
    document.getElementById('select' + id.substring(5, 13)).required = false;
    document.getElementById('select' + id.substring(5, 13)).value = "";
    document.getElementById('txt' + id.substring(5, 13)).disabled = true;
    document.getElementById('txt' + id.substring(5, 13)).required = false;
    document.getElementById('txt' + id.substring(5, 13)).value = "";
}

const saveHereditaryDiseases = () =>
{
    const diabetes = $('#txtDiabetesRelative').val();
    const hypertension = $('#txtHypertensionRelative').val();
    const hiv = $('#txtHIV').val();
    const cancer = $('#txtCancer').val();
    const psychiatric = $('#txtPsychiatric').val();
    const tuberculosis = $('#txtTuberculosis').val();

    const objDiabetes =
    {
        estatus: document.getElementById('switchDiabetesRelative').checked,
        relatives: diabetes
    };

    const objHypertension =
    {
        estatus: document.getElementById('switchHypertensionRelative').checked,
        relatives: hypertension
    };

    const objHIV =
    {
        estatus: document.getElementById('switchHIV').checked,
        relatives: hiv
    };

    const objCancer =
    {
        estatus: document.getElementById('switchCancer').checked,
        relatives: cancer
    };

    const objPsychiatric =
    {
        estatus: document.getElementById('switchPsychiatric').checked,
        relatives: psychiatric
    };

    const objTuberculosis =
    {
        estatus: document.getElementById('switchTuberculosis').checked,
        relatives: tuberculosis
    };

    clinicalHistory.diabetes_relatives = objDiabetes;
    clinicalHistory.hypertension_relatives = objHypertension;
    clinicalHistory.hiv_relatives = objHIV;
    clinicalHistory.cancer_relatives = objCancer;
    clinicalHistory.psychiatric_relatives = objPsychiatric;
    clinicalHistory.tuberculosis_relatives = objTuberculosis;
    clinicalHistory.familiar_id = document.getElementById('selectFamilyM').value;
    if(edit == false)
    {
        clinicalHistory.progress = 21;
    }

    let data =
    {
        clinical_history: clinicalHistory,
    };

    fetch('/clinicalHistorie/save',
    {
        method: 'POST',
        headers:
        {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        body: JSON.stringify(data)
    }).then(resp => resp.json())
    .then(data =>
    {
        if (data.result != null)
        {
            if(edit == false)
            {
                Swal.fire({
                    icon: 'success',
                    title: data.title,
                    text: data.result
                }).then(result =>
                {
                    if (result.isConfirmed)
                    {
                        $('#btnFirstStep').click();
                    }
                });
            }
        }
        else if (data.error != null)
        {
            Swal.fire({
                icon: 'error',
                title: data.title,
                text: data.text
            });
        }
    }).catch(
        error =>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: 'An error occurred, please try again'
        })
    );
}

const saveNonPathAnt = () =>
{
    if(clinicalHistory.progress != null)
    {
        const feeding = $('#txtFeeding').val();
        const water_cons = $('#txtWaterConsumption').val();
        const sleeping_time = $('#txtSleepingT').val();
        const pets = $('#txtPet').val();

        const objAlcoholism =
        {
            estatus: document.getElementById('checkAlcoholism').checked,
            quantity: $('#txtAlcoholism').val(),
            frequency: $('#selectAlcoholism').val()
        };

        const objSmoking =
        {
            estatus: document.getElementById('checkSmoking').checked,
            quantity: $('#txtSmoking').val(),
            frequency: $('#selectSmoking').val()
        };

        const objDrugAdd =
        {
            estatus: document.getElementById('checkDrugAd').checked,
            drug: $('#txtDrugAd').val(),
            last_consume: $('#selectDrugAd').val()
        };

        const objImmunizations =
        {
            completed: document.getElementById('checkImmunizations').checked,
            missing_immunization: $('#txtImmunizations').val(),
        };

        const objCovidImmunizations =
        {
            completed: document.getElementById('checkImmunizationsCV').checked,
            number_missing_immun: $('#txtImmunizationsCV').val(),
        };

        clinicalHistory.feeding = feeding;
        clinicalHistory.water_consumption = water_cons;
        clinicalHistory.sleeping_time = sleeping_time;
        clinicalHistory.pet = pets;
        clinicalHistory.alcoholism = objAlcoholism;
        clinicalHistory.smoking = objSmoking;
        clinicalHistory.drug_adict = objDrugAdd;
        clinicalHistory.immunizations = objImmunizations;
        clinicalHistory.immunizations_covid = objCovidImmunizations;
        if(edit == false)
        {
            clinicalHistory.progress = 54;
        }

        let data =
        {
            clinical_history: clinicalHistory,
        };

        fetch('/clinicalHistorie/save',
        {
            method: 'POST',
            headers:
            {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data)
        }).then(resp => resp.json())
        .then(data =>
        {
            if (data.result != null)
            {
                if(edit == false)
                {
                    Swal.fire({
                        icon: 'success',
                        title: data.title,
                        text: data.result
                    }).then((result) =>
                    {
                        if (result.isConfirmed)
                        {
                            $('#btnSecondStep').click();
                        }
                    });
                }
            }
            else if (data.error != null)
            {
                Swal.fire({
                    icon: 'error',
                    title: data.title,
                    text: data.text
                });
            }
        }).catch(
            error =>
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'An error occurred, please try again'
            })
        );

    }
    else
    {
        translateAlert(translateAlertAttention, '¡Error!', 'Complete the first section to continue', 'error');
    }
}

const savePersonalPathHis = () =>
{
    if(clinicalHistory.progress > 53)
    {
        const objAllergySuff =
        {
            estatus: document.getElementById('checkAllergyPPH').checked,
            medications: $('#txtAllergyPPH').val(),
            food: $('#txAllergyPPH').val()
        };

        const objDiabetes =
        {
            estatus: document.getElementById('checkDiabetesPPH').checked,
            diagnosis_year: $('#selectDiabetesPPH').val(),
            current_treatment: $('#txtDiabetesPPH').val()
        };

        const objHypertension =
        {
            estatus: document.getElementById('checkHyperPPH').checked,
            diagnosis_year: $('#selectHyperPPH').val(),
            current_treatment: $('#txtHyperPPH').val()
        };

        const objSurgeries =
        {
            estatus: document.getElementById('checkSurgerPPH').checked,
            motive: $('#txtSurgerPPH').val(),
            antiquity: $('#txSurgerPPH').val()
        };

        const objFractures =
        {
            estatus: document.getElementById('checkFracturePPH').checked,
            motive: $('#txtFracturePPH').val(),
            antiquity: $('#txFracturePPH').val()
        };

        const objSeizures =
        {
            estatus: document.getElementById('checkSeizPPH').checked,
            diagnosis_year: $('#selectSeizPPH').val(),
            current_treatment: $('#txtSeizPPH').val()
        };

        const objPulmonaryDiseases =
        {
            estatus: document.getElementById('checkPulmonPPH').checked,
            diagnosis_year: $('#selectPulmonPPH').val(),
            current_treatment: $('#txtPulmonPPH').val()
        };

        const objCardiacalDiseases =
        {
            estatus: document.getElementById('checkCardPPH').checked,
            diagnosis_year: $('#selectCardPPH').val(),
            current_treatment: $('#txtCardPPH').val()
        };

        const objKidneyDiseases =
        {
            estatus: document.getElementById('checkKidneyPPH').checked,
            diagnosis_year: $('#selectKidneyPPH').val(),
            current_treatment: $('#txtKidneyPPH').val()
        };

        const objPsychiatricDiseases =
        {
            estatus: document.getElementById('checkPsychPPH').checked,
            diagnosis_year: $('#selectPsychPPH').val(),
            current_treatment: $('#txtPsychPPH').val()
        };

        const objTransfusions =
        {
            estatus: document.getElementById('checkTransPPH').checked,
            post_reactions: $('#selectTransPPH').val(),
            antiquity: $('#txtTransPPH').val()
        };

        const objHematicDiseases =
        {
            estatus: document.getElementById('checkHematPPH').checked,
            diagnosis_year: $('#selectHematPPH').val(),
            current_treatment: $('#txtHematPPH').val()
        };

        const objRheumaticDiseases =
        {
            estatus: document.getElementById('checkRheumPPH').checked,
            diagnosis_year: $('#selectRheumPPH').val(),
            current_treatment: $('#txtRheumPPH').val()
        };

        clinicalHistory.allergy_sufferers = objAllergySuff;
        clinicalHistory.diabetes = objDiabetes;
        clinicalHistory.hypertension = objHypertension;
        clinicalHistory.surgeries = objSurgeries;
        clinicalHistory.fractures = objFractures;
        clinicalHistory.seizures = objSeizures;
        clinicalHistory.pulmonary_diseases = objPulmonaryDiseases;
        clinicalHistory.cardiacal_diseases = objCardiacalDiseases;
        clinicalHistory.kidney_diseases = objKidneyDiseases;
        clinicalHistory.psychiatric_diseases = objPsychiatricDiseases;
        clinicalHistory.transfusions = objTransfusions;
        clinicalHistory.hematic_diseases = objHematicDiseases;
        clinicalHistory.rheumatic_diseases = objRheumaticDiseases;
        clinicalHistory.progress = 100;

        let data =
        {
            clinical_history: clinicalHistory,
        };

        fetch('/clinicalHistorie/save',
        {
            method: 'POST',
            headers:
            {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data)
        }).then(resp => resp.json())
        .then(data  =>
        {
            if (data.result != null)
            {
                Swal.fire({
                    icon: 'success',
                    title: data.title,
                    text: data.result
                }).then((result) =>
                {
                    if (result.isConfirmed)
                    {
                        window.location = '/clinicalHistorie';
                    }
                });
            }
            else if (data.error != null)
            {
                Swal.fire({
                    icon: 'error',
                    title: data.title,
                    text: data.text
                });
            }
        }).catch(
            error =>
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'An error occurred, please try again'
            })
        );

    }
    else
    {
        translateAlert(translateAlertAttention, '¡Error!', 'Complete the first and second section to continue', 'error');
    }
}

const generateProgressBars = (family) =>
{
    const bars = [];
    family.forEach((element, i) =>
    {
        if(element.clinical_history != null)
        {
            bars[i] = new ProgressBar.Circle(`#progressBarCircle-${element._id}`,
            {
                color: '#1e68b1',
                strokeWidth: 4,
                trailWidth: 1,
                easing: 'easeInOut',
                duration: 4400,
                text:
                {
                    autoStyleContainer: true
                },
                from:
                {
                    color: '#1e68b1',
                    width: 4
                },
                to:
                {
                    color: '#0d6efd',
                    width: 4
                },
                step: (state, circle) =>
                {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    let value = Math.round(circle.value() * 100);
                    circle.setText(value + ' %');
                }
            });
            bars[i].text.style.fontFamily = '"Nunito", Helvetica, sans-serif';
            bars[i].text.style.fontSize = '0.80rem';
            bars[i].text.style.color = '#000';
            bars[i].animate(element.clinical_history.progress / 100);
        }
    });
}

const completeClinicalH = (id) =>
{
    fetch('/clinicalHistorie/getbyid/' + id,
    {
        headers:
        {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
    }).then(resp  => resp.json())
    .then(data  =>
    {
        if (data._id != null)
        {
            $('#modalNew').modal('show');
            fillDataClinicalH(data);
            clinicalHistory = data.clinical_history;
        }
        else if (data.error != null)
        {
            Swal.fire({
                icon: 'error',
                title: data.title,
                text: data.text
            });
        }
    }).catch(
        error =>{
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: 'An error occurred, please try again'
        })
        console.log(error);
    });
}

const fillDataClinicalH = ({ clinical_history, _id, name, lastname }) =>
{
    //Hereditary diseases
    const { diabetes_relatives, hypertension_relatives, hiv_relatives, cancer_relatives, psychiatric_relatives, tuberculosis_relatives } = clinical_history;
    const { feeding, water_consumption, sleeping_time, pet, alcoholism, smoking, drug_adict, immunizations, immunizations_covid } = clinical_history
    const option = document.createElement("option");

    if(JSON.stringify(diabetes_relatives.relatives) != '[]')
    {
        $('#switchDiabetesRelative').prop('checked', true);
        $('#txtDiabetesRelative').prop('disabled', false);
        $('#txtDiabetesRelative').val(diabetes_relatives.relatives);
    }

    if(JSON.stringify(hypertension_relatives.relatives) != '[]')
    {
        $('#switchHypertensionRelative').prop('checked', true);
        $('#txtHypertensionRelative').prop('disabled', false);
        $('#txtHypertensionRelative').val(hypertension_relatives.relatives);
    }

    if(JSON.stringify(hiv_relatives.relatives) != '[]')
    {
        $('#switchHIV').prop('checked', true);
        $('#txtHIV').prop('disabled', false);
        $('#txtHIV').val(hiv_relatives.relatives);
    }

    if(JSON.stringify(cancer_relatives.relatives) != '[]')
    {
        $('#switchCancer').prop('checked', true);
        $('#txtCancer').prop('disabled', false);
        $('#txtCancer').val(cancer_relatives.relatives);
    }

    if(JSON.stringify(psychiatric_relatives.relatives) != '[]')
    {
        $('#switchPsychiatric').prop('checked', true);
        $('#txtPsychiatric').prop('disabled', false);
        $('#txtPsychiatric').val(psychiatric_relatives.relatives);
    }

    if(JSON.stringify(tuberculosis_relatives.relatives) != '[]')
    {
        $('#switchTuberculosis').prop('checked', true);
        $('#txtTuberculosis').prop('disabled', false);
        $('#txtTuberculosis').val(tuberculosis_relatives.relatives);
    }

    //Non-pathological antecedents
    $('#txtFeeding').val(feeding);
    $('#txtWaterConsumption').val(water_consumption);
    $('#txtSleepingT').val(sleeping_time);
    $('#txtPet').val(pet);

    if(alcoholism)
    {
        if(alcoholism.estatus == true)
        {
            $('#checkAlcoholism').prop('checked', true);
            $('#txtAlcoholism').prop('disabled', false);
            $('#selectAlcoholism').prop('disabled', false);
            $('#selectAlcoholism').val(alcoholism.frequency);
            $('#txtAlcoholism').val(alcoholism.quantity);
        }
    }

    if(smoking)
    {
        if(smoking.estatus == true)
        {
            $('#checkSmoking').prop('checked', true);
            $('#txtSmoking').prop('disabled', false);
            $('#selectSmoking').prop('disabled', false);
            $('#selectSmoking').val(smoking.frequency);
            $('#txtSmoking').val(smoking.quantity);
        }
    }

    if(drug_adict)
    {
        if(drug_adict.estatus == true)
        {
            $('#checkDrugAd').prop('checked', true);
            $('#txtDrugAd').prop('disabled', false);
            $('#selectDrugAd').prop('disabled', false);
            $('#selectDrugAd').val(drug_adict.last_consume);
            $('#txtDrugAd').val(drug_adict.drug);
        }
    }

    if(immunizations)
    {
        if(immunizations.completed == false)
        {
            $('#checkImmunizationsI').prop('checked', true);
            $('#txtImmunizations').prop('disabled', false);
            $('#txtImmunizations').val(immunizations.missing_immunization);
        }
    }

    if(immunizations_covid)
    {
        if(immunizations_covid.completed == false)
        {
            $('#checkImmunizationsICV').prop('checked', true);
            $('#txtImmunizationsCV').prop('disabled', false);
            $('#txtImmunizationsCV').val(immunizations_covid.number_missing_immun);
        }
    }

    // Personal pathological history
    // if(allergy_sufferers.estatus == true)
    // {
    //     $('#checkAllergyPPH').prop('checked', true);
    //     $('#txtAllergyPPH').prop('disabled', false);
    //     $('#txAllergyPPH').prop('disabled', false);
    //     $('#txtAllergyPPH').val(allergy_sufferers.allergy_sufferes);
    //     $('#txAllergyPPH').val(allergy_sufferers.food);
    // }

    option.text = name + ' ' + lastname;
    option.value = _id;
    selectFMember.add(option);
    selectFMember.value = _id;
    selectFMember.disabled = true;
    idFamilyM = _id;

    $('.selectpicker').selectpicker('refresh');
}

const openInfoClinicalH = _id =>
{
    fetch('/clinicalHistorie/getbyid/' + _id,
    {
        headers:
        {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
    }).then(resp => resp.json())
    .then(data =>
    {
        if (data._id != null)
        {
            $('#modalNew').modal('show');
            fillDataClinicalHEdit(data);
            clinicalHistory = data.clinical_history;
            edit = true;
        }
        else if (data.error != null)
        {
            Swal.fire({
                icon: 'error',
                title: data.title,
                text: data.text
            });
        }
    }).catch(
        error =>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: 'An error occurred, please try again'
        })
    );
}

const fillDataClinicalHEdit = ({ clinical_history, _id, name, lastname }) =>
{
    //Hereditary diseases
    const { diabetes_relatives, hypertension_relatives, hiv_relatives, cancer_relatives, psychiatric_relatives, tuberculosis_relatives } = clinical_history;
    const { feeding, water_consumption, sleeping_time, pet, alcoholism, smoking, drug_adict, immunizations, immunizations_covid } = clinical_history
    const option = document.createElement("option");

    if(JSON.stringify(diabetes_relatives.relatives) != '[]')
    {
        $('#switchDiabetesRelative').prop('checked', true);
        $('#txtDiabetesRelative').prop('disabled', false);
        $('#txtDiabetesRelative').val(diabetes_relatives.relatives);
    }

    if(JSON.stringify(hypertension_relatives.relatives) != '[]')
    {
        $('#switchHypertensionRelative').prop('checked', true);
        $('#txtHypertensionRelative').prop('disabled', false);
        $('#txtHypertensionRelative').val(hypertension_relatives.relatives);
    }

    if(JSON.stringify(hiv_relatives.relatives) != '[]')
    {
        $('#switchHIV').prop('checked', true);
        $('#txtHIV').prop('disabled', false);
        $('#txtHIV').val(hiv_relatives.relatives);
    }

    if(JSON.stringify(cancer_relatives.relatives) != '[]')
    {
        $('#switchCancer').prop('checked', true);
        $('#txtCancer').prop('disabled', false);
        $('#txtCancer').val(cancer_relatives.relatives);
    }

    if(JSON.stringify(psychiatric_relatives.relatives) != '[]')
    {
        $('#switchPsychiatric').prop('checked', true);
        $('#txtPsychiatric').prop('disabled', false);
        $('#txtPsychiatric').val(psychiatric_relatives.relatives);
    }

    if(JSON.stringify(tuberculosis_relatives.relatives) != '[]')
    {
        $('#switchTuberculosis').prop('checked', true);
        $('#txtTuberculosis').prop('disabled', false);
        $('#txtTuberculosis').val(tuberculosis_relatives.relatives);
    }

    //Non-pathological antecedents
    $('#txtFeeding').val(feeding);
    $('#txtWaterConsumption').val(water_consumption);
    $('#txtSleepingT').val(sleeping_time);
    $('#txtPet').val(pet);

    if(alcoholism)
    {
        if(alcoholism.estatus == true)
        {
            $('#checkAlcoholism').prop('checked', true);
            $('#txtAlcoholism').prop('disabled', false);
            $('#selectAlcoholism').prop('disabled', false);
            $('#selectAlcoholism').val(alcoholism.frequency);
            $('#txtAlcoholism').val(alcoholism.quantity);
        }
    }

    if(smoking)
    {
        if(smoking.estatus == true)
        {
            $('#checkSmoking').prop('checked', true);
            $('#txtSmoking').prop('disabled', false);
            $('#selectSmoking').prop('disabled', false);
            $('#selectSmoking').val(smoking.frequency);
            $('#txtSmoking').val(smoking.quantity);
        }
    }

    if(drug_adict)
    {
        if(drug_adict.estatus == true)
        {
            $('#checkDrugAd').prop('checked', true);
            $('#txtDrugAd').prop('disabled', false);
            $('#selectDrugAd').prop('disabled', false);
            $('#selectDrugAd').val(drug_adict.last_consume);
            $('#txtDrugAd').val(drug_adict.drug);
        }
    }

    if(immunizations)
    {
        if(immunizations.completed == false)
        {
            $('#checkImmunizationsI').prop('checked', true);
            $('#txtImmunizations').prop('disabled', false);
            $('#txtImmunizations').val(immunizations.missing_immunization);
        }
    }

    if(immunizations_covid)
    {
        if(immunizations_covid.completed == false)
        {
            $('#checkImmunizationsICV').prop('checked', true);
            $('#txtImmunizationsCV').prop('disabled', false);
            $('#txtImmunizationsCV').val(immunizations_covid.number_missing_immun);
        }
    }

    // Personal pathological history
    // if(allergy_sufferers.estatus == true)
    // {
    //     $('#checkAllergyPPH').prop('checked', true);
    //     $('#txtAllergyPPH').prop('disabled', false);
    //     $('#txAllergyPPH').prop('disabled', false);
    //     $('#txtAllergyPPH').val(allergy_sufferers.allergy_sufferes);
    //     $('#txAllergyPPH').val(allergy_sufferers.food);
    // }

    option.text = name + ' ' + lastname;
    option.value = _id;
    selectFMember.add(option);
    selectFMember.value = _id;
    selectFMember.disabled = true;
    idFamilyM = _id;

    $('.selectpicker').selectpicker('refresh');
}

const translateAlert = (callback, title, text, alert) =>
{
    const dataJSON =
    {
        "title": title,
        "text": text
    }
    let titleNewAlert;
    let textNewAlert;

    fetch('/translate/alerts',
    {
        method: 'POST',
        headers:
        {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        body: JSON.stringify(dataJSON)
    }).then(resp => resp.json())
    .then(data =>
    {
        if (data.title != null)
        {
            titleNewAlert = data.title;
            textNewAlert = data.text;
        }
        else if (data.error != null)
        {
            titleNewAlert = dataJSON.title;
            textNewAlert = dataJSON.text;
        }
        callback(titleNewAlert, textNewAlert, alert);
    }).catch(error =>
    {
        titleNewAlert = dataJSON.title;
        textNewAlert = dataJSON.text;
        callback(titleNewAlert, textNewAlert, alert);
    });
}
