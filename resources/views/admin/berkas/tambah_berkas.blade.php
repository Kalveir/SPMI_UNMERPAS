@extends('layout.main')
@section('tittle')
Pengisian Berkas
@endsection
@section('judul')
Upload Berkas
@endsection
@section('container')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <form action="{{ route('berkas.upload_file', $pengisian->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}
        <div class="form-group">
            <label for="basicInput">1. Jenis :</label>
        </div>
        <div class="col-md-6 mb-4">
            <fieldset>
                <select class="form-control" id="jenis" name="jenis">
                        <option>Penetapan</option>
                        <option>Pelaksanaan</option>
                </select>
            </fieldset>
        </div>
        <div class="form-group">
            <label for="basicInput">2. Upload Berkas :</label>
        </div>
        <div class="col-md-6 mb-4">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" required data-max-file-size="5MB" name="nama_file[]" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png" multiple onchange="showLoading()">
                <label class="custom-file-label" for="customFile" placeholder="Upload"></label>
            </div>
        </div>
        <div id="loading" style="display: none;">Loading...</div>
        <div id="file-list"></div>
        <div class="form-group">
            <label for="basicInput">3. Deskripsi :</label>
        </div>
        <div class="col-md-8">
            <input id="deskripsi" type="hidden" name="deskripsi" required>
            <trix-editor placeholder="Input text here..." input="deskripsi" style="height: 150px"></trix-editor>
        </div>
        <br>
        <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
<script>
    function showLoading() {
        // Display the loading indicator when a file is selected
        document.getElementById('loading').style.display = 'block';

        // Get the file input element
        var fileInput = document.getElementById('customFile');

        // Get the file list
        var fileList = fileInput.files;

        // Get the container for file names
        var fileContainer = document.getElementById('file-list');

        // Clear previous file names
        fileContainer.innerHTML = '';

        // Display the selected file names
        for (var i = 0; i < fileList.length; i++) {
            var fileName = fileList[i].name;

            // Create a file item div
            var fileItem = document.createElement('div');
            fileItem.className = 'file-item';

            // Create a tag element for each file
            var tagElement = document.createElement('span');
            tagElement.className = 'file-tag';
            tagElement.textContent = fileName;

            // Add a delete button with an X icon for each file
            var deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-link delete-button';
            deleteButton.innerHTML = '<i class="bi bi-x"></i>';
            deleteButton.onclick = createDeleteHandler(fileInput, fileName);

            // Append the tag and delete button to the file item div
            fileItem.appendChild(tagElement);
            fileItem.appendChild(deleteButton);

            // Append the file item to the container
            fileContainer.appendChild(fileItem);
        }

        // For demonstration purposes, let's simulate a delay with setTimeout
        setTimeout(function () {
            // Hide the loading indicator after a certain delay (replace this with your actual file upload logic)
            document.getElementById('loading').style.display = 'none';
        }, 2000); // Adjust the delay as needed
    }

    function createDeleteHandler(fileInput, currentFileName) {
        return function () {
            // Remove the file from the list when the delete button is clicked
            var updatedFiles = Array.from(fileInput.files).filter(file => file.name !== currentFileName);
            fileInput.files = new FileList(updatedFiles);
            showLoading(); // Refresh the file list display
        };
    }
</script>

<style>
    .file-tag {
        background-color: #3498db;
        color: #ffffff;
        padding: 5px;
        margin-right: 5px;
        border-radius: 3px;
        display: inline-block;
    }

    .file-item {
        margin-bottom: 5px;
    }

    /* Add some styles for the X icon */
    .delete-button {
        color: #ff0000;
        cursor: pointer;
        padding: 0;
        background: none;
        border: none;
    }
</style>





@endsection