@extends('layouts.app')

@section('content')
        <div class="container-fluid">
            <div class="row justify-content-center">
                <h3 class="card-header w-100 text-center py-3">Upload Image</h3>
            </div>
        </div>
        <div class="container p-0 mt-3">
            <div class="row no-gutters ">
                <div class="col-7">
                    <div class="d-flex h-100 align-items-center">
                        <a href="#" id="downloadZip" data-files="" class="btn btn-light d-flex align-items-center text-decoration-none hidden">
                            <i class="las la-file-archive mr-1"></i> Download files as zip
                        </a>
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
                                            <input class="form-check-input" type="checkbox" name="select" id="checkAll">
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
                                            <input class="form-check-input" type="checkbox" value="{{ $image['uuid'] }}" id="select">
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
        $("#checkAll").on('click', function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $("input:checkbox").on('click', function() {
            var arr = [];
            $('input:checkbox:checked').not($("#checkAll")).each(function () {
                arr.push($(this).val());
            });

            $("#downloadZip").attr('data-files', JSON.stringify({ files: arr }));

            if(arr.length > 1) {
                $("#downloadZip").removeClass("hidden");
            } else {
                $("#downloadZip").addClass("hidden");
            }
        });
        
        $("#downloadZip").on('click', function() {
            var files = JSON.parse($("#downloadZip").attr('data-files'));

            $.ajax({
                type: 'POST',
                url: "zipfiles",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    files
                },
                dataType: "text",
                success: function(res) { 
                    alert("Save Complete") 
                }
            });
        })
    </script>
@endsection