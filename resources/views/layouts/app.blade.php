<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>IBlog  | Modern Blog</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
<link href="{{ asset('../css/style.css') }}" rel="stylesheet"/>
</head>
<body>
    @include('components.header')
    
    

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

    @include('components.footer')
    <script src="{{ asset('../js/script.js') }}"></script>
</body>
</html>
