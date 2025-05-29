<x-app>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px; margin-bottom: 1.5rem;">
                <h1 class="mb-0 me-3">✨ Anonymous Posts</h1>
                <p class="text-muted mb-0">Share your thoughts with the world, anonymously and safely.</p>
            </div>
            
            @if($posts->count() > 0)
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @php
                        $headerColors = [
                            'bg-primary',
                            'bg-success',
                            'bg-danger',
                            'bg-warning',
                            'bg-info',
                            'bg-dark',
                            'bg-secondary'
                        ];
                    @endphp
                    @foreach($posts as $index => $post)
                        @php
                            $randomColor = $headerColors[array_rand($headerColors)];
                        @endphp
                        <div class="col">
                            <div class="card h-100 post-card border-black shadow-lg" style="border-width:2px; border-color: black !important;">
                                <div class="card-header {{ $randomColor }} text-white d-flex align-items-center" style="font-size: 1rem;">
                                    <span class="me-2 d-flex align-items-center">
                                        <span class="rounded-circle me-2" style="display:inline-block;width:18px;height:18px;background:#fff;border:2px solid #000;"></span>
                                        Anonymous #{{ rand(1001, 9999) }}
                                    </span>
                                    <span class="ms-auto small text-muted">{{ $post->created_at->format('M d, Y') }}</span>
                                </div>
                                <div class="card-body post-content bg-light" style="font-size: 1.1rem;">
                                    {{ $post->content }}
                                </div>
                                <div class="card-footer post-meta text-muted bg-black bg-opacity-10">
                                    Posted {{ $post->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <h3>No posts yet!</h3>
                    <p>Be the first to share your thoughts with the community.</p>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">
                        📝 Submit First Post
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app>