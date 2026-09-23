@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="main-content">
<section class="section">
<div class="section-body">

<div class="row">
<div class="col-12">

<div class="card">

    <!-- Header -->
    <div class="card-header">
        <h4 class="text-center">Contact Messages</h4>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success m-3">
        {{ session('success') }}
    </div>
    @endif

    <!-- Table -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($messages as $key => $msg)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $msg->name }}</td>
                        <td>{{ $msg->email }}</td>
                        <td>{{ $msg->subject }}</td>
                        <td>{{ Str::limit($msg->message, 50) }}</td>

                        <td>
                            <form action="{{ route('admin.contacts.delete', $msg->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this message?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>

</div>
</div>

</div>
</section>
</div>

@include('admin.includes.footer')