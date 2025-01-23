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
const replaceElementHtml = (selector, html)=>{
	let element = document.querySelector(selector);
	element.innerHTML = html;
}

const buttonForm = '<button type="button" data-fancybox-close="" class="fancybox-button fancybox-close-small" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg></button>';


	document.addEventListener( 'wpcf7mailsent', function( event ) {
		const formLid = document.querySelector('.form_lid_magnet');
		formLid.classList.add('send_form');
		formLid.innerHTML = `<h2 class="header_modal">${documentsAfterModal.title}</h2> <p class="description_modal">${documentsAfterModal.description}</p>`+buttonForm;
		createDocumentsWin(formLid, documentsAfterModal.documents);

		// Форма Документы за данные 
		let wrapFormDoc = document.querySelector('.form_documents_for_data');
		if (wrapFormDoc){
			const titleAfter = wrapFormDoc.dataset.title;
			const descAfter = wrapFormDoc.dataset.desc;

			replaceElementHtml('.form_documents_for_data h3', titleAfter);
			replaceElementHtml('.form_documents_for_data h4', descAfter);
			replaceElementHtml('.form_documents_for_data .form_tel', '');
			let documents = document.querySelector('#documents');
			createDocumentsWin(documents, documentsAfterModal.documents);

		}

	});
}

document.addEventListener("DOMContentLoaded", ready_lid);


