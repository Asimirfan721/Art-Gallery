{{-- filepath: c:\Users\H.T\Desktop\Coding\1 github\Art-Gallery\resources\views\welcome.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Art Gallery welcome - Home</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; }
        .gallery { display: flex; flex-wrap: wrap; gap: 20px; padding: 40px; justify-content: center; }
        .painting { background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 16px; width: 300px; }
        .painting img { width: 100%; height: auto; border-radius: 4px; }
        .painting .info { margin-top: 10px; }
    </style>
</head>
<body>
    <h1 style="text-align:center; margin-top:30px;">Welcome to the Art Gallery</h1>
    <div class="gallery">
        @forelse($paintings as $painting)
            <div class="painting">
                <img src="{{ asset('storage/' . $painting->image) }}" alt="Painting">
                <div class="info">
                    <strong>Uploaded by:</strong> {{ $painting->pic ?? 'Unknown' }}
                </div>
            </div>
        @empty
            <p>No paintings uploaded yet.</p>
        @endforelse
    </div>
</body>
</html>