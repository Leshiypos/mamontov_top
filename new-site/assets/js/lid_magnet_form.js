function ready_lid() {

const createDocumentsWin = (parent, object_doc) => {
	const ul = document.createElement('ul');
	ul.className = 'documentaArea';
	object_doc.map(elem => {
		const li = document.createElement('li');
		li.innerHTML=`<a href = ${elem.url} download><span>${elem.title}</span></a>`;
		ul.append(li);
	})
	parent.append(ul);
}

const clearElem = (elem)=>{
	elem.innerHTML="";
}
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		const formLid = document.querySelector('.form_lid_magnet');
		const buttonForm = formLid.querySelector('button');
		formLid.innerHTML = `<h2 class="header_modal">Теперь Вам доступны файлы для скачивания</h2>`;
		formLid.append(buttonForm);
		createDocumentsWin(formLid, documentsAfterModal);

	});
}

document.addEventListener("DOMContentLoaded", ready_lid);