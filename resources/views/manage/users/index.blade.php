@extends('layouts.manage')

@section('content')

	<div class="flex-container is-primary">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Manage Users</h1>
			</div>
			<div class="columns m-t-10">
				<div class="column">
					<a href="{{ route('users.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-user-add m-r-10"></i> Create New User</a>
				</div>
			</div>
		</div>
		<hr>
		<div class="card">
			<div class="card-content">
				<table class="table is-narrow">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Date Created</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->created_at->toFormattedDateString() }}</td>
								<td>
									<a class="button is-outline" href="{{ route('users.show', $user->id) }}">View</a> | 
									<a class="button is-outline" href="{{ route('users.edit', $user->id) }}">Edit</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		{{ $users->links() }}
	</div>

@endsection