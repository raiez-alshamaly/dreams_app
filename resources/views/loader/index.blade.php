<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <title>Manage Loader Contents</title>
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   </head>
   <body>
       <div class="container">
           <h1>Loader Contents</h1>
           <a href="{{ route('admin.loader_contents.create') }}" class="btn btn-primary">Create New</a>
           <table class="table">
               <thead>
                   <tr>
                       <th>Title</th>
                       <th>Type</th>
                       <th>Style</th>
                       <th>Duration</th>
                       <th>Actions</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($contents as $content)
                       <tr>
                           <td>{{ $content->title }}</td>
                           <td>{{ $content->content_type }}</td>
                           <td>{{ $content->style }}</td>
                           <td>{{ $content->duration }}s</td>
                           <td>
                               <a href="{{ route('admin.loader_contents.edit', $content) }}" class="btn btn-sm btn-warning">Edit</a>
                               <form action="{{ route('admin.loader_contents.destroy', $content) }}" method="POST" style="display:inline;">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                               </form>
                           </td>
                       </tr>
                   @endforeach
               </tbody>
           </table>
       </div>
   </body>
   </html>