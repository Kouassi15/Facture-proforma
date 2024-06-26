@extends('dashboard.layout.app')
@section('content')



<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Créer un devis</h4>
                <div class="page-title-right">
                    <div class="mt-2 mt-md-0">
                        {{-- <a href="{{route('project.create')}}" type="button"
                            class="btn btn-danger me-4 mb-2 mb-md-0" data-bs-toggle="modal"
                            data-bs-target="#event-modal">
                            <i class="uil-plus me-1"></i> Créer un projet
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Créer un nouveau devis</h4>

                    <form class="needs-validation" name="event-form" id="form-event" action=""
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-3 header-title mt-0">Informations Devis</h4>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <input class="form-control" placeholder="Description" type="text"
                                                        name="deviitems[0][libelle]" required />
                                                    <div class="invalid-feedback">Description requis</div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="mb-3">
                                                    <label class="form-label">Quantité</label>
                                                    <input class="form-control quantite" type="number" name="deviitems[0][quantity]" value="1"
                                                        required />
                                                    <div class="invalid-feedback">Quantité requis</div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-3">
                                                    <label class="form-label">Prix unitaire</label>
                                                    <input class="form-control prix" placeholder="Prix unitaire" type="text"
                                                        name="deviitems[0][price_unit]" required />
                                                    <div class="invalid-feedback">Prix unitaire requis</div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-3">
                                                    <label class="form-label">Prix total</label>
                                                    <input class="form-control montant" placeholder="Prix total" type="text"
                                                        name="deviitems[0][price]" required />
                                                    <div class="invalid-feedback">Prix total requis</div>
                                                </div>
                                            </div>
                                            <div class="col-1 mt-3">
                                                <button type="button" class="btn border-info text-info add__items__btn fs-4"><i class='uil-plus-circle'></i></button>
                                            </div>
                                        </div>
                                        <div id="items__enfant"></div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-3 header-title mt-0">Client</h4>
                                        <div class="row">
                                            <div class="col-12 justify-content-center text-center">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label mb-0">Selectionner un client</label>
                                                            <select class="form-select custumer-select" name="custumer_id" required>
                                                                <option selected value="" data-value="0">Client</option>
                                                                <!-- @foreach ($custumers as $custumer)
                                                                <option value="{{ $custumer->id }}" data-value="{{ $custumer->name }}">
                                                                    {{ $custumer->name }}
                                                                </option>
                                                                @endforeach -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-3 header-title mt-0">Sous total</h4>
                                        <div class="row">
                                            <div class="col-12 justify-content-center text-center">
                                                <div class="mb-3">
                                                    <input type="number" name="sub_price" class="form-control"
                                                        id="subtotal" placeholder="Sous Total" readonly value="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-3 header-title mt-0">Taxe</h4>

                                        <div class="row">
                                            <div class="col-12 justify-content-center text-center">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label mb-0">Selectionner une taxe</label>
                                                            <select class="form-select taxe-select" name="taxe_id">
                                                                <option selected value="" data-value="0">Taxe</option>
                                                                <!-- @foreach ($taxes as $taxe)
                                                                    <option value="{{ $taxe->id }}" data-value="{{ $taxe->value }}">
                                                                        {{ $taxe->libelle }}
                                                                    </option>
                                                                @endforeach -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="form-label">Montant</label>
                                                            <input type="number" class="form-control taxe" id="taxe"
                                                                placeholder="" disabled placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-3 header-title mt-0">Remise</h4>
                                        <div class="row">
                                            <div class="col-12 justify-content-center text-center">
                                                <div class="mb-3">
                                                    <input type="number" class="form-control remise" value="0"
                                                        placeholder="" name="discount">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-3 header-title mt-0">Montant total</h4>
                                        <div class="row">
                                            <div class="col-12 justify-content-center text-center">
                                                <div class="mb-3">
                                                    <input type="number" class="form-control" name="price_total"
                                                        id="total" placeholder="Montant Total" readonly value="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-3 header-title mt-0">Montant total en lettre</h4>
                                        <div class="row">
                                            <div class="col-12 justify-content-center text-center">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" placeholder="Montant total en lettre" required name="montant_lettre">
                                                </div>
                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            {{-- <div class="col-6">
                                <button type="submit" class="btn btn-success" id="btn-save-event">Enregistrer</button>
                            </div> --}}
                            <div class="col-6 text-end">
                                <button type="submit" class="btn btn-success" id="btn-save-event">Enregistrer</button>
                                <a href="{{route('devi.index')}}" type="button" class="btn btn-danger"
                                    id="btn-delete-event">Retour</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <!-- end row -->

</div> <!-- container -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        "use strict";

        // Function to calculate total price of an item
        function calculateItemTotal(row) {
            var quantity = parseFloat(row.find('.quantite').val());
            var priceUnit = parseFloat(row.find('.prix').val());
            var itemTotal = quantity * priceUnit;
            row.find('.montant').val(itemTotal.toFixed(2));
            calculateSubTotal();
            calculateTotal();
        }

        // Function to calculate subtotal
        function calculateSubTotal() {
            var subTotal = 0;
            $('.montant').each(function () {
                subTotal += parseFloat($(this).val());
            });
            $('#subtotal').val(subTotal.toFixed(2));
            calculateTax();
        }

        // Function to calculate tax amount
        function calculateTax() {
            var subTotal = parseFloat($('#subtotal').val());
            var taxPercentage = parseFloat($('.taxe-select option:selected').data('value'));
            var taxAmount = (subTotal * taxPercentage) / 100;
            $('#taxe').val(taxAmount.toFixed(2));
            calculateTotal();
        }

        // Function to calculate total including tax and discount
        function calculateTotal() {
            var subTotal = parseFloat($('#subtotal').val());
            var tax = parseFloat($('#taxe').val());
            var discount = parseFloat($('.remise').val());
            var total = subTotal + tax - discount;
            $('#total').val(total.toFixed(2));
        }

        // Add item handler
        $('.add__items__btn').click(function () {
            addItems();
        });

        // Remove item handler
        $(document).on('click', '.remove__item__btn', function () {
            $(this).closest(".row").remove();
            calculateSubTotal();
            calculateTotal();
        });

        // Change in quantity or price handler
        $(document).on('change', '.quantite, .prix', function () {
            calculateItemTotal($(this).closest('.row'));
        });

        // Change in tax handler
        $('.taxe-select').change(function () {
            calculateTax();
        });

        // Change in discount handler
        $('.remise').change(function () {
            calculateTotal();
        });

        // Add item function
        var rowIndex = 1;

        function addItems() {
            $('#items__enfant').append(`<div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input class="form-control" placeholder="Description" type="text" name="deviitems[${rowIndex}][libelle]" required />
                        <div class="invalid-feedback">Description requis</div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="mb-3">
                        <label class="form-label">Quantité</label>
                        <input class="form-control quantite" type="number" name="deviitems[${rowIndex}][quantity]" value="1" required />
                        <div class="invalid-feedback">Quantité requis</div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="mb-3">
                        <label class="form-label">Prix unitaire</label>
                        <input class="form-control prix" placeholder="Prix unitaire" type="text" name="deviitems[${rowIndex}][price_unit]" required />
                        <div class="invalid-feedback">Prix unitaire requis</div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="mb-3">
                        <label class="form-label">Prix total</label>
                        <input class="form-control montant" placeholder="Prix total" type="text" name="deviitems[${rowIndex}][price]" required />
                        <div class="invalid-feedback">Prix total requis</div>
                    </div>
                </div>
                <div class="col-1 mt-3">
                    <button type="button" class="btn border-danger text-danger remove__item__btn fs-4">
                        <i class="uil uil-trash"></i>
                    </button>
                </div>
            </div>`);

            rowIndex++;
        }
      
    });
</script>



@endsection