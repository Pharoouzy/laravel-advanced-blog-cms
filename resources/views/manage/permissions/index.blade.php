@extends('layouts.manage')

@section('content')

	<div class="flex-container is-primary">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Manage Permissions</h1>
			</div>
			<div class="columns m-t-10">
				<div class="column">
					<a href="{{ route('permissions.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-user-add m-r-10"></i> Create New Permission</a>
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
							<th>Slug</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($permissions as $permission)
							<tr>
								<td>{{ $permission->id }}</td>
								<td>{{ $permission->display_name }}</td>
								<td>{{ $permission->name }}</td>
								<td>{{ $permission->description }}</td>
								<td>
									<a class="button is-outline" href="{{ route('permissions.show', $permission->id) }}">View</a> | 
									<a class="button is-outline" href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		{{ $permissions->links() }}
	</div>

@endsection