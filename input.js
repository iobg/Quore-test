$('.editBtn').click(e=>{
	let row = $(e.target.closest('tr'));

	if(row.hasClass('regionRow')){
		var btn = $('#regionBtn');
		var columns = row.children()
		$('#regionId').val(columns[0].innerText)
		$('#regionNameInput').val(columns[1].innerText)
		btn.val('Update Region')
		btn.attr('name',"updateRegion")

	}

	if(row.hasClass('propertyRow')){
		var btn = $('#propertyBtn');
		var columns = row.children()
		$('#propertyId').val(columns[0].innerText)
		$('#propertyNameInput').val(columns[1].innerText)
		$('#brandInput').val(columns[2].innerText)
		$('#phoneInput').val(columns[3].innerText)
		$('#UrlInput').val(columns[4].innerText)
		btn.val('Update Property')
		btn.attr('name',"updateProperty")
	}
})

$('.deleteBtn').click(e=>{
	let row = $(e.target.closest('tr'));

	if(row.hasClass('regionRow')){
		console.log('delet')
	}

	if(row.hasClass('propertyRow')){
		console.log('this')
	}
})
