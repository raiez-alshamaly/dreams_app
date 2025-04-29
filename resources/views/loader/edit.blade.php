<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <title>Edit Loader Content</title>
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   </head>
   <body>
       <div class="container">
           <h1>Edit Loader Content</h1>
           <form action="{{ route('admin.loader_contents.update', $loaderContent) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="form-group">
                   <label for="title">Title</label>
                   <input type="text" name="title" class="form-control" value="{{ $loaderContent->title }}" required>
               </div>
               <div class="form-group">
                   <label for="content_type">Content Type</label>
                   <select name="content_type" class="form-control" required>
                       <option value="text" {{ $loaderContent->content_type === 'text' ? 'selected' : '' }}>Text</option>
                       <option value="image" {{ $loaderContent->content_type === 'image' ? 'selected' : '' }}>Image</option>
                       <option value="video" {{ $loaderContent->content_type === 'video' ? 'selected' : '' }}>Video</option>
                   </select>
               </div>
               <div class="form-group" id="content_field" style="{{ $loaderContent->content_type === 'text' ? 'display:block' : 'display:none' }}">
                   <label for="content">Content (Text)</label>
                   <textarea name="content" class="form-control">{{ $loaderContent->content_type === 'text' ? $loaderContent->content : '' }}</textarea>
               </div>
               <div class="form-group" id="file_field" style="{{ $loaderContent->content_type !== 'text' ? 'display:block' : 'display:none' }}">
                   <label for="file">Upload File (Image/Video)</label>
                   <input type="file" name="file" class="form-control">
                   @if ($loaderContent->content_type !== 'text')
                       <p>Current: <a href="{{ Storage::url($loaderContent->content) }}" target="_blank">View File</a></p>
                   @endif
               </div>
               <div class="form-group">
                   <label for="style">Style</label>
                   <select name="style" class="form-control" required>
                       <option value="default" {{ $loaderContent->style === 'default' ? 'selected' : '' }}>Default</option>
                       <option value="dark" {{ $loaderContent->style === 'dark' ? 'selected' : '' }}>Dark</option>
                       <option value="light" {{ $loaderContent->style === 'light' ? 'selected' : '' }}>Light</option>
                   </select>
               </div>
               <div class="form-group">
                   <label for="duration">Duration (seconds)</label>
                   <input type="number" name="duration" class="form-control" value="{{ $loaderContent->duration }}" required>
               </div>
               <button type="submit" class="btn btn-primary">Update</button>
           </form>
       </div>
       <script>
           document.querySelector('select[name="content_type"]').addEventListener('change', function () {
               const contentField = document.getElementById('content_field');
               const fileField = document.getElementById('file_field');
               if (this.value === 'text') {
                   contentField.style.display = 'block';
                   fileField.style.display = 'none';
               } else {
                   contentField.style.display = 'none';
                   fileField.style.display = 'block';
               }
           });
       </script>
   </body>
   </html>