@extends('layouts.manage')

@section('content')
	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Edit Permission</h1>
			</div>
			<hr class="m-t-10">
		</div>
		<div class="columns">
			<div class="column">
				<form method="POST" action="{{ route('permissions.update', $permission->id) }}">
					{{ method_field('PUT') }}
					{{ csrf_field() }}
					<div class="field">
						<div class="field">
							<label for="display_name" class="label">Name (Display Name)</label>
							<p class="control">
								<input id="display_name" type="text" name="display_name" class="input" value="{{ $permission->display_name }}">
							</p>
						</div>
						<label for="name" class="label">Slug</label>
						<p class="control">
							<input id="name" type="text" name="name" class="input" value="{{ $permission->name }}">
						</p>
					</div>
					<div class="field">
						<label for="description" class="label">Description</label>
						<p class="control">
							<input type="text" name="description" id="description" class="input" value="{{ $permission->description }}">
						</p>
					</div>
					<button class="button is-primary">Update Permission</button>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		var app = new Vue({
			el: '#app',
			data: {
				password_option: 'keep'
			}
		});
	</script>
@endsection