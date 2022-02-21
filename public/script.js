var app = {
	init: function () {
		let origin = window.location.origin,
			pathname = window.location.pathname

		$.getJSON(`${origin}${pathname}?crews.json`)
			.done(app.writeCrews)
			.fail(app.onFail)
	},

	onFail: error => console.log(`errore nella lettura del file json ${error}`),

	writeCrews: function (crews) {
		$("#crews").append(
			crews.map(crew =>
				`
				<li class="crew">
					<div>
						Ciurma: <span class="crew-name">${crew.name}</span>
					</div>
		        	<div>Membri:</div>
					<ul>
						${crew.pirates.map(pirate => `<li class="pirate">${pirate.name}</li>`).join('')}
					</ul>
				</li>
				`
			).join('')
		)
	}
}


$(document).ready(app.init);