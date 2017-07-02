$('.editBtn').click(e=>{
	let row = $(e.target.closest('tr'));

	if(row.hasClass('regionRow')){
		console.log('has')
	}

	if(row.hasClass('propertyRow')){
		console.log('has')
	}
})
