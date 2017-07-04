$('.editBtn').click(e=>{
	let row = $(e.target.closest('tr'));

	if(row.hasClass('regionRow')){
		let btn = $('#regionBtn');
		let columns = row.children()
		$('#regionId').val(columns[0].innerText)
		$('#regionNameInput').val(columns[1].innerText)
		btn.val('Update Region')
		btn.attr('name',"updateRegion")

	}

	if(row.hasClass('propertyRow')){
		let btn = $('#propertyBtn');
		let columns = row.children()
		$('#propertyId').val(columns[0].innerText)
		$('#propertyNameInput').val(columns[1].innerText)
		$('#brandInput').val(columns[2].innerText)
		$('#phoneInput').val(columns[3].innerText)
		$('#UrlInput').val(columns[4].innerText)
		$('#fullServiceInput').val(columns[5].innerText)
		btn.val('Update Property')
		btn.attr('name',"updateProperty")
	}
})

$('.deleteBtn').click(e=>{
	let row = $(e.target.closest('tr'));
	let columns = row.children()

	if(row.hasClass('regionRow')){
		$('#deleteType').val('region')
		$('#idToDelete').val(columns[0].innerText)
		$('.delete').submit();
	}

	if(row.hasClass('propertyRow')){
		$('#deleteType').val('property')
		$('#idToDelete').val(columns[0].innerText)
		$('.delete').submit();
	}
})
