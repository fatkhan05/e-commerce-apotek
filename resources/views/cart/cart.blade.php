@extends('layouts.main')
@section('container')

<div class="container">

    <h1 class="p-3">Cart</h1>

<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:10%">No</th>
            <th style="width:20%">Kode Obat</th>
            <th style="width:40%">Nama Obat</th>
            <th style="width:10%">Harga</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>

        @php 
            $total = 0; 
        @endphp

        @php
            $no = 1;
        @endphp
         @foreach ($carts as $cart)

            @php
                $total += $cart['obat2']['harga_obat'] * $cart['amount'];
            @endphp

                <tr data-id="">
                    <td data-th="No">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="normagin">{{ $no++ }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Kode Obat">
                        <div class="row">                          
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $cart['obat2']['kode_obat'] }}</h4>
                                {{-- <h4 class="nomargin">{{ $cart->obat2->kode_obat }}</h4> --}}
                            </div>
                        </div>
                    </td>
                    <td data-th="Nama Obat">
                        <div class="row">                          
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $cart['obat2']['nama_obat'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rp.{{ $cart['obat2']['harga_obat'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $cart['amount'] }}" class="form-control quantity cart_update" min="1" />
                        {{-- <form action="{{ route('update_cart', ['cart' => $cart]) }}" method="post" class="cart-update-form">
                            @method('patch')
                            @csrf
                            <input type="number" name="amount" value="{{ $cart['amount'] }}" class="form-control quantity cart-update" min="1" />
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form> --}}
                    </td>
                    
                    <td data-th="Subtotal" class="text-center">Rp.{{ $cart['obat2']['harga_obat'] * $cart['amount'] }}</td>
                    <td class="actions" data-th="">
                        {{-- <form action="{{ route('delete_cart', ['cart' => $cart->id, 'id' => $cart->id]) }}" method="POST" class="form-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form> --}}
                    </td>
                    
                </tr>
            @endforeach
        {{-- @endif --}}
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7" class="text-right"><h3><strong>Total Rp.{{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="7" class="text-right">
                <form action="{{ route('Order') }}" method="POST">
                    <a href="{{ url('/Cart') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                    @csrf
                    <a href="{{ url('Order') }}" class="btn btn-success">Check Out</a>
                </form>
                
            </td>
        </tr>
    </tfoot>
</table>
</div>
@endsection

{{-- @section('scripts')
<script type="text/javascript">
   
    $(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>

@endsection --}}