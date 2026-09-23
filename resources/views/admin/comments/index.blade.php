```blade
@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="main-content">

    <section class="section">

        <div class="section-body">

            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">

                    <div class="card">

                        <div class="card-header">
                            <h4 class="text-center">Blog Comments</h4>
                        </div>


                        {{-- Success Message --}}
                        @if(session('success'))

                            <div class="alert alert-success m-3">
                                {{ session('success') }}
                            </div>

                        @endif


                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered">

                                    <tr>
                                        <th>ID</th>
                                        <th>Blog</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>


                                    @forelse($comments as $comment)

                                        <tr>

                                            {{-- ID --}}
                                            <td>
                                                {{ $comment->id }}
                                            </td>


                                            {{-- Blog --}}
                                            <td>
                                                {{ $comment->blog->title ?? 'Deleted Blog' }}
                                            </td>


                                            {{-- Name --}}
                                            <td>
                                                {{ $comment->name }}
                                            </td>


                                            {{-- Email --}}
                                            <td>
                                                {{ $comment->email }}
                                            </td>


                                            {{-- Message --}}
                                            <td>
                                                {{ Str::limit($comment->message, 80) }}
                                            </td>


                                            {{-- Status --}}
                                            <td>

                                                @if($comment->approved)

                                                    <span class="badge badge-success">
                                                        Approved
                                                    </span>

                                                @else

                                                    <span class="badge badge-warning">
                                                        Pending
                                                    </span>

                                                @endif

                                            </td>


                                            {{-- Date --}}
                                            <td>
                                                {{ $comment->created_at->format('d M Y') }}
                                            </td>


                                            {{-- Action --}}
                                            <td>

                                                @if(!$comment->approved)

                                                    <form action="{{ route('admin.comments.approve', $comment->id) }}"
                                                          method="POST"
                                                          style="display:inline;">

                                                        @csrf

                                                        <button type="submit"
                                                                class="btn btn-success btn-sm">

                                                            Approve

                                                        </button>

                                                    </form>

                                                @endif


                                                <form action="{{ route('admin.comments.destroy', $comment->id) }}"
                                                      method="POST"
                                                      style="display:inline;">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Delete this comment?')">

                                                        Delete

                                                    </button>

                                                </form>

                                            </td>

                                        </tr>


                                    @empty

                                        <tr>

                                            <td colspan="8" class="text-center">

                                                No comments found.

                                            </td>

                                        </tr>

                                    @endforelse

                                </table>

                            </div>


                            {{-- Pagination --}}
                            <div class="mt-3">

                                {{ $comments->links() }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@include('admin.includes.footer')
```
