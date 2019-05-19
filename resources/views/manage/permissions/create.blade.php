@extends('layouts.manage')

@section('content')
	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Create New Permission</h1>
			</div>
			<hr class="m-t-10">
		</div>
		<div class="columns">
			<div class="column">
				<form method="POST" action="{{ route('permissions.store') }}">
					{{ csrf_field() }}
					<div class="block">
						<b-radio-group v-model="permissionType">
							<b-radio name="permission_type" value="basic">Basic Permission</b-radio>
							<b-radio name="permission_type" value="crud">CRUD Permission</b-radio>
						</b-radio-group>
					</div>
					<div class="field" v-if="permissionType == 'basic'">
						<label for="display_name" class="label">Name (Display Name)</label>
						<p class="control">
							<input id="display_name" type="text" name="display_name" class="input">
						</p>
					</div>
					<div class="field" v-if="permissionType == 'basic'">
						<label for="name" class="label">Slug</label>
						<p class="control">
							<input type="name" name="name" id="name" class="input">
						</p>
					</div>
					<div class="field" v-if="permissionType == 'basic'">
						<label for="description" class="label">Description</label>
						<p class="control">
							<input type="description" name="description" id="description" class="input" placeholder="Describe what this permission does">
						</p>
					</div>

					<div class="field" v-if="permissionType == 'crud'">
						<label for="resource" class="label">Resource</label>
						<p class="control">
							<input type="resource" name="resource" id="resource" class="input" v-model="resource" placeholder="The name of the resource">
						</p>
					</div>

					<div class="columns" v-if="permissionType == 'crud'">
						<div class="column">
							<b-checkbox-group v-model="crudSelected">
								<div class="field">
									<b-checkbox custom-value="create">Create</b-checkbox>
								</div>
								<div class="field">
									<b-checkbox custom-value="read">Read</b-checkbox>
								</div>
								<div class="field">
									<b-checkbox custom-value="update">Update</b-checkbox>
								</div>
								<div class="field">
									<b-checkbox custom-value="delete">Delete</b-checkbox>
								</div>
							</b-checkbox>
						</div>
						<input type="hidden" name="crud_selected" :value="crudSelected">

						<div class="column">
							<table class="table">
								<thead>
									<tr>
										<th>Name</th>
										<th>Slug</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody v-if="resource.length > 3">
									<tr v-for="item in crudSelected">
										<td v-text="crudName(item)"></td>
										<td v-text="crudSlug(item)"></td>
										<td v-text="crudDescription(item)"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<button class="button is-success">Create Permission</button>
				</form>
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	<script>
		let app = new Vue({
			el: '#app',
			data: {
				permission_type: 'basic',
				resource: '',
				crudSelected: ['create', 'read', 'update', 'delete']
			},
			methods: {
				crudName: function(item) {
					return item.substr(0, 1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
				},

				crudSlug: function(item) {
					return item.toLowerCase() + "-" + app.resource.toLowerCase();
				},

				crudDescription: function(item) {
					return "Allow a User to " + item.toUpperCase() + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
				}
			}
		});
	</script>
@endsection