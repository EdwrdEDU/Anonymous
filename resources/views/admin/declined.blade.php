<x-app>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px; margin-bottom: 1.5rem;">
                <h1 class="mb-0 me-3">❌ Declined Posts</h1>
                <span class="badge bg-warning fs-6 align-self-center">{{ $declinedPosts->count() }} Declined</span>
            </div>

            <h2 class="h4 text-muted mb-4">🚫 Posts Not Approved for Publication</h2>

            @if($declinedPosts->count() > 0)
                @foreach($declinedPosts as $post)
                    <div class="card mb-4 shadow border border-warning" style="background-color: #fffaf6;">
                        <div class="card-body">
                            <div class="post-content mb-3 fs-5">
                                {{ $post->content }}
                            </div>
                            <div class="post-meta mb-3">
                                <span class="text-warning fw-bold">❌ Declined {{ $post->updated_at->diffForHumans() }}</span>
                                <span class="text-muted">• Originally submitted {{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="btn-group" role="group" aria-label="Post actions">
                                <form action="{{ route('admin.posts.accept', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        ✅ Accept Now
                                    </button>
                                </form>
                                <form action="{{ route('admin.posts.delete', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('⚠️ Are you sure you want to permanently delete this declined post?')">
                                        🗑️ Delete Forever
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <h3>🎯 No declined posts!</h3>
                    <p>You haven't declined any posts yet. Declined posts will appear here for future reference.</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                        📋 Review Pending Posts
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app>
