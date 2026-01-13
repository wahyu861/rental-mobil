<x-back-layout title="Add Images Gallery">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-car"></i>
            </span> Add Images Gallery
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cars.index') }}">Car Managements</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Images Gallery</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Car Image Gallery</h4>
                </div>
                <div class="card-body">
                    @if ($car->galleries->isNotEmpty())
                        <div class="row">
                            @foreach ($car->galleries as $gallery)
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="Car Image"
                                            class="card-img-top" style="height: 200px; object-fit: cover;">
                                        <div class="card-body text-center">
                                            <form action="{{ route('cars.removeImage') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="imageId" value="{{ $gallery->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="mdi mdi-delete-variant"></i> Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <label>Drag and Drop Multiple Images (JPG, JPEG, PNG, .webp)</label>
                            <form action="{{ route('cars.uploadImages', ['car_id' => $car->id]) }}" method="POST"
                                enctype="multipart/form-data" class="dropzone" id="myDragAndDropUploader">
                                @csrf
                                <input type="hidden" name="car_id" value="{{ $car->id }}">
                            </form>
                            <h5 id="message"></h5>
                        </div>
                    @else
                        <label>Drag and Drop Multiple Images (JPG, JPEG, PNG, .webp)</label>
                        <form action="{{ route('cars.uploadImages', ['car_id' => $car->id]) }}" method="POST"
                            enctype="multipart/form-data" class="dropzone" id="myDragAndDropUploader">
                            @csrf
                            <input type="hidden" name="car_id" value="{{ $car->id }}">
                        </form>
                        <h5 id="message"></h5>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script type="text/javascript">
        let maxFilesizeVal = 12;
        let maxFilesVal = 7;

        Dropzone.options.myDragAndDropUploader = {
            paramName: "file",
            maxFilesize: maxFilesizeVal,
            maxFiles: maxFilesVal,
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            addRemoveLinks: true,
            timeout: 60000,
            dictDefaultMessage: "Drop your files here or click to upload",
            dictFileTooBig: "File is too big. Max filesize: " + maxFilesizeVal + "MB.",
            dictMaxFilesExceeded: "You can only upload up to " + maxFilesVal + " files.",

            sending: function(file, xhr, formData) {
                formData.append("car_id", $('input[name="car_id"]').val());
                $('#message').text('Image Uploading...');
            },

            success: function(file, response) {
                file.id = response.id;
                $('#message').text(response.success);
            },
            removedfile: function(file) {
                if (file.previewElement) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                $.ajax({
                    type: 'POST',
                    url: '{{ route('cars.removeImage') }}',
                    data: {
                        imageId: file.id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#message').text(response.success);
                    },
                    error: function(response) {
                        $('#message').text('Error removing image: ' + response.responseJSON.error);
                    }
                });
            }
        };
    </script>
</x-back-layout>
