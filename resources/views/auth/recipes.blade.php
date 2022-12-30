@extends('layout.layout')

@section('title')
    {{ GoogleTranslate::justTranslate('Recipes', app()->getLocale()) }}
@endsection

@section('pagetitle')
    {{ GoogleTranslate::justTranslate('Recipes', app()->getLocale()) }}
@endsection

@section('content')
    <script>
        let idioma;

        function recuperarValor() {
            idioma = $('#sltPDFLenaguaje21').val();

            window.location.href = "?idioma=" + idioma;
        }
    </script>

    @php
        if (isset($_GET['idioma'])) {
            $phpVar1 = $_GET['idioma'];
        } else {
            $phpVar1 = 'en';
        }
    @endphp

    <div class="row">
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="row mb-4">
                        </div>
                        <label id="txtEach"
                            style="display: none;">{{ GoogleTranslate::justTranslate('each', $phpVar1) }}</label>

                        <div class="input-group">

                            <span class="input-group-text"
                                {{-- style="margin: 15px 0px 0px 0px;width: 15rem; height: 2.5rem;" --}}>{{ GoogleTranslate::justTranslate('Recipe language', app()->getLocale()) }}</span>

                            <select class="form-select" aria-label="Default select example" id="sltPDFLenaguaje21"
                                {{-- style="margin: 15px 0px 0px 0px;float:left; width: 4rem; height: 2.5rem;" --}} onchange="recuperarValor();">
                                <option value="0" disabled selected>
                                    {{ GoogleTranslate::justTranslate('Select the language', app()->getLocale()) }}
                                </option>
                                <option value="en">
                                    {{ GoogleTranslate::justTranslate('English', app()->getLocale()) }}</option>
                                <option value="es">
                                    {{ GoogleTranslate::justTranslate('Spanish', app()->getLocale()) }}</option>
                                <option value="pt">
                                    {{ GoogleTranslate::justTranslate('Portugués', app()->getLocale()) }}</option>
                                <option value="zh">
                                    {{ GoogleTranslate::justTranslate('Chinese', app()->getLocale()) }}</option>
                                <option value="ja">
                                    {{ GoogleTranslate::justTranslate('Japanese', app()->getLocale()) }}</option>
                                <option value="it">
                                    {{ GoogleTranslate::justTranslate('Italian', app()->getLocale()) }}</option>
                            </select>
                        </div><br><br>
                        <form class="validation-add-recipes row g-3" id="formReipes">
                            <div class="col-md-6">
                                <label for="txtNameMedicine"
                                    class="form-label">{{ GoogleTranslate::justTranslate('Name of the medicine', app()->getLocale()) }}</label>
                                <input type="text" class="form-control" id="txtNameMedicine" required>
                            </div>
                            <div class="col-md-6">
                                <label for="txtQuantity"
                                    class="form-label">{{ GoogleTranslate::justTranslate('Quantity', app()->getLocale()) }}</label>
                                <input type="number" class="form-control" id="txtQuantity" required>
                            </div>
                            <div class="col-4">
                                <label for="txtPresentation"
                                    class="form-label">{{ GoogleTranslate::justTranslate('Presentation', app()->getLocale()) }}</label>
                                <select name="" id="sltPresent" class="form-select" required>
                                    <option value="0" disabled selected>
                                        {{ GoogleTranslate::justTranslate('Select the presentation', app()->getLocale()) }}
                                    </option>
                                    <option value="{{ GoogleTranslate::justTranslate('Tablet', $phpVar1) }}">
                                        {{ GoogleTranslate::justTranslate('Tablet', app()->getLocale()) }}
                                    </option>
                                    <option value="{{ GoogleTranslate::justTranslate('Gragea', $phpVar1) }}">
                                        {{ GoogleTranslate::justTranslate('Gragea', app()->getLocale()) }}
                                    </option>
                                    <option value="{{ GoogleTranslate::justTranslate('Pill', $phpVar1) }}">
                                        {{ GoogleTranslate::justTranslate('Pill', app()->getLocale()) }}</option>
                                    <option value="{{ GoogleTranslate::justTranslate('Drops', $phpVar1) }}">
                                        {{ GoogleTranslate::justTranslate('Drops', app()->getLocale()) }}
                                    </option>
                                    <option value="{{ GoogleTranslate::justTranslate('Syrup', $phpVar1) }}">
                                        {{ GoogleTranslate::justTranslate('Syrup', app()->getLocale()) }}
                                    </option>
                                    <option value="{{ GoogleTranslate::justTranslate('Solution', $phpVar1) }}">
                                        {{ GoogleTranslate::justTranslate('Solution', app()->getLocale()) }}
                                    </option>
                                    <option value="{{ GoogleTranslate::justTranslate('Injectable', $phpVar1) }}">
                                        {{ GoogleTranslate::justTranslate('Injectable', app()->getLocale()) }}
                                    </option>
                                    <option value="{{ GoogleTranslate::justTranslate('Vaginal Tablet', $phpVar1) }}">
                                        {{ GoogleTranslate::justTranslate('Vaginal Tablet', app()->getLocale()) }}</option>
                                    <option value="{{ GoogleTranslate::justTranslate('Vaginal Ovum', $phpVar1) }}">
                                        {{ GoogleTranslate::justTranslate('Vaginal Ovum', app()->getLocale()) }}
                                    </option>
                                    <option value="{{ GoogleTranslate::justTranslate('Capsules', $phpVar1) }}">
                                        {{ GoogleTranslate::justTranslate('Capsules', app()->getLocale()) }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="txtDose"
                                    class="form-label">{{ GoogleTranslate::justTranslate('Dose', app()->getLocale()) }}</label>
                                <input type="number" class="form-control" id="txtDose" required>
                            </div>
                            <div class="col-md-4">
                                <label for="txtMeasure"
                                    class="form-label">{{ GoogleTranslate::justTranslate('Measure', app()->getLocale()) }}</label>
                                <select id="sltMeasure" class="form-select" required>
                                    <option value="0" disabled selected>
                                        {{ GoogleTranslate::justTranslate('Select the measure', app()->getLocale()) }}
                                    </option>
                                    <option value="mg">mg</option>
                                    <option value="ml">ml</option>
                                    <option value="gr">gr</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span
                                        class="input-group-text">{{ GoogleTranslate::justTranslate('Frequency', app()->getLocale()) }}</span>
                                    <input type="text" class="form-control" id="txtFrequency"
                                        placeholder="{{ GoogleTranslate::justTranslate('Quantity', app()->getLocale()) }}"
                                        required>
                                    <select id="sltFrequency" class="form-select" required>
                                        <option value="0" disabled selected>
                                            {{ GoogleTranslate::justTranslate('Select the frequency', app()->getLocale()) }}
                                        </option>
                                        <option value="{{ GoogleTranslate::justTranslate('Hour', $phpVar1) }}">
                                            {{ GoogleTranslate::justTranslate('Hour', app()->getLocale()) }}
                                        </option>
                                        <option value="{{ GoogleTranslate::justTranslate('Day', $phpVar1) }}">
                                            {{ GoogleTranslate::justTranslate('Day', app()->getLocale()) }}
                                        </option>
                                        <option value="{{ GoogleTranslate::justTranslate('Month', $phpVar1) }}">
                                            {{ GoogleTranslate::justTranslate('Month', app()->getLocale()) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span
                                        class="input-group-text">{{ GoogleTranslate::justTranslate('Duration', app()->getLocale()) }}</span>
                                    <input type="number" class="form-control" id="txtDuration" required>
                                    <select id="sltLenguaje" class="form-select" required>
                                        <option value="" disabled selected>
                                            {{ GoogleTranslate::justTranslate('Select the duration', app()->getLocale()) }}
                                        </option>
                                        <option value="{{ GoogleTranslate::justTranslate('Hour', $phpVar1) }}">
                                            {{ GoogleTranslate::justTranslate('Hour', app()->getLocale()) }}
                                        </option>
                                        <option value="{{ GoogleTranslate::justTranslate('Day', $phpVar1) }}">
                                            {{ GoogleTranslate::justTranslate('Day', app()->getLocale()) }}
                                        </option>
                                        <option value="{{ GoogleTranslate::justTranslate('Week', $phpVar1) }}">
                                            {{ GoogleTranslate::justTranslate('Week', app()->getLocale()) }}
                                        </option>
                                        <option value="{{ GoogleTranslate::justTranslate('Month', $phpVar1) }}">
                                            {{ GoogleTranslate::justTranslate('Month', app()->getLocale()) }}
                                        </option>
                                        <option value="{{ GoogleTranslate::justTranslate('Treatment', $phpVar1) }}">
                                            {{ GoogleTranslate::justTranslate('Treatment', app()->getLocale()) }}</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <button id="btnForm" type="submit" style="display: none;"></button>
                                <button type="button" class="btn btn-primary" style="margin: 15px; float:right;"
                                    onclick="$('#btnForm').click();">
                                    {{ GoogleTranslate::justTranslate('Add', app()->getLocale()) }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="card w-100">
                            <div class="card-body pt-3">
                                <div class="d-flex w-100 h-100">
                                    <div class="tab-content w-100 h-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="personal-data" role="tabpanel"
                                            aria-labelledby="personal-data-tab" tabindex="0">
                                            <div class="row g-3">
                                                <h5 class="card-title" align="center">
                                                    {{ GoogleTranslate::justTranslate('Medications', app()->getLocale()) }}
                                                </h5>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr align="center">
                                                                <th scope="col" style="width: 33.33%">
                                                                    {{ GoogleTranslate::justTranslate('Name of the medicine', app()->getLocale()) }}
                                                                </th>
                                                                <th scope="col" style="width: 33.33%">
                                                                    {{ GoogleTranslate::justTranslate('Dose', app()->getLocale()) }}
                                                                </th>
                                                                <th scope="col" style="width: 33.33%">
                                                                    {{ GoogleTranslate::justTranslate('Frequency', app()->getLocale()) }}
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbTableRecipes" align="center">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary" style="margin: 15px; float:right;"
                                    {{-- data-bs-toggle="modal" data-bs-target="#modalRecetaPDF" --}} onclick="printRecipe();">Generar Receta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Aqui se genera el pdf --}}
    <div class="row" {{-- style="display: none;" --}}>
        <div class="col-10 mt-5 m-5" id="divExportPDF">
            <div class="row d-flex align-items-center">
                <div class="col-md-2 m-3">
                    <img src="{{ asset('img/MedicaAlfil.png') }}" alt="Medica Alfil" style="width: 22rem;">
                </div>
            </div><br>
            <div class="row">
                <div class="col-6">

                    <h5 style="font-size: 1.1rem;">
                        <b>{{ GoogleTranslate::justTranslate('Type of Attention', $phpVar1) }}:</b> Consulta General </h5>
                    <br><br>

                    <h5 style="margin-top: -3.4rem; font-size: 1rem;"><b>Type of Attention</b></h5><br><br>

                    <h5 style="margin-top: -1.5rem; font-size: 1.1rem;">
                        <b>{{ GoogleTranslate::justTranslate('Name', $phpVar1) }}:</b> Cristian Ulises</h5> <br><br>

                    <h5 style="margin-top: -3.4rem; font-size: 1rem;"><b>Name</b></h5><br><br>

                    <h5 style="margin-top: -1.5rem; font-size: 1.1rem;">
                        <b>{{ GoogleTranslate::justTranslate("Physician's name", $phpVar1) }}:</b> Roberto Alejandro
                        Salazar Fierros </h5><br><br>

                    <h5 style="margin-top: -3.4rem; font-size: 1rem;"><b>Physician's name</b></h5><br><br>
                </div>
                <div class="col-6">
                    <b>{{ GoogleTranslate::justTranslate('Date', $phpVar1) }}:</b> 13/12/2022 <br><br>

                    <h5 style="margin-top: -1rem; font-size: 1rem;"><b>Date</b></h5><br><br>

                    <h5 style="margin-top: -1.5rem; font-size: 1.1rem;">
                        <b>{{ GoogleTranslate::justTranslate('Last name', $phpVar1) }}:</b> Ortega Padron </h5><br><br>

                    <h5 style="margin-top: -3.4rem; font-size: 1rem;"><b>Last name</b></h5><br><br>
                </div>
            </div><br><br>
            <div class="row" style="background-color: #3AA6F0;" align="center">
                <div class="col-12" style="color: #FFFFFF">
                    <b>{{ GoogleTranslate::justTranslate('Observations', $phpVar1) }}</b>
                    <b> - Observations</b>
                </div>
            </div>
            <div class="row" style="border: 0.1rem solid #000;" align="center">
                <div class="col-12" id="txtObservacionesPDF">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, facilis maiores repellat
                        libero, rerum voluptates reiciendis sint sequi ut eligendi quisquam, possimus dolorem ipsa nihil
                        vero saepe ullam minus odio.</p>
                </div>
            </div><br>
            <div class="row" style="background-color: #3AA6F0;" align="center">
                <div class="col-12" style="color: #FFFFFF">
                    <b>{{ GoogleTranslate::justTranslate('Vital Signs', $phpVar1) }}</b>
                    <b> - Vital Signs</b>
                </div>
            </div><br>
            <div class="row">
                <div class="col-2">
                    <b>F.C.:</b> 11 <br>
                    <b>Peso:</b> 11 kg
                </div>
                <div class="col-2">
                    <b>F.R.:</b> 111 <br>
                    <b>Talla:</b> 111
                </div>
                <div class="col-2">
                    <b>Pulso:</b> 1111 <br>
                    <b>IMC:</b> 1111
                </div>
                <div class="col-3">
                    <b>Temperatura:</b> 35°C <br>
                </div>
                <div class="col-2">
                    <b>T/A:</b> 1111 <br>

                    <b>Sat. Ox.:</b> 1111
                </div>
            </div><br>

            <div class="row">
                <div class="col-12">
                    <b>{{ GoogleTranslate::justTranslate('Allergies', $phpVar1) }} - Allergies:</b> Lorem ipsum dolor sit
                    amet consectetur adipisicing elit. Neque quaerat mollitia
                    tenetur nam. Suscipit quis amet dignissimos! Facere placeat voluptatem in illum id. Blanditiis vero
                    perspiciatis sequi! Commodi, unde dicta.
                </div>
            </div><br>
            <div class="row">
                <div class="col-12">
                    <b>{{ GoogleTranslate::justTranslate('Pregnancy', $phpVar1) }} - Pregnancy:</b> Lorem ipsum dolor sit
                    amet consectetur, adipisicing elit. Ex, quibusdam
                    necessitatibus, dolor corrupti exercitationem dicta accusamus nostrum rem magni explicabo sapiente
                    neque, ut cumque totam quas est assumenda reprehenderit placeat!
                </div>
            </div><br>
            <div class="row">
                <div class="col-12">
                    <b>{{ GoogleTranslate::justTranslate('Symptomatology', $phpVar1) }} - Symptomatology:</b> Lorem ipsum
                    dolor sit amet consectetur, adipisicing elit. Exercitationem quam
                    laborum ducimus nisi optio harum nobis autem doloribus voluptates quia, accusantium, sed commodi
                    inventore, excepturi nihil in dolorum! Esse, dignissimos.
                </div>
            </div><br>
            <div class="row">
                <div class="col-12">
                    <b>{{ GoogleTranslate::justTranslate('Diagnosis', $phpVar1) }} - Diagnosis:</b> Lorem ipsum dolor sit
                    amet consectetur adipisicing elit. Itaque natus nostrum
                    incidunt officiis libero sapiente. Quasi tenetur est dolorem nesciunt iusto illo maiores repellat
                    enim laborum impedit! Officia, mollitia facere?
                </div>
            </div><br><br>

            <div align="center">
                <h1>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</h1><br>
            </div>

            <div class="row" align="center">
                <div class="col-12">
                    <b style="font-size: 2.8rem;">{{ GoogleTranslate::justTranslate('Recipe', $phpVar1) }}</b><b
                        style="font-size: 1.4rem;"> - Recipe</b>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div style="height: auto; margin-top: 2.5rem;">
                        <table class="table table-hover spacing8" style="font-size: large;">
                            <thead
                                style="position: sticky; top: -1px; background-color:white; border-top:1px solid #dee2e6;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 33.33%">
                                            {{ GoogleTranslate::justTranslate('Name of the medicine', $phpVar1) }}

                                            <br>

                                            <b style="font-size: 0.8rem;">Name of the medicine</b>
                                        </th>
                                        <th scope="col" style="width: 33.33%">
                                            {{ GoogleTranslate::justTranslate('Dose', $phpVar1) }}

                                            <br>

                                            <b style="font-size: 0.8rem;">Dose</b>
                                        </th>
                                        <th scope="col" style="width: 33.33%">
                                            {{ GoogleTranslate::justTranslate('Frequency', $phpVar1) }}

                                            <br>

                                            <b style="font-size: 0.8rem;">Frequency</b>
                                        </th>
                                    </tr>
                                </thead>
                            </thead>
                            <tbody id="tbRecetaPDF">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><br><br><br><br><br>

            <div align="center">
                <p>____________________________________________________________________</p>
            </div>
            <div class="row" style="text-align:center;">
                <div class="col-12">
                    <b>Nombre y cédula del médico</b>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/recipesobfus.js') }}"></script>
@endsection
