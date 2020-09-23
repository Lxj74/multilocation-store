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
                                    <th scope="col" class="sort" data-sort="budget">Course Name</th>
                                    <th scope="col" class="sort" data-sort="status">Category</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Fee(Taka)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="sort" data-sort="completion">Date Created</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

{{--                            <tbody class="list">--}}
{{--                                @if($data->count() > 0)--}}
{{--                                    @foreach($data as $data)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $loop->iteration }}</td>--}}
{{--                                        <td>{{ $data->name }}</td>--}}
{{--                                        <td>--}}
{{--                                            @foreach($data->CourseCategory as $cat)--}}
{{--                                                <span class="badge badge-default">{{$cat->category->name}}</span>--}}
{{--                                            @endforeach--}}
{{--                                        </td>--}}
{{--                                        <td class="">--}}
{{--                                            <img class="img-thumbnail" src="{{ asset('/courses/'.$data->image) }}" alt="No--}}
{{--                                            Image">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            {{$data->fee}}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($data->status == 1)--}}
{{--                                                <span class="badge badge-success">Success</span>--}}
{{--                                            @else--}}
{{--                                                <span class="badge badge-danger">Danger</span>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>{{ changeDateToReadable($data->created_at) }}</td>--}}
{{--                                        <td>--}}
{{--                                            <div class="btn-group-sm">--}}
{{--                                                <button type="button" class="btn btn-info">Edit</button>--}}
{{--                                                <a href="{{route('admin.courses.delete',[$data->id])}}" class="btn btn-danger">Delete</a>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}
{{--                                @else--}}
{{--                                <tr>--}}
{{--                                   <td colspan="7">No record found!</td>--}}
{{--                                </tr>--}}
{{--                                @endif--}}

{{--                            </tbody>--}}
                        </table>
                    </div>
                    <!-- Card footer -->
                    @if($data->count() > 0)
                        <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Modal -->
            @include('admin.courses.layouts.create-modal')

        <!-- Footer -->
        @include('admin.layouts.footers.footer')
    </div>
@endsection

@push('custom-css')
      <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
@endpush

@push('custom-script')
    <script src="{{asset('assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-specific.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
