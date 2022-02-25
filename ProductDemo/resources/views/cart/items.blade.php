<x-app-layout>
    <style>
        th {
            text-align: left;
            padding: 5px;
        }

        tr {
            padding: 5px
        }

        td {
            padding: 5px;
        }

    </style>
    <link rel="stylesheet" href=" {{ asset('css/style.css') }} ">
    @if (Session::get('success'))
        <div class="alert alert-success {{ Session::has('success') ? 'alert-important' : '' }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::get('danger'))
        <div class="alert alert-danger {{ Session::has('danger') ? 'alert-important' : '' }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('danger') }}
        </div>
    @endif

    <div class="shopping-cart">


        <div class="title">
            List Of The Cart Items
        </div>

        <table class="table table table-striped table-bordered ">
            <thead>
                <tr>
                    <th>Product Name </th>
                    <th>Color </th>
                    <th>Size </th>
                    <th>Quantity </th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @php  $final_product_price = 0; @endphp
                    @if ($cart_items == '0')
                        <td>
                            <p style="color: red"> Please Add The Products In Cart</p>
                        </td>
                    @else
                        @foreach ($cart_items as $cart_item)
                            <td>{{ $cart_item->getProductData->prod_name }}</td>
                            <td>{{ $cart_item->color_name }}</td>
                            <td>{{ $cart_item->size }}</td>
                            <td> <a class="minus-btn"
                                    href=" {{ route('remove_one_product', ['id' => $cart_item->id,'product_id' => $cart_item->product_id,'color_id' => $cart_item->color_id,'size_id' => $cart_item->size_id]) }} ">
                                    <img style="display: inline" src="{{ asset('images/minus.svg') }}" alt="" />
                                </a>
                                <label for="" style="margin: 8px"> {{ $cart_item->quantity }} </label>
                                <a class="plus-btn"
                                    href="{{ route('add_one_product', ['id' => $cart_item->id,'product_id' => $cart_item->product_id,'color_id' => $cart_item->color_id,'size_id' => $cart_item->size_id]) }}  ">
                                    <img style="display: inline" src="{{ asset('images/plus.svg') }}" alt="" />
                                </a>
                            </td>
                            <td> @php $final_product_price +=  $cart_item->quantity * $cart_item->getQuanity->prod_price;  @endphp $
                                {{ $cart_item->quantity * $cart_item->getQuanity->prod_price }}
                            </td>
                            <td><a style="display: inline"
                                    href="{{ route('remove_from_cart', ['id' => $cart_item->id]) }}">
                                    Remove </a></td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4"> </td>

                    <td class="custom_btn_pay">
                        <form action="{{ route('buy_p') }}" method="POST">
                            @csrf
                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}"
                                                        data-amount=" {{ $final_product_price * 100 }} "
                                                        data-buttontext="Pay {{ $final_product_price }}" data-name=" "
                                                        data-description="Rozerpay"
                                                        data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
                                                        data-prefill.name="name" data-prefill.email="email" data-theme.color="#ff7529">
                            </script>
                        </form>
                    </td>

                </tr>
                @endif


            </tbody>
        </table>
        {{-- <div class="card-body text-center">
           
        </div> --}}
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript">
        $('.like-btn').on('click', function() {
            $(this).toggleClass('is-active');
        });
    </script>
</x-app-layout>
