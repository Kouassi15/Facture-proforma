@extends('dashboard.layout.app')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Factures</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter une nouvelle facture</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <a href="{{ route('client.create') }}" class="btn btn-primary">Ajouter une facture</a>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <!--  -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter une nouvelle facture</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="{{ route('facture.store')}}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="client_id">Client</label>
                                        <select class="form-control @error('client_id') is-invalid @enderror"
                                            name="client_id" placeholder="Nom" value="{{ old('client_id')}}">
                                            <option selected disabled value>Selectionner...</option>
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('client_id')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="numero">Numero</label>
                                        <input type="text" class="form-control @error('numero') is-invalid @enderror"
                                            name="numero" placeholder="Numero facture" value="{{ old('numero')}}">
                                        @error('numero')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="objet">Objet</label>
                                        <input type="text" class="form-control @error('objet') is-invalid @enderror"
                                            name="objet" placeholder="Objet" value="{{ old('objet')}}">
                                        @error('objet')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="ligne">Ligne</label>
                                        <input type="text" class="form-control @error('ligne') is-invalid @enderror"
                                            name="ligne" placeholder="Ligne" value="{{ old('ligne')}}">
                                        @error('ligne')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="lieu">Lieu</label>
                                        <input type="text" class="form-control @error('lieu') is-invalid @enderror"
                                            name="lieu" placeholder="Lieu" value="{{ old('lieu')}}">
                                        @error('lieu')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                     <div class="form-group col-md-6">
                                        <label class="date">Date</label>
                                        <input type="date" class="form-control @error('date') is-invalid @enderror"
                                            name="date" value="{{ old('date')}}">
                                        @error('date')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                            <div class="form-group col-md-12">
                            <div class="box-body">
                                <div id="devis__item"></div>
                                <div class="d-flex justify-content-center m-4">
                                    <div class="">
                                        <button type="button" class="btn btn-outline-info add__devis__btn fs-4">
                                            Ajouter un Libelle <span class="fa-solid fa-plus-circle"></span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                               </div>
                               <!-- <div class="pt-4">
                               <label class="">TVA</label>
                               </div> -->
                                <!-- <div class="form-group col-md-3">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check1" name="option1" value="" >
                                   <label class="form-check-label">Oui</label>
                                   <input class="form-check-input m-3" type="checkbox" id="check1" name="option1" value="" >
                                   <label class="form-check-label">Non</label>
                                    </div> 
                                    </div>
                                    <div class="form-group col-md-3">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check1" name="option1" value="" >
                                   <label class="form-check-label">Non</label>
                                    </div> 
                                    </div> -->
                                   <!-- <div class="form-group col-md-4">
                                        <label class="designation">Designation</label>
                                        <input type="text"
                                            class="form-control @error('designation') is-invalid @enderror"
                                            name="factureitems[0][designation]" id="designation" placeholder="Designation"
                                            value="{{ old('designation')}}">
                                        @error('designation')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label class="quantite">Quantitée(s)</label>
                                        <input type="number"
                                            class="form-control quantite @error('quantite') is-invalid @enderror" name="factureitems[0][quantite]" id="quantite"
                                            placeholder="Quantitée(s)" value="{{ old('quantite')}}">
                                        @error('quantite')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="prix_unit">Prix unitaire</label>
                                        <input type="number"
                                            class="form-control prix @error('prix_unit') is-invalid @enderror"
                                            name="factureitems[0][prix_unit]" placeholder="Prix unitaire" id="prix_unit" value="{{ old('prix_unit')}}">
                                        @error('prix_unit')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div> -->

                                    <!-- <div class="form-group col-md-3">
                                        <label class="montant_total">Montant total</label>
                                        <input type="number"
                                            class="form-control montant"
                                            name="factureitems[0][montant_total]" id="montantTotal" placeholder="Montant total" readonly
                                            value="{{ old('montant_total')}}"> -->
                                        <!-- @error('montant_total')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror -->
                                    <!-- </div> -->
                                    <!-- <div class="col-md-1 mt-3">
                                        <button type="button"
                                            class="btn border-info text-info add__items__btn fs-4">Ajouter un
                                            Libelle</button>
                                    </div> -->
                                    <div id="items__facture"></div>

                                    <!-- <div class="form-group col-md-6">
                                        <label class="montant_HT">Montant HT</label>
                                        <input type="number" class="form-control montant"
                                            name="montant_HT" placeholder="Montant HT" value="{{ old('montant_HT')}}" readonly 
                                            id="montantTH"> -->
                                        <!-- @error('montant_HT')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror -->
                                    <!-- </div> -->

                                    <!-- <div class="form-group col-md-6">
                                        <label class="TVA">TVA</label>
                                        <input type="number" class="form-control TVA @error('TVA') is-invalid @enderror"
                                            name="TVA" placeholder="TVA" value="{{ old('TVA')}}">
                                        @error('TVA')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div> -->
                                    <div class="form-group col-md-12">
                                        <label class="remise">Remise</label>
                                        <input type="number" class="form-control remise @error('remise') is-invalid @enderror"
                                            name="remise" placeholder="Remise" value="{{ old('remise')}}">
                                        @error('remise')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- <div class="form-group col-md-6">
                                        <label class="montant_net">Montant net</label>
                                        <input type="number" class="form-control"
                                            name="montant_net" placeholder="Montant net" id="montantNet" value="{{ old('montant_net')}}" readonly > -->
                                        <!-- @error('montant_net')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror -->
                                    <!-- </div> -->
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
                <div class="col-md-3">
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
                
                <div class="col-md-1 mt-3">
                    <button type="button" class="btn btn-danger remove__item__btn">
                        <i class="bx bx-trash" aria-hidden="true">X</i>
                    </button>
                </div>
            </div>`);

            $(`#${uniqueId} .remove__item__btn`).click(function () {
                $(this).closest(".row").remove();
            });

            $("#formSubmit").submit(function(e) {
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

    });
</script>

@endsection