@props(['listing'])

<x-layout>
    @include('partials.nav')

    <!-- about -->
    <section class="about" id="about">
        <div class="container container-about">
            <div class="about-content">
                <div class="about-image">
                    <!-- Clickable Thumbnail Image -->
                    <img id="zoomImage"
                         src="{{ asset('storage/' . $listing->logo) }}"
                         alt="Gallery Image"
                         style="cursor: zoom-in; max-width: 100%; height: auto;" />

                    <!-- Modal -->
                    <div id="imageModal" style="
                        display: none;
                        position: fixed;
                        z-index: 999;
                        padding-top: 50px;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        overflow: auto;
                        background-color: rgba(0,0,0,0.9);
                    ">
                        <span onclick="closeModal()" style="
                            position: absolute;
                            top: 20px;
                            right: 35px;
                            color: #fff;
                            font-size: 40px;
                            font-weight: bold;
                            cursor: pointer;
                        ">&times;</span>

                        <img id="modalImage" style="
                            display: block;
                            margin: auto;
                            max-width: 90%;
                            max-height: 80vh;
                            transition: transform 0.3s ease;
                        ">
                    </div>
                </div>

                <div class="about-text">
                    <div class="title">
                        <h2>{{ $listing->name }}</h2>
                        <p>{{ $listing->location }}</p>
                        <p><strong>{{ $listing->tags }}</strong></p>
                    </div>
                    <p>{{ $listing->description }}</p>
                    @if($listing->user)
    <p><strong>Posted by:</strong> {{ $listing->user->name }}</p>
@endif

                    <div class="button-container">
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
        </div>
    </section>
    <!-- end of about -->

    <div class="painting">
       <img src="{{ asset('storage/' . $listing->logo) }}" alt="Painting">

        <div class="info">
            @if($listing->user)
                <p><strong>Posted by:</strong> {{ $listing->user->name }}</p>
            @endif
            <strong>Uploaded by:</strong> {{ $pic ?? 'Unknown' }}
        </div>
    </div>

    <!-- Image Modal Script -->
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
