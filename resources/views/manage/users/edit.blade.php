@extends('layouts.manage')

@section('content')
	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Edit User</h1>
			</div>
			<hr class="m-t-10">
		</div>
		<div class="columns">
			<div class="column">
				<form method="POST" action="{{ route('users.update', $user->id) }}">
					{{ method_field('PUT') }}
					{{ csrf_field() }}
					<div class="field">
						<label for="name" class="label">Name</label>
						<p class="control">
							<input id="name" type="text" name="name" class="input" value="{{ $user->name }}">
						</p>
					</div>
					<div class="field">
						<label for="email" class="label">Email</label>
						<p class="control">
							<input type="email" name="email" id="email" class="input" value="{{ $user->email }}">
						</p>
					</div>
					<div class="field">
						<label for="password" class="label">Password</label>
						<b-radio-group v-model="password_option">
							<div class="field">
								<b-radio name="p" value="keep">Do not change password</b-radio>
							</div>
							<div class="field">
								<b-radio name="p" value="auto">Auto-Generate New Password</b-radio>
							</div>
							<div class="field">
								<b-radio name="p" value="manual">Manually Set New Password</b-radio>
								<p class="control">
									<input type="password" name="password" id="password" class="input" v-if="password_option == 'manual'" placeholder="Manually give a password to this user">
								</p>
							</div>
						</b-radio-group>
					</div>
					<button class="button is-primary">Update User</button>
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