@extends('layouts.manage')

@section('content')
	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Create New User</h1>
			</div>
			<hr class="m-t-10">
		</div>
		<div class="columns">
			<div class="column">
				<form method="POST" action="{{ route('users.store') }}">
					{{ csrf_field() }}
					<div class="field">
						<label for="name" class="label">Name</label>
						<p class="control">
							<input id="name" type="text" name="name" class="input">
						</p>
					</div>
					<div class="field">
						<label for="email" class="label">Email</label>
						<p class="control">
							<input type="email" name="email" id="email" class="input">
						</p>
					</div>
					<div class="field">
						<label for="password" class="label">Password</label>
						<p class="control">
							<input type="password" name="password" id="password" class="input" v-if="!auto_password" placeholder="Manually give a password to this user">
							<b-checkbox class="m-t-15" name="auto_generate" v-model="auto_password">Auto Generate Password</b-checkbox>
						</p>
					</div>
					<button class="button is-success">Create User</button>
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
				auto_password: true
			}
		});
	</script>
@endsection