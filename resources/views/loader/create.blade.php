<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <title>Create Loader Content</title>
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   </head>
   <body>
       <div class="container">
           <h1>Create Loader Content</h1>
           <form action="{{ route('admin.loader_contents.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                   <label for="title">Title</label>
                   <input type="text" name="title" class="form-control" required>
               </div>
               <div class="form-group">
                   <label for="content_type">Content Type</label>
                   <select name="content_type" class="form-control" required>
                       <option value="text">Text</option>
                       <option value="image">Image</option>
                       <option value="video">Video</option>
                   </select>
               </div>
               <div class="form-group" id="content_field">
                   <label for="content">Content (Text)</label>
                   <textarea name="content" class="form-control"></textarea>
               </div>
               <div class="form-group" id="file_field" style="display:none;">
                   <label for="file">Upload File (Image/Video)</label>
                   <input type="file" name="file" class="form-control">
               </div>
               <div class="form-group">
                   <label for="style">Style</label>
                   <select name="style" class="form-control" required>
                       <option value="default">Default</option>
                       <option value="dark">Dark</option>
                       <option value="light">Light</option>
                   </select>
               </div>
               <div class="form-group">
                   <label for="duration">Duration (seconds)</label>
                   <input type="number" name="duration" class="form-control" value="3" required>
               </div>
               <button type="submit" class="btn btn-primary">Save</button>
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