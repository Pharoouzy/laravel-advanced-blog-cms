@extends('layouts.manage')

@section('content')

	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">View Permission</h1>
			</div>
			<div class="column">
				<a href="{{ route('permissions.edit', $permission->id) }}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i> Edit User</a>
			</div>
		</div>
		<hr class="m-t-10">
		<div class="columns">
			<div class="column">
				<div class="field">
					<label for="display_name" class="label">Name</label>
					<pre>{{ $permission->display_name }}</pre>
				</div>


				<div class="field">
					<label for="name" class="label">Name</label>
					<pre>{{ $permission->name }}</pre>
				</div>

				<div class="field">
					<div class="field">
						<label for="description" class="label">Description</label>
						<pre>{{ $permission->description }}</pre>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
