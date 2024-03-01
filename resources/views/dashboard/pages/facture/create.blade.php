@extends('dashboard.layout.app')
@section('content')

 <div class="content-body">
            <div class="container-fluid ">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Factures</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter une nouvelle facture</a></li>
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
                                                <select class="form-control @error('client_id') is-invalid @enderror" name="client_id" placeholder="Nom" value="{{ old('client_id')}}">
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
                                                <input type="number" class="form-control @error('numero') is-invalid @enderror" name="numero" placeholder="Numero facture" value="{{ old('numero')}}">
                                            @error('numero')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="objet">Objet</label>
                                                <input type="text" class="form-control @error('objet') is-invalid @enderror" name="objet" placeholder="Ojet" value="{{ old('objet')}}">
                                                @error('objet')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="designation">Designation</label>
                                                <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder="Designation" value="{{ old('designation')}}">
                                            @error('designation')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="quantite">Quantitées</label>
                                                <input type="number" class="form-control @error('quantite') is-invalid @enderror" name="quantite" placeholder="quantitée(s)" value="{{ old('quantite')}}">
                                                @error('quantite')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="prix_unit">Prix unitaire</label>
                                                <input type="number" class="form-control @error('prix_unit') is-invalid @enderror" name="prix_unit" placeholder="Prix unitaire" value="{{ old('prix_unit')}}">
                                            @error('prix_unit')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="montant_total">Montant total</label>
                                                <input type="number" class="form-control @error('montant_total') is-invalid @enderror" name="montant_total" placeholder="Montant total" value="{{ old('montant_total')}}">
                                                @error('montant_total')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="montant_HT">Montant HT</label>
                                                <input type="number" class="form-control @error('montant_HT') is-invalid @enderror" name="montant_HT" placeholder="Montant HT" value="{{ old('montant_HT')}}">
                                            @error('montant_HT')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="TVA">TVA</label>
                                                <input type="number" class="form-control @error('TVA') is-invalid @enderror" name="TVA" placeholder="TVA" value="{{ old('TVA')}}">
                                                @error('TVA')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="remise">Remise</label>
                                                <input type="number" class="form-control @error('remise') is-invalid @enderror" name="remise" placeholder="Remise" value="{{ old('remise')}}">
                                            @error('remise')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="montant_net">Montant net</label>
                                                <input type="number" class="form-control @error('montant_net') is-invalid @enderror" name="montant_net" placeholder="Montant net" value="{{ old('montant_net')}}">
                                                @error('montant_net')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="ligne">Ligne</label>
                                                <input type="text" class="form-control @error('ligne') is-invalid @enderror" name="ligne" placeholder="Ligne" value="{{ old('ligne')}}">
                                            @error('ligne')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="lieu">Lieu</label>
                                                <input type="text" class="form-control @error('lieu') is-invalid @enderror" name="lieu" placeholder="Lieu" value="{{ old('lieu')}}">
                                                @error('lieu')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="date">Date</label>
                                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date')}}">
                                                @error('date')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <script>
    var montantInput = document.getElementById('montant_total');

    if (montantInput) {
        montantInput.addEventListener('input', function () {
            var montantTotal = parseFloat(montantInput.value);
            var montantHT = parseFloat('{{ $montant_HT ?? 0 }}'); // Définition de $montant_HT directement en JavaScript
            var prixUnit = parseFloat('{{ $prix_unit ?? 0 }}');
            var quantite = parseFloat('{{ $quantite ?? 0 }}');
            var TVA = parseFloat('{{ $TVA ?? 0 }}');
            var remise = parseFloat('{{ $remise ?? 0 }}');

            var montantNet = montantTotal / (1 + TVA / 100);
            var montantTVA = montantTotal - montantNet;
            var montantRemise = montantTotal * (remise / 100);
            var montantHTCalcule = montantNet - montantRemise;

            var montantHTAffiche = montantHTCalcule.toFixed(0) + ' FCFA';
            var montantNetAffiche = montantNet.toFixed(0) + ' FCFA';
            var montantTVAAffiche = montantTVA.toFixed(0) + ' FCFA';
            var montantRemiseAffiche = montantRemise.toFixed(0) + ' FCFA';

            document.getElementById('montant_HT').value = montantHTAffiche;
            document.getElementById('montant_net').value = montantNetAffiche;
            document.getElementById('montant_TVA').value = montantTVAAffiche;
            document.getElementById('remise').value = montantRemiseAffiche;
            document.getElementById('prix_unit').value = prixUnit.toFixed(0) + ' FCFA';
            document.getElementById('quantite').value = quantite;
        });
    }
</script>

@endsection