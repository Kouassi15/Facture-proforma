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
                                    <div class="form-group col-md-12">
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
                                   <div class="row">
                                   <div class="form-group col-md-6">
                                        <label class="editeur_id">Editeur</label>
                                        <select class="form-control @error('editeur_id') is-invalid @enderror"
                                            name="editeur_id" placeholder="Nom" value="{{ old('editeur_id')}}">
                                            <option selected disabled value>Selectionner...</option>
                                            @foreach ($editeurs as $editeur)
                                            <option value="{{ $editeur->id }}">{{ $editeur->libelle }}</option>
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
                                            name="objet" placeholder="Objet" value="{{ old('objet')}}">
                                        @error('objet')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="immatriculation">Immatriculation</label>
                                        <input type="text" class="form-control @error('immatriculation') is-invalid @enderror"
                                            name="immatriculation" placeholder="Immatriculation" value="{{ old('immatriculation')}}">
                                        @error('immatriculation')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="marque">Marque</label>
                                        <input type="text" class="form-control @error('marque') is-invalid @enderror"
                                            name="marque" placeholder="Marque" value="{{ old('marque')}}">
                                        @error('marque')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="incident">Incidents</label>
                                        <textarea class="form-control @error('incident') is-invalid @enderror"
                                            name="incident" placeholder="Incident" value="{{ old('incident')}}">
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
                                            name="commentaire" placeholder="Commentaire" value="{{ old('commentaire')}}">
                                       </textarea>
                                        @error('commentaire')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
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
                                    <div class="d-flex justify-content-center m-4">
                                        <button type="button"
                                            class="btn btn-outline-info add__items__btn fs-4">Ajouter un
                                            Libelle</button>
                                    </div>
                                    </div>
                                    
                                     <div id="items__facture"></div>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>

                                    <div class="row " id="ministereF" hidden>
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
                                     <!-- <div class="form-group col-md-6">
                                        <label class="ligne">Ligne</label>
                                        <input type="text" class="form-control @error('ligne') is-invalid @enderror"
                                            name="ligne" placeholder="Ligne" value="{{ $facture->ligne }}">
                                        @error('ligne')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                     </div>

                                     <div class="form-group col-md-6">
                                        <label class="lieu">Lieu</label>
                                        <input type="text" class="form-control @error('lieu') is-invalid @enderror"
                                            name="lieu" placeholder="Lieu" value="{{ $facture->lieu}}">
                                        @error('lieu')
                                        <span class="invalid-feedback mb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                     </div> -->
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
                                    <div class="row " id="particulierF" hidden>
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
                                        <!-- <div class="form-group col-md-6">
                                            <label class="ligne">Ligne</label>
                                            <input type="text" class="form-control @error('ligne') is-invalid @enderror"
                                                name="ligne" placeholder="Ligne" value="{{ $facture->ligne }}">
                                            @error('ligne')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="lieu">Lieu</label>
                                            <input type="text" class="form-control @error('lieu') is-invalid @enderror"
                                                name="lieu" placeholder="Lieu" value="{{ $facture->lieu}}">
                                            @error('lieu')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div> -->
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
                                    <div class="row " id="presidenceF" hidden>
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
                                        <!-- <div class="form-group col-md-6">
                                            <label class="ligne">Ligne</label>
                                            <input type="text" class="form-control @error('ligne') is-invalid @enderror"
                                                name="ligne" placeholder="Ligne" value="{{ $facture->ligne }}">
                                            @error('ligne')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="lieu">Lieu</label>
                                            <input type="text" class="form-control @error('lieu') is-invalid @enderror"
                                                name="lieu" placeholder="Lieu" value="{{ $facture->lieu}}">
                                            @error('lieu')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div> -->
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
        $('.add__items__btn').click(function () {
            addItems();

            function calculateItemTotal(row) {
                var quantite = parseFloat(row.find('.quantite').val());
                var prixUnit = parseFloat(row.find('.prix_unit').val());
                var montantTotal = quantite * prixUnit;
                row.find('.montant').val(montantTotal.toFixed(2));
                calculateMontantTotal();
                calculateTotal();
            }

            //fonction calcul total
            function calculateMontantTotal() {
                var montantTotal = 0;
                $('.montant').each(function () {
                    montantTotal += parseFloat($(this).val());
                });
                $('#montantTotal').val(montantTotal.toFixed(2));
                calculateTva();
            }

            function calculateTva() {
                var montantTota = montantTH; 
                var montantTH = parseFloat($('#montantTH').val());
                var tva = parseFloat($('.TVA').val());
                var montantTva= (montantTH * tva) / 100;
                $('#tva').val(montantTva.toFixed(2));
                calculateTotal();
            }

            function calculateTotal() {
                var montantTH = parseFloat($('#montantTH').val());
                var tva = parseFloat($('#tva').val());
                var remise = parseFloat($('.remise').val());
                var montantNet = montantTH + tva - remise;
                $('#montantNet').val(montantNet.toFixed(2));
            }

            // Remove item handler
            $(document).on('click', '.remove__item__btn', function () {
                $(this).closest(".row").remove();
                calculateMontantTotal();
                calculateTotal();
            });

            // Change in quantity or price handler
            $(document).on('change', '.quantite, .prix_unit', function () {
                calculateItemTotal($(this).closest('.row'));
            });

            // Change in discount handler
            $('.remise').change(function () {
                calculateTotal();
            });
        });

        var rowIndex = 1;
        
        function addItems() {
            $('#items__facture').append(`<div class="row p-3 m-4">
                <div class="col-md-5">
                <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control @error('designation') is-invalid @enderror" name="factureitems[${rowIndex}][designation]" placeholder="Designation"  value="{{ old('designation[$loop->index]','') }}">
                    @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3">
                 <label for="quantite" class="form-label">Quantitée(s)</label>
                 <input type="number" class="form-control @error('quantite') is-invalid @enderror" name="deviitems[${rowIndex}][quantite]" placeolder="Quantitée(s)" value="{{ old('quantite[$loop->index]') }}">
                    @error('quantite')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3">
                 <label for="prix_unit" class="form-label">Prix unitaire</label>
                 <input type="number" class="form-control @error('prix_unit') is-invalid @enderror" name="deviitems[${rowIndex}][prix_unit]" placeholder="Prix unitaire" name="prix_unit[]" value="{{ old('prix_unit[$loop->index]') }}">
                    @error('prix_unit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-1 mt-4">
                    <button type="button" class="btn btn-danger remove__item__btn">
                        <i class="bx bx-trash" aria-hidden="true">X</i>
                    </button>
                </div>
            </div>`);

            rowIndex++;

            $(`.remove__item__btn`).click(function () {
                $(this).closest(".row").remove();
            });
        }

    });
</script>

@endsection