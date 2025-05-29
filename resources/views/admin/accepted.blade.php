<x-app>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px; margin-bottom: 1.5rem;">
                <h1 class="mb-0 me-3">✅ Accepted Posts</h1>
                <span class="badge bg-success fs-6 align-self-center">{{ $acceptedPosts->count() }} Published</span>
            </div>

            <h2 class="h4 text-muted mb-4">📢 Currently Published Posts</h2>

            @if($acceptedPosts->count() > 0)
                @foreach($acceptedPosts as $post)
                    <div class="card mb-4 shadow border border-success" style="background-color: #f6fff6;">
                        <div class="card-body">
                            <div class="post-content mb-3 fs-5">
                                {{ $post->content }}
                            </div>
                            <div class="post-meta mb-3">
                                <span class="text-success fw-bold">✅ Accepted {{ $post->updated_at->diffForHumans() }}</span>
                                <span class="text-muted">• Originally submitted {{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            
                            <form action="{{ route('admin.posts.delete', $post) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('⚠️ Are you sure you want to permanently delete this published post?')">
                                    🗑️ Delete Post
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <h3>📝 No published posts yet!</h3>
                    <p>Once you accept posts from the dashboard, they will appear here and be visible to all users.</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                        📋 Review Pending Posts
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app>