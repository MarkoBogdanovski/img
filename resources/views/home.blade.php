@extends('layouts.app')

@section('content')
        <div class="container-fluid">
            <div class="row justify-content-center">
                <h3 class="card-header w-100 text-center py-3">Upload Image</h3>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-7">
                    <div class="d-flex h-100 align-items-center">
                        <i class="las la-file-archive"></i>
                    </div>
                </div>
                <div class="col-5">
                    @include('components.upload')
                </div>
            </div>
            
            <div class="row">
                @component('components.success')

                @if(isset($images) && count($images) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="cs-p-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="all" name="select[]" id="select">
                                        </div>
                                    </th>
                                    <th class="cs-p-1">Name</th>
                                    <th class="cs-p-1">Size</th>
                                    <th class="cs-p-1">Date</th>
                                    <th class="cs-p-1">Action</th>
                                </tr>
                            </thead>

                            @foreach($images as $image)
                                <tr>
                                    <td class="cs-p-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $image['name'] }}" name="select[]" id="select">
                                        </div>
                                    </td>
                                    <td class="cs-p-1">
                                        <img src="{{ $image['url'] }}" width="100" class="mr-2"/>
                                        {{ $image['name'] }}
                                    </td>
                                    <td class="cs-p-1 align-middle">{{ $image['size'] }}</td>
                                    <td class="cs-p-1 align-middle">{{ $image['date'] }}</td>
                                    <td class="cs-p-1 align-middle">
                                        <a href="download/{{ $image['fullName'] }}" target="_blank"><i class="las la-file-download"></i></a>
                                        <a href="/delete/{{ $image['uuid'] }}"><i class="las la-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @else 
                    <p>No Images at the moment</p>
                @endif
            </div>
        </div>
@endsection

@section('script')
    <script>
        $("input:checkbox").on('click', function() {
            if($(this).val() == "all") {
                $('input:checkbox').each(function () {
                    return $(this).attr("checked", !$(this).attr('checked'));
                });
            }
            
            var arr = [];
            $('input:checkbox:checked').each(function () {
                arr.push($(this).val());
            });

            console.log(arr);
        });
    </script>
@endsection