const table = document.getElementById('tb-editar')
const modal = document.getElementById('MD-QUITAR')

table.addEventListener('click',(e)=>{

	e.stopPropagation();
	console.log(e.target)
})