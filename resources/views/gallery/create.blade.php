<x-layout>
    <x-header />

    <main class="gallery-create-bg">
        <div class="gallery-create-card">
            <h2 class="gallery-create-title">Create Gallery Form</h2>
            <form action="/gallery" method="POST" enctype="multipart/form-data" class="gallery-create-form">
                @csrf

                <div class="input-group">
                    <label for="logo">Photo</label>
                    <input type="file" id="logo" name="logo" required>
                    @error('logo')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="tags">Tags</label>
                    <input type="text" id="tags" name="tags" value="{{ old('tags') }}" required>
                    @error('tags')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" value="{{ old('location') }}" required>
                    @error('location')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" value="{{ old('description') }}" required>
                    @error('description')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="gallery-create-btn">Submit</button>
            </form>
        </div>
    </main>

    <style>
        .gallery-create-bg {
            min-height: 100vh;
            background: linear-gradient(120deg, #e0e7ff 0%, #f8fafc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 10px;
        }
        .gallery-create-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(60,60,120,0.10);
            padding: 38px 32px 28px 32px;
            max-width: 430px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }
        .gallery-create-title {
            font-size: 2rem;
            font-weight: 700;
            color: #4f46e5;
            text-align: center;
            margin-bottom: 28px;
            letter-spacing: 1px;
        }
        .gallery-create-form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .input-group label {
            font-size: 1rem;
            color: #374151;
            font-weight: 500;
        }
        .input-group input[type="text"],
        .input-group input[type="file"] {
            padding: 10px 12px;
            border: 1px solid #c7d2fe;
            border-radius: 6px;
            font-size: 1rem;
            background: #f1f5f9;
            transition: border 0.2s;
        }
        .input-group input[type="file"] {
            padding: 6px 0;
            background: #fff;
        }
        .input-group input:focus {
            border-color: #6366f1;
            outline: none;
            background: #fff;
        }
        .form-error {
            color: #dc2626;
            font-size: 0.95rem;
            margin-top: 2px;
        }
        .gallery-create-btn {
            margin-top: 10px;
            padding: 12px 0;
            background: linear-gradient(90deg, #6366f1 60%, #818cf8 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(99,102,241,0.10);
        }
        .gallery-create-btn:hover {
            background: linear-gradient(90deg, #4f46e5 60%, #6366f1 100%);
        }
        @media (max-width: 500px) {
            .gallery-create-card {
                padding: 20px 8px 16px 8px;
            }
            .gallery-create-title {
                font-size: 1.5rem;
                margin-bottom: 18px;
            }
            .input-group input[type="text"],
            .input-group input[type="file"] {
                font-size: 0.9rem;
            }
            .form-error {
                font-size: 0.85rem;
            }
            .gallery-create-btn {
                font-size: 1rem;
                padding: 10px 0;
            }
        }
    </style>
</x-layout>