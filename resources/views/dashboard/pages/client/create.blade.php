@extends('dashboard.layout.app')
@section('content')

 <div class="content-body">
            <div class="container-fluid ">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Clients</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter un nouveau client</a></li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <a href="{{ route('client.create') }}" class="btn btn-primary">Ajouter un client</a>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <!--  -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ajouter un nouveau client</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('client.store')}}">
                                      @csrf
                                        <div class="form-row">
                                        <div class="form-group col-md-12">
                                        <label class="typeclient_id">Client</label>
                                        <select id="selectRole"
                                            class="form-control @error('typeclient_id') is-invalid @enderror"
                                            name="typeclient_id" placeholder="Nom" value="{{ old('typeclient_id')}}">
                                            <option selected disabled value>Selectionner...</option>
                                            @foreach ($typeclients as $typeclient)
                                            <option value="{{ $typeclient->id }}">{{ $typeclient->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('client_id')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                        <div class="row col-md-12 " id="ministereF" hidden>
                                        <div class="form-group col-md-6">
                                                <label class="nom">Nom</label>
                                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Nom" value="{{ old('nom')}}">
                                            @error('nom')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                          </div>
                                            <div class="form-group col-md-6">
                                                <label class="contact">Contact</label>
                                                <input type="number" class="form-control @error('contact') is-invalid @enderror" name="contact" placeholder="Contact" value="{{ old('contact')}}">
                                                <!-- @error('contact')
                                             <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror -->
                                        </div>

                                        </div>
                                        <div class="row col-md-12" id="particulierF" hidden>
                                        <div class="form-group col-md-6">
                                                <label class="nom">Nom</label>
                                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Nom" value="{{ old('nom')}}">
                                            @error('nom')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                          </div>

                                            <div class="form-group col-md-6">
                                                <label class="prenon">Prénom</label>
                                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" placeholder="Prénom(s)" value="{{ old('prenom')}}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="contact">Contact</label>
                                                <input type="number" class="form-control @error('contact') is-invalid @enderror" name="contact" placeholder="Contact" value="{{ old('contact')}}">
                                                @error('contact')
                                             <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                           </div>
                                        </div>

                                        <div class="row col-md-12" id="presidenceF" hidden>
                                        <div class="form-group col-md-6">
                                                <label class="nom">Nom</label>
                                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Nom" value="{{ old('nom')}}">
                                            @error('nom')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                          </div>
                                        <div class="form-group col-md-6">
                                                <label class="contact">Contact</label>
                                                <input type="number" class="form-control @error('contact') is-invalid @enderror" name="contact" placeholder="Contact" value="{{ old('contact')}}">
                                                <!-- @error('contact')
                                             <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror -->
                                           </div>
                                        </div>
                                       </div>
                                        <button type="submit" class="btn btn-primary m-2">Enregistrer</button>
                                        <button type="submit" class="btn btn-danger m-2">Retour</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
<script>

        document.addEventListener("DOMContentLoaded", function () {
            var typeClientSelect = document.getElementById("selectRole");
            var ministereDiv = document.getElementById("ministereF");
            var particulierDiv = document.getElementById("particulierF");
            var presidenceDiv = document.getElementById("presidenceF");

            typeClientSelect.addEventListener("change", function () {
                var selectedValue = typeClientSelect.value;

                // Masquer toutes les divs
                ministereDiv.hidden = true;
                particulierDiv.hidden = true;
                presidenceDiv.hidden = true;

                // Désactiver tous les éléments de la div
                disableAllInputs(ministereDiv);
                disableAllInputs(particulierDiv);
                disableAllInputs(presidenceDiv);

                // Afficher la div correspondante
                if (selectedValue === "1") {
                    ministereDiv.hidden = false;
                    // Activer tous les éléments de la div sélectionnée
                    enableAllInputs(ministereDiv);

                } else if (selectedValue === "2") {
                    presidenceDiv.hidden = false;
                    // Activer tous les éléments de la div sélectionnée
                    enableAllInputs(presidenceDiv);
                }else if (selectedValue === "3") {
                    particulierDiv.hidden = false;
                    // Activer tous les éléments de la div sélectionnée
                    enableAllInputs(particulierDiv);
                } 
            });
            function disableAllInputs(container) {
                var inputs = container.getElementsByTagName("input");
                var selects = container.getElementsByTagName("select");
                var textareas = container.getElementsByTagName("textarea");
                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].disabled = true;
                }
                for (var i = 0; i < selects.length; i++) {
                    selects[i].disabled = true;
                }
                for (var i = 0; i < textareas.length; i++) {
                    textareas[i].disabled = true;
                }
            }

            // Fonction pour activer tous les éléments d'une div
            function enableAllInputs(container) {
                var inputs = container.getElementsByTagName("input");
                var selects = container.getElementsByTagName("select");
                var textareas = container.getElementsByTagName("textarea");
                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].disabled = false;
                }
                for (var i = 0; i < selects.length; i++) {
                    selects[i].disabled = false;
                }
                for (var i = 0; i < textareas.length; i++) {
                    textareas[i].disabled = false;
                }
            }
        });


</script>
@endsection