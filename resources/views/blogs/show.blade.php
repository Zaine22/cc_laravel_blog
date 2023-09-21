<x-layout>
    <!-- singloe blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img
                    src=" /storage/{{ $blog->thumbnail }}"
                    alt="..."
                    class="card-image-top mt-3"
                    width="300px"
                    height="200px"
                />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <div>
                    <div>Author - <a
                            href="/?username={{ $blog->author->username }}"
                            style="text-decoration: none ;"
                        >{{ $blog->author->name }}</a></div>
                    <div><a href="/categories/{{ $blog->category->slug }}"><span
                                class="badge bg-primary">{{ $blog->category->name }}</span></a></div>
                    <div class="text-secondary">{{ $blog->created_at->diffForHumans() }}</div>
                    <div class="text-secondary">
                        <form
                            action="/blogs/{{ $blog->slug }}/subscription"
                            method="POST"
                        >
                            @csrf
                            @auth
                                @if (auth()->user()->isSubscribed($blog))
                                    <button class="btn btn-danger">Unsuscribe</button>
                                @else
                                    <button class="btn btn-warning">Subscribe</button>
                                @endif
                            @endauth

                        </form>
                    </div>
                </div>
                <p class="lh-md mt-3">
                    {{ $blog->body }}
                </p>
            </div>
        </div>
    </div>
    <section class="container">
        <div class="col-md-8 mx-auto">
            @auth
                <x-card-wrapper>
                    <x-comment-form :blog='$blog' />
                </x-card-wrapper>
            @else
                <p class="text-center">Please <a href="/login">login</a> in participate in this discussion</p>
            @endauth
        </div>
    </section>

    {{-- comment Section --}}
    @if ($blog->comments->count())
        <x-comments :comments='$blog
            ->comments()
            ->latest()
            ->paginate(3)' />
    @endif

    <!-- subscribe new blogs -->
    {{-- blogs section you may like --}}
    <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />
</x-layout>
