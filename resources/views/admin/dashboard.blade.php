<x-app>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px; margin-bottom: 1.5rem;">
                <h1 class="mb-0 me-3">⚡ Admin Dashboard</h1>
                <span class="badge bg-warning fs-6 mb-0">{{ $pendingPosts->count() }} Pending</span>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 text-muted mb-0">📋 Posts Awaiting Review</h2>
                <div>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary me-2">
                        👀 View Published Posts
                    </a>
                    <a href="{{ route('admin.accepted') }}" class="btn btn-success me-2">
                        ✅ View Accepted Posts
                    </a>
                    <a href="{{ route('admin.declined') }}" class="btn btn-danger">
                        ❌ View Declined Posts
                    </a>
                </div>
            </div>
            @if($pendingPosts->count() > 0)
                @foreach($pendingPosts as $post)
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="post-content mb-3">
                                {{ $post->content }}
                            </div>
                            <div class="post-meta mb-3">
                                Submitted {{ $post->created_at->diffForHumans() }}
                            </div>
                            
                            <div class="btn-group" role="group" aria-label="Post actions">
                                <form action="{{ route('admin.posts.accept', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        ✅ Accept
                                    </button>
                                </form>
                                
                                <form action="{{ route('admin.posts.decline', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        ❌ Decline
                                    </button>
                                </form>
                                
                                <form action="{{ route('admin.posts.delete', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('⚠️ Are you sure you want to permanently delete this post?')">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state border border-3 border-black rounded p-5 text-center bg-warning-subtle shadow-lg">
                    <h3>🎉 All caught up!</h3>
                    <p>No posts are waiting for your review. Great job keeping up with the community!</p>
                </div>
            @endif
        </div>
    </div>
</x-app>