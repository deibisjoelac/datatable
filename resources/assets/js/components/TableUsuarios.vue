<template>

	<div class="mt-5">
		<DataTable 
			:footer=false 
			:columns="columns" 
			:ajax="urlAjax"  
			@editRow="editRow"
			@deleteRow="deleteRow"
			>
		</DataTable>
	</div>
</template>

<script>
import DataTable from './DataTable.vue';
export default {
	data: () => ({
		urlAjax : '/users',
		columns : [
			{ data : 'id' , name: 'id', className:' w-20'},
	        { data : 'name' , name: 'name', className:' w-20'},
			{ data : 'email' , name: 'email' ,className : 'w-20'},
			{ data : 'actions' , name: 'actions' ,className : 'w-20'},
		],
		usuarios: []
	}),
	components :{
		DataTable
	},
	methods: {
		editRow(data){
			console.log(`Edit User  ... Name User ${data.name}  - Email  ${data.email}`);
		},
		deleteRow(data){
			console.log(`Confirm Delete  ... Name User ${data.name}  - Email  ${data.email}`);
		}
	}
};
</script>

