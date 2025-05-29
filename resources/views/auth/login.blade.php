<x-app>
    <div class="row justify-content-center">
        <div class="col-lg-4" style="margin-top: 70px; border: 1px solid #dee2e6; box-shadow: 0 2px 12px rgba(0,0,0,0.08); border-radius: 12px; background: #fff;">
            <div class="form-container" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
                <h1>🔐 Admin Access</h1>
                <p class="text-center text-muted mb-4">Please sign in to manage posts</p>
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            placeholder="admin@example.com"
                            required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            id="password" 
                            name="password" 
                            placeholder="Enter your password"
                            required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary">← Back to Home</a>
                    </div>
                </form>
                
                <div class="mt-4 p-3 bg-light rounded">
                    <small class="text-muted">
                        <strong>Demo Credentials:</strong><br>
                        Email: admin@example.com<br>
                        Password: password123
                    </small>
                </div>
            </div>
        </div>
    </div>
</x-app>