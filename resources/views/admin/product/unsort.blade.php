@extends('admin.layouts.admin')

@section('main-content')

    @include('admin.product.layouts.breadcrump')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Courses</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">S/N</th>
                                    <th scope="col" class="sort" data-sort="budget">Product Name</th>
                                    <th scope="col" class="sort" data-sort="status">Code</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>

                            <tbody class="list">
                                    @foreach($data as $data)
{{--                                        @foreach($data as $k => $d)--}}

                                            <tr>
                                                <td> {{ $loop->iteration }} </td>
                                                <td>{{ $data['products']['name'] }}</td>
                                                <td>{{ $data['products']['code'] }}</td>
                                                <td>{{ $data['products']['description'] }}</td>
                                                <td>{{ $data['locations']['name'] }}</td>
                                                <td>{{ $data['sum'] }}</td>


                                            </tr>
{{--                                        @endforeach--}}
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

