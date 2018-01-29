
let count = 100;
let iv = setInterval(() => {
	$('textarea[dir=auto].list-card-composer-textarea').val('some rand str' + Math.random());
	$('input[value=Hinzufügen]').click();
	count--;
	if (!count) {
		clearInterval(iv);
	}
}, 300);