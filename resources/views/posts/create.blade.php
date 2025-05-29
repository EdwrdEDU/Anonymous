<x-app>
    <div class="row justify-content-center" style="margin-top: 10px;">
        <div class="col-lg-6">
            <div class="form-container">
                <h1>📝 Share Your Thoughts</h1>
                <p class="text-center text-muted mb-4">Your post will be reviewed before being published.</p>
                
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="form-label">Your Anonymous Post</label>
                        <textarea 
                            class="form-control @error('content') is-invalid @enderror" 
                            id="content" 
                            name="content" 
                            rows="8" 
                            placeholder="What's on your mind? Share your thoughts, experiences, or feelings anonymously..."
                            required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            💡 <strong>Tip:</strong> Minimum 10 characters, maximum 1000 characters. Be respectful and thoughtful.
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary me-md-2">
                            Submit Post
                        </button>
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                            Back to Posts
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>