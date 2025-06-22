<x-layout>
    <x-header />

    <main class="register-bg">
        <div class="register-card">
            <h2 class="register-title">Create Your Account</h2>

            <form action="/users" method="POST" class="register-form">
                @csrf

                <!-- Name Field -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                    @error('password_confirmation')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="register-btn">
                    Register
                </button>
            </form>

            <p class="register-link">
                Already have an account?
                <a href="/login">Login</a>
            </p>
        </div>
    </main>

    <style>
        .register-bg {
            min-height: 100vh;
            background: linear-gradient(120deg, #e0e7ff 0%, #f8fafc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 10px;
        }
        .register-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(60,60,120,0.10);
            padding: 38px 32px 28px 32px;
            max-width: 410px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }
        .register-title {
            font-size: 2rem;
            font-weight: 700;
            color: #4f46e5;
            text-align: center;
            margin-bottom: 28px;
            letter-spacing: 1px;
        }
        .register-form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .form-group label {
            font-size: 1rem;
            color: #374151;
            font-weight: 500;
        }
        .form-group input {
            padding: 10px 12px;
            border: 1px solid #c7d2fe;
            border-radius: 6px;
            font-size: 1rem;
            background: #f1f5f9;
            transition: border 0.2s;
        }
        .form-group input:focus {
            border-color: #6366f1;
            outline: none;
            background: #fff;
        }
        .form-error {
            color: #dc2626;
            font-size: 0.95rem;
            margin-top: 2px;
        }
        .register-btn {
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
        .register-btn:hover {
            background: linear-gradient(90deg, #4f46e5 60%, #6366f1 100%);
        }
        .register-link {
            text-align: center;
            margin-top: 22px;
            color: #64748b;
            font-size: 1rem;
        }
        .register-link a {
            color: #6366f1;
            text-decoration: underline;
            margin-left: 4px;
            transition: color 0.2s;
        }
        .register-link a:hover {
            color: #4f46e5;
        }
        @media (max-width: 500px) {
            .register-card {
                padding: 20px 8px 16px 8px;
            }
            .register-title {
                font-size: 1.3rem;
            }
        }
    </style>
</x-layout>
