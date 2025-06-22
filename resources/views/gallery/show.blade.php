@props(['listing'])

<x-layout>
    <x-header />

    <section class="gallery-show-bg">
        <div class="gallery-show-container">
            <div class="gallery-show-image-section">
                <!-- Clickable Thumbnail Image -->
                <img id="zoomImage"
                     src="{{ asset('storage/' . $listing->logo) }}"
                     alt="Gallery Image"
                     class="gallery-show-image"
                     style="cursor: zoom-in;" />

                <!-- Modal -->
                <div id="imageModal" class="gallery-modal">
                    <span onclick="closeModal()" class="gallery-modal-close">&times;</span>
                    <img id="modalImage" class="gallery-modal-img">
                </div>
            </div>

            <div class="gallery-show-info-section">
                <h2 class="gallery-show-title">{{ $listing->name }}</h2>
                <p class="gallery-show-location">{{ $listing->location }}</p>
                <p class="gallery-show-tags"><strong>{{ $listing->tags }}</strong></p>
                <p class="gallery-show-description">{{ $listing->description }}</p>
                @if($listing->user)
                    <p class="gallery-show-posted"><strong>Posted by:</strong> {{ $listing->user->name }}</p>
                @endif
                <p class="gallery-show-uploaded"><strong>Uploaded by:</strong> {{ $listing->pic ?? 'Unknown' }}</p>

                <div class="gallery-show-btns">
                    <button onclick="location.href='/'" class="btn-home">Home</button>
                    <button onclick="location.href='/gallery/{{ $listing->id }}/edit'" class="btn-update">Update</button>
                    <form action="/gallery/{{ $listing->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <style>
        .gallery-show-bg {
            min-height: 100vh;
            background: linear-gradient(120deg, #e0e7ff 0%, #f8fafc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 10px;
        }
        .gallery-show-container {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(60,60,120,0.10);
            padding: 38px 32px 28px 32px;
            max-width: 900px;
            width: 100%;
            display: flex;
            flex-direction: row;
            gap: 40px;
            align-items: flex-start;
        }
        .gallery-show-image-section {
            flex: 1 1 340px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .gallery-show-image {
            width: 340px;
            max-width: 90vw;
            height: 340px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(60,60,120,0.08);
            margin-bottom: 10px;
            background: #f1f5f9;
        }
        .gallery-show-info-section {
            flex: 2 1 400px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .gallery-show-title {
            font-size: 2rem;
            font-weight: 700;
            color: #4f46e5;
            margin-bottom: 8px;
        }
        .gallery-show-location {
            color: #64748b;
            font-size: 1.1rem;
            margin-bottom: 2px;
        }
        .gallery-show-tags {
            color: #6366f1;
            font-size: 1rem;
            margin-bottom: 8px;
        }
        .gallery-show-description {
            font-size: 1.1rem;
            color: #374151;
            margin-bottom: 10px;
        }
        .gallery-show-posted,
        .gallery-show-uploaded {
            font-size: 1rem;
            color: #444;
            margin-bottom: 2px;
        }
        .gallery-show-btns {
            margin-top: 18px;
            display: flex;
            gap: 14px;
        }
        .btn-home, .btn-update, .btn-delete {
            padding: 10px 22px;
            border-radius: 6px;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(99,102,241,0.10);
        }
        .btn-home {
            background: #6366f1;
            color: #fff;
        }
        .btn-home:hover {
            background: #4f46e5;
        }
        .btn-update {
            background: #22c55e;
            color: #fff;
        }
        .btn-update:hover {
            background: #16a34a;
        }
        .btn-delete {
            background: #ef4444;
            color: #fff;
        }
        .btn-delete:hover {
            background: #dc2626;
        }
        /* Modal Styles */
        .gallery-modal {
            display: none;
            position: fixed;
            z-index: 999;
            padding-top: 50px;
            left: 0;
            top: 0;
            width: 100vw;
            height: 100vh;
            overflow: auto;
            background-color: rgba(0,0,0,0.9);
        }
        .gallery-modal-img {
            display: block;
            margin: auto;
            max-width: 90vw;
            max-height: 80vh;
            transition: transform 0.3s ease;
        }
        .gallery-modal-close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }
        @media (max-width: 900px) {
            .gallery-show-container {
                flex-direction: column;
                align-items: center;
                gap: 24px;
                padding: 18px 6vw;
            }
            .gallery-show-image {
                width: 90vw;
                height: 220px;
            }
        }
        @media (max-width: 500px) {
            .gallery-show-title {
                font-size: 1.3rem;
            }
            .gallery-show-container {
                padding: 10px 2vw;
            }
        }
    </style>

    <script>
        const zoomImage = document.getElementById("zoomImage");
        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("modalImage");
        let scale = 1;

        zoomImage.addEventListener("click", function () {
            modal.style.display = "block";
            modalImg.src = this.src;
            scale = 1;
            modalImg.style.transform = `scale(1)`;
        });

        function closeModal() {
            modal.style.display = "none";
            scale = 1;
            modalImg.style.transform = `scale(1)`;
        }

        modalImg.addEventListener("wheel", function (e) {
            e.preventDefault();
            scale += e.deltaY < 0 ? 0.1 : -0.1;
            scale = Math.max(1, scale);
            modalImg.style.transform = `scale(${scale})`;
        });

        modal.addEventListener("click", function (e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
</x-layout>
