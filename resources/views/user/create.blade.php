<x-layout>
    <x-header />

    <div class="gallery-container">
        <h1 class="gallery-title">Welcome to the Art Gallery</h1>
        <div class="gallery-grid">
            @forelse($paintings as $painting)
                <div class="painting-card">
                    <img src="{{ asset('storage/' . $painting->image) }}" alt="Painting" class="painting-img">
                    <div class="painting-info">
                        @if($painting->user)
                            <p class="posted-by"><strong>Posted by:</strong> {{ $painting->user->name }}</p>
                        @endif
                        <p class="uploaded-by"><strong>Uploaded by:</strong> {{ $painting->pic ?? 'Unknown' }}</p>
                    </div>
                </div>
            @empty
                <p class="no-paintings">No paintings uploaded yet.</p>
            @endforelse
        </div>
    </div>

    <style>
        .gallery-container {
            max-width: 1200px;
            margin: 40px auto 0 auto;
            padding: 0 20px 40px 20px;
        }
        .gallery-title {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5rem;
            color: #222;
            letter-spacing: 1px;
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
            gap: 32px;
            justify-items: center;
        }
        .painting-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(0,0,0,0.08);
            padding: 18px 18px 14px 18px;
            width: 100%;
            max-width: 340px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: box-shadow 0.2s;
        }
        .painting-card:hover {
            box-shadow: 0 8px 32px rgba(0,0,0,0.14);
        }
        .painting-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 16px;
            background: #eee;
        }
        .painting-info {
            width: 100%;
            text-align: left;
        }
        .posted-by, .uploaded-by {
            margin: 0 0 6px 0;
            font-size: 1rem;
            color: #444;
        }
        .no-paintings {
            grid-column: 1 / -1;
            text-align: center;
            color: #888;
            font-size: 1.2rem;
        }
        @media (max-width: 600px) {
            .gallery-title { font-size: 1.5rem; }
            .painting-card { padding: 10px; }
            .painting-img { height: 140px; }
        }
    </style>
</x-layout>