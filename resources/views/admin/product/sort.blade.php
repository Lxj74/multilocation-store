@extends('admin.layouts.admin')

@section('main-content')

    @include('admin.product.layouts.breadcrump')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Products</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">

                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="budget">S/N</th>
                                    <th scope="col" class="sort" data-sort="budget">Product Name</th>
                                    <th scope="col" class="sort" data-sort="status">Code</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>

                            <tbody class="list">
                                    @foreach($data as $key => $product)
                                             @php
                                                $sum=0;
                                             @endphp
                                            @foreach($product as $product)
                                                <tr>
                                                    <td> {{ $loop->iteration }}  </td>
                                                    <td>{{ $product['products']['name'] }}</td>
                                                    <td>{{ $product['products']['code'] }}</td>
                                                    <td>{{ $product['products']['description'] }}</td>
                                                    <td>{{ $product['locations']['name'] }}</td>
                                                    <td>{{ $product['sum'] }}</td>
                                                </tr>
                                                @php
                                                  $sum = $sum + $product['sum'];
                                                @endphp

                                            @endforeach
                                             <tr class="bg-dark text-light">
                                                 <td colspan="3">{{ $key }}</td>
                                                 <td class="text-right" colspan="3"> <h4 class="font-weight-bold
                                                 text-light">{{$sum}}</h></td>
                                             </tr>
                                   @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Modal -->

        <!-- Footer -->
        @include('admin.layouts.footers.footer')
    </div>
@endsection

