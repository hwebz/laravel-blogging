var docReady = setInterval(function() {
	if (document.readyState !== 'complete') {
		return
	}
	clearInterval(docReady);

	var contactMessages = document.getElementsByClassName('contact-message');

	for(var i = 0; i < contactMessages.length; i++) {
		contactMessages[i].getElementsByTagName('li')[0].firstElementChild.addEventListener('click', modalOpen);
		contactMessages[i].getElementsByTagName('li')[0].firstElementChild.addEventListener('click', modalContent);
		contactMessages[i].getElementsByTagName('li')[1].firstElementChild.addEventListener('click', deleteContactMessage);
	}
	document.getElementById('modal-close').addEventListener('click', modalClose);
}, 100);

function modalContent(event) {
	event.preventDefault();
	var subject = event.path[6].firstElementChild.firstElementChild.innerText;
	var sender = event.path[6].lastElementChild.firstElementChild.innerText;
	var message = event.path[6].dataset['message'];
	var modal = document.getElementsByClassName('modal')[0];
	var modalSubject = document.createElement('h1');
	var modalSender = document.createElement('h3');
	var modalMessage = document.createElement('p');
	modalSubject.innerText = subject;
	modalSender.innerText = sender;
	modalMessage.innerText = message;
	modal.insertBefore(modalMessage, modal.childNodes[0]);
	modal.insertBefore(modalSender, modal.childNodes[0]);
	modal.insertBefore(modalSubject, modal.childNodes[0]);
}

function deleteContactMessage(event) {
	event.preventDefault();
	event.target.removeEventListener('click', deleteContactMessage);
	var messageId = event.path[6].dataset['id'];
	ajax('GET', '/admin/contact/message/' + messageId + '/delete', null, messageDeleted, [event.path[5]]);
}

function messageDeleted(params, success, responseObj) {
	var article = params[0];
	if(success) {
		article.parentElement.style.backgroundColor = '#ffc4be';
		setTimeout(function() {
			article.remove();
			location.reload();
		}, 300);
	}
}

function ajax(method, url, params, callback, callbackParams) {
	var http;

	if(window.XMLHttpRequest) {
		http = new XMLHttpRequest();
	} else {
		http = new ActiveXObject("Microsoft.XMLHTTP");
	}

	http.onreadystatechange = function() {
		if (http.readyState == XMLHttpRequest.DONE) {
			if (http.status == 400) {
				alert("Category could not be saved. Pleas try again!");
				callback(callbackParams, false);
			} else {
				var obj = JSON.parse(http.responseText);
				if (http.status == 200) {
					callback(callbackParams, true, obj);
				} else {
					if (obj.message) {
						alert(obj.message);
					} else {
						alert("Please check the name");
					}
				}
			}
		}
	}
	http.open(method, baseUrl + url, true);
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	http.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	http.send(params + "&_token=" + token);
}