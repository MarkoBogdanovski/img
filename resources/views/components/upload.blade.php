    <div class="row justify-content-center">
        {{-- enctype attribute is important if your form contains file upload --}}
        <form class="m-2" method="post" action="/" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <div class="form-file">
                    <input type="file" class="form-file-input" id="image" name="image">
                    <label class="form-file-label" for="image" aria-describedby="image">
                        <span class="form-file-text">Choose file...</span>
                        <span class="form-file-button">Browse</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary d-block mx-auto">Upload</button>
            </div>
        </form>
    </div>
    @include('components.errors')
