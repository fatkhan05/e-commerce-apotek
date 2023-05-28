@extends('layouts.main')
@section('container')

<h1 class="p-3">Cart</h1>
    
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
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

         @foreach ($carts as $cart)
         {{-- @dd($cart); --}}

            @php
                $total += $cart['obat2']['harga_obat'] * $cart['amount'];
            @endphp

                <tr data-id="">
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
                    </td>
                    <td data-th="Subtotal" class="text-center">Rp.{{ $cart['obat2']['harga_obat'] * $cart['amount'] }}</td>
                    <td class="actions" data-th="">
                        {{-- <form action="{{ route('delete_cart') }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                    </form>
                    </td>
                </tr>
            @endforeach
        {{-- @endif --}}
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total Rp.{{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/Cart') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                <a href="{{ url('/Order') }}" class="btn btn-success">Check Out</a>
            </td>
        </tr>
    </tfoot>
</table>
@endsection
   
@section('scripts')
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

@endsection