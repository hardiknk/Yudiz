<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Float four columns side by side */
        .column {
            float: left;
            width: 25%;
            padding: 0 10px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {
            margin: 0 -5px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }

        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            text-align: center;
            background-color: #f1f1f1;
        }

        .card button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .card button:hover {
            opacity: 0.7;
        }

    </style>

    @if (Session::get('success'))
        <div class="alert alert-success {{ Session::has('success') ? 'alert-important' : '' }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">

        <div class="row">

            @foreach ($product_data as $item)
                <div class="column">
                    <div class="card">
                        <img src="{{ asset('images/' . $item->prod_img . '') }}" style="width:100%; height:auto">
                        <h1> Name : {{ $item->prod_name }}</h1>
                        {{-- <p class="price"> Price : $ {{ $item->prod_price }} </p>
                        <p class="color">Color : {{ $item->getVarient->color }} </p>
                        <p class="color"> Size : {{ $item->getVarient->size }} </p>
                        <p class="color">Brand : {{ $item->getVarient->prod_brand }} </p> --}}

                        {{-- @if ($item->items != 0 && $item->items > 0)
                            <p> <input class="prod_quantity" style="margin-bottom: 10px" type="text"
                                    name="prod_quantity" placeholder="Enter Quantity">
                            </p>
                        @endif
                        @if ($item->items == 0 || $item->items == null || $item->items < 0)
                            <p><button style="color: red">Out Of Stock </button></p>
                        @else
                            <p><button id="add_to_cart" data-id="{{ $item->id }}" class="add_to_cart">Add To Cart
                                </button>
                            </p>
                        @endif --}}
                        <p><a class="custom_btn_pay"
                                href="{{ route('product_details', ['product_id' => $item->id]) }} "
                                data-id="{{ $item->id }}">Product Details
                            </a>
                        </p>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {!! $product_data->links() !!}

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src=" {{ asset('js/validate.min.js') }} "></script>
    <script src=" {{ asset('js/sweetalert.min.js') }} "></script>

    <script>
        // $(document).on("click", "#add_to_cart", function() {
        //     let product_id = $(this).data("id");
        //     // let quantity_enter = $(this).prev().hide();
        //     let quantity_enter = $(this).parent().prev().children().val();

        //     // let quantity_enter = $(this).parent().prev().children().css({
        //     //     "color": "red",
        //     //     "border": "2px solid red"
        //     // });
        //     // let value_of_input = quantity_enter.$("p input").val();

        //     if (quantity_enter == "") {
        //         swal("Error", "Please Enter The Quantity", "error");
        //         return false;
        //     }

        //     if (quantity_enter.indexOf('.') !== -1) {
        //         swal("Error", "Please Enter A Valid Number To Buy", "error");
        //         $(this).parent().prev().children().val('');
        //         return false;
        //     }

        //     $.ajax({
        //         type: "post",
        //         url: "{{ route('add_to_cart') }}",
        //         data: {
        //             _token: "{{ csrf_token() }}",
        //             product_id: product_id,
        //             quantity_enter: quantity_enter,
        //         },
        //         success: function(response) {
        //             if (response == "no_stock") {
        //                 swal("Error", "Quantity Limit Exceeded ", "error");
        //             }
        //             if (response == "no_add_cart") {
        //                 swal("Error", "Maximum Cart Limit Excedded For This Product", "error");
        //             }
        //             if (response == "successfully_add_to_cart") {
        //                 swal("Success", "Product Successfully Added To Cart", "success");
        //                 // let url = "{{ route('paymentView') }}";
        //                 // document.location.href = url;
        //             }
        //         }
        //     });
        // });
    </script>
</x-app-layout>
