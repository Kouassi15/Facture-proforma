@extends('dashboard.layout.app')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Factures</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Editer une facture</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <a href="{{ route('facture.index') }}" class="btn btn-primary">Listes</a>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <!--  -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Editer une facture</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="{{ route('facture.update',$facture->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <!-- <div class="form-group col-md-12">
                                        <label class="
                                        
                                        _id">Client</label>
                                        <select class="form-control @error('client_id') is-invalid @enderror"
                                            id="selectRole" name="client_id" placeholder="Nom" value="{{ old('client_id')}}">
                                            <option selected disabled value>Selectionner...</option>
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" {{ $client->id ? 'selected' : '' }}>{{
                                                $client->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('client_id')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div> -->
                                    @if($facture->client->nom == "Ministere de l'environnement")
                                    <div class="row ">
                                     <div class="form-group col-md-6">
                                        <label class="editeur_id">Editeur</label>
                                        <select class="form-control @error('editeur_id') is-invalid @enderror"
                                            name="editeur_id" placeholder="Nom" value="{{ old('editeur_id')}}">
                                            <option selected disabled value>Selectionner...</option>
                                            @foreach ($editeurs as $editeur)
                                            <option value="{{ $editeur->id }}" {{ $editeur->id ? 'selected' : '' }}>{{
                                                $editeur->libelle }}</option>
                                            @endforeach
                                        </select>
                                        @error('editeur_id')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label class="numero">Numero</label>
                                        <input type="text" class="form-control @error('numero') is-invalid @enderror"
                                            name="numero" placeholder="Numero facture" value="{{ $facture->numero}}">
                                        @error('numero')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label class="objet">Objet:ligne:</label>
                                        <input type="text" class="form-control @error('objet') is-invalid @enderror"
                                            name="objet" placeholder="Objet" value="{{ $facture->objet }}">
                                        @error('objet')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label class="immatriculation">Immatriculation</label>
                                        <input type="text" class="form-control @error('immatriculation') is-invalid @enderror"
                                            name="immatriculation" placeholder="Immatriculation" value="{{ $facture->immatriculation}}">
                                        @error('immatriculation')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                     </div>

                                     <div class="form-group col-md-6">
                                        <label class="marque">Marque</label>
                                        <input type="text" class="form-control @error('marque') is-invalid @enderror"
                                            name="marque" placeholder="Marque" value="{{ $facture->marque}}">
                                        @error('marque')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                            <label class="remise">Remise</label>
                                            <input type="number"
                                                class="form-control remise @error('remise') is-invalid @enderror"
                                                name="remise" placeholder="Remise" value="{{$facture->remise}}">
                                            @error('remise')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                     </div>
                                     <div class="form-group col-md-12">
                                        <label class="date">Date</label>
                                        <input type="date" class="form-control @error('date') is-invalid @enderror"
                                            name="date" value="{{ $facture->date}}">
                                        @error('date')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                     </div>
                                    </div>
                                    @endif
                                    @if($facture->client->nom == 'Particulier')
                                    <div class="row ">
                                        <div class="form-group col-md-6">
                                            <label class="editeur_id">Editeur</label>
                                            <select class="form-control @error('editeur_id') is-invalid @enderror"
                                                name="editeur_id" placeholder="Nom" value="{{ old('editeur_id')}}">
                                                <option selected disabled value>Selectionner...</option>
                                                @foreach ($editeurs as $editeur)
                                                <option value="{{ $editeur->id }}" {{ $editeur->id ? 'selected' : '' }}>{{
                                                    $editeur->libelle }}</option>
                                                @endforeach
                                            </select>
                                            @error('editeur_id')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="objet">Objet</label>
                                            <input type="text" class="form-control @error('objet') is-invalid @enderror"
                                                name="objet" placeholder="Objet" value="{{ $facture->objet }}">
                                            @error('objet')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="immatriculation">Immatriculation</label>
                                            <input type="text" class="form-control @error('immatriculation') is-invalid @enderror"
                                                name="immatriculation" placeholder="Immatriculation" value="{{ $facture->immatriculation}}">
                                            @error('immatriculation')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="marque">Marque</label>
                                            <input type="text" class="form-control @error('marque') is-invalid @enderror"
                                                name="marque" placeholder="Marque" value="{{ $facture->marque}}">
                                            @error('marque')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                            <div class="form-group col-md-12">
                                            <label class="date">Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                name="date" value="{{ $facture->date}}">
                                            @error('date')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif
                                    @if($facture->client->nom == 'Presidence')
                                    <div class="row ">
                                        <div class="form-group col-md-6">
                                            <label class="editeur_id">Editeur</label>
                                            <select class="form-control @error('editeur_id') is-invalid @enderror"
                                                name="editeur_id" placeholder="Nom" value="{{ old('editeur_id')}}">
                                                <option selected disabled value>Selectionner...</option>
                                                @foreach ($editeurs as $editeur)
                                                <option value="{{ $editeur->id }}" {{ $editeur->id ? 'selected' : '' }}>{{
                                                    $editeur->libelle }}</option>
                                                @endforeach
                                            </select>
                                            @error('editeur_id')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="objet">Objet</label>
                                            <textarea type="text" class="form-control @error('objet') is-invalid @enderror"
                                                name="objet" placeholder="Objet" value="">{{ $facture->objet }}
                                                </textarea>
                                            @error('objet')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="immatriculation">Immatriculation</label>
                                            <input type="text" class="form-control @error('immatriculation') is-invalid @enderror"
                                                name="immatriculation" placeholder="Immatriculation" value="{{ $facture->immatriculation}}">
                                            @error('immatriculation')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="marque">Marque</label>
                                            <input type="text" class="form-control @error('marque') is-invalid @enderror"
                                                name="marque" placeholder="Marque" value="{{ $facture->marque}}">
                                            @error('marque')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="incident">Incidents</label>
                                                <textarea class="form-control @error('incident') is-invalid @enderror"
                                                    name="incident" placeholder="Incident">{{ $facture->incident }}
                                        </textarea>
                                                @error('incident')
                                                <span class="invalid-feedback mb-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="commentaire">Commentaires</label>
                                                <textarea class="form-control @error('commentaire') is-invalid @enderror"
                                                    name="commentaire" placeholder="Commentaire">{{ $facture->commentaire }}
                                        </textarea>
                                                @error('commentaire')
                                                <span class="invalid-feedback mb-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        <div class="form-group col-md-6">
                                                <label class="remise">Remise</label>
                                                <input type="number"
                                                    class="form-control remise @error('remise') is-invalid @enderror"
                                                    name="remise" placeholder="Remise" value="{{$facture->remise}}">
                                                @error('remise')
                                                <span class="invalid-feedback mb-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        <div class="form-group col-md-6">
                                            <label class="date">Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                name="date" value="{{ $facture->date}}">
                                            @error('date')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif
                                    <div class="box-body">
                                        <div class="justify-content-center m-4">
                                            @foreach ($facture->devis as $item)
                                            <div class="row border border-bottom-3 border-danger p-3 m-4 rounded-3">
                                                <div class="col-md-8 mb-3">
                                                    <label for="titre" class="form-label">{{ $item->titre }}</label>
                                                    <input type="text" class="form-control " id="titre"
                                                        placeholder="{{ $item->titre }}" name="titre[]"
                                                        value="{{ $item->titre }}">
                                                </div>
                                                <div class="col-md-1 mt-4">

                                                </div>
                                                <div class="col-md-2 mt-10"></div>
                                                <div class="col-md-1 mt-10">
                                                    <button type="button" class="btn btn-danger deleteSection"
                                                        data-id="{{ $item->id }}"
                                                        data-url="{{ route('facture.deletesection', $item->id) }}">
                                                        X
                                                    </button>
                                                </div>
                                                @foreach ($item->factureitem as $element)
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type= "hidden" name="iditem[]" value="{{ $element->id }}"/>
                                                        <label for="designation"
                                                            class="form-label fw-bold">Désignation</label>
                                                        <input type="text"
                                                            class="form-control @error('designation') is-invalid @enderror"
                                                            id="designation" placeholder="Désignation"
                                                            name="designation[]"
                                                            value="{{ old('designation') ?? $element->designation }}"
                                                            required>
                                                        @error('designation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                    <label for="quantite" class="form-label fw-bold">Quantité</label>
                                                    <input type="number"
                                                        class="form-control @error('quantite') is-invalid @enderror"
                                                        id="quantite" placeholder="Quantité" name="quantite[]"
                                                        value="{{ old('quantite') ?? $element->quantite }}" required>
                                                    @error('quantite')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="prix_unit" class="form-label fw-bold">Prix
                                                        Unitaire</label>
                                                    <input type="number"
                                                        class="form-control @error('prix_unit') is-invalid @enderror"
                                                        id="prix_unit" placeholder="Prix Unitaire" name="prix_unit[]"
                                                        value="{{ old('prix_unit') ?? $element->prix_unit}}" required>
                                                    @error('prix_unit')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                </div>
                                                <div class="col-md-1 mt-4">
                                                    <button type="button" class="btn btn-danger deleteButton"
                                                        data-id="{{ $element->id }}"
                                                        data-url="{{ route('facture.deleteitem', $element->id) }}">
                                                        <i class="bx bx-trash" aria-hidden="true">X</i>
                                                    </button>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="form-group col-md-12">
                                            <div class="box-body">
                                                <div id="devis__item"></div>
                                                <div class="d-flex justify-content-center m-4">
                                                    <div class="">
                                                        <button type="button"
                                                            class="btn btn-outline-info add__devis__btn fs-4">
                                                            Ajouter un Libelle <span
                                                                class="fa-solid fa-plus-circle"></span>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                particulierDiv.hidden = false;
                // Activer tous les éléments de la div sélectionnée
                enableAllInputs(particulierDiv);
            } else if (selectedValue === "3") {
                presidenceDiv.hidden = false;
                // Activer tous les éléments de la div sélectionnée
                enableAllInputs(presidenceDiv);
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
    function afficherFormulaire(id) {
    // Masquer tous les formulaires
    document.getElementById('ministereF').setAttribute('hidden', 'hidden');
    document.getElementById('particulierF').setAttribute('hidden', 'hidden');
    document.getElementById('presidenceF').setAttribute('hidden', 'hidden');
    
    // Afficher le formulaire spécifié
    document.getElementById(id).removeAttribute("hidden");
  }
    $(document).ready(function () {
        "use strict";
        $('.add__devis__btn').click(function () {
            addDevis();
        });

        var TitreNbre = 0;

        function addDevis() {
            var devisSection = $("#devis__item");
            TitreNbre = devisSection.find(".border-danger").length + 1;
            var uniqueId = `${TitreNbre}`;

            devisSection.append(`<div id="${uniqueId}" class="row border border-bottom-3 border-danger p-3 m-4 rounded-3">
                <div class="col-md-8 mb-3">
                    <label for="titre" class="form-label">Titre ${TitreNbre}</label>
                    <input type="text" class="form-control " id="titre" placeholder="Titre ${TitreNbre}" name="titre[]" value="">
                </div>
                <div class="col-md-1 mt-4">
                    <button type="button" class="btn btn-primary add__items__btn">
                        <i class="bx bx-plus" aria-hidden="true">Add</i>
                    </button>
                </div>
                <div class="col-md-2 mt-10"></div>
                <div class="col-md-1 mt-10">
                <button type="button" class="btn btn-danger remove__devis__btn">
                    X
                </button>
            </div>
                <div id="renovation__item"></div>
            </div>`);

            $(".remove__devis__btn").hide();

            $(`#${uniqueId} .remove__devis__btn`).show();

            $(`#${uniqueId} .add__items__btn`).click(addItems);

            $(`#${uniqueId} .remove__devis__btn`).click(function () {
                $(this).closest(".row").remove();
                TitreNbre--;
            });
            TitreNbre++;
        }

        $(document).on("click", ".remove__devis__btn", function () {
            $(this).closest(".row").remove();

            $(".remove__devis__btn").hide();

            $(".remove__devis__btn:last").show();
        });

        function addItems() {
            var closestRenovationSection = $(this).closest(".row");
            var idTitle = closestRenovationSection.attr("id");
            console.log(idTitle);

            var titreId = closestRenovationSection.find("input[name='titre[]']").val();

            var uniqueId = `renovation__item_${Date.now()}`;
            closestRenovationSection.append(`<div id="${uniqueId}" class="row">
                <div class="col-md-5">
                    <label for="designation" class="form-label fw-bold">Désignation</label>
                    <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" placeholder="Désignation" name="designation${idTitle}[]" value="{{ old('designation') }}" required>
                    @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-2">
                 <label for="quantite" class="form-label">Quantitée(s)</label>
                 <input type="number" class="form-control quantite @error('quantite') is-invalid @enderror" name="quantite${idTitle}[]" placeolder="Quantitée(s)" value="{{ old('quantite[$loop->index]') }}">
                    @error('quantite')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3">
                 <label for="prix_unit" class="form-label">Prix unitaire</label>
                 <input type="number" class="form-control prix @error('prix_unit') is-invalid @enderror" name="prix_unit${idTitle}[]" placeholder="Prix unitaire" name="prix_unit[]" value="{{ old('prix_unit[$loop->index]') }}">
                    @error('prix_unit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-1 mt-2">
                    <button type="button" class="btn btn-danger remove__item__btn">
                        <i class="bx bx-trash" aria-hidden="true">X</i>
                    </button>
                </div>
            </div>`);

            $(`#${uniqueId} .remove__item__btn`).click(function () {
                $(this).closest(".row").remove();
            });

            $("#formSubmit").submit(function (e) {
                e.preventDefault();

                const form = document.querySelector('#formSubmit');

                var devisCount = $("#devis__item .row").length;

                if (devisCount === 0) {
                    Swal.fire({
                        title: 'Erreur!',
                        text: 'Veuillez renseigner un titre et ces items svp !',
                        icon: 'error',
                    });
                } else {
                    Swal.fire({
                        title: 'Etes vous sûr de valider ce devis ?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oui',
                        cancelButtonText: 'Annuler'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let timerInterval
                            Swal.fire({
                                title: 'Chargement!',
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    form.submit();
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })


                        }
                    });
                }
            });
        }

        $(document).on('click', '.deleteSection', function () {
            var deleteSection = $(this);
            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: 'Vous ne pourrez pas annuler cette action!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    let timerInterval
                    Swal.fire({
                        title: 'Chargement!',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            window.location.href = deleteSection.data('url');
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    })

                }
            });
        });
        $(document).on('click', '.deleteButton', function () {
            var deleteButton = $(this);
            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: 'Vous ne pourrez pas annuler cette action!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    let timerInterval
                    Swal.fire({
                        title: 'Chargement!',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            window.location.href = deleteButton.data('url');
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    })
                    
                }
            });
        });
    });
</script>

@endsection