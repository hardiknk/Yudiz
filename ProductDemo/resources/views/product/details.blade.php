<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .center {
            margin: auto;
            width: 60%;
            border: 5px solid #5232e2;
            padding: 10px;
        }

    </style>
    <div class="container center">
        <div class="card">

            <img src="{{ asset('images/' . $product_data->prod_img . '') }}" style="width:50%; height:auto">
            <p style="margin-top: 25px; font-weight: 800; font-size:20px">Product Name :
                {{ $product_data->prod_name }} </p>

            <select name="color_id" id="color_id">
                <option value="0"> Select Color </option>
                @foreach ($color_data as $color_item)
                    <option value="{{ $color_item->id }} "> {{ $color_item->color_name }} </option>
                @endforeach
            </select>


            <select name="size" id="size">
                <option value="0"> Select Sizes </option>
                @foreach ($size_data as $size_item)
                    <option value="{{ $size_item->id }} "> {{ $size_item->size }} </option>
                @endforeach
            </select>

            <input class="prod_price" id="prod_price" readonly style="margin-bottom: 10px" type="text"
                name="prod_price" placeholder="Product Price">

            <input class="prod_quantity" id="prod_quantity" style="margin-bottom: 10px" type="text" name="prod_quantity"
                placeholder="Enter Quantity">
            <p><button style="margin-top:20px; " id="add_to_cart" class="custom_btn_pay">Add
                    To Cart
                </button>
            </p>


        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src=" {{ asset('js/validate.min.js') }} "></script>
    <script src=" {{ asset('js/sweetalert.min.js') }} "></script>
    <script>
        $('#color_id').on('change', function(e) {
            getProductPrice();
        });

        $('#size').on('change', function(e) {
            getProductPrice()
        });

        function getProductPrice() {
            var product_id = "{{ $product_data->id }} ";
            var color_id = $("#color_id").val();
            var size = $("#size").val();

            if (color_id == "0" || size == "0") {
                // swal("Error", "Please Select The Color", "error");
                return false;
            }
            // if (size == "0") {
            //     // swal("Error", "Plese Select The Size", "error");
            //     return false;
            // }
            $.ajax({
                type: "get",
                url: "{{ route('get_price') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: product_id,
                    color_id: color_id,
                    size: size,
                },
                success: function(response) {
                    if (response == "no_find") {
                        swal("Error", "Product Color Or Size Is Not Availbel this Product ",
                            "error");
                        $("#prod_price").val('');
                        $("#color_id").val(0);
                        $("#size").val(0);

                    } else {
                        $("#prod_price").val(response.prod_price);
                    }

                }
            });
        }
        $(document).on("click", "#add_to_cart", function() {

            let color_id = $("#color_id").val();
            let size = $("#size").val();
            let quantity_enter = $("#prod_quantity").val();
            let product_id = " {{ $product_data->id }} ";

            if (color_id == "0") {
                swal("Error", "Please Select The Color", "error");
                return false;
            }
            if (size == "0") {
                swal("Error", "Plese Select The Size", "error");
                return false;
            }
            if (quantity_enter.indexOf('.') !== -1) {
                swal("Error", "Please Enter A Valid Number To Buy", "error");
                $(this).parent().prev().children().val('');
                return false;
            }
            if (quantity_enter.trim() == "") {
                swal("Error", "Please Enter The Quantity", "error");
                return false;
            }

            // return false;
            $.ajax({
                type: "post",
                url: "{{ route('add_to_cart') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: product_id,
                    quantity_enter: quantity_enter,
                    color_id: color_id,
                    size: size,
                },
                success: function(response) {
                    if (response == "no_stock") {
                        swal("Error", "Quantity Limit Exceeded ", "error");
                    }
                    if (response == "no_add_cart") {
                        swal("Error", "Maximum Cart Limit Excedded For This Product", "error");
                    }
                    if (response == "successfully_add_to_cart") {
                        swal("Success", "Product Successfully Added To Cart", "success");
                        // let url = "{{ route('paymentView') }}";
                        // document.location.href = url;
                    }
                }
            });
        });
    </script>
</x-app-layout>
